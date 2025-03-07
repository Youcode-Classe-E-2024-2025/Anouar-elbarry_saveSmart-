<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>General Financial Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #444;
        }
        .report-section {
            background-color: #f8f8f8;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        td.value {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
        }
        tr.expenses td.value { color: #2e7d32; }
        tr.savings td.value { color: #1565c0; }
        tr.available td.value { color: #f9a825; }
        tr.goals td.value { color: #6a1b9a; }
        tr.income td.value { color: #c62828; }
        
        @media print {
            body {
                background-color: white;
            }
            .container {
                margin: 0;
                width: 100%;
            }
            .report-section {
                box-shadow: none;
                border: 1px solid #eee;
            }
            table {
                border: 1px solid #eee;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>General Financial Report</h1>
        
        <div class="report-section">
            <h2>Summary</h2>
            <table>
                <thead>
                    <tr>
                        <th>Metric</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="expenses">
                        <td>Total Expenses</td>
                        <td class="value">{{ $reportData['total_expenses'] }} DH</td>
                    </tr>
                    <tr class="income">
                        <td>Total Income</td>
                        <td class="value">{{ $reportData['total_income'] }} DH</td>
                    </tr>
                    <tr class="savings">
                        <td>Total Savings</td>
                        <td class="value">{{ $reportData['total_savings'] }} DH</td>
                    </tr>
                    <tr class="available">
                        <td>Available Amount</td>
                        <td class="value">{{ $reportData['available_amount'] }} DH</td>
                    </tr>
                    <tr class="goals">
                        <td>Total Goals</td>
                        <td class="value">{{ $reportData['total_goals'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>