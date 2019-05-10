
<?php
/*
 * Soffyan Ali X13114531
 * This code is an adaptation of Google API URL Shortener example from Google PHP API github.
 * This was modified to work with Google Fit.
 * This example will count steps from a logged in user.
 */


// I created an Autoloader to load Google API classes
require_once 'google-api-php-client-2.2.2/vendor/autoload.php';

$APIKey = 'AIzaSyAr2V_xmDGNx55T4mZmTljcsrZ_OnMfMlg';
$client_id = '697824685017-528eon9741mep8purtppqetv6rcj42fu.apps.googleusercontent.com';
$client_secret = 'DQMNdysBXnI1qAJT-qUM71Lc';
$redirect_uri = 'http://localhost/BE_FIT_FINAL/dashboard.php';

//This template is nothing but some HTML. You can find it on github Google API example. 
include_once "base.php";

//Start your session.
///session_start();

$client = new Google_Client();
$client->setApplicationName('google-fit');
$client->setAccessType('online');
$client->setApprovalPrompt("auto");
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);

//$client->addScope(Google_Service_Fitness::FITNESS_ACTIVITY_READ);
$client->addScope(Google_Service_Fitness::FITNESS_BODY_READ);
$client->addScope(Google_Service_Fitness::FITNESS_ACTIVITY_READ);

$service = new Google_Service_Fitness($client);

/************************************************
If we're logging out we just need to clear our
local access token in this case
 ************************************************/
if (isset($_REQUEST['logout'])) {
    unset($_SESSION['access_token']);
}
/************************************************
If we have a code back from the OAuth 2.0 flow,
we need to exchange that with the authenticate()
function. We store the resultant access token
bundle in the session, and redirect to ourself.
 ************************************************/
if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    //header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
  //  echo "EXCHANGE";
}
/************************************************
If we have an access token, we can make
requests, else we generate an authentication URL.
 ************************************************/
// if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
//     $client->setAccessToken($_SESSION['access_token']);
//     echo "GOT IT";
//     echo "<pre>";

//     // Same code as yours
//     $dataSources = $service->users_dataSources;
//     $dataSets = $service->users_dataSources_datasets;

//     $listDataSources = $dataSources->listUsersDataSources("me");

//     $timezone = "GMT+0100";
//     $today = date("Y-m-d");
//     $endTime = strtotime($today.' 00:00:00 '.$timezone);
//     $startTime = strtotime('-1 day', $endTime);

//     while($listDataSources->valid()) {
//         $dataSourceItem = $listDataSources->next();
//         if ($dataSourceItem['dataType']['name'] == "com.google.step_count.delta") {
//             $dataStreamId = $dataSourceItem['dataStreamId'];
//             $listDatasets = $dataSets->get("me", $dataStreamId, $startTime.'000000000'.'-'.$endTime.'000000000');
//            // $listDatasets = $dataSets->get("me", $dataStreamId, $startTime.'000000000'.'-'.$endTime.'000000000');

//             $step_count = 0;
//             while($listDatasets->valid()) {
//                 $dataSet = $listDatasets->next();
//                 $dataSetValues = $dataSet['value'];

//                 if ($dataSetValues && is_array($dataSetValues)) {
//                     foreach($dataSetValues as $dataSetValue) {
//                        // echo $dataSetValue;
//                         $step_count += $dataSetValue['intVal'];
//                     }
//                 }
//             }
//             print("STEP: ".$step_count."<br />");
//             //echo $dataSets;
//             //print("STEP: ".$dataSet."<br />");

//         };
//     }

//     echo "</pre>";
// } else {
//     $authUrl = $client->createAuthUrl();
// }



 if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
    //echo "GOT IT";
    //echo "<pre>";

    // Same code as yours
    $dataSources = $service->users_dataSources;

    //echo $dataSources;
    $dataSets = $service->users_dataSources_datasets;
