<?php
include("include.php");
$loginner_id = "";
if (isset($_SESSION[$GLOBALS['site_name_user_prefix'] . '_user_id']) && !empty($_SESSION[$GLOBALS['site_name_user_prefix'] . '_user_id'])) {
    if (!empty($GLOBALS['user_type']) && $GLOBALS['user_type'] != $GLOBALS['admin_user_type']) {
        $loginner_id = $_SESSION[$GLOBALS['site_name_user_prefix'] . '_user_id'];
        $permission_module = $GLOBALS['product_module'];
    }
}
if (isset($_REQUEST['show_product_id'])) {
    $show_product_id = $_REQUEST['show_product_id'];
    $show_product_id = trim($show_product_id);

    $add_custom_product = "";
    if (isset($_REQUEST['add_custom_product'])) {
        $add_custom_product = $_REQUEST['add_custom_product'];
        $add_custom_product = trim($add_custom_product);
    }

    $to_date = date('Y-m-d');
    $entry_date = date('Y-m-d');
    $negative_stock = 0;
    $product_name = "";
    $unit_id = "";
    $subunit_id = "";
    $subunit_contains = "";
    $sales_rate = "";
    $per = "";
    $per_type = "";
    $opening_stock = array();
    $godown_ids = array();
    $subunit_need = 1;
    $godown_names = array();
    $brand_ids = array();
    $brand_names = array();
    $product_row_index = 0;
    $stock_date = array();
    $per_type = "";
    $unit_type = array();
    $unit_type_name = array();
    if (!empty($show_product_id)) {
        $product_list = array();
        $product_list = $obj->getTableRecords($GLOBALS['product_table'], 'product_id', $show_product_id, '');
        if (!empty($product_list)) {
            foreach ($product_list as $data) {
                if (!empty($data['product_name']) && $data['product_name'] != $GLOBALS['null_value']) {
                    $product_name = $obj->encode_decode('decrypt', $data['product_name']);
                }
                if (!empty($data['unit_id']) && $data['unit_id'] != $GLOBALS['null_value']) {
                    $unit_id = $data['unit_id'];
                }
                if ($data['subunit_need'] != $GLOBALS['null_value']) {
                    $subunit_need = $data['subunit_need'];
                }
                if (!empty($data['subunit_id']) && $data['subunit_id'] != $GLOBALS['null_value']) {
                    $subunit_id = $data['subunit_id'];
                }
                if (!empty($data['subunit_contains']) && $data['subunit_contains'] != $GLOBALS['null_value']) {
                    $subunit_contains = explode(",", $data['subunit_contains']);
                }
                if (!empty($data['sales_rate']) && $data['sales_rate'] != $GLOBALS['null_value']) {
                    $sales_rate = $data['sales_rate'];
                }
                if (!empty($data['per']) && $data['per'] != $GLOBALS['null_value']) {
                    $per = $data['per'];
                }
                if (!empty($data['per_type']) && $data['per_type'] != $GLOBALS['null_value']) {
                    $per_type = $data['per_type'];
                }
                if (!empty($data['opening_stock']) && $data['opening_stock'] != $GLOBALS['null_value']) {
                    $opening_stock = explode(",", $data['opening_stock']);
                }
                if (!empty($data['stock_date']) && $data['stock_date'] != $GLOBALS['null_value']) {
                    $stock_date = explode(",", $data['stock_date']);
                }
                if (!empty($data['unit_type']) && $data['unit_type'] != $GLOBALS['null_value']) {
                    $unit_type = explode(",", $data['unit_type']);
                }
                if (!empty($data['unit_type_name']) && $data['unit_type_name'] != $GLOBALS['null_value']) {
                    $unit_type_name = explode(",", $data['unit_type_name']);
                }
                if (!empty($data['godown_id']) && $data['godown_id'] != $GLOBALS['null_value']) {
                    $godown_ids = explode(",", $data['godown_id']);
                    $product_row_index = count($godown_ids);
                }
                if (!empty($data['godown_name']) && $data['godown_name'] != $GLOBALS['null_value']) {
                    $godown_names = explode(",", $data['godown_name']);
                }

                if (!empty($data['brand_id']) && $data['brand_id'] != $GLOBALS['null_value']) {
                    $brand_ids = explode(",", $data['brand_id']);
                }
                if (!empty($data['brand_name']) && $data['brand_name'] != $GLOBALS['null_value']) {
                    $brand_names = explode(",", $data['brand_name']);
                }
                if (!empty($data['negative_stock'])) {
                    $negative_stock = $data['negative_stock'];
                }

            }
        }
    }

    $unit_list = array();
    $unit_list = $obj->getTableRecords($GLOBALS['unit_table'], '', '', '');
    $godown_list = array();
    $godown_list = $obj->getTableRecords($GLOBALS['godown_table'], '', '', '');
    $brand_list = array();
    $brand_list = $obj->getTableRecords($GLOBALS['brand_table'], '', '', '');

    $linked_count = 0;
    if (!empty($show_product_id)) {
        // $linked_count = $obj->GetProductLinkedCount($show_product_id);
    }
    $opening_stock_count = 0;
    // if(!empty($show_product_id)) {
    //     $opening_stock_count = $obj->getOpeningStockCount($show_product_id);
    // }
    ?>
    <form class="poppins pd-20 redirection_form" name="product_form" method="POST">
        <?php if (empty($add_custom_product)) { ?>
            <div class="card-header">
                <div class="row p-2">
                    <div class="col-lg-8 col-md-8 col-8 align-self-center">
                        <?php if (empty($show_product_id)) { ?>
                            <div class="h5">Add Product</div>
                        <?php } else if (!empty($show_product_id)) { ?>
                                <div class="h5">Edit Product</div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-4 col-md-4 col-4">
                        <button class="btn btn-dark float-end" style="font-size:11px;" type="button"
                            onclick="window.open('product.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row p-3">
            <input type="hidden" name="edit_id" value="<?php if (!empty($show_product_id)) {
                echo $show_product_id;
            } ?>">

            <div class="col-lg-3 col-md-4 col-12 py-2">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <input type="text" id="product_name" name="product_name" value="<?php if (!empty($product_name)) {
                            echo $product_name;
                        } ?>" class="form-control shadow-none" onkeyup="Javascript:InputBoxColor(this,'text');">
                        <label>Product Name <span class="text-danger">*</span></label>
                    </div>
                    <div class="new_smallfnt">Text only (Characters upto 25)</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-12 py-2">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <select name="unit_id" class="select2 select2-danger" data-dropdown-css-class="select2-danger"
                            style="width: 100%;" onchange="AddUnitForStock()" <?php if (!empty($linked_count) || !empty($opening_stock_count)) { ?>disabled<?php } ?>>
                            <option value="">Select Unit</option>
                            <?php
                            if (!empty($unit_list)) {
                                foreach ($unit_list as $data) {
                                    if (!empty($data['unit_id'])) {
                                        ?>
                                        <option value="<?php echo $data['unit_id']; ?>" <?php if (!empty($unit_id) && $data['unit_id'] == $unit_id) { ?>selected<?php } ?>>
                                            <?php
                                            if (!empty($data['unit_name'])) {
                                                $data['unit_name'] = $obj->encode_decode('decrypt', $data['unit_name']);
                                                echo $data['unit_name'];
                                            }
                                            ?>

                                        </option>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                        <label>Unit <span class="text-danger">*</span></label>
                    </div>
                    <div class="new_smallfnt">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="FormSelectDefault" class="form-label text-muted">Need Sub Unit YES / NO </label>
                            <input name="subunit_need" class="form-check-input code-switcher" type="checkbox"
                                id="subunit_need" onchange="Javascript:subunitNeed();AddUnitForStock();per_type_change();"
                                value="<?php if ($subunit_need == '1') {
                                    echo '1';
                                } else {
                                    echo '0';
                                } ?>" <?php if ($subunit_need == '1') { ?>checked="checked" <?php } ?>     <?php if (!empty($linked_count) || !empty($opening_stock_count)) { ?>disabled<?php } ?>>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="unit_id" value="<?php if (!empty($unit_id)) {
                echo $unit_id;
            } ?>" <?php if (empty($linked_count) && empty($opening_stock_count)) { ?>disabled<?php } ?>>


            <!-- <input type="hidden" name="subunit_need" id="subunit_input" value="<?php if ($subunit_need == '1') {
                echo '1';
            } else {
                echo '0';
            } ?>" <?php if (empty($linked_count) && empty($opening_stock_count)) { ?>disabled<?php } ?>> -->

            <div id="subunit_list" onchange="AddUnitForStock()"
                class="col-lg-3 col-md-4 col-12 py-2 <?php if (empty($subunit_need)) { ?>d-none<?php } ?>">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <select name="subunit_id" class="select2 select2-danger" data-dropdown-css-class="select2-danger"
                            style="width: 100%;" <?php if (!empty($linked_count) || !empty($opening_stock_count)) { ?>disabled<?php } ?>>
                            <option value="">Select Subunit</option>
                            <?php
                            if (!empty($unit_list)) {
                                foreach ($unit_list as $data) {
                                    if (!empty($data['unit_id'])) {
                                        ?>
                                        <option value="<?php echo $data['unit_id']; ?>" <?php if (!empty($subunit_id) && $data['unit_id'] == $subunit_id) { ?>selected<?php } ?>>
                                            <?php
                                            if (!empty($data['unit_name'])) {
                                                $data['unit_name'] = $obj->encode_decode('decrypt', $data['unit_name']);
                                                echo $data['unit_name'];
                                            }
                                            ?>

                                        </option>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                        <label>Subunit <span class="text-danger">*</span></label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="subunit_id" value="<?php if (!empty($subunit_id)) {
                echo $subunit_id;
            } ?>" <?php if (empty($linked_count) && empty($opening_stock_count)) { ?>disabled<?php } ?>>

            <div class="col-lg-3 col-md-4 col-12 py-2 " id="sales_rate_div">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <input type="text" id="sales_rate" name="sales_rate" value="<?php if (!empty($sales_rate)) {
                            echo $sales_rate;
                        } ?>" class="form-control shadow-none"
                            onfocus="Javascript:KeyboardControls(this,'number',8,'');"
                            onkeyup="Javascript:InputBoxColor(this,'text');CalProductAmount();">
                        <label>Sales Rate</label>
                    </div>

                    <input type="text" name="rate_per_case">
                    <input type="text" name="rate_per_piece">
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-12 py-2" id="per_div">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <div class="input-group">
                            <input type="text" id="per" name="per" value="<?php if (!empty($per)) {
                                echo $per;
                            } ?>" class="form-control shadow-none"
                                onfocus="Javascript:KeyboardControls(this,'number',7,'');"
                                onkeyup="Javascript:InputBoxColor(this,'text');CalProductAmount();">
                            <label>Per</label>
                            <div class="input-group-append" style="width:50%!important;">
                                <select name="per_type" class="select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" style="width: 100%;"
                                    onchange="Javascript:CalProductAmount();">
                                    <option value="1" <?php if ($per_type == '1') { ?>selected<?php } ?>>Unit</option>
                                    <?php if ($subunit_need == '1') { ?>
                                        <option value="2" <?php if ($per_type == '2') { ?>selected<?php } ?>>Subunit</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-4 col-12 py-2" id="negative_stock">
                <div class="form-group">
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <span class="text-bold" id="rate_per_unit"></span><br>
                            <span class="text-bold" id="rate_per_subunit"></span>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-3 col-md-4 col-12 py-2" id="negative_stock">
                <div class="form-group">
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="FormSelectDefault" class="form-label text-muted" style="font-size: 12px;">Allow
                                Negative Stock
                                YES / NO
                            </label>
                            <input name="negative_stock" class="form-check-input code-switcher" type="checkbox"
                                id="negative_stock_button"
                                onChange="Javascript:ShowNegativeStockDetails(this);CalProductAmount();" value="<?php if ($negative_stock == '1') {
                                    echo '1';
                                } else {
                                    echo '0';
                                } ?>" <?php if ($negative_stock == '1') { ?>checked="checked" <?php } ?>     <?php if (!empty($linked_count) || !empty($opening_stock_count)) { ?>disabled<?php } ?>>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="negative_stock" id="negative_stock_input" value="<?php if ($negative_stock == '1') {
                echo '1';
            } else {
                echo '0';
            } ?>" <?php if (empty($linked_count) && empty($opening_stock_count)) { ?>disabled<?php } ?>>
            <?php /* if(empty($linked_count) && empty($add_custom_product)) {  */ ?>
            <div class="row justify-content-center mx-0 py-2">
                <div class="col-lg-2 col-md-4 col-12 py-2 " id="godown_div">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" name="selected_godown_id"
                                data-dropdown-css-class="select2-danger" style="width: 100%!important;">
                                <option value="">Select</option>
                                <?php
                                if (!empty($godown_list)) {
                                    foreach ($godown_list as $data) {
                                        if (!empty($data['godown_id']) && $data['godown_id'] != $GLOBALS['null_value']) {
                                            ?>
                                            <option value="<?php echo $data['godown_id']; ?>" <?php if (!empty($godown_id) && $godown_id == $data['godown_id']) { ?>selected<?php } ?>>
                                                <?php
                                                if (!empty($data['godown_name']) && $data['godown_name'] != $GLOBALS['null_value']) {
                                                    echo $obj->encode_decode('decrypt', $data['godown_name']);
                                                }
                                                ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                            <label>Godown</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-12 py-2" id="brand_div">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" name="selected_brand_id"
                                data-dropdown-css-class="select2-danger" style="width: 100%!important;">
                                <option value="">Select</option>
                                <?php
                                if (!empty($brand_list)) {
                                    foreach ($brand_list as $data) {
                                        if (!empty($data['brand_id']) && $data['brand_id'] != $GLOBALS['null_value']) {
                                            ?>
                                            <option value="<?php echo $data['brand_id']; ?>" <?php if (!empty($brand_id) && $brand_id == $data['brand_id']) { ?>selected<?php } ?>>
                                                <?php
                                                if (!empty($data['brand_name']) && $data['brand_name'] != $GLOBALS['null_value']) {
                                                    echo $obj->encode_decode('decrypt', $data['brand_name']);
                                                }
                                                ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                            <label>Brand</label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-12 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="date" name="selected_stock_date" class="form-control shadow-none" value="<?php if (!empty($entry_date)) {
                                echo $entry_date;
                            } ?>" max="<?php if (!empty($to_date)) {
                                 echo $to_date;
                             } ?>">
                            <label>Stock Date</label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-1 col-md-3 col-12 py-2 px-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" name="selected_quantity" class="form-control shadow-none"
                                onfocus="Javascript:KeyboardControls(this,'number',8,'');" onkeyup="FindTotalQty()">
                            <label>QTY</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-12 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" name="selected_unit_type"
                                data-dropdown-css-class="select2-danger" onchange="FindTotalQty()"
                                style="width: 100%!important;">
                                <option value="1">Unit</option>
                                <?php if ($subunit_need == '1') { ?>
                                    <option value="2">Subunit</option>
                                <?php } ?>
                            </select>
                            <label>Unit Type</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-md-3 col-12 py-2 px-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" name="selected_content" class="form-control shadow-none"
                                onfocus="Javascript:KeyboardControls(this,'number',8,'');" onkeyup="FindTotalQty()">
                            <label>Content</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-md-4 col-6 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="number" name="selected_total_qty" class="form-control shadow-none"
                                onfocus="Javascript:KeyboardControls(this,'number',8,'');" onkeyup="FindTotalQty()">
                            <label>Total QTY</label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-1 col-md-2 col-6 px-lg-1  py-2">
                    <button class="btn btn-danger py-2" onclick="Javascript:AddProductStock();"
                        style="font-size:12px; width:100%;" type="button"> Add </button>
                </div>
            </div>
            <?php /* } */ ?>
            <?php /* if(empty($linked_count) || empty($show_product_id)  || !empty($godown_ids) || !empty($brand_ids)) { */ ?>
            <div class="row py-2 mx-0">
                <div class="col-10 mx-auto">
                    <div class="table-responsive text-center">
                        <input type="hidden" name="godown_count" value="<?php if (!empty($product_row_index)) {
                            echo $product_row_index;
                        } else {
                            echo "0";
                        } ?>">
                        <table class="table nowrap cursor smallfnt w-100 border product_stock_table">
                            <thead class="bg-dark smallfnt">
                                <tr style="white-space:pre;">
                                    <th style="width:50px;">S.No</th>
                                    <th style="width:100px;">Godown Name</th>
                                    <th style="width:100px;">Brand Name</th>
                                    <th style="width:100px;">Stock Date</th>
                                    <th style="width:100px;">Opening Stock</th>
                                    <th style="width:100px;">Unit Type</th>
                                    <th style="width:100px;">Content</th>
                                    <th style="width:100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($godown_ids)) {
                                    for ($i = 0; $i < count($godown_ids); $i++) {
                                        ?>
                                        <tr class="product_row" id="product_row<?php echo $product_row_index; ?>">
                                            <th class="sno text-center px-2 py-2">
                                                <?php if (!empty($product_row_index)) {
                                                    echo $product_row_index;
                                                } ?>
                                            </th>
                                            <th class="text-center px-2 py-2">
                                                <?php
                                                if (!empty($godown_names[$i]) && $godown_names[$i] != $GLOBALS['null_value']) {
                                                    echo $obj->encode_decode('decrypt', $godown_names[$i]);
                                                }
                                                ?>
                                                <input type="hidden" name="godown_id[]" value="<?php if (!empty($godown_ids[$i])) {
                                                    echo $godown_ids[$i];
                                                } ?>">

                                            </th>
                                            <th class="text-center px-2 py-2">
                                                <?php
                                                if (!empty($brand_names[$i]) && $brand_names[$i] != $GLOBALS['null_value']) {
                                                    echo $obj->encode_decode('decrypt', $brand_names[$i]);
                                                }
                                                ?>
                                                <input type="hidden" name="brand_id[]" value="<?php if (!empty($brand_ids[$i])) {
                                                    echo $brand_ids[$i];
                                                } ?>">
                                            </th>

                                            <th class="text-center px-2 py-2">
                                                <?php
                                                if (!empty($stock_date[$i])) {
                                                    echo date('d-M-Y', strtotime($stock_date[$i]));
                                                }
                                                ?>
                                                <input type="hidden" name="stock_date[]" value="<?php if (!empty($stock_date[$i])) {
                                                    echo $stock_date[$i];
                                                } ?>">
                                            </th>

                                            <th class="text-center px-2 py-2">
                                                <?php if (!empty($opening_stock[$i])) {
                                                    echo $opening_stock[$i];
                                                } ?>
                                                <input type="hidden" name="opening_stock[]" class="form-control shadow-none" value="<?php if (!empty($opening_stock[$i])) {
                                                    echo $opening_stock[$i];
                                                } ?>">
                                            </th>
                                            <th class="text-center px-2 py-2">
                                                <?php
                                                if (!empty($unit_type_name[$i])) {
                                                    echo $unit_type_name[$i];
                                                }
                                                ?>
                                                <input type="hidden" name="unit_type[]" value="<?php if (!empty($unit_type[$i])) {
                                                    echo $unit_type[$i];
                                                } ?>">
                                            </th>
                                            <th class="text-center px-2 py-2">

                                                <?php if (!empty($subunit_contains[$i])) {
                                                    echo $subunit_contains[$i];
                                                } ?>
                                                <input type="hidden" name="content[]" value="<?php if (!empty($subunit_contains[$i])) {
                                                    echo $subunit_contains[$i];
                                                } ?>">
                                            </th>
                                            <th class="text-center text-danger px-2 py-2">
                                                <?php if (empty($linked_count)) { ?>
                                                    <button class="btn btn-danger" type="button" onclick="Javascript:DeleteRow('<?php if (!empty($product_row_index)) {
                                                        echo $product_row_index;
                                                    } ?>', 'product_row');"><i class="fa fa-trash"></i></button>
                                                <?php } else { ?>
                                                    Can't Delete
                                                <?php } ?>
                                            </th>
                                        </tr>
                                        <?php
                                        $product_row_index--;
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php /* } */ ?>
            <div class="col-md-12 pt-3 text-center">
                <button class="btn btn-danger submit_button" type="button"
                    onClick="Javascript:SaveModalContent(event,'product_form', 'product_changes.php', 'product.php');">
                    Submit
                </button>
            </div>
        </div>
        <script>
            jQuery(document).ready(function () {
                AddUnitForStock();
                <?php if (empty($add_custom_product)) { ?>
                    subunitNeed();
                    CalProductAmount();
                    per_type_change();
                    // ShowStockDetails();
                <?php } ?>
            });
        </script>
        <script>
            <?php if (isset($add_custom_product) && $add_custom_product == '1') { ?>
                jQuery('#CustomProductModal').on('shown.bs.modal', function () {
                    jQuery('form[name="product_form"]').find('select').select2({
                        dropdownParent: jQuery('#CustomProductModal')
                    });
                });
            <?php } ?>
        </script>
        <script src="include/select2/js/select2.min.js"></script>
        <script src="include/select2/js/select.js"></script>
    </form>
    <?php
}
if (isset($_POST['edit_id'])) {
    $product_name = "";
    $product_name_error = "";
    $unit_id = "";
    $unit_id_error = "";
    $subunit_id = "";
    $subunit_id_error = "";
    $subunit_contains = "";
    $subunit_contains_error = "";
    $sales_rate = "";
    $sales_rate_error = "";
    $per = "";
    $per_error = "";
    $per_type = "";
    $per_type = "";
    $opening_stock = array();
    $godown_ids = array();
    $godown_names = array();
    $brand_ids = array();
    $brand_names = array();
    $subunit_need = 0;
    $godown_error = "";
    $brand_error = "";
    $stock_date = array();
    $per_type = "";
    $unit_type = array();
    $unit_type_name = array();
    $negative_stock = 0;
    $rate_per_piece = 0;
    $rate_per_case = 0;
    $contents = "";
    $valid_product = "";
    $form_name = "product_form";
    $edit_id = "";
    $stock_unique_ids = array();
    if (isset($_POST['edit_id'])) {
        $edit_id = $_POST['edit_id'];
        $edit_id = trim($edit_id);
    }

    if (isset($_POST['product_name'])) {
        $product_name = $_POST['product_name'];
        $product_name = trim($product_name);
        $product_name_error = $valid->valid_product_name($product_name, 'Product Name', '1', '50');
        if (!empty($product_name_error)) {
            if (!empty($valid_product)) {
                $valid_product = $valid_product . " " . $valid->error_display($form_name, 'product_name', $product_name_error, 'text');
            } else {
                $valid_product = $valid->error_display($form_name, 'product_name', $product_name_error, 'text');
            }
        }
    }
    if (isset($_POST['unit_id'])) {
        $unit_id = $_POST['unit_id'];
        $unit_id = trim($unit_id);
        $unit_id_error = $valid->common_validation($unit_id, 'Unit', 'select');
        if (empty($unit_id_error)) {
            $unit_unique_id = "";
            $unit_unique_id = $obj->getTableColumnValue($GLOBALS['unit_table'], 'unit_id', $unit_id, 'id');
            if (!preg_match("/^\d+$/", $unit_unique_id)) {
                $unit_id_error = "Invalid Unit";
            }
        }
        if (!empty($unit_id_error)) {
            if (!empty($valid_product)) {
                $valid_product = $valid_product . " " . $valid->error_display($form_name, 'unit_id', $unit_id_error, 'select');
            } else {
                $valid_product = $valid->error_display($form_name, 'unit_id', $unit_id_error, 'select');
            }
        }
    }

    if (isset($_POST['subunit_need'])) {
        $subunit_need = $_POST['subunit_need'];
    }
    if (isset($_POST['negative_stock'])) {
        $negative_stock = $_POST['negative_stock'];
    }
    if (isset($_POST['rate_per_case'])) {
        $rate_per_case = $_POST['rate_per_case'];
    }
    if (isset($_POST['rate_per_piece'])) {
        $rate_per_piece = $_POST['rate_per_piece'];
    }
    if ($subunit_need == '1') {
        if (isset($_POST['subunit_id'])) {
            $subunit_id = $_POST['subunit_id'];
            $subunit_id = trim($subunit_id);
            $subunit_id_error = $valid->common_validation($subunit_id, 'Subunit', 'select');
            if (empty($subunit_id_error)) {
                $unit_unique_id = "";
                $unit_unique_id = $obj->getTableColumnValue($GLOBALS['unit_table'], 'unit_id', $subunit_id, 'id');
                if (!preg_match("/^\d+$/", $unit_unique_id)) {
                    $subunit_id_error = "Invalid Subunit";
                }
            }
            if (!empty($subunit_id_error)) {
                if (!empty($valid_product)) {
                    $valid_product = $valid_product . " " . $valid->error_display($form_name, 'subunit_id', $subunit_id_error, 'select');
                } else {
                    $valid_product = $valid->error_display($form_name, 'subunit_id', $subunit_id_error, 'select');
                }
            }
        }
        if (isset($_POST['subunit_contains'])) {
            $subunit_contains = $_POST['subunit_contains'];
            $subunit_contains = trim($subunit_contains);
            $subunit_contains_error = $valid->valid_price($subunit_contains, 'Subunit Contains', 1, '99999');
            if (empty($subunit_contains_error) && $subunit_contains > 99999) {
                $subunit_contains_error = "Only 99999 is allowed";
            }
            if (!empty($subunit_contains_error)) {
                if (!empty($valid_product)) {
                    $valid_product = $valid_product . " " . $valid->error_display($form_name, 'subunit_contains', $subunit_contains_error, 'text');
                } else {
                    $valid_product = $valid->error_display($form_name, 'subunit_contains', $subunit_contains_error, 'text');
                }
            }
        }
    }

    if (isset($_POST['sales_rate'])) {
        $sales_rate = $_POST['sales_rate'];
        $sales_rate = trim($sales_rate);
        $sales_rate_error = $valid->valid_price($sales_rate, 'Sales Rate', 0, '99999');
        if (empty($sales_rate_error) && !empty($sales_rate) && $sales_rate > 99999) {
            $sales_rate_error = "Only 99999 is allowed";
        }
    }
    if (isset($_POST['per'])) {
        $per = $_POST['per'];
        $per = trim($per);
        $per_error = $valid->valid_price($per, 'Per Unit', 1, '99999');
        if (empty($per_error) && !empty($per) && $per > 99999) {
            $per_error = "Only 99999 is allowed";
        }
        if (isset($_POST['per_type'])) {
            $per_type = $_POST['per_type'];
            $per_type = trim($per_type);
        }
    }
    if (empty($per) && !empty($sales_rate) && empty($per_error)) {
        $per_error = "Enter per value (Sales Rate is given)";
    }
    if (!empty($per) && empty($sales_rate) && empty($sales_rate_error)) {
        $sales_rate_error = "Enter Sales Rate (Per is given)";
    }
    if (!empty($sales_rate_error)) {
        if (!empty($valid_product)) {
            $valid_product = $valid_product . " " . $valid->error_display($form_name, 'sales_rate', $sales_rate_error, 'text');
        } else {
            $valid_product = $valid->error_display($form_name, 'sales_rate', $sales_rate_error, 'text');
        }
    }
    if (!empty($per_error)) {
        if (!empty($valid_product)) {
            $valid_product = $valid_product . " " . $valid->error_display($form_name, 'per', $per_error, 'text');
        } else {
            $valid_product = $valid->error_display($form_name, 'per', $per_error, 'text');
        }
    }

    if (isset($_POST['godown_id'])) {
        $godown_ids = $_POST['godown_id'];
    }
    if (isset($_POST['brand_id'])) {
        $brand_ids = $_POST['brand_id'];
    }
    if (isset($_POST['content'])) {
        $contents = $_POST['content'];
    }
    if (isset($_POST['unit_type'])) {
        $unit_type = $_POST['unit_type'];
    }
    if (isset($_POST['stock_date'])) {
        $stock_date = $_POST['stock_date'];
    }
    if (isset($_POST['opening_stock'])) {
        $opening_stock = $_POST['opening_stock'];
    }
    if (!empty($godown_ids) && empty($godown_error)) {
        for ($i = 0; $i < count($godown_ids); $i++) {
            $godown_ids[$i] = trim($godown_ids[$i]);
            if (!empty($godown_ids[$i])) {
                $godown_name = "";
                $str_unit_id = "";
                $godown_name = $obj->getTableColumnValue($GLOBALS['godown_table'], 'godown_id', $godown_ids[$i], 'godown_name');
                $godown_names[$i] = $godown_name;
                $brand_ids[$i] = trim($brand_ids[$i]);
                if (!empty($brand_ids[$i])) {
                    $brand_name = "";
                    $brand_name = $obj->getTableColumnValue($GLOBALS['brand_table'], 'brand_id', $brand_ids[$i], 'brand_name');
                    $brand_names[$i] = $brand_name;

                    $unit_type[$i] = trim($unit_type[$i]);
                    if (!empty($unit_type[$i])) {
                        if ($unit_type[$i] == '1') {
                            $unit_type_name[$i] = "Unit";
                            $str_unit_id = $unit_id;
                        } else if ($unit_type[$i] == '2') {
                            $unit_type_name[$i] = "Subunit";
                            $str_unit_id = $subunit_id;
                        } else {
                            $unit_type_name[$i] = "";
                        }
                        if (!empty($edit_id)) {
                            if (!empty($godown_ids[$i])) {
                                $stock_unique_ids[$i] = $obj->getStockUniqueID($edit_id, $godown_ids[$i], $brand_ids[$i], $edit_id, $str_unit_id, '');
                            }
                        }
                        $stock_date[$i] = trim($stock_date[$i]);
                        if (!empty($stock_date[$i])) {
                            $opening_stock[$i] = trim($opening_stock[$i]);
                            if (!empty($opening_stock[$i])) {
                                if (!preg_match("/^[0-9]+(\\.[0-9]+)?$/", $opening_stock[$i])) {
                                    $godown_error = "Invalid Opening Stock in Godown - " . ($obj->encode_decode('decrypt', $godown_name));
                                }
                            } else {
                                $godown_error = "Empty Opening Stock in Godown - " . ($obj->encode_decode('decrypt', $godown_name));
                            }
                        } else {
                            $godown_error = "Stock Date is empty in Godown - " . ($obj->encode_decode('decrypt', $godown_name));
                        }
                    } else {
                        $godown_error = "Select Unit Type in Godown - " . ($obj->encode_decode('decrypt', $godown_name));
                    }
                } else {
                    $godown_error = "Brand is empty";
                }
            } else {
                $godown_error = "Godown is empty";
            }
        }
    }

    if (!empty($unit_id) && !empty($subunit_id) && $unit_id == $subunit_id && empty($godown_error)) {
        $godown_error = "Unit and Subunit must be different";
    }


    if (!empty($edit_id) && empty($godown_error)) {
        $prev_stock_list = array();
        $prev_stock_list = $obj->PrevStockList($edit_id);
        if (!empty($prev_stock_list)) {
            foreach ($prev_stock_list as $data) {
                $stock_id = "";
                $stock_godown_id = "";
                $stock_brand_id = "";
                $stock_product_id = "";
                $stock_type = "";
                $inward_unit = 0;
                $inward_subunit = 0;
                $outward_unit = 0;
                $outward_subunit = 0;
                $stock_case_contains = 0;
                if (!empty($data['id']) && $data['id'] != $GLOBALS['null_value']) {
                    $stock_id = $data['id'];
                }
                if (!empty($data['godown_id']) && $data['godown_id'] != $GLOBALS['null_value']) {
                    $stock_godown_id = $data['godown_id'];
                }
                if (!empty($data['case_contains']) && $data['case_contains'] != $GLOBALS['null_value']) {
                    $stock_case_contains = $data['case_contains'];
                }
                if (!empty($data['brand_id']) && $data['brand_id'] != $GLOBALS['null_value']) {
                    $stock_brand_id = $data['brand_id'];
                }
                if (!empty($data['product_id']) && $data['product_id'] != $GLOBALS['null_value']) {
                    $stock_product_id = $data['product_id'];
                }
                if (!empty($data['inward_unit']) && $data['inward_unit'] != $GLOBALS['null_value']) {
                    $inward_unit = $data['inward_unit'];
                }
                if (!empty($data['inward_subunit']) && $data['inward_subunit'] != $GLOBALS['null_value']) {
                    $inward_subunit = $data['inward_subunit'];
                }
                $current_stock_unit = 0;
                $current_stock_subunit = 0;
                $stock_table_unique_id = "";
                $stock_unique_table = "";
                $stock_unique_table = $GLOBALS['stock_by_godown_table'];
                $current_stock_unit = $obj->getCurrentStockUnit($GLOBALS['stock_by_godown_table'], $stock_godown_id, $stock_brand_id, $stock_product_id, $stock_case_contains);
                $current_stock_subunit = $obj->getCurrentStockSubunit($GLOBALS['stock_by_godown_table'], $stock_godown_id, $stock_brand_id, $stock_product_id, $stock_case_contains);
                $stock_table_unique_id = $obj->getStockTablesUniqueID($GLOBALS['stock_by_godown_table'], $stock_godown_id, $stock_brand_id, $stock_product_id, $stock_case_contains);

                if (!empty($current_stock_unit) && $current_stock_unit != $GLOBALS['null_value']) {
                    $current_stock_unit = $current_stock_unit - $inward_unit;
                } else {
                    $current_stock_unit = 0;
                }
                if (!empty($current_stock_subunit) && $current_stock_subunit != $GLOBALS['null_value']) {
                    $current_stock_subunit = $current_stock_subunit - $inward_subunit;
                } else {
                    $current_stock_subunit = $GLOBALS['null_value'];
                }

                if (!in_array($stock_id, $stock_unique_ids)) {
                    $columns = array();
                    $values = array();
                    $columns = array('deleted');
                    $values = array('"1"');
                    $stock_update_id = $obj->UpdateSQL($GLOBALS['stock_table'], $stock_id, $columns, $values, '');

                    if (preg_match("/^\d+$/", $stock_update_id)) {
                        if (preg_match("/^\d+$/", $stock_table_unique_id)) {
                            $columns = array();
                            $values = array();
                            $columns = array('current_stock_unit', 'current_stock_subunit');
                            $values = array("'" . $current_stock_unit . "'", "'" . $current_stock_subunit . "'");
                            $stock_table_update_id = $obj->UpdateSQL($stock_unique_table, $stock_table_unique_id, $columns, $values, '');
                        }
                    }
                }
            }
        }
    }

    $result = "";
    if (empty($valid_product) && empty($godown_error)) {
        $check_user_id_ip_address = "";
        $check_user_id_ip_address = $obj->check_user_id_ip_address();
        if (preg_match("/^\d+$/", $check_user_id_ip_address)) {
            $lower_case_name = "";
            $unit_name = "";
            $subunit_name = "";
            if (!empty($product_name)) {
                $lower_case_name = strtolower($product_name);
                $product_name = $obj->encode_decode('encrypt', $product_name);
                $lower_case_name = $obj->encode_decode('encrypt', $lower_case_name);
            } else {
                $product_name = $GLOBALS['null_value'];
                $lower_case_name = $GLOBALS['null_value'];
            }
            if (!empty($unit_id)) {
                $unit_name = $obj->getTableColumnValue($GLOBALS['unit_table'], 'unit_id', $unit_id, 'unit_name');
            } else {
                $unit_id = $GLOBALS['null_value'];
                $unit_name = $GLOBALS['null_value'];
            }
            if (!empty($subunit_id)) {
                $subunit_name = $obj->getTableColumnValue($GLOBALS['unit_table'], 'unit_id', $subunit_id, 'unit_name');
            } else {
                $subunit_id = $GLOBALS['null_value'];
                $subunit_name = $GLOBALS['null_value'];
                $subunit_contains = $GLOBALS['null_value'];
            }
            if (!empty($godown_ids)) {
                $godown_ids = implode(",", $godown_ids);
            } else {
                $godown_ids = $GLOBALS['null_value'];
            }
            if (!empty($godown_names)) {
                $godown_names = implode(",", $godown_names);
            } else {
                $godown_names = $GLOBALS['null_value'];
            }
            if (!empty($brand_ids)) {
                $brand_ids = implode(",", $brand_ids);
            } else {
                $brand_ids = $GLOBALS['null_value'];
            }
            if (!empty($brand_names)) {
                $brand_names = implode(",", $brand_names);
            } else {
                $brand_names = $GLOBALS['null_value'];
            }
            if (!empty($unit_type)) {
                $unit_type = implode(",", $unit_type);
            } else {
                $unit_type = $GLOBALS['null_value'];
            }
            if (!empty($unit_type_name)) {
                $unit_type_name = implode(",", $unit_type_name);
            } else {
                $unit_type_name = $GLOBALS['null_value'];
            }
            if (!empty($opening_stock)) {
                $opening_stock = implode(",", $opening_stock);
            } else {
                $opening_stock = $GLOBALS['null_value'];
            }
            if (!empty($stock_date)) {
                $stock_date = implode(",", $stock_date);
            } else {
                $stock_date = $GLOBALS['null_value'];
            }
            if (!empty($contents)) {
                $contents = implode(",", $contents);
            } else {
                $contents = $GLOBALS['null_value'];
            }
            if (empty($sales_rate)) {
                $sales_rate = $GLOBALS['null_value'];
            }
            if (empty($per)) {
                $per = $GLOBALS['null_value'];
            }
            if (empty($rate_per_piece)) {
                $rate_per_piece = $GLOBALS['null_value'];
            }
            if (empty($rate_per_case)) {
                $rate_per_case = $GLOBALS['null_value'];
            }
            $prev_product_id = "";
            $product_error = "";
            if (!empty($lower_case_name)) {
                $prev_product_id = $obj->getTableColumnValue($GLOBALS['product_table'], 'lower_case_name', $lower_case_name, 'product_id');
                if (!empty($prev_product_id)) {
                    $product_error = "This Product name already exists";
                }
            }
            $bill_company_id = $GLOBALS['bill_company_id'];
            $created_date_time = $GLOBALS['create_date_time_label'];
            $creator = $GLOBALS['creator'];
            $creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
            $update_stock = 0;
            if (empty($edit_id)) {
                if (empty($prev_product_id)) {
                    $action = "";
                    if (!empty($product_name)) {
                        $action = "New Product Created - " . $obj->encode_decode("decrypt", $product_name);
                    }
                    $null_value = $GLOBALS['null_value'];
                    $columns = array('created_date_time', 'creator', 'creator_name', 'bill_company_id', 'product_id', 'product_name', 'lower_case_name', 'unit_id', 'unit_name', 'subunit_need', 'subunit_id', 'subunit_name', 'subunit_contains', 'sales_rate', 'per', 'per_type', 'opening_stock', 'unit_type', 'unit_type_name', 'stock_date', 'godown_id', 'godown_name', 'brand_id', 'brand_name', 'negative_stock', 'rate_per_case', 'rate_per_piece', 'deleted');
                    $values = array("'" . $created_date_time . "'", "'" . $creator . "'", "'" . $creator_name . "'", "'" . $bill_company_id . "'", "'" . $null_value . "'", "'" . $product_name . "'", "'" . $lower_case_name . "'", "'" . $unit_id . "'", "'" . $unit_name . "'", "'" . $subunit_need . "'", "'" . $subunit_id . "'", "'" . $subunit_name . "'", "'" . $contents . "'", "'" . $sales_rate . "'", "'" . $per . "'", "'" . $per_type . "'", "'" . $opening_stock . "'", "'" . $unit_type . "'", "'" . $unit_type_name . "'", "'" . $stock_date . "'", "'" . $godown_ids . "'", "'" . $godown_names . "'", "'" . $brand_ids . "'", "'" . $brand_names . "'", "'" . $negative_stock . "'", "'" . $rate_per_case . "'", "'" . $rate_per_piece . "'", "'0'");
                    $product_insert_id = $obj->InsertSQL($GLOBALS['product_table'], $columns, $values, 'product_id', '', $action);
                    if (preg_match("/^\d+$/", $product_insert_id)) {
                        $product_id = $obj->getTableColumnValue($GLOBALS['product_table'], 'id', $product_insert_id, 'product_id');

                        $update_stock = 1;
                        $result = array('number' => '1', 'msg' => 'Product Successfully Created', 'product_id' => $product_id);
                    } else {
                        $result = array('number' => '2', 'msg' => $product_insert_id);
                    }
                } else {
                    if (!empty($product_error)) {
                        $result = array('number' => '2', 'msg' => $product_error);
                    }
                }
            } else {
                if (empty($prev_product_id) || $prev_product_id == $edit_id) {
                    $getUniqueID = "";
                    $getUniqueID = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $edit_id, 'id');
                    if (preg_match("/^\d+$/", $getUniqueID)) {
                        $action = "";
                        if (!empty($product_name)) {
                            $action = "Product Updated - " . $obj->encode_decode("decrypt", $product_name);
                        }

                        $columns = array();
                        $values = array();
                        $columns = array('creator_name', 'product_name', 'lower_case_name', 'unit_id', 'unit_name', 'subunit_need', 'subunit_id', 'subunit_name', 'subunit_contains', 'sales_rate', 'per', 'per_type', 'stock_date', 'opening_stock', 'unit_type', 'unit_type_name', 'godown_id', 'godown_name', 'brand_id', 'brand_name', 'negative_stock', 'rate_per_case', 'rate_per_piece');
                        $values = array("'" . $creator_name . "'", "'" . $product_name . "'", "'" . $lower_case_name . "'", "'" . $unit_id . "'", "'" . $unit_name . "'", "'" . $subunit_need . "'", "'" . $subunit_id . "'", "'" . $subunit_name . "'", "'" . $contents . "'", "'" . $sales_rate . "'", "'" . $per . "'", "'" . $per_type . "'", "'" . $stock_date . "'", "'" . $opening_stock . "'", "'" . $unit_type . "'", "'" . $unit_type_name . "'", "'" . $godown_ids . "'", "'" . $godown_names . "'", "'" . $brand_ids . "'", "'" . $brand_names . "'", "'" . $negative_stock . "'", "'" . $rate_per_case . "'", "'" . $rate_per_piece . "'");
                        $entry_update_id = $obj->UpdateSQL($GLOBALS['product_table'], $getUniqueID, $columns, $values, $action);
                        if (preg_match("/^\d+$/", $entry_update_id)) {
                            $update_stock = 1;
                            $product_id = $edit_id;
                            $result = array('number' => '1', 'msg' => 'Updated Successfully');

                        } else {
                            $result = array('number' => '2', 'msg' => $entry_update_id);
                        }
                    }
                } else {
                    if (!empty($product_error)) {
                        $result = array('number' => '2', 'msg' => $product_error);
                    }
                }
            }
            if (!empty($update_stock) && $update_stock == 1) {
                if (!empty($product_id) && !empty($unit_id) && !empty($opening_stock)) {

                    $stock_date = explode(",", $stock_date);
                    $opening_stock = explode(",", $opening_stock);
                    $unit_type = explode(",", $unit_type);
                    $remarks = $obj->encode_decode("encrypt", 'Opening Stock');
                    if (!empty($godown_ids) && $godown_ids != $GLOBALS['null_value']) {
                        $godown_ids = explode(",", $godown_ids);
                        $brand_ids = explode(",", $brand_ids);
                        $contents = explode(",", $contents);
                        for ($i = 0; $i < count($godown_ids); $i++) {
                            if ($unit_type[$i] == '1') {
                                $stock_update_id = $obj->StockUpdate($GLOBALS['product_table'], "In", $product_id, '', $product_id, $remarks, $stock_date[$i], $godown_ids[$i], $brand_ids[$i], $unit_id, $opening_stock[$i], $contents[$i]);
                            } else if ($unit_type[$i] == '2') {
                                $stock_update_id = $obj->StockUpdate($GLOBALS['product_table'], "In", $product_id, '', $product_id, $remarks, $stock_date[$i], $godown_ids[$i], $brand_ids[$i], $subunit_id, $opening_stock[$i], $contents[$i]);
                            }
                        }
                    }
                }
            }
        } else {
            $result = array('number' => '2', 'msg' => 'Invalid IP');
        }
    } else {
        if (!empty($valid_product)) {
            $result = array('number' => '3', 'msg' => $valid_product);
        } else if (!empty($godown_error)) {
            $result = array('number' => '2', 'msg' => $godown_error);
        }
    }

    if (!empty($result)) {
        $result = json_encode($result);
    }
    echo $result;
    exit;
}
if (isset($_POST['page_number'])) {
    $page_number = $_POST['page_number'];
    $page_limit = $_POST['page_limit'];
    $page_title = $_POST['page_title'];

    $search_text = "";

    if (isset($_POST['search_text'])) {
        $search_text = $_POST['search_text'];
    }

    $total_records_list = array();
    $total_records_list = $obj->getTableRecords($GLOBALS['product_table'], '', '', 'DESC');

    if (!empty($search_text)) {
        $search_text = strtolower($search_text);
        $list = array();
        if (!empty($total_records_list)) {
            foreach ($total_records_list as $val) {
                if ((strpos(strtolower($obj->encode_decode('decrypt', $val['product_name'])), $search_text) !== false)) {
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
    if (!empty($page_number) && !empty($page_limit) && !empty($total_pages)) {
        if ($total_pages > $page_limit) {
            if ($page_number) {
                $page_start = ($page_number - 1) * $page_limit;
                $page_end = $page_start + $page_limit;
            }
        } else {
            $page_start = 0;
            $page_end = $page_limit;
        }
    }
    $show_records_list = array();
    if (!empty($total_records_list)) {
        foreach ($total_records_list as $key => $val) {
            if ($key >= $page_start && $key < $page_end) {
                $show_records_list[] = $val;
            }
        }
    }

    $prefix = 0;
    if (!empty($page_number) && !empty($page_limit)) {
        $prefix = ($page_number * $page_limit) - $page_limit;
    }
    ?>
    <?php if ($total_pages > $page_limit) { ?>
        <div class="pagination_cover mt-3">
            <?php
            include("pagination.php");
            ?>
        </div>
    <?php } ?>
    <?php
    $access_error = "";
    if (!empty($loginner_id)) {
        $permission_action = $view_action;
        include('permission_action.php');
    }
    if (empty($access_error)) {
        ?>
        <table class="table nowrap cursor text-center smallfnt">
            <thead class="bg-light">
                <tr>
                    <th>S.No</th>
                    <th>Product Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($show_records_list)) {
                    foreach ($show_records_list as $key => $list) {
                        $index = $key + 1;
                        if (!empty($prefix)) {
                            $index = $index + $prefix;
                        }
                        ?>
                        <tr>
                            <td>
                                <?php echo $index; ?>
                            </td>
                            <td>
                                <?php
                                if (!empty($list['product_name']) && $list['product_name'] != $GLOBALS['null_value']) {
                                    echo $obj->encode_decode('decrypt', $list['product_name']);
                                }
                                ?>

                            </td>

                            <td>
                                <div class="dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <?php
                                        $access_error = "";
                                        if (!empty($loginner_id)) {
                                            $permission_action = $edit_action;
                                            include('permission_action.php');
                                        }
                                        if (empty($access_error)) {
                                            ?>
                                            <li><a class="dropdown-item" href="Javascript:ShowModalContent('<?php if (!empty($page_title)) {
                                                echo $page_title;
                                            } ?>', '<?php if (!empty($list['product_id'])) {
                                                 echo $list['product_id'];
                                             } ?>');"><i class="fa fa-pencil"></i> &ensp; Edit</a></li>
                                        <?php } ?>
                                        <?php
                                        $access_error = "";
                                        if (!empty($loginner_id)) {
                                            $permission_action = $delete_action;
                                            include('permission_action.php');
                                        }
                                        if (empty($access_error)) {
                                            $linked_count = 0;
                                            // $linked_count = $obj->GetProductLinkedCount($list['product_id']); 
                                            if ($linked_count > 0) { ?>
                                                <li><a class="dropdown-item text-secondary"><i class="fa fa-trash"></i> &ensp; Delete</a></li>
                                                <?php
                                            } else {
                                                ?>
                                                <li><a class="dropdown-item" href="Javascript:DeleteModalContent('<?php if (!empty($page_title)) {
                                                    echo $page_title;
                                                } ?>', '<?php if (!empty($list['product_id'])) {
                                                     echo $list['product_id'];
                                                 } ?>');"><i class="fa fa-trash"></i> &ensp; Delete</a></li>

                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="5" class="text-center">Sorry! No records found</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }
}
if (isset($_REQUEST['product_row_index'])) {
    $product_row_index = $_REQUEST['product_row_index'];
    $godown_id = $_REQUEST['selected_godown_id'];
    $brand_id = $_REQUEST['selected_brand_id'];
    $unit_type = $_REQUEST['selected_unit_type'];
    $stock_date = $_REQUEST['selected_stock_date'];
    $quantity = $_REQUEST['selected_quantity'];
    $content = $_REQUEST['selected_content'];
    ?>
    <tr class="product_row" id="product_row<?php echo $product_row_index; ?>">
        <th class="sno text-center px-2 py-2"><?php if (!empty($product_row_index)) {
            echo $product_row_index;
        } ?></th>

        <th class="text-center px-2 py-2">
            <?php
            $godown_name = "";
            $godown_name = $obj->getTableColumnValue($GLOBALS['godown_table'], 'godown_id', $godown_id, 'godown_name');
            if ($godown_name != $GLOBALS['null_value']) {
                echo $obj->encode_decode('decrypt', $godown_name);
            }
            ?>
            <input type="hidden" name="godown_id[]" value="<?php if (!empty($godown_id)) {
                echo $godown_id;
            } ?>">

        </th>

        <th class="text-center px-2 py-2">
            <?php
            $brand_name = "";
            $brand_name = $obj->getTableColumnValue($GLOBALS['brand_table'], 'brand_id', $brand_id, 'brand_name');
            if ($brand_name != $GLOBALS['null_value']) {
                echo $obj->encode_decode('decrypt', $brand_name);
            }
            ?>
            <input type="hidden" name="brand_id[]" value="<?php if (!empty($brand_id)) {
                echo $brand_id;
            } ?>">
        </th>
        <th class="text-center px-2 py-2">
            <?php
            if (!empty($stock_date)) {
                echo date('d-M-Y', strtotime($stock_date));
            }
            ?>
            <input type="hidden" name="stock_date[]" value="<?php if (!empty($stock_date)) {
                echo $stock_date;
            } ?>">
        </th>
        <th class="text-center px-2 py-2">
            <input type="text" name="opening_stock[]" class="form-control shadow-none" value="<?php if (!empty($quantity)) {
                echo $quantity;
            } ?>" onfocus="Javascript:KeyboardControls(this,'number',8,'');"
                onkeyup="Javascript:ProductRowCheck(this);">
        </th>

        <th class="text-center px-2 py-2">
            <?php
            if (!empty($unit_type)) {
                if ($unit_type == '1') {
                    echo "Unit";
                } else if ($unit_type == '2') {
                    echo "Subunit";
                }
            }
            ?>
            <input type="hidden" name="unit_type[]" value="<?php if (!empty($unit_type)) {
                echo $unit_type;
            } ?>">
        </th>


        <th class="text-center px-2 py-2">

            <input type="text" name="content[]" class="form-control shadow-none"
                onfocus="Javascript:KeyboardControls(this,'number',8,'');" value="<?php if (!empty($content)) {
                    echo $content;
                } ?>">

        </th>
        <th class="text-center px-2 py-2">
            <button class="btn btn-danger" type="button" onclick="Javascript:DeleteRow('<?php if (!empty($product_row_index)) {
                echo $product_row_index;
            } ?>', 'product_row');"><i class="fa fa-trash"></i></button>
        </th>

    </tr>
    <?php
}

