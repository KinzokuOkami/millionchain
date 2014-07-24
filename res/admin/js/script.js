//*************
//***Masonry***
//*************

$(window).load(function(){
	$('#gallery-container').masonry({
		// options
		itemSelector : '.gallery-item',
		columnWidth : 200
	}).imagesLoaded(function(){
		$('#gallery-container').masonry('reload');
	});
});


function getTextEditor() {
	$('#tinyeditor').val(editor.i.contentWindow.document.body.innerHTML);
}

/*================
	Add/Remove Casts
================*/

$('#c-cast-input-add').click( function() {
	var cast_name_input = $(this).parent('.c-casts-input-container').find('.select2-search-choice');
	var cast_role_input = $(this).parent('.c-casts-input-container').children('.c-cast-role-input');
	var cast_name;
	var cast_role;
	var added_data;
	
	var valid_index;
	
	//Make sure Cast Name is not empty
	if(cast_name_input.text() != "") {
		cast_name = cast_name_input.text();
		cast_role = $('.c-cast-role-input').val();
		
		added_data = 
			"<div class='c-casts-add-container' data-index='" + input_casts_index + "'>" +
			"	<div class='c-casts-add-item'>" + cast_name + "</div>";

		//Remove "as" if Cast Role is empty
		if(cast_role != "") {
			added_data += " as ";
		} else {
			cast_role = "&nbsp;";
			added_data += " <span style='visibility:hidden'>as</span> ";
		}
		
		added_data += 
			"	<div class='c-casts-add-item'>" + cast_role + "</div><div class='c-input-remove icon-minus-sign' onclick='remove_added_cast(" + input_casts_index + ");'></div>" +
			"</div>";
			
		for(i = 0;i < input_casts_id.length;i++) {
			if(input_casts_id[i] == $('#casts-input').val()) {
				return;
			}
		}
		
		for(i = 0;i < input_casts_id_cur.length;i++) {
			var safe = true;
			if(input_casts_id_cur[i] == $('#casts-input').val()) {
				safe = false;
				for(j = 0;j < input_casts_id_del.length;j++) {
					if(input_casts_id_cur[i] == input_casts_id_del[j]) {
						safe = true;
					}
				}
			}
			if(!safe) return;
		}
		
		//Add data to array
		input_casts_id[input_casts_index] = $('#casts-input').val();
		input_casts_role[input_casts_index] = cast_role_input.val();
		input_casts_index++;
		input_casts_active_index++;

		//Resets input
		$('#casts-id-input').val("");
		$('#casts-role-input').val("");
		
		//Set input to data based on array
		valid_index = 0;	//To indicate whether it needs to add ',' separator or not
		for(i = 0;i < input_casts_index;i++) {
			if(input_casts_id[i] != "") {	//Skips blank data
				valid_index++;
				$('#casts-id-input').val($('#casts-id-input').val() + input_casts_id[i]);
				$('#casts-role-input').val($('#casts-role-input').val() + input_casts_role[i]);
				if(i < input_casts_index - 1 && valid_index < input_casts_active_index) {
					$('#casts-id-input').val($('#casts-id-input').val() + ",");
					$('#casts-role-input').val($('#casts-role-input').val() + ",");
				}
			}
		}
		
		//Clear the input box
		$('.c-cast-role-input').val("");
		
		//Show added data in form
		$(added_data).insertAfter('.c-casts-input-container');
	}
});

function remove_added_cast(index) {
	var valid_index;
	
	//Remove the data
	input_casts_id[index] = "";
	input_casts_role[index] = "";
	input_casts_active_index--;

	//Resets input
	$('#casts-id-input').val("");
	$('#casts-role-input').val("");
	
	//Update input
	valid_index = 0;	//To indicate whether it needs to add ',' separator or not
	for(i = 0;i < input_casts_index;i++) {
		if(input_casts_id[i] != "") {	//Skips blank data
			valid_index++;
			$('#casts-id-input').val($('#casts-id-input').val() + input_casts_id[i]);
			$('#casts-role-input').val($('#casts-role-input').val() + input_casts_role[i]);
			if(i < input_casts_index - 1 && valid_index < input_casts_active_index) {
				$('#casts-id-input').val($('#casts-id-input').val() + ",");
				$('#casts-role-input').val($('#casts-role-input').val() + ",");
			}
		}
	}
	
	//Remove from form
	$('.c-casts-add-container[data-index=' + index +']').remove();
}

