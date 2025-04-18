<?php 
	$page_title = "Quotation";
	include("include_user_check_and_files.php");
	$page_number = $GLOBALS['page_number']; $page_limit = $GLOBALS['page_limit'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> <?php if(!empty($project_title)) { echo $project_title; } ?> - <?php if(!empty($page_title)) { echo $page_title; } ?> </title>
	<?php 
	include "link_style_script.php"; ?>
</head>	
<body>
<?php include "header.php"; 
    $party_list = $creation_obj->BillPartyDetails($GLOBALS['bill_company_id'], 'sales');

?>
<!--Right Content-->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form name="table_listing_form" method="post">
                        <div class="card">
                            <div class="border card-box d-none add_update_form_content" id="add_update_form_content" ></div>
                            <div class="border card-box" id="table_records_cover">
                                <div class="card-header align-items-center">
                                    <div class="row justify-content-end p-2">   
                                        <div class="col-lg-2 col-md-3 col-6">
                                            <div class="form-group mb-2">
                                                <div class="form-label-group in-border">
                                                    <input type="date" name="from_date" class="form-control shadow-none" onchange="Javascript:table_listing_records_filter();" placeholder="" required="">
                                                    <label>From Date</label>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-6">
                                            <div class="form-group mb-2">
                                                <div class="form-label-group in-border">
                                                    <input type="date" name="to_date" class="form-control shadow-none" onchange="Javascript:table_listing_records_filter();" placeholder="" required="">
                                                    <label>To Date</label>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-6 mb-2">
                                            <div class="input-group">
                                                <select class="select2 select2-danger" name="search_text" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="Javascript:table_listing_records_filter();">
                                                    <option value="">Select Party</option>
                                                    <?php if (!empty($party_list)) {
                                                        foreach ($party_list as $P_list) { ?>
                                                            <option value="<?php if (!empty($P_list['party_id'])) {
                                                                echo $P_list['party_id'];
                                                            } ?>" <?php if(!empty($party_id) && $party_id == $P_list['party_id']) { echo "selected"; } ?>>
                                                                <?php if (!empty($P_list['party_name'])) {
                                                                    echo $obj->encode_decode('decrypt', $P_list['party_name']);
                                                                } ?>
                                                            </option>
                                                        <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-6 text-end">
                                            <button class="btn btn-danger m-1" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-plus-circle"></i> Add </button>   
                                        </div>
                                            <div class="col-sm-6 col-xl-8">
                                                <input type="hidden" name="page_number" value="<?php if(!empty($page_number)) { echo $page_number; } ?>">
                                                <input type="hidden" name="page_limit" value="<?php if(!empty($page_limit)) { echo $page_limit; } ?>">
                                                <input type="hidden" name="page_title" value="<?php if(!empty($page_title)) { echo $page_title; } ?>">
                                            </div>	
                                      
                                    </div>
                                </div>
                                <div id="table_listing_records"></div>
                            </div>
                        </div>   
                    </form>
                </div>
            </div>  
        </div>
    </div>          
<!--Right Content End-->
<?php include "footer.php"; ?>
<script>
    $(document).ready(function(){
        $("#quotation").addClass("active");
        table_listing_records_filter();
    });
</script>