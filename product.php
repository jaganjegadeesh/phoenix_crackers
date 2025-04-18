<?php
$page_title = "Product";
include("include_user_check_and_files.php");
$page_number = $GLOBALS['page_number'];
$page_limit = $GLOBALS['page_limit'];

$login_staff_id = "";
if (isset($_SESSION[$GLOBALS['site_name_user_prefix'] . '_user_id']) && !empty($_SESSION[$GLOBALS['site_name_user_prefix'] . '_user_id'])) {
    if (!empty($GLOBALS['user_type']) && $GLOBALS['user_type'] != $GLOBALS['admin_user_type']) {
        $login_staff_id = $_SESSION[$GLOBALS['site_name_user_prefix'] . '_user_id'];
        $permission_module = $GLOBALS['product_module'];
        include("permission_check.php");
    }
}
$product_list = array();
$product_list = $obj->getTableRecords($GLOBALS['product_table'], '', '', '');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> <?php if (!empty($project_title)) {
        echo $project_title;
    } ?> -
        <?php if (!empty($page_title)) {
            echo $page_title;
        } ?>
    </title>
    <?php
    include "link_style_script.php"; ?>
    <script type="text/javascript" src="include/js/xlsx.full.min.js"></script>
    <script type="text/javascript" src="include/js/creation_modules.js"></script>
    <script type="text/javascript" src="include/js/product_upload.js"></script>
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
                            <div class="border card-box d-none add_update_form_content" id="add_update_form_content">
                            </div>
                            <input type="file" name="product_excel_upload" id="product_excel_upload"
                                style="display: none;" accept=".xls,.xlsx" onChange="Javascript:getExcelData(this);">

                            <div class="border card-box add_update_excel_form_content_excel" id="table_records_cover">
                                <form name="table_listing_form" method="post">
                                    <div class="card-header align-items-center">
                                        <div class="row justify-content-end p-2">
                                            <div class="col-lg-12 col-12 text-end">
                                                <div class="col-lg-3 col-md-4 col-6">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="search_text"
                                                            onkeyup="Javascript:table_listing_records_filter();"
                                                            style="height:34px;" placeholder="Search By Product Name"
                                                            aria-label="Search" aria-describedby="basic-addon2">
                                                        <span onclick="Javascript:table_listing_records_filter();"
                                                            class="input-group-text" style="height:34px;"
                                                            id="basic-addon2"><i class="bi bi-search"></i></span>
                                                    </div>
                                                </div>
                                                <?php if (count($product_list) > 0) { ?>
                                                    <button class="btn btn-success m-1" style="font-size:11px;"
                                                        type="button" onclick="Javascript:ProductDownload();"> <i
                                                            class="fa fa-download"></i> Download </button>
                                                <?php } ?>

                                                <button class="btn btn-primary m-1" style="font-size:11px;"
                                                    type="button" onClick="Javascript:ProductUploadCheck();"> <i
                                                        class="fa fa-upload"></i> Upload </button>
                                                <button class="btn btn-dark m-1" id="download_template"
                                                    style="font-size:11px;" type="button"
                                                    onClick="window.open('product_template.php','_self');"> <i
                                                        class="fa fa-file"></i> Template </button>

                                                <?php
                                                $add_access_error = "";
                                                if (!empty($login_staff_id)) {
                                                    $permission_action = $add_action;
                                                    include('permission_action.php');
                                                }
                                                if (empty($add_access_error)) {
                                                    ?>
                                                    <button class="btn btn-danger m-1 " style="font-size:11px;"
                                                        type="button" onclick="Javascript:ShowModalContent('<?php if (!empty($page_title)) {
                                                            echo $page_title;
                                                        } ?>', '');">
                                                        <i class="fa fa-plus-circle"></i> Add </button>
                                                <?php } ?>
                                            </div>
                                            <div class="col-sm-6 col-xl-8">
                                                <input type="hidden" name="page_number" value="<?php if (!empty($page_number)) {
                                                    echo $page_number;
                                                } ?>">
                                                <input type="hidden" name="page_limit" value="<?php if (!empty($page_limit)) {
                                                    echo $page_limit;
                                                } ?>">
                                                <input type="hidden" name="page_title" value="<?php if (!empty($page_title)) {
                                                    echo $page_title;
                                                } ?>">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="" id="table_listing_records"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Right Content End-->
        <?php include "footer.php"; ?>
        <script>
            $(document).ready(function () {
                $("#product").addClass("active");
                table_listing_records_filter();
            });
        </script>
        <script>
            function ProductDownload() {
                var filter_category_id = "";
                if (jQuery('select[name="filter_category_id"]').length > 0) {
                    filter_category_id = jQuery('select[name="filter_category_id"]').val();
                }

                var search_text = "";
                if (jQuery('input[name="search_text"]').length > 0) {
                    search_text = jQuery('input[name="search_text"]').val();
                }
                var url = "";
                url = "product_download.php?filter_category_id=" + filter_category_id + "&search_text=" + search_text;
                window.open(url, '_self');
            }
        </script>