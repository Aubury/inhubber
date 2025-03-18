<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars($_POST['first-name']);
    $last_name = htmlspecialchars($_POST['last-name']);
    $email = filter_var($_POST['work-email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone-number']);
    $company = htmlspecialchars($_POST['company-name']);
    $company_size = htmlspecialchars($_POST['company-size']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    $to = get_option('admin_email');
    $subject = "New Demo Request";
    $message = "Name: $first_name $last_name\n" .
        "Email: $email\n" .
        "Phone: $phone\n" .
        "Company: $company\n" .
        "Company Size: $company_size";
    $headers = "From: no-reply@example.com\r\nReply-To: $email";

    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you! Your request has been sent.";
    } else {
        echo "Error sending request. Please try again later.";
    }
} else {
    header("Location: /");
    exit();
}