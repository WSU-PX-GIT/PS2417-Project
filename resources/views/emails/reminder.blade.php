<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            background-color: #f4f4f4;
            padding: 20px 0;
        }
        .email-content {
            background-color: white;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #dddddd;
            border-radius: 8px;
            text-align: center;
        }
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #999999;
            margin-top: 20px;
        }
        .footer a {
            color: #999999;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="email-content">
        <h1>CPD Compliance Reminder</h1>

        <p>Dear {{ $agentName }},</p>

        <p>This is a friendly reminder to check and update your records in our system.</p>

        <p>Please log in to review your current status and ensure all required tasks are completed before the upcoming deadlines.</p>

        <p>If you have any questions or need assistance, feel free to contact us at <a href="mailto:support@cpdtracking.com">support@cpdtracking.com</a>.</p>

        <p>Best regards,<br>
            The CPDTracking Team</p>

        <p><a href="cpdtracking.com/login" class="button">Log In to Your Account</a></p>
    </div>

    <div class="footer">
        <p>For assistance, contact <a href="mailto:support@cpdtracking.com">support@cpdtracking.com</a>.</p>
    </div>
</div>
</body>
</html>
