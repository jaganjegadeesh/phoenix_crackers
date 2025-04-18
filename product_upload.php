<?php
include("include_user_check.php");

if (isset($_REQUEST['show_upload_excel'])) {
    $show_upload_excel = $_REQUEST['show_upload_excel'];
    if (!empty($show_upload_excel) && $show_upload_excel == 1) { ?>
        <form class="py-4 poppins pd-20" name="excel_upload_form" method="POST">
            <div class="col-12 my-3">
                <div class="excel_back_upload_details back_button">
                    <button onclick="window.open('product.php','_self')"
                        style="font-size:11px;color:white;padding:5px 7px;margin-left:24px;" class=" btn btn-danger"
                        type="button"><i class="fa fa-chevron-circle-left"></i> Back</button>
                </div>
            </div>
            <div class="col-12 my-3" style="position: relative;">
                <div class="excel_upload_details" style="display: none;">
                    <span class="excel_upload_count"></span> upload in out of <span class="excel_upload_total_count"></span>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-12">
                    <input type="hidden" name="upload_row_index" value="1">
                    <div class="table-responsive">
                        <table id="excel_upload_details_table" class="data-table table tablefont"
                            style="margin: auto;width:1355px;">
                            <tbody>
                                <span style="text-align: center;color:red;">*Subunit Need to give 1 or 0</span>
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="text-align: center; width: 10px;">S.No</th>
                                        <th style="text-align: center; width: 200px;">Product Name</th>
                                        <th style="text-align: center; width: 125px;">Unit</th>
                                        <th style="text-align: center; width: 125px;">Subunit Need</th>
                                        <th style="text-align: center; width: 125px;">Subunit</th>
                                        <th style="text-align: center; width: 125px;">Subunit Contains</th>
                                        <th style="text-align: center; width: 125px;">Per</th>
                                        <th style="text-align: center; width: 125px;">Per Type</th>
                                        <th style="text-align: center; width: 125px;">Sales rate</th>
                                    </tr>
                                </thead>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="col-12 my-3" style="position: relative;">
                        <div class="excel_upload_details" style="display: none;">
                            <span class="excel_upload_count"></span> upload in out of <span class="excel_upload_total_count"></span>
                        </div>
                    </div> -->

                <div class="col-md-12 pt-3 text-center">
                    <button class="btn btn-primary btnwidth submit_button" disabled type="button"
                        onClick="Javascript:UploadExcelData(event, 'excel_upload_form');">Submit</button>
                </div>
            </div>
        </form>
        <?php
    }
}

