<?php

    include "routes.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $data = array(
        'fullname' => $fullname,
        'username' => $username,
        'email' => $email,
        'password' => $password
    );

    $json_data = json_encode($data);

    $ch = curl_init($SIGNUP_URL);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    
    $result = curl_exec($ch);

    curl_close($ch);
    
    echo $result;

}
?>
