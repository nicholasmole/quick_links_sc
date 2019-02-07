<div class="wrap">

	<div>

		<h1 style="display:inline-block;">
			Quick Links
		</h1>

		<a 
			class="page-title-action"
			href="<?php echo admin_url('admin.php?page=quick_links_sc_edit_page'); ?>"
		> 
			Add New
		</a>
		<span id='delete_confirmation_id'>
		</span>
	</div>

	<table class="wp-list-table widefat fixed striped posts">
		<!--
			table header
		-->
		<thead>

			<tr>

				<?php  foreach ($categories as $category) { ?>

					<th 
						scope="col" 
						class="manage-column column-categories"
					>

						<span>

							<?php echo $category ?>

						</span>

					</th>

				<?php } ?>

			</tr>

		</thead>

		<!--
				table body
		-->
		<tbody>

			<?php if (sizeof($current_data) > 0) { // make sure current_data exists?> 

				<?php foreach ($current_data as $i) {  // index loop for current_data ?>

					<?php foreach ($i as $loop_data) { // loop data inside of array?>

						<tr>

							<?php foreach ($loop_data as $data_key => $data) { // display data ?>

								<?php if ($data_key !== 'id' && $data_key !== 'image_alt') { ?>

									<th 
										scope="col" 
										class="manage-column column-categories"
									>

										<span
											style="
											display: block;
											width: 200px;
											overflow: hidden;
											white-space: nowrap;
											text-overflow: ellipsis;
											"
										>

											<?php echo $data ?>

										</span>

									</th>

								<?php } else if ($data_key === 'id') { // Pass 'id' to 'edit' and 'delete' pages ?>

									<th>

										<span class="edit">
										
											<a 
												href="<?php echo admin_url('admin.php?page=quick_links_sc_edit_page&type=edit&data=' . $data); ?>" a
												ria-label="Edit"
											>
												Edit
											</a> | 

										</span>

										<span class="edit">

											<a 
												onClick="open_delete_confirmation('<?php echo admin_url('admin.php?page=quick_links_sc_index&remove='.$data); ?>')"
												aria-label="Delete"
											>
											Delete
											</a>

										</span>

									</th>

								<?php } // end if and else if statements for $data_key ?>

							<?php } // end display data ?>
									
						</tr>

					<?php } // end array loop ?>
				<?php } // end index loop for current_data ?>
			<?php } else { // no $current_data ?>

			<tr class="no-items">

				<td class="colspanchange" colspan="4">

					No Quick Links found

				</td>

			</tr>

			<?php } ?>

		</tbody>
		
		<!--
				table footer
		-->
		<tfoot>
			
			<tr>

			<?php foreach ($categories as $category) { ?>

				<th 
					scope="col" 
					class="manage-column column-categories"
				>

					<span>

						<?php echo $category ?>

					</span>

				</th>

				<?php } ?>

			</tr>
			
		</tfoot>

	</table>

</div>
