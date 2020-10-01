// to get data from a website 
<?php

$curl = curl_init("https://www.zillow.com/homedetails/765-Johnston-Dr-Watchung-NJ-07069/39921061_zpid/");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$html = curl_exec($curl);

if(!empty($curl)){
$thispage = new DOMDocument;
libxml_use_internal_errors(true);
$thispage->loadHTML($html);
libxml_clear_errors();
$xpath = new DOMXPath($thispage);
$status = $xpath->evaluate('string(//*[@id"home-value-wrapper"])');
echo $status;
}
