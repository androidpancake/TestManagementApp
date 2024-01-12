<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Menambahkan border dan beberapa styling pada tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            /* Menghilangkan double borders */
        }

        /* Menetapkan border untuk seluruh cell (th dan td) dalam tabel */
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            /* Menambahkan padding untuk estetika */
        }

        /* Style tambahan untuk header tabel */
        th {
            background-color: #f2f2f2;
            /* Warna background untuk header tabel */
            text-align: left;
        }
    </style>
</head>

<body>
    <div>
        <div>
            <div>
                Test Report - {{ $project->test_level }}
                <p>Version 1.0</p>
            </div>

        </div>
    </div>

    <table>
        <tbody>
            <tr>
                <th>Project Name</th>
                <td colspan="6">{{ $project->name }}</td>
                <th>Kode JIRA</th>
                <td>{{ $project->jira_code }}</td>
            </tr>
            <tr>
                <th>Test Level</th>
                <td colspan="4">{{ $project->test_level }}</td>
                <th>Start Date</th>
                <td>{{ $project->start_date }}</td>
                <th>End Date</th>
                <td>{{ $project->end_date }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th>Test Type</th>
                <th colspan="9">Business</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="2">Status</td>
                <td colspan="5">Test Cases</td>
                <td colspan="4">Defect</td>
            </tr>
            <tr>
                <td>Planned</td>
                <td>Executed</td>
                <td>Pass</td>
                <td>Failed</td>
                <td>N/A</td>
                <td>Very High</td>
                <td>High</td>
                <td>Medium</td>
                <td>Low</td>
            </tr>
            <tr>
                <td>UAT</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Outstanding Defect (at the end of the testing)</td>
                <td colspan="2">Very High</td>
                <td colspan="3">High</td>
                <td colspan="2">Medium</td>
                <td colspan="2">Low</td>
            </tr>
            <tr>
                <td>Deffered Defects</td>
                <td colspan="2"></td>
                <td colspan="3"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th colspan="5">User Involvement</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="5">Active</td>
            </tr>
            <tr>
                <th>Tester Name</th>
                <th>Group</th>
                <th>Roles on Application Under Test</th>
                <th>Roles After Live Impelementation</th>
            </tr>
            @foreach($members as $member)
            <tr>
                <td>{{ $member->user_name }}</td>
                <td>{{ $member->unit }}</td>
                <td></td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table>
        <tr>
            <th>SAT Process</th>
            <td>{{ $project->sat_process }}</td>
            <th>Retesting</th>
            <td>{{ $project->retesting }}</td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th rowspan="6">Document<br>Completeness</th>
                <th>Document Name</th>
                <th>Document Availability</th>
                <th>Remark</th>
            </tr>
            <tr>
                <th>TMP</th>
                <td>{{ $project->tmp }}</td>
                <td>{{ $project->remarks }}</td>
            </tr>
            <tr>
                <th>Updated UAT</th>
                <td>{{ $project->updated_uat }}</td>
                <td></td>
            </tr>
            <tr>
                <th>UAT Result</th>
                <td>{{ $project->uat_result }}</td>
                <td></td>
            </tr>
            <tr>
                <th>UAT Attendance List</th>
                <td>{{ $project->uat_attendance }}</td>
                <td></td>
            </tr>
            <tr>
                <th>Other</th>
                <td>{{ $project->other }}</td>
                <td></td>
            </tr>
        </thead>
    </table>

    <table>
        <thead>
            <tr>
                <th>Business Process Flow / Changes Made <br></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Scope of Testing</td>
                <td>{{ $project->scope }}</td>
            </tr>
            <tr>
                <td>Test Environment</td>
                <td>{{ $project->env }}</td>
            </tr>
            <tr>
                <td>Credentials/User ID</td>
                <td>{{ $project->credentials }}</td>
            </tr>
            <tr>
                <td>Defec/Issue Found</td>
                <td>{{ $project->issue }}</td>
            </tr>
            <tr>
                <td>Other Notes</td>
                <td>{{ $project->other }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th>Classification of Defect (based on severity) <br></th>
                <th>Impact of Defects</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Very High</td>
                <td></td>
            </tr>
            <tr>
                <td>Test Environment</td>
                <td></td>
            </tr>
            <tr>
                <td>Credentials/User ID</td>
                <td></td>
            </tr>
            <tr>
                <td>Defec/Issue Found</td>
                <td></td>
            </tr>
            <tr>
                <td>Other Notes</td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <table>
        <tr>
            <th colspan="10">
                <div>
                    <div>
                        <p>Prepared By</p>
                    </div>
                    <div>
                        <p>Name : </p>
                        <p>UAT</p>
                    </div>

                </div>
            </th>
        </tr>
        <tr>
            <th>
                Confirmed By
            </th>
            <th></th>
            <th>Confirmed By</th>
        </tr>
        <tr>
            <th>
                Approved By
            </th>
            <th>Approve By</th>
            <th>Approved By</th>
        </tr>
        <tr>
            <th>
                Acknowledged By
            </th>
            <th></th>
            <th>Acknowledged By</th>
        </tr>
        <tr>
            <th>
                Acknowledged By
            </th>
            <th>Acknowledged By</th>
            <th>Acknowledged By</th>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th scope="col">
                    No.
                </th>
                <th scope="col">
                    Scenario
                </th>
                <th scope="col">
                    Test Case
                </th>
                <th scope="col">
                    Test Step ID
                </th>
                <th scope="col">
                    Test Step
                </th>
                <th scope="col">
                    Expected Result
                </th>
                <th scope="col">
                    Category
                </th>
                <th scope="col">
                    Severity
                </th>
                <th scope="col">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @php $scenarioNumber = 0; @endphp
            @foreach($scenarios as $scenario)
            @php
            $scenarioNumber++;
            $totalSteps = 0;
            foreach($scenario->case as $case) {
            $totalSteps += $case->step->count();
            }
            $isFirstRow = true;
            @endphp

            @foreach($scenario->case as $caseIndex => $case)
            @php
            $rowCount = $case->step->count();
            @endphp

            @foreach($case->step as $stepIndex => $step)
            <tr>

                @if ($isFirstRow)
                <td rowspan="{{ $totalSteps }}">{{ $scenarioNumber }}</td>
                <td rowspan="{{ $totalSteps }}">{{ $scenario->scenario_name }}</td>
                @php $isFirstRow = false; @endphp
                @endif


                @if ($stepIndex === 0)
                <td rowspan="{{ $rowCount }}">{{ $case->case }}</td>
                @endif

                <td>{{ $step->test_step_id }}</td>
                <td>{{ $step->test_step }}</td>
                <td>{{ $step->expected_result }}</td>
                <td>{{ $step->category }}</td>
                <td>{{ $step->severity }}</td>
                <td>{{ $step->status }}</td>
            </tr>
            @endforeach
            @endforeach
            @endforeach
        </tbody>
    </table>
</body>

</html>