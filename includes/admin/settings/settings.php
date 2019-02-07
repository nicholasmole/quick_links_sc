<?php

	$current_data = get_option('plugin_nmole_qlsc_options');

	if (!$current_data) {
		
		$current_data = array();
	}
	// Check if content should be removed
	if ($_GET["remove"]) {
	
		$remove_id = $_GET["remove"];

		foreach ($current_data as $key => $i) {
			if ($remove_id === key($i)) {
				$unset_id = $key;
			}
		}

		if (!is_null($unset_id)) {
			unset($current_data[$unset_id]);
		}

		update_option(
			'plugin_nmole_qlsc_options', // $id
			$current_data,										   // $value
			'yes'												 // $autoload
		);

	}

	if ($_POST["name"]) {
		// Check if "id" is set.
		// If one exists this is an PUT REQUEST
		if ($_POST["id"]) {

			$post_id = $_POST["id"];

			foreach ($current_data as $key => $i) {

				if ($post_id === key($i)) {
				
					$current_data[$key] = array (
						$post_id => array(
							'name' => $_POST["name"],
							'text' => $_POST["text"],
							'link' => $_POST["link"],
							'image_source' => $_POST["image_source"],
							'image_alt' => $_POST["image_alt"],
							'id' => $post_id
						)
					);
				}
			}
			
		} else {
			// else this is a POST REQUEST
			$unique_id = preg_replace("/[\s]/", "_", $_POST["name"]);
			$new_id = $unique_id . "_" . uniqid();
			$post_arguments = array(
					$new_id => array(
						'name' => $_POST["name"],
						'text' => $_POST["text"],
						'link' => $_POST["link"],
						'image_source' => $_POST["image_source"],
						'image_alt' => $_POST["image_alt"],
						'id' => $new_id,
				)
			);

			array_push($current_data, $post_arguments);

		}



		update_option(
			'plugin_nmole_qlsc_options', // $id
			$current_data,										   // $value
			'yes'												 // $autoload
		);
	}

	$categories = array(
		'Name',
		'Text',
		'Link',
		'Image',
		''
	);