//echo $dataSets;
    $listDataSources = $dataSources->listUsersDataSources("me");

    //$timezone = "GMT+0100";
    $timezone = "UTC+0";
    $today = date("Y-m-d");
    $endTime = strtotime($today.' 23:59:00 '.$timezone);
    $startTime = strtotime('-1 day', $endTime);

    while($listDataSources->valid()) {
        $dataSourceItem = $listDataSources->next();
        //print_r($dataSourceItem);

//<<<<<<<<<<<<< Heart Rate Classes >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
        if ($dataSourceItem['dataType']['name'] == "com.google.heart_rate.bpm") {
            $dataStreamId = $dataSourceItem['dataStreamId'];
            //$listDatasets = $dataSets->get("me", $dataStreamId);
            //echo $listDatasets;
            $listDatasets = $dataSets->get("me", $dataStreamId, $startTime.'000000000'.'-'.$endTime.'000000000');
 
 //print_r($listDatasets);
            $step_count = 0;
            //while($listDatasets->valid()) {
            foreach ($listDatasets as $listDataset) {
                # code...
            //print_r($listDataset['value']);
             $dataSetValues = $listDataset['value'];
               // $dataSet = $listDatasets->next();
               // $dataSetValues = $dataSet['value'];
  //echo $dataSetValues;

             



             //print_r()
                if ($dataSetValues && is_array($dataSetValues)) {
                    foreach($dataSetValues as $dataSetValue) {
                       // echo "hi";
                       // echo $dataSetValue;
                        $step_count = $dataSetValue['fpVal'];
                    }
                }
          }
            //echo $step_count;
         //  print("Heart Rate: ".$step_count."<br />");
          // print_r($listDatasets);



            //echo $dataSetValue;
            //echo $dataSets;
            //print("STEP: ".$dataSet."<br />");

        };


// <<<<<<<<<<<<<<<<<<< Calories class calling >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
        if ($dataSourceItem['dataType']['name'] == "com.google.calories.expended") {
          // echo "in if";
          //echo "shi";
            $dataStreamId = $dataSourceItem['dataStreamId'];
            $listDatasets = $dataSets->get("me", $dataStreamId, $startTime.'000000000'.'-'.$endTime.'000000000');

            $step_count2 = 0;
           // echo "hi";
           // print_r ($listDatasets);
            while($listDatasets->valid()) {
                 //echo "in while2";
                    //print_r($listDatasets);
                $dataSet = $listDatasets->next();
                $dataSetValues = $dataSet['value'];

                if ($dataSetValues && is_array($dataSetValues)) {
                    foreach($dataSetValues as $dataSetValue) {
                       // echo "in if3";
                       // print_r($dataSetValue);
                        $step_count2 += $dataSetValue['fpVal'];
                         //print("STEP: ".$step_count."<br />");
                    }
                }
            }
           // echo "calories";
           // print("calories: ".$step_count2."<br />");
    //print_r($step_count);    
    };

// <<<<<<<<<<<<<<<<<<<<<<< Step count >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
if ($dataSourceItem['dataType']['name'] == "com.google.step_count.delta") {
          // echo "in if";
          //echo "shi";
            $dataStreamId = $dataSourceItem['dataStreamId'];
            $listDatasets = $dataSets->get("me", $dataStreamId, $startTime.'000000000'.'-'.$endTime.'000000000');

            $step_count3 = 0;
      //print_r ($listDatasets);
            while($listDatasets->valid()) {
                 //echo "in while2";
                   // print_r($listDatasets);
                $dataSet = $listDatasets->next();
                $dataSetValues = $dataSet['value'];

                if ($dataSetValues && is_array($dataSetValues)) {
                    foreach($dataSetValues as $dataSetValue) {
                       // echo "in if3";
                       // print_r($dataSetValue);
                        $step_count3 += $dataSetValue['intVal'];
                         //print("STEP: ".$step_count."<br />");
                    }
                }
            }
           // print("STEPs3: ".$step_count3."<br />");
    //print_r($step_count);    
   };



    }

   // echo "</pre>";
} else {
    $authUrl = $client->createAuthUrl();
}




/************************************************
If we're signed in and have a request to shorten
a URL, then we create a new URL object, set the
unshortened URL, and call the 'insert' method on
the 'url' resource. Note that we re-store the
access_token bundle, just in case anything
changed during the request - the main thing that
might happen here is the access token itself is
refreshed if the application has offline access.
 ************************************************/
if ($client->getAccessToken() && isset($_GET['url'])) {
    $_SESSION['access_token'] = $client->getAccessToken();
}

//Dumb example. You don't have to use the code below.
//echo pageHeader("User Query - URL Shortener");
if (strpos($client_id, "googleusercontent") == false) {
    echo missingClientSecretsWarning();
    exit;
}
?>

 

 <?php
 if (isset($step_count)){

   # insterting step count data in the users email
 
$conn = new mysqli("localhost","root","","be_fit");

$email = $_SESSION['login_user'];

$ch = curl_init();

//$step_count = (int)$step_count;
          

 $sql = "INSERT INTO user_health_status (heart_rate,calories,steps,email)
            VALUES ('$step_count','$step_count2','$step_count3','$email')";

                 if(mysqli_query($conn, $sql)){
                    $_SESSION['UNSUCCESS_MESSAGE']='Record Added Succesfully ...!!';
                     //header('Location: signup.php');

                 } else{
                     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                 }
               }
// ?>
