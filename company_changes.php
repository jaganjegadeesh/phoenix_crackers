<?php
    include("include.php");

    if(isset($_REQUEST['show_company_id'])) { 
        $show_company_id = $_REQUEST['show_company_id'];
        $show_company_id = trim($show_company_id);
        
        $name = ""; $address = ""; $country = "India"; $state = "Tamil Nadu"; $district = "";$city = ""; $pincode = ""; $gst_number = ""; $mobile_number = "";$logo = "";
       
        if(!empty($show_company_id)) {
            $company_list = array();
            $company_list = $obj->getTableRecords($GLOBALS['company_table'], 'company_id', $show_company_id,'');

			if(!empty($company_list)) {
				foreach($company_list as $data) {
					if(!empty($data['name'])) {
						$name = $obj->encode_decode('decrypt', $data['name']);
					}
					if(!empty($data['address'])) {
						$address = $obj->encode_decode('decrypt', $data['address']);
					}
					if(!empty($data['state'])) {
						$state = $obj->encode_decode('decrypt', $data['state']);
					} 
                    if(!empty($data['district']) && $data['district'] != $GLOBALS['null_value']) {
						$district = $obj->encode_decode('decrypt', $data['district']);
					} 
                    if(!empty($data['city']) && $data['city'] != $GLOBALS['null_value']) {
						$city = $obj->encode_decode('decrypt', $data['city']);
					}
					if(!empty($data['gst_number']) && $data['gst_number'] != $GLOBALS['null_value']) {
						$gst_number = $obj->encode_decode('decrypt', $data['gst_number']);
					}
                    if(!empty($data['pincode']) && $data['pincode'] != $GLOBALS['null_value']) {
						$pincode = $obj->encode_decode('decrypt', $data['pincode']);
					} 
                    if(!empty($data['mobile_number']) && $data['mobile_number'] != $GLOBALS['null_value']) {
						$mobile_number = $obj->encode_decode('decrypt', $data['mobile_number']);
					}
                    if(!empty($data['logo'])) {
						$logo = $data['logo'];
					}
                   
				}
            }
        } 
        $target_dir = $obj->image_directory();
?>
        <form class="poppins pd-20 redirection_form" name="company_form" method="POST">
            <div class="card-header align-items-center">
                <div class="row p-2">
                    <div class="col-lg-8 col-md-8 col-8 align-self-center">
                        <?php if(empty($show_company_id)) { ?>
                            <div class="h5">Add Company</div>
                        <?php } else { ?>
                            <div class="h5">Edit Company</div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-danger float-end" style="font-size:11px;" type="button" onclick="window.open('company.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
                </div>
            </div>
            <div class="row p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_company_id)) { echo $show_company_id; } ?>">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="form-group mb-2">
                                <div class="form-label-group in-border">
                                    <input type="text" id="company_name" name="company_name" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',50,1);" value="<?php if(!empty($name)) { echo $name; } ?>">
                                    <label>Company Name <span class="text-danger">*</span></label>
                                </div>
                                <div class="new_smallfnt">Contains Text, Symbols &amp;, -,',.</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="form-group mb-2">
                                <div class="form-label-group in-border">
                                    <input type="text" id="mobile_number" name="mobile_number" class="form-control shadow-none" onfocus="Javascript:KeyboardControls(this,'mobile_number',10,'');" onkeyup="Javascript:InputBoxColor(this,'text');" value="<?php if(!empty($mobile_number)) { echo $mobile_number; } ?>">
                                    <label>Mobile Number <span class="text-danger">*</span></label>
                                </div>
                                <div class="new_smallfnt">Numbers Only (only 10 digits)</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="form-group mb-2">
                                <div class="form-label-group in-border">
                                    <textarea class="form-control" id="address" name="address" onkeydown="Javascript:KeyboardControls(this,'',150,'');InputBoxColor(this,'text');"><?php if(!empty($address)) { echo $address; } ?></textarea>
                                <label>Address<span class="text-danger">*</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 py-2">
                            <div class="form-group">
                                <div class="form-label-group in-border mb-0">
                                    <div class="w-100" style="display:none;">
                                        <select class="select2 select2-danger" name="country" id="country" onchange="Javascript:getCountries('company',this.value,'','','');" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                            <option>India</option>
                                        </select>
                                    </div>
                                    <select class="select2 select2-danger" data-dropdown-css-class="select2-danger"  style="width: 100%;" name="state" onchange="Javascript:getStates('company',this.value,'','');">
                                        <option value="">Select State</option>
                                    </select>
                                    <label>State <span class="text-danger">*</span></label>
                                </div>
                            </div>        
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 py-2">
                            <div class="form-group">
                                <div class="form-label-group in-border mb-0">
                                    <select name="district" class="select2 select2-danger" data-dropdown-css-class="select2-danger"  style="width: 100%;" onchange="Javascript:getDistricts('company',this.value,'');">
                                        <option value="">Select District</option>
                                    </select>
                                    <label>District <span class="text-danger">*</span></label>
                                </div>
                            </div>        
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 py-2">
                            <div class="form-group">
                                <div class="form-label-group in-border mb-0">
                                    <select name="city" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="Javascript:getCities('company','',this.value);">
                                        <option>Select City</option>
                                    </select>
                                    <label>City <span class="text-danger">*</span></label>
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 py-2 d-none" id="others_city_cover">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <input type="text" id="others_city" name="others_city" class="form-control shadow-none" value="" onkeydown="Javascript:KeyboardControls(this,'text',30,1);">
                                    <label>Others city <span class="text-danger">*</span></label>
                                </div>
                                <div class="new_smallfnt">Text Only(Max Char: 30)</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 py-2">
                            <div class="form-group mb-2">
                                <div class="form-label-group in-border">
                                    <input type="text" id="pincode" name="pincode" class="form-control shadow-none" onfocus="Javascript:KeyboardControls(this,'number',6,'');" onkeyup="Javascript:InputBoxColor(this,'text');" value="<?php if(!empty($pincode)) { echo $pincode; } ?>">
                                    <label>Pincode</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 py-2">
                            <div class="form-group mb-2">
                                <div class="form-label-group in-border">
                                    <input type="text" id="gst_number" name="gst_number" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'',16,'');InputBoxColor(this,'text');" value="<?php if(!empty($gst_number)) { echo $gst_number; } ?>">
                                    <label id="gst_label">GST Number <span class="text-danger">*</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                <div id="logo_cover" class="form-group">
						<h6 class="w-100 text-center">Max.Upload Size - 2 MB</h6> 
						<div class="image-upload text-center">
							<label for="logo">   
								<div class="logo_list row">
									<div class="col-12">
										<div class="cover">
											<?php if(!empty($logo) && file_exists($target_dir.$logo)) { ?>
												<button type="button" onclick="Javascript:delete_upload_image_before_save(this, 'logo', '<?php if(!empty($logo)) { echo $logo; } ?>');" class="btn btn-danger"><i class="fa fa-close"></i></button>
												<img id="logo_preview" src="<?php echo $target_dir.$logo; ?>" style="max-width: 100%; max-height: 150px;" />
												<input type="hidden" name="logo_name[]" value="<?php if(!empty($logo)) { echo $logo; } ?>">
											<?php } else { ?>
												<img id="logo_preview" src="include/images/upload_image.png" style="max-width: 150px;" />
											<?php } ?>
										</div>
									</div>        
								</div>
								<input type="file" name="logo" id="logo" style="display: none;" accept="image/*" />
							</label>
						</div>
						
						<div class="logo_container" style="display: none;">
							<canvas id="logo_canvas"></canvas>
						</div>
					</div>
                </div>
                
              
                <div class="col-md-12 pt-3 text-center">
                    <button class="btn btn-dark submit_button" type="button" onClick="Javascript:SaveModalContent(event,'company_form', 'company_changes.php', 'company.php');">
                        Submit
                    </button>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    getCountries('company','<?php if(!empty($country)) { echo $country; } ?>', '<?php if(!empty($state)) { echo $state; } ?>', '<?php if(!empty($district)) { echo $district; } ?>', '<?php if(!empty($city)) { echo $city; } ?>');
                });
            </script>
            <script type="text/javascript" src="include/js/image_upload.js"></script>
            <script src="include/select2/js/select2.min.js"></script>
            <script src="include/select2/js/select.js"></script>
        </form>
        <?php
    }

    if(isset($_POST['company_name'])) {	
        $name = ""; $name_error = ""; $address = ""; $address_error = ""; $gst_number = ""; $gst_number_error = ""; $city = ""; $city_error = ""; $district = ""; $district_error = "";$state = ""; $state_error = ""; $pincode = ""; $pincode_error = ""; $mobile_number = ""; $mobile_number_error = "";$others_city = ""; $others_city_error = "";
        $logo_name = array(); $logo = "";

        $valid_company = ""; $form_name = "company_form"; $edit_id = "";

        if(isset($_POST['edit_id'])) {
            $edit_id = $_POST['edit_id'];
            $edit_id = trim($edit_id);
        }

        if(isset($_POST['company_name'])) {
            $name = $_POST['company_name'];
            $name = trim($name);
            $name_error = $valid->valid_company_name($name,'name','1','50');
        }
        if(empty($name_error) && empty($edit_id)) {
            $company_list = array(); $company_count = 0;
            $company_list = $obj->getTableRecords($GLOBALS['company_table'], '', '','');
            if(!empty($company_list)) {
                $company_count = count($company_list);
            }
            if($company_count == $GLOBALS['max_company_count']) {
                $name_error = "Max. ".$GLOBALS['max_company_count']." companys are allowed";
            }
        }
        if(!empty($name_error)) {
            if(!empty($valid_company)) {
                $valid_company = $valid_company." ".$valid->error_display($form_name, "company_name", $name_error, 'text');
            }
            else {
                $valid_company = $valid->error_display($form_name, "company_name", $name_error, 'text');
            }
        }

        if(isset($_POST['address'])) {
            $address = $_POST['address'];
            $address = trim($address);
            $address_error = $valid->valid_address($address,'address','1','150');
            if(!empty($address_error)) {
                if(!empty($valid_company)) {
                    $valid_company = $valid_company." ".$valid->error_display($form_name, "address", $address_error, 'textarea');
                }
                else {
                    $valid_company = $valid->error_display($form_name, "address", $address_error, 'textarea');
                }
            }
        }

        if(isset($_POST['state'])) {
            $state = $_POST['state'];
            $state = trim($state);
            $state_error = $valid->common_validation($state,'State','select');
            if(!empty($state_error)) {
                if(!empty($valid_company)) {
                    $valid_company = $valid_company." ".$valid->error_display($form_name, "state", $state_error, 'select');
                }
                else {
                    $valid_company = $valid->error_display($form_name, "state", $state_error, 'select');
                }
            }
        }

        if(isset($_POST['district'])) {
            $district = $_POST['district'];
            $district = trim($district);
            $district_error = $valid->common_validation($district,'District','select');
            if(!empty($district_error)) {
                if(!empty($valid_company)) {
                    $valid_company = $valid_company." ".$valid->error_display($form_name, "district", $district_error, 'select');
                }
                else {
                    $valid_company = $valid->error_display($form_name, "district", $district_error, 'select');
                }
            }
        }

        if(isset($_POST['city'])) {
            $city = $_POST['city'];
            $city = trim($city);
            $city_error = $valid->common_validation($city,'City','select');
            if(!empty($city_error)) {
                if(!empty($valid_company)) {
                    $valid_company = $valid_company." ".$valid->error_display($form_name, "city", $city_error, 'select');
                }
                else {
                    $valid_company = $valid->error_display($form_name, "city", $city_error, 'select');
                }
            }
            else{
                if(isset($_POST['others_city']))
                {
                    $others_city = $_POST['others_city'];
                    $others_city = trim($others_city);
                    if(!empty($city) && $city == "Others") {
                        $others_city_error = $valid->valid_text($others_city,'City','1','30');
                        if(!empty($others_city_error)) {
                            if(!empty($valid_company)) {
                                $valid_company = $valid_company." ".$valid->error_display($form_name, "others_city", $others_city_error, 'text');
                            }
                            else {
                                $valid_company = $valid->error_display($form_name, "others_city", $others_city_error, 'text');
                            }
                        }
                        else {
                            $city = $others_city;
                            $city = trim($city);
                        }
                    }
                }
            }
        }

        if(isset($_POST['pincode'])) {
            $pincode = $_POST['pincode'];
            $pincode = trim($pincode);
            if(!empty($pincode)) {
                $pincode_error = $valid->valid_pincode($pincode, "Pincode", "0");
                if(!empty($pincode_error)) {
                    if(!empty($valid_company)) {
                        $valid_company = $valid_company." ".$valid->error_display($form_name, "pincode", $pincode_error, 'text');
                    }
                    else {
                        $valid_company = $valid->error_display($form_name, "pincode", $pincode_error, 'text');
                    }
                }
            }
        }

        if(isset($_POST['mobile_number'])) {
            $mobile_number = $_POST['mobile_number'];
            $mobile_number = trim($mobile_number);
            $mobile_number_error = $valid->valid_mobile_number($mobile_number, "Mobile Number", "1");
            if(!empty($mobile_number_error)) {
                if(!empty($valid_company)) {
                    $valid_company = $valid_company." ".$valid->error_display($form_name, "mobile_number", $mobile_number_error, 'text');
                }
                else {
                    $valid_company = $valid->error_display($form_name, "mobile_number", $mobile_number_error, 'text');
                }
            }
        }

        if(isset($_POST['gst_number'])) {
            $gst_number = $_POST['gst_number'];
            $gst_number = trim($gst_number);
            $gst_number_error = $valid->valid_gst_number($gst_number, "GST Number", '1');
            if(!empty($gst_number_error)) {
                if(!empty($valid_company)) {
                    $valid_company = $valid_company." ".$valid->error_display($form_name, "gst_number", $gst_number_error, 'text');
                }
                else {
                    $valid_company = $valid->error_display($form_name, "gst_number", $gst_number_error, 'text');
                }
            }
        }

        if(!empty($edit_id)) {
			if($city != "Others" && (empty($others_city))){
				$others_city = $city;
			}
		}
        if(isset($_POST['logo_name'])) {
            $logo_name = $_POST['logo_name'];	
        }
        
        $result = ""; $lower_case_name = "";
        
        if(empty($valid_company)) {
            $check_user_id_ip_address = 0;
            $check_user_id_ip_address = $obj->check_user_id_ip_address();	
            if(preg_match("/^\d+$/", $check_user_id_ip_address)) {
                if(!empty($logo_name) && is_array($logo_name)) {
                    $logo = implode("$$$", $logo_name);
                }
                else if(!empty($logo_name)) {
                    $logo = $logo_name;
                }
                if(empty($logo)) {
                    $logo = $GLOBALS['null_value'];
                }

                $company_details = "";

                if(!empty($name)) {
                    $company_details = $name;
                    $name = htmlentities($name,ENT_QUOTES);
                    $lower_case_name = strtolower($name);   
                    $name = $obj->encode_decode('encrypt', $name);
                    $lower_case_name = htmlentities($lower_case_name,ENT_QUOTES);
                    $lower_case_name = $obj->encode_decode('encrypt', $lower_case_name);
                }

                if(!empty($address)) {
                    if(!empty($company_details)) {
                        $company_details = $company_details."<br>".str_replace("\r\n", "<br>", $address);
                    }
                    $address = htmlentities($address,ENT_QUOTES);
                    $address = $obj->encode_decode('encrypt', $address);
                }
                else {
                    $address = $GLOBALS['null_value'];
                }

                if(!empty($city)) {
                    if(!empty($company_details)) {
                        $company_details = $company_details."<br>".$city;
                    }
                    $city = $obj->encode_decode('encrypt', $city);
                }
                else {
                    $city = $GLOBALS['null_value'];
                }
                if(!empty($pincode)) {
                    if(!empty($company_details) && !empty($city)) {
                        $company_details = $company_details." - ".$pincode;
                    }
                    $pincode = $obj->encode_decode('encrypt', $pincode);
                }
                else {
                    $pincode = $GLOBALS['null_value'];
                }
                if(!empty($district)) {
                    if(!empty($company_details)) {
                        $company_details = $company_details."<br>".$district." (Dist.)";
                    }
                    $district = $obj->encode_decode('encrypt', $district);
                }
                else {
                    $district = $GLOBALS['null_value'];
                }
                if(!empty($state)) {
                    if(!empty($company_details)) {
                        $company_details = $company_details."<br>".$state;
                    }
                    $state = $obj->encode_decode('encrypt', $state);
                }
                else {
                    $state = $GLOBALS['null_value'];
                }
                if(!empty($mobile_number)) {
                    if(!empty($company_details)) {
                        $company_details = $company_details."<br>Contact :".$mobile_number;
                    }
                    $mobile_number = $obj->encode_decode('encrypt', $mobile_number);
                }
                else {
                    $mobile_number = $GLOBALS['null_value'];
                }
                if(!empty($gst_number)) {
                    if(!empty($company_details)) {
                        $company_details = $company_details."<br>GST IN :".$gst_number;
                    }
                    $gst_number = $obj->encode_decode('encrypt', $gst_number);
                }
                else {
                    $gst_number = $GLOBALS['null_value'];
                } 

                if(empty($others_city)) {
                    $others_city = $GLOBALS['null_value'];
                }

                if(!empty($company_details)) {
                    $company_details = $obj->encode_decode('encrypt',$company_details);
                }

                $image_copy = 0; $prev_logo = ""; 
                if(!empty($edit_id)) {		
					$prev_logo = $obj->getTableColumnValue($GLOBALS['company_table'], 'company_id', $edit_id, 'logo');
                }

                $prev_company_id = "";$company_error = "";
                if(!empty($lower_case_name)) {
                    $prev_company_id = $obj->getTableColumnValue($GLOBALS['company_table'],'lower_case_name',$lower_case_name,'company_id');
                    if(!empty($prev_company_id)) {
                        $company_error = "This company name already exists";
                    }
                }
                 

                $created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
                $creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);

                if(empty($edit_id)) {
                    if(empty($prev_company_id)) {
                        $action = "";
                        if(!empty($name)) {
                            $action = "New company Created. Name - ".($obj->encode_decode('decrypt', $name));
                        }

                        $check_company = array(); $company_count = 0;
                        $check_company = $obj->getTableRecords($GLOBALS['company_table'], '', '','');
                        if(!empty($check_company)) {
                            $company_count = count($check_company);
                        }

                        $primary_company = 0;
                        if(empty($company_count)) {
                            $primary_company = 1;
                        }

                        $null_value = $GLOBALS['null_value'];

                        $columns = array();$values = array();
                        $columns = array('created_date_time', 'creator', 'creator_name', 'company_id', 'name', 'lower_case_name', 'address', 'state', 'district', 'city', 'pincode', 'others_city', 'gst_number', 'mobile_number', 'company_details', 'primary_company','logo','deleted');

                        $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$null_value."'", "'".$name."'", "'".$lower_case_name."'", "'".$address."'", "'".$state."'", "'".$district."'", "'".$city."'", "'".$pincode."'","'".$others_city."'", "'".$gst_number."'", "'".$mobile_number."'", "'".$company_details."'", "'".$primary_company."'","'".$logo."'", "'0'");

                        $company_insert_id = $obj->InsertSQL($GLOBALS['company_table'], $columns, $values,'company_id', '', $action);	
                                 
                        if(preg_match("/^\d+$/", $company_insert_id)) {
                            $image_copy = 1;
                            $result = array('number' => '1', 'msg' => 'Company Successfully Created');
                        }
                        else {
                            $result = array('number' => '2', 'msg' => $company_insert_id);
                        }
                    }
                    else {
                        if(!empty($company_error)) {
                            $result = array('number' => '2', 'msg' => $company_error);
                        } 
                    }	
                }
                else {
                    if(empty($prev_company_id) || $prev_company_id == $edit_id) {
                        $getUniqueID = "";
                        $getUniqueID = $obj->getTableColumnValue($GLOBALS['company_table'], 'company_id', $edit_id, 'id');
                        if(preg_match("/^\d+$/", $getUniqueID)) {
                            $action = "";
                            if(!empty($name)) {
                                $action = "Company Updated. Name - ".($obj->encode_decode('decrypt', $name));
                            }

                            $columns = array(); $values = array();						
                            $columns = array('creator_name', 'name', 'lower_case_name', 'address', 'state', 'district', 'city', 'pincode', 'others_city', 'gst_number', 'mobile_number', 'company_details','logo');
                            $values = array("'".$creator_name."'", "'".$name."'", "'".$lower_case_name."'", "'".$address."'", "'".$state."'", "'".$district."'", "'".$city."'", "'".$pincode."'","'".$others_city."'", "'".$gst_number."'", "'".$mobile_number."'", "'".$company_details."'","'".$logo."'");

                            $company_update_id = $obj->UpdateSQL($GLOBALS['company_table'], $getUniqueID, $columns, $values, $action);
                            
                            if(preg_match("/^\d+$/", $company_update_id)) {
                                $image_copy = 1; 
                                $result = array('number' => '1', 'msg' => 'Updated Successfully');					
                            }
                            else {
                                $result = array('number' => '2', 'msg' => $company_update_id);
                            }							
                        }
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $company_error);
                    }
                }	
                
                if(!empty($image_copy) && $image_copy == 1) {
					$target_dir = $obj->image_directory(); $temp_dir = $obj->temp_image_directory();
					if(!empty($logo)) {				
						if(file_exists($temp_dir.$logo)) {   
							if(!empty($prev_logo)) {		
								if(file_exists($target_dir.$prev_logo)) {   
									unlink($target_dir.$prev_logo);
								}
							}
							copy($temp_dir.$logo, $target_dir.$logo);
						}
						else {
							if($logo == $GLOBALS['null_value']) {
								if(!empty($prev_logo) && file_exists($target_dir.$prev_logo)) {   
									unlink($target_dir.$prev_logo);
								}
							}
						}
					}
					$obj->clear_temp_image_directory();
				}
            }
            else {
                $result = array('number' => '2', 'msg' => 'Invalid IP');
            }
        }
        else {
            if(!empty($valid_company)) {
                $result = array('number' => '3', 'msg' => $valid_company);
            }
        }
        
        if(!empty($result)) {
            $result = json_encode($result);
        }
        echo $result; exit;
    }

    if(isset($_POST['page_number'])) {
        $page_number = $_POST['page_number'];
        $page_limit = $_POST['page_limit'];
        $page_title = $_POST['page_title']; 
        
        $total_records_list = array();
        $total_records_list = $obj->getTableRecords($GLOBALS['company_table'],'','','DESC'); 
    
        $total_pages = 0;	
        $total_pages = count($total_records_list);
        
        $page_start = 0; $page_end = 0;
        if(!empty($page_number) && !empty($page_limit) && !empty($total_pages)) {
            if($total_pages > $page_limit) {
                if($page_number) {
                    $page_start = ($page_number - 1) * $page_limit;
                    $page_end = $page_start + $page_limit;
                }
            }
            else {
                $page_start = 0;
                $page_end = $page_limit;
            }
        }
    
        $show_records_list = array();
        if(!empty($total_records_list)) {
            foreach($total_records_list as $key => $val) {
                if($key >= $page_start && $key < $page_end) {
                    $show_records_list[] = $val;
                }
            }
        }
        
        $prefix = 0;
        if(!empty($page_number) && !empty($page_limit)) {
            $prefix = ($page_number * $page_limit) - $page_limit;
        } 
        if($total_pages > $page_limit) { ?>
            <div class="pagination_cover mt-3"> 
                <?php
                    include("pagination.php");
                ?> 
            </div>
            <?php 
        } 
        ?>
        
        <table class="table nowrap cursor text-center smallfnt">
            <thead class="bg-light">
                <tr>
                    <th>S.No</th>
                    <th>Company Name</th>
                    <th>City</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!empty($show_records_list)) {
                        foreach($show_records_list as $key => $list) {
                            $index = $key + 1;
                            if(!empty($prefix)) { $index = $index + $prefix; } 
                ?>
                            <tr>
                                <td><?php echo $index; ?></td>
                                <td>
                                    <?php
                                        if(!empty($list['name']) && $list['name'] != $GLOBALS['null_value']) {
                                            echo html_entity_decode($obj->encode_decode('decrypt', $list['name']));
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if(!empty($list['city']) && $list['city'] != $GLOBALS['null_value']) {
                                            echo $obj->encode_decode('decrypt', $list['city']);
                                        }
                                        else {
                                            echo '-';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if(!empty($list['mobile_number']) && $list['mobile_number'] != $GLOBALS['null_value']) {
                                            echo $obj->encode_decode('decrypt', $list['mobile_number']);
                                        }
                                        else {
                                            echo '-';
                                        }
                                    ?>
                                </td>
                                <td>
                                <div class="dropdown">
                                        <a href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                            <li><a class="dropdown-item" href="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($list['company_id'])) { echo $list['company_id']; } ?>');"><i class="fa fa-pencil"></i> &ensp; Edit</a></li>
                                           
                                        </ul>
                                    </div>    
                                  
                                </td>
                            </tr>
                <?php
                        }
                    }
                    else {
                ?>
                        <tr>
                            <td colspan="5" class="text-center">Sorry! No records found</td>
                        </tr>
                <?php 
                    } 
                ?>
            </tbody>
        </table>
        <?php 
    }

    if(isset($_REQUEST['delete_company_id'])) {
        $delete_company_id = $_REQUEST['delete_company_id'];
        $delete_company_id = trim($delete_company_id);
        $msg = "";
        if(!empty($delete_company_id)) {	
            $company_unique_id = "";
            $company_unique_id = $obj->getTableColumnValue($GLOBALS['company_table'], 'company_id', $delete_company_id, 'id');
        
            if(preg_match("/^\d+$/", $company_unique_id)) {
                $name = "";
                $name = $obj->getTableColumnValue($GLOBALS['company_table'], 'company_id', $delete_company_id, 'name');
            
                $action = "";
                if(!empty($name)) {
                    $action = "Company Deleted. Name - ".($obj->encode_decode('decrypt', $name));
                }

                $columns = array(); $values = array();						
                $columns = array('deleted');
                $values = array("'1'");
                $msg = $obj->UpdateSQL($GLOBALS['company_table'], $company_unique_id, $columns, $values, $action);
            }
            else {
                $msg = "Invalid Company";
            }
        }
        else {
            $msg = "Empty Company";
        }
        echo $msg;
        exit;	
    }
?>