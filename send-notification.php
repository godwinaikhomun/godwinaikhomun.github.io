<?php
// Get the message from the HTML form
$message = $_POST['name'] . ' ' . $_POST['email'] . ' ' . $_POST['message'];
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

// Redirect back to the main page
header('Location: index.html');
exit(); // Ensure that no further code is executed after the redirect

?>
