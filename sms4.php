
<?php
require "twilio-php/Services/Twilio.php";





	# code...









$AccountSid = "AC4950c83b45e72f15f6a6b01ae1c19f6c";
$AuthToken = "6c84afdbe090ae3c9139e69b314b7f24";

$http = new Services_Twilio_TinyHttp(
    'https://api.twilio.com',
    array('curlopts' => array(
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
    ))
);
$client = new Services_Twilio($AccountSid, $AuthToken, "2010-04-01", $http);

$people = array(
        "+353899542344" => "soffyan",
    );
  foreach ($people as $number => $name) {

        $sms = $client->account->messages->sendMessage(
        // Step 6: Change the 'From' number below to be a valid Twilio number 
        // that you've purchased, or the (deprecated) Sandbox number
            "+15037665066", 
           // the number we are sending to - Any phone number
            $number,

            // the sms body
            "Hey $name,Contact the doctor immediatly your heart rate is unusual [Note : If your are doing Workout better to take rest] "
        );
        // Display a confirmation message on the screen
    }

?>
