<?php

$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'https://web.njit.edu/~dvh4/website/home.php');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$phoneList = curl_exec($cURLConnection);
curl_close($cURLConnection);

// $jsonArrayResponse - json_decode($phoneList);


$postRequest = array(
    'username' => 'foo',
    'username' => 'bar',
);

$cURLConnection = curl_init('https://web.njit.edu/~dvh4/website/home.php');
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$apiResponse = curl_exec($cURLConnection);
print_r($apiResponse);
curl_close($cURLConnection);

// $apiResponse - available data from the API request
// $jsonArrayResponse - json_decode($apiResponse)
?>