/*================
	Add/Remove Writers
================*/

$('#c-writer-input-add').click( function() {
	var writer_name_input = $(this).parent('.c-writers-input-container').find('.select2-search-choice');
	var writer_role_input = $(this).parent('.c-writers-input-container').children('.c-writer-role-input');
	var writer_name;
	var writer_role;
	var added_data;
	
	var valid_index;
	
	//Make sure writer Name is not empty
	if(writer_name_input.text() != "") {
		writer_name = writer_name_input.text();
		writer_role = $('.c-writer-role-input').val();
		
		added_data = 
			"<div class='c-writers-add-container' data-index='" + input_writers_index + "'>" +
			"	<div class='c-writers-add-item'>" + writer_name + "</div>";

		//Remove "as" if writer Role is empty
		if(writer_role != "") {
			added_data += " as ";
		} else {
			writer_role = "&nbsp;";
			added_data += " <span style='visibility:hidden'>as</span> ";
		}
		
		added_data += 
			"	<div class='c-writers-add-item'>" + writer_role + "</div><div class='c-input-remove icon-minus-sign' onclick='remove_added_writer(" + input_writers_index + ");'></div>" +
			"</div>";
			
		for(i = 0;i < input_writers_id.length;i++) {
			if(input_writers_id[i] == $('#writers-input').val()) {
				return;
			}
		}
		
		for(i = 0;i < input_writers_id_cur.length;i++) {
			var safe = true;
			if(input_writers_id_cur[i] == $('#writers-input').val()) {
				safe = false;
				for(j = 0;j < input_writers_id_del.length;j++) {
					if(input_writers_id_cur[i] == input_writers_id_del[j]) {
						safe = true;
					}
				}
			}
			if(!safe) return;
		}
			
		//Add data to array
		input_writers_id[input_writers_index] = $('#writers-input').val();
		input_writers_role[input_writers_index] = writer_role_input.val();
		input_writers_index++;
		input_writers_active_index++;

		//Resets input
		$('#writers-id-input').val("");
		$('#writers-role-input').val("");
		
		//Set input to data based on array
		valid_index = 0;	//To indicate whether it needs to add ',' separator or not
		for(i = 0;i < input_writers_index;i++) {
			if(input_writers_id[i] != "") {	//Skips blank data
				valid_index++;
				$('#writers-id-input').val($('#writers-id-input').val() + input_writers_id[i]);
				$('#writers-role-input').val($('#writers-role-input').val() + input_writers_role[i]);
				if(i < input_writers_index - 1 && valid_index < input_writers_active_index) {
					$('#writers-id-input').val($('#writers-id-input').val() + ",");
					$('#writers-role-input').val($('#writers-role-input').val() + ",");
				}
			}
		}
		
		//Clear the input box
		$('.c-writer-role-input').val("");
		
		//Show added data in form
		$(added_data).insertAfter('.c-writers-input-container');
	}
});

function remove_added_writer(index) {
	var valid_index;
	
	//Remove the data
	input_writers_id[index] = "";
	input_writers_role[index] = "";
	input_writers_active_index--;

	//Resets input
	$('#writers-id-input').val("");
	$('#writers-role-input').val("");
	
	//Update input
	valid_index = 0;	//To indicate whether it needs to add ',' separator or not
	for(i = 0;i < input_writers_index;i++) {
		if(input_writers_id[i] != "") {	//Skips blank data
			valid_index++;
			$('#writers-id-input').val($('#writers-id-input').val() + input_writers_id[i]);
			$('#writers-role-input').val($('#writers-role-input').val() + input_writers_role[i]);
			if(i < input_writers_index - 1 && valid_index < input_writers_active_index) {
				$('#writers-id-input').val($('#writers-id-input').val() + ",");
				$('#writers-role-input').val($('#writers-role-input').val() + ",");
			}
		}
	}
	
	//Remove from form
	$('.c-writers-add-container[data-index=' + index +']').remove();
}

/*================
	Add/Remove Release Date
================*/

