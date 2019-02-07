<?php
	/**
	 * @var $edit_data 
	 * 
	 * Start with an empty edit_data component to possibly edit content
	 */
	$edit_data = array (
		'name' => '',
		'text' => '',
		'link' => '',
		'image_source' => '',
		'image_alt' => ''
	);

	/**
	 * Check for Get Request 'type'
	 * 
	 * Edit the current data if this is 'edit'
	 */
	if ($_GET["type"]) {

		if ($_GET["type"] === 'edit') {

			//get_options data
			$current_data = get_option('plugin_nmole_qlsc_options');

			$get_data;
			
			// Check for 
			foreach ($current_data as $i) {
				if ($_GET["data"] === key($i)) {
					$get_data = $i;
				}
			}
			//store the data
			$data = $get_data[$_GET["data"]];

			// update data to be edited
			$edit_data = array(
				'id' => $data['id'],
				'name' => $data['name'],
				'text' => $data['text'],
				'link' => $data['link'],
				'image_source' => $data['image_source'],
				'image_alt' => $data['image_alt']
			);

		}
	}

	/**
	 * @var $categories
	 * 
	 * Categories for data within the quick links area
	 */
	$categories = array(
		array(
			'id' => 'text',
			'label' => 'Text'
		),
		array(
			'id' => 'link',
			'label' => 'Link'
		),
		array(
			'id' => 'image_source',
			'label' => 'Image Source'
		),
		array(
			'id' => 'image_alt',
			'label' => 'Image Alt Text'
		),
	);
