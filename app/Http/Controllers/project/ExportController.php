<?php

namespace App\Http\Controllers\project;

use App\Http\Controllers\Controller;
use App\Models\Members;
use App\Models\Project;
use App\Models\Scenario;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\PhpWord\PhpWord\Table;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Table as StyleTable;

class ExportController extends Controller
{
    public function word($id)
    {
        $project = Project::with(['members', 'scenarios'])->findOrFail($id);
        $scenarios = Scenario::with(['case.step'])->where('project_id', $project->id)->get();
        $members = Members::where('project_id', $project->id)->get();

        return view('docs.export', [
            'project' => $project,
            'scenarios' => $scenarios,
            'members' => $members
        ]);
    }

    public function export($id)
    {
        $project = Project::with(['members', 'scenarios.case.step', 'issue'])->findOrFail($id);
        $scenarios = Scenario::with(['case.step'])->where('project_id', $project->id)->get();
        $members = Members::where('project_id', $project->id)->get();

        $project->status == 'Generated';

        // count
        $passed = 0;
        $failed = 0;
        $executed = 0;
        $planned = 0;

        $vh_def = 0;
        $h_def = 0;
        $m_def = 0;
        $l_def = 0;

        foreach ($project->scenarios as $scenario) {
            foreach ($scenario->case as $case) {
                $planned += $scenario->case->count();
                $executed += $scenario->case->count();
                $passed += $case->step->where('status', 'passed')->count();
                $failed += $case->step->where('status', 'failed')->count();
            }
        }

        // dd($project->issue);
        $vh_def += $project->issue->where('status', 'very high')->count();
        $h_def += $project->issue->where('status', 'high')->count();
        $m_def += $project->issue->where('status', 'medium')->count();
        $l_def += $project->issue->where('status', 'low')->count();

        $img = file_get_contents('storage/image/logo/bsi.png');

        // Membuat instance PHPWord
        $phpWord = new PhpWord();

        // Menambahkan footer
        $section = $phpWord->addSection(array('pageNumberingStart' => 1));

        // auto page
        $phpWord->getSettings()->setUpdateFields(true);



        // Membuat style tabel
        $tableStyle = ['borderSize' => 1, 'borderColor' => '000000', 'cellMargin' => 40];
        $headerTableStyle = [
            'borderSize' => 1,
            'borderColor' => 'ffffff',
            'cellMargin' => 2
        ];

        $outerAccTableStyle = array('align' => 'center');
        $accStyle = ['borderSize' => 1, 'borderColor' => '000000', 'cellMargin' => 40, 'align' => 'center'];

        // Font style
        $fontStyle = ['size' => 10, 'bold' => true];
        $tableHeadFont = ['size' => 9, 'bold' => true];
        $titleFont = ['size' => 14];
        $caseFont = ['bold' => true];
        $stepFont = ['bold' => true];

        //style title
        $phpWord->addTitleStyle(1, $fontStyle);

        // Membuat header
        $header = $section->addHeader();

        // Menambahkan tabel dengan 2 kolom ke dalam header
        $table = $header->addTable();

        // Menambahkan satu baris
        $row = $table->addRow();

        // Menambahkan sel untuk teks
        $textCell = $row->addCell(8000);
        $textCell->addText("Test Report - " . $project->test_level->description, ['bold' => true]);
        $textCell->addText("Version 1.0");

        // Menambahkan sel untuk gambar
        $imageCell = $row->addCell(2000);
        $imageCell->addImage($img, ['width' => 120, 'height' => 36, 'align' => 'center']);

        // Menambahkan footer
        $footer = $section->addFooter();

        // pages footer
        $footer->addPreserveText("{PAGE}", array('align' => 'right'), array('color' => '000000'));

        $section->addTextBreak(1);

        // Menambahkan tabel
        $table1 = $section->addTable($tableStyle);

        // tabel header project
        // Baris 1
        $table1->addRow();

        if ($project->test_level->type == 'SIT' || $project->test_level->type == 'UAT') {
            $table1->addCell(2000, ['bgColor' => 'dedede'])->addText("Project Name", ['bold' => true]);
        } else {
            $table1->addCell(2000, ['bgColor' => 'dedede'])->addText("Production Issue Name", ['bold' => true]);
        }
        $table1->addCell(2000, ['gridSpan' => 2, 'vAlign' => 'center'])->addText($project->name);

        if ($project->test_level->type == 'SIT' || $project->test_level->type == 'UAT') {
            $table1->addCell(2000, ['bgColor' => 'dedede'])->addText("Kode JIRA", ['bold' => true]);
        } else {
            $table1->addCell(2000, ['bgColor' => 'dedede'])->addText("Kode Issue Production", ['bold' => true]);
        }
        $table1->addCell(2000, ['gridSpan' => 2, 'vAlign' => 'center'])->addText($project->jira_code);

        // Baris 2
        $table1->addRow();
        $table1->addCell(2000, ['bgColor' => 'dedede'])->addText("Test Level", ['bold' => true]);
        $table1->addCell(2000)->addText($project->test_level->type);
        $table1->addCell(2000, ['bgColor' => 'dedede'])->addText("Start Date", ['bold' => true]);
        $table1->addCell(2000)->addText(\Carbon\Carbon::parse($project->start_date)->format('d F Y'));
        $table1->addCell(2000, ['bgColor' => 'dedede'])->addText("End Date", ['bold' => true]);
        $table1->addCell(2000)->addText(\Carbon\Carbon::parse($project->start_date)->format('d F Y'));


        $section->addTextBreak(1);

        // Table Summary Test
        $table2 = $section->addTable($tableStyle);
        $table2->addRow();
        $table2->addCell(2000, ['bgColor' => 'dedede'])->addText("Test Type");
        $table2->addCell(2000, ['gridSpan' => 9])->addText($project->test_type);

        // Baris kedua
        $table2->addRow();
        $table2->addCell(1750, ['vMerge' => 'restart', 'bgColor' => 'dedede'])->addText("Status");
        $table2->addCell(2000, ['gridSpan' => 5, 'bgColor' => 'dedede'])->addText("Test Cases");
        $table2->addCell(3200, ['gridSpan' => 4, 'bgColor' => 'dedede'])->addText("Defect Severity");

        // kolom test cases
        $table2->addRow();
        $table2->addCell(null, ['vMerge' => 'continue']);
        $table2->addCell(800, ['bgColor' => '8dd7f7'])->addText("Planned", $tableHeadFont);
        $table2->addCell(800, ['bgColor' => '8dd7f7'])->addText("Executed", $tableHeadFont);
        $table2->addCell(800, ['bgColor' => '8dd7f7'])->addText("Pass", $tableHeadFont);
        $table2->addCell(800, ['bgColor' => '8dd7f7'])->addText("Failed", $tableHeadFont);
        $table2->addCell(800, ['bgColor' => '8dd7f7'])->addText("N/A", $tableHeadFont);

        // kolom defect
        $table2->addCell(800, ['valign' => 'center', 'bgColor' => '8dd7f7'])->addText("Very High", $tableHeadFont);
        $table2->addCell(500, ['bgColor' => '8dd7f7'])->addText("High", $tableHeadFont);
        $table2->addCell(400, ['bgColor' => '8dd7f7'])->addText("Medium", $tableHeadFont);
        $table2->addCell(400, ['bgColor' => '8dd7f7'])->addText("Low", $tableHeadFont);

        // Baris keempat
        $table2->addRow();
        $table2->addCell(1750)->addText($project->test_level->type);
        $table2->addCell(350)->addText($planned);
        $table2->addCell(350)->addText($executed);
        $table2->addCell(350)->addText($passed);
        $table2->addCell(350)->addText($failed);
        $table2->addCell(350)->addText("N/A");
        $table2->addCell(350)->addText($vh_def);
        $table2->addCell(350)->addText($h_def);
        $table2->addCell(350)->addText($m_def);
        $table2->addCell(350)->addText($l_def);

        // Baris kelima
        $table2->addRow();
        $table2->addCell(1750, ['bgColor' => 'dedede'])->addText("Outstanding Defect (at the end of the testing)");
        $table2->addCell(700, ['gridSpan' => 2])->addText("Very High");
        $table2->addCell(700, ['gridSpan' => 3])->addText("High");
        $table2->addCell(700, ['gridSpan' => 2])->addText("Medium");
        $table2->addCell(700, ['gridSpan' => 2])->addText("Low");

        // Baris keenam
        $table2->addRow();
        $table2->addCell(1750)->addText("Deferred Defects");
        $table2->addCell(350, ['gridSpan' => 2])->addText("");
        $table2->addCell(350, ['gridSpan' => 3])->addText("");
        $table2->addCell(350, ['gridSpan' => 2])->addText("");
        $table2->addCell(350, ['gridSpan' => 2])->addText("");



        if ($project->test_level->type == 'UAT' || $project->test_level->type == 'PIR') {
            $section->addTextBreak(1);
            // Table User
            $table3 = $section->addTable($tableStyle);
            $table3->addRow();

            $table3->addCell(2000, ['bgColor' => 'dedede'])->addText("User Involvement");

            if ($project->test_level->type == 'UAT') {
                $table3->addCell(7500, ['gridSpan' => 5, 'bgColor' => 'dedede'])->addText('Active / Passive / Absence');
            } else {
                $table3->addCell(4500, ['gridSpan' => 3, 'bgColor' => 'dedede'])->addText('Active / Passive / Absence');
            }
            $table3->addRow();
            $table3->addCell(1750, ['vMerge' => 'restart'])->addText("List of " . $project->test_level->type . " tester");
            $table3->addCell(3000, ['bgColor' => '8dd7f7'])->addText("Tester Name");
            $table3->addCell(3000, ['bgColor' => '8dd7f7'])->addText("Unit");
            $table3->addCell(3000, ['bgColor' => '8dd7f7'])->addText("Dept");

            if ($project->test_level->type == 'UAT') {
                $table3->addCell(3000, ['bgColor' => '8dd7f7'])->addText("Roles on Application under Test");
                $table3->addCell(3000, ['bgColor' => '8dd7f7'])->addText("Roles after Live Implementation");
            }
            $table3->addRow();
            $table3->addCell(null, ['vMerge' => 'continue']);
            foreach ($members as $data) {
                $table3->addCell(1500)->addText($data->user_name);
                $table3->addCell(1500)->addText($data->unit);
                $table3->addCell(1500)->addText($data->group);

                if ($project->test_level->type == 'UAT') {
                    $table3->addCell(1500)->addText("");
                    $table3->addCell(1500)->addText("");
                }
            }

            // tabel 4
            $section->addTextBreak(1);
            $table4 = $section->addTable($tableStyle, ['width' => 'auto']);

            if ($project->test_level->type == 'UAT') {
                $table4->addRow();
                $table4->addCell(1200, ['bgColor' => 'dedede'])->addText("SAT Process");
                $table4->addCell(3800, ['gridSpan' => 4, 'valign' => 'center'])->addText($project->sat_process);
                $table4->addCell(1200, ['bgColor' => 'dedede'])->addText("Retesting after Merging");
                $table4->addCell(3800, ['gridSpan' => 4, 'valign' => 'center'])->addText($project->retesting);
            }
        }

        $section->addTextBreak(1);
        $table5 = $section->addTable($tableStyle, ['width' => 'auto']);

        $table5->addRow();
        $table5->addCell(1750, ['vMerge' => 'restart', 'bgColor' => '770ea1'])->addText("Document Completeness", ['color' => 'ffffff']);
        $table5->addCell(2500, ['bgColor' => '8dd7f7'])->addText("Document Name");
        $table5->addCell(2500, ['bgColor' => '8dd7f7'])->addText("Document Availability");
        $table5->addCell(2500, ['bgColor' => '8dd7f7'])->addText("Remarks");

        $table5->addRow();
        $table5->addCell(null, ['vMerge' => 'continue']);
        if ($project->test_level->type == 'UAT' || $project->test_level->type == 'SIT') {
            $table5->addCell(1750)->addText("TMP");
            $table5->addCell(1750)->addText($project->tmp);
            $table5->addCell(1750)->addText($project->tmp_remark);
        } else if ($project->test_level->type == 'PIR') {
            $table5->addCell(1750)->addText("Test Script Issue Production");
            $table5->addCell(1750)->addText($project->tmp);
            $table5->addCell(1750)->addText($project->tmp_remark);
        }

        $table5->addRow();
        $table5->addCell(null, ['vMerge' => 'continue']);

        if ($project->test_level->type == 'UAT' || $project->test_level->type == 'SIT') {
            $table5->addCell(1750)->addText("Updated " . $project->test_level->type . " Test Script");
            $table5->addCell(1750)->addText($project->tmp);
            $table5->addCell(1750)->addText($project->updated_remark);
        } else if ($project->test_level->type == 'PIR') {
            $table5->addCell(1750)->addText("Result Issue Production");
            $table5->addCell(1750)->addText($project->tmp);
            $table5->addCell(1750)->addText($project->updated_remark);
        }

        if ($project->test_level->type == 'UAT' || $project->test_level->type == 'SIT') {
            $table5->addRow();
            $table5->addCell(null, ['vMerge' => 'continue']);
            $table5->addCell(1750)->addText($project->test_level->type . "Result");
            $table5->addCell(1750)->addText($project->tmp);
            $table5->addCell(1750)->addText($project->uat_remark);

            $table5->addRow();
            $table5->addCell(null, ['vMerge' => 'continue']);
            $table5->addCell(1750)->addText($project->test_level->type . " Attendance List");
            $table5->addCell(1750)->addText($project->uat_attendance_remark);
            $table5->addCell(1750)->addText($project->remarks);
        }

        $table5->addRow();
        $table5->addCell(null, ['vMerge' => 'continue']);
        $table5->addCell(1750)->addText("Other");
        $table5->addCell(1750)->addText($project->other);
        $table5->addCell(1750)->addText($project->remarks);

        $section->addTextBreak(1);

        $table6 = $section->addTable($tableStyle);

        $table6->addRow();
        $table6->addCell(1000, ['bgColor' => 'dedede'])->addText("Description / 
        Business Process 
        Flow / Changes 
        Made
        ");
        $table6->addCell(1000)->addText("Introduction");

        $table6->addRow();
        $table6->addCell(1000, ['bgColor' => 'dedede'])->addText("Scope of Testing");
        $table6->addCell(8000)->addText($project->scope);

        $table6->addRow();
        $table6->addCell(1000, ['bgColor' => 'dedede'])->addText("Test Environment");
        $table6->addCell(8000)->addText($project->env);

        $table6->addRow();
        $table6->addCell(1000, ['bgColor' => 'dedede'])->addText("Credentials");
        $table6->addCell(8000)->addText($project->credentials);

        $table6->addRow();
        $table6->addCell(1000, ['bgColor' => 'dedede'])->addText("Defect/Issue Found");

        $issues = '';
        foreach ($project->issue as $issue) {
            $issues .= $issue->issue . ", ";
        }

        $table6->addCell(8000)->addText($issues);

        $table6->addRow();
        $table6->addCell(1000, ['bgColor' => 'dedede'])->addText("Other");
        $table6->addCell(8000)->addText($project->other);

        $section->addTextBreak(1);

        $table7 = $section->addTable($tableStyle);

        $table7->addRow();
        $table7->addCell(2000, ['bgColor' => 'dedede'])->addText("Classification of 
        Defect (based on 
        severity)
        ");
        $table7->addCell(null, ['gridSpan' => 2, 'bgColor' => 'dedede'])->addText("Impact of Defects");

        if ($project->test_level->type == 'UAT' || $project->test_level->type == 'SIT') {
            $table7->addRow();
            $table7->addCell(2000)->addText("Very High
            ");
            $tableCellVH = $table7->addCell(7000);
            $tableCellVH->addListItem("Critical operations have been impaired");
            $tableCellVH->addListItem("Non-availability of information which is mandated by statutory requirements (such as non-availability of key surveillance systems mandated by the government)");
            $tableCellVH->addListItem("Sanctity of information / data has been compromised");

            $table7->addRow();
            $table7->addCell(1000)->addText("High");

            $tableCellH = $table7->addCell(1000);
            $tableCellH->addListItem("The problem has significantly degraded the system’s ability to service its customers");
            $tableCellH->addListItem("The problem has severely impacted the operations");
            $tableCellH->addListItem("Delay in the resolution will significantly impact the Bank Syariah Indonesia’s ability to service its customers");

            $table7->addRow();
            $table7->addCell(1000)->addText("Medium");

            $tableCellM = $table7->addCell(1000);
            $tableCellM->addListItem("Minimal impact on systems ability to service its customers");
            $tableCellM->addListItem("Minimal impact on operations");

            $table7->addRow();
            $table7->addCell(1000)->addText("Low");

            $tableCellL = $table7->addCell(1000);
            $tableCellL->addListItem("The nature of defects that have not been specified under Very high, high or medium will come under low");
        } else if ($project->test_level->type == 'PIR') {
            $table7->addRow();
            $table7->addCell(2000)->addText("Critical
            ");
            $tableCellVH = $table7->addCell(7000);
            $tableCellVH->addListItem("Sistem mengalami shut-down total dan tidak dapat melanjutkan testing ke proses berikutnya (force close/terminate");

            $table7->addRow();
            $table7->addCell(1000)->addText("High");

            $tableCellH = $table7->addCell(1000);
            $tableCellH->addListItem("Sistem mengalami collapse, tetapi fungsi lain masih dapat berjalan.");

            $table7->addRow();
            $table7->addCell(1000)->addText("Medium");

            $tableCellM = $table7->addCell(1000);
            $tableCellM->addListItem("Sistem menampilkan hasil yang tidak diharapkan, tetapi masih berfungsi dengan baik.");

            $table7->addRow();
            $table7->addCell(1000)->addText("Low");

            $tableCellL = $table7->addCell(1000);
            $tableCellL->addListItem("Defect yang terjadi tidak menyebabkan kerusakan/gangguan sistem.");
        }

        $section->addPageBreak();

        if ($project->test_level->type == 'UAT' || $project->test_level->type == 'PIR') {

            $textRun = $section->addTextRun();

            $textRun->addText('Pihak-pihak yang bertandatangan di bawah ini menyatakan bahwa telah dilaksanakan ');
            $textRun->addText($project->test_level->description . ' ', array('bold' => true));
            $textRun->addText('pada tanggal ');
            $textRun->addText($project->start_date, array('bold' => true)); // Teks ditebalkan
            $textRun->addText(' hingga ');
            $textRun->addText($project->end_date, array('bold' => true));
            $textRun->addText(' untuk ');
            $textRun->addText($project->name . ' ', array('bold' => true));
            $textRun->addText('sesuai skenario yang tercantum dalam Test Script ' . $project->test_level->description . ' dengan hasil tercantum pada ');
            $textRun->addText($project->test_level->description . ' ', array('bold' => true));
            $textRun->addText('Report. Dengan ini kecukupan pelaksanaan dan hasil ');
            $textRun->addText($project->test_level->description, array('bold' => true));
            $textRun->addText(' adalah tanggung jawab User.');

            $section->addTextBreak(1);

            $section->addText('Berita Acara ' . $project->test_level->description . ' termasuk menyetujui isi ' . $project->test_level->description . ' Report.');
        }

        $tableAcc = $section->addTable($tableStyle);

        if ($project->test_level->type == 'SIT') {
            $tableAcc->addRow();
            $cellProject = $tableAcc->addCell(9000, ['gridSpan' => 48]);
            $cellProject->addText($project->name, $fontStyle, ['align' => 'center']);
            $cellProject->addText($project->jira_code, $fontStyle, ['align' => 'center']);
        }
        $tableAcc->addRow();
        $cell = $tableAcc->addCell(9000, ['gridSpan' => 48]);
        $cell->addText("Prepared By", $fontStyle, ['align' => 'center']);

        // Menambahkan beberapa baris kosong untuk ruang tanda tangan
        for ($i = 0; $i < 6; $i++) {
            $cell->addText("", [], ['spaceAfter' => 24]);
        }

        $cell->addText("Name : ", $fontStyle, ['align' => 'center']);
        if ($project->test_level->type == 'UAT') {
            $cell->addText("Koordinator " . $project->test_level->type, $fontStyle, ['align' => 'center']);
        } elseif ($project->test_level->type == 'SIT') {
            $cell->addText("SIT Tester", $fontStyle, ['align' => 'center']);
        } elseif ($project->test_level->type == 'PIR') {
            $cell->addText("Tester QA-IT ASP", $fontStyle, ['align' => 'center']);
        }

        $section->addTextBreak(1);

        $tableAcc2 = $section->addTable($tableStyle);

        //acc 2
        $tableAcc2->addRow();

        // kolom 1
        $cellAcc1 = $tableAcc2->addCell(4000);

        $cellAcc1->addText("Confirmed By,", $fontStyle, ['align' => 'center']);
        $cellAcc1->addTextBreak(6);
        $cellAcc1->addText("Name:", $fontStyle, ['align' => 'center']);
        if ($project->test_level->type == 'UAT') {
            $cellAcc1->addText("User TL", $fontStyle, ['align' => 'center']);
        } else if ($project->test_level->type == 'SIT') {
            $cellAcc1->addText("Project Manager", $fontStyle, ['align' => 'center']);
        } else if ($project->test_level->type == 'PIR') {
            $cellAcc1->addText("TL QA-ASP", $fontStyle, ['align' => 'center']);
        }


        // kolom 2

        if ($project->test_level->type == 'SIT' || $project->test_level->type == 'UAT') {
            $cellAcc2 = $tableAcc2->addCell(4000);

            $cellAcc2->addText("", $fontStyle, ['align' => 'center']);
            $cellAcc2->addTextBreak(6);
            $cellAcc2->addText("", $fontStyle, ['align' => 'center']);
            $cellAcc2->addText("", $fontStyle, ['align' => 'center']);
        } else if ($project->test_level->type == 'PIR') {
            $cellAcc2 = $tableAcc2->addCell(4000);

            $cellAcc2->addText("Confirmed By,", $fontStyle, ['align' => 'center']);
            $cellAcc2->addTextBreak(6);
            $cellAcc2->addText("Name:", $fontStyle, ['align' => 'center']);
            $cellAcc2->addText("TL/Officer-ASP (SME)", $fontStyle, ['align' => 'center']);
        }


        // kolom 3
        $cellAcc3 = $tableAcc2->addCell(4000);

        $cellAcc3->addText("Confirmed By,", $fontStyle, ['align' => 'center']);
        $cellAcc3->addTextBreak(6);
        $cellAcc3->addText("Name:", $fontStyle, ['align' => 'center']);

        if ($project->test_level->type == 'UAT') {
            $cellAcc3->addText("User", $fontStyle, ['align' => 'center']);
        } else if ($project->test_level->type == 'SIT') {
            $cellAcc3->addText("SIT Lead", $fontStyle, ['align' => 'center']);
        } else if ($project->test_level->type == 'PIR') {
            $cellAcc3->addText("User Team Leader", $fontStyle, ['align' => 'center']);
        }

        // kolom 4
        if ($project->test_level->type == 'SIT' || $project->test_level->type == 'UAT') {
            $tableAcc2->addRow();

            $cellAcc4 = $tableAcc2->addCell(4000);

            $cellAcc4->addText("Approved By,", $fontStyle, ['align' => 'center']);
            $cellAcc4->addTextBreak(6);
            $cellAcc4->addText("Name:", $fontStyle, ['align' => 'center']);
            if ($project->test_level->type == 'UAT') {
                $cellAcc4->addText("User TL", $fontStyle, ['align' => 'center']);
            } else if ($project->test_level->type == 'SIT') {
                $cellAcc4->addText("DH IT Project Management", $fontStyle, ['align' => 'center']);
            }
        }


        // kolom 5
        if ($project->test_level->type == 'SIT' || $project->test_level->type == 'UAT') {
            $cellAcc5 = $tableAcc2->addCell(4000);

            $cellAcc5->addText("Approved By,", $fontStyle, ['align' => 'center']);
            $cellAcc5->addTextBreak(6);
            $cellAcc5->addText("Name:", $fontStyle, ['align' => 'center']);
            if ($project->test_level->type == 'UAT' || $project->test_level->type == '') {
                $cellAcc5->addText("User Dept. Head", $fontStyle, ['align' => 'center']);
            }
        }



        // kolom 4-8 PIT
        if ($project->test_level->type == 'PIR') {
            $tableAccPIT = $section->addTable($tableStyle);
            $tableAccPIT->addRow();

            $cellAcc6PIT = $tableAccPIT->addCell(6000);
            $cellAcc6PIT->addText("Approved By,", $fontStyle, ['align' => 'center']);
            $cellAcc6PIT->addTextBreak(6);
            $cellAcc6PIT->addText("Name:", $fontStyle, ['align' => 'center']);
            $cellAcc6PIT->addText("Dept. Head ASP (SME)", $fontStyle, ['align' => 'center']);

            $cellAcc7PIT = $tableAccPIT->addCell(6000);
            $cellAcc7PIT->addText("Approved By,", $fontStyle, ['align' => 'center']);
            $cellAcc7PIT->addTextBreak(6);
            $cellAcc7PIT->addText("Name:", $fontStyle, ['align' => 'center']);
            $cellAcc7PIT->addText("User Dept. Head", $fontStyle, ['align' => 'center']);

            $tableAccPIT->addRow();

            $cellAcc8PIT = $tableAccPIT->addCell(6000);
            $cellAcc8PIT->addText("Acknowledged By,", $fontStyle, ['align' => 'center']);
            $cellAcc8PIT->addTextBreak(6);
            $cellAcc8PIT->addText("Name:", $fontStyle, ['align' => 'center']);
            $cellAcc8PIT->addText("IT QA Dept. Head-ASP", $fontStyle, ['align' => 'center']);

            $cellAcc9PIT = $tableAccPIT->addCell(6000);
            $cellAcc9PIT->addText("Acknowledged By,", $fontStyle, ['align' => 'center']);
            $cellAcc9PIT->addTextBreak(6);
            $cellAcc9PIT->addText("Name:", $fontStyle, ['align' => 'center']);
            $cellAcc9PIT->addText("Deputy GH-ASP", $fontStyle, ['align' => 'center']);
        }

        // kolom 6

        if ($project->test_level->type == 'UAT' || $project->test_level->type == 'SIT') {
            $cellAcc6 = $tableAcc2->addCell(4000);

            $cellAcc6->addText("Approved By,", $fontStyle, ['align' => 'center']);
            $cellAcc6->addTextBreak(6);
            $cellAcc6->addText("Name:", $fontStyle, ['align' => 'center']);
            if ($project->test_level->type == 'UAT') {
                $cellAcc6->addText("User Group Head", $fontStyle, ['align' => 'center']);
            } else if ($project->test_level->type == 'SIT') {
                $cellAcc6->addText("Deputy IT Application Support", $fontStyle, ['align' => 'center']);
            }

            if ($project->test_level->type == 'UAT') {

                $tableAcc2->addRow();

                // kolom 7
                $cellAcc7 = $tableAcc2->addCell(4000);

                $cellAcc7->addText("Acknowledged By,", $fontStyle, ['align' => 'center']);
                $cellAcc7->addTextBreak(6);
                $cellAcc7->addText("Name:", $fontStyle, ['align' => 'center']);
                $cellAcc7->addText("Project Manager", $fontStyle, ['align' => 'center']);

                // kolom 8
                $tableAcc2->addCell(4000);

                // kolom 9
                $cellAcc9 = $tableAcc2->addCell(4000);

                $cellAcc9->addText("Acknowledged By,", $fontStyle, ['align' => 'center']);
                $cellAcc9->addTextBreak(6);
                $cellAcc9->addText("Name:", $fontStyle, ['align' => 'center']);
                $cellAcc9->addText("DH IT PMO", $fontStyle, ['align' => 'center']);

                $tableAcc2->addRow();

                // kolom 10
                $cellAcc10 = $tableAcc2->addCell(4000);

                $cellAcc10->addText("Acknowledged By,", $fontStyle, ['align' => 'center']);
                $cellAcc10->addTextBreak(6);
                $cellAcc10->addText("Name:", $fontStyle, ['align' => 'center']);
                $cellAcc10->addText("DH IT Testing and Quality Assurance", $fontStyle, ['align' => 'center']);

                // kolom  11
                $cellAcc10 = $tableAcc2->addCell(4000);

                $cellAcc10->addText("Acknowledged By,", $fontStyle, ['align' => 'center']);
                $cellAcc10->addTextBreak(6);
                $cellAcc10->addText("Name:", $fontStyle, ['align' => 'center']);
                $cellAcc10->addText("Deputy IT Application Support", $fontStyle, ['align' => 'center']);

                // kolom 11
                $cellAcc10 = $tableAcc2->addCell(4000);

                $cellAcc10->addText("Acknowledged By,", $fontStyle, ['align' => 'center']);
                $cellAcc10->addTextBreak(6);
                $cellAcc10->addText("Name:", $fontStyle, ['align' => 'center']);
                $cellAcc10->addText("Group Head IT Application Support", $fontStyle, ['align' => 'center']);

                // kolom 12
                $tableAcc2->addRow();

                $cellAcc11 = $tableAcc2->addCell(9000, ['gridSpan' => '3']);

                $cellAcc11->addText("Catatan dari Policy and Procedure Group (PPG)");
                $cellAcc11->addCheckBox('c1', htmlspecialchars(' PTO Baru'));
                $cellAcc11->addCheckBox('c2', htmlspecialchars(' Pembaharuan PTO yang ada'));
                $cellAcc11->addCheckBox('c3', htmlspecialchars(' Tidak perlu perubahan pada PTO'));
                $cellAcc11->addText("Keterangan:");
                $cellAcc11->addTextBreak(2);

                $tableAcc2->addRow();
                $cellAcc12 = $tableAcc2->addCell(9000, ['gridSpan' => '3']);
                $cellAcc12->addText("Acknowledged By,", $fontStyle, ['align' => 'center']);
                for ($i = 0; $i < 4; $i++) {
                    $cellAcc12->addText("", [], ['spaceAfter' => 24]);
                }

                $cellAcc12->addText("Name :", $fontStyle, ['align' => 'center']);
                $cellAcc12->addText("Policy and Procedure Group (PPG) Team Leader/Manage", $fontStyle, ['align' => 'center']);
            }

            if ($project->test_level->type == 'SIT') {
                $section->addPageBreak();
                $section->addText("Hari/Tanggal :");
                $section->addText("Tempat :");
                $section->addText("Waktu :");

                $section->addTextBreak(1);

                $tableAccSIT = $section->addTable($tableStyle, ['width' => 'autos']);
                $tableAccSIT->addRow();

                $tableAccSIT->addCell(1000, ['bgColor' => 'dedede'])->addText("No.");
                $tableAccSIT->addCell(1000, ['bgColor' => 'dedede'])->addText("Nama");
                $tableAccSIT->addCell(1000, ['bgColor' => 'dedede'])->addText("Unit Kerja");
                $tableAccSIT->addCell(1000, ['bgColor' => 'dedede'])->addText("Telepon");
                $tableAccSIT->addCell(1000, ['bgColor' => 'dedede'])->addText("Tanda Tangan");

                $accNum = 0;


                foreach ($members as $member) {
                    $tableAccSIT->addRow();

                    $accNum++;
                    $tableAccSIT->addCell(1000)->addText($accNum);
                    $tableAccSIT->addCell(3000)->addText($member->user_name);
                    $tableAccSIT->addCell(3000)->addText($member->unit);
                    $tableAccSIT->addCell(3000)->addText($member->telephone);
                    $tableAccSIT->addCell(3000)->addText("");
                }
            }
        }

        if ($project->test_level->type == 'UAT') {
            $section->addTextBreak(2);
        } elseif ($project->test_level->type == 'SIT') {
            $section->addPageBreak();

            // Add TOC #1
            $section->addText('Daftar Isi', $titleFont, ['align' => 'center']);
            $section->addTextBreak(2);


            $section->addPageBreak();
        } else if ($project->test_level->type == 'PIR') {
            $section->addPageBreak();
        }



        $section->addTitle("Skenario", 1);

        $table8 = $section->addTable($tableStyle, ['width' => 'auto']);

        $table8->addRow();
        $table8->addCell(1000, ['bgColor' => '179d97'])->addText("No.");
        $table8->addCell(2500, ['bgColor' => '179d97'])->addText("Scenario");
        $table8->addCell(2500, ['bgColor' => '179d97'])->addText("Test Case");
        $table8->addCell(2500, ['bgColor' => '179d97'])->addText("Test Step ID");
        $table8->addCell(2500, ['bgColor' => '179d97'])->addText("Test Step");
        $table8->addCell(2500, ['bgColor' => '179d97'])->addText("Expected Result");
        $table8->addCell(2500, ['bgColor' => '179d97'])->addText("Category");
        $table8->addCell(2500, ['bgColor' => '179d97'])->addText("Severity");
        $table8->addCell(2500, ['bgColor' => '179d97'])->addText("Status");

        $scenarioNumber = 0;
        foreach ($scenarios as $scenario) {
            $scenarioNumber++;
            $totalSteps = 0;

            // Menghitung total langkah untuk skenario ini
            foreach ($scenario->case as $case) {
                $totalSteps += count($case->step);
            }

            $firstCase = true;
            foreach ($scenario->case as $case) {
                $rowCount = count($case->step); // Langkah dalam kasus ini

                foreach ($case->step as $stepIndex => $step) {
                    $table8->addRow();

                    // Merge untuk nomor skenario
                    if ($firstCase && $stepIndex == 0) {
                        $table8->addCell(2000, ['vMerge' => 'restart'])->addText($scenarioNumber);
                        $table8->addCell(2000, ['vMerge' => 'restart'])->addText($scenario->scenario_name);

                        $firstCase = false;
                    } elseif ($totalSteps) {
                        $table8->addCell(2000, ['vMerge' => 'continue']);
                        $table8->addCell(2000, ['vMerge' => 'continue']);
                    }

                    // Merge untuk nama kasus
                    if ($stepIndex == 0) {
                        $table8->addCell(2000, ['vMerge' => 'restart'])->addText($case->case);
                    } else {
                        $table8->addCell(2000, ['vMerge' => 'continue']);
                    }

                    // Menambahkan langkah tes
                    $table8->addCell(2000)->addText($step->test_step_id);
                    $table8->addCell(2000)->addText($step->test_step);
                    $table8->addCell(2000)->addText($step->expected_result);
                    $table8->addCell(2000)->addText($step->category);
                    $table8->addCell(2000)->addText($step->severity);
                    $table8->addCell(2000)->addText($step->status);
                }
            }
        }

        if ($project->test_level->type == 'SIT') {
            $section->addPageBreak();

            $section->addTitle("Report", 1);

            $tableReport = $section->addTable($tableStyle);

            $tableReport->addRow();
            $tableReport->addCell(3000, ['bgColor' => '179d97'])->addText("Server Name");
            $tableReport->addCell(3000, ['bgColor' => '179d97'])->addText("Path Folder Name");
            $tableReport->addCell(3000, ['bgColor' => '179d97'])->addText("File Name");
            $tableReport->addCell(3000, ['bgColor' => '179d97'])->addText("Pages");

            $tableReport->addRow();
            $tableReport->addCell(3000)->addText("");
            $tableReport->addCell(3000)->addText("");
            $tableReport->addCell(3000)->addText("");
            $tableReport->addCell(3000)->addText("");
        }

        if ($project->test_level->type == 'UAT') {

            $section->addTextBreak(2);

            $section->addText("Pihak-pihak yang bertandatangan di bawah ini menyatakan bahwa test script " . $project->name . ", telah sesuai dengan requirement termasuk impacted feature yang diinformasikan oleh pihak pengembang dan dapat digunakan untuk pelaksanaan " . $project->test_level->type . ". Demikian berita acara ini kami buat dengan sebenar-benarnya.");
            $table9 = $section->addTable($accStyle);

            $table9->addRow();

            $cellAccScript1 = $table9->addCell(3000);
            $cellAccScript1->addText("Prepared By,", $fontStyle, ['align' => 'center']);
            $cellAccScript1->addTextBreak(4);
            $cellAccScript1->addText("Name:", $fontStyle, ['align' => 'center']);
            $cellAccScript1->addText("User", $fontStyle, ['align' => 'center']);

            $cellAccScript2 = $table9->addCell(3000);
            $cellAccScript2->addText("Prepared By,", $fontStyle, ['align' => 'center']);
            $cellAccScript2->addTextBreak(4);
            $cellAccScript2->addText("Name:", $fontStyle, ['align' => 'center']);
            $cellAccScript2->addText("User", $fontStyle, ['align' => 'center']);

            $table9->addRow();

            $cellAccScript1 = $table9->addCell(3000);
            $cellAccScript1->addText("Accepted By,", $fontStyle, ['align' => 'center']);
            $cellAccScript1->addTextBreak(4);
            $cellAccScript1->addText("Name:", $fontStyle, ['align' => 'center']);
            $cellAccScript1->addText("User", $fontStyle, ['align' => 'center']);

            $cellAccScript2 = $table9->addCell(3000);
            $cellAccScript2->addText("Accepted By,", $fontStyle, ['align' => 'center']);
            $cellAccScript2->addTextBreak(4);
            $cellAccScript2->addText("Name:", $fontStyle, ['align' => 'center']);
            $cellAccScript2->addText("User", $fontStyle, ['align' => 'center']);
        }

        $section->addPageBreak();

        $scenarioNum = 0;
        foreach ($scenarios as $scenario) {
            $scenarioNum++;
            $section->addTitle("Skenario " . $scenarioNum . ". " . $scenario->scenario_name, 1);

            foreach ($scenario->case as $case) {
                $section->addText("Test Case : " . $case->case, $caseFont);
                $section->addText("Action Test : ");
                $section->addText("Expected Result : ");
                foreach ($case->step as $step) {
                    $section->addText("Test Step " . $step->test_step_id, $stepFont);
                    $section->addTextBreak(3);
                    $section->addText("Result : ");
                    $section->addTextBreak(2);
                }
            }
        }


        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $file_name = 'BA-' . $project->test_level->type . '-' . $project->name . '.docx';

        $temp_file = tempnam(sys_get_temp_dir(), $file_name);
        $writer->save($temp_file);

        return response()->download($temp_file, $file_name, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ])->deleteFileAfterSend(true);
    }
}
