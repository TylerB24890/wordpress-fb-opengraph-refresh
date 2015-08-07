<?php

/*
 *	Refresh Facebook Scraper on Post Publish
 *	@author	Tyler Bailey - 2015
 */
function refresh_fb_scraper( $ID, $post ) {

	// The Post URL
	$post_url = get_permalink($post->ID);

	// FB Open Graph URL
	$curl_url = "https://graph.facebook.com";

	// Parameters
	$fields = array(
		'id' => $post_url,
		'scrape' => true,
	);

	// Add Parameters to URL
	$fields_string = "";
	foreach($fields as $key=>$value) {
		$fields_string .= $key . '=' . $value . '&';
	}
	rtrim($fields_string, '&');

	// Initiate cURL
	$ch = curl_init();

	// Set cURL Options
	curl_setopt($ch, CURLOPT_URL, $curl_url);
	curl_setopt($ch, CURLOPT_POST, count($fields));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

	// Execute cURL Request
	$result = curl_exec($ch);

	// Close cURL
	curl_close($ch);
}
add_action( 'publish_post', 'refresh_fb_scraper', 10, 3 );
