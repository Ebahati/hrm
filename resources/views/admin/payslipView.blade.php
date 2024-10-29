<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payslip</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; }
        .table th { background-color: #f2f2f2; text-align: left; }
    </style>
</head>
<body>

    <div class="header">
        <h2>Payslip</h2>
        <p>Employee ID: {{ $employee->employee_id }}</p>
        <p>Name: {{ $employee->name }}</p>
        <p>Designation: {{ $employee->designation }}</p>
    </div>

    <table class="table">
        <tr>
            <th>Basic Salary</th>
            <td>{{ $salary->basic_salary }}</td>
        </tr>
        <tr>
            <th>Bonus</th>
            <td>{{ $salary->bonus }}</td>
        </tr>
        <tr>
            <th>Medical Allowance</th>
            <td>{{ $salary->medical_allowance }}</td>
        </tr>
        <tr>
            <th>House Allowance</th>
            <td>{{ $salary->house_allowance }}</td>
        </tr>
        <tr>
            <th>NHIF</th>
            <td>{{ $salary->nhif }}</td>
        </tr>
        <tr>
            <th>NSSF</th>
            <td>{{ $salary->nssf }}</td>
        </tr>
        <tr>
            <th>Tax</th>
            <td>{{ $salary->tax }}</td>
        </tr>
        <tr>
            <th>Deductions</th>
            <td>{{ $salary->deductions }}</td>
        </tr>
        <tr>
            <th>Total Deductions</th>
            <td>{{ $salary->total_deductions }}</td>
        </tr>
        <tr>
            <th>Gross Salary</th>
            <td>{{ $salary->gross_salary }}</td>
        </tr>
        <tr>
            <th>Net Salary</th>
            <td>{{ $salary->net_salary }}</td>
        </tr>
    </table>

</body>
</html>
