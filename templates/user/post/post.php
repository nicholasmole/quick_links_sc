<div class="qlsc_outer_container">
	<div class=" sidebar-widget-area xz-leftpc-sidebar ">
	</div>
	<div class="wpb_wrapper qlsc_container">
		<!--
			Display Quick Links Header
			-->
		<div class="qlsc_header qlsc_endpoint" >

			<?php echo $qlsc_quick_link_title ? $qlsc_quick_link_title : 'Quick Links' ?>

		</div>
		<!--
			Display Quick Links link Components
		-->
		<?php  if ($link_0_content) { ?>

			<a 
				class="qlsc_link_container" 
				href="<?php echo $link_0_content['link']?>"
			>
				<img
					src="<?php echo $link_0_content['image_source']?>"
					alt="<?php echo $link_0_content['image_alt']?>"
				/>
				<p>
					<?php echo $link_0_content['text']?>
				</p>
			</a>

		<?php } ?>

		<?php if ($link_1_content) { ?>

			<a 
				class="qlsc_link_container" 
				href="<?php echo $link_1_content['link']?>"
			>
				<img
					src="<?php echo $link_1_content['image_source']?>"
					alt="<?php echo $link_1_content['image_alt']?>"
				/>
				<p>
					<?php echo $link_1_content['text']?>
				</p>
			</a>

		<?php } ?>

		<?php if ($link_2_content) { ?>
			<a 
				class="qlsc_link_container" 
				href="<?php echo $link_2_content['link']?>"
			>
				<img
					src="<?php echo $link_2_content['image_source']?>"
					alt="<?php echo $link_2_content['image_alt']?>"
				/>
				<p>
					<?php echo $link_2_content['text']?>
				</p>
			</a>
		<?php } ?>
		<!--
			Display Quick Links Footer
		-->
		<div class="qlsc_footer qlsc_endpoint" >
			<?php echo $qlsc_quick_link_contact_number ? $qlsc_quick_link_contact_number : '' ?>
		</div>
	</div>
</div>
