<?php

	global $post;

	$qlsc_quick_link_title = get_post_meta( 
		$post->ID, 
		'qlsc_quick_link_title',
		TRUE
	);

	$qlsc_quick_link_contact_number = get_post_meta( 
		$post->ID, 
		'qlsc_quick_link_contact_number',
		TRUE
	);

	$qlsc_quick_link_link_0 = get_post_meta( 
		$post->ID, 
		'qlsc_quick_link_link_0',
		TRUE
	);

	$qlsc_quick_link_link_1 = get_post_meta( 
		$post->ID, 
		'qlsc_quick_link_link_1',
		TRUE
	);

	$qlsc_quick_link_link_2 = get_post_meta( 
		$post->ID, 
		'qlsc_quick_link_link_2',
		TRUE
	);

	$plugin_qlsc_data = get_option('plugin_nmole_qlsc_options');
	$plugin_qlsc_data_json = json_encode($plugin_qlsc_data);
	$plugin_qlsc_data_json = str_replace('"',"'", $plugin_qlsc_data_json);