$('#c-release-input-add').click( function() {
	var release_country_input = $(this).parent('.c-release-input-container').find('.select2-choice');
	var release_country;
	var added_data;
	
	var valid_index;
	
	//Make sure genre Name is not empty
	if($('#release-date-input').val() != "" && (release_country_input.text() != "" || release_country_input.find('span').text() != "Select here..")) {
	
		release_country = release_country_input.text();
		
		added_data = 
			"<div class='c-release-add-container' data-index='" + input_release_index + "'>" +
			"	<div class='c-release-add-item'>" + $('#release-date-input').val() + "</div> in " +
			"	<div class='c-release-add-item'>" + release_country + "</div>" +
			"	<div class='c-input-remove icon-minus-sign' onclick='remove_added_release(" + input_release_index + ");'></div>" +
			"</div>";
			
		for(i = 0;i < input_release_country.length;i++) {
			if(input_release_country[i] == $('#release-country-selected').val()) {
				return;
			}
		}
		
		for(i = 0;i < input_release_country_cur.length;i++) {
			var safe = true;
			if(input_release_country_cur[i] == $('#release-country-selected').val()) {
				safe = false;
				for(j = 0;j < input_release_country_del.length;j++) {
					if(input_release_country_cur[i] == input_release_country_del[j]) {
						safe = true;
					}
				}
			}
			if(!safe) return;
		}
			
		//Add data to array
		input_release_date[input_release_index] = $('#release-date-input').val();
		input_release_country[input_release_index] = $('#release-country-selected').val();
		input_release_index++;
		input_release_active_index++;

		//Resets input
		$('#release-input').val("");
		$('#release-country-input').val("");
		
		//Set input to data based on array
		valid_index = 0;	//To indicate whether it needs to add ',' separator or not
		for(i = 0;i < input_release_index;i++) {
			if(input_release_country[i] != "") {	//Skips blank data
				valid_index++;
				$('#release-input').val($('#release-input').val() + input_release_date[i]);
				$('#release-country-input').val($('#release-country-input').val() + input_release_country[i]);
				if(i < input_release_index - 1 && valid_index < input_release_active_index) {
					$('#release-input').val($('#release-input').val() + ",");
					$('#release-country-input').val($('#release-country-input').val() + ",");
				}
			}
		}
		
		//Clear the input box
		$('#release-date-input').val("");
		
		//Show added data in form
		$(added_data).insertAfter('.c-release-input-container');
	}
});

function remove_added_release(index) {
	var valid_index;
	
	//Remove the data
	input_release_date[index] = "";
	input_release_country[index] = "";
	input_release_active_index--;

	//Resets input
	$('#release-input').val("");
	$('#release-country-input').val("");
	
	//Update input
	valid_index = 0;	//To indicate whether it needs to add ',' separator or not
	for(i = 0;i < input_release_index;i++) {
		if(input_release_country[i] != "") {	//Skips blank data
			valid_index++;
			$('#release-input').val($('#release-input').val() + input_release_date[i]);
			$('#release-country-input').val($('#release-country-input').val() + input_release_country[i]);
			if(i < input_genre_index - 1 && valid_index < input_genre_active_index) {
				$('#release-input').val($('#release-input').val() + ",");
				$('#release-country-input').val($('#release-country-input').val() + ",");
			}
		}
	}
	
	//Remove from form
	$('.c-release-add-container[data-index=' + index +']').remove();
}

/*================
	Add/Remove Genre - Dropdown ver.
================*/

