<?php 
	$page_title = "Agent";
	include("include_user_check.php");
	$page_number = $GLOBALS['page_number']; $page_limit = $GLOBALS['page_limit'];
  
    $loginner_id = "";
    if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id']) && !empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'])) {
        if(!empty($GLOBALS['user_type']) && $GLOBALS['user_type'] != $GLOBALS['admin_user_type']) {
            $loginner_id = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
            $permission_module = $GLOBALS['agent_module'];
            include("permission_check.php");
        }
    }
    $agent_list = array(); $agent_count = 0;
    $agent_list = $obj->getTableRecords($GLOBALS['agent_table'], '', '', '');
    if(!empty($agent_list)){
        $agent_count = count($agent_list);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> <?php if(!empty($project_title)) { echo $project_title; } ?> - <?php if(!empty($page_title)) { echo $page_title; } ?> </title>
	<?php 
	include "link_style_script.php"; ?>
      <script type="text/javascript" src="include/js/creation_modules.js"></script>
    <script type="text/javascript" src="include/js/countries.js"></script>
    <script type="text/javascript" src="include/js/district.js"></script>
    <script type="text/javascript" src="include/js/cities.js"></script>
</head>	
<body>
<?php include "header.php"; ?>
<!--Right Content-->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="border card-box d-none add_update_form_content" id="add_update_form_content" ></div>
                            <div class="border card-box bg-white" id="table_records_cover">
                               <form name="table_listing_form" method="post">
                                    <div class="card-header align-items-center">
                                        <div class="row justify-content-end p-2">
                                            <!-- <div class="col-lg-8 col-md-8 col-8 align-self-center">
                                                <div class="h5">Consignor Details</div>
                                            </div> -->
                                            <div class="col-lg-12 col-md-12 col-12 text-end">
                                                <div class="d-flex float-end">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="search_text" style="height:34px;" placeholder="Search By Agent Name" aria-label="Search" aria-describedby="basic-addon2" onkeyup="Javascript:table_listing_records_filter();" >
                                                        <span class="input-group-text" style="height:34px;" onclick="Javascript:table_listing_records_filter();"  id="basic-addon2"><i class="bi bi-search"></i></span>
                                                    </div>
                                                    <?php if($agent_count > 0) { ?>
                                                        <div class="ps-2">
                                                            <button class="btn btn-success py-2" style="font-size:12px; width:140px;" type="button" onclick="Javascript:ExcelDownload();"> <i class="fa fa-cloud-download"></i> Excel Download </button>
                                                        </div>
                                                        <div class="ps-2">
                                                            <button class="btn btn-primary py-2" style="font-size:12px; width:75px;" type="button" onclick="Javascript:PrintAgent('');"> <i class="fa fa-print"></i> Print </button>
                                                        </div>
                                                        <div class="ps-2">
                                                            <button class="btn btn-info py-2" style="font-size:12px; width:75px;" type="button" onclick="Javascript:PrintAgent('D');"> <i class="fa fa-download"></i> PDF </button>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="ps-2">
                                                        <?php
                                                            $access_error = "";
                                                            if(!empty($loginner_id)) {
                                                                $permission_action = $add_action;
                                                                include('permission_action.php');
                                                            }
                                                            if(empty($access_error)) { 
                                                        ?>
                                                            <button class="btn btn-danger float-end" style="font-size:11px; width:80px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-plus-circle"></i> Add </button>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xl-8">
                                                <input type="hidden" name="page_number" value="<?php if(!empty($page_number)) { echo $page_number; } ?>">
                                                <input type="hidden" name="page_limit" value="<?php if(!empty($page_limit)) { echo $page_limit; } ?>">
                                                <input type="hidden" name="page_title" value="<?php if(!empty($page_title)) { echo $page_title; } ?>">
                                            </div>	
                                        </div>  
                                    </div>  
                                </form>
                                <div id="table_listing_records"></div>
                            </div>
                        </div>   
                    </div>
                </div>  
            </div>
        </div>          
<!--Right Content End-->
<?php include "footer.php"; ?>
<script>
    $(document).ready(function(){
        $("#agent").addClass("active");
        table_listing_records_filter();
    });
</script>
<script type="text/javascript">
    function ExcelDownload() {
        var search_text = ""; var url = "";
        search_text = jQuery('input[name="search_text"]').val();
        url = "agent_download.php?search_text="+search_text;
        window.open(url,'_self');
    }
    
    function PrintAgent(from) {
        var search_text = ""; var url = "";
        search_text = jQuery('input[name="search_text"]').val();
        url = "reports/rpt_agent_a4.php?search_text="+search_text+"&from="+from;
        window.open(url,'_blank');
    }
</script>