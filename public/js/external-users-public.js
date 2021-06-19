(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */


	$( document ).ready(function() {
	    // Initialize user detail card
        $('#ext-usr-detail').html(`
			<div class="card"> 
			    <div class="card-body">Click the view button to see the details of the user.</div> 
			</div>
		`);
        
		// Initialize table
		$('#ext-usr-list-wrapper').html(`
		    <h3>Users</h3>
			<table id="user-table" class="table table-striped">
				<thead>
					<tr>
					    <th>ID</th>
					    <th>Name</th>
					    <th>Username</th>
					    <th>Email</th>
					    <th>Details</th>
					 </tr>
				</thead>
				<tbody><tr><td colspan="4">No user found...</td></tr></tbody>
			</table>
		`);
		
		fill_users_table();
		
		//Get the session - details of the user
		if (sessionStorage.getItem("user-details") !== null) {
		    var content = '';
		    $('.card-body').html("");
		    content = sessionStorage.getItem("user-details");
		    $('.card-body').append(content);
		}
		
		
	});

	function fill_users_table(){
	    var url = "https://jsonplaceholder.typicode.com/users";
		$.get(url, function(data, status){
			$('#ext-usr-list-wrapper table tbody').html(""); // Clear content
			if(status == "success" && data != undefined && data.length > 0){
				data.forEach(user => {
					$('#ext-usr-list-wrapper table tbody').append(`
					<tr onclick="show_user_details(this)" data-userid="${user.id}">
						<td>${user.id}</td>
						<td>${user.name}</td>
						<td>${user.username}</td>
						<td>${user.email}</td>
						<td><button type="button" class="btn btn-primary">View</button></td>
					</tr>
					`);
				});
			}else{
				$('#ext-usr-list-wrapper table tbody').append('<tr><td colspan="4">No user found...</td></tr>');
			}
		});
	}
	
	

	
})( jQuery );

function show_user_details(e){
	$ = jQuery;
	var userID = $(e).data("userid");
	var content = '';
	$.get("https://jsonplaceholder.typicode.com/users/" + userID, function(user, status){
			$('.card-body').html("");
			if(status == "success" && user != undefined ){
			    content = `
			       <h4>User Details</h4>
				   Name: ${user.name}<br>
				   Username: ${user.username}<br>
				   Email: ${user.email}<br>
				   Address: ${user.address.suite}, ${user.address.street}, ${user.address.zipcode} ${user.address.city}<br>
				   Geo: Latitude ${user.address.geo.lat}, Longitude ${user.address.geo.lng}
				   <br><hr>
				   Company Details<br>
				   <b>${user.company.catchPhrase}</b><br>
				   Company Name: ${user.company.name}<br>
				   Service: ${user.company.bs}<br>
			    `;
			    sessionStorage.setItem("user-details", content);
			}else{
			    content = 'Please click the table row to see user details.'
			}
			
			//Append the card content to the card body
			$('.card-body').append(content);
		});
}