if (isset($_REQUEST['excel_row_index'])) {
    $excel_row_index = "";
    $excel_row_values = "";
    $sno = "";
    $product_name = "";
    $product_name_error = "";
    $unit_name = "";
    $unit_name_error = "";
    $upload_type = "";
    $product_code = "";
    $product_code_error = "";

    if (isset($_REQUEST['upload_type'])) {
        $upload_type = $_REQUEST['upload_type'];
    }

    $excel_row_index = $_REQUEST['excel_row_index'];
    $excel_row_index = trim($excel_row_index);

    $excel_row_values = $_REQUEST['excel_row_values'];
    $excel_row_values = trim($excel_row_values);


    if (!empty($excel_row_values)) {
        $excel_row_values = json_decode($excel_row_values);

        if ($excel_row_values['0'] != "undefined" && $excel_row_values['0'] != $GLOBALS['null_value']) {
            $sno = trim($excel_row_values['0']);
        }

        if ($excel_row_values['1'] != "undefined" && $excel_row_values['1'] != $GLOBALS['null_value']) {
            $excel_row_values['1'] = trim($excel_row_values['1']);
            $excel_row_values['1'] = str_replace("_____", "#", $excel_row_values['1']);
            $excel_row_values['1'] = str_replace("____", "+", $excel_row_values['1']);
            $excel_row_values['1'] = str_replace("___", "&", $excel_row_values['1']);
            $excel_row_values['1'] = str_replace("__", '"', $excel_row_values['1']);
            $excel_row_values['1'] = str_replace("_", "'", $excel_row_values['1']);

            $product_name = $excel_row_values['1'];
            $product_name_error = $valid->valid_product_name($product_name, "Product Name", "1", "50");

        }
        if (!empty($excel_row_values['2']) && $excel_row_values['2'] != "undefined" && $excel_row_values['2'] != $GLOBALS['null_value']) {
            $excel_row_values['2'] = trim($excel_row_values['2']);
            $unit = $excel_row_values['2'];
            $unit_error = $valid->valid_text($unit, "unit", "1", "5");
        }
        if (!empty($excel_row_values['3']) && $excel_row_values['3'] != 'undefined' && $excel_row_values['3'] != $GLOBALS['null_value']) {
            $excel_row_values['3'] = trim($excel_row_values['3']);
            $subunit_need = $excel_row_values['3'];
            $subunit_need_error = $valid->common_validation($subunit_need, "Subunit need", "1");
        }

        if (!empty($excel_row_values['4']) && $excel_row_values['4'] != "undefined" && $excel_row_values['4'] != $GLOBALS['null_value']) {
            $excel_row_values['4'] = trim($excel_row_values['4']);
            $subunit_name = $excel_row_values['4'];
            $unit_name_error = $valid->valid_text($subunit_name, "SubUnit Name", "0", "15");
        }

        if (!empty($excel_row_values['5']) && $excel_row_values['5'] != "undefined" && $excel_row_values['5'] != $GLOBALS['null_value']) {
            $excel_row_values['5'] = trim($excel_row_values['5']);
            $subunit_contains = $excel_row_values['5'];
            $unit_name_error = $valid->valid_text($subunit_contains, "SubUnit Contains", "0", "15");
        }

        if (!empty($excel_row_values['6']) && $excel_row_values['6'] != "undefined" && $excel_row_values['6'] != $GLOBALS['null_value']) {
            $excel_row_values['6'] = trim($excel_row_values['6']);
            $per = $excel_row_values['6'];
            $unit_name_error = $valid->valid_text($per, "Pre", "0", "15");
        }

        if (!empty($excel_row_values['7']) && $excel_row_values['7'] != "undefined" && $excel_row_values['7'] != $GLOBALS['null_value']) {
            $excel_row_values['7'] = trim($excel_row_values['7']);
            $per_type = $excel_row_values['7'];
            $unit_name_error = $valid->valid_text($per_type, "Per Type", "0", "15");
        }

        if (!empty($excel_row_values['8']) && $excel_row_values['8'] != "undefined" && $excel_row_values['8'] != $GLOBALS['null_value']) {
            $excel_row_values['8'] = trim($excel_row_values['8']);
            $sales_rate = $excel_row_values['8'];
            $unit_name_error = $valid->valid_text($sales_rate, "Sales rate", "0", "15");
        }
    }

    $row_id = date("dmyhis") . "_" . $excel_row_index;

    ?>

    <tr id="<?php if (!empty($row_id)) {
        echo $row_id;
    } ?>" class="excel_row">
        <td style="width: 10px; text-align: center;">
            <?php if (!empty($sno)) {
                echo $sno;
            } ?>
            <input type="hidden" name="excel_upload_type" value="<?php if (!empty($upload_type)) {
                echo $upload_type;
            } ?>" placeholder="excel_upload_type">
        </td>
        <td style="width: 100px;">
            <input type="text" class="form-control mb-1" name="product_name" value="<?php if (!empty($product_name)) {
                echo $product_name;
            } ?>" placeholder="Product Name">
            <?php if (!empty($product_name_error)) { ?>
                <span class="infos"><?php $product_name_error; ?></span>
            <?php } ?>
        </td>
        <td style="width: 200px;">
            <input type="text" class="form-control mb-1" name="unit_name" value="<?php if (!empty($unit)) {
                echo $unit;
            } ?>" placeholder="unit Name">
            <?php if (!empty($unit_error)) { ?>
                <span class="infos"><?php $unit_error; ?></span>
            <?php } ?>
        </td>
        <td style="width: 100px;">
            <input type="text" class="form-control mb-1" name="subunit_need" value="<?php if (!empty($subunit_need)) {
                echo $subunit_need;
            } ?>" placeholder="Subunit need">
            <?php if (!empty($subunit_need_error)) { ?>
                <span class="infos"><?php $subunit_need_error; ?></span>
            <?php } ?>
        </td>
        <td style="width: 100px;">
            <input type="text" class="form-control mb-1" name="subunit_name" value="<?php if (!empty($subunit_name)) {
                echo $subunit_name;
            } ?>" placeholder="Subunit Name">
            <?php if (!empty($subunit_name_error)) { ?>
                <span class="infos"><?php $subunit_name_error; ?></span>
            <?php } ?>
        </td>
        <td style="width: 100px;">
            <input type="text" class="form-control mb-1" name="subunit_contains" value="<?php if (!empty($subunit_contains)) {
                echo $subunit_contains;
            } ?>" placeholder="Subunit contains">
            <?php if (!empty($subunit_contains_error)) { ?>
                <span class="infos"><?php $subunit_contains_error; ?></span>
            <?php } ?>
        </td>

        <td style="width: 100px;">
            <input type="text" class="form-control mb-1" name="per" value="<?php if (!empty($per)) {
                echo $per;
            } ?>" placeholder="Per">
            <?php if (!empty($per_error)) { ?>
                <span class="infos"><?php $per_error; ?></span>
            <?php } ?>
        </td>
        <td style="width: 100px;">
            <input type="text" class="form-control mb-1" name="per_type" value="<?php if (!empty($per_type)) {
                echo $per_type;
            } ?>" placeholder="Per Type">
            <?php if (!empty($per_type_error)) { ?>
                <span class="infos"><?php $per_type_error; ?></span>
            <?php } ?>
        </td>
        <td style="width: 100px;">
            <input type="text" class="form-control mb-1" name="sales_rate" value="<?php if (!empty($sales_rate)) {
                echo $sales_rate;
            } ?>" placeholder="Sales rate">
            <?php if (!empty($sales_rate_error)) { ?>
                <span class="infos"><?php $sales_rate_error; ?></span>
            <?php } ?>
        </td>
        <td class="excel_upload_status" style="width: 50px;"></td>
    </tr>
    <?php
}

