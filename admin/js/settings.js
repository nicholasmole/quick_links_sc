/**
 * ### open_delete_confirmation
 * 
 * Opens the delete confirmation button
 * Allows user to delete an area of content
 * on the index view page
 * 
 * Clicking on the confirm Delete button will submit to current page
 * 	
 * @param {*} id 
 */
function open_delete_confirmation(id = '') {
	document.querySelector('#delete_confirmation_id').innerHTML = `
	<a 
			class="button"
			style="
				background: #e00101;
				color: #fff;
				border-color: #a00303; 
				margin-left: 5px;
				margin-top: 9px;
			"
			href="${id}"
		> 
			Confirm Delete!
		</a>
	`;
}

function say_hi() {
	console.log('hi');

}