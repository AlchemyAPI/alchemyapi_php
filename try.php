<?php
    require_once 'alchemyapi.php';
    $alchemyapi = new AlchemyAPI('85ca1b3ff37b30f9b3380f69fa7d35871d2a168a');

    $demo_text = 'Yesterday dumb Bob destroyed my fancy iPhone in beautiful Denver, Colorado. I guess I will have to head over to the Apple Store and buy a new one.';

    $response = $alchemyapi->entities('text',$demo_text, array('sentiment'=>1));

    $string="";

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Entities ##', PHP_EOL;
		foreach ($response['entities'] as $entity) {
			$string .= $entity['text'];
			$string .= " ";
			echo 'entity: ', $entity['text'], PHP_EOL;
			echo 'type: ', $entity['type'], PHP_EOL;
			echo 'relevance: ', $entity['relevance'], PHP_EOL;
			echo 'sentiment: ', $entity['sentiment']['type']; 			
			if (array_key_exists('score', $entity['sentiment'])) {
				echo ' (' . $entity['sentiment']['score'] . ')', PHP_EOL;
			} else {
				echo PHP_EOL;
			}
			
			echo PHP_EOL;
		}
	} else {
		echo 'Error in the entity extraction call: ', $response['statusInfo'];
	}
	echo $string;

	/*$url = "https://ajax.googleapis.com/ajax/services/search/news?" .
       "v=1.0&q=".$string."&userip=INSERT-USER-IP";

	// sendRequest
	// note how referer is set manually
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$body = curl_exec($ch);
	curl_close($ch);

	// now, process the JSON string
	$json = json_decode($body);*/
?>