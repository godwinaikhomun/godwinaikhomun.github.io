<?php
// Get the message from the HTML form
$name = $_POST['name'];
$email = $_POST['email'];
$body = $_POST['message'];
// Combine the form fields into a single message
$message = "Name: $name\nEmail: $email\nBody: $body";
$topic = 'my-portwebfolio';

// Send a POST request to the topic URL
$ch = curl_init('https://ntfy.sh/' . $topic);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, ['message' => $message]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
  echo curl_error($ch);
} else {
  echo 'Notification sent successfully!';
}

curl_close($ch);

// Reload a different webpage using JavaScript
echo '<script type="text/javascript">window.location.href = "https://godwinaikhomun.github.io";</script>';

exit(); // Ensure that no further code is executed after the redirect

?>
