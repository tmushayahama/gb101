/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(e) {
	console.log("Loading rm_registration.js...");
	$(function() {
		$("#birthdate-datepicker").datepicker({
			changeMonth: true,
			changeYear: true,
			altField: "#birthdate-alternate",
			altFormat: "DD, d MM, yy",
			timeFormat: "HH:mm:ss",
			dateFormat: "yy-mm-dd"
		});
	});
});