if (isset($_REQUEST['delete_product_id'])) {
    $delete_product_id = $_REQUEST['delete_product_id'];
    $msg = "";
    if (!empty($delete_product_id)) {
        $product_unique_id = "";
        $product_unique_id = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $delete_product_id, 'id');
        if (preg_match("/^\d+$/", $product_unique_id)) {
            $name = "";
            $name = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $delete_product_id, 'product_name');

            $action = "";
            if (!empty($name)) {
                $action = "Product Deleted. Name - " . $obj->encode_decode('decrypt', $name);
            }

            $linked_count = 0;
            // $linked_count = $obj->GetProductLinkedCount($delete_product_id); 

            if (empty($linked_count)) {
                $columns = array();
                $values = array();
                $columns = array('deleted');
                $values = array("'1'");
                $msg = $obj->UpdateSQL($GLOBALS['product_table'], $product_unique_id, $columns, $values, $action);
                $prev_stock_list = array();
                $prev_stock_list = $obj->PrevStockList($delete_product_id);
                if (!empty($prev_stock_list)) {
                    foreach ($prev_stock_list as $data) {
                        $stock_godown_id = "";
                        $stock_brand_id = "";
                        $stock_case_contains = "";
                        $stock_product_id = $delete_product_id;
                        $stock_id = "";
                        if (!empty($data['id'])) {
                            $stock_id = $data['id'];
                        }
                        if (!empty($data['godown_id']) && $data['godown_id'] != $GLOBALS['null_value']) {
                            $stock_godown_id = $data['godown_id'];
                        }
                        if (!empty($data['brand_id']) && $data['brand_id'] != $GLOBALS['null_value']) {
                            $stock_brand_id = $data['brand_id'];
                        }
                        if (!empty($data['case_contains']) && $data['case_contains'] != $GLOBALS['null_value']) {
                            $stock_case_contains = $data['case_contains'];
                        }
                        $current_stock_unit = 0;
                        $current_stock_subunit = 0;
                        $current_stock_unit = $obj->getCurrentStockUnit($GLOBALS['stock_by_godown_table'], $stock_godown_id, $stock_brand_id, $stock_product_id, $stock_case_contains);
                        $current_stock_subunit = $obj->getCurrentStockSubunit($GLOBALS['stock_by_godown_table'], $stock_godown_id, $stock_brand_id, $stock_product_id, $stock_case_contains);
                        if (empty($current_stock_unit) && $current_stock_unit == $GLOBALS['null_value']) {
                            $current_stock_unit = 0;
                        }
                        if (empty($current_stock_subunit) && $current_stock_subunit == $GLOBALS['null_value']) {
                            $current_stock_subunit = $GLOBALS['null_value'];
                        }
                        $stock_table_unique_id = "";
                        $stock_table_unique_id = $obj->getStockTablesUniqueID($GLOBALS['stock_by_godown_table'], $stock_godown_id, $stock_brand_id, $stock_product_id, $stock_case_contains);
                        $columns = array();
                        $values = array();
                        $columns = array('deleted');
                        $values = array('"1"');
                        $stock_update_id = $obj->UpdateSQL($GLOBALS['stock_table'], $stock_id, $columns, $values, '');

                        if (preg_match("/^\d+$/", $stock_update_id)) {
                            if (preg_match("/^\d+$/", $stock_table_unique_id)) {
                                $columns = array();
                                $values = array();
                                $columns = array('deleted');
                                $values = array('"1"');
                                $stock_table_update_id = $obj->UpdateSQL($GLOBALS['stock_by_godown_table'], $stock_table_unique_id, $columns, $values, '');
                            }
                        }
                    }
                }
            } else {
                $msg = "This Product is associated with other screens";
            }
        }
    }
    echo $msg;
    exit;
}
if (isset($_REQUEST['check_product_count'])) {
    $check_product_count = $_REQUEST['check_product_count'];

    $product_list = array();
    $product_list = $obj->getTableRecords($GLOBALS['product_table'], '', '', '');

    if (!empty($product_list)) {
        echo $product_count = count($product_list);
    }
}

