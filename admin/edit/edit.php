<?php

	if ($_GET["id"]) {

		$current_post = get_option('plugin_nmole_qlsc_options')[$_GET["id"]];
		echo $current_post;
	}
?>

<div class="wrap">

	<h1>
		Quick Links Sc Generator Page
	</h1>
	<div style="
		float: right;
    width: 280px;">
		<div style="
			background: #FFFFFF;
			padding: 15px;
			border: 1px solid #E5E5E5;
			position: relative;
			box-shadow: 0 1px 1px rgba(0, 0, 0, 0.04);"
		>
				<h2 style="
					margin-top: 16px;
					font-size: 26px;
					line-height: 1.25em;
					">
					Create new <br/> Quick Links
				</h2>
				<p>
					<strong>Id</strong>  is the unique identifier for a quick link, and can't have spaces 
				</p>
				<p>
					<strong>Text</strong>  is what is displayed for the link
				</p>
				<p>
					<strong>Image</strong>  src and alt display above the link text
				</p>
				<p>
					<strong>Link</strong> is the url.
				</p>
		</div>
	</div>
	<form  
		style="float:left;"
		method="post" 
		action="<?php plugin_dir_path(__FILE__) . 'settings.php' ?>"
	>
	<table class="form-table wp-list-table widefat">
		<tbody>
			<tr>
				<th scope="row" style="padding-left: 16px;">
					<label for="blogname">
						ID: 
					</label>
					<td>
						<label for="blogname">
							<?php echo $current_post['id']; ?>
						</label>
					</td>
			</tr>

			<tr>
				<th scope="row" style="padding-left: 16px;">
					<label for="blogname">
						Rename ID:
					</label>
					<td>
						<input 
							name="ql_id" 
							id="ql_id" 
							type="text"
							value="<?php $current_post['id'] ? echo esc_attr($current_post['id']) : echo 'hi' ; ?>"
						/>
					</td>
				</th>
			</tr>

			<tr>
				<th style="padding-left: 16px;" scope="row">
					<label for="blogname">
						Text: 
					</label>
					<td>
						<input 
							name="ql_text" 
							id="ql_text" 
							type="text"
							value="<?php $current_post['id'] ? echo esc_attr($current_post['text']) : echo 'hi'; ?>"
						/>
					</td>
				</th>
			</tr>
		
		</tbody>

	</table>

	<?php submit_button(); ?>
	</form>


</div>