$('#c-genre-input-add').click( function() {
	var genre_input = $(this).parent('.c-genre-input-container').find('.select2-choice');
	var genre;
	var added_data;
	
	var valid_index;
	
	//Make sure genre Name is not empty
	if(genre_input.text() != "" || genre_input.find('span').text() != "Select here.." ) {
		genre = genre_input.text();
		
		added_data = 
			"<div class='c-genre-add-container' data-index='" + input_genre_index + "'>" +
			"	<div class='c-genre-add-item span7'>" + genre + "</div>" +
			"	<div class='c-input-remove icon-minus-sign' onclick='remove_added_genre(" + input_genre_index + ");'></div>" +
			"</div>";
			
		for(i = 0;i < input_genre.length;i++) {
			if(input_genre[i] == $('#genre-selected').val()) {
				return;
			}
		}
		
		for(i = 0;i < input_genre_cur.length;i++) {
			var safe = true;
			if(input_genre_cur[i] == $('#genre-selected').val()) {
				safe = false;
				for(j = 0;j < input_genre_del.length;j++) {
					if(input_genre_cur[i] == input_genre_del[j]) {
						safe = true;
					}
				}
			}
			if(!safe) return;
		}
			
		//Add data to array
		input_genre[input_genre_index] = $('#genre-selected').val();
		input_genre_index++;
		input_genre_active_index++;

		//Resets input
		$('#genre-input').val("");
		
		//Set input to data based on array
		valid_index = 0;	//To indicate whether it needs to add ',' separator or not
		for(i = 0;i < input_genre_index;i++) {
			if(input_genre[i] != "") {	//Skips blank data
				valid_index++;
				$('#genre-input').val($('#genre-input').val() + input_genre[i]);
				if(i < input_genre_index - 1 && valid_index < input_genre_active_index) {
					$('#genre-input').val($('#genre-input').val() + ",");
				}
			}
		}
		
		//Clear the input box
		$('.c-genre-input').val("");
		
		//Show added data in form
		$(added_data).insertAfter('.c-genre-input-container');
	}
});

function remove_added_genre(index) {
	var valid_index;
	
	// mark_remove_genre(index);
	
	//Remove the data
	input_genre[index] = "";
	input_genre_active_index--;

	//Resets input
	$('#genre-input').val("");
	
	//Update input
	valid_index = 0;	//To indicate whether it needs to add ',' separator or not
	for(i = 0;i < input_genre_index;i++) {
		if(input_genre[i] != "") {	//Skips blank data
			valid_index++;
			$('#genre-input').val($('#genre-input').val() + input_genre[i]);
			if(i < input_genre_index - 1 && valid_index < input_genre_active_index) {
				$('#genre-input').val($('#genre-input').val() + ",");
			}
		}
	}
	
	//Remove from form
	$('.c-genre-add-container[data-index=' + index +']').remove();
}

/*================
	Add/Remove Funfact
================*/

$('#c-funfact-input-add').click( function() {
	var funfact;
	var added_data;
	
	var valid_index;
	
	//Make sure funfact Name is not empty
	if($('.c-funfact-input').val() != "") {
		funfact = $('.c-funfact-input').val();
		
		added_data = 
			"<div class='c-funfacts-add-container' data-index='" + input_funfacts_index + "'>" +
			"	<div class='c-funfacts-add-item span7'>" + funfact + "</div>" +
			"	<div class='c-input-remove icon-minus-sign' onclick='remove_added_funfact(" + input_funfacts_index + ");'></div>" +
			"</div>";
		
		//Add data to array
		input_funfacts[input_funfacts_index] = funfact;
		input_funfacts_index++;
		input_funfacts_active_index++;

		//Resets input
		$('#funfacts-input').val("");
		
		//Set input to data based on array
		valid_index = 0;	//To indicate whether it needs to add '&copy;' separator or not
		for(i = 0;i < input_funfacts_index;i++) {
			if(input_funfacts[i] != "") {	//Skips blank data
				valid_index++;
				$('#funfacts-input').val($('#funfacts-input').val() + input_funfacts[i]);
				if(i < input_funfacts_index - 1 && valid_index < input_funfacts_active_index) {
					$('#funfacts-input').val($('#funfacts-input').val() + "|");
				}
			}
		}
		
		//Clear the input box
		$('.c-funfact-input').val("");
		
		//Show added data in form
		$(added_data).insertAfter('.c-funfacts-input-container');
	}
});

function remove_added_funfact(index) {
	var valid_index;
	
	//Remove the data
	input_funfacts[index] = "";
	input_funfacts_active_index--;

	//Resets input
	$('#funfacts-input').val("");
	
	//Update input
	valid_index = 0;	//To indicate whether it needs to add '&copy;' separator or not
	for(i = 0;i < input_funfacts_index;i++) {
		if(input_funfacts[i] != "") {	//Skips blank data
			valid_index++;
			$('#funfacts-input').val($('#funfacts-input').val() + input_funfacts[i]);
			if(i < input_funfacts_index - 1 && valid_index < input_funfacts_active_index) {
				$('#funfacts-input').val($('#funfacts-input').val() + "|");
			}
		}
	}
	
	//Remove from form
	$('.c-funfacts-add-container[data-index=' + index +']').remove();
}