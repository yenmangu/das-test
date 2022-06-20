<pre>
<?php

//define the variables for the form data and set to empty values
//also specify non-optional input fields
$firstNameErr = $lastNameErr = $emailErr = $telephpneErr = "";

$firstName = $lastName = $email = $telephpne = "";

//$applicants = [$firstName, $lastName, $email, $telephone];

function test_input($data) {
  $data = trim ($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
};


if ($_SERVER['REQUEST_METHOD'] ==  "POST") {
    
  if (empty($_POST["firstName"])) {
      $firstNameErr = "First Name is Required";
    } else {
      $firstName = test_input($_POST["firstName"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName)) {
          $nameErr = "Only letters and white space allowed";      
     }
   }
    

    if (empty($_POST["lastName"])) {
      $lastNameErr = "Last Name is Required";
    } else {
      $lastName = test_input($_POST["lastName"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) {
          $nameErr = "Only letters and white space allowed";
      }      
    }

    if (empty($_POST["email"])) {
      $emailErr = "email is Required";
    } else {
      $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["telephone"])) {
      $telephoneErr = "Contact Number is Required";
    } else {
      $telephone = test_input($_POST["telephone"]);
    }
};

$data = [
    "firstName" => $firstName,
    "lastName" => $lastName,
    "email" => $email,
    "telephone" => $telephone,
];

$applicants = http_build_query($data);

function submit($data) {
    $curl = curl_init();
    $header = array();
        $header[] = 'accept: text/plain';
        $header[] = 'X-API-KEY: 2528e9b2-7250-48fc-9371-4c13cd5991a4';
        $header[] = 'Content-Type: application/json-patch+json';
        $header[] = 'organisationId: d75acf39-07c4-4c63-995a-e7055c58c973';
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);        
    curl_setopt($curl, CURLOPT_URL, "https://https://api.smartr365.com/api/v1/mortgage/lead/create");
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $applicants);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    echo $response;
}


submit($data);

echo "var_dump". "<br>";
var_dump($_POST);
var_dump($data);
var_dump(headers_list());
var_dump($applicants);
?>

