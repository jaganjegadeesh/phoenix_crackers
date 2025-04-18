<?php 
    include("include_user_check.php");
    $page_title = "Company";
    $page_number = $GLOBALS['page_number']; $page_limit = $GLOBALS['page_limit'];

    if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type']) && !empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'])) {
        if($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'] != $GLOBALS['admin_user_type']) {
            header("Location:dashboard.php");
            exit;
        }
    }

    $company_count = 0;
    $company_list = array();
    $company_list = $obj->getTableRecords($GLOBALS['company_table'], '', '', '');
    if(!empty($company_list)) {
        $company_count = count($company_list);
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
                        <div class="border card-box d-none add_update_form_content" id="add_update_form_content">
                        </div>
                        <div class="border card-box" id="table_records_cover">
                            <div class="card-header align-items-center">
                                <form name="table_listing_form" method="post">
                                    <div class="row justify-content-end p-2">
                                        <div class="col-lg-3 col-md-4 col-6">
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-4">
                                            <?php if($company_count < $GLOBALS['max_company_count']) { ?>
                                                    <button class="btn btn-danger float-end" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-plus-circle"></i> Add </button>
                                            <?php } ?>
                                        </div>
                                        <div class="col-lg-12 text-end pt-2">
                                            <?php if(!empty($GLOBALS['max_company_count'])) { ?>
                                                <div class="new_smallfnt">Max <?php echo $GLOBALS['max_company_count']; ?> company Allowed</div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-8">
                                        <input type="hidden" name="page_number" value="<?php if(!empty($page_number)) { echo $page_number; } ?>">
                                        <input type="hidden" name="page_limit" value="<?php if(!empty($page_limit)) { echo $page_limit; } ?>">
                                        <input type="hidden" name="page_title" value="<?php if(!empty($page_title)) { echo $page_title; } ?>">
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
        $("#company").addClass("active");
        table_listing_records_filter();
    });
</script>



