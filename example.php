<?php	
	require_once 'alchemyapi.php';
	$alchemyapi = new AlchemyAPI();
	


	$demo_text = 'Yesterday dumb Bob destroyed my fancy iPhone in beautiful Denver, Colorado. I guess I will have to head over to the Apple Store and buy a new one.';
	$demo_url = 'http://blog.programmableweb.com/2011/09/16/new-api-billionaire-text-extractor-alchemy/';
	$demo_html = '<html><head><title>Python Demo | AlchemyAPI</title></head><body><h1>Did you know that AlchemyAPI works on HTML?</h1><p>Well, you do now.</p></body></html>';


	echo PHP_EOL;
	echo PHP_EOL;  
	echo '            ,                                                                                                                              ', PHP_EOL;
	echo '      .I7777~                                                                                                                              ', PHP_EOL;
	echo '     .I7777777                                                                                                                             ', PHP_EOL;
	echo '   +.  77777777                                                                                                                            ', PHP_EOL;
	echo ' =???,  I7777777=                                                                                                                          ', PHP_EOL;
	echo '=??????   7777777?   ,:::===?                                                                                                              ', PHP_EOL;
	echo '=???????.  777777777777777777~         .77:    ??           :7                                              =$,     :$$$$$$+  =$?          ', PHP_EOL;
	echo ' ????????: .777777777777777777         II77    ??           :7                                              $$7     :$?   7$7 =$?          ', PHP_EOL;
	echo '  .???????=  +7777777777777777        .7 =7:   ??   :7777+  :7:I777?    ?777I=  77~777? ,777I I7      77   +$?$:    :$?    $$ =$?          ', PHP_EOL;
	echo '    ???????+  ~777???+===:::         :7+  ~7   ?? .77    +7 :7?.   II  7~   ,I7 77+   I77   ~7 ?7    =7:  .$, =$    :$?  ,$$? =$?          ', PHP_EOL;
	echo '    ,???????~                        77    7:  ?? ?I.     7 :7     :7 ~7      7 77    =7:    7  7    7~   7$   $=   :$$$$$$~  =$?          ', PHP_EOL;
	echo '    .???????  ,???I77777777777~     :77777777~ ?? 7:        :7     :7 777777777:77    =7     7  +7  ~7   $$$$$$$$I  :$?       =$?          ', PHP_EOL;
	echo '   .???????  ,7777777777777777      7=      77 ?? I+      7 :7     :7 ??      7,77    =7     7   7~ 7,  =$7     $$, :$?       =$?          ', PHP_EOL;
	echo '  .???????. I77777777777777777     +7       ,7???  77    I7 :7     :7  7~   .?7 77    =7     7   ,77I   $+       7$ :$?       =$?          ', PHP_EOL;
	echo ' ,???????= :77777777777777777~     7=        ~7??  ~I77777  :7     :7  ,777777. 77    =7     7    77,  +$        .$::$?       =$?          ', PHP_EOL;
	echo ',???????  :7777777                                                                                77                                       ', PHP_EOL;
	echo ' =?????  ,7777777                                                                               77=                                        ', PHP_EOL;
	echo '   +?+  7777777?                                                                                                                           ', PHP_EOL;
	echo '    +  ~7777777                                                                                                                            ', PHP_EOL;
	echo '       I777777                                                                                                                             ', PHP_EOL;
	echo '          :~                                                                                                                               ', PHP_EOL;



	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   Entity Extraction Example              #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing text: ', $demo_text, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->entities('text',$demo_text, array('sentiment'=>1));

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Entities ##', PHP_EOL;
		foreach ($response['entities'] as $entity) {
			echo 'text: ', $entity['text'], PHP_EOL;
			echo 'type: ', $entity['type'], PHP_EOL;
			echo 'relevance: ', $entity['relevance'], PHP_EOL;
			echo 'sentiment: ', $entity['sentiment']['type'], ' (' . $entity['sentiment']['score'] . ')', PHP_EOL;
			echo PHP_EOL;
		}
	} else {
		echo 'Error in the entity extraction call: ', $response['statusInfo'];
	}


	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   Sentiment Analysis Example             #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing HTML: ', $demo_html, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->sentiment('html',$demo_html, null);

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Document Sentiment ##', PHP_EOL;
		echo 'type: ', $response['docSentiment']['type'], PHP_EOL;
		echo 'score: ', $response['docSentiment']['score'], PHP_EOL;
	} else {
		echo 'Error in the sentiment analysis call: ', $response['statusInfo'];
	}



	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   Keyword Extraction Example             #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing text: ', $demo_text, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->keywords('text',$demo_text, array('sentiment'=>1));

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Keywords ##', PHP_EOL;
		foreach ($response['keywords'] as $keyword) {
			echo 'text: ', $keyword['text'], PHP_EOL;
			echo 'relevance: ', $keyword['relevance'], PHP_EOL;
			echo 'sentiment: ', $keyword['sentiment']['type'], ' (' . $keyword['sentiment']['score'] . ')', PHP_EOL;
			echo PHP_EOL;
		}
	} else {
		echo 'Error in the keyword extraction call: ', $response['statusInfo'];
	}


	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   Concept Tagging Example                 #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing text: ', $demo_text, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->concepts('text',$demo_text, null);

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Concepts ##', PHP_EOL;
		foreach ($response['concepts'] as $concept) {
			echo 'text: ', $concept['text'], PHP_EOL;
			echo 'relevance: ', $concept['relevance'], PHP_EOL;
			echo PHP_EOL;
		}
	} else {
		echo 'Error in the concept tagging call: ', $response['statusInfo'];
	}


	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   Relation Extraction Example            #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing text: ', $demo_text, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->relations('text',$demo_text, null);

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Relations ##', PHP_EOL;
		foreach ($response['relations'] as $relation) {
			if (array_key_exists('subject', $relation)) {
				echo 'Subject: ', $relation['subject']['text'], PHP_EOL;
			}

			if (array_key_exists('action', $relation)) {
				echo 'Action: ', $relation['action']['text'], PHP_EOL;
			}

			if (array_key_exists('object', $relation)) {
				echo 'Object: ', $relation['object']['text'], PHP_EOL;
			}
			echo PHP_EOL;
		}
	} else {
		echo 'Error in the relation extraction call: ', $response['statusInfo'];
	}


	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   Text Categorization Example            #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing text: ', $demo_text, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->category('text',$demo_text, null);

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Category ##', PHP_EOL;
		echo 'text: ', $response['category'], PHP_EOL;
		echo 'score: ', $response['score'], PHP_EOL;
	} else {
		echo 'Error in the text categorization call: ', $response['statusInfo'];
	}


	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   Language Detection Example             #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing text: ', $demo_text, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->language('text',$demo_text, null);

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Language ##', PHP_EOL;
		echo 'language: ', $response['language'], PHP_EOL;
		echo 'iso-639-1: ', $response['iso-639-1'], PHP_EOL;
		echo 'native speakers: ', $response['native-speakers'], PHP_EOL;
	} else {
		echo 'Error in the language detection call: ', $response['statusInfo'];
	}


	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   Author Extraction Example              #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing url: ', $demo_url, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->author('url',$demo_url, null);

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Author ##', PHP_EOL;
		echo 'author: ', $response['author'], PHP_EOL;
	} else {
		echo 'Error in the author extraction call: ', $response['statusInfo'];
	}


	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   Feed Detection Example                   #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing url: ', $demo_url, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->feeds('url',$demo_url, null);

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Feeds ##', PHP_EOL;
		foreach ($response['feeds'] as $feed) {
			echo 'feed: ', $feed['feed'], PHP_EOL;
		}
	} else {
		echo 'Error in the feed detection call: ', $response['statusInfo'];
	}
	
	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#      Text Extraction Example             #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing url: ', $demo_url, PHP_EOL;
	echo PHP_EOL;
	
	echo "----The following call will render e.g. apostrophes as â€tm";
	echo "----Thus the text is not being rendered properly";
	$response = $alchemyapi->text_clean('url', $demo_url, null);
	if ($response['status'] == 'OK') {
		
		print_r($response['text']);
		
	} else {
		echo 'Error in the feed detection call: ', $response['statusInfo'];
	}
	
	echo "----By changing the encoding to UTF-8 through the following function,";
	echo "----we are able to fix this";
	//For more info: http://stackoverflow.com/questions/4583369/an-apostrophe-is-rendering-as-atm-what-php-function-will-display-it-as-som
	$response = $alchemyapi->text_clean('url', $demo_url, null);
	if ($response['status'] == 'OK') {
		
		print_r(mb_convert_encoding($response['text'], "HTML-ENTITIES", "UTF-8"));
		
	} else {
		echo 'Error in the feed detection call: ', $response['statusInfo'];
	}
	


	echo PHP_EOL;
	echo PHP_EOL;

?>
