/**
 * ### qlsc_get_select_options_quick_links
 * 
 * Constructs the options for the qlsc_select_quick_links
 * function. These select options are passed from the php
 * file post.php in the /includes/admin/post directory.
 * 
 * 	
 * @param {*} select 
 */
function qlsc_get_select_options_quick_links(select) {
	var response = [];
	for (var property in select) {
		response.push(Object.values(select[property])[0]);
	}
	var content = '';
	for (var i = 0; i <= response.length; i++) {
		if (response[i]) {
			content += `
				<option value="${response[i]['id']}">
					${response[i]['name']}
				</option>
			`;
		}
	}
	return content;
}
/**
 * ### qlsc_select_quick_links
 * 
 * Create the select options for the drop down on the
 * edit/create page.
 * 
 * 	
 * @param {*} select 
 */
function qlsc_select_quick_links(select) {

	var select_options = qlsc_get_select_options_quick_links(select);
	var input_field = document.createElement("div");     
	var id = document.querySelectorAll('.qlsc_quick_link_dropdown_id');


	input_field.innerHTML =`
		<p class="post-attributes-label-wrapper qlsc_quick_link_dropdown_id">
			<label class="post-attributes-label" style="display: block;">
				Quick Link ${id.length+1}
			</label>
			<select
				name="qlsc_quick_link_link_${id.length}" 
				id="qlsc_quick_link_link_${id.length}" 
			>
				<option value="">
					Select Quick Link...
				</option>
				${select_options}
			</select>
		<p>
	`;     

	// input_field.innerHTML(inner_input_content);
	document.querySelector('#quick_links_sc_quick_links_dropdown_area').appendChild(input_field);

	if (id.length >= 3) {
		document.querySelector('#qlsc_select_quick_links_link_add_new').innerHTML = `
			<p class="post-attributes-label-wrapper">
				
			</p>
		`
		return;
	}
}