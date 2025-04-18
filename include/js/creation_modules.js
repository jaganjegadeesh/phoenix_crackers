var number_regex = /^\d+$/;
var price_regex = /^(\d*\.)?\d+$/;
var percentage_regex = /^(?:\d{1,2}(?:\.\d{1,2})?)%?$/;
var letter_regex = /^[a-zA-Z\s ]+$/;
var name_regex = /^(?=.*[a-zA-Z])[a-zA-Z\s&\-.']+$/;
var text_no_regex = /^(?=.*[a-zA-Z0-9])[a-zA-Z0-9\s&\-.']+$/;
var product_regex = /^(?=.*[a-zA-Z])[^?!<>$+=`~_|?;^{}]*$/;

function KeyboardControls(obj,type,characters,color){
    var input = jQuery(obj);
    // Use onkeydown
    if(type == "text"){
        input.on('keypress', function(event) {
            // Get the keycode of the pressed key
            var keyCode = event.keyCode || event.which;
					
            // Allow: backspace, delete, tab, escape, enter, and arrow keys
            if ([8, 46, 9, 27, 13, 37, 38, 39, 40].indexOf(keyCode) !== -1 ||
                // Allow: Ctrl+A, Ctrl+C, Ctrl+V, Ctrl+X
                (keyCode === 65 && (event.ctrlKey || event.metaKey)) || 
                (keyCode === 67 && (event.ctrlKey || event.metaKey)) || 
                (keyCode === 86 && (event.ctrlKey || event.metaKey)) || 
                (keyCode === 88 && (event.ctrlKey || event.metaKey)) ||
                // Allow: home, end, page up, page down
                (keyCode >= 35 && keyCode <= 40)) {
                // Let it happen, don't do anything
                return;
            }
            
            // Block numeric key codes (0-9 on main keyboard and numpad)
            if ((keyCode >= 48 && keyCode <= 57)) {
                event.preventDefault();
            }
        });
    }
    // Use onfocus
    if(type == "mobile_number"){
        input.on('keypress', function(event) {
            var keyCode = event.keyCode || event.which;
        
            // Allow: backspace, delete, tab, escape, enter, period, arrow keys
            if ([8, 46, 9, 27, 13, 190].indexOf(keyCode) !== -1 ||
                // Allow: Ctrl+A, Ctrl+C, Ctrl+V, Ctrl+X
                (keyCode === 65 && (event.ctrlKey || event.metaKey)) || 
                (keyCode === 67 && (event.ctrlKey || event.metaKey)) || 
                (keyCode === 86 && (event.ctrlKey || event.metaKey)) || 
                (keyCode === 88 && (event.ctrlKey || event.metaKey)) ||
                // Allow: arrow keys
                (keyCode >= 37 && keyCode <= 40)) {
                // Let it happen, don't do anything
                return;
            }
        
            // Ensure that it is a number and stop the keypress if not
            if ((keyCode < 48 || keyCode > 57)) {
                event.preventDefault();
            }
        });
        
        input.on("input", function(event){
            var str_len = input.val().length;
            if(str_len > 10) {
                input.val(input.val().substring(0, 10));
            }
        });
        input.on('keypress', function (event) {
            if (event.keyCode === 32) {
                event.preventDefault();
            }
        });
    }
	// Use onfocus
    if(type == "email" || type == "password"){
        input.on('keypress', function (event) {
            if (event.keyCode === 32) {
                event.preventDefault();
            }
        });
    }
    // Use onfocus
    if(type == "number"){
        input.on('keypress', function(event) {
            var keyCode = event.keyCode || event.which;
        
            // Allow: backspace, delete, tab, escape, enter, period, arrow keys
            if ([8, 46, 9, 27, 13, 190].indexOf(keyCode) !== -1 ||
                // Allow: Ctrl+A, Ctrl+C, Ctrl+V, Ctrl+X
                (keyCode === 65 && (event.ctrlKey || event.metaKey)) || 
                (keyCode === 67 && (event.ctrlKey || event.metaKey)) || 
                (keyCode === 86 && (event.ctrlKey || event.metaKey)) || 
                (keyCode === 88 && (event.ctrlKey || event.metaKey)) ||
                // Allow: arrow keys
                (keyCode >= 37 && keyCode <= 40)) {
                // Let it happen, don't do anything
                return;
            }
        
		
            // Ensure that it is a number and stop the keypress if not
            if ((keyCode < 48 || keyCode > 57)) {
                event.preventDefault();
            }
        });
		
        input.on('keypress', function (event) {
            if (event.keyCode === 32) {
                event.preventDefault();
            }
        });
		
    }
	 // Use onfocus
	 if(type == "no_space"){
        input.on('keypress', function (event) {
            if (event.keyCode === 32) {
                event.preventDefault();
            }
        });
    }
	
	if(number_regex.test(characters) != false){
		if(characters != "" && characters != 0){
			input.on("input", function(event){
				var str_len = input.val().length;
				if(str_len > parseFloat(characters)) {
					input.val(input.val().substring(0, parseFloat(characters)));
				}
			});
		}
	}
    if(color == '1'){
        InputBoxColor(obj,type);
    }
}
function SnoCalculation(){
    if (jQuery('.sno').length > 0) {
		var row_count = 0;
		row_count = jQuery('.sno').length;
		if (typeof row_count != "undefined" && row_count != null && row_count != 0 && row_count != "") {
			var j = 1;
			var sno = document.getElementsByClassName('sno');
			for (var i = row_count - 1; i >= 0; i--) {
				sno[i].innerHTML = j;
				j = parseInt(j) + 1;
			}
		}
	}
}
function InputBoxColor(obj,type){
    if(type == 'select'){
		if(jQuery(obj).closest().find('.select2-selection--single').length > 0){
			jQuery(obj).closest().find('.select2-selection--single').css('border','1px solid #aaa');
		}
        if(jQuery(obj).parent().find('.infos').length > 0){
            jQuery(obj).parent().find('.infos').remove();
        }
        if(jQuery(obj).parent().parent().find('.infos').length > 0){
            jQuery(obj).parent().parent().find('.infos').remove();
        }
	}
	else{
		jQuery(obj).css('border','1px solid #ced4da');
        if(jQuery(obj).parent().find('.infos').length > 0){
            jQuery(obj).parent().find('.infos').remove();
        }
        if(jQuery(obj).parent().parent().find('.infos').length > 0){
            jQuery(obj).parent().parent().find('.infos').remove();
        }
	}
}
function OnOffButton(field_name){
    var checkbox_button = document.getElementById(field_name).checked;
    
    if(checkbox_button == true){
        document.getElementById(field_name).value = 1;
        if(field_name == 'subunit_need') {
			if(jQuery('#subunit_list').length > 0) {
				jQuery('#subunit_list').removeClass('d-none');
			}
			if(jQuery('#subunit_contains_list').length > 0) {
				jQuery('#subunit_contains_list').removeClass('d-none');
			}
			if(jQuery('.unit_type_div').length > 0) {
				jQuery('.unit_type_div').removeClass('d-none');
			}
			if(jQuery('select[name="selected_unit_type"]').length > 0) {
				jQuery('select[name="selected_unit_type"]').val('1');
			}
		}
		else if(field_name == 'gst_option') {
			GetTaxType('1');
		}
    }
    else if(checkbox_button == false){
        document.getElementById(field_name).value = 0;
        if(field_name == 'subunit_need') {
			if(jQuery('#subunit_list').length > 0) {
				jQuery('#subunit_list').addClass('d-none');
			}
			if(jQuery('#subunit_contains_list').length > 0) {
				jQuery('#subunit_contains_list').addClass('d-none');
			}
			if(jQuery('.unit_type_div').length > 0) {
				jQuery('.unit_type_div').addClass('d-none');
			}
			if(jQuery('select[name="selected_unit_type"]').length > 0) {
				jQuery('select[name="selected_unit_type"]').val('1');
			}
		}
		else if(field_name == 'gst_option') {
			GetTaxType('0');
		}
    }
}
function addCreationDetails(name, characters) {
	var check_login_session = 1; var all_errors_check = 1; var error = 1; var letters_check = 1; var prefix_check = 1; 
	var prefix_error = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (jQuery('.infos').length > 0) {
					jQuery('.infos').each(function () { jQuery(this).remove(); });
				}
				var creation_name = ""; var creation_prefix = ""; var creation_color = "";
				var format = letter_regex;
				if(name == 'godown_room') {
					format = text_no_regex;
				}
				else if(name == 'category') {
					format = product_regex;
				}

				var name_variable = "";
				name_variable = name.toLowerCase();
				name_variable = name_variable.trim();
				name_variable = name_variable.replace("_"," ");

				if(name == 'order_status') {
					format = name_regex;
					if(jQuery('input[name="'+name+'_color"]').is(":visible")) {
						if (jQuery('input[name="'+name+'_color"]').length > 0) {
							creation_color = jQuery('input[name="'+name+'_color"]').val();
							creation_color = creation_color.trim();
							if (typeof creation_color == "undefined" || creation_color == "" || creation_color == 0 || creation_color == null) {
								all_errors_check = 0;
							}
						}
					}
				}
				var godown_id = "";
				if(name == 'godown_room') {
					if(jQuery('select[name="godown_id"]').length > 0) {
						godown_id = jQuery('select[name="godown_id"]').val();
						godown_id = godown_id.trim();
						if (typeof godown_id == "undefined" || godown_id == "" || godown_id == 0 || godown_id == null) {
							all_errors_check = 0;
						}
					}
				}
				if(name == 'brand') {
					format = product_regex;
					if (jQuery('input[name="'+name+'_prefix"]').is(":visible")) {
						if (jQuery('input[name="'+name+'_prefix"]').length > 0) {
							creation_prefix = jQuery('input[name="'+name+'_prefix"]').val();
							creation_prefix = creation_prefix.trim();
							if (typeof creation_prefix == "undefined" || creation_prefix == "" || creation_prefix == 0 || creation_prefix == null) {
								all_errors_check = 0;
							}
							else if(format.test(creation_prefix) == false) {
								letters_check = 0;
								prefix_check = 0;
							}
							else if(creation_prefix.length > 5) {
								error = 0;
								prefix_error = 0;
							}
						}
					}
				}

				if (jQuery('input[name="'+name+'_name"]').is(":visible")) {
					if (jQuery('input[name="'+name+'_name"]').length > 0) {
						creation_name = jQuery('input[name="'+name+'_name"]').val();
						creation_name = creation_name.trim();
						if (typeof creation_name == "undefined" || creation_name == "" || creation_name == 0 || creation_name == null) {
							all_errors_check = 0;
						}
						else if(format.test(creation_name) == false) {
							letters_check = 0;
						}
						else if(creation_name.length > parseInt(characters)) {
							error = 0;
						}
					}
				}
				var charges_type = "";
				if(name == "other_charges") {
					if(jQuery('select[name="charges_type"]').length > 0) {
						charges_type = jQuery('select[name="charges_type"]').val();
						charges_type = charges_type.trim();
						if (typeof charges_type == "undefined" || charges_type == "" || charges_type == 0 || charges_type == null) {
							all_errors_check = 0;
						}
					}
				}
				if(parseInt(all_errors_check) == 1) {
					if(parseInt(letters_check) == 1) {
						if(parseInt(error) == 1) {
							var add = 1; var add_variable = ""; var param = "";
							if (creation_name != "") {
								if (jQuery('input[name="'+name+'_names[]"]').length > 0) {
									jQuery('.added_'+name+'_table tbody').find('tr').each(function () {
										var prev_creation_name = jQuery(this).find('input[name="'+name+'_names[]"]').val().toLowerCase();
										var current_creation_name = creation_name.toLowerCase();
										if(name != "godown_room") {
											if (prev_creation_name == current_creation_name) {
												add = 0;
												add_variable = name_variable;
											}
										}
										else if(name == "godown_room") {
											var prev_godown_id = "";
											if(jQuery(this).find('input[name="godown_ids[]"]').length > 0) {
												prev_godown_id = jQuery(this).find('input[name="godown_ids[]"]').val();
												prev_godown_id = prev_godown_id.trim();
											}
											if (prev_creation_name == current_creation_name && prev_godown_id == godown_id) {
												add = 0;
												add_variable = name_variable;
											}
										}
									});
								}
							}
							if (creation_prefix != "") {
								param = "&selected_"+name+"_prefix="+creation_prefix;
								if (jQuery('input[name="'+name+'_prefixs[]"]').length > 0) {
									jQuery('.added_'+name+'_table tbody').find('tr').each(function () {
										var prev_creation_prefix = jQuery(this).find('input[name="'+name+'_prefixs[]"]').val().toLowerCase();
										var current_creation_prefix = creation_prefix.toLowerCase();
										if (prev_creation_prefix == current_creation_prefix) {
											add = 0;
											add_variable = "Prefix";
										}
									});
								}
							}
							if (creation_color != "") {
								param = "&selected_"+name+"_color="+encodeURIComponent(creation_color);
								if (jQuery('input[name="'+name+'_colors[]"]').length > 0) {
									jQuery('.added_'+name+'_table tbody').find('tr').each(function () {
										var prev_creation_color = jQuery(this).find('input[name="'+name+'_colors[]"]').val().toLowerCase();
										var current_creation_color = creation_color.toLowerCase();
										if (prev_creation_color == current_creation_color) {
											add = 0;
											add_variable = "Status Color";
										}
									});
								}
							}
							if(name == "godown_room") {
								param = "&selected_godown_id="+godown_id;
							}
							if(name == "other_charges") {
								param = "&selected_charges_type="+charges_type;
							}
							if (add == 1) {
								var count = jQuery('input[name="'+name+'_count"]').val();
								count = parseInt(count) + 1;
								jQuery('input[name="'+name+'_count"]').val(count);
								var post_url = name+"_changes.php?"+name+"_row_index="+count+"&selected_"+name+"_name="+encodeURIComponent(creation_name)+param;
								jQuery.ajax({
									url: post_url, success: function (result) {
										if (jQuery('.added_'+name+'_table tbody').find('tr').length > 0) {
											jQuery('.added_'+name+'_table tbody').find('tr:first').before(result);
										}
										else {
											jQuery('.added_'+name+'_table tbody').append(result);
										}
										if(name == 'brand') {
											if (jQuery('input[name="'+name+'_prefix"]').length > 0) {
												jQuery('input[name="'+name+'_prefix"]').val('').focus();
											}
											if (jQuery('input[name="'+name+'_name"]').length > 0) {
												jQuery('input[name="'+name+'_name"]').val('');
											}
										}
										else {
											if(name == "godown_room") {
												if(jQuery('select[name="godown_id"]').length > 0) {
													jQuery('select[name="godown_id"]').val('').trigger('change');
												}
											}
											if(name == "other_charges") {
												if(jQuery('select[name="charges_type"]').length > 0) {
													jQuery('select[name="charges_type"]').val('').trigger('change');
												}
											}
											if (jQuery('input[name="'+name+'_name"]').length > 0) {
												jQuery('input[name="'+name+'_name"]').val('').focus();
											}
										}
										SnoCalculation();
									}
								});
							}
							else {
								jQuery('.added_'+name+'_table').before('<div class="infos w-100 text-danger text-center mb-3" style="font-size: 15px;">This '+add_variable+' already Exists</div>');
							}
						}
						else {
							if(parseInt(prefix_error) == 0) {
								jQuery('.added_'+name+'_table').before('<div class="infos text-danger text-center mb-3" style="font-size: 15px;">Only 5 Characters allowed for Prefix</div>');
							}
							else {
								jQuery('.added_'+name+'_table').before('<div class="infos text-danger text-center mb-3" style="font-size: 15px;">Only '+characters+' Characters allowed for '+name_variable+'</div>');
							}
						}
					}
					else {
						if(parseInt(prefix_check) == 0) {
							jQuery('.added_'+name+'_table').before('<div class="infos text-danger text-center mb-3" style="font-size: 15px;color:red;">Invalid Characters in Prefix</div>');
							jQuery('input[name="'+name+'_prefix"]').val('');
						}
						else {
							jQuery('.added_'+name+'_table').before('<div class="infos text-danger text-center mb-3" style="font-size: 15px;color:red;">Invalid Characters in '+name_variable+'</div>');
							jQuery('input[name="'+name+'_name"]').val('');
						}
					}
				}
				else {
					jQuery('.added_'+name+'_table').before('<div class="infos text-danger text-center mb-3" style="font-size: 15px;">Please check all field values</div>');
				}
			}
			else {
				window.location.reload();
			}
		}
	});
}
function DeleteCreationRow(id_name, row_index) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (jQuery('#'+id_name+'_row'+row_index).length > 0) {
					jQuery('#'+id_name+'_row'+row_index).remove();
				}
				if(id_name == "product") {
					if (jQuery('.'+id_name+'_row').length == 0) {
						if(jQuery('input[name="category_id"]').length > 0) {
							jQuery('input[name="category_id"]').val('');
							jQuery('input[name="category_id"]').attr('disabled', true);
						}
						if(jQuery('select[name="category_id"]').length > 0) {
							jQuery('select[name="category_id"]').attr('disabled', false);
						}
						if(jQuery('#subunit_input').length > 0) {
							jQuery('#subunit_input').val('');
							jQuery('#subunit_input').attr('disabled', true);
						}
						if(jQuery('#subunit_need').length > 0) {
							jQuery('#subunit_need').attr('disabled', false);
						}
					}
				}
				SnoCalculation();
			}
			else {
				window.location.reload();
			}
		}
	});
}

function subunitNeed(){
	var checkbox_button = document.getElementById('subunit_need').checked;
    if(checkbox_button == true) {
		if(jQuery('#subunit_need').length > 0) {
			jQuery('#subunit_need').val('1');
		}
		if(jQuery('#subunit_list').length > 0) {
			jQuery('#subunit_list').removeClass('d-none');
		}
		if(jQuery('#contains_div').length > 0) {
			jQuery('#contains_div').removeClass('d-none');
		}
		if(jQuery('#contains_heading').length > 0) {
			jQuery('#contains_heading').removeClass('d-none');
		}
		if(jQuery('#subunit_contains_list').length > 0) {
			jQuery('#subunit_contains_list').removeClass('d-none');
		}
		if(jQuery('select[name="per_type"]').find('option[value="2"]').length === 0) {
			jQuery('select[name="per_type"]').append($("<option value='2'>Subunit</option>"));
		}
		if(jQuery('select[name="selected_unit_type"]').find('option[value="2"]').length === 0) {
			jQuery('select[name="selected_unit_type"]').append($("<option value='2'>Subunit</option>"));
		}
		
    }
    else if(checkbox_button == false) {
		if(jQuery('#subunit_need').length > 0) {
			jQuery('#subunit_need').val('0');
		}
		if(jQuery('#subunit_list').length > 0) {
			jQuery('#subunit_list').addClass('d-none');
		}
		if(jQuery('#contains_div').length > 0) {
			jQuery('#contains_div').addClass('d-none');
		}
		if(jQuery('#contains_heading').length > 0) {
			jQuery('#contains_heading').addClass('d-none');
		}
		if(jQuery('#subunit_contains_list').length > 0) {
			jQuery('#subunit_contains_list').addClass('d-none');
		}
		if(jQuery('select[name="selected_unit_type"]').length > 0) {
			jQuery('select[name="selected_unit_type"] option[value="2"]').remove();
		}
    }
}


function AddProductStock() {
	var check_login_session = 1; var all_errors_check = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (jQuery('.infos').length > 0) {
					jQuery('.infos').each(function() { jQuery(this).remove(); });
				}
				
                var selected_godown_id = "";
                if(jQuery('select[name="selected_godown_id"]').is(":visible")) {
                    if(jQuery('select[name="selected_godown_id"]').length > 0) {
                        selected_godown_id = jQuery('select[name="selected_godown_id"]').val();
                        selected_godown_id = jQuery.trim(selected_godown_id);
                        if(typeof selected_godown_id == "undefined" || selected_godown_id == "" || selected_godown_id == 0) {
                            all_errors_check = 0;
                        }
                    }
                }

				var selected_brand_id = ""; 
				if(jQuery('select[name="selected_brand_id"]').is(":visible")) {
                    if(jQuery('select[name="selected_brand_id"]').length > 0) {
                        selected_brand_id = jQuery('select[name="selected_brand_id"]').val();
                        selected_brand_id = jQuery.trim(selected_brand_id);
                        if(typeof selected_brand_id == "undefined" || selected_brand_id == "" || selected_brand_id == 0) {
                            all_errors_check = 0;
                        }
                    }
                }
                
				var selected_unit_type = "";
                if(jQuery('select[name="selected_unit_type"]').is(":visible")) {
                    if(jQuery('select[name="selected_unit_type"]').length > 0) {
                        selected_unit_type = jQuery('select[name="selected_unit_type"]').val();
                        selected_unit_type = jQuery.trim(selected_unit_type);
                        if(typeof selected_unit_type == "undefined" || selected_unit_type == "" || selected_unit_type == 0) {
                            all_errors_check = 0;
                        }
                    }
                }
	
				var selected_stock_date = "";
                if(jQuery('input[name="selected_stock_date"]').is(":visible")) {
                    if(jQuery('input[name="selected_stock_date"]').length > 0) {
                        selected_stock_date = jQuery('input[name="selected_stock_date"]').val();
                        selected_stock_date = jQuery.trim(selected_stock_date);
                        if(typeof selected_stock_date == "undefined" || selected_stock_date == "" || selected_stock_date == 0) {
                            all_errors_check = 0;
                        }
                    }
                }
				
                var selected_quantity = "";
                if(jQuery('input[name="selected_quantity"]').length > 0) {
                    selected_quantity = jQuery('input[name="selected_quantity"]').val();
                    selected_quantity = jQuery.trim(selected_quantity);
                    if(typeof selected_quantity == "undefined" || selected_quantity == "" || selected_quantity == 0) {
                        all_errors_check = 0;
                    }
                    else if(price_regex.test(selected_quantity) == false) {
                        all_errors_check = 0;
                    }
                    else if(parseFloat(selected_quantity) > 99999) {
                        all_errors_check = 0;
                    }
                }
				var selected_content = "";
                if(jQuery('input[name="selected_content"]').length > 0) {
                    selected_content = jQuery('input[name="selected_content"]').val();
                    selected_content = jQuery.trim(selected_content);
                    if(typeof selected_content == "undefined" || selected_content == "" || selected_content == 0) {
                        all_errors_check = 0;
                    }
                    else if(price_regex.test(selected_content) == false) {
                        all_errors_check = 0;
                    }
                    else if(parseFloat(selected_content) > 99999) {
                        all_errors_check = 0;
                    }
                }
				
                if(parseFloat(all_errors_check) == 1) {
                    var add = 1;
                    if(selected_godown_id != "" && selected_brand_id != "") {
                        if(jQuery('input[name="godown_id[]"]').length > 0) {
								if(jQuery('input[name="brand_id[]"]').length > 0) {
								jQuery('.product_stock_table tbody').find('tr').each(function () {
									var prev_godown_id = "";var prev_brand_id = "";
									prev_godown_id = jQuery(this).find('input[name="godown_id[]"]').val();
									prev_brand_id = jQuery(this).find('input[name="brand_id[]"]').val();
									if (prev_godown_id == selected_godown_id && prev_brand_id == selected_brand_id) {
										add = 0;
									}
								});
							}
                        }
                    }
					
                    if(parseFloat(add) == 1) {
                        var godown_count = 0;
                        godown_count = jQuery('input[name="godown_count"]').val();
                        godown_count = parseInt(godown_count) + 1;
                        jQuery('input[name="godown_count"]').val(godown_count);
                        var post_url = "product_changes.php?product_row_index="+godown_count+"&selected_godown_id="+selected_godown_id+"&selected_brand_id="+selected_brand_id+"&selected_unit_type="+selected_unit_type+"&selected_stock_date="+selected_stock_date+"&selected_quantity="+selected_quantity+"&selected_content="+selected_content;
                        jQuery.ajax({
                            url: post_url, success: function (result) {
                                if (jQuery('.product_stock_table tbody').find('tr').length > 0) {
                                    jQuery('.product_stock_table tbody').find('tr:first').before(result);
                                }
                                else {
                                    jQuery('.product_stock_table tbody').append(result);
                                }
								
								if(selected_godown_id != "") {
									if(jQuery('select[name="selected_godown_id"]').length > 0) {
										jQuery('select[name="selected_godown_id"]').val('').trigger('change');
									}
								}

								if(selected_brand_id != "") {
									if(jQuery('select[name="selected_brand_id"]').length > 0) {
										jQuery('select[name="selected_brand_id"]').val('').trigger('change');
									}
								}
								
								if(jQuery('select[name="selected_unit_type"]').length > 0) {
                                    jQuery('select[name="selected_unit_type"]').val('1').trigger('change');
                                }
                                if(jQuery('input[name="selected_stock_date"]').length > 0) {
                                    jQuery('input[name="selected_stock_date"]').val('');
                                }
								if(jQuery('input[name="selected_quantity"]').length > 0) {
                                    jQuery('input[name="selected_quantity"]').val('');
                                }
								if(jQuery('input[name="selected_content"]').length > 0) {
                                    jQuery('input[name="selected_content"]').val('');
                                }
								if(jQuery('input[name="selected_total_qty"]').length > 0) {
                                    jQuery('input[name="selected_total_qty"]').val('');
                                }
								// SubunitBtnDisable();
								SnoCalculation();
                            }
                        });
                    }
                    else {
                        jQuery('.product_stock_table').before('<span class="infos w-50 text-center mb-3" style="font-size: 15px;">This Godown & Brand Already Exists</span>');
                    }
                }
                else {
                    jQuery('.product_stock_table').before('<span class="infos w-50 text-center mb-3" style="font-size: 15px;">Check Godown & Qty Details</span>');
                }
			}
			else {
				window.location.reload();
			}
		}
	});
}

function DeleteRow(row_index, id_name) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				console.log(id_name+row_index);
				if (jQuery('#'+id_name+row_index).length > 0) {
					if(id_name == 'delivery_challan_row' ) {
						if(jQuery('.'+id_name).length > 1) {
							jQuery('#'+id_name+row_index).remove();
							calcTotalDeliveryChallanQty();
						}
					} else {
						jQuery('#'+id_name+row_index).remove();
					}
				}
                if(id_name == 'product_row') {
                    var godown_count = 0;
                    godown_count = jQuery('input[name="godown_count"]').val();
                    godown_count = parseInt(godown_count) - 1;
                    jQuery('input[name="godown_count"]').val(godown_count);
					if(jQuery('.'+id_name).length == 0) {
						if(jQuery('select[name="category_id"]').length > 0) {
							if(jQuery('input[name="category_id"]').length > 0) {
								jQuery('input[name="category_id"]').val('');
								jQuery('input[name="category_id"]').attr('disabled', true);
							}
							jQuery('select[name="category_id"]').attr('disabled', false);
						}
						if(jQuery('select[name="unit_id"]').length > 0) {
							if(jQuery('input[name="unit_id"]').length > 0) {
								jQuery('input[name="unit_id"]').val('');
								jQuery('input[name="unit_id"]').attr('disabled', true);
							}
							jQuery('select[name="unit_id"]').attr('disabled', false);
						}
						if(jQuery('select[name="subunit_id"]').length > 0) {
							if(jQuery('input[name="subunit_id"]').length > 0) {
								jQuery('input[name="subunit_id"]').val('');
								jQuery('input[name="subunit_id"]').attr('disabled', true);
							}
							jQuery('select[name="subunit_id"]').attr('disabled', false);
						}
						if(jQuery('#stock_maintain').length > 0) {
							if(jQuery('#maintain_input').length > 0) {
								jQuery('#maintain_input').attr('disabled', true);
								jQuery('#maintain_input').val('');
							}
							jQuery('#stock_maintain').attr('disabled', false);
						}
						if(jQuery('#negative_stock_button').length > 0) {
							if(jQuery('#negative_stock_input').length > 0) {
								jQuery('#negative_stock_input').attr('disabled', true);
								jQuery('#negative_stock_input').val('');
							}
							jQuery('#negative_stock_button').attr('disabled', false);
						}
					}
					// SubunitBtnDisable();
                }
				SnoCalculation();
			}
			else {
				window.location.reload();
			}
		}
	});
}



function CalProductAmount() {
    if(jQuery('span.infos').length > 0) {
        jQuery('span.infos').remove();
    }
    var contains_check = 1; var contains_error = 1; 
    var subunit_contains = "";var per_check=1; var per_error =1; var per_type_check=1; var per_type_error =1; var subunitNeed = 0; 
	var selected_amount = 0;var selected_subunit_amount = 0;
    if(jQuery('input[name="subunit_contains"]').length > 0) {
        subunit_contains = jQuery('input[name="subunit_contains"]').val();
        subunit_contains = jQuery.trim(subunit_contains);
        if(typeof subunit_contains == "undefined" || subunit_contains == "" || subunit_contains == 0) {
            contains_check = 0;
        }
        else if(price_regex.test(subunit_contains) == false) {
            contains_error = 0;
        }
        else if(parseFloat(subunit_contains) > 99999) {
            contains_error = 0;
        }
    }
    var selected_rate = "";
    if(jQuery('input[name="sales_rate"]').length > 0) {
        selected_rate = jQuery('input[name="sales_rate"]').val();
        selected_rate = jQuery.trim(selected_rate);
        if(typeof selected_rate == "undefined" || selected_rate == "" || selected_rate == 0) {
            rate_check = 0;
        }
        else if(price_regex.test(selected_rate) == false) {
            rate_error = 0;
        }
        else if(parseFloat(selected_rate) > 99999) {
            rate_error = 0;
        }
    }
	var selected_per = ""; 
    if(jQuery('input[name="per"]').length > 0) {
        selected_per = jQuery('input[name="per"]').val();
        selected_per = jQuery.trim(selected_per);
        if(typeof selected_per == "undefined" || selected_per == "" || selected_per == 0) {
            per_check = 0;
        }
        else if(price_regex.test(selected_per) == false) {
            per_error = 0;
        }
        else if(parseFloat(selected_per) > 99999) {
            per_error = 0;
        }
    }
	var selected_per_type = "";
    if(jQuery('select[name="per_type"]').length > 0) {
        selected_per_type = jQuery('select[name="per_type"]').val();
        selected_per_type = jQuery.trim(selected_per_type);
        if(typeof selected_per_type == "undefined" || selected_per_type == "" || selected_per_type == 0) {
            per_type_check = 0;
        }
        else if(price_regex.test(selected_per_type) == false) {
            per_type_error = 0;
        }
        else if(parseFloat(selected_per_type) > 99999) {
            per_type_error = 0;
        }
    }
    
	if(jQuery('#subunit_need').length > 0) {
		subunitNeed = jQuery('#subunit_need').val();
	}
	if(subunitNeed == 1){
		
		if(parseFloat(per_check) == 1 && parseFloat(per_error) == 1 && parseFloat(per_type_check) == 1 && parseFloat(per_type_error) == 1 && parseFloat(contains_check) == 1 && parseFloat(contains_error) == 1) {
			rate_per_unit = parseFloat(selected_rate) / parseFloat(selected_per);
	
			if(selected_per_type == '1')
				{
					selected_amount = rate_per_unit;
					selected_subunit_amount = parseFloat(rate_per_unit) / parseFloat(subunit_contains);
				}
				else if(selected_per_type == '2')
				{
					selected_subunit_amount = rate_per_unit;
					selected_amount = parseFloat(rate_per_unit) * parseFloat(subunit_contains);
				}

				if(selected_amount != "" && selected_amount != 0 && typeof selected_amount != "undefined") {
					if(jQuery('#rate_per_unit').length > 0) {
						selected_amount = selected_amount.toFixed(2);
						jQuery('#rate_per_unit').html("Rate / unit : "+selected_amount);
					}
					if(jQuery('#rate_per_subunit').length > 0) {
						selected_subunit_amount = selected_subunit_amount.toFixed(2);
						jQuery('#rate_per_subunit').html("Rate / Subunit : "+selected_subunit_amount);
					}
					if(jQuery('input[name="rate_per_case"]').length > 0) {
						 jQuery('input[name="rate_per_case"]').val(selected_amount);
					}
					if(jQuery('input[name="rate_per_piece"]').length > 0) {
						 jQuery('input[name="rate_per_piece"]').val(selected_subunit_amount);
					}
					
				}
				else {
					if(jQuery('#rate_per_unit').length > 0) {
						jQuery('#rate_per_unit').html('');
					}
					if(jQuery('#rate_per_subunit').length > 0) {
						jQuery('#rate_per_subunit').html('');
					}
					if(jQuery('input[name="rate_per_case"]').length > 0) {
						jQuery('input[name="rate_per_case"]').val('');
				   	}
					if(jQuery('input[name="rate_per_piece"]').length > 0) {
							jQuery('input[name="rate_per_piece"]').val('');
					}
				}
				
		}
		else {
			if(jQuery('#rate_per_unit').length > 0) {
				jQuery('#rate_per_unit').html('');
			}
			if(jQuery('#rate_per_subunit').length > 0) {
				jQuery('#rate_per_subunit').html('');
			}
			if(jQuery('input[name="rate_per_case"]').length > 0) {
				jQuery('input[name="rate_per_case"]').val('');
			   }
			if(jQuery('input[name="rate_per_piece"]').length > 0) {
				jQuery('input[name="rate_per_piece"]').val('');
			}
		}

	}else{
		if(parseFloat(per_check) == 1 && parseFloat(per_error) == 1 && parseFloat(per_type_check) == 1 && parseFloat(per_type_error) == 1) {
			rate_per_unit = parseFloat(selected_rate) / parseFloat(selected_per);


			if(selected_per_type == '1')
			{
				selected_amount = rate_per_unit;
			}
			else if(selected_per_type == '2')
			{
				selected_amount = parseFloat(subunit_contains) * parseFloat(rate_per_unit);
			}
			if(selected_amount != "" && selected_amount != 0 && typeof selected_amount != "undefined" && selected_amount) {
				if(jQuery('#rate_per_unit').length > 0) {
					selected_amount = selected_amount.toFixed(2);
					jQuery('#rate_per_unit').html("Rate / unit : "+selected_amount);
				}
				if(jQuery('input[name="rate_per_case"]').length > 0) {
					jQuery('input[name="rate_per_case"]').val(selected_amount);
				}
				if(jQuery('input[name="rate_per_piece"]').length > 0) {
					jQuery('input[name="rate_per_piece"]').val('');
				}
			}
			else {
				if(jQuery('#rate_per_unit').length > 0) {
					jQuery('#rate_per_unit').html('');
				}
				if(jQuery('#rate_per_subunit').length > 0) {
					jQuery('#rate_per_subunit').html('');
				}
				if(jQuery('input[name="rate_per_case"]').length > 0) {
					jQuery('input[name="rate_per_case"]').val('');
				}
				if(jQuery('input[name="rate_per_piece"]').length > 0) {
					jQuery('input[name="rate_per_piece"]').val('');
				}
			}
		}
		else {
			if(jQuery('#rate_per_unit').length > 0) {
				jQuery('#rate_per_unit').html('');
			}
			if(jQuery('#rate_per_subunit').length > 0) {
				jQuery('#rate_per_subunit').html('');
			}
			if(jQuery('input[name="rate_per_case"]').length > 0) {
				jQuery('input[name="rate_per_case"]').val('');
			}
			if(jQuery('input[name="rate_per_piece"]').length > 0) {
				jQuery('input[name="rate_per_piece"]').val('');
			}
		}
	}
}


function AddChargesDetails() {
	var check_login_session = 1; var all_errors_check = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (jQuery('.infos').length > 0) {
					jQuery('.infos').each(function() { jQuery(this).remove(); });
				}
				
                var selected_charges_name = ""; var charges_lower = "";
                if(jQuery('input[name="charges_name"]').is(":visible")) {
                    if(jQuery('input[name="charges_name"]').length > 0) {
                        selected_charges_name = jQuery('input[name="charges_name"]').val();
						charges_lower = selected_charges_name.toLowerCase();
                        selected_charges_name = jQuery.trim(selected_charges_name);
                        if(typeof selected_charges_name == "undefined" || selected_charges_name == "" || selected_charges_name == 0) {
                            all_errors_check = 0;
                        }

                    }
                }

				var selected_action = ""; 
				if(jQuery('select[name="action"]').is(":visible")) {
                    if(jQuery('select[name="action"]').length > 0) {
                        selected_action = jQuery('select[name="action"]').val();
                        selected_action = jQuery.trim(selected_action);
                        if(typeof selected_action == "undefined" || selected_action == "" || selected_action == 0) {
                            all_errors_check = 0;
                        }
                    }
                }
                
				
                if(parseFloat(all_errors_check) == 1) {
                    var add = 1;
                    if(selected_charges_name != "" && selected_action != "") {
                        if(jQuery('input[name="charges_names[]"]').length > 0) {
							jQuery('.charges_table tbody').find('tr').each(function () {
								var prev_charges_name = "";
								prev_charges_name = jQuery(this).find('input[name="charges_names[]"]').val();
								var prev_charges_name_lower = prev_charges_name.toLowerCase();
								if (prev_charges_name_lower == charges_lower) {
									add = 0;
								}
							});
                        }
                    }
					
                    if(parseFloat(add) == 1) {
                        var charges_count = 0;
                        charges_count = jQuery('input[name="charges_count"]').val();
                        charges_count = parseInt(charges_count) + 1;
                        jQuery('input[name="charges_count"]').val(charges_count);
                        var post_url = "charges_changes.php?charges_row_index="+charges_count+"&selected_charges_name="+selected_charges_name+"&selected_action="+selected_action;
                        jQuery.ajax({
                            url: post_url, success: function (result) {
                                if (jQuery('.charges_table tbody').find('tr').length > 0) {
                                    jQuery('.charges_table tbody').find('tr:first').before(result);
                                }
                                else {
                                    jQuery('.charges_table tbody').append(result);
                                }
								
								if(selected_charges_name != "") {
									if(jQuery('input[name="charges_name"]').length > 0) {
										jQuery('input[name="charges_name"]').val('').trigger('change');
									}
								}

								if(selected_action != "") {
									if(jQuery('select[name="action"]').length > 0) {
										jQuery('select[name="action"]').val('').trigger('change');
									}
								}
								SnoCalculation();

                            }
                        });
                    }
                    else {
                        jQuery('.charges_table').before('<span class="infos w-50 text-center mb-3" style="font-size: 15px;">This Charges name is Already Exists</span>');
                    }
                }
                else {
                    jQuery('.charges_table').before('<span class="infos w-50 text-center mb-3" style="font-size: 15px;">Check all details</span>');
                }
			}
			else {
				window.location.reload();
			}
		}
	});
}

function DeleteChargesRow(id_name, row_index) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (jQuery('#'+id_name+'_row'+row_index).length > 0) {
					jQuery('#'+id_name+'_row'+row_index).remove();
				}
				SnoCalculation();
			}
			else {
				window.location.reload();
			}
		}
	});
}

function FindTotalQty() {

	var quantity = jQuery('input[name="selected_quantity"]').val() || 0;
	var content = jQuery('input[name="selected_content"]').val() || 1;
	var total_quantity = jQuery('input[name="selected_total_qty"]').val() || 0;
	var unit_type = jQuery('select[name="selected_unit_type"]').val();

	if(unit_type == '2') {
		content = quantity;
		total_quantity = quantity;
	} else {
		total_quantity = Number(content) * Number(quantity); 		
	}
	jQuery('input[name="selected_quantity"]').val(Number(quantity));
	jQuery('input[name="selected_total_qty"]').val(Number(total_quantity));
}

function AddUnitForStock() {
	var unit_id = jQuery('select[name="unit_id"]').val();
	var subunit_id = jQuery('select[name="subunit_id"]').val();
	var subunit_need = jQuery('#subunit_need').val();


	var listdetials = [];
	var list = {
			unit_id: unit_id,
			subunit_id: subunit_id,
			subunit_need: subunit_need,
		};

		listdetials.push(list);
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				post_url = "product_changes.php?unit_select_change="+JSON.stringify(listdetials);
				jQuery.ajax({
					url: post_url, success: function (result) {
						if(result != "") {
							if($("select[name='selected_unit_type']").length > 0) {
								$("select[name='selected_unit_type']").empty().append(result);
							}
						}
					}
				});
			}
		}
	});
}

function per_type_change() {
	var subunit_need = jQuery('#subunit_need').val();
	var option = '';
	if(subunit_need == '1') {
		option = "<option value='2' selected >Sub Unit</option>";
	} else {
		option = "<option value='1' selected >Unit</option>";
	}
	$("select[name='per_type']").empty().append(option);
}

function GetProdetails() {
	var product = $("select[name='product']").val();
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				post_url = "quotation_changes.php?change_product_id="+product;
				jQuery.ajax({
					url: post_url, success: function (result) {
						if(result != "") {
							result = result.split("$$");
							console.log(result);
							if($("select[name='unit_type']").length > 0) {
								$("select[name='unit_type']").empty().append(result[0]);
							}
							if($("input[name='sales_rate']").length > 0) {
								$("input[name='sales_rate']").val(result[1]);
							}
							if($("input[name='per']").length > 0) {
								$("input[name='per']").val(result[2]);
							}
							if($("select[name='per_type']").length > 0) {
								$("select[name='per_type']").empty().append(result[0]);
								$("select[name='per_type']").val(result[3]).trigger('change');
							}
							if($("input[name='subunit_need']").length > 0) {
								$("input[name='subunit_need']").val(result[4]);
							}
							window.globalVar = result[5].split("%%");
							console.log(globalVar);
						}
					}
				});
			}
		}
	});
}

function calcAmount() {

	var unit_type = $("select[name='unit_type']").val();
	var per_rate = 0;
	var quantity =  $("input[name='quantity']").val();

	if(unit_type == '1') {
		per_rate = $("input[name='rate_per_case']").val();
	} else {
		per_rate =  $("input[name='rate_per_piece']").val();
	}

	var amount = Number(quantity) * parseFloat(per_rate);

	if($("input[name='amount']").length > 0) {
		$("input[name='amount']").val(amount);
	}
	if($("input[id='amount']").length > 0) {
		$("input[id='amount']").val(amount);
	}	
}

function AddQuotationProduct() {
	var check_login_session = 1; var all_errors_check = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (jQuery('.infos').length > 0) {
					jQuery('.infos').each(function() { jQuery(this).remove(); });
				}
				
				var brand = ""; 
				if(jQuery('select[name="brand"]').is(":visible")) {
                    if(jQuery('select[name="brand"]').length > 0) {
                        brand = jQuery('select[name="brand"]').val();
                        brand = jQuery.trim(brand);
                        if(typeof brand == "undefined" || brand == "" || brand == 0) {
                            all_errors_check = 0;
                        }
                    }
                }
				var product = ""; 
				if(jQuery('select[name="product"]').is(":visible")) {
                    if(jQuery('select[name="product"]').length > 0) {
                        product = jQuery('select[name="product"]').val();
                        product = jQuery.trim(product);
                        if(typeof product == "undefined" || product == "" || product == 0) {
                            all_errors_check = 0;
                        }
                    }
                }
                
				var unit_type = "";
                if(jQuery('select[name="unit_type"]').is(":visible")) {
                    if(jQuery('select[name="unit_type"]').length > 0) {
                        unit_type = jQuery('select[name="unit_type"]').val();
                        unit_type = jQuery.trim(unit_type);
                        if(typeof unit_type == "undefined" || unit_type == "" || unit_type == 0) {
                            all_errors_check = 0;
                        }
                    }
                }
				
                var quantity = "";
                if(jQuery('input[name="quantity"]').length > 0) {
                    quantity = jQuery('input[name="quantity"]').val();
                    quantity = jQuery.trim(quantity);
                    if(typeof quantity == "undefined" || quantity == "" || quantity == 0) {
                        all_errors_check = 0;
                    }
                    else if(price_regex.test(quantity) == false) {
                        all_errors_check = 0;
                    }
                    else if(parseFloat(quantity) > 99999) {
                        all_errors_check = 0;
                    }
                }
				var subunit_contains = "";
                if(jQuery('input[name="subunit_contains"]').length > 0) {
                    subunit_contains = jQuery('input[name="subunit_contains"]').val();
                    subunit_contains = jQuery.trim(subunit_contains);
                    if(typeof subunit_contains == "undefined" || subunit_contains == "" || subunit_contains == 0) {
                        all_errors_check = 0;
                    }
                    else if(price_regex.test(subunit_contains) == false) {
                        all_errors_check = 0;
                    }
                    else if(parseFloat(subunit_contains) > 99999) {
                        all_errors_check = 0;
                    }
                }
				var sales_rate = "";
                if(jQuery('input[name="sales_rate"]').length > 0) {
                    sales_rate = jQuery('input[name="sales_rate"]').val();
                    sales_rate = jQuery.trim(sales_rate);
                    if(typeof sales_rate == "undefined" || sales_rate == "" || sales_rate == 0) {
                        all_errors_check = 0;
                    }
                    else if(price_regex.test(sales_rate) == false) {
                        all_errors_check = 0;
                    }
                    else if(parseFloat(sales_rate) > 99999) {
                        all_errors_check = 0;
                    }
                }

				var per = "";
                if(jQuery('input[name="per"]').length > 0) {
                    per = jQuery('input[name="per"]').val();
                    per = jQuery.trim(per);
                    if(typeof per == "undefined" || per == "" || per == 0) {
                        all_errors_check = 0;
                    }
                    else if(price_regex.test(per) == false) {
                        all_errors_check = 0;
                    }
                    else if(parseFloat(per) > 99999) {
                        all_errors_check = 0;
                    }
                }

				var amount = "";
                if(jQuery('input[name="amount"]').length > 0) {
                    amount = jQuery('input[name="amount"]').val();
                    amount = jQuery.trim(amount);
                    if(typeof amount == "undefined" || amount == "" || amount == 0) {
                        all_errors_check = 0;
                    }
                    else if(price_regex.test(amount) == false) {
                        all_errors_check = 0;
                    }
                    else if(parseFloat(amount) > 999999) {
                        all_errors_check = 0;
                    }
                }

				var per_type = "";
                if(jQuery('select[name="per_type"]').is(":visible")) {
                    if(jQuery('select[name="per_type"]').length > 0) {
                        per_type = jQuery('select[name="per_type"]').val();
                        per_type = jQuery.trim(per_type);
                        if(typeof per_type == "undefined" || per_type == "" || per_type == 0) {
                            all_errors_check = 0;
                        }
                    }
                }
				
                if(parseFloat(all_errors_check) == 1) {
                    var add = 1;
                    if(product != "" && brand != "" && unit_type != "") {
						if(jQuery('input[name="brand_id[]"]').length > 0) {
							if(jQuery('input[name="product_id[]"]').length > 0) {
								if(jQuery('input[name="quotation_unit_type[]"]').length > 0) {
									jQuery('.quotation_table tbody').find('tr').each(function () {
										var prev_product_id = "";var prev_brand_id = ""; var prev_unit_type = "";
										prev_product_id = jQuery(this).find('input[name="product_id[]"]').val();
										prev_brand_id = jQuery(this).find('input[name="brand_id[]"]').val();
										prev_unit_type = jQuery(this).find('input[name="quotation_unit_type[]"]').val();
										console.log("=>",prev_product_id,"=>",prev_brand_id,"=>",prev_unit_type);
										if (prev_product_id == product && prev_brand_id == brand && prev_unit_type == unit_type) {
											add = 0;
										}
									});
								}
							}
						}
                    }
					
                    if(parseFloat(add) == 1) {
                        var product_count = 0;
                        product_count = jQuery('input[name="product_count"]').val();
                        product_count = parseInt(product_count) + 1;
                        jQuery('input[name="product_count"]').val(product_count);
                        var post_url = "quotation_changes.php?quotation_row_index="+product_count+"&product="+product+"&brand="+brand+"&unit_type="+unit_type+"&quantity="+quantity+"&subunit_contains="+subunit_contains+"&sales_rate="+sales_rate+"&per="+per+"&per_type="+per_type+"&amount="+amount+"&unit_subunit="+globalVar;
                        jQuery.ajax({
                            url: post_url, success: function (result) {
                                if (jQuery('.quotation_table tbody').find('tr').length > 0) {
                                    jQuery('.quotation_table tbody').find('tr:first').before(result);
                                }
                                else {
                                    jQuery('.quotation_table tbody').append(result);
                                }
								
								if(product != "") {
									if(jQuery('select[name="product"]').length > 0) {
										jQuery('select[name="product"]').val('').trigger('change');
									}
								}

								if(brand != "") {
									if(jQuery('select[name="brand"]').length > 0) {
										jQuery('select[name="brand"]').val('').trigger('change');
									}
								}
								
								if(jQuery('select[name="unit_type"]').length > 0) {
                                    jQuery('select[name="unit_type"]').val('1').trigger('change');
                                }

								if(jQuery('input[name="quantity"]').length > 0) {
                                    jQuery('input[name="quantity"]').val('');
                                }
								if(jQuery('input[name="subunit_contains"]').length > 0) {
                                    jQuery('input[name="subunit_contains"]').val('');
                                }
								if(jQuery('input[name="per"]').length > 0) {
                                    jQuery('input[name="per"]').val('');
                                }
								if(jQuery('input[name="quantity"]').length > 0) {
                                    jQuery('input[name="quantity"]').val('');
                                }
								jQuery('.poppins').find('select').select2();
								// SubunitBtnDisable();
								SnoCalculation();
								calcQuotationSubtotal();
                            }
                        });
                    }
                    else {
                        jQuery('.quotation_table').before('<span class="infos w-50 text-center mb-3" style="font-size: 15px;">This Product & Brand Already Exists</span>');
                    }
                }
                else {
                    jQuery('.quotation_table').before('<span class="infos w-50 text-center mb-3" style="font-size: 15px;">Check Brand, Product & Qty Details</span>');
                }
			}
			else {
				window.location.reload();
			}
		}
	});
}

function calcRowAmount(id) {
	if(id == 0 ) {
		id = '0';
	}
	var quantity = $("#quotation_qty_"+id).val();
	var unit_type = $("#unit_type_"+id).val();
	var content = $("#content_"+id).val();
	var rate = $("#quotation_sales_rate_"+id).val();
	var per = $("#quotation_per_"+id).val();
	var per_type = $("#quotation_per_type_"+id).val();
	var amount = '';
	var rate_per_piece = '';
	var rate_per_case = '';
	if(per == 0 || per == '') {
		per = 1;
		$("#quotation_per_"+id).val(1);
	}
	if(per_type == '1') {
		rate_per_case = parseFloat(rate) / Number(per);
		rate_per_piece = rate_per_case / content;
	} else {
		rate_per_piece = parseFloat(rate) / Number(per);
		rate_per_case = rate_per_piece * content;
	}

	if(unit_type == '1') {
		amount = quantity * rate_per_case;
	} else if(unit_type == '2') {
		amount = quantity * rate_per_piece;
	}

	console.log(id,"$$",quantity,"$$",unit_type,"$$",content,"$$",rate,"$$",per,"$$",per_type,"$$",amount,"$$",rate_per_piece,"$$",rate_per_case,"$$",amount);

	$("#quotation_amount_"+id).val(amount);
	$("#quotation_amount_tr_" + id).html(parseFloat(amount).toFixed(2));
	calcQuotationSubtotal();
}

function AddChargesRow(obj, colspan) {
    var post_url = "quotation_changes.php?get_charges_row=1"+"&charges_colspan="+colspan;
    jQuery.ajax({url: post_url, success: function (result) {
        result = jQuery.trim(result);
        if(jQuery(obj).closest('tfoot').find('.charges_row').length > 0) {
            jQuery(obj).closest('tfoot').find('.charges_row').last().after(result);
        }
    }});
}

function DeleteChargesRow(obj) {
    if(jQuery(obj).closest('.charges_row').length > 0) {
        jQuery(obj).closest('.charges_row').remove();
    }
    calOverallTotal();
}

function GetChargesType(obj) {
    var charges_id = "";
    charges_id = jQuery(obj).val();
    var post_url = "quotation_changes.php?get_charges_type="+charges_id;
    jQuery.ajax({url: post_url, success: function (result) {
        result = jQuery.trim(result);
		console.log("001=>",result);
        if(jQuery(obj).closest('.charges_row').find('input[name="charges_type[]"]').length > 0) {
            jQuery(obj).closest('.charges_row').find('input[name="charges_type[]"]').val(result);
        }
        CheckCharges();
    }});
}

function CheckCharges() {
    var sub_total = 0;
    if(jQuery('.sub_total').length > 0) {
        sub_total = jQuery('.sub_total').html();
        sub_total = sub_total.trim();
    }
    var total_amount = 0;
    if(price_regex.test(sub_total) !== false) {
        total_amount = sub_total;
        if(jQuery('.charges_row').length > 0) {
            jQuery('.charges_row').each(function() {
                if(jQuery(this).find('span.infos').length > 0) {
                    jQuery(this).find('span.infos').remove();
                }
                var charges_value = 0; var charges_check = 1; var charges_type = "";
                if(jQuery(this).find('input[name="charges_value[]"]').length > 0) {
                    charges_value = jQuery(this).find('input[name="charges_value[]"]').val();
                    charges_value = charges_value.trim();
                    if(charges_value != "" && charges_value != 0 && typeof charges_value != "undefined" && charges_value != null) {
                        if(charges_value.indexOf('%') != -1) {
                            charges_value = charges_value.replace('%', '');
                            charges_value = charges_value.trim();
                            if(price_regex.test(charges_value) == false) {
                                charges_check = 0;
                            }
                            else {
                                charges_value = (parseFloat(total_amount) * parseFloat(charges_value)) / 100;
                                charges_value = charges_value.toFixed(2);
                            }
                        }
                        else {
                            if(price_regex.test(charges_value) == false) {
                                charges_check = 0;
                            }
                            else {
                                charges_value = parseFloat(charges_value);
                                charges_value = charges_value.toFixed(2);
                            }
                        }
                    }
                    else {
                        charges_check = 2;
                    }
                }
                if(jQuery(this).find('input[name="charges_type[]"]').length > 0) {
                    charges_type = jQuery(this).find('input[name="charges_type[]"]').val();
                    charges_type = charges_type.trim();
                    if(charges_type != "" && charges_type != 0 && typeof charges_type != "undefined" && charges_type != null) {
                        if(charges_type != "plus" && charges_type != "minus") {
                            charges_check = 0;
                            jQuery(this).find('input[name="charges_type[]"]').after('<span class="infos">Invalid Type</span>');
                        }
                    }
                    else {
                        charges_check = 2;
                    }
                }
                if(parseInt(charges_check) == 1) {
                    if(charges_type == "minus") {
                        total_amount = parseFloat(total_amount) - parseFloat(charges_value);
                        total_amount = total_amount.toFixed(2);
                    }
                    else if(charges_type == "plus") {
                        total_amount = parseFloat(total_amount) + parseFloat(charges_value);
                        total_amount = total_amount.toFixed(2); 
                    }
                    if(jQuery(this).find('.charges_total').length > 0) {
                        jQuery(this).find('.charges_total').html(charges_value);
                    }
                }
                else if(parseInt(charges_check) == 0) {
                    total_amount = 0;
                    if(jQuery(this).find('.charges_total').length > 0) {
                        jQuery(this).find('.charges_total').html('<span class="infos">Invalid</span>');
                    }
                }
                else {
                    if(jQuery(this).find('.charges_total').length > 0) {
                        jQuery(this).find('.charges_total').html('0.00');
                    }
                }
            });
        }
    }
    if(price_regex.test(total_amount) !== false) {
        if(jQuery('.taxable_value_amount').length > 0) {
            jQuery('.taxable_value_amount').html(total_amount);
        }
        if(jQuery('.total_amount').length > 0) {
            jQuery('.total_amount').html(total_amount);
        }
    }
    else {
        if(jQuery('.taxable_value_amount').length > 0) {
            jQuery('.taxable_value_amount').html('0.00');
        }
        if(jQuery('.total_amount').length > 0) {
            jQuery('.total_amount').html('0.00');
        }
    }
    ShowGST();
}

function ShowGST() {
    if(jQuery('.cgst_amount').length > 0) {
        jQuery('.cgst_amount').html('');
    }
    if(jQuery('.sgst_amount').length > 0) {
        jQuery('.sgst_amount').html('');
    }
    if(jQuery('.igst_amount').length > 0) {
        jQuery('.igst_amount').html('');
    }
    if(jQuery('.total_tax_amount').length > 0) {
        jQuery('.total_tax_amount').html('');
    }
    var gst_option = 0;
    if(jQuery('input[name="gst_option"]').length > 0) {
        gst_option = jQuery('input[name="gst_option"]').val();
        gst_option = gst_option.trim();
    }
    var company_state = "";
    if(jQuery('input[name="company_state"]').length > 0) {
        company_state = jQuery('input[name="company_state"]').val();
        company_state = company_state.trim();
    }
    var party_state = "";
    if(jQuery('input[name="party_state"]').length > 0) {
        party_state = jQuery('input[name="party_state"]').val();
        party_state = party_state.trim();
    }
    var total_amount = 0;
    var taxable_value_amount = 0;
    if(jQuery('.taxable_value_amount').length > 0) {
        taxable_value_amount = jQuery('.taxable_value_amount').html();
        taxable_value_amount = taxable_value_amount.trim();
        total_amount = taxable_value_amount;
    }
    else {
        if(jQuery('.total_amount').length > 0) {
            total_amount = jQuery('.total_amount').html();
            total_amount = total_amount.trim();
        }
    }
    var cgst_amount = 0; var sgst_amount = 0; var igst_amount = 0; var total_tax_amount = 0; var tax_value = 0;

    if(parseInt(gst_option) == 1) {
        if(jQuery('.taxable_value_row').length > 0) {
            jQuery('.taxable_value_row').removeClass('d-none');
        }
        if(jQuery('.total_tax_value_row').length > 0) {
            jQuery('.total_tax_value_row').removeClass('d-none');
        }
        if(price_regex.test(taxable_value_amount) !== false) {
            tax_value = (parseFloat(taxable_value_amount) * 18) / 100;
            tax_value = tax_value.toFixed(2);
            total_tax_amount = tax_value;
            if(company_state == party_state) {
                if(jQuery('.cgst_value_row').length > 0) {
                    jQuery('.cgst_value_row').removeClass('d-none');
                }
                if(jQuery('.sgst_value_row').length > 0) {
                    jQuery('.sgst_value_row').removeClass('d-none');
                }
                if(jQuery('.igst_value_row').length > 0) {
                    jQuery('.igst_value_row').addClass('d-none');
                }
                cgst_amount = parseFloat(tax_value) / 2;
                cgst_amount = cgst_amount.toFixed(2);
                sgst_amount = parseFloat(tax_value) / 2;
                sgst_amount = sgst_amount.toFixed(2);
                if(jQuery('.cgst_amount').length > 0) {
                    jQuery('.cgst_amount').html(cgst_amount);
                }
                if(jQuery('.sgst_amount').length > 0) {
                    jQuery('.sgst_amount').html(sgst_amount);
                }
                if(jQuery('.total_tax_amount').length > 0) {
                    jQuery('.total_tax_amount').html(total_tax_amount);
                }
            }
            else {
                if(jQuery('.cgst_value_row').length > 0) {
                    jQuery('.cgst_value_row').addClass('d-none');
                }
                if(jQuery('.sgst_value_row').length > 0) {
                    jQuery('.sgst_value_row').addClass('d-none');
                }
                if(jQuery('.igst_value_row').length > 0) {
                    jQuery('.igst_value_row').removeClass('d-none');
                }
                igst_amount = parseFloat(tax_value);
                igst_amount = igst_amount.toFixed(2);
                if(jQuery('.igst_amount').length > 0) {
                    jQuery('.igst_amount').html(igst_amount);
                }
                if(jQuery('.total_tax_amount').length > 0) {
                    jQuery('.total_tax_amount').html(total_tax_amount);
                }
            }
            
            total_amount = parseFloat(total_amount) + parseFloat(total_tax_amount);
            total_amount = total_amount.toFixed(2);
        }
    } 
    else {
        if(jQuery('.taxable_value_row').length > 0) {
            jQuery('.taxable_value_row').addClass('d-none');
        }
        if(jQuery('.cgst_value_row').length > 0) {
            jQuery('.cgst_value_row').addClass('d-none');
        }
        if(jQuery('.sgst_value_row').length > 0) {
            jQuery('.sgst_value_row').addClass('d-none');
        }
        if(jQuery('.igst_value_row').length > 0) {
            jQuery('.igst_value_row').addClass('d-none');
        }
        if(jQuery('.total_tax_value_row').length > 0) {
            jQuery('.total_tax_value_row').addClass('d-none');
        }
    }
    if(jQuery('.total_amount').length > 0) {
        jQuery('.total_amount').html(total_amount);
    }
    OverallAmount();
}

function OverallAmount() {
    var total_amount = 0;
    if(jQuery('.total_amount').length > 0) {
        total_amount = jQuery('.total_amount').html();
        total_amount = total_amount.trim();
    }
    if(price_regex.test(total_amount) !== false) {
        var decimal = "";
        var numbers = total_amount.toString().split('.');							
        if( typeof numbers[1] != 'undefined' && numbers[1] != null && numbers[1] != "") {
            decimal = numbers[1];
        }
        if(decimal != "" && decimal != "00") {
            if(decimal.length == 1) {
                decimal = decimal+'0';
            }
            var round_off = "";
            if(parseFloat(decimal) >= 50) {
                round_off = 100 - parseFloat(decimal);
                round_off = jQuery.trim(round_off);
                if(round_off.length == 1) {
                    round_off = "0.0"+round_off;
                }
                else {
                    round_off = "0."+round_off;
                }
                total_amount = parseFloat(total_amount) + parseFloat(round_off);
                if(jQuery('.round_off').length > 0) {
                    jQuery('.round_off').html(round_off);
                }
            }
            else {
                round_off = decimal;
                round_off = jQuery.trim(round_off);
                if(round_off.length == 1) {
                    round_off = "0.0"+round_off;
                }
                else {
                    round_off = "0."+round_off;
                }

                total_amount = parseFloat(total_amount) - parseFloat(round_off);
                if(jQuery('.round_off').length > 0) {
                    jQuery('.round_off').html(" - "+round_off);
                }
            }
        }
        else {
            if(jQuery('.round_off').length > 0) {
                jQuery('.round_off').html('0.00');
            }
        }
        if(jQuery('.grand_total').length > 0) {
            jQuery('.grand_total').html(total_amount);
        }
    }
    else {
        if(jQuery('.grand_total').length > 0) {
            jQuery('.grand_total').html('0');
        }
    }
}

function calcQuotationSubtotal() {
	var sub_total = 0;
	var total_qty = 0;
	$('input[name="quotation_amount[]"]').each(function() {
		var val = parseFloat($(this).val());
		if (!isNaN(val)) {
			sub_total += val;
		}
	});
	$('input[name="total_qty[]"]').each(function() {
		var val = parseFloat($(this).val());
		if (!isNaN(val)) {
			total_qty += val;
		}
	});
	console.log(sub_total,"$$");
	if($(".sub_total").length > 0) {
		$(".sub_total").html(sub_total.toFixed(2));
	}
	if($(".grand_qty").length > 0) {
		$(".grand_qty").html(total_qty);
	}
	CheckCharges();
}
function CalculateTotalQty(id) {
	console.log("=>",id);
	if(id != '') {
		var quantity = $("#product_quantity_"+id).val();
		var unit_type = $("#unit_type_"+id).val();
		var content = $("#subunit_contains_"+id).val();
		var total_qty = 0;
		console.log("=>",quantity,"=>",unit_type,"=>",content);
		if(quantity == '' || quantity == 0) {
			quantity = 1;
			$("#product_quantity_"+id).val(1);
		}
		if(unit_type == '1') {
			total_qty = quantity * content;
		} else if(unit_type == '2') {
			total_qty = quantity;
		}
		if($("#total_qty_"+id).length > 0) {
			$("#total_qty_"+id).val(total_qty);
			$("#total_qty_td_"+id).html(total_qty);
				console.log("<br>=>",total_qty);
				calcTotalDeliveryChallanQty();
		}
	}
}

function calcTotalDeliveryChallanQty() {
	var total_qty = 0;
	$('input[name="total_qty[]"]').each(function() {
		var val = parseFloat($(this).val());
		if (!isNaN(val)) {
			total_qty += val;
		}
	});
	if($("#grand_total").length > 0) {
		$("#grand_total").val(total_qty);
		$("#grand_total_qty").html(total_qty);
	}
}