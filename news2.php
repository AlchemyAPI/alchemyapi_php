<?php
// create a new cURL resource
$ch = curl_init();

$string="EarthquakeIndia";
$url = "https://ajax.googleapis.com/ajax/services/search/news?v=1.0&q=".$string;
// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);
?>