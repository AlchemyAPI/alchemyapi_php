<?php
	$string="EarthquakeIndia";

	$url = "https://ajax.googleapis.com/ajax/services/search/news?v=1.0&q=".$string;

	// sendRequest
	// note how referer is set manually
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	//curl_setopt($ch, CURLOPT_REFERER, /* Enter the URL of your site here */);
	$body = curl_exec($ch);
	curl_close($ch);

	// now, process the JSON string
	//echo $body;
	//var_dump(json_decode($body));
	$json = json_decode($body);
	//var_dump($json);

	if ($json->responseStatus == 200) {
		$results=$json->responseData->results;
		//var_dump($results);
		echo PHP_EOL;
		echo '## Links ##', PHP_EOL;
		foreach ($results as $var) {
			
			echo 'Title: ', $var->titleNoFormatting, PHP_EOL;
			echo 'Published Date: ', $var->publishedDate, PHP_EOL;
			echo 'Publisher: ', $var->publisher, PHP_EOL;
			echo 'URL: ', $var->url, PHP_EOL;	
			//echo 'Content: ', $var->content, PHP_EOL;		
			
			echo PHP_EOL;
			echo PHP_EOL;

			//related stories
			$related = (isset($var->relatedStories) ? $var->relatedStories : false);
			if($related){

				foreach ($related as $var2) {
				
					echo 'Title: ', $var2->titleNoFormatting, PHP_EOL;
					echo 'Published Date: ', $var2->publishedDate, PHP_EOL;
					echo 'Publisher: ', $var2->publisher, PHP_EOL;
					echo 'URL: ', $var2->url, PHP_EOL;	
					//echo 'Content: ', $var->content, PHP_EOL;		
					
					echo PHP_EOL;
					echo PHP_EOL;
				}
			}
		}
	} else {
		echo 'Error in the news extraction ', $json->responseDetails;
	}
?>