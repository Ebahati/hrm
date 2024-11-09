<!DOCTYPE html>
<html>
<head>
    <title>Payslip</title>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Payslip for {{ $employee->name }}</h1>
        <p>Employee ID: {{ $employee->employee_id }}</p>
     
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
            <th>SHIF</th>
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

    <div class="footer">
        <p>Generated on {{ date('F d, Y') }}</p>
        <p>If you have any questions, please contact HR.</p>
    </div>
</div>

</body>
</html>
