<?php
include("include.php");

$login_staff_id = "";
if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id']) && !empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'])) {
    if(!empty($GLOBALS['user_type']) && $GLOBALS['user_type'] != $GLOBALS['admin_user_type']) {
        $login_staff_id = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
        $permission_module = $GLOBALS['unit_module'];
    }
}

if(isset($_REQUEST['show_unit_id'])) {
    $show_unit_id = "";
    $show_unit_id = $_REQUEST['show_unit_id'];

    $unit_name = "";
    if(!empty($show_unit_id)) {
        $unit_list = array();
        $unit_list = $obj->getTableRecords($GLOBALS['unit_table'], 'unit_id', $show_unit_id, '');
        if(!empty($unit_list)) {
            foreach ($unit_list as $data) {
                if(!empty($data['unit_name'])) {
                    $unit_name = $obj->encode_decode('decrypt', $data['unit_name']);
                }
            }
        }
    } 
    ?>
    <form class="poppins pd-20 redirection_form" name="unit_form" method="POST">
        <div class="card-header">
            <div class="row p-2">
                <div class="col-8 align-self-center">
                    <?php if(!empty($show_unit_id)){ ?>
                        <div class="h5">Edit Unit</div>
                    <?php 
                    } else{ ?>
                        <div class="h5">Add Unit</div>
                    <?php
                    } ?>
                </div>
                <div class="col-4">
                    <button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('unit.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
                </div>
            </div>
        </div>
        <div class="row justify-content-center p-3">
            <input type="hidden" name="edit_id" value="<?php if(!empty($show_unit_id)) {  echo $show_unit_id; } ?>">
            <div class="col-lg-8 col-md-10 col-10">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-8 col-12">
                        <div class="form-label-group in-border">
                            <div class="input-group mb-1">
                                <input type="text" id="unit_name" name="unit_name" value="<?php if(!empty($unit_name)) { echo $unit_name; } ?>" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',15,'');" onkeyup="Javascript:InputBoxColor(this,'text');">
                                <label>Unit Name <span class="text-danger">*</span></label>
                                <?php if(empty($show_unit_id)) { ?>
                                    <div class="input-group-append">
                                        <button class="btn btn-danger" type="button" onclick="Javascript:addCreationDetails('unit', 15);"><i class="fa fa-plus"></i></button>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="new_smallfnt">Text Only (Character up to 15)</div>
                    </div>
                </div>
            </div>
            <?php if(empty($show_unit_id)) { ?>
                <div class="col-lg-6 col-md-8 col-12 mt-3">
                    <div class="table-responsive smallfnt text-center">
                        <input type="hidden" name="unit_count" value="0">
                        <table class="table nowrap cursor table-bordered text-center added_unit_table">
                            <thead class="bg-dark">
                                <tr class="text-white">
                                    <th>S.No</th>
                                    <th>Unit Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-12 pt-3 text-center">
                <button class="btn btn-danger" type="button" onClick="Javascript:SaveModalContent(event,'unit_form', 'unit_changes.php', 'unit.php');">
                    Submit
                </button>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                jQuery('#unit_name').on("keypress", function(e) {
                    if(e.keyCode == 13) {
                        addCreationDetails('unit', 15);
                        return false;
                    }
                });
            });
        </script>
    </form>
    <?php
}
if(isset($_POST['edit_id'])) {
    $unit_name = array(); $unit_name_error = ""; $single_lower_case_name = "";
    $valid_unit = ""; $form_name = "unit_form"; $unit_error = "";
    $single_unit_name = ""; $prev_unit_id = ""; $lower_case_name = array();

    $edit_id = "";
    if(isset($_POST['edit_id'])) {
        $edit_id = $_POST['edit_id'];
        $edit_id = trim($edit_id);
    }
    if(!empty($edit_id)) {
        if(isset($_POST['unit_name'])) {
            $single_unit_name = $_POST['unit_name'];
            $single_unit_name = trim($single_unit_name);
            $unit_name_error = $valid->valid_text($single_unit_name, "Unit Name", "1", "15");
        }
        if(!empty($unit_name_error)) {
            $valid_unit = $valid->error_display($form_name, "unit_name", $unit_name_error, 'text');
        }
        else {
            $single_lower_case_name = strtolower($single_unit_name);
            $single_unit_name = $obj->encode_decode("encrypt", $single_unit_name);
            $single_lower_case_name = $obj->encode_decode("encrypt", $single_lower_case_name);
            if(!empty($single_lower_case_name)) {
                $prev_unit_id = $obj->CheckUnitAlreadyExists($GLOBALS['bill_company_id'], $single_lower_case_name);
                if(!empty($prev_unit_id)) {
                    if($prev_unit_id != $edit_id) {
                        $unit_error = "This Unit name - " . $obj->encode_decode("decrypt", $single_lower_case_name) . " is already exist";
                    }
                }
            }
        }
    }

    if(empty($edit_id)) {
        if(isset($_POST['unit_names'])) {
            $unit_name = $_POST['unit_names'];
        }
        $inputbox_unit_name = "";
        $inputbox_unit_name = $_POST['unit_name'];

        if(!empty($inputbox_unit_name) && empty($unit_name)) {
            $unit_add_error = "Click Add Button to Append Unit";
            if(!empty($unit_add_error)) {
                $valid_unit = $valid->error_display($form_name, "unit_name", $unit_add_error, 'text');
            }
        } else if(empty($inputbox_unit_name) && empty($unit_name)) {
            $unit_add_error = "Enter Unit Name";
            if(!empty($unit_add_error)) {
                $valid_unit = $valid->error_display($form_name, "unit_name", $unit_add_error, 'text');
            }
        } else if(!empty($inputbox_unit_name)) {
            $unit_add_error = "Click Add Button to Append Unit";
            if(!empty($unit_add_error)) {
                $valid_unit = $valid->error_display($form_name, "unit_name", $unit_add_error, 'text');
            }
        }
        if(!empty($unit_name)) {
            for ($p = 0; $p < count($unit_name); $p++) {
                if(!preg_match("/^[a-zA-Z\s ]+$/", $unit_name[$p]) || strlen($unit_name[$p]) > 15) {
                    $unit_name_error = "Invalid Unit name - " . $unit_name[$p];
                }
                else {
                    $lower_case_name[$p] = strtolower($unit_name[$p]);
                    $unit_name[$p] = $obj->encode_decode('encrypt', $unit_name[$p]);
                    $lower_case_name[$p] = $obj->encode_decode('encrypt', $lower_case_name[$p]);
                }

                if(!empty($unit_name_error)) {
                    if(!empty($valid_unit)) {
                        $valid_unit = $valid_unit." ".$valid->error_display($form_name, "unit_name", $unit_name_error, 'text');
                    }
                    else {
                        $valid_unit = $valid->error_display($form_name, "unit_name", $unit_name_error, 'text');
                    }
                }
            }
        }
    }

    $result = "";
    if(empty($valid_unit) && empty($unit_name_error)) {
        $check_user_id_ip_address = 0;
        $check_user_id_ip_address = $obj->check_user_id_ip_address();
        $bill_company_id = $GLOBALS['bill_company_id'];

        if(preg_match("/^\d+$/", $check_user_id_ip_address)) {
            for ($i = 0; $i < count($lower_case_name); $i++) {
                if(!empty($lower_case_name[$i])) {
                    $prev_unit_id = $obj->CheckUnitAlreadyExists($bill_company_id, $lower_case_name[$i]);
                    if(!empty($prev_unit_id)) {
                        $unit_error = "This Unit name - " . $obj->encode_decode("decrypt", $lower_case_name[$i]) . " is already exist";
                    }
                }
            }
            $created_date_time = $GLOBALS['create_date_time_label'];
            $creator = $GLOBALS['creator'];
            $creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);

            if(empty($unit_error)) {
                if(empty($edit_id)) {
                    $action = array();
                    for ($p = 0; $p < count($unit_name); $p++) {
                        if(empty($prev_unit_id)) {
                            if(!empty($unit_name[$p])) {
                                $action[$p] = "New Unit Created. Name - " . $obj->encode_decode('decrypt', $unit_name[$p]);
                            }

                            $null_value = $GLOBALS['null_value'];
                            $columns = array('created_date_time', 'creator', 'creator_name', 'bill_company_id', 'unit_id', 'unit_name', 'lower_case_name', 'deleted');
                            $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$bill_company_id."'", "'".$null_value."'", "'".$unit_name[$p]."'", "'".$lower_case_name[$p]."'", "'0'");

                            $unit_insert_id = $obj->InsertSQL($GLOBALS['unit_table'], $columns, $values, 'unit_id', '', $action[$p]);		
                            if(preg_match("/^\d+$/", $unit_insert_id)) {								
                                $result = array('number' => '1', 'msg' => 'Unit Successfully Created');						
                            }
                            else {
                                $result = array('number' => '2', 'msg' => $unit_insert_id);
                            }
                        } 
                        else {
                            $result = array('number' => '2', 'msg' => $unit_error);
                        }
                    }
                } 
                else if(!empty($edit_id)) {
                    $getUniqueID = "";
                    $getUniqueID = $obj->getTableColumnValue($GLOBALS['unit_table'], 'unit_id', $edit_id, 'id');
                    if(preg_match("/^\d+$/", $getUniqueID)) {
                        $action = "";
                        if(!empty($single_unit_name)) {
                            $action = "Unit Updated. Name - " . $obj->encode_decode('decrypt', $single_unit_name);
                        }

                        $columns = array(); $values = array();
                        $columns = array('creator_name', 'unit_name', 'lower_case_name');
                        $values = array("'".$creator_name."'", "'".$single_unit_name."'", "'".$single_lower_case_name."'");
                        $unit_update_id = $obj->UpdateSQL($GLOBALS['unit_table'], $getUniqueID, $columns, $values, $action);
                        if(preg_match("/^\d+$/", $unit_update_id)) {
                            $result = array('number' => '1', 'msg' => 'Updated Successfully');
                        } 
                        else {
                            $result = array('number' => '2', 'msg' => $unit_update_id);
                        }
                    }
                }
            } 
            else {
                $result = array('number' => '2', 'msg' => $unit_error);
            }
        } 
        else {
            $result = array('number' => '2', 'msg' => 'Invalid IP');
        }
    }
    else {
        if(!empty($valid_unit)) {
            $result = array('number' => '3', 'msg' => $valid_unit);
        }
    }

    if(!empty($result)) {
        $result = json_encode($result);
    }
    echo $result;
    exit;
}
if(isset($_POST['page_number'])) {
    $page_number = $_POST['page_number'];
    $page_limit = $_POST['page_limit'];
    $page_title = $_POST['page_title'];

    $search_text = "";
    if(isset($_POST['search_text'])) {
        $search_text = $_POST['search_text'];
        $search_text = trim($search_text);
    }

    $total_records_list = array();
    $total_records_list = $obj->getTableRecords($GLOBALS['unit_table'], '', '','');

    if(!empty($search_text)) {
        $search_text = strtolower($search_text);
        $list = array();
        if(!empty($total_records_list)) {
            foreach ($total_records_list as $val) {
                if((strpos(strtolower(html_entity_decode($obj->encode_decode('decrypt', $val['unit_name']))), $search_text) !== false)) {
                    $list[] = $val;
                }
            }
        }
        $total_records_list = $list;
    }

    $total_pages = 0;
    $total_pages = count($total_records_list);

    $page_start = 0;
    $page_end = 0;
    if(!empty($page_number) && !empty($page_limit) && !empty($total_pages)) {
        if($total_pages > $page_limit) {
            if($page_number) {
                $page_start = ($page_number - 1) * $page_limit;
                $page_end = $page_start + $page_limit;
            }
        } else {
            $page_start = 0;
            $page_end = $page_limit;
        }
    }

    $show_records_list = array();
    if(!empty($total_records_list)) {
        foreach ($total_records_list as $key => $val) {
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
    $login_staff_id = "";
    if($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'] == $GLOBALS['staff_user_type']) {
        $login_staff_id =  $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
    }

    $view_access_error = "";
    if(!empty($login_staff_id)) {
        $permission_action = $view_action;
        include('permission_action.php');
    }
    if(empty($view_access_error)) { 
        ?>
        <table class="table nowrap cursor text-center smallfnt">
            <thead class="bg-light">
                <tr>
                    <th>S.No</th>
                    <th>Unit Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!empty($show_records_list)) {
                        $count_unit = 0;
                        foreach ($show_records_list as $key => $list) {
                            $index = $key + 1;

                            if(!empty($prefix)) {
                                $index = $index + $prefix;
                            } 
                            ?>
                            <tr style="cursor:default;">
                                <td><?php echo $index; ?></td>

                                <td class="text-center">
                                    <?php
                                        $unit_name = "";
                                        if(!empty($list['unit_name'])) {
                                            $unit_name = $list['unit_name'];
                                            $unit_name = $obj->encode_decode('decrypt', $unit_name);
                                            echo $unit_name;
                                        }
                                    ?>
                                </td>
                                <?php 
                                        $edit_access_error = "";
                                        if(!empty($login_staff_id)) {
                                            
                                            $permission_action = $edit_action;
                                            
                                            include('permission_action.php');
                                        }


                                        $delete_access_error = "";
                                        if(!empty($login_staff_id)) {
                                            $permission_action = $delete_action;
                                            include('permission_action.php');
                                        }
 
                                    ?>
                                <?php if(empty($edit_access_error) || empty($delete_access_error)){ ?>
                                    <td>
                                        
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                            <?php
                                                $edit_access_error = "";
                                                if(!empty($login_staff_id)) {
                                                    $permission_action = $edit_action;
                                                    include('permission_action.php');
                                                }
                                                if(empty($edit_access_error)) { 
                                                    ?>
                                                <li><a class="dropdown-item"  style="cursor:pointer;"  href="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($list['unit_id'])) { echo $list['unit_id']; } ?>');"><i class="fa fa-pencil"></i> &ensp; Edit</a></li>
                                                <?php } 
                                                $delete_access_error = "";
                                                if(!empty($login_staff_id)) {
                                                    $permission_action = $delete_action;
                                                    include('permission_action.php');
                                                }
                                                if(empty($delete_access_error)) {
                                                    $linked_count = 0;
                                                    // $linked_count = $obj->GetUnitLinkedCount($list['unit_id']);
                                                    if(!empty($linked_count)) {
                                                        ?>
                                                        <li><a class="dropdown-item text-secondary"  style="cursor:pointer;" ><i class="fa fa-trash"></i> &ensp; Delete</a></li>
                                                <?php }else{ ?>
                                                    <li><a class="dropdown-item" style="cursor:pointer;" onclick="Javascript:DeleteModalContent('<?php if(!empty($page_title)) { echo $page_title;} ?>', '<?php if(!empty($list['unit_id'])) { echo $list['unit_id']; } ?>');"><i class="fa fa-trash"></i> &ensp; Delete</a></li>
                                                    <?php } 
                                                        }
                                                    ?>
                                        </td>
                                    <?php } ?>
                            </tr>
                            <?php
                        }
                    } 
                    else {
                        ?>
                        <tr>
                            <td colspan="3" class="text-center">Sorry! No records found</td>
                        </tr>
                        <?php 
                    }  
                ?>
            </tbody>
        </table>
        <?php
    }
}

if(isset($_REQUEST['unit_row_index'])) {
    $unit_row_index = $_REQUEST['unit_row_index'];
    $selected_unit_name = $_REQUEST['selected_unit_name'];
    ?>
    <tr class="unit_row" id="unit_row<?php if(!empty($unit_row_index)) { echo $unit_row_index; } ?>">
        <td class="text-center sno"><?php if(!empty($unit_row_index)) { echo $unit_row_index; } ?></td>
        <td class="text-center">
            <?php
                if(!empty($selected_unit_name)) {
                    echo $selected_unit_name;
                }    
            ?>
            <input type="hidden" name="unit_names[]" value="<?php if(!empty($selected_unit_name)) { echo $selected_unit_name; } ?>">
        </td>
        <td class="text-center product_pad">
            <button class="btn btn-danger align-self-center px-2 py-1" type="button" onclick="Javascript:DeleteCreationRow('unit', '<?php if(!empty($unit_row_index)) { echo $unit_row_index; } ?>');"> <i class="fa fa-trash" aria-hidden="true"></i></button>
        </td>
    </tr>
    <?php
}

if(isset($_REQUEST['delete_unit_id'])) {
    $delete_unit_id = $_REQUEST['delete_unit_id'];
    $msg = "";
    if(!empty($delete_unit_id)) {
        $unit_unique_id = "";
        $unit_unique_id = $obj->getTableColumnValue($GLOBALS['unit_table'], 'unit_id', $delete_unit_id, 'id');
        if(preg_match("/^\d+$/", $unit_unique_id)) {
            $unit_name = "";
            $unit_name = $obj->getTableColumnValue($GLOBALS['unit_table'], 'unit_id', $delete_unit_id, 'unit_name');

            $action = "";
            if(!empty($unit_name)) {
                $action = "Unit Deleted. Name - " . $obj->encode_decode('decrypt', $unit_name);
            }
            $linked_count = 0;
            $linked_count = $obj->GetUnitLinkedCount($delete_unit_id);
            if(empty($linked_count)) {
                $columns = array();
                $values = array();
                $columns = array('deleted');
                $values = array("'1'");
                $msg = $obj->UpdateSQL($GLOBALS['unit_table'], $unit_unique_id, $columns, $values, $action);
            }
            else {
                $msg = "This Unit is associated with other screens";
            }
        }
    }
    echo $msg;
    exit;
}
?>