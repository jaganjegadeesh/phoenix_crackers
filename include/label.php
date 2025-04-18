<?php
	/*require 'mailin_sms/sms_api.php';
	$GLOBALS['mailin_sms_api_key'] = "zaG0R7cJBhkUbf54";*/

	date_default_timezone_set('Asia/Calcutta');
	$GLOBALS['create_date_time_label'] = date('Y-m-d H:i:s');
	$GLOBALS['site_name_user_prefix'] = "phoenix_".date("d-m-Y"); $GLOBALS['user_id'] = ""; $GLOBALS['creator'] = "";
	$GLOBALS['creator_name'] = ""; $GLOBALS['bill_company_id'] = ""; $GLOBALS['user_type'] = ""; $GLOBALS['null_value'] = "NULL";

	$GLOBALS['page_number'] = 1; $GLOBALS['page_limit'] = 10; $GLOBALS['page_limit_list'] = array("10", "25", "50", "100");

	$GLOBALS['backup_folder_name'] = 'backup'; $GLOBALS['log_backup_folder_name'] = 'backup/logs';
	$GLOBALS['log_backup_file'] = $GLOBALS['backup_folder_name']."/logs/".date("Y").".csv"; 
	$GLOBALS['max_log_file_count'] = 5; $GLOBALS['max_log_file_size_mb'] = 10; $GLOBALS['expire_log_file_days'] = 90;
	$GLOBALS['max_role_count'] = 5; $GLOBALS['max_user_count'] = 10;
	$GLOBALS['max_company_count'] = 1; $GLOBALS['max_category_count'] = 4; $GLOBALS['max_godown_count'] = 8;
	$GLOBALS['max_godown_room_count'] = 14;
	
	// Tables
	$table_prefix = "phoenix_";
	$GLOBALS['company_table'] = $table_prefix."company"; 
	$GLOBALS['login_table'] = $table_prefix."login"; 
	$GLOBALS['user_table'] = $table_prefix."user"; 
	$GLOBALS['role_table'] = $table_prefix."role";
	$GLOBALS['agent_table'] = $table_prefix."agent";
	$GLOBALS['party_table'] = $table_prefix."party";
	$GLOBALS['charges_table'] = $table_prefix."charges";
	$GLOBALS['payment_table'] = $table_prefix."payment";
	$GLOBALS['payment_mode_table'] = $table_prefix.'payment_mode';
    $GLOBALS['bank_table'] = $table_prefix.'bank';
	$GLOBALS['brand_table'] = $table_prefix.'brand';
	$GLOBALS['godown_table'] = $table_prefix.'godown';
	$GLOBALS['unit_table'] = $table_prefix.'unit';
	$GLOBALS['product_table'] = $table_prefix.'product';
	$GLOBALS['party_table'] = $table_prefix.'party';
	$GLOBALS['agent_table'] = $table_prefix.'agent';
	$GLOBALS['stock_table'] = $table_prefix.'stock';
	$GLOBALS['quotation_table'] = $table_prefix.'quotation';
	$GLOBALS['delivery_challan_table'] = $table_prefix.'delivery_challan';
	$GLOBALS['quotation_product_table'] = $table_prefix.'quotation_product';
	$GLOBALS['stock_by_godown_table'] = $table_prefix.'stock_by_godown';
	

	$GLOBALS['Reset_to_one'] = "Reset To 1"; $GLOBALS['continue_last_number'] = "Continue from last number"; $GLOBALS['custom_number'] = "Custom Number";
	
	$GLOBALS['admin_user_type'] = "Super Admin"; $GLOBALS['staff_user_type'] = "Staff";

	if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'])) {
		$GLOBALS['creator'] = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
	}

	if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_name']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_name'])) {
		$GLOBALS['creator_name'] = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_name'];
	}

	if(!empty($_SESSION['bill_company_id']) && isset($_SESSION['bill_company_id'])) {
		$GLOBALS['bill_company_id'] = $_SESSION['bill_company_id'];
	}

	if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type']) && !empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'])) {
		$GLOBALS['user_type'] = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'];
	}

	// Modules
	
	$GLOBALS['agent_module'] = "Agent";
	$GLOBALS['party_module'] = "Party";
	$GLOBALS['charges_module'] = "Charges";
	$GLOBALS['payment_mode_module'] = "Payment Mode";
	$GLOBALS['bank_module'] = "Bank";
	$GLOBALS['unit_module'] = "Unit";
	$GLOBALS['brand_module'] = "Brand";
	$GLOBALS['godown_module'] = "Godown";
	$GLOBALS['product_module'] = "Product";
	$GLOBALS['reports_module'] = "Reports";
	$GLOBALS['quotation_module'] = "Quotation";



	$user_access_list = array();
	$user_access_list[] = $GLOBALS['agent_module'];
	$user_access_list[] = $GLOBALS['party_module'];
	$user_access_list[] = $GLOBALS['charges_module'];
	$user_access_list[] = $GLOBALS['payment_mode_module'];
	$user_access_list[] = $GLOBALS['bank_module'];
	$user_access_list[] = $GLOBALS['unit_module'];
	$user_access_list[] = $GLOBALS['brand_module'];
	$user_access_list[] = $GLOBALS['godown_module'];
	$user_access_list[] = $GLOBALS['product_module'];
	$user_access_list[] = $GLOBALS['reports_module'];
	$user_access_list[] = $GLOBALS['quotation_module'];


	$GLOBALS['access_pages_list'] = $user_access_list;

	// Stock Actions
	$GLOBALS['stock_action_plus'] = "Plus"; $GLOBALS['stock_action_minus'] = "Minus";
?>