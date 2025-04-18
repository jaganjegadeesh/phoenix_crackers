<?php
	include("basic_functions.php");
	include("creation_functions.php");
	// include("payment_functions.php");
	include("stock_functions.php");
	
	class billing extends Basic_Functions {
		public function basic_functions_object() {
			$basic_obj = "";		
			$basic_obj = new Basic_Functions();
			return $basic_obj;
		}
		public function getProjectTitle() {
			$string = parent::getProjectTitle();
			return $string;
		}
		public function encode_decode($action, $string) {
			$string = parent::encode_decode($action, $string);
			return $string;
		}	
        public function automate_number($table, $column) {
			$next_number = "";
			$next_number = parent::automate_number($table, $column);
			return $next_number;
		}
		public function InsertSQL($table, $columns, $values, $custom_id, $unique_number, $action) {
			$basic_obj = "";
			$basic_obj = $this->basic_functions_object();
			$last_insert_id = "";		
			$last_insert_id = $basic_obj->InsertSQL($table, $columns, $values, $custom_id, $unique_number, $action);
			return $last_insert_id;
		}	
		public function UpdateSQL($table, $update_id, $columns, $values, $action) {
			$basic_obj = "";
			$basic_obj = $this->basic_functions_object();
			$msg = "";		
			$msg = $basic_obj->UpdateSQL($table, $update_id, $columns, $values, $action);
			return $msg;
		}
        public function getTableRecords($table, $column, $value, $order) {
			$basic_obj = "";
			$basic_obj = $this->basic_functions_object();
			$result = ""; $list = array();		
			$result = $basic_obj->getTableRecords($table, $column, $value, $order);
			return $result;
		}
		public function getTableColumnValue($table, $column, $value, $return_value) {
			$result = "";
			$result = parent::getTableColumnValue($table, $column, $value, $return_value);
			return $result;
		}
		public function getAllRecords($table, $column, $value) {
			$res = "";		
			$res = parent::getAllRecords($table, $column, $value);
			return $res;
		}
        public function getCancelledRecords($table, $column, $value) {
			$res = "";		
			$res = parent::getCancelledRecords($table, $column, $value);
			return $res;
		}
		public function daily_db_backup() {
			$result = "";		
			$result = parent::daily_db_backup();
			return $result;
		}
		public function image_directory() {
			$target_dir = "";		
			$target_dir = parent::image_directory();
			return $target_dir;
		}
		public function temp_image_directory() {
			$temp_dir = "";		
			$temp_dir = parent::temp_image_directory();
			return $temp_dir;
		}
		public function clear_temp_image_directory() {
			$res = "";		
			$res = parent::clear_temp_image_directory();
			return $res;
		}
		public function check_user_id_ip_address() {
			$login_user_id = "";			
			$login_user_id = parent::check_user_id_ip_address();			
			return $login_user_id;	
		}
		public function checkUser() {
			$login_user_id = "";			
			$login_user_id = parent::checkUser();			
			return $login_user_id;	
		}
		public function getDailyReport($from_date, $to_date) {
			$list = array();
			$list = parent::getDailyReport($from_date, $to_date);
			return $list;
		}
        public function CheckStaffAccessPage($login_id,$permission_page) {
			$access = "";
			$access = parent::CheckStaffAccessPage($login_id,$permission_page);
			return $access;
		}
		public function CheckRoleAccessPage($role_id,$permission_page) {
			$access = "";
			$access = parent::CheckRoleAccessPage($role_id,$permission_page);
			return $access;
		}
        public function getOtherCityList($district) {
			$list = array();
			$list = parent::getOtherCityList($district);
			return $list;
		}
		public function CompanyCount() {
			$list = 0;
			$list = parent::CompanyCount();
			return $list;
		}
		public function getUserList() {
			$list = array();
			$list = parent::getUserList();
			return $list;
		}
		public function numberFormat($number, $decimals) {
			$list = 0;
			$list = parent::numberFormat($number, $decimals);
			return $list;
		}
		public function stock_function_object() {
			$stock_obj = "";		
			$stock_obj = new Stock_Functions();
			return $stock_obj;
		}
		// Creation Functions
		public function creation_function_object() {
			$create_obj = "";		
			$create_obj = new Creation_functions();
			return $create_obj;
		}
		public function CheckBrandAlreadyExists($company_id, $brand_name) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->CheckBrandAlreadyExists($company_id, $brand_name);
			return $result;
		}
		public function CheckBrandPrefixAlreadyExists($company_id, $brand_prefix) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->CheckBrandPrefixAlreadyExists($company_id, $brand_prefix);
			return $result;
		}
		public function CheckPaymentModeAlreadyExists($company_id, $payment_mode_name) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->CheckPaymentModeAlreadyExists($company_id, $payment_mode_name);
			return $result;
		}

		public function CheckUnitAlreadyExists($company_id, $unit_name) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->CheckUnitAlreadyExists($company_id, $unit_name);
			return $result;
		}
		public function CheckCategoryAlreadyExists($company_id, $category_name) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->CheckCategoryAlreadyExists($company_id, $category_name);
			return $result;
		}
	
		public function CheckProductNameAlreadyExists($company_id, $product_name) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->CheckProductNameAlreadyExists($company_id, $product_name);
			return $result;
		}

		public function GetGodownLinkedCount($godown_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->GetGodownLinkedCount($godown_id);
			return $result;
		}
		public function GetBrandLinkedCount($brand_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->GetBrandLinkedCount($brand_id);
			return $result;
		}
		public function GetUnitLinkedCount($unit_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->GetUnitLinkedCount($unit_id);
			return $result;
		}
		public function GetPaymentModeLinkedCount($payment_mode_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->GetPaymentModeLinkedCount($payment_mode_id);
			return $result;
		}
		public function GetBankLinkedCount($bank_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->GetBankLinkedCount($bank_id);
			return $result;
		}
		public function GetCategoryLinkedCount($category_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->GetCategoryLinkedCount($category_id);
			return $result;
		}
		public function GetProductLinkedCount($product_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->GetProductLinkedCount($product_id);
			return $result;
		}
		public function GetPartyLinkedCount($party_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->GetPartyLinkedCount($party_id);
			return $result;
		}
		public function CheckGodownAlreadyExists($company_id, $godown_name) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->CheckGodownAlreadyExists($company_id, $godown_name);
			return $result;
		}

		public function GetRoleLinkedCount($role_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->GetRoleLinkedCount($role_id);
			return $result;
		}
		public function CheckUserIDAlreadyExists($user_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$list = array();
			$list = $create_obj->CheckUserIDAlreadyExists($user_id);
			return $list;
		}
		public function CheckUserNoAlreadyExists($mobile_number) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$list = array();
			$list = $create_obj->CheckUserNoAlreadyExists($mobile_number);
			return $list;
		}
		public function PartyList($show_draft_bill) {
			$creation_obj = "";
			$creation_obj = $this->creation_function_object();
			$list = array();
			$list = $creation_obj->PartyList($show_draft_bill);
			return $list;
		}

		public function AgentMobileExists($mobile_number) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->AgentMobileExists($mobile_number);
			return $result;
		}

		public function PartyMobileExists($mobile_number) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->PartyMobileExists($mobile_number);
			return $result;
		}

		public function UpdateBalance($bill_company_id,$bill_id,$bill_number,$bill_date,$bill_type,$party_id,$party_name,$party_type,$payment_mode_id,$payment_mode_name,$bank_id,$bank_name,$imploded_amount,$opening_balance,$opening_balance_type,$credit,$debit) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$list = array();
			$list = $create_obj->UpdateBalance($bill_company_id,$bill_id,$bill_number,$bill_date,$bill_type,$party_id,$party_name,$party_type,$payment_mode_id,$payment_mode_name,$bank_id,$bank_name,$imploded_amount,$opening_balance,$opening_balance_type,$credit,$debit);
			return $list;
		}

		public function DeletePayment($bill_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->DeletePayment($bill_id);
			return $result;
		}

		public function CheckChargesAlreadyExists($company_id, $charges_name) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->CheckChargesAlreadyExists($company_id, $charges_name);
			return $result;
		}

		public function getTableQuotationProduct($quotationt_id,$product_id,$brand_id,$unit_types) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->getTableQuotationProduct($quotationt_id,$product_id,$brand_id,$unit_types);
			return $result;
		}


		//Stock Functions

		public function getStockUniqueID($bill_unique_id,$godown_id, $brand_id,$product_id, $unit_id,$case_contains) {
			$stock_obj = "";
			$stock_obj = $this->stock_function_object();
			$stock_update = 0;
			$stock_update = $stock_obj->getStockUniqueID($bill_unique_id,$godown_id, $brand_id,$product_id, $unit_id,$case_contains);
			return $stock_update;
		}

		public function getStockTablesUniqueID($table, $godown_id, $brand_id, $product_id,$case_contains) {
			$stock_obj = "";
			$stock_obj = $this->stock_function_object();
			$stock_update = 0;
			$stock_update = $stock_obj->getStockTablesUniqueID($table, $godown_id, $brand_id, $product_id,$case_contains);
			return $stock_update;
		}
		public function StockUpdate($page_table,$in_out_type,$bill_unique_id,$bill_unique_number,$product_id,$remarks, $stock_date, $godown_id, $brand_id,$unit_id, $quantity,$case_contains) {
			$stock_obj = "";
			$stock_obj = $this->stock_function_object();
			$stock_update = 0;
			$stock_update = $stock_obj->StockUpdate($page_table,$in_out_type,$bill_unique_id,$bill_unique_number,$product_id,$remarks, $stock_date, $godown_id, $brand_id,$unit_id, $quantity,$case_contains);
			return $stock_update;
		}
		public function getInwardQty($bill_unique_id,$godown_id, $brand_id,$product_id,$case_contains) {
			$stock_obj = "";
			$stock_obj = $this->stock_function_object();
			$stock_update = 0;
			$stock_update = $stock_obj->getInwardQty($bill_unique_id,$godown_id, $brand_id,$product_id,$case_contains);
			return $stock_update;
		}
		public function getOutwardQty($bill_unique_id,$godown_id, $brand_id,$product_id,$case_contains) {
			$stock_obj = "";
			$stock_obj = $this->stock_function_object();
			$stock_update = 0;
			$stock_update = $stock_obj->getOutwardQty($bill_unique_id,$godown_id, $brand_id,$product_id,$case_contains);
			return $stock_update;
		}
        public function PrevStockList($bill_unique_id) {
			$stock_obj = "";
			$stock_obj = $this->stock_function_object();
			$stock_update = 0;
			$stock_update = $stock_obj->PrevStockList($bill_unique_id);
			return $stock_update;
		}
		public function getCurrentStockUnit($table,$godown_id, $brand_id,$product_id,$case_contains) {
			$stock_obj = "";
			$stock_obj = $this->stock_function_object();
			$stock_update = "";
			$stock_update = $stock_obj->getCurrentStockUnit($table,$godown_id, $brand_id,$product_id,$case_contains);
			return $stock_update;
		}
		public function getCurrentStockSubunit($table,$godown_id, $brand_id,$product_id,$case_contains) {
			$stock_obj = "";
			$stock_obj = $this->stock_function_object();
			$stock_update = "";
			$stock_update = $stock_obj->getCurrentStockSubunit($table,$godown_id, $brand_id,$product_id,$case_contains);
			return $stock_update;
		}

	}
?>