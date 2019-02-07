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

	$link_0_content = '';
	$link_1_content = '';
	$link_2_content = '';

	$plugin_qlsc_data = get_option('plugin_nmole_qlsc_options');
	foreach ($plugin_qlsc_data as $index) {  // index loop for current_data
		foreach ($index as $data) {
			if ($data['id'] === $qlsc_quick_link_link_0) {
				$link_0_content = $data;
			}
			if ($data['id'] === $qlsc_quick_link_link_1) {
				$link_1_content = $data;
			}
			if ($data['id'] === $qlsc_quick_link_link_2) {
				$link_2_content = $data;
			}
		}
	}