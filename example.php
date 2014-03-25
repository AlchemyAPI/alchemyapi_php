<?php	
/**
   Copyright 2013 AlchemyAPI

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
*/

	require_once 'alchemyapi.php';
	$alchemyapi = new AlchemyAPI();
	

	$demo_text = 'Yesterday dumb Bob destroyed my fancy iPhone in beautiful Denver, Colorado. I guess I will have to head over to the Apple Store and buy a new one.';
	$demo_url = 'http://www.npr.org/2013/11/26/247336038/dont-stuff-the-turkey-and-other-tips-from-americas-test-kitchen';
	$demo_html = '<html><head><title>PHP Demo | AlchemyAPI</title></head><body><h1>Did you know that AlchemyAPI works on HTML?</h1><p>Well, you do now.</p></body></html>';


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
			echo 'keyword: ', $keyword['text'], PHP_EOL;
			echo 'relevance: ', $keyword['relevance'], PHP_EOL;
			echo 'sentiment: ', $keyword['sentiment']['type']; 			
			if (array_key_exists('score', $keyword['sentiment'])) {
				echo ' (' . $keyword['sentiment']['score'] . ')', PHP_EOL;
			} else {
				echo PHP_EOL;
			}
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
			echo 'concept: ', $concept['text'], PHP_EOL;
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
		echo 'sentiment: ', $response['docSentiment']['type'], PHP_EOL;
		if (array_key_exists('score', $response['docSentiment'])) {
			echo 'score: ', $response['docSentiment']['score'], PHP_EOL;
		}
	} else {
		echo 'Error in the sentiment analysis call: ', $response['statusInfo'];
	}


	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   Targeted Sentiment Analysis Example    #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing text: ', $demo_text, PHP_EOL;
	echo 'Target: Denver, Colorado', PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->sentiment_targeted('text',$demo_text,'Denver', null);

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Targeted Sentiment ##', PHP_EOL;
		echo 'sentiment: ', $response['docSentiment']['type'], PHP_EOL;
		if (array_key_exists('score', $response['docSentiment'])) {
			echo 'score: ', $response['docSentiment']['score'], PHP_EOL;
		}
	} else {
		echo 'Error in the targeted sentiment analysis call: ', $response['statusInfo'];
	}
	

	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   Text Extraction Example                #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing url: ', $demo_url, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->text('url', $demo_url, null);

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Extracted Text ##', PHP_EOL;
		echo 'text: ',PHP_EOL, $response['text'], PHP_EOL;
	} else {
		echo 'Error in the text extraction call: ', $response['statusInfo'];
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
	echo '#   Title Extraction Example               #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing url: ', $demo_url, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->title('url',$demo_url, null);

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Title ##', PHP_EOL;
		echo 'title: ', $response['title'], PHP_EOL;
	} else {
		echo 'Error in the title extraction call: ', $response['statusInfo'];
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
		echo 'category: ', $response['category'], PHP_EOL;
		echo 'score: ', $response['score'], PHP_EOL;
	} else {
		echo 'Error in the text categorization call: ', $response['statusInfo'];
	}


	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   Feed Detection Example                 #', PHP_EOL;
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
	echo '#   Microformats Parsing Example           #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing url: ', $demo_url, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->microformats('url',$demo_url, null);

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Microformats ##', PHP_EOL;
		foreach ($response['microformats'] as $microformat) {
			echo 'field: ', $microformat['field'], PHP_EOL;
			echo 'data: ', $microformat['data'], PHP_EOL, PHP_EOL;
		}
	} else {
		echo 'Error in the microformat parsing call: ', $response['statusInfo'];
	}
	
	
	echo PHP_EOL;
	echo PHP_EOL;

	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   Image Extraction Example               #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing url: ', $demo_url, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->imageExtraction('url',$demo_url, null);

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Image ##', PHP_EOL;
		echo 'Image: ', $response['image'], PHP_EOL;
	} else {
		echo 'Error in the image extraction call: ', $response['statusInfo'];
	}
	
	
	echo PHP_EOL;
	echo PHP_EOL;

	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   taxonomy Example                       #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing text: ', $demo_text, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->taxonomy('text',$demo_text, null);

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		echo '## Categories ##', PHP_EOL;
		foreach ($response['taxonomy'] as $category) {
		  echo $category['label'], ' : ', $category['score'], PHP_EOL;
		}
	} else {
		echo 'Error in the taxonomy call: ', $response['statusInfo'];
	}
		
	echo PHP_EOL;
	echo PHP_EOL;

	echo PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	echo '############################################', PHP_EOL;
	echo '#   combined Example                       #', PHP_EOL;
	echo '############################################', PHP_EOL;
	echo PHP_EOL;
	echo PHP_EOL;
	
	echo 'Processing text: ', $demo_text, PHP_EOL;
	echo PHP_EOL;

	$response = $alchemyapi->combined('text',$demo_text, null);

	if ($response['status'] == 'OK') {
		echo '## Response Object ##', PHP_EOL;
		echo print_r($response);

		echo PHP_EOL;
		
		echo '## Keywords ##', PHP_EOL;
		foreach ($response['keywords'] as $keyword) {
		  echo $keyword['text'], ' : ', $keyword['relevance'], PHP_EOL;
		}
		echo PHP_EOL;
		
		echo '## Concepts ##', PHP_EOL;
		foreach ($response['concepts'] as $concept) {
		  echo $concept['text'], ' : ', $concept['relevance'], PHP_EOL;
		}
		echo PHP_EOL;

		echo '## Entities ##', PHP_EOL;
		foreach ($response['entities'] as $entity) {
		  echo $entity['type'], ' : ', $entity['text'], ' , ', $entity['relevance'], PHP_EOL;
		}
		echo PHP_EOL;
	} else {
		echo 'Error in the taxonomy call: ', $response['statusInfo'];
	}
		
	echo PHP_EOL;
	echo PHP_EOL;

?>
