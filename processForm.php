<?php
$first_name=$_POST['firstName'];
$last_name=$_POST['lastName'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$companyName=$_POST['companyName'];

$description = $_POST['description'];

header('Content-Type: application/json');
echo json_encode(array('firstName' => $first_name, 'lastName' => $last_name, 'email' => $email, 'subject' => $subject, 'companyName' => $companyName, 'description' => $description));
?>

