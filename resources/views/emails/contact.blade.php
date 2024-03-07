<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>

<body>
    <p>Name: {{ $formData['name'] }}</p>
    <p>Email: {{ $formData['email'] }}</p>
    <p>Subject: {{ $formData['subject'] }}</p>
    <p>Message: {{ $formData['message'] }}</p>
</body>

</html>
