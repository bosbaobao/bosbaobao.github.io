<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

$sheet = $_SERVER["DOCUMENT_ROOT"] . "/contacts.xlsx";

$file = fopen($sheet, "a");
fwrite($file, $name . "," . $email . "," . $subject . "," . $message . "\n");
fclose($file);

echo "Your message has been sent!";


require_once "vendor/autoload.php";

use Google\Client;
use Google\Service\Drive;

// Create a Google client object
$client = new Client();

// Set the OAuth 2.0 credentials
$client->setCredentials(new \Google\Auth\Credentials\ApplicationDefaultCredentials());

// Create a Drive service object
$drive = new Drive($client);

// Get the ID of the Google Doc you want to connect to
$docId = "1FWnHaDy3BVJtkVDW0gLuztQrl3DY5kS4cnFUfrF-5Z8";

// Get the Google Doc
$doc = $drive->files->get($docId);

// Do something with the Google Doc
echo $doc->getName();

?>