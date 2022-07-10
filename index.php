<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

// use explode to split the string text response from Africa's talking gateway into an array.
$ussd_string_exploded = explode("*", $text);
// Get ussd menu level number from the gateway
$level = count($ussd_string_exploded);

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON WELCOME TO SIMREG_LS \n";
    $response .= "1. Register \n";
    $response .= "2. Check_Reg-Details \n";
    $response .= "3. Check_Reg-Numbers \n";
    $response .= "4. About T&Cs";
	

} else if ($text == "1") {
	
   // Function that handles Registration menu
    $response = "CON is the given $phoneNumber  Your phoneNumber ? \n";
    $response .= "1. Yes \n";
	$response .= "2. No \n";

} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
   $response = "END This is the system to capture all necessary data as to stand against Identity Fraud!.";

} else if ($text == "3") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "CON The List below are Your Registered phoneNumbers \n";
    $response = "CON  $phoneNumber  \n";

} 	

else if ($text == "3") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
   $response = "END This is the system to capture all necessary data as to stand against Identity Fraud!.";

} else if($text == "1*1") { 
    // when use response with option django
    $response = "CON Please enter your first name";
	
} else if ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 1 && $level == 3) {
    $response = "CON Please enter your last name";
	
} else if ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 1 && $level == 4) {
    $response = "CON Please enter your National ID_Number";
			

} else if ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 1 && $level == 5) {
    // save data in the database
    $response = "END Your data has been captured successfully! Thank you for registering with Simreg_ls.";


} else if ($text == "1*2") {
    // Our response a user respond with input 1*2 from our first level 
    $response = "END, Thank you for your assistance to stop fraud!.";
} 

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;