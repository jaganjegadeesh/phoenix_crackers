<?php 
    class Creation_functions extends Basic_Functions{

		public function BillCompanyDetails($bill_company_id, $table) {
			$bill_company_details = "";
			if(!empty($bill_company_id)) {
				$check_company = array();
				$check_company = $this->getTableRecords($GLOBALS['company_table'], 'company_id', $bill_company_id,'');
				if(!empty($check_company)) {
					foreach($check_company as $data) {
						
						if(!empty($data['name'])) {
							$bill_company_details = $this->encode_decode('decrypt', $data['name']);
						}
						if(!empty($data['address1'])) {
							$bill_company_details = $bill_company_details."$$$".$this->encode_decode('decrypt', $data['address1']);
						}
						if(!empty($data['state'])) {
							$bill_company_details = $bill_company_details."$$$".$this->encode_decode('decrypt', $data['state']);
						}
						if(!empty($data['district'])) {
							$bill_company_details = $bill_company_details."$$$".$this->encode_decode('decrypt', $data['district']);
						}
						if(!empty($data['city'])) {
							$bill_company_details = $bill_company_details."$$$".$this->encode_decode('decrypt', $data['city']);
						}
						if(!empty($data['mobile_number']) && $data['mobile_number'] != $GLOBALS['null_value']) {
							$bill_company_details = $bill_company_details."$$$".$this->encode_decode('decrypt', $data['mobile_number']);
						}
						else {
							$bill_company_details = $bill_company_details."$$$".$GLOBALS['null_value'];
						}
						if(!empty($data['email']) && $data['email'] != $GLOBALS['null_value']) {
							$bill_company_details = $bill_company_details."$$$".$this->encode_decode('decrypt', $data['email']);
						}
						else {
							$bill_company_details = $bill_company_details."$$$".$GLOBALS['null_value'];
						}
						if(!empty($data['gst_number']) && $data['gst_number'] != $GLOBALS['null_value']) {
							$bill_company_details = $bill_company_details."$$$".$this->encode_decode('decrypt', $data['gst_number']);
						}
						else {
							$bill_company_details = $bill_company_details."$$$".$GLOBALS['null_value'];
						}
						
					}
				}
				if(!empty($bill_company_details)) {
					$bill_company_details = $this->encode_decode('encrypt', $bill_company_details);
				}
			}
			return $bill_company_details;
		}
		
		// Check Payment Mode Already Exist in PaymentMode Table
		public function CheckPaymentModeAlreadyExists($company_id, $payment_mode_name) {
			$list = array(); $select_query = ""; $payment_mode_id = ""; $where = "";
			if(!empty($bill_company_id)) {
				$where = " bill_company_id = '".$company_id."' AND ";
			}
			if(!empty($payment_mode_name)) {
				$select_query = "SELECT payment_mode_id FROM ".$GLOBALS['payment_mode_table']." WHERE ".$where." lower_case_name = '".$payment_mode_name."' AND deleted = '0'";	
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['payment_mode_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['payment_mode_id'])) {
							$payment_mode_id = $data['payment_mode_id'];
						}
					}
				}
			}
			return $payment_mode_id;
		}

		// Check Bank Name Already Exist in Bank Table
		public function getBankRecords($delete_bank_id) {
			$list = array(); $select_query = ""; $id = ""; $where = "";
			$bill_company_id = $GLOBALS['bill_company_id'];
			if(!empty($bill_company_id)) {
				$where = " bill_company_id = '".$bill_company_id."' AND ";
			}
			if(!empty($where)) {
				$select_query = "SELECT * FROM ".$GLOBALS['payment_table']." WHERE ".$where." bill_id ='".$delete_bank_id."' AND  deleted='0'";    
		   }
		   if(!empty($select_query)) {
			   $list = $this->getQueryRecords($GLOBALS['payment_table'], $select_query);
		   }
		   
			return $list;
		}

	


		// Check Unit Name Already Exist in Unit Table
		public function CheckUnitAlreadyExists($company_id, $unit_name) {
			$list = array(); $select_query = ""; $unit_id = ""; $where = "";
			if(!empty($bill_company_id)) {
				$where = " bill_company_id = '".$company_id."' AND ";
			}
			if(!empty($unit_name)) {
				$select_query = "SELECT unit_id FROM ".$GLOBALS['unit_table']." WHERE ".$where." lower_case_name = '".$unit_name."' AND deleted = '0'";	
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['unit_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['unit_id'])) {
							$unit_id = $data['unit_id'];
						}
					}
				}
			}
			return $unit_id;
		}

		// Check Category Name Already Exist in Category Table
		public function CheckCategoryAlreadyExists($company_id, $category_name) {
			$list = array(); $select_query = ""; $category_id = ""; $where = "";
			if(!empty($bill_company_id)) {
				$where = " bill_company_id = '".$company_id."' AND ";
			}
			if(!empty($category_name)) {
				$select_query = "SELECT category_id FROM ".$GLOBALS['category_table']." WHERE ".$where." lower_case_name = '".$category_name."' AND deleted = '0'";	
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['category_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['category_id'])) {
							$category_id = $data['category_id'];
						}
					}
				}
			}
			return $category_id;
		}

		// Check Brand Name Already Exist in Brand Table
		public function CheckBrandAlreadyExists($company_id, $brand_name) {
			$list = array(); $select_query = ""; $brand_id = ""; $where = "";
			if(!empty($bill_company_id)) {
				$where = " bill_company_id = '".$company_id."' AND ";
			}
			if(!empty($brand_name)) {
				$select_query = "SELECT brand_id FROM ".$GLOBALS['brand_table']." WHERE ".$where." lower_case_name = '".$brand_name."' AND deleted = '0'";	
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['brand_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['brand_id'])) {
							$brand_id = $data['brand_id'];
						}
					}
				}
			}
			return $brand_id;
		}

		// Check Godown Name Already Exist in Godown Table
		public function CheckGodownAlreadyExists($company_id, $godown_name) {
			$list = array(); $select_query = ""; $godown_id = ""; $where = "";
			if(!empty($bill_company_id)) {
				$where = " bill_company_id = '".$company_id."' AND ";
			}
			if(!empty($godown_name)) {
				$select_query = "SELECT godown_id FROM ".$GLOBALS['godown_table']." WHERE ".$where." lower_case_name = '".$godown_name."' AND deleted = '0'";	
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['godown_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['godown_id'])) {
							$godown_id = $data['godown_id'];
						}
					}
				}
			}
			return $godown_id;
		}

		// Check Product Name Already Exist in Product Table
		public function CheckProductNameAlreadyExists($company_id, $product_name) {
			$list = array(); $select_query = ""; $product_id = ""; $where = "";
			if(!empty($bill_company_id)) {
				$where = " bill_company_id = '".$company_id."' AND ";
			}
			if(!empty($product_name)) {
				$select_query = "SELECT product_id FROM ".$GLOBALS['product_table']." WHERE ".$where." lower_case_name = '".$product_name."' AND deleted = '0'";	
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['product_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['product_id'])) {
							$product_id = $data['product_id'];
						}
					}
				}
			}
			return $product_id;
		}

		// Get Payment Mode Linked  count in bank ,voucher,receipt,expense voucher,suspense voucher or suspense receipt Table
		public function GetPaymentmodeLinkedCount($payment_mode_id) {
			$list = array(); $select_query = ""; $count = 0;
			if(!empty($payment_mode_id)) {
				$select_query = "SELECT id_count FROM 
									((SELECT count(id) as id_count FROM ".$GLOBALS['bank_table']." WHERE FIND_IN_SET('".$payment_mode_id."', payment_mode_id) AND deleted = '0')
									UNION ALL 
									(SELECT count(id) as id_count FROM ".$GLOBALS['voucher_table']." WHERE FIND_IN_SET('".$payment_mode_id."', payment_mode_id) AND deleted = '0')
									UNION ALL 
									(SELECT count(id) as id_count FROM ".$GLOBALS['receipt_table']." WHERE FIND_IN_SET('".$payment_mode_id."', payment_mode_id) AND deleted = '0')
									UNION ALL 
									(SELECT count(id) as id_count FROM ".$GLOBALS['expense_voucher_table']." WHERE FIND_IN_SET('".$payment_mode_id."', payment_mode_id) AND deleted = '0')
									UNION ALL 
									(SELECT count(id) as id_count FROM ".$GLOBALS['suspense_voucher_table']." WHERE FIND_IN_SET('".$payment_mode_id."', payment_mode_id) AND deleted = '0')
									UNION ALL 
									(SELECT count(id) as id_count FROM ".$GLOBALS['suspense_receipt_table']." WHERE FIND_IN_SET('".$payment_mode_id."', payment_mode_id) AND deleted = '0')
									)

								as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['id_count']) && $data['id_count'] != $GLOBALS['null_value']) {
						$count = $data['id_count'];
					}
				}
			}
			return $count;
		}

		// Check Role id already exist in Role Table
		public function CheckRoleAlreadyExists($bill_company_id,$lower_case_name) {
			$list = array(); $select_query = ""; $role_id = "";
			if(!empty($bill_company_id) && !empty($lower_case_name)) {
				$select_query = "SELECT role_id FROM ".$GLOBALS['role_table']." WHERE bill_company_id = '".$bill_company_id."' AND lower_case_name = '".$lower_case_name."' AND deleted = '0'";
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['role_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['role_id'])) {
							$role_id = $data['role_id'];
						}
					}
				}
			}
			return $role_id;
		}

		// Get Product id Linked count in Purchase ,Quotation,Estimate,Invoice,Material Transfer or stock adjustment Table
		public function GetProductLinkedCount($product_id) {
			$list = array(); $select_query = ""; $where = ""; $mt_where = ""; $count = 0;
			if(!empty($product_id)) {
				$where = " FIND_IN_SET('".$product_id."', product_id) AND ";
				$select_query = "SELECT id_count FROM 
								((SELECT count(id) as id_count FROM ".$GLOBALS['purchase_bill_table']." WHERE ".$where." deleted = '0' AND cancelled = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['quotation_table']." WHERE ".$where." deleted = '0' AND cancelled = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['estimate_table']." WHERE ".$where." deleted = '0' AND cancelled = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['invoice_table']." WHERE ".$where." deleted = '0' AND cancelled = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['material_transfer_table']." WHERE ".$where." deleted = '0' AND cancelled = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['stock_adjustment_table']." WHERE ".$where." deleted = '0' AND cancelled = '0'))
								as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['id_count']) && $data['id_count'] != $GLOBALS['null_value']) {
						$count = $data['id_count'];
					}
				}
			}
			return $count;
		}
		
		// Get Bank id Linked count in invoice,voucher,receipt,expense voucher,suspense voucher or suspense receipt  Table

		public function GetBankLinkedCCount($bank_id) {
			$list = array(); $select_query = ""; $where = ""; $count = 0;
			if(!empty($bank_id)) {
				$where = " FIND_IN_SET('".$bank_id."', bank_id) AND ";

				$select_query = "SELECT id_count FROM 
									((SELECT count(id) as id_count FROM ".$GLOBALS['invoice_table']." WHERE FIND_IN_SET('".$bank_id."', bank_id) AND deleted = '0')
									UNION ALL 
									(SELECT count(id) as id_count FROM ".$GLOBALS['voucher_table']." WHERE FIND_IN_SET('".$bank_id."', bank_id) AND deleted = '0')
									UNION ALL 
									(SELECT count(id) as id_count FROM ".$GLOBALS['receipt_table']." WHERE FIND_IN_SET('".$bank_id."', bank_id) AND deleted = '0')
									UNION ALL 
									(SELECT count(id) as id_count FROM ".$GLOBALS['expense_voucher_table']." WHERE FIND_IN_SET('".$bank_id."', bank_id) AND deleted = '0')
									UNION ALL 
									(SELECT count(id) as id_count FROM ".$GLOBALS['suspense_voucher_table']." WHERE FIND_IN_SET('".$bank_id."', bank_id) AND deleted = '0')
									UNION ALL 
									(SELECT count(id) as id_count FROM ".$GLOBALS['suspense_receipt_table']." WHERE FIND_IN_SET('".$bank_id."', bank_id) AND deleted = '0')
									)
								as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['id_count']) && $data['id_count'] != $GLOBALS['null_value']) {
						$count = $data['id_count'];
					}
				}
			}
			return $count;
		}

		// Get Brand id Linked count in Purchase ,Quotation,Estimate,Invoice,Material Transfer or stock adjustment Table

		public function GetBrandLinkedCount($brand_id) {
			$list = array(); $select_query = ""; $where = ""; $count = 0;
			if(!empty($brand_id)) {
				$where = " FIND_IN_SET('".$brand_id."', brand_id) AND ";
				$select_query = "SELECT id_count FROM 
								((SELECT count(id) as id_count FROM ".$GLOBALS['product_table']." WHERE ".$where." deleted = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['purchase_bill_table']." WHERE ".$where." deleted = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['quotation_table']." WHERE ".$where." deleted = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['estimate_table']." WHERE ".$where." deleted = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['invoice_table']." WHERE ".$where." deleted = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['material_transfer_table']." WHERE ".$where." deleted = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['stock_adjustment_table']." WHERE ".$where." deleted = '0')
									)
								as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['id_count']) && $data['id_count'] != $GLOBALS['null_value']) {
						$count = $data['id_count'];
					}
				}
			}
			return $count;
		}

		// Get Godown id Linked count in Purchase ,Quotation,Estimate,Invoice,Material Transfer or stock adjustment Table
		public function GetGodownLinkedCount($godown_id) {
			$list = array(); $select_query = ""; $where = "";$wheres = ""; $count = 0;
			if(!empty($godown_id)) {
				$where = " FIND_IN_SET('".$godown_id."', godown_id) AND ";
				$wheres = "(FIND_IN_SET('".$godown_id."', from_godown_id) OR FIND_IN_SET('".$godown_id."', from_godown_id)) AND ";

				$select_query = "SELECT id_count FROM 
								((SELECT count(id) as id_count FROM ".$GLOBALS['product_table']." WHERE ".$where." deleted = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['received_slip_table']." WHERE ".$where." deleted = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['purchase_bill_table']." WHERE ".$where." deleted = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['delivery_challan_table']." WHERE ".$where." deleted = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['quotation_table']." WHERE ".$where." deleted = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['estimate_table']." WHERE ".$where." deleted = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['invoice_table']." WHERE ".$where." deleted = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['material_transfer_table']." WHERE ".$wheres." deleted = '0')
								UNION ALL
								(SELECT count(id) as id_count FROM ".$GLOBALS['stock_adjustment_table']." WHERE ".$where." deleted = '0')
									)
								as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['id_count']) && $data['id_count'] != $GLOBALS['null_value']) {
						$count = $data['id_count'];
					}
				}
			}
			return $count;
		}

		// Get Unit id Linked count in Product Table
		public function GetUnitLinkedCount($unit_id) {
			$list = array(); $select_query = ""; $where = ""; $count = 0;
			if(!empty($unit_id)) {
				$where = " FIND_IN_SET('".$unit_id."', unit_id) AND ";

				$select_query = "SELECT id_count FROM 
						((SELECT count(id) as id_count FROM ".$GLOBALS['product_table']." WHERE FIND_IN_SET('".$unit_id."', unit_id) AND deleted = '0')
							)
								as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['id_count']) && $data['id_count'] != $GLOBALS['null_value']) {
						$count = $data['id_count'];
					}
				}
			}
			return $count;
		}


		// public function GetPartyLinkedCount($party_id) {
		// 	$list = array(); $select_query = ""; $count = 0;
		// 	if(!empty($party_id)) {
		// 		$select_query = "SELECT id_count FROM 
		// 							((SELECT count(id) as id_count FROM ".$GLOBALS['purchase_bill_table']." WHERE FIND_IN_SET('".$party_id."', party_id) AND deleted = '0')
		// 							UNION ALL
		// 							(SELECT count(id) as id_count FROM ".$GLOBALS['quotation_table']." WHERE FIND_IN_SET('".$party_id."', party_id) AND deleted = '0') 
		// 							UNION ALL
		// 							(SELECT count(id) as id_count FROM ".$GLOBALS['estimate_table']." WHERE FIND_IN_SET('".$party_id."', party_id) AND deleted = '0')
		// 							UNION ALL
		// 							(SELECT count(id) as id_count FROM ".$GLOBALS['invoice_table']." WHERE FIND_IN_SET('".$party_id."', party_id) AND deleted = '0')
		// 							UNION ALL
		// 							(SELECT count(id) as id_count FROM ".$GLOBALS['voucher_table']." WHERE FIND_IN_SET('".$party_id."', party_id) AND deleted = '0')
									
		// 							UNION ALL
		// 							(SELECT count(id) as id_count FROM ".$GLOBALS['receipt_table']." WHERE FIND_IN_SET('".$party_id."', party_id) AND deleted = '0')
		// 							)
									
		// 						as g";
		// 		$list = $this->getQueryRecords('', $select_query);
		// 	}
		// 	if(!empty($list)) {
		// 		foreach($list as $data) {
		// 			if(!empty($data['id_count']) && $data['id_count'] != $GLOBALS['null_value']) {
		// 				$count = $data['id_count'];
		// 			}
		// 		}
		// 	}
		// 	return $count;
		// }
    
		public function getPermissionId($bill_company_id,$role_id,$module_key){
			$list = array(); $select_query = ""; $where = ""; 
			if(!empty($bill_company_id)){
				$where = "bill_company_id = '".$bill_company_id."'";
			}
			if(!empty($role_id)){
				if(!empty($where)) {
					$where = $where." AND role_id = '".$role_id."'";
				}
				else {
					$where = "role_id = '".$role_id."'";
				}
			}
			if(!empty($module_key)){
				if(!empty($where)) {
					$where = $where." AND module = '".$module_key."'";
				}
				else {
					$where = "module = '".$module_key."'";
				}
			}
			
			if(!empty($where)) {
				 $select_query = "SELECT * FROM ".$GLOBALS['role_permission_table']." WHERE ".$where." AND deleted='0'";    
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['role_permission_table'], $select_query);
			}
			
			return $list;
		}
        
		public function getRolePermissionId($bill_company_id,$role_id,$module_key){
			$permission_id ="";
			$list = array(); $select_query = ""; $where = ""; 
			if(!empty($bill_company_id)){
				$where = "bill_company_id = '".$bill_company_id."'";
			}
			if(!empty($role_id)){
				if(!empty($where)) {
					$where = $where." AND role_id = '".$role_id."'";
				}
				else {
					$where = "role_id = '".$role_id."'";
				}
			}
			if(!empty($module_key)){
				if(!empty($where)) {
					$where = $where." AND module = '".$module_key."'";
				}
				else {
					$where = "module = '".$module_key."'";
				}
			}
			
			if(!empty($where)) {
				$select_query = "SELECT * FROM ".$GLOBALS['role_permission_table']." WHERE ".$where." AND deleted='0'";    
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['role_permission_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $value) {
                        $permission_id = $value['id'];
                    }
				}
			}
			
			return $permission_id;
		}

		public function CheckExpenseCategoryAlreadyExists($bill_company_id, $expense_category_name) {
			$list = array(); $select_query = ""; $expense_category_id = "";
			if(!empty($expense_category_name)) {
				$select_query = "SELECT expense_category_id FROM ".$GLOBALS['expense_category_table']." WHERE lower_case_name = '".$expense_category_name."' AND bill_company_id = '".$bill_company_id."' AND deleted = '0'";	
			}
			
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['expense_category_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['expense_category_id'])) {
							$expense_category_id = $data['expense_category_id'];
						}
					}
				}
			}
			return $expense_category_id;
		}

		public function BillPartyDetails($bill_company_id,$party_type){
            $con=$this->connect();
            $select_query =""; $result =  array();
            if(!empty($bill_company_id)){
                if($party_type == "purchase"){
                    $select_query = "SELECT * FROM ".$GLOBALS['party_table']." WHERE bill_company_id = '$bill_company_id'  AND deleted = '0' AND party_type = '1' OR party_type = '3'";
                } else if($party_type == "sales"){
                    $select_query = "SELECT * FROM ".$GLOBALS['party_table']." WHERE bill_company_id = '$bill_company_id'  AND deleted = '0' AND party_type = '2' OR party_type = '3'";
                }
                else {
                    if($party_type == ""){
                        $select_query = "SELECT * FROM ".$GLOBALS['party_table']." WHERE bill_company_id = '$bill_company_id' AND deleted = '0'";
                    }
                }

                if(!empty($select_query)) {
                    $result = $this->getQueryRecords($GLOBALS['party_table'], $select_query);
                }
            }
            return $result;
        }

		public function GetSuspensePartyLinkedCount($suspense_party_id) {
			$list = array(); $select_query = ""; $where = ""; $count = 0;
			
			if(!empty($suspense_party_id)) {
				$where = " suspense_party_id = '".$suspense_party_id."' AND ";

				$select_query = "SELECT id_count FROM ((SELECT COUNT(id) as id_count FROM ".$GLOBALS['suspense_voucher_table']." WHERE ".$where." deleted = '0') UNION ALL (SELECT COUNT(id) as id_count FROM ".$GLOBALS['suspense_receipt_table']." WHERE ".$where." deleted = '0')) as g";

				$list = $this->getQueryRecords('', $select_query);
			}

			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['id_count']) && $data['id_count'] != $GLOBALS['null_value']) {
						$count = $data['id_count'];
					}
				}
			}
			return $count;
		}

		public function PartyList($show_draft_bill) {
			$list = array(); $select_query = ""; $category_id = ""; $where = "";

			// if($show_draft_bill == '0' || $show_draft_bill == '1') {
            //     if(!empty($show_draft_bill)) {
            //         $where = $where." drafted = '".$show_draft_bill."' ";
            //     }
            // }

			if(!empty($where)) {
                $select_query = "SELECT * FROM ".$GLOBALS['party_table']." WHERE ".$where." AND deleted = '0' ORDER BY id DESC";
            } 
            else {
                $select_query = "SELECT * FROM ".$GLOBALS['party_table']." WHERE deleted = '0' ORDER BY id DESC";
            }
            if(!empty($select_query)) {
                $list = $this->getQueryRecords($GLOBALS['party_table'], $select_query);
            }
            return $list;
		}

		public function AgentList($show_draft_bill) {
			$list = array(); $select_query = "";  $where = "";

			// if($show_draft_bill == '0' || $show_draft_bill == '1') {
            //     if(!empty($show_draft_bill)) {
            //         $where = $where." drafted = '".$show_draft_bill."' ";
            //     }
            // }

			if(!empty($where)) {
                $select_query = "SELECT * FROM ".$GLOBALS['agent_table']." WHERE ".$where."  AND deleted = '0' ORDER BY id DESC";
            } 
            else {
                $select_query = "SELECT * FROM ".$GLOBALS['agent_table']." WHERE deleted = '0' ORDER BY id DESC";
            }
            if(!empty($select_query)) {
                $list = $this->getQueryRecords($GLOBALS['agent_table'], $select_query);
            }
            return $list;
		}

		public function PrevStockList($bill_unique_id) {
            $select_query = ""; $list = array();
            $select_query = "SELECT * FROM ".$GLOBALS['stock_table']." WHERE bill_unique_id = '".$bill_unique_id."' AND deleted = '0'";
            $list = $this->getQueryRecords('', $select_query);
            return $list;
        }

		function getOpeningStockCount($product_id) {
			$list = array(); $select_query = ""; $where = ""; $mt_where = ""; $count = 0;
			if(!empty($product_id)) {
				$where = " FIND_IN_SET('".$product_id."', product_id) AND ";
	
				$select_query = "SELECT id_count FROM 
									(SELECT count(id) as id_count FROM ".$GLOBALS['stock_table']." WHERE ".$where." stock_type = 'Opening Stock' AND deleted = '0')
								as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['id_count']) && $data['id_count'] != $GLOBALS['null_value']) {
						$count = $data['id_count'];
					}
				}
			}
			return $count;
		}

		public function getPurchaseOrderList($party_id, $show_bill) {
			$list = array(); $select_query = ""; $where = "";
			if(!empty($party_id)) {
				$where = " party_id = '".$party_id."' AND ";
			}

			if($show_bill == '0' || $show_bill == '1') {
                if(!empty($where)) {
                    $where = $where." cancelled = '".$show_bill."' ";
                } else {
                    $where = "cancelled = '".$show_bill."' ";
                }
            }

			if(!empty($where)) {
                $select_query = "SELECT * FROM ".$GLOBALS['purchase_order_table']." WHERE ".$where." AND deleted = '0' ORDER BY id DESC";
            } 
            else {
                $select_query = "SELECT * FROM ".$GLOBALS['purchase_order_table']." WHERE deleted = '0' AND cancelled = '0' ORDER BY id DESC";
            }
            if(!empty($select_query)) {
                $list = $this->getQueryRecords($GLOBALS['purchase_order_table'], $select_query);
            }
            return $list;
		}

		public function getGodownStockList($distinct_id,$godown_id, $brand_id, $product_id, $case_contains){
			$select_query =""; $where ="";
			if(!empty($godown_id)) {
                if(!empty($where)) {
                    $where = $where." godown_id = '".$godown_id."' AND ";
                } else {
                    $where = "godown_id = '".$godown_id."' AND ";
                }
            }
			if(!empty($brand_id)) {
                if(!empty($where)) {
                    $where = $where." brand_id = '".$brand_id."' AND ";
                } else {
                    $where = "brand_id = '".$brand_id."' AND ";
                }
            }
			if(!empty($product_id)) {
                if(!empty($where)) {
                    $where = $where." product_id = '".$product_id."' AND ";
                } else {
                    $where = "product_id = '".$product_id."' AND ";
                }
            }
			if(!empty($case_contains)) {
                if(!empty($where)) {
                    $where = $where." case_contains = '".$case_contains."' AND ";
                } else {
                    $where = "case_contains = '".$case_contains."' AND ";
                }
            }

			$select_query ="SELECT DISTINCT(".$distinct_id.") FROM ".$GLOBALS['stock_table']." WHERE  ".$where." deleted = '0' ";
			$stock_list = $this->getQueryRecords($GLOBALS['stock_table'],$select_query);
			return $stock_list;
		}


		public function getAgentPartyList($agent_id,$party_type)
        {
            if(empty($agent_id))
            {
                $agent_id =$GLOBALS['null_value'];
            }
            $select_query ="";
            $select_query ="SELECT * FROM ".$GLOBALS['party_table']." WHERE agent_id ='".$agent_id."' AND (party_type ='".$party_type."' OR party_type ='3') AND deleted = '0' ";
            $agent_party_list = $this->getQueryRecords($GLOBALS['party_table'],$select_query);
            return $agent_party_list;
        }

		public function getVoucherRecords($delete_voucher_id) {
			$list = array(); $select_query = ""; $id = ""; $where = "";
			$bill_company_id = $GLOBALS['bill_company_id'];
			if(!empty($bill_company_id)) {
				$where = " bill_company_id = '".$bill_company_id."' AND ";
			}
			if(!empty($where)) {
				$select_query = "SELECT * FROM ".$GLOBALS['voucher_table']." WHERE ".$where." bill_id ='".$delete_voucher_id."' AND  deleted='0'";    
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['voucher_table'], $select_query);
			}
			return $list;
		}

		public function getReceiptRecords($delete_receipt_id) {
			$list = array(); $select_query = ""; $id = ""; $where = "";
			$bill_company_id = $GLOBALS['bill_company_id'];
			if(!empty($bill_company_id)) {
				$where = " bill_company_id = '".$bill_company_id."' AND ";
			}
			if(!empty($where)) {
				$select_query = "SELECT * FROM ".$GLOBALS['receipt_table']." WHERE ".$where." bill_id ='".$delete_receipt_id."' AND deleted='0'";    
		    }
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['receipt_table'], $select_query);
			}
			return $list;
		}

		public function getSuspensePartyList($bill_company_id, $show_draft_bill) {
			$list = array(); $select_query = ""; $category_id = ""; $where = "";
			if(!empty($bill_company_id)) {
				$where = " bill_company_id = '".$bill_company_id."'";
			}

			// if($show_draft_bill == '1' || $show_draft_bill == '0') {
            //     if(!empty($where)) {
            //         $where = $where." drafted = '".$show_draft_bill."' ";
            //     } else {
            //         $where = "drafted = '".$show_draft_bill."' ";
            //     }
            // }

			if(!empty($where)) {
                $select_query = "SELECT * FROM ".$GLOBALS['suspense_party_table']." WHERE ".$where." AND deleted = '0' ORDER BY id DESC";
            } 
            else {
                $select_query = "SELECT * FROM ".$GLOBALS['suspense_party_table']." WHERE deleted = '0' ORDER BY id DESC";
            }
            if(!empty($select_query)) {
                $list = $this->getQueryRecords($GLOBALS['suspense_party_table'], $select_query);
            }
            return $list;
		}

		// New functions

		public function getClearTableRecords($tables) {
			$success = 0; $con = $this->connect();
			if(!empty($tables)) {
				foreach($tables as $table) {
					if(!empty($table)) {
						if($table == $GLOBALS['product_table']) {
							$list = array(); $success++;
							$list = $this->getTableRecords($GLOBALS['product_table'], '', '', '');
							if(!empty($list)) {
								foreach($list as $data) {
									$linked_count = 0;
									if(!empty($data['product_id']) && $data['product_id'] != $GLOBALS['null_value']) {
										$linked_count = $this->GetProductLinkedCount($data['product_id']);
										if($linked_count == '0') {
											$columns = array(); $values = array();
											$columns = array('deleted'); $values = array("'1'");
											$product_update_id = $this->UpdateSQL($GLOBALS['product_table'], $data['id'], $columns, $values, '');
										}
									}
								}
							}
						}
						else {
							$table = trim(str_replace("'", "", $table));
							$update_query = "";
							$update_query = "UPDATE ".$table." SET deleted = '1'";
							if(!empty($update_query)) {							
								$result = $con->prepare($update_query);
								if($result->execute() === TRUE) {
									$success++;	
								}
							}
						}
					}
				}
				if($success == count($tables)) {
					$success = 1;
				}
				else {
					$success = "Unable to clear";
				}
			}
			return $success;
		}

		public function GetRoleLinkedCount($role_id) {
			$list = array(); $select_query = ""; $where = ""; $count = 0;
			if(!empty($role_id)) {
				$where = "role_id = '".$role_id."' AND";
				$select_query = "SELECT id_count FROM 
									((SELECT COUNT(id) as id_count FROM ".$GLOBALS['user_table']." WHERE ".$where." deleted = '0'))
								as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['id_count']) && $data['id_count'] != $GLOBALS['null_value']) {
						$count = $data['id_count'];
					}
				}
			}
			return $count;
		}

		public function GetAgentLinkedCount($agent_id) {
			$list = array(); $select_query = ""; $where = ""; $count = 0;
			if(!empty($agent_id)) {
				$where = "agent_id = '".$agent_id."' AND";
				$select_query = "SELECT id_count FROM 
									((SELECT COUNT(id) as id_count FROM ".$GLOBALS['party_table']." WHERE ".$where." deleted = '0'))
								as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['id_count']) && $data['id_count'] != $GLOBALS['null_value']) {
						$count = $data['id_count'];
					}
				}
			}
			return $count;
		}

		// Get Party id Linked count in purchase,invoice,voucher,receipt,expense voucher,suspense voucher or suspense receipt  Table

		public function GetPartyLinkedCount($party_id) {
			$list = array(); $select_query = ""; $where = ""; $count = 0;
			if(!empty($party_id)) {
				$where = " party_id = '".$party_id."' AND ";
                             
				// $select_query = "SELECT id_count FROM 
				// 					((SELECT COUNT(id) as id_count FROM ".$GLOBALS['delivery_chalan_table']." WHERE ".$where." cancelled = '0' AND deleted = '0'))
				// 				as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['id_count']) && $data['id_count'] != $GLOBALS['null_value']) {
						$count = $data['id_count'];
					}
				}
			}
			return $count;
		}


		public function CheckUserIDAlreadyExists($user_id) {
			$select_query = ""; $list = array(); $where = ""; $id = "";
			if(!empty($user_id)) {
				$where = "lower_case_login_id = '".$user_id."' AND ";
				$select_query = "SELECT userid FROM 
									((SELECT user_id as userid FROM ".$GLOBALS['user_table']." WHERE ".$where." deleted = '0'))
								as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['userid']) && $data['userid'] != $GLOBALS['null_value']) {
						$id = $data['userid'];
					}
				}
			}
			return $id;
		}

		public function CheckUserNoAlreadyExists($mobile_number) {
			$select_query = ""; $list = array(); $where = ""; $id = "";
			if(!empty($mobile_number)) {
				$where = "mobile_number = '".$mobile_number."' AND ";
				$select_query = "SELECT userid FROM 
									((SELECT user_id as userid FROM ".$GLOBALS['user_table']." WHERE ".$where." deleted = '0'))
								as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['userid']) && $data['userid'] != $GLOBALS['null_value']) {
						$id = $data['userid'];
					}
				}
			}
			return $id;
		}

		public function getPartyList($type)
		{

			$select_query = "";

			if($type == 'Purchase')

			{

				$select_query = "SELECT * FROM ".$GLOBALS['party_table']." WHERE (party_type ='1' OR party_type='3') AND deleted ='0'";

			}

			else if($type == 'Sales')

			{
			
				$select_query = "SELECT * FROM ".$GLOBALS['party_table']." WHERE (party_type ='2' OR party_type='3') AND deleted ='0'";


			}else if($type == 'Both'){

				$select_query ="SELECT * FROM ".$GLOBALS['party_table']." WHERE deleted ='0'";

			}

			$list = $this->getQueryRecords($GLOBALS['party_table'],$select_query);

			return $list;

		}

		// Check Agent Mobile No Already Exist in Agent Table

        public function AgentMobileExists($mobile_number) {
			$list = array(); $select_query = ""; $agent_id = ""; $where = "";
			
			if(!empty($mobile_number)) {
				$select_query = "SELECT agent_id FROM ".$GLOBALS['agent_table']." WHERE mobile_number = '".$mobile_number."' AND deleted = '0'";	
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['agent_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['agent_id'])) {
							$agent_id = $data['agent_id'];
						}
					}
				}
			}
			return $agent_id;
		}

		// Check Party Mobile No Already Exist in Party Table

        public function PartyMobileExists($mobile_number) {
			$list = array(); $select_query = ""; $party_id = ""; $where = "";
			
			if(!empty($mobile_number)) {
				$select_query = "SELECT party_id FROM ".$GLOBALS['party_table']." WHERE mobile_number = '".$mobile_number."' AND deleted = '0'";	
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['party_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['party_id'])) {
							$party_id = $data['party_id'];
						}
					}
				}
			}
			return $party_id;
		}

        public function UpdateBalance($bill_company_id,$bill_id,$bill_number,$bill_date,$bill_type,$party_id,$party_name,$party_type,$payment_mode_id,$payment_mode_name,$bank_id,$bank_name,$imploded_amount,$opening_balance,$opening_balance_type,$credit,$debit){
			$query = ""; $list = array(); $unique_id = "";
        
			if($bill_type == "Voucher" || $bill_type == "Receipt" || $bill_type == "Expense" || $bill_type == "Suspense Voucher" || $bill_type == "Suspense Receipt"){
				$query = "SELECT id FROM ".$GLOBALS['payment_table']." WHERE bill_company_id = '".$bill_company_id."' AND bill_id = '".$bill_id."' AND payment_mode_id = '".$payment_mode_id."' AND deleted = '0'";
			}else{
				$query = "SELECT id FROM ".$GLOBALS['payment_table']." WHERE bill_company_id = '".$bill_company_id."' AND bill_id = '".$bill_id."' AND deleted = '0'";
			}

			$list = $this->getQueryRecords('', $query);
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['id']) && $data['id'] != $GLOBALS['null_value']) {
						$unique_id = $data['id'];
					}
				}
			}
        
			$created_date_time = $GLOBALS['create_date_time_label'];
            $creator = $GLOBALS['creator'];
            $creator_name = $GLOBALS['creator_name'];
			if(preg_match("/^\d+$/", $unique_id)) {
				$action = "Updated Successfully";
				$columns = array(); $values = array();
				$columns = array('creator_name','bill_date','party_id','party_name','party_type','bank_id','bank_name','payment_mode_id','payment_mode_name','imploded_amount','opening_balance','opening_balance_type','credit','debit');
				$values = array("'".$creator_name."'","'".$bill_date."'","'".$party_id."'","'".$party_name."'","'".$party_type."'","'".$bank_id."'","'".$bank_name."'","'".$payment_mode_id."'","'".$payment_mode_name."'","'".$imploded_amount."'","'".$opening_balance."'","'".$opening_balance_type."'","'".$credit."'","'".$debit."'");
				$payment_update_id = $this->UpdateSQL($GLOBALS['payment_table'], $unique_id, $columns, $values, $action);
			}
			else {
				$action = "Inserted Successfully";
				$null_value = $GLOBALS['null_value'];
				$columns = array(); $values = array();
				$columns = array('created_date_time','creator', 'creator_name', 'bill_company_id','bill_id','bill_number','bill_date','bill_type','party_id','party_name','party_type','bank_id','bank_name','payment_mode_id','payment_mode_name','imploded_amount','opening_balance','opening_balance_type','credit','debit','deleted');
				$values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$bill_company_id."'","'".$bill_id."'","'".$bill_number."'","'".$bill_date."'","'".$bill_type."'","'".$party_id."'","'".$party_name."'","'".$party_type."'","'".$bank_id."'","'".$bank_name."'","'".$payment_mode_id."'","'".$payment_mode_name."'","'".$imploded_amount."'","'".$opening_balance."'","'".$opening_balance_type."'","'".$credit."'","'".$debit."'","'0'");
				$payment_insert_id = $this->InsertSQL($GLOBALS['payment_table'], $columns, $values, '', '', $action);
			}
		}

        public function DeletePayment($bill_id){
			$payment_bill_list = array(); $payment_unique_id = "";

            $payment_bill_list = $this->getTableRecords($GLOBALS['payment_table'], 'bill_id', $bill_id,'');
            if(!empty($payment_bill_list)){
                foreach($payment_bill_list as $value){
                    if(!empty($value['id'])){
                        $payment_unique_id = $value['id'];
                    }
                    if(preg_match("/^\d+$/", $payment_unique_id)) {
                        $action = "Payment Deleted.";
                    
                        $columns = array(); $values = array();						
                        $columns = array('deleted');
                        $values = array("'1'");
                        $msg = $this->UpdateSQL($GLOBALS['payment_table'], $payment_unique_id, $columns, $values, $action);
                    }
                }
            }
		}

        public function CheckChargesAlreadyExists($company_id, $charge_name) {
			$list = array(); $select_query = ""; $charges_id = ""; $where = "";
			
			if(!empty($charge_name)) {
				$select_query = "SELECT charges_id FROM ".$GLOBALS['charges_table']." WHERE ".$where." lower_case_name = '".$charge_name."' AND deleted = '0'";	
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['charges_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['charges_id'])) {
							$charges_id = $data['charges_id'];
						}
					}
				}
			}
			return $charges_id;
		}

		public function getTableQuotationProduct($quotationt_id,$product_id,$brand_id,$unit_types) {
			if(!empty($quotationt_id) && !empty($product_id) && !empty($brand_id)) {
				$select_query = "SELECT id FROM ".$GLOBALS['quotation_product_table']." WHERE quotation_number = '".$quotationt_id."' AND product_id = '".$product_id."' AND brand_id = '".$brand_id."' AND unit_type = '".$unit_types."' AND deleted = '0'";
				$list = $this->getQueryRecords($GLOBALS['quotation_product_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['id'])) {
							return $data['id'];
						}
					}
				} else {
					return $GLOBALS['null_value'];
				}
				
			}
		}
    
    }
?>