if (isset($_REQUEST['unit_select_change'])) {
    $list = json_decode($_REQUEST['unit_select_change'], true);

    $option = "";
    foreach ($list as $option_list) {
        if ($option_list['subunit_need'] == '1') {
            if (!empty($option_list['unit_id'])) {
                $case = $obj->getTableColumnValue($GLOBALS['unit_table'], 'unit_id', $option_list['unit_id'], 'unit_name');
                $case = $obj->encode_decode('decrypt', $case);
            } else {
                $case = "Unit";
            }
            $option = $option . "<option value = '1'>" . $case . "</option>";

            if (!empty($option_list['subunit_id'])) {
                $piece = $obj->getTableColumnValue($GLOBALS['unit_table'], 'unit_id', $option_list['subunit_id'], 'unit_name');
                $piece = $obj->encode_decode('decrypt', $piece);
            } else {
                $piece = "SubUnit";
            }
            $option = $option . "<option value = '2'>" . $piece . "</option>";
        } else {
            if (!empty($option_list['unit_id'])) {
                $case = $obj->getTableColumnValue($GLOBALS['unit_table'], 'unit_id', $option_list['unit_id'], 'unit_name');
                $case = $obj->encode_decode('decrypt', $case);
            } else {
                $case = "Unit";
            }
            $option = $option . "<option value = '1' selected>" . $case . "</option>";
        }

        echo $option;
    }
}
?>