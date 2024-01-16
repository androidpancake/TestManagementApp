<?php

namespace App\Http\Controllers\project;

use App\Http\Controllers\Controller;
use App\Models\Members;
use App\Models\Project;
use App\Models\Scenario;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
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
        $project = Project::with(['members', 'scenarios'])->findOrFail($id);
        $scenarios = Scenario::with(['case.step'])->where('project_id', $project->id)->get();
        $members = Members::where('project_id', $project->id)->get();

        $img = file_get_contents('storage/image/logo/bsi.png');

        // Membuat instance PHPWord
        $phpWord = new PhpWord();

        // Menambahkan sebuah bagian
        $section = $phpWord->addSection();

        // Membuat style tabel
        $tableStyle = ['borderSize' => 1, 'borderColor' => '000000'];

        // Font style
        $fontStyle = ['size' => 10];
        $scenarioFont = ['size' => 14, 'bold' => true];
        $caseFont = ['bold' => true];
        $stepFont = ['bold' => true];

        $table = $section->addTable(['borderSize' => 1, 'borderColor' => '00FFFFFF']);
        $row = $table->addRow();

        $cell1 = $row->addCell(5000);
        $cell1->addText("Test Report - " . $project->test_level);
        $cell1->addText("Version 1.0");

        // Menambahkan gambar ke kolom kedua
        $cell2 = $row->addCell(5000);
        $cell2->addImage($img, ['width' => 120, 'height' => 36, 'align' => 'right']);


        $section->addTextBreak(1);

        // Menambahkan tabel
        $table1 = $section->addTable($tableStyle);

        // tabel header project
        // Baris 1
        $table1->addRow();
        $table1->addCell(2000)->addText("Project Name");
        $table1->addCell(2000, ['gridSpan' => 2, 'vAlign' => 'center'])->addText($project->name);
        $table1->addCell(2000)->addText("Kode JIRA");
        $table1->addCell(2000, ['gridSpan' => 2, 'vAlign' => 'center'])->addText($project->jira_code);

        // Baris 2
        $table1->addRow();
        $table1->addCell(2000)->addText("Test Level");
        $table1->addCell(2000)->addText($project->test_level);
        $table1->addCell(2000)->addText("Start Date");
        $table1->addCell(2000)->addText($project->start_date);
        $table1->addCell(2000)->addText("End Date");
        $table1->addCell(2000)->addText($project->end_date);


        $section->addTextBreak(1);

        // Table Summary Test
        $table2 = $section->addTable($tableStyle);
        $table2->addRow();
        $table2->addCell(2000)->addText("Test Type");
        $table2->addCell(2000, ['gridSpan' => 9])->addText($project->test_type);

        // Baris kedua
        $table2->addRow();
        $table2->addCell(1750, ['vMerge' => 'restart'])->addText("Status");
        $table2->addCell(2000, ['gridSpan' => 5])->addText("Test Cases");
        $table2->addCell(3200, ['gridSpan' => 4])->addText("Defect Severity");

        // kolom test cases
        $table2->addRow();
        $table2->addCell(null, ['vMerge' => 'continue']);
        $table2->addCell(800)->addText("Planned");
        $table2->addCell(800)->addText("Executed");
        $table2->addCell(800)->addText("Pass");
        $table2->addCell(800)->addText("Failed");
        $table2->addCell(800)->addText("N/A");

        // kolom defect
        $table2->addCell(800, ['valign' => 'center'])->addText("Very High");
        $table2->addCell(500)->addText("High");
        $table2->addCell(400)->addText("Medium");
        $table2->addCell(400)->addText("Low");

        // Baris keempat
        $table2->addRow();
        $table2->addCell(1750)->addText("UAT");
        // Membuat 9 sel kosong
        for ($i = 0; $i < 9; $i++) {
            $table2->addCell(350)->addText("");
        }

        // Baris kelima
        $table2->addRow();
        $table2->addCell(1750)->addText("Outstanding Defect (at the end of the testing)");
        $table2->addCell(700, ['gridSpan' => 2])->addText("Very High");
        $table2->addCell(700, ['gridSpan' => 3])->addText("High");
        $table2->addCell(700, ['gridSpan' => 2])->addText("Medium");
        $table2->addCell(700, ['gridSpan' => 2])->addText("Low");

        // Baris keenam
        $table2->addRow();
        $table2->addCell(1750)->addText("Deferred Defects");
        $table2->addCell(350, ['gridSpan' => 2])->addText("vh");
        $table2->addCell(350, ['gridSpan' => 3])->addText("h");
        $table2->addCell(350, ['gridSpan' => 2])->addText("m");
        $table2->addCell(350, ['gridSpan' => 2])->addText("l");


        $section->addTextBreak(1);

        // Table User
        $table3 = $section->addTable($tableStyle);
        $table3->addRow();

        $table3->addCell(2000)->addText("User Involvement");
        $table3->addCell(2000, ['gridSpan' => 5])->addText('Active');

        $table3->addRow();
        $table3->addCell(1750, ['vMerge' => 'restart'])->addText("List of " . $project->test_level . " tester");
        $table3->addCell(1500)->addText("Tester Name");
        $table3->addCell(1500)->addText("Group");
        $table3->addCell(1500)->addText("Dept");
        $table3->addCell(1500)->addText("Roles on Application under Test");
        $table3->addCell(1500)->addText("Roles after Live Implementation");

        $table3->addRow();
        $table3->addCell(null, ['vMerge' => 'continue']);
        foreach ($members as $data) {
            $table3->addCell(1500)->addText($data->user_name);
            $table3->addCell(1500)->addText($data->unit);
            $table3->addCell(1500)->addText($data->telephone);
            $table3->addCell(1500)->addText("");
            $table3->addCell(1500)->addText("");
        }

        // tabel 4
        $section->addTextBreak(1);
        $table4 = $section->addTable($tableStyle, ['width' => 'auto']);

        $table4->addRow();
        $table4->addCell(1200)->addText("SAT Process");
        $table4->addCell(3800, ['gridSpan' => 4, 'valign' => 'center'])->addText($project->sat_process);
        $table4->addCell(1200)->addText("Retesting after Merging");
        $table4->addCell(3800, ['gridSpan' => 4, 'valign' => 'center'])->addText($project->retesting);

        $section->addTextBreak(1);
        $table5 = $section->addTable($tableStyle, ['width' => 'auto']);

        $table5->addRow();
        $table5->addCell(1750, ['vMerge' => 'restart'])->addText("Document Completeness");
        $table5->addCell(2500)->addText("Document Name");
        $table5->addCell(2500)->addText("Document Availability");
        $table5->addCell(2500)->addText("Remarks");

        $table5->addRow();
        $table5->addCell(null, ['vMerge' => 'continue']);
        $table5->addCell(1750)->addText("TMP");
        $table5->addCell(1750)->addText($project->tmp);
        $table5->addCell(1750)->addText($project->remarks);

        $table5->addRow();
        $table5->addCell(null, ['vMerge' => 'continue']);
        $table5->addCell(1750)->addText("Updated" . $project->test_level . "Test Script");
        $table5->addCell(1750)->addText($project->tmp);
        $table5->addCell(1750)->addText($project->remarks);

        $table5->addRow();
        $table5->addCell(null, ['vMerge' => 'continue']);
        $table5->addCell(1750)->addText("UAT Result");
        $table5->addCell(1750)->addText($project->tmp);
        $table5->addCell(1750)->addText($project->remarks);

        $table5->addRow();
        $table5->addCell(null, ['vMerge' => 'continue']);
        $table5->addCell(1750)->addText("UAT Attendance List");
        $table5->addCell(1750)->addText($project->uat_attendance);
        $table5->addCell(1750)->addText($project->remarks);

        $table5->addRow();
        $table5->addCell(null, ['vMerge' => 'continue']);
        $table5->addCell(1750)->addText("Other");
        $table5->addCell(1750)->addText($project->other);
        $table5->addCell(1750)->addText($project->remarks);

        $section->addTextBreak(1);

        $table6 = $section->addTable($tableStyle);

        $table6->addRow();
        $table6->addCell(1000)->addText("Description / 
        Business Process 
        Flow / Changes 
        Made
        ");
        $table6->addCell(1000)->addText("Introduction");

        $table6->addRow();
        $table6->addCell(1000)->addText("Scope of Testing");
        $table6->addCell(8000)->addText($project->scope);

        $table6->addRow();
        $table6->addCell(1000)->addText("Test Environment");
        $table6->addCell(8000)->addText($project->env);

        $table6->addRow();
        $table6->addCell(1000)->addText("Credentials");
        $table6->addCell(8000)->addText($project->credentials);

        $table6->addRow();
        $table6->addCell(1000)->addText("Defect/Issue Found");

        $issues = '';
        foreach ($project->issue as $issue) {
            $issues .= $issue->issue . ", ";
        }

        $table6->addCell(8000)->addText($issues);

        $table6->addRow();
        $table6->addCell(1000)->addText("Other");
        $table6->addCell(8000)->addText($project->other);

        $section->addTextBreak(1);

        $table7 = $section->addTable($tableStyle);

        $table7->addRow();
        $table7->addCell(2000)->addText("Classification of 
        Defect (based on 
        severity)
        ");
        $table7->addCell(null, ['gridSpan' => 2])->addText("Impact of Defects");

        $table7->addRow();
        $table7->addCell(2000)->addText("Very High
        ");
        $table7->addCell(7000)->addText("");

        $table7->addRow();
        $table7->addCell(1000)->addText("High");
        $table7->addCell(7000)->addText("");

        $table7->addRow();
        $table7->addCell(1000)->addText("Medium");
        $table7->addCell(7000)->addText("");

        $table7->addRow();
        $table7->addCell(1000)->addText("Low");
        $table7->addCell(7000)->addText("");

        $section->addPageBreak();

        $section->addText('Pihak-pihak yang bertandatangan di bawah ini menyatakan bahwa telah dilaksanakan' . $project->test_level . '
        pada tanggal' . $project->start_date . ' hingga ' . $project->end_date . ' untuk ' . $project->name . ' sesuai skenario yang tercantum dalam Test Script UAT dengan hasil 
        tercantum pada ' . $project->test_level . ' Report. Dengan ini kecukupan pelaksanaan dan hasil ' . $project->test_level . ' adalah tanggung jawab User.');

        $section->addTextBreak(1);

        $section->addText('Berita Acara UAT termasuk menyetujui isi UAT Report.');

        $tableAcc = $section->addTable($tableStyle);

        $tableAcc->addRow();
        $cell = $tableAcc->addCell(9000, ['gridSpan' => 48]);
        $cell->addText("Prepared By", $fontStyle, ['align' => 'center']);

        // Menambahkan beberapa baris kosong untuk ruang tanda tangan
        for ($i = 0; $i < 6; $i++) {
            $cell->addText("", [], ['spaceAfter' => 24]);
        }

        $cell->addText("Name : ", $fontStyle, ['align' => 'center']);
        $cell->addText("Koordinator " . $project->test_level, $fontStyle, ['align' => 'center']);

        $section->addTextBreak(1);

        $tableAcc2 = $section->addTable($tableStyle);

        //acc 2
        $tableAcc2->addRow();

        // kolom 1
        $cellAcc1 = $tableAcc2->addCell(5000);

        $cellAcc1->addText("Confirmed By,", $fontStyle, ['align' => 'center']);
        $cellAcc1->addTextBreak(6);
        $cellAcc1->addText("Name:", $fontStyle, ['align' => 'center']);
        $cellAcc1->addText("User TL", $fontStyle, ['align' => 'center']);

        // kolom 2
        $cellAcc2 = $tableAcc2->addCell(5000);

        $cellAcc2->addText("", $fontStyle, ['align' => 'center']);
        $cellAcc2->addTextBreak(6);
        $cellAcc2->addText("", $fontStyle, ['align' => 'center']);
        $cellAcc2->addText("", $fontStyle, ['align' => 'center']);

        // kolom 3
        $cellAcc3 = $tableAcc2->addCell(5000);

        $cellAcc3->addText("Confirmed By,", $fontStyle, ['align' => 'center']);
        $cellAcc3->addTextBreak(6);
        $cellAcc3->addText("Name:", $fontStyle, ['align' => 'center']);
        $cellAcc3->addText("User", $fontStyle, ['align' => 'center']);


        $tableAcc2->addRow();

        // kolom 4
        $cellAcc4 = $tableAcc2->addCell(5000);

        $cellAcc4->addText("Approve By,", $fontStyle, ['align' => 'center']);
        $cellAcc4->addTextBreak(6);
        $cellAcc4->addText("Name:", $fontStyle, ['align' => 'center']);
        $cellAcc4->addText("User TL", $fontStyle, ['align' => 'center']);

        // kolom 5
        $cellAcc5 = $tableAcc2->addCell(5000);

        $cellAcc5->addText("Approve By,", $fontStyle, ['align' => 'center']);
        $cellAcc5->addTextBreak(6);
        $cellAcc5->addText("Name:", $fontStyle, ['align' => 'center']);
        $cellAcc5->addText("User Dept. Head", $fontStyle, ['align' => 'center']);

        // kolom 6
        $cellAcc6 = $tableAcc2->addCell(5000);

        $cellAcc6->addText("Approve By,", $fontStyle, ['align' => 'center']);
        $cellAcc6->addTextBreak(6);
        $cellAcc6->addText("Name:", $fontStyle, ['align' => 'center']);
        $cellAcc6->addText("User Group Head", $fontStyle, ['align' => 'center']);

        $tableAcc2->addRow();

        // kolom 7
        $cellAcc7 = $tableAcc2->addCell(5000);

        $cellAcc7->addText("Acknowledged By,", $fontStyle, ['align' => 'center']);
        $cellAcc7->addTextBreak(6);
        $cellAcc7->addText("Name:", $fontStyle, ['align' => 'center']);
        $cellAcc7->addText("Project Manager", $fontStyle, ['align' => 'center']);

        // kolom 8
        $tableAcc2->addCell(5000);

        // kolom 9
        $cellAcc9 = $tableAcc2->addCell(5000);

        $cellAcc9->addText("Acknowledged By,", $fontStyle, ['align' => 'center']);
        $cellAcc9->addTextBreak(6);
        $cellAcc9->addText("Name:", $fontStyle, ['align' => 'center']);
        $cellAcc9->addText("DH IT PMO", $fontStyle, ['align' => 'center']);

        $tableAcc2->addRow();

        $cellAcc10 = $tableAcc2->addCell(5000);

        $cellAcc10->addText("Acknowledged By,", $fontStyle, ['align' => 'center']);
        $cellAcc10->addTextBreak(6);
        $cellAcc10->addText("Name:", $fontStyle, ['align' => 'center']);
        $cellAcc10->addText("DH IT Testing - Quality Assurance", $fontStyle, ['align' => 'center']);

        $cellAcc10 = $tableAcc2->addCell(5000);

        $cellAcc10->addText("Acknowledged By,", $fontStyle, ['align' => 'center']);
        $cellAcc10->addTextBreak(6);
        $cellAcc10->addText("Name:", $fontStyle, ['align' => 'center']);
        $cellAcc10->addText("Deputy IT Application Support", $fontStyle, ['align' => 'center']);

        $cellAcc10 = $tableAcc2->addCell(5000);

        $cellAcc10->addText("Acknowledged By,", $fontStyle, ['align' => 'center']);
        $cellAcc10->addTextBreak(6);
        $cellAcc10->addText("Name:", $fontStyle, ['align' => 'center']);
        $cellAcc10->addText("Group Head IT Application Support", $fontStyle, ['align' => 'center']);

        $section->addTextBreak(1);

        $table8 = $section->addTable($tableStyle, ['width' => 'auto']);

        $table8->addRow();
        $table8->addCell(1000)->addText("No.");
        $table8->addCell(2500)->addText("Scenario");
        $table8->addCell(2500)->addText("Test Case");
        $table8->addCell(2500)->addText("Test Step ID");
        $table8->addCell(2500)->addText("Test Step");
        $table8->addCell(2500)->addText("Expected Result");
        $table8->addCell(2500)->addText("Category");
        $table8->addCell(2500)->addText("Severity");
        $table8->addCell(2500)->addText("Status");

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

        $section->addPageBreak();

        $scenarioNum = 0;
        foreach ($scenarios as $scenario) {
            $scenarioNum++;
            $section->addText($scenarioNum . ". " . $scenario->scenario_name, $scenarioFont);

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
        $file_name = 'BA-' . date('Y-m-d') . '-' . $project->test_level . '.docx';

        $temp_file = tempnam(sys_get_temp_dir(), $file_name);
        $writer->save($temp_file);

        return response()->download($temp_file, $file_name, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ])->deleteFileAfterSend(true);
    }
}