if (isset($_REQUEST['product_name'])) {
    $product_name = "";
    $product_name_error = "";
    $unit_name = "";
    $unit_name_error = "";
    $excel_upload_type = "";
    $category_type = "";
    $category_type_error = "";
    $product_name = "";
    $product_name_error = "";
    $same_unit_error = "";
    $excel_upload_error = "";
    $subunit_name = "";
    $per = "";
    $per_type = "";
    $sales_rate = "";
    $subunit_need = 0;
    $category_id = "";
    $category_id_error = "";
    $category_name = "";
    $category_name_error = "";

    if (isset($_REQUEST['excel_upload_type'])) {
        $excel_upload_type = $_REQUEST['excel_upload_type'];
    }

    if (isset($_REQUEST['per'])) {
        $per = $_REQUEST['per'];
    }
    if (isset($_REQUEST['per_type'])) {
        $per_type = $_REQUEST['per_type'];
    }
    if (isset($_REQUEST['sales_rate'])) {
        $sales_rate = $_REQUEST['sales_rate'];
    }
    if (isset($_REQUEST['product_name'])) {
        $product_name = $_REQUEST['product_name'];

        $product_name = trim($product_name);
        $product_name = str_replace("_____", "#", $product_name);
        $product_name = str_replace("____", "+", $product_name);
        $product_name = str_replace("___", "&", $product_name);
        $product_name = str_replace("__", '"', $product_name);
        $product_name = str_replace("_", "'", $product_name);

        if (empty($product_name)) {
            $excel_upload_error = "Enter the Product Name";
        }

        $product_name_error = $valid->valid_product_name($product_name, "Product Name", "1", "30");


        if (!empty($product_name_error)) {
            if (!empty($excel_upload_error)) {
                $excel_upload_error = $excel_upload_error . " " . $product_name_error;
            } else {
                $excel_upload_error = $product_name_error;
            }
        }
    }


    if (isset($_REQUEST['unit_name'])) {
        $unit_name = $_REQUEST['unit_name'];
        $unit_name = trim($unit_name);
        $unit_name_error = $valid->valid_text($unit_name, "Unit Name", "1", "15");

        if (!empty($unit_name_error)) {
            if (!empty($excel_upload_error)) {
                $excel_upload_error = $excel_upload_error . "<br>" . $unit_name_error;
            } else {
                $excel_upload_error = $unit_name_error;
            }
        }
    }

    if (isset($_REQUEST['subunit_name'])) {
        $subunit_name = $_REQUEST['subunit_name'];
        $subunit_name = trim($subunit_name);
        $subunit_name_error = $valid->valid_text($subunit_name, "SubUnit Name", "0", "15");

        if (!empty($subunit_name_error)) {
            if (!empty($excel_upload_error)) {
                $excel_upload_error = $excel_upload_error . "<br>" . $subunit_name_error;
            } else {
                $excel_upload_error = $subunit_name_error;
            }
        }
    }
    if (!empty($subunit_name)) {
        $subunit_need = 1;
    }
    if (!empty($unit_name) && !empty($subunit_name)) {
        $lower_case_unit = strtolower($unit_name);
        $lower_case_subunit = strtolower($subunit_name);
        if ($lower_case_unit == $lower_case_subunit) {
            $same_unit_error = "Unit & Subunit must be different";
        }
        if (!empty($same_unit_error)) {
            if (!empty($excel_upload_error)) {
                $excel_upload_error = $excel_upload_error . "<br>" . $same_unit_error;
            } else {
                $excel_upload_error = $same_unit_error;
            }
        }
    }
    if (isset($_REQUEST['product_code'])) {
        $product_code = $_REQUEST['product_code'];
        $product_code = trim($product_code);
        $product_code_error = $valid->valid_text_number($product_code, "Product Code", "1", "5");

        if (!empty($product_code_error)) {
            if (!empty($excel_upload_error)) {
                $excel_upload_error = $excel_upload_error . "<br>" . $product_code_error;
            } else {
                $excel_upload_error = $product_code_error;
            }
        }
    }


    $result = "";

    if (empty($excel_upload_error)) {
        $product_unit_id = "";
        $product_category_id = "";
        $created_date_time = $GLOBALS['create_date_time_label'];
        $creator = $GLOBALS['creator'];
        $creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
        $null_value = $GLOBALS['null_value'];
        $bill_company_id = $GLOBALS['bill_company_id'];


        $product_subunit_id = "";
        if (!empty($unit_name)) {
            $lower_case_name = "";
            $lower_case_name = strtolower($unit_name);
            $lower_case_name = $obj->encode_decode('encrypt', $lower_case_name);
            $unit_name = $obj->encode_decode('encrypt', $unit_name);

            $prev_unit_id = "";
            if (!empty($lower_case_name)) {
                $prev_unit_id = "";
                $unit_error = "";
                if (!empty($lower_case_name)) {
                    $prev_unit_id = $obj->getTableColumnValue($GLOBALS['unit_table'], 'lower_case_name', $lower_case_name, 'unit_id');
                }
                if (empty($prev_unit_id)) {
                    $action = "";
                    $unit_insert_id = "";
                    if (!empty($unit_name)) {
                        $action = "New unit Created. Name - " . $obj->encode_decode('decrypt', $unit_name);
                    }

                    $null_value = $GLOBALS['null_value'];
                    $columns = array();
                    $values = array();
                    $columns = array('created_date_time', 'creator', 'creator_name', 'bill_company_id', 'unit_id', 'unit_name', 'lower_case_name', 'deleted');
                    $values = array("'" . $created_date_time . "'", "'" . $creator . "'", "'" . $creator_name . "'", "'" . $bill_company_id . "'", "'" . $null_value . "'", "'" . $unit_name . "'", "'" . $lower_case_name . "'", "'0'");
                    $unit_insert_id = $obj->InsertSQL($GLOBALS['unit_table'], $columns, $values, 'unit_id', '', $action);
                    if (preg_match("/^\d+$/", $unit_insert_id)) {
                        $unit_id = $obj->getTableColumnValue($GLOBALS['unit_table'], 'id', $unit_insert_id, 'unit_id');

                        $product_unit_id = $unit_id;
                    }
                } else {
                    $product_unit_id = $prev_unit_id;
                }
            }
        }

        if (!empty($subunit_name)) {
            $lower_case_name = "";
            $lower_case_name = strtolower($subunit_name);
            $lower_case_name = $obj->encode_decode('encrypt', $lower_case_name);
            $subunit_name = $obj->encode_decode('encrypt', $subunit_name);

            $prev_subunit_id = "";
            if (!empty($lower_case_name)) {
                $prev_subunit_id = "";
                $subunit_error = "";
                if (!empty($lower_case_name)) {
                    $prev_subunit_id = $obj->getTableColumnValue($GLOBALS['unit_table'], 'lower_case_name', $lower_case_name, 'unit_id');
                }
                if (empty($prev_subunit_id)) {
                    $action = "";
                    $subunit_insert_id = "";

                    if (!empty($subunit_name)) {
                        $action = "New subunit Created. Name - " . $obj->encode_decode('decrypt', $subunit_name);
                    }

                    $null_value = $GLOBALS['null_value'];
                    $columns = array();
                    $values = array();
                    $columns = array('created_date_time', 'creator', 'creator_name', 'bill_company_id', 'unit_id', 'unit_name', 'lower_case_name', 'deleted');
                    $values = array("'" . $created_date_time . "'", "'" . $creator . "'", "'" . $creator_name . "'", "'" . $bill_company_id . "'", "'" . $null_value . "'", "'" . $subunit_name . "'", "'" . $lower_case_name . "'", "'0'");
                    $subunit_insert_id = $obj->InsertSQL($GLOBALS['unit_table'], $columns, $values, 'unit_id', '', $action);
                    // echo $subunit_insert_id;	
                    if (preg_match("/^\d+$/", $subunit_insert_id)) {
                        $subunit_id = $obj->getTableColumnValue($GLOBALS['unit_table'], 'id', $subunit_insert_id, 'unit_id');

                        $product_subunit_id = $subunit_id;
                    }
                } else {
                    $product_subunit_id = $prev_subunit_id;
                }
            }
        }


        // if(!empty($product_code)) {
        //     $product_code = $obj->encode_decode('encrypt', $product_code);
        // }

        if (!empty($product_name)) {


            $lower_case_code = "";
            if (!empty($product_code)) {
                $lower_case_code = strtolower($product_code);
                $product_code = $obj->encode_decode('encrypt', $product_code);
                $lower_case_code = $obj->encode_decode('encrypt', $lower_case_code);
            } else {
                $product_code = $GLOBALS['null_value'];
            }

            $lower_case_name = strtolower($product_name);
            $product_name = $obj->encode_decode('encrypt', $product_name);
            $lower_case_name = $obj->encode_decode('encrypt', $lower_case_name);

            $prev_product_id = "";
            $product_error = "";
            if (!empty($lower_case_name)) {
                $prev_product_id = $obj->getTableColumnValue($GLOBALS['product_table'], 'lower_case_code', $lower_case_code, 'product_id');
                if (!empty($prev_product_id)) {
                    $product_error = "This name already exists";
                }
            }


            $product_name_code = "";
            if (!empty($product_code) && !empty($product_name)) {
                $product_name_code = $product_code . ' - ' . $product_name;
                $product_name_code = $obj->encode_decode('encrypt', $product_name_code);
            } else {
                $product_name_code = $GLOBALS['null_value'];
            }

            if (empty($prev_product_id)) {
                $action = "";
                if (!empty($product_name)) {
                    $action = "New Product Created. Name - " . $obj->encode_decode('decrypt', $product_name);
                }

                $product_insert_id = "";
                $null_value = $GLOBALS['null_value'];
                $columns = array('created_date_time', 'creator', 'creator_name', 'product_id', 'product_name', 'lower_case_name', 'unit_id', 'unit_name', 'subunit_need', 'subunit_id', 'subunit_name', 'bill_company_id', 'subunit_contains', 'opening_stock', 'godown_id', 'godown_name', 'unit_type', 'unit_type_name', 'brand_id', 'brand_name', 'negative_stock', 'per', 'per_type', 'sales_rate', 'stock_date', 'deleted');

                $values = array("'" . $created_date_time . "'", "'" . $creator . "'", "'" . $creator_name . "'", "'" . $null_value . "'", "'" . $product_name . "'", "'" . $lower_case_name . "'", "'" . $product_unit_id . "'", "'" . $unit_name . "'", "'" . $subunit_need . "'", "'" . $product_subunit_id . "'", "'" . $subunit_name . "'", "'" . $bill_company_id . "'", "'" . $null_value . "'", "'" . $null_value . "'", "'" . $null_value . "'", "'" . $null_value . "'", "'" . $null_value . "'", "'" . $null_value . "'", "'" . $null_value . "'", "'" . $null_value . "'", "'0'", "'" . $per . "'", "'" . $per_type . "'", "'" . $sales_rate . "'", "'" . date("y-m-d") . "'", "'0'");
                $product_insert_id = $obj->InsertSQL($GLOBALS['product_table'], $columns, $values, 'product_id', '', $action);
                // print_r($values);
                // echo $product_insert_id;

                if (preg_match("/^\d+$/", $product_insert_id)) {
                    // $product_id = $obj->getTableColumnValue($GLOBALS['product_table'], 'id', $product_insert_id, 'product_id');
                    // $result = array('number' => '1', 'msg' => 'Product Successfully Created');
                    $result = 1;
                } else {
                    $result = array('number' => '2', 'msg' => $product_insert_id);
                }
            } else {
                if ($excel_upload_type == "2") {
                    $getUniqueID = "";
                    $getUniqueID = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $prev_product_id, 'id');
                    if (preg_match("/^\d+$/", $getUniqueID)) {
                        $action = "";

                        if (!empty($product_name)) {
                            $action = "Product Updated. Name - " . $product_name;
                        }

                        $columns = array();
                        $values = array();
                        $columns = array('creator_name', 'product_name', 'lower_case_name', 'unit_id', 'unit_name', 'subunit_need', 'subunit_id', 'subunit_name', 'subunit_contains', 'opening_stock', 'godown_id', 'godown_name', 'brand_id', 'brand_name', 'unit_type', 'unit_type_name', 'per', 'per_type', 'stock_date', 'sales_rate');
                        $values = array("'" . $creator_name . "'", "'" . $product_name . "'", "'" . $lower_case_name . "'", "'" . $product_unit_id . "'", "'" . $unit_name . "'", "'" . $subunit_need . "'", "'" . $product_subunit_id . "'", "'" . $subunit_name . "'", "'" . $null_value . "'", "'" . $null_value . "'", "'" . $null_value . "'", "'" . $null_value . "'", "'" . $null_value . "'", "'" . $null_value . "'", "'" . $null_value . "'", "'" . $null_value . "'", "'" . $per . "'", "'" . $per_type . "'", "'" . date("y-m-d") . "'", "'" . $sales_rate . "'");

                        $product_update_id = $obj->UpdateSQL($GLOBALS['product_table'], $getUniqueID, $columns, $values, $action);
                        $result = $product_update_id;
                    } else {
                        $result = $product_error;
                    }
                } else {
                    echo $excel_upload_error = $product_error;
                }
            }
        }
        echo $result;
        exit;
    } else {
        echo $excel_upload_error;
    }
}

?>