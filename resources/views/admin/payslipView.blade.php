<!DOCTYPE html>
<html>
<head>
    <title>Payslip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }

        .header, .footer {
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            font-size: 16px;
            margin: 5px 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .footer p {
            margin: 5px 0;
            font-size: 14px;
        }

        .divider {
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }

        .amount {
            text-align: right;
        }

        .section-header {
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }

        .line {
            text-align: center;
            margin: 5px 0;
        }

        .company-info, .employee-info {
            width: 48%;
            display: inline-block;
            vertical-align: top;
        }

        .company-logo {
            width: 100px;
            height: 100px;
            background-color: #ccc;
            display: inline-block;
        }

        .company-info {
            float: left;
            width: 48%;
        }

        .employee-info {
            float: right;
            width: 48%;
        }

        .account-details {
            text-align: center;
            font-size: 16px;
        }

        .salary-summary {
            margin-top: 20px;
        }

        
        .clearfix {
            clear: both;
        }

    </style>
</head>
<body>

<div class="container">

   
    <div class="company-info">
        <div>
            <p>Jamuki</p>
            <p>Date: {{ date('d-M-Y') }}</p>
        </div>
        
    </div>

    <div class="employee-info">
        <div>
            <p>Payslip for: {{ $employee->name }}</p>
            <p>Employee ID: {{ $employee->employee_id }}</p>
            <p>Designation: {{ $employee->designation->name }}</p>
            <p>Period: {{ \Carbon\Carbon::now()->startOfMonth()->format('d-M-Y') }} to {{ \Carbon\Carbon::now()->endOfMonth()->format('d-M-Y') }}</p>

        </div>
    </div>

    <div class="clearfix"></div>

  
    <div class="section-header">-------------------------------------------------------------<br>EARNINGS:<br>-------------------------------------------------------------</div>
    <table class="table">
        <tr>
            <td>Basic Salary</td>
            <td class="amount">Ksh {{ number_format($salary->basic_salary, 2) }}</td>
        </tr>
        <tr>
            <td>House Rent Allowance (HRA)</td>
            <td class="amount">Ksh {{ number_format($salary->house_allowance, 2) }}</td>
        </tr>
        <tr>
            <td>Medical Allowance</td>
            <td class="amount">Ksh {{ number_format($salary->medical_allowance, 2) }}</td>
        </tr>
        <tr>
            <td>Bonus</td>
            <td class="amount">Ksh {{ number_format($salary->bonus, 2) }}</td>
        </tr>
        <tr>
            <td class="total">-------------------------------------------------------------</td>
        </tr>
        <tr>
            <td><strong>Total Earnings</strong></td>
            <td class="amount">Ksh {{ number_format($salary->gross_salary, 2) }}</td>
        </tr>
    </table>

  
    <div class="section-header">-------------------------------------------------------------<br>DEDUCTIONS:<br>-------------------------------------------------------------</div>
    <table class="table">
        <tr>
            <td>Income Tax (PAYE)</td>
            <td class="amount">Ksh {{ number_format($salary->tax, 2) }}</td>
        </tr>
        <tr>
            <td>SHIF</td>
            <td class="amount">Ksh {{ number_format($salary->nhif, 2) }}</td>
        </tr>
        <tr>
            <td>NSSF</td>
            <td class="amount">Ksh {{ number_format($salary->nssf, 2) }}</td>
        </tr>
        <tr>
            <td>Loan Repayment</td>
            <td class="amount">Ksh {{ number_format($salary->other_deductions, 2) }}</td>
        </tr>
        <tr>
            <td class="total">-------------------------------------------------------------</td>
        </tr>
        <tr>
            <td><strong>Total Deductions</strong></td>
            <td class="amount">Ksh {{ number_format($salary->total_deductions, 2) }}</td>
        </tr>
    </table>

    
    <div class="section-header">-------------------------------------------------------------<br>NET PAY:<br>-------------------------------------------------------------</div>
    <table class="table">
        <tr>
            <td><strong>Net Pay</strong></td>
            <td class="amount">Ksh {{ number_format($salary->net_salary, 2) }}</td>
        </tr>
    </table>


    <div class="account-details">
        <div class="section-header">-------------------------------------------------------------<br>Bank Account:<br>-------------------------------------------------------------</div>
        <p>Bank: {{ $employee->bank_name }}</p>
        <p>Account Number: {{ $employee->account_number }}</p>
    </div>

   
    <div class="footer">
        <p>For inquiries, contact: jamuki@hr.com | +254 712345678</p>
    </div>



</body>
</html>
