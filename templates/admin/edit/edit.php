<div class="wrap">

	<h1>
		Add New Quick Link
	</h1>

	<form  
		style="float:left;"
		method="post" 
		action="<?php echo 'admin.php?page=quick_links_sc_index'; ?>"
	>

		<div id="post-body-content" style="position: relative;">
			<!--
				Display title
			-->
			<div id="titlediv">

				<div id="titlewrap">

					<label class="" id="title-prompt-text" for="title"></label>
					<input 
						placeholder="Enter Name here"
						type="text"
						name="name"
						id="title"
						size="30"
						value="<?php echo $edit_data['name'] ? $edit_data['name'] : ''; ?>" 
						spellcheck="true"
						autocomplete="off"
					/>

				</div>

			</div>
			<!--
				Display content fields
			-->
			<div class="postbox">

				<div class="inside">

					<?php foreach ($categories as $category) {?>

					<p class="post-attributes-label-wrapper">

						<label 
							class="post-attributes-label" 
							for="parent_id"
							style="
								display: inline-block;
								width: 100px;
							"
						>

						<?php echo $category['label']?>

						</label>

						<input 
							placeholder="Insert <?php echo $category['label']?>..." 
							type="text" 
							name="<?php echo $category['id']?>" 
							id="<?php echo $category['id']?>" 
							value="<?php echo $edit_data[$category['id']] ? $edit_data[$category['id']] : ''; ?>" 
							class="all-options"
						/>

					</p>

					<?php } ?>

				</div>

			</div>
			
			<?php
				// if edit_data contains ID pass it in POST	
				if ($edit_data['id']) {
			?>
				<input 
					type="hidden" 
					name="id" 
					id="id" 
					value="<?php echo $edit_data['id']; ?>"
				/>
			<?php } ?>

			<?php submit_button(); ?>

		</div>

	</form>
	
</div>
