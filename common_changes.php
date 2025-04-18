<?php
	include("include.php");

	if(isset($_REQUEST['get_city'])) {
		$district = $_REQUEST['get_district'];

		if(!empty($district))
		{
			$district = $obj->encode_decode("encrypt",$district);
		}

		$city = ""; $list = array();

		$list = $obj->getOtherCityList($district);
		foreach($list as $data) {
			if(!empty($data['city'])) {
				$data['city'] = $obj->encode_decode("decrypt",$data['city']);
				if(!empty($city)) {
					$city = $city.",".trim($data['city']);
				}
				else {
					$city = $data['city'];
				}
			}	
		}
		if(!empty($city)) {
			echo trim($city);
		}
		exit;
	}
	
	if(isset($_REQUEST['others_city'])) {
		$other_city = $_REQUEST['others_city'];
		$selected_district_index = $_REQUEST['selected_district'];
		$form_name = $_REQUEST['form_name'];

		if($other_city == '1')
		{ 
			?>
			<div class="form-group">
				<div class="form-label-group in-border">
					<input type="text" id="others_city" name="others_city" class="form-control shadow-none" value="" onkeydown="Javascript:KeyboardControls(this,'text',30,1);">
					<label>Others city <span class="text-danger">*</span></label>
				</div>
				<div class="new_smallfnt">Text Only (Max Char : 30)</div>
			</div>
			<?php 
		}
	}
    
	if(isset($_REQUEST['view_party_details'])) {
        $type_id = $_REQUEST['view_party_details'];
        $type_id = trim($type_id);
        $type = $_REQUEST['details_type'];
        $type = trim($type);
        $details_list = array();
        if(!empty($type)) {
            $details_list = $obj->getTableRecords($GLOBALS[$type.'_table'], $type.'_id', $type_id, '');
			if(!empty($details_list)) {
				foreach($details_list as $data) {
					if(!empty($data[$type.'_name']) && $data[$type.'_name'] != $GLOBALS['null_value']) {
						$name = $obj->encode_decode('decrypt', $data[$type.'_name']);
					}
					if(!empty($data['address']) && $data['address'] != $GLOBALS['null_value']) {
						$address = $obj->encode_decode('decrypt', $data['address']);
					}
					if(!empty($data['city']) && $data['city'] != $GLOBALS['null_value']) {
						$city = $obj->encode_decode('decrypt', $data['city']);
					}
					if(!empty($data['district']) && $data['district'] != $GLOBALS['null_value']) {
						$district = $obj->encode_decode('decrypt', $data['district']);
					}
					if(!empty($data['state']) && $data['state'] != $GLOBALS['null_value']) {
						$state = $obj->encode_decode('decrypt', $data['state']);
					}
					if(!empty($data['pincode']) && $data['pincode'] != $GLOBALS['null_value']) {
						$pincode = $obj->encode_decode('decrypt', $data['pincode']);
					}
					if(!empty($data['mobile_number']) && $data['mobile_number'] != $GLOBALS['null_value']) {
						$mobile_number = $obj->encode_decode('decrypt', $data['mobile_number']);
					}
					if(!empty($data['email']) && $data['email'] != $GLOBALS['null_value']) {
						$email = $obj->encode_decode('decrypt', $data['email']);
					}
					if(!empty($data['identification']) && $data['identification'] != $GLOBALS['null_value']) {
						$identification = $obj->encode_decode('decrypt', $data['identification']);
					}
				}	
			}

			?>
			<div class="row" style="margin-bottom: 20px;">
				<div class="col-lg-12 col-xl-12 d-flex">
					<div class="col-lg-4 col-xl-4 col-sm-6"><b>Name </b></div>
					<div class="col-lg-8 col-xl-8 col-sm-6" style="margin: 0 -35px;"><?php if(!empty($name)){ echo ": " .$name; }?> </div>
				</div>
			</div>
			<div class="row" style="margin-bottom: 20px;">
				<div class="col-lg-12 col-xl-12 d-flex">
					<div class="col-lg-4 col-xl-4 col-sm-6"><b>Phone Number </b></div>
					<div class="col-lg-8 col-xl-8 col-sm-6" style="margin: 0 -35px;"><?php if(!empty($mobile_number)){ echo ": " .$mobile_number; }?> </div>
				</div>
			</div>
			<?php if(!empty($email) && ($email != 'NULL')){ ?>
				<div class="row" style="margin-bottom: 20px;">
					<div class="col-lg-12 col-xl-12 d-flex">
						<div class="col-lg-4 col-xl-4 col-sm-6"><b>Email </b></div>
						<div class="col-lg-8 col-xl-8 col-sm-6" style="margin: 0 -35px;"><?php if(!empty($email)){ echo ": " .$email; }?> </div>
					</div>
				</div> <?php
			} ?>
			<?php if(!empty($address) && ($address != 'NULL')){ ?>
				<div class="row" style="margin-bottom: 20px;">
					<div class="col-lg-12 col-xl-12 d-flex">
						<div class="col-lg-4 col-xl-4 col-sm-6"><b>Address </b></div>
						<div class="col-lg-8 col-xl-8 col-sm-6" style="margin: 0 -35px;"><?php if(!empty($address)){ echo ": " .$address; }?> </div>
					</div>
				</div> <?php
			} 
			if(!empty($city) && ($city != 'NULL')){ ?>
				<div class="row" style="margin-bottom: 20px;">
					<div class="col-lg-12 col-xl-12 d-flex">
						<div class="col-lg-4 col-xl-4 col-sm-6"><b>City </b></div>
						<div class="col-lg-8 col-xl-8 col-sm-6" style="margin: 0 -35px;"><?php if(!empty($city)){ echo ": " .$city; }?> </div>
					</div>
				</div> <?php
			} ?>
			<?php if(!empty($district) && ($district != 'NULL')){ ?>
				<div class="row" style="margin-bottom: 20px;">
					<div class="col-lg-12 col-xl-12 d-flex">
						<div class="col-lg-4 col-xl-4 col-sm-6"><b>District </b></div>
						<div class="col-lg-8 col-xl-8 col-sm-6" style="margin: 0 -35px;"><?php if(!empty($district)){ echo ": " .$district; }?> </div>
					</div>
				</div> <?php
			} ?>
			<div class="row" style="margin-bottom: 20px;">
				<div class="col-lg-12 col-xl-12 d-flex">
					<div class="col-lg-4 col-xl-4 col-sm-6"><b>State </b></div>
					<div class="col-lg-8 col-xl-8 col-sm-6" style="margin: 0 -35px;"><?php if(!empty($state)){ echo ": " .$state; }?> </div>
				</div>
			</div>
			<?php if(!empty($identification) && ($identification != 'NULL')){ ?>
				<div class="row" style="margin-bottom: 20px;">
					<div class="col-lg-12 col-xl-12 d-flex">
						<div class="col-lg-4 col-xl-4 col-sm-6"><b>Identification </b></div>
						<div class="col-lg-8 col-xl-8 col-sm-6" style="margin: 0 -35px;"><?php if(!empty($identification)){ echo ": " .$identification; }?> </div>
					</div>
				</div> <?php
			}  
		
        }
    }
	if(isset($_REQUEST['view_details'])) {
		$view_details = $_REQUEST['view_details'];
		$type = $_REQUEST['type']; 
	
		$party_details = [];
	
		if (!empty($view_details) && !empty($type)) {
			
			$party_list = $obj->getTableRecords($GLOBALS['party_table'], 'party_id', $view_details,'');
			$name ="";$mobile_number ="";$email = "";$address = "";$state ="";$city = "";$identification ="";
			if (!empty($party_list)) {
				foreach ($party_list as $data) {
				   
					if (($type == '1' && $data['party_type'] == 1 || $data['party_type'] == 3 ) || ($type == '2' && $data['party_type'] == 2) || $data['party_type'] == 3) {
						
						if(!empty($data['party_name']) && $data['party_name'] !=$GLOBALS['null_value']) {
						    $name = $obj->encode_decode('decrypt', $data['party_name']);
						}
						if(!empty($data['mobile_number']) && $data['mobile_number'] !=$GLOBALS['null_value']) {
						$mobile_number = $obj->encode_decode('decrypt', $data['mobile_number']);
						}
						if(!empty($data['email']) && $data['email'] !=$GLOBALS['null_value']) {

						$email = $obj->encode_decode('decrypt', $data['email']);
						}
						if(!empty($data['address']) && $data['address'] !=$GLOBALS['null_value']) {

						$address = $obj->encode_decode('decrypt', $data['address']);
						}
						if(!empty($data['state']) && $data['state'] !=$GLOBALS['null_value']) {

						$state = $obj->encode_decode('decrypt', $data['state']);
						}
						if(!empty($data['city']) && $data['city'] !=$GLOBALS['null_value']) {

						$city = $obj->encode_decode('decrypt', $data['city']);
						}
						if(!empty($data['identification']) && $data['identification'] !=$GLOBALS['null_value']) {

						$identification = $obj->encode_decode('decrypt', $data['identification']);
						}
	
					   $party_details = [
							'name' => $name,
							'mobile_number' => $mobile_number,
							'email' => $email,
							'address' => $address,
							'city' => $city,
							'state' => $state,
							'identification' => $identification
						];
						
						break; 
					}
				}
			}
		}
	
	   
		if (!empty($party_details)) {
			echo json_encode($party_details);
		}
		exit;
	}

	if(isset($_REQUEST['view_details'])) {
        $type_id = $_REQUEST['view_details'];
        $type_id = trim($type_id);
        $type = $_REQUEST['type'];
        $type = trim($type);
        $details_list = array();
        if(!empty($type)) {
            $details_list = $obj->getTableRecords($GLOBALS[$type.'_table'], $type.'_id', $type_id, '');
			if(!empty($details_list)) {
				?>
				<div class="col-12 table-responsive">
					<table class="table table-bordered table-striped nowrap cursor text-center smallfnt" style="font-size:15px;">
						<tbody>
							<?php
								foreach($details_list as $data) {
									if(!empty($data[$type.'_name']) && $data[$type.'_name'] != $GLOBALS['null_value']) {
										?>
										<tr>
											<td class="text-center px-2 py-2">Name</td>
											<td class="text-center px-2 py-2">
												<?php echo html_entity_decode($obj->encode_decode('decrypt', $data[$type.'_name'])); ?>
											</td>
										</tr>
										<?php
									}
									if(!empty($data['address']) && $data['address'] != $GLOBALS['null_value']) {
										?>
										<tr>
											<td class="text-center px-2 py-2">Address</td>
											<td class="text-center px-2 py-2">
												<?php echo html_entity_decode($obj->encode_decode('decrypt', $data['address'])); ?>
											</td>
										</tr>
										<?php
									}
									if(!empty($data['city']) && $data['city'] != $GLOBALS['null_value']) {
										?>
										<tr>
											<td class="text-center px-2 py-2">City</td>
											<td class="text-center px-2 py-2">
												<?php echo $obj->encode_decode('decrypt', $data['city']); ?>
											</td>
										</tr>
										<?php
									}
									if(!empty($data['district']) && $data['district'] != $GLOBALS['null_value']) {
										?>
										<tr>
											<td class="text-center px-2 py-2">District</td>
											<td class="text-center px-2 py-2">
												<?php echo $obj->encode_decode('decrypt', $data['district']); ?>
											</td>
										</tr>
										<?php
									}
									if(!empty($data['state']) && $data['state'] != $GLOBALS['null_value']) {
										?>
										<tr>
											<td class="text-center px-2 py-2">State</td>
											<td class="text-center px-2 py-2">
												<?php echo $obj->encode_decode('decrypt', $data['state']); ?>
											</td>
										</tr>
										<?php
									}
									if(!empty($data['pincode']) && $data['pincode'] != $GLOBALS['null_value']) {
										?>
										<tr>
											<td class="text-center px-2 py-2">Pincode</td>
											<td class="text-center px-2 py-2">
												<?php echo $obj->encode_decode('decrypt', $data['pincode']); ?>
											</td>
										</tr>
										<?php
									}
									if(!empty($data['mobile_number']) && $data['mobile_number'] != $GLOBALS['null_value']) {
										?>
										<tr>
											<td class="text-center px-2 py-2">Mobile No.</td>
											<td class="text-center px-2 py-2">
												<?php echo $obj->encode_decode('decrypt', $data['mobile_number']); ?>
											</td>
										</tr>
										<?php
									}
									if($type != "suspense_party") {
										if(!empty($data['email']) && $data['email'] != $GLOBALS['null_value']) {
											?>
											<tr>
												<td class="text-center px-2 py-2">Email</td>
												<td class="text-center px-2 py-2">
													<?php echo $obj->encode_decode('decrypt', $data['email']); ?>
												</td>
											</tr>
											<?php
										}
									}
									if($type != "suspense_party") {
										if(!empty($data['gst_number']) && $data['gst_number'] != $GLOBALS['null_value']) {
											?>
											<tr>
												<td class="text-center px-2 py-2">GST No.</td>
												<td class="text-center px-2 py-2">
													<?php echo $obj->encode_decode('decrypt', $data['gst_number']); ?>
												</td>
											</tr>
											<?php
										}
									}
									if(!empty($data['identification']) && $data['identification'] != $GLOBALS['null_value']) {
										?>
										<tr>
											<td class="text-center px-2 py-2">Identification</td>
											<td class="text-center px-2 py-2">
												<?php echo $obj->encode_decode('decrypt', $data['identification']); ?>
											</td>
										</tr>
										<?php
									}
								}
							?>
						</tbody>
					</table>
				</div>
				<?php
			}
        }
    }
	
	
?>