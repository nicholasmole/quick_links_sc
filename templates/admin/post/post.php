<div>

	<p class="post-attributes-label-wrapper">
		<label for="qlsc_quick_link_title" class="post-attributes-label" style="display: block;">
			Title
		</label>
		<input 
			placeholder="Insert Quick Link Component Title..." 
			type="text" 
			name="qlsc_quick_link_title" 
			id="qlsc_quick_link_title" 
			value="<?php echo $qlsc_quick_link_title ? $qlsc_quick_link_title : 'Quick Links' ?>" 
			class="all-options" 
		/>
	</p>
	<p class="post-attributes-label-wrapper">
		<label class="post-attributes-label" style="display: block;">
			Contact Number
		</label>
		<input 
			placeholder="Insert Contact Number..." 
			type="text" 
			name="qlsc_quick_link_contact_number" 
			id="qlsc_quick_link_contact_number" 
			value="<?php echo $qlsc_quick_link_contact_number ? $qlsc_quick_link_contact_number : '' ?>" 
			class="all-options" 
		/>
	<p>
	<span id="quick_links_sc_quick_links_dropdown_area">

		<?php for ($i = 0; $i < 3; $i++) { ?>

			<?php 
				if (
						($i === 0 && ($qlsc_quick_link_link_0 !== '' || $qlsc_quick_link_link_1 !== '' || $qlsc_quick_link_link_2 !== '')) ||
						($i === 1 && ($qlsc_quick_link_link_1 !== '' || $qlsc_quick_link_link_2 !== '')) ||
						($i === 2 && $qlsc_quick_link_link_2 !== '') 
				 	 ) { 
			?>

				<p class="post-attributes-label-wrapper qlsc_quick_link_dropdown_id">

					<label class="post-attributes-label" style="display: block;">

						Quick Link <?php echo $i+1;?>

					</label>
				

					<select
						name="qlsc_quick_link_link_<?php echo $i;?>" 
						id="qlsc_quick_link_link_<?php echo $i;?>" 
						
					>
						
						<option value="">
							Select Quick Link...
						</option>

						<?php if (sizeof($plugin_qlsc_data) > 0) { // make sure current_data exists?> 
							
							<?php foreach ($plugin_qlsc_data as $index) {  // index loop for current_data ?>

								<?php foreach ($index as $data) { // loop data inside of array?>
								
										
										<option 
											value="<?php echo $data['id']?>" 
											<?php echo ($data['id'] === ${"qlsc_quick_link_link_".$i} ? 'selected="selected"' : ''); ?>
										>

											<?php echo $data['name']?>

										</option>


								<?php }?>

							<?php }?>

						<?php }?>

					
					</select>
				<p>
			<?php } ?>
		<?php } ?>

	</span>

	<?php if ($qlsc_quick_link_link_2 === '') { ?>

		<p class="post-attributes-label-wrapper" id="qlsc_select_quick_links_link_add_new">
			<a 
				class="page-title-action" 
				onClick="qlsc_select_quick_links(<?php echo $plugin_qlsc_data_json?>)"
			>
				Add New Link
			</a>
		</p>

	<?php } ?>

</div>
