<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail Template</title>
</head>
<body>
    Dear [{{$email_params['notify-user']['name']}}],
<p>
We would like to extend a warm welcome to you as a new member of our community! We are excited to have you join us and we look forward to providing you with the best experience possible.

As a member of our community, you will receive notifications regarding important updates, announcements, and events. We will also keep you informed about new features and services that may be of interest to you.

Please take a moment to familiarize yourself with our platform and the resources that are available to you. If you have any questions or concerns, please do not hesitate to reach out to our support team. We are here to help you and ensure that you have the best experience possible.

Thank you again for joining our community. We are excited to have you on board and look forward to working with you!
</p>

Best regards,
[{{$email_params['auth-user']['name']}}]
</body>
</html>




