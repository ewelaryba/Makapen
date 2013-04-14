<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
   echo "<h1>Error</h1>\n
      <p>Accessing this page directly is not allowed.</p>";
   exit;
}

$email = preg_replace("([\r\n])", "", $email);

$find = "/(content-type|bcc:|cc:)/i";
if (preg_match($find, $first_name) || preg_match($find, $last_name) || preg_match($find, $email) || preg_match($find, $project_subject) || preg_match($find, $description)) {
   echo "<h1>Error</h1>\n
      <p>No meta/header injections, please.</p>";
   exit;
}

$headers = "From: form@makapen.net\r\n";
$headers .= "From: form@makapen.net\r\n";
$headers .= "X-Mailer: PHP/".phpversion();

$to = "form@makapen.net";
$subject = "Project Form Submission";

$first_name=$_POST['firstName'];
$last_name=$_POST['lastName'];
$email=$_POST['email'];
$project_subject=$_POST['subject'];
$companyName=$_POST['companyName'];

$description = $_POST['description'];

$message = "From: ".$first_name." ".$last_name."\r\n";
$message .= "At company: ".$companyName."\r\n";
$message .= "Concerning: ".$project_subject."\r\n";
$message .= "Project Details: ".$description."\r\n";
$message .= "Reply To: ".$email."\r\n";
// make sure each line doesn't exceed 70 characters
$message = wordwrap($message, 150);

$isMailSent = mail($to, $subject, $message, $headers);


header('Content-Type: application/json');
echo json_encode(array('$isMailSent' => $isMailSent));
?>

