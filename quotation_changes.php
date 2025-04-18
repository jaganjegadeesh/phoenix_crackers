<?php
include("include_files.php");
if (isset($_REQUEST['show_quotation_id'])) {
    $show_quotation_id = $_REQUEST['show_quotation_id'];
    if(!empty($show_quotation_id)) {
        $quotation_list = $obj->getTableRecords($GLOBALS['quotation_table'], 'quotation_id', $show_quotation_id, '');
        $agent_id = "";
        if(!empty($quotation_list)) {
            foreach($quotation_list as $Q_list) {
                if(!empty($Q_list['quotation_number'])) {
                    $quotation_number = $Q_list['quotation_number'];
                }
                if(!empty($Q_list['party_id'])) {
                    $party_id = $Q_list['party_id'];
                }
                if(!empty($Q_list['quotation_date'])) {
                    $quotation_date = $Q_list['quotation_date'];
                }
                if(!empty($Q_list['sub_total'])) {
                    $sub_total = $Q_list['sub_total'];
                }
                if(!empty($Q_list['grand_total'])) {
                    $grand_total = $Q_list['grand_total'];
                }
                if(!empty($Q_list['total_amount'])) {
                    $total_amount = $Q_list['total_amount'];
                }
                if(!empty($Q_list['round_off'])) {
                    $round_off = $Q_list['round_off'];
                }
                if(!empty($Q_list['product_id'])) {
                    $product_id = $Q_list['product_id'];
                    $product_id = explode(",", $product_id);
                }
                if(!empty($Q_list['product_name'])) {
                    $product_name = $Q_list['product_name'];
                    $product_name = explode(",", $product_name);
                }
                if(!empty($Q_list['brand_id'])) {
                    $brand_id = $Q_list['brand_id'];
                    $brand_id = explode(",", $brand_id);
                }
                if(!empty($Q_list['brand_name'])) {
                    $brand_name = $Q_list['brand_name'];
                    $brand_name = explode(",", $brand_name);
                }
                if(!empty($Q_list['per'])) {
                    $per = $Q_list['per'];
                    $per = explode(",", $per);
                }
                if(!empty($Q_list['per_type'])) {
                    $per_type = $Q_list['per_type'];
                    $per_type = explode(",", $per_type);
                }
                if(!empty($Q_list['unit_type'])) {
                    $unit_type = $Q_list['unit_type'];
                    $unit_type = explode(",", $unit_type);
                }
                if(!empty($Q_list['unit_id'])) {
                    $unit_id = $Q_list['unit_id'];
                    $unit_id = explode(",", $unit_id);
                }
                if(!empty($Q_list['subunit_id'])) {
                    $subunit_id = $Q_list['subunit_id'];
                    $subunit_id = explode(",", $subunit_id);
                }
                if(!empty($Q_list['unit_name'])) {
                    $unit_name = $Q_list['unit_name'];
                    $unit_name = explode(",", $unit_name);
                }
                if(!empty($Q_list['subunit_name'])) {
                    $subunit_name = $Q_list['subunit_name'];
                    $subunit_name = explode(",", $subunit_name);
                }
                if(!empty($Q_list['subunit_contains'])) {
                    $subunit_content = $Q_list['subunit_contains'];
                    $subunit_content = explode(",", $subunit_content);
                }
                if(!empty($Q_list['product_rate'])) {
                    $sales_rate = $Q_list['product_rate'];
                    $sales_rate = explode(",", $sales_rate);
                }
                if(!empty($Q_list['product_amount'])) {
                    $product_amount = $Q_list['product_amount'];
                    $product_amount = explode(",", $product_amount);
                }
                if(!empty($Q_list['charges_id'])) {
                    $charges_id = $Q_list['charges_id'];
                    $charges_id = explode(",", $charges_id);
                }
                if(!empty($Q_list['charges_type'])) {
                    $charges_type = $Q_list['charges_type'];
                    $charges_type = explode(",", $charges_type);
                }
                if(!empty($Q_list['charges_value'])) {
                    $charges_value = $Q_list['charges_value'];
                    $charges_value = explode(",", $charges_value);
                }
                if(!empty($Q_list['charges_total'])) {
                    $charges_total = $Q_list['charges_total'];
                    $charges_total = explode(",", $charges_total);
                }
                if(!empty($Q_list['product_quantity'])) {
                    $product_quantity = $Q_list['product_quantity'];
                    $product_quantity = explode(",", $product_quantity);
                }
                if(!empty($Q_list['agent_id']) && $Q_list['agent_id'] != $GLOBALS['null_value']) {
                    $agent_id = $Q_list['agent_id'];
                }
            }
        }
    }
    $party_list = $creation_obj->BillPartyDetails($GLOBALS['bill_company_id'], 'sales');
    $brand_list = $obj->getTableRecords($GLOBALS['brand_table'], '', '', '');
    $product_list = $obj->getTableRecords($GLOBALS['product_table'], '', '', '');
    $charges_list = $obj->getTableRecords($GLOBALS['charges_table'], '', '', '');
    $agent_list = $obj->getTableRecords($GLOBALS['agent_table'], '', '', '');
    ?>
    <form class="poppins pd-20" name="quotation_form" method="POST">
        <div class="card-header">
            <div class="row p-2">
                <div class="col-lg-8 col-md-8 col-8 align-self-center">
                    <div class="h5">Add Quotation</div>
                </div>
                <div class="col-lg-4 col-md-4 col-4">
                    <button class="btn btn-dark float-end" style="font-size:11px;" type="button"
                        onclick="window.open('quotation.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp;
                        Back </button>
                </div>
            </div>
        </div>
        <div class="row justify-content-center p-2">
            <input type="hidden" name="form_name" value="quotation_form">
            <input type="hidden" name="edit_id" value="<?php if (!empty($show_quotation_id)) { echo $show_quotation_id; } ?>">
            <div class="col-lg-2 col-md-2 col-12">
                <div class="form-group pb-1">
                    <div class="form-label-group in-border pb-1">
                        <input type="date" name="quotation_date" class="form-control shadow-none" value="<?php if (!empty($quotation_date)) { echo $quotation_date; } ?>">
                        <label>Date</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <div class="form-group pb-1">
                    <div class="form-label-group in-border pb-1">
                        <select name="agent_id" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option value="">Select</option>
                            <?php
                                if(!empty($agent_list)) {
                                    foreach($agent_list as $data) {
                                        if(!empty($data['agent_id']) && $data['agent_id'] != $GLOBALS['null_value']) {
                                            ?>
                                            <option value="<?php echo $data['agent_id']; ?>" <?php if(!empty($agent_id) && $data['agent_id'] == $agent_id) { ?>selected<?php } ?>>
                                                <?php
                                                    if(!empty($data['name_mobile_city']) && $data['name_mobile_city'] != $GLOBALS['null_value']) {
                                                        echo $obj->encode_decode('decrypt', $data['name_mobile_city']);
                                                    }
                                                ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                        </select>
                        <label>Agent</label>
                    </div>
                </div> 
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <div class="form-group pb-1">
                    <div class="form-label-group in-border pb-1">
                        <select class="select2 select2-danger" name="party_id" data-dropdown-css-class="select2-danger"
                            style="width: 100%;">
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
                        <label>Select Party</label>
                    </div>
                </div>
            </div>
           

        </div>
        <div class="row justify-content-center p-2">
            <div class="col-lg-2 col-md-4 col-6 px-lg-1 py-2">
                <div class="form-group">
                    <div class="form-label-group in-border mb-0">
                        <select class="select2 select2-danger" name="brand" data-dropdown-css-class="select2-danger"
                            style="width: 100%;">
                            <option value="">Select Brand</option>
                            <?php if (!empty($brand_list)) {
                                foreach ($brand_list as $B_list) { ?>
                                    <option value="<?php if (!empty($B_list['brand_id'])) {
                                        echo $B_list['brand_id'];
                                    } ?>">
                                        <?php if (!empty($B_list['brand_name'])) {
                                            echo $obj->encode_decode('decrypt', $B_list['brand_name']);
                                        } ?>
                                    </option>
                                <?php }
                            } ?>
                        </select>
                        <label>Select Brand</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 px-lg-1 py-2">
                <div class="form-group mb-1">
                    <div class="form-label-group in-border">
                        <div class="input-group mb-3">
                            <select class="select2 select2-danger" name="product" data-dropdown-css-class="select2-danger"
                                data-placeholder="Select a State" style="width: 100%;"
                                onchange="GetProdetails();calcAmount();">
                                <option value="">Select Product</option>
                                <?php if (!empty($product_list)) {
                                    foreach ($product_list as $Pro_list) { ?>
                                        <option value="<?php if (!empty($Pro_list['product_id'])) {
                                            echo $Pro_list['product_id'];
                                        } ?>">
                                            <?php if (!empty($Pro_list['product_name'])) {
                                                echo $obj->encode_decode('decrypt', $Pro_list['product_name']);
                                            } ?>
                                        </option>
                                    <?php }
                                } ?>
                            </select>
                            <label>Select Product</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-3 col-6 px-lg-1 py-2">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <input type="text" name="quantity" class="form-control shadow-none" onkeyup="calcAmount();">
                        <label>QTY</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-3 col-6 py-2 px-lg-1">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <select class="select2 select2-danger" onchange="calcAmount();" name="unit_type"
                            data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option value="1">Unit</option>
                            <option value="2">Sub Unit</option>
                        </select>
                        <label>Type</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-3 col-6 px-lg-1 py-2">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <input type="text" name="subunit_contains" class="form-control shadow-none"
                            onkeyup="CalProductAmount();calcAmount();">
                        <label>Content</label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="subunit_need" id="subunit_need">
            <input type="hidden" name="rate_per_case">
            <input type="hidden" name="rate_per_piece">
            <div class="col-lg-1 col-md-4 col-6 px-lg-1 py-2">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <input type="number" name="sales_rate" onkeyup="CalProductAmount();calcAmount();"
                            class="form-control shadow-none" required="">
                        <label>Rate</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 px-lg-1 py-2">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <div class="input-group">
                            <input type="text" id="" name="per" onkeyup="CalProductAmount();calcAmount();"
                                class="form-control shadow-none">
                            <label>Per</label>
                            <div class="input-group-append" style="width:50%!important;">
                                <select name="per_type" class="select2 select2-danger select2-hidden-accessible"
                                     data-dropdown-css-class="select2-danger" onchange="CalProductAmount();calcAmount();"
                                    style="width: 100%;">
                                    <option value="1">Unit</option>
                                    <option value="2">Sub Unit</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-4 col-6 px-lg-1 py-2">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <input type="number" id="amount" class="form-control shadow-none" disabled>
                        <input type="hidden" name="amount" class="form-control shadow-none">
                        <label>Amount</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-2 col-6 px-lg-1  py-2">
                <button class="btn btn-danger py-2" onclick="Javascript:AddQuotationProduct();"
                    style="font-size:12px; width:100%;" type="button"> Add </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <input type="hidden" name="product_count" value="<?php if (!empty($product_row_index)) {
                        echo $product_row_index;
                    } else {
                        echo "0";
                    } ?>">
                    <table class="table nowrap cursor text-center table-bordered smallfnt w-100 quotation_table">
                        <thead class="bg-dark">
                            <tr style="white-space:pre;">
                                <th>#</th>
                                <th style="width: 150px;">Brand</th>
                                <th style="width: 150px;">Product</th>
                                <th style="width: 100px;">Qty</th>
                                <th style="width: 100px;">Type</th>
                                <th style="width: 100px;">Content</th>
                                <th style="width: 100px;">Total Qty</th>
                                <th style="width: 100px;">rate</th>
                                <th style="width: 150px;">Per</th>
                                <th style="width: 100px;">Amount</th>
                                <th style="width: 70px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(!empty($product_id)) {

                                    for($i = 0; $i < count($product_id); $i++) { 
                                        $total_qty = 0;?>
                                         <tr class="quotation_row" id="quotation_row<?php echo $i; ?>">
                                            <th class="sno text-center px-2 py-2"><?php echo $i+1; ?></th>

                                            <th class="text-center px-2 py-2">
                                                <?php
                                                $brand_name = "";
                                                $brand_name = $obj->getTableColumnValue($GLOBALS['brand_table'], 'brand_id', $brand_id[$i], 'brand_name');
                                                if ($brand_name != $GLOBALS['null_value']) {
                                                    echo $obj->encode_decode('decrypt', $brand_name);
                                                }
                                                ?>
                                                <input type="hidden" name="brand_id[]" id="brand_id_<?php echo $i;?>" value="<?php if (!empty($brand_id[$i])) {
                                                    echo $brand_id[$i];
                                                } ?>">
                                            </th>
                                            <th class="text-center px-2 py-2">
                                                <?php
                                                $product_name = "";
                                                $product_name = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $product_id[$i], 'product_name');
                                                if ($product_name != $GLOBALS['null_value']) {
                                                    echo $obj->encode_decode('decrypt', $product_name);
                                                }
                                                ?>
                                                <input type="hidden" name="product_id[]" id="product_id_<?php echo $i;?>" value="<?php if (!empty($product_id[$i])) {
                                                    echo $product_id[$i];
                                                } ?>">

                                            </th>
                                            <th class="text-center px-2 py-2">
                                                <input type="text" name="quotation_qty[]" id="quotation_qty_<?php echo $i;?>" class="form-control shadow-none" value="<?php if (!empty($product_quantity[$i])) { echo $product_quantity[$i]; } ?>" onfocus="Javascript:KeyboardControls(this,'number',8,'');" onkeyup="calcRowAmount('<?php echo $i;  ?>');">
                                            </th>
                                            <th class="text-center px-2 py-2">
                                                <?php
                                                if (!empty($unit_type[$i])) {
                                                    if ($unit_type[$i] == '1') {
                                                        echo $obj->encode_decode('decrypt', $unit_name[$i]);
                                                        $total_qty = $product_quantity[$i] * $subunit_content[$i];
                                                    } else if ($unit_type[$i] == '2') {
                                                        echo $obj->encode_decode('decrypt', $subunit_name[$i]);
                                                        $total_qty = $product_quantity[$i];
                                                    }
                                                }
                                                ?>
                                                <input type="hidden" name="quotation_unit_id[]" id="unit_id_<?php echo $i;?>"  value="<?php if (!empty($unit_id[$i])) { echo $unit_id[$i]; } ?>">
                                                <input type="hidden" name="quotation_unit_name[]" id="unit_name_<?php echo $i;?>"  value="<?php if (!empty($unit_name[$i])) { echo $unit_name[$i]; } ?>">
                                                <input type="hidden" name="quotation_subunit_id[]" id="subunit_id_<?php echo $i;?>"  value="<?php if (!empty($subunit_id[$i])) { echo $subunit_id[$i]; } ?>">
                                                <input type="hidden" name="quotation_subunit_name[]" id="subunit_name_<?php echo $i;?>"  value="<?php if (!empty($subunit_name[$i])) { echo $subunit_name[$i]; } ?>">
                                                <input type="hidden" name="quotation_unit_type[]" id="unit_type_<?php echo $i;?>"  value="<?php if (!empty($unit_type[$i])) { echo $unit_type[$i]; } ?>">
                                            </th>
                                            <th class="text-center px-2 py-2">
                                                <input type="hidden" name="quotation_content[]" id="content_<?php echo $i;?>" class="form-control shadow-none" value="<?php if (!empty($subunit_content[$i])) { echo $subunit_content[$i]; } ?>" onkeyup="calcRowAmount('<?php echo $i;  ?>');">
                                                <?php if (!empty($subunit_content[$i])) {
                                                    echo $subunit_content[$i];
                                                } ?>
                                            </th>
                                            <th class="text-center px-2 py-2">
                                                <input type="hidden" name="total_qty[]" value="<?php echo $total_qty; ?>">
                                                <?php echo $total_qty; ?>
                                            </th>
                                            <th class="text-center px-2 py-2">
                                                <input type="text" name="quotation_sales_rate[]" id="quotation_sales_rate_<?php echo $i;?>" class="form-control shadow-none" value="<?php if (!empty($sales_rate[$i])) { echo $sales_rate[$i]; } ?>" onfocus="Javascript:KeyboardControls(this,'number',8,'');" onkeyup="calcRowAmount('<?php echo $i;  ?>');">
                                            </th>
                                            <th class="text-center px-2 py-2">
                                                <div class="form-group">
                                                    <div class="form-label-group in-border">
                                                        <div class="input-group">
                                                            <input type="text" name="quotation_per[]" id="quotation_per_<?php echo $i;?>" value="<?php if (!empty($per[$i])) {  echo $per[$i]; } ?>" class="form-control shadow-none" onkeyup="calcRowAmount('<?php echo $i;  ?>');">
                                                            <label>Per</label>
                                                            <div class="input-group-append" style="width:70%!important;">
                                                                <select name="quotation_per_type[]" id="quotation_per_type_<?php echo $i;?>" class="select2 select2-danger" data-dropdown-css-class="select2-danger" onchange="calcRowAmount('<?php echo $i;  ?>');">
                                                                    <option value="1" <?php if (!empty($per_type[$i]) && $per_type[$i] == '1') { echo "selected"; } ?>><?php echo $obj->encode_decode('decrypt', $unit_name[$i]); ?></option>
                                                                    <option value="2" <?php if (!empty($per_type[$i]) && $per_type[$i] == '2') { echo "selected"; } ?>><?php echo $obj->encode_decode('decrypt', $subunit_name[$i]); ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </th>
                                            <input type="hidden" name="quotation_amount[]" id="quotation_amount_<?php echo $i;?>" class="form-control shadow-none" value="<?php if (!empty($product_amount[$i])) { echo $product_amount[$i]; } ?>">
                                            <th class="text-center px-2 py-2" id="quotation_amount_tr_<?php echo $i;?>">
                                                <?php if (!empty($product_amount[$i])) {
                                                    echo $product_amount[$i];
                                                } ?>
                                            </th>
                                            <th class="text-center px-2 py-2">
                                                <button class="btn btn-danger" type="button"
                                                    onclick="Javascript:DeleteRow('<?php echo $i;?>', 'quotation_row');"><i class="fa fa-trash"></i></button>
                                            </th>

                                        </tr>
                                    <?php }
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="text-end"> Total : </td>
                                <td class="text-end grand_qty"></td>
                                <td colspan="2" class="text-end"> Total : </td>
                                <td class="text-end sub_total"></td>
                                <td class="text-center"></td>
                            </tr>
                            <?php 
                            if(!empty($charges_id) && $charges_id[0] != $GLOBALS['null_value']) { 
                                for($i = 0; $i < count($charges_id); $i++) { ?>
                                
                                <tr class="smallfnt1 charges_row">
                                    <td colspan="5"></td>
                                    <td colspan="3">
                                        <div class="form-group">
                                            <div class="form-label-group in-border mb-0">
                                                <select name="charges_id[]" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="Javascript:GetChargesType(this);">
                                                    <option value="">Select Charges</option>
                                                    <?php 
                                                        if(!empty($charges_list)) {
                                                            foreach($charges_list as $data) {
                                                                if(!empty($data['charges_id']) && $data['charges_id'] != $GLOBALS['null_value']) {
                                                                    ?>
                                                                    <option value="<?php echo $data['charges_id']; ?>" <?php if(!empty($charges_id[$i]) && $charges_id[$i] == $data['charges_id']) { echo "selected"; } ?>>
                                                                        <?php
                                                                            if(!empty($data['charges_name']) && $data['charges_name'] != $GLOBALS['null_value']) {
                                                                                echo $obj->encode_decode('decrypt', $data['charges_name']);
                                                                                if($data['action'] == 'minus') {
                                                                                    echo " (-)";
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <label>Select Charges</label>
                                            </div>
                                            <input type="hidden" name="charges_type[]" value="<?php if(!empty($charges_type[$i])) { echo $charges_type[$i]; } ?>">
                                        </div> 
                                    </td>
                                    <td colspan="1"> 
                                        <div class="d-flex">
                                            <input type="text" class="form-control me-2" style="width: 85px;" name="charges_value[]" value="<?php if(!empty($charges_value[$i])) { echo $charges_value[$i]; } ?>" placeholder="Value" onkeyup="Javascript:CheckCharges();"> 
                                            <?php if($i == 0) { ?>
                                                <button type="button" class="bg-danger border-0 px-3" onclick="Javascript:AddChargesRow(this, '4');"><i class="fa fa-plus fw-bold text-white"></i></button>
                                            <?php } else { ?>
                                                <button type="button" class="bg-danger border-0 px-3" onclick="Javascript:DeleteChargesRow(this);"><i class="fa fa-trash fw-bold text-white"></i></button>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td colspan="1">
                                        <div class="text-end"><span class="charges_total"></span></div>
                                    </td>
                                    <td></td>
                                </tr>
                                <?php } 
                            }  else { ?>
                                 <tr class="smallfnt1 charges_row">
                                <td colspan="5"></td>
                                <td colspan="3">
                                    <div class="form-group">
                                        <div class="form-label-group in-border mb-0">
                                            <select name="charges_id[]" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="Javascript:GetChargesType(this);">
                                                <option value="">Select Charges</option>
                                                <?php 
                                                    if(!empty($charges_list)) {
                                                        foreach($charges_list as $data) {
                                                            if(!empty($data['charges_id']) && $data['charges_id'] != $GLOBALS['null_value']) {
                                                                ?>
                                                                <option value="<?php echo $data['charges_id']; ?>">
                                                                    <?php
                                                                        if(!empty($data['charges_name']) && $data['charges_name'] != $GLOBALS['null_value']) {
                                                                            echo $obj->encode_decode('decrypt', $data['charges_name']);
                                                                            if($data['action'] == 'minus') {
                                                                                echo " (-)";
                                                                            }
                                                                        }
                                                                    ?>
                                                                </option>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </select>
                                            <label>Select Charges</label>
                                        </div>
                                        <input type="hidden" name="charges_type[]" value="">
                                    </div> 
                                </td>
                                <td colspan="1"> 
                                    <div class="d-flex">
                                        <input type="text" class="form-control me-2" style="width: 85px;" name="charges_value[]" value="" placeholder="Value" onkeyup="Javascript:CheckCharges();"> 
                                        <button type="button" class="bg-danger border-0 px-3" onclick="Javascript:AddChargesRow(this, '4');"><i class="fa fa-plus fw-bold text-white"></i></button>
                                    </div>
                                </td>
                                <td colspan="1">
                                    <div class="text-end"><span class="charges_total"></span></div>
                                </td>
                                <td></td>
                            </tr>  
                            <?php } ?>
                            <tr>
                                <td colspan="9" class="text-end ">Total :</td>
                                <td class="text-end total_amount"></td>
                                <td colspan="1" class="text-end"></td>
                            </tr>
                            <tr>
                                <td colspan="9" class="text-end ">Round OFF :</td>
                                <td class="text-end round_off"> </td>
                                <td colspan="1" class="text-end"></td>
                            </tr>
                            <tr>
                                <td colspan="9" class="text-end ">Total :</td>
                                <td class="text-end grand_total"></td>
                                <td colspan="1" class="text-end"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-md-12 py-3 text-center">
                <button class="btn btn-danger"  onClick="Javascript:SaveModalContent(event,'quotation_form', 'quotation_changes.php', 'quotation.php');" type="button">
                    Submit
                </button>
            </div>
        </div>
    </form>
    <script src="include/select2/js/select2.min.js"></script>
    <script src="include/select2/js/select.js"></script>
    <script src="include/js/creation_modules.js"></script>
    <script>
        $(document).ready(function() {
            <?php if(!empty($show_quotation_id)) {?>
                calcQuotationSubtotal();
            <?php } ?>
        });
    </script>
<?php }
if (isset($_POST['page_number'])) {
    $page_number = $_POST['page_number'];
    $page_limit = $_POST['page_limit'];
    $page_title = $_POST['page_title']; 
    $search_text = ""; $from_date = ""; $to_date = "";

    if (isset($_POST['search_text'])) {
        $search_text = $_POST['search_text'];
    }
    if (isset($_POST['from_date'])) {
        $from_date = $_POST['from_date'];
    }
    if (isset($_POST['to_date'])) {
        $to_date = $_POST['to_date'];
    }

    $total_records_list = array();
    $total_records_list = $obj->getTableRecords($GLOBALS['quotation_table'], '', '', 'DESC');

    if (!empty($search_text)) {
        $search_text = strtolower($search_text);
        $list = array();
        if (!empty($total_records_list)) {
            foreach ($total_records_list as $val) {
                if ((strpos(strtolower( $val['party_id']), $search_text) !== false)) {
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
                <th>Date</th>
                <th>Quotation Number</th>
                <th>Sales Party Name</th>
                <th>Total quantity</th>
                <th>Amount</th>
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
                <td><?php if(!empty($list['quotation_date'])) { echo $list['quotation_date'];}?></td>
                <td><?php if(!empty($list['quotation_number'])) { echo $list['quotation_number'];}?></td>
                <td><?php if(!empty($list['party_name_mobile_city'])) { echo $obj->encode_decode('decrypt', $list['party_name_mobile_city']);}?></td>
                <td><?php if(!empty($list['grand_qty'])) { echo $list['grand_qty'];}?></td>
                <td><?php if(!empty($list['grand_total'])) { echo $list['grand_total'];}?></td>
               
                <td>
                    <div class="dropdown">
                        <a href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                            <!-- <li><a class="dropdown-item" href="#">View</a></li> -->
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
                                            } ?>', '<?php if (!empty($list['quotation_id'])) {
                                                 echo $list['quotation_id'];
                                             } ?>');"><i class="fa fa-pencil"></i> &ensp; Edit</a></li>
                                        <?php } ?>
                                        <li><a class="dropdown-item" href="Javascript:ShowModalContent('delivery_challan', '', '<?php if (!empty($list['quotation_id'])) {
                                                 echo $list['quotation_id'];
                                             } ?>');"><i class="fa fa-pencil"></i> &ensp; Delivery Challan</a></li>
                                        <?php
                                        $access_error = "";
                                        if (!empty($loginner_id)) {
                                            $permission_action = $delete_action;
                                            include('permission_action.php');
                                        }
                                        if (empty($access_error)) {
                                            $linked_count = 0;
                                            if ($linked_count > 0) { ?>
                                                <li><a class="dropdown-item text-secondary"><i class="fa fa-trash"></i> &ensp; Delete</a></li>
                                                <?php
                                            } else {
                                                ?>
                                                <li><a class="dropdown-item" href="Javascript:DeleteModalContent('<?php if (!empty($page_title)) {
                                                    echo $page_title;
                                                } ?>', '<?php if (!empty($list['quotation_id'])) {
                                                     echo $list['quotation_id'];
                                                 } ?>');"><i class="fa fa-trash"></i> &ensp; Delete</a></li>

                                                <?php
                                            }
                                        }
                                        ?>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php }
             } else { ?>
                <tr>
                    <td colspan="6">
                        <?php echo "Oops! There is no data"; ?>
                    </td>
                </tr>
             <?php }?>
        </tbody>
    </table>
<?php }
}

if (isset($_REQUEST['change_product_id'])) {

    $product_id = $_REQUEST['change_product_id'];

    $product_list = $obj->getTableRecords($GLOBALS['product_table'], 'product_id', $product_id, '');
    $sales_rate = $unit = $subunit = $per = $per_type = $subunit_need = "";
    if (!empty($product_list)) {
        foreach ($product_list as $P_list) {
            if (!empty($P_list['unit_id'])) {
                $unit = $P_list['unit_id'];
            }
            if (!empty($P_list['subunit_id'])) {
                $subunit = $P_list['subunit_id'];
            }
            if (!empty($P_list['sales_rate'])) {
                $sales_rate = $P_list['sales_rate'];
            }
            if (!empty($P_list['per'])) {
                $per = $P_list['per'];
            }
            if (!empty($P_list['per_type'])) {
                $per_type = $P_list['per_type'];
            }
            if (!empty($P_list['subunit_need'])) {
                $subunit_need = $P_list['subunit_need'];
            }
        }
    }

    $type_option = "";

    if (!empty($unit) && $unit != $GLOBALS['null_value']) {
        $case = $obj->getTableColumnValue($GLOBALS['unit_table'], 'unit_id', $unit, 'unit_name');
        $unit_list = [1 => $unit];
        $case = $obj->encode_decode('decrypt', $case);
        $type_option = $type_option . "<option value = '1'>" . $case . "</option>";
    }

    if (!empty($subunit) && $subunit != $GLOBALS['null_value']) {
        $piece = $obj->getTableColumnValue($GLOBALS['unit_table'], 'unit_id', $subunit, 'unit_name');
        $piece = $obj->encode_decode('decrypt', $piece);
        $type_option = $type_option . "<option value = '2'>" . $piece . "</option>";
    }


    echo $type_option . "$$" . $sales_rate . "$$" . $per . "$$" . $per_type . "$$" . $subunit_need . "$$". $unit . "%%" . $subunit ;

}

if (isset($_REQUEST['quotation_row_index'])) {
    $quotation_row_index = $_REQUEST['quotation_row_index'];
    $product = $_REQUEST['product'];
    $brand = $_REQUEST['brand'];
    $unit_type = $_REQUEST['unit_type'];
    $quantity = $_REQUEST['quantity'];
    $sales_rate = $_REQUEST['sales_rate'];
    $per = $_REQUEST['per'];
    $amount = $_REQUEST['amount'];
    $per_type = $_REQUEST['per_type'];
    $content = $_REQUEST['subunit_contains'];
    $total_qty = 0;
    $unit_subunit = explode(",", $_REQUEST['unit_subunit']);
    print_r($_REQUEST);
    ?>
    <tr class="quotation_row" id="quotation_row<?php echo $quotation_row_index; ?>">
        <th class="sno text-center px-2 py-2"><?php if (!empty($quotation_row_index)) {
            echo $quotation_row_index;
        } ?></th>

        <th class="text-center px-2 py-2">
            <?php
            $brand_name = "";
            $brand_name = $obj->getTableColumnValue($GLOBALS['brand_table'], 'brand_id', $brand, 'brand_name');
            if ($brand_name != $GLOBALS['null_value']) {
                echo $obj->encode_decode('decrypt', $brand_name);
            }
            ?>
            <input type="hidden" name="brand_id[]" id="brand_id_<?php echo $quotation_row_index;?>" value="<?php if (!empty($brand)) {
                echo $brand;
            } ?>">
        </th>
        <th class="text-center px-2 py-2">
            <?php
            $product_name = "";
            $product_name = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $product, 'product_name');
            if ($product_name != $GLOBALS['null_value']) {
                echo $obj->encode_decode('decrypt', $product_name);
            }
            ?>
            <input type="hidden" name="product_id[]" id="product_id_<?php echo $quotation_row_index;?>" value="<?php if (!empty($product)) {
                echo $product;
            } ?>">

        </th>
        <th class="text-center px-2 py-2">
            <input type="text" name="quotation_qty[]" id="quotation_qty_<?php echo $quotation_row_index;?>" class="form-control shadow-none" value="<?php if (!empty($quantity)) { echo $quantity; } ?>" onfocus="Javascript:KeyboardControls(this,'number',8,'');" onkeyup="calcRowAmount('<?php if(!empty($quotation_row_index)) { echo $quotation_row_index; } ?>');">
        </th>
        <th class="text-center px-2 py-2">
            <?php
                $unit_id = $unit_subunit[0];
                $unit_name = $obj->getTableColumnValue($GLOBALS['unit_table'],'unit_id',$unit_id,'unit_name');
                $subunit_id = $unit_subunit[1];
                $subunit_name = $obj->getTableColumnValue($GLOBALS['unit_table'],'unit_id',$subunit_id,'unit_name');
            if (!empty($unit_type)) {
                if ($unit_type == '1') {
                    $total_qty = $quantity * $content;
                    echo $obj->encode_decode('decrypt', $unit_name);
                } else if ($unit_type == '2') {
                    $total_qty = $quantity;
                    echo $obj->encode_decode('decrypt', $subunit_name);
                }
            }
            ?>
            <input type="hidden" name="quotation_unit_id[]" id="unit_id_<?php echo $quotation_row_index;?>"  value="<?php if (!empty($unit_id)) { echo $unit_id; } ?>">
            <input type="hidden" name="quotation_unit_name[]" id="unit_name_<?php echo $quotation_row_index;?>"  value="<?php if (!empty($unit_name)) { echo $unit_name; } ?>">
            <input type="hidden" name="quotation_subunit_id[]" id="subunit_id_<?php echo $quotation_row_index;?>"  value="<?php if (!empty($subunit_id)) { echo $subunit_id; } ?>">
            <input type="hidden" name="quotation_subunit_name[]" id="subunit_name_<?php echo $quotation_row_index;?>"  value="<?php if (!empty($subunit_name)) { echo $subunit_name; } ?>">
            <input type="hidden" name="quotation_unit_type[]" id="unit_type_<?php echo $quotation_row_index;?>"  value="<?php if (!empty($unit_type)) { echo $unit_type; } ?>">
        </th>
        <th class="text-center px-2 py-2">
            <input type="hidden" name="quotation_content[]" id="content_<?php echo $quotation_row_index;?>" class="form-control shadow-none" value="<?php if (!empty($content)) { echo $content; } ?>" onkeyup="calcRowAmount('<?php if(!empty($quotation_row_index)) { echo $quotation_row_index; } ?>');">
            <?php if (!empty($content)) {
                echo $content;
            } ?>
        </th>
        <th class="text-center px-2 py-2">
            <input type="hidden" name="total_qty[]" value="<?php echo $total_qty; ?>">
            <?php echo $total_qty; ?>
        </th>
        <th class="text-center px-2 py-2">
            <input type="text" name="quotation_sales_rate[]" id="quotation_sales_rate_<?php echo $quotation_row_index;?>" class="form-control shadow-none" value="<?php if (!empty($sales_rate)) { echo $sales_rate; } ?>" onfocus="Javascript:KeyboardControls(this,'number',8,'');" onkeyup="calcRowAmount('<?php if(!empty($quotation_row_index)) { echo $quotation_row_index; } ?>');">
        </th>
        <th class="text-center px-2 py-2">
            <div class="form-group">
                <div class="form-label-group in-border">
                    <div class="input-group">
                        <input type="text" name="quotation_per[]" id="quotation_per_<?php echo $quotation_row_index;?>" value="<?php if (!empty($per)) {  echo $per; } ?>" class="form-control shadow-none" onkeyup="calcRowAmount('<?php if(!empty($quotation_row_index)) { echo $quotation_row_index; } ?>');">
                        <label>Per</label>
                        <div class="input-group-append" style="width:70%!important;">
                            <select name="quotation_per_type[]" id="quotation_per_type_<?php echo $quotation_row_index;?>" class="select2 select2-danger" data-dropdown-css-class="select2-danger" onchange="calcRowAmount('<?php if(!empty($quotation_row_index)) { echo $quotation_row_index; } ?>');">
                                <option value="1" <?php if (!empty($per_type) && $per_type == '1') { echo "selected"; } ?>><?php echo $obj->encode_decode('decrypt', $unit_name); ?></option>
                                <option value="2" <?php if (!empty($per_type) && $per_type == '2') { echo "selected"; } ?>><?php echo $obj->encode_decode('decrypt', $subunit_name); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </th>
        <input type="hidden" name="quotation_amount[]" id="quotation_amount_<?php echo $quotation_row_index;?>" class="form-control shadow-none" value="<?php if (!empty($amount)) { echo $amount; } ?>">
        <th class="text-center px-2 py-2" id="quotation_amount_tr_<?php echo $quotation_row_index;?>">
            <?php if (!empty($amount)) {
                echo $amount;
            } ?>
        </th>
        <th class="text-center px-2 py-2">
            <button class="btn btn-danger" type="button"
                onclick="Javascript:DeleteRow('<?php if (!empty($quotation_row_index)) { echo $quotation_row_index; } ?>', 'quotation_row');"><i class="fa fa-trash"></i></button>
        </th>

    </tr>
    
<?php }

if(isset($_REQUEST['get_charges_row']) && $_REQUEST['get_charges_row'] == '1') {
    $colspan = "";
    if(isset($_REQUEST['charges_colspan'])) {
        $colspan = $_REQUEST['charges_colspan'];
        $colspan = trim($colspan);
    }
    $charges_list = array();
    $charges_list = $obj->getTableRecords($GLOBALS['charges_table'], '', '', '');
    ?>
    <tr class="smallfnt1 charges_row">
        <td colspan="<?php echo $colspan; ?>"></td>
        <td colspan="3">
            <div class="form-group">
                <div class="form-label-group in-border mb-0">
                    <select name="charges_id[]" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="Javascript:GetChargesType(this);">
                        <option value="">Select Charges</option>
                        <?php 
                            if(!empty($charges_list)) {
                                foreach($charges_list as $data) {
                                    if(!empty($data['charges_id']) && $data['charges_id'] != $GLOBALS['null_value']) {
                                        ?>
                                        <option value="<?php echo $data['charges_id']; ?>">
                                            <?php
                                                if(!empty($data['charges_name']) && $data['charges_name'] != $GLOBALS['null_value']) {
                                                    echo $obj->encode_decode('decrypt', $data['charges_name']);
                                                    if($data['action'] == 'minus') {
                                                        echo " (-)";
                                                    }
                                                }
                                            ?>
                                        </option>
                                        <?php
                                    }
                                }
                            }
                        ?>
                    </select>
                    <label>Select Charges</label>
                </div>
                <input type="hidden" name="charges_type[]" value="">
            </div> 
        </td>
        <td colspan="1"> 
            <div class="d-flex">
                <input type="text" class="form-control me-2" style="width: 85px;" name="charges_value[]" value="" placeholder="Value" onkeyup="Javascript:CheckCharges();"> 
                <button type="button" class="bg-danger border-0 px-3" onclick="Javascript:DeleteChargesRow(this);"><i class="fa fa-trash fw-bold text-white"></i></button>
            </div>
        </td>
        <td colspan="1">
            <div class="text-end"><span class="charges_total"></span></div>
        </td>
        <td></td>
    </tr>
    <script>
        if(jQuery('.charges_row').length > 0) {
            jQuery('.charges_row').find('select').select2();
        }
    </script>
    <?php
}

if(isset($_REQUEST['get_charges_type'])) {
    $charges_id = $_REQUEST['get_charges_type'];
    $charges_id = trim($charges_id);

    $charges_type = "";
    if(!empty($charges_id)) {
        $charges_type = $obj->getTableColumnValue($GLOBALS['charges_table'], 'charges_id', $charges_id, 'action');
        if(!empty($charges_type) && $charges_type != $GLOBALS['null_value']) {
            echo $obj->encode_decode('decrypt', $charges_type);
        }
    }
}

if(isset($_POST['form_name'])) {
    $quotation_date = ""; $quotation_date_error = ""; $quotation_number = ""; $quotation_number_error = "";  $party_id = ""; $party_id_error = ""; $product_ids = array(); $product_names = array(); $brand_ids = array(); $brand_names = array(); $product_quantity = array(); $unit_ids = array(); $unit_names = array(); $subunit_contains = array();  $subunit_ids = array(); $subunit_names = array();
    $product_rate = array(); $per = array(); $per_type = array(); $rate_per_unit = array(); $product_amount = array(); $sub_total = 0; $charges_id = array(); $charges_names = array(); $price_type = ""; $price_type_error = "";
    $charges_values = array(); $charges_type = array(); $charges_total = array();
    $total_amount = 0; $round_off = 0; $grand_total = 0; $total_unit_qty = 0;
    $agent_id = ""; $agent_id_error = "";
    $valid_quotation = ""; $form_name = ""; $edit_id = ""; $current_date = date('Y-m-d'); $quotation_error = ""; $draft = "0";
    // print_r($_POST);
    if(isset($_POST['form_name'])) {
        $form_name = $_POST['form_name'];
        $form_name = trim($form_name);
       
    }
    if(isset($_POST['edit_id'])) {
        $edit_id = $_POST['edit_id'];
        $edit_id = trim($edit_id);
    }
    if (isset($_POST['draft'])) {
        $draft = $_POST['draft'];
        $draft = trim($draft);
    }
    if(isset($_POST['quotation_date'])) {
        $quotation_date = $_POST['quotation_date'];
        $quotation_date = trim($quotation_date);
        $quotation_date_error = $valid->valid_date($quotation_date, 'Bill Date', '1');
        if(empty($quotation_date_error)) {
            if($quotation_date > $current_date) {
                $quotation_date_error = "Future Date not allowed";
            }
        }
    }
    if(!empty($quotation_date_error)) {
        if(!empty($valid_quotation)) {
            $valid_quotation = $valid_quotation." ".$valid->error_display($form_name, "quotation_date", $quotation_date_error, 'text');
        }
        else {
            $valid_quotation = $valid->error_display($form_name, "quotation_date", $quotation_date_error, 'text');
        }
    }

    if(isset($_POST['party_id'])) {
        $party_id = $_POST['party_id'];
        $party_id = trim($party_id);
        $party_id_error = $valid->common_validation($party_id, 'Party', 'select');
    }
    if(!empty($party_id_error)) {
        if(!empty($valid_quotation)) {
            $valid_quotation = $valid_quotation." ".$valid->error_display($form_name, "party_id", $party_id_error, 'select');
        }
        else {
            $valid_quotation = $valid->error_display($form_name, "party_id", $party_id_error, 'select');
        }
    }
    if(isset($_POST['agent_id'])) {
        $agent_id = $_POST['agent_id'];
        $agent_id = trim($agent_id);
        if(!empty($agent_id)) {
            $agent_id_error = $valid->common_validation($agent_id, 'Agent', 'select');
        }
    }
    if(!empty($agent_id_error)) {
        if(!empty($valid_quotation)) {
            $valid_quotation = $valid_quotation." ".$valid->error_display($form_name, "agent_id", $agent_id_error, 'select');
        }
        else {
            $valid_quotation = $valid->error_display($form_name, "agent_id", $agent_id_error, 'select');
        }
    }
   
    if(isset($_POST['product_id'])) {
        $product_ids = $_POST['product_id'];
        $product_ids = array_reverse($product_ids);
    }
    if(isset($_POST['brand_id'])) {
        $brand_ids = $_POST['brand_id'];
        $brand_ids = array_reverse($brand_ids);
    }
    if(isset($_POST['quotation_qty'])) {
        $product_quantity = $_POST['quotation_qty'];
        $product_quantity = array_reverse($product_quantity);
    }
    if(isset($_POST['quotation_unit_type'])) {
        $unit_types = $_POST['quotation_unit_type'];
        $unit_types = array_reverse($unit_types);
    }
    if(isset($_POST['quotation_unit_id'])) {
        $unit_ids = $_POST['quotation_unit_id'];
        $unit_ids = array_reverse($unit_ids);
    }
    if(isset($_POST['quotation_subunit_id'])) {
        $subunit_ids = $_POST['quotation_subunit_id'];
        $subunit_ids = array_reverse($subunit_ids);
    }
    if(isset($_POST['quotation_subunit_name'])) {
        $subunit_names = $_POST['quotation_subunit_name'];
        $subunit_names = array_reverse($subunit_names);
    }
    if(isset($_POST['quotation_content'])) {
        $subunit_contains = $_POST['quotation_content'];
        $subunit_contains = array_reverse($subunit_contains);
    }
    if(isset($_POST['quotation_sales_rate'])) {
        $product_rate = $_POST['quotation_sales_rate'];
        $product_rate = array_reverse($product_rate);
    }
    if(isset($_POST['quotation_per'])) {
        $per = $_POST['quotation_per'];
        $per = array_reverse($per);
    }
    if(isset($_POST['quotation_per_type'])) {
        $per_type = $_POST['quotation_per_type'];
        $per_type = array_reverse($per_type);
    }
    if(isset($_POST['total_qty'])) {
        $total_subunit_quantity = $_POST['total_qty'];
        $total_subunit_quantity = array_reverse($total_subunit_quantity);
    }
    if(!empty($product_ids)) {
        for($i=0; $i < count($product_ids); $i++) {
            $product_ids[$i] = trim($product_ids[$i]);
            $product_name = "";
            $product_name = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $product_ids[$i], 'product_name');


            $product_unit_id = "";
            $product_unit_id = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $product_ids[$i], 'unit_id');

            $product_subunit_id = "";
            $product_subunit_id = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $product_ids[$i], 'subunit_id');

            $product_names[$i] = $product_name;

            $brand_ids[$i] = trim($brand_ids[$i]);
            if(isset($brand_ids[$i])) {
                $brand_error = "";
                $brand_error = $valid->common_validation($brand_ids[$i], 'Brand', 'select');
                if(!empty($brand_error)) {
                    if(!empty($valid_quotation)) {
                        $valid_quotation = $valid_quotation." ".$valid->row_error_display($form_name, 'brand_id[]', $brand_error, 'text', 'quotation_row', ($i+1));
                    }
                    else {
                        $valid_quotation = $valid->row_error_display($form_name, 'brand_id[]', $brand_error, 'text', 'quotation_row', ($i+1));
                    }
                }
            }

            $product_quantity[$i] = trim($product_quantity[$i]);
            if(isset($product_quantity[$i])) {
                $quantity_error = "";
                $quantity_error = $valid->valid_number($product_quantity[$i], 'Qty', '1', '5');
                if(!empty($quantity_error)) {
                    if(!empty($valid_quotation)) {
                        $valid_quotation = $valid_quotation." ".$valid->row_error_display($form_name, 'quotation_qty[]', $quantity_error, 'text', 'quotation_row', ($i+1));
                    }
                    else {
                        $valid_quotation = $valid->row_error_display($form_name, 'quotation_qty[]', $quantity_error, 'text', 'quotation_row', ($i+1));
                    }
                }
            }

            $subunit_contains[$i] = trim($subunit_contains[$i]);
            if(isset($subunit_contains[$i])) {
                $contains_error = ""; $required = 0;
                if($unit_ids[$i] == $product_unit_id && $product_subunit_id != $GLOBALS['null_value']) {
                    $required = 1;
                }
                $contains_error = $valid->valid_number($subunit_contains[$i], 'Contains', $required, '5');
                if(!empty($contains_error)) {
                    if(!empty($valid_quotation)) {
                        $valid_quotation = $valid_quotation." ".$valid->row_error_display($form_name, 'quotation_content[]', $contains_error, 'text', 'quotation_row', ($i+1));
                    }
                    else {
                        $valid_quotation = $valid->row_error_display($form_name, 'quotation_content[]', $contains_error, 'text', 'quotation_row', ($i+1));
                    }
                }
            }

            $product_rate[$i] = trim($product_rate[$i]);
            if(isset($product_rate[$i])) {
                $rate_error = "";
                $rate_error = $valid->valid_price($product_rate[$i], 'Rate', '1', '99999');
                if(!empty($rate_error)) {
                    if(!empty($valid_quotation)) {
                        $valid_quotation = $valid_quotation." ".$valid->row_error_display($form_name, 'quotation_sales_rate[]', $rate_error, 'text', 'quotation_row', ($i+1));
                    }
                    else {
                        $valid_quotation = $valid->row_error_display($form_name, 'quotation_sales_rate[]', $rate_error, 'text', 'quotation_row', ($i+1));
                    }
                }
            }

            $per[$i] = trim($per[$i]);
            if(isset($per[$i])) {
                $per_error = "";
                $per_error = $valid->valid_number($per[$i], 'Per', '1', '5');
                if(!empty($per_error)) {
                    if(!empty($valid_quotation)) {
                        $valid_quotation = $valid_quotation." ".$valid->row_error_display($form_name, 'quotation_per[]', $per_error, 'text', 'quotation_row', ($i+1));
                    }
                    else {
                        $valid_quotation = $valid->row_error_display($form_name, 'quotation_per[]', $per_error, 'text', 'quotation_row', ($i+1));
                    }
                }
            }

            $per_type[$i] = trim($per_type[$i]);
            if(isset($per_type[$i])) {
                $per_type_error = "";
                $per_type_error = $valid->common_validation($per_type[$i], 'Unit Type', 'select');
                if(!empty($per_type_error)) {
                    if(!empty($valid_quotation)) {
                        $valid_quotation = $valid_quotation." ".$valid->row_error_display($form_name, 'quotation_per_type[]', $per_type_error, 'text', 'quotation_row', ($i+1));
                    }
                    else {
                        $valid_quotation = $valid->row_error_display($form_name, 'quotation_per_type[]', $per_type_error, 'text', 'quotation_row', ($i+1));
                    }
                }
            }
            if ($draft == "1") {
                $valid_quotation = "";
            }
            if(empty($valid_quotation)) {
                $brand_name = "";
                $brand_name = $obj->getTableColumnValue($GLOBALS['brand_table'], 'brand_id', $brand_ids[$i], 'brand_name');
                $brand_names[$i] = $brand_name;

                $unit_name = "";
                $unit_name = $obj->getTableColumnValue($GLOBALS['unit_table'], 'unit_id', $unit_ids[$i], 'unit_name');
                $unit_names[$i] = $unit_name;

                $total_qty = 0; 
                $amount = 0;
                if($per_type[$i] == '1' || $per_type[$i] == 1) {
                    $rate_per_case = $product_rate[$i] / $per[$i];
                    $rate_per_piece = $rate_per_case / (int)$subunit_contains[$i];
                } else {
                    $rate_per_piece = $product_rate[$i] / $per[$i];
                    $rate_per_case = (int)$subunit_contains[$i] * $rate_per_piece;
                }
                if($unit_types[$i] == '1' || $unit_types[$i] == 1) {
                    $amount = (int)$product_quantity[$i] * $rate_per_case;
                } else {
                    $amount = (int)$product_quantity[$i] * $rate_per_piece;
                }
                $amount = number_format($amount, 2);
                $amount = str_replace(",", "", $amount);
                $product_amount[$i] = $amount;
                $sub_total += $amount;
                if($unit_ids[$i] == $product_unit_id) {
                    $total_unit_qty += (int)$product_quantity[$i];
                }
                else if($unit_ids[$i] == $product_subunit_id) {
                    $total_subunit_qty += (int)$product_quantity[$i];
                }
                for($j=$i+1; $j < count($product_ids); $j++) {
                    if ($product_ids[$i] == $product_ids[$j] &&
                        $brand_ids[$i] == $brand_ids[$j] &&
                        $unit_types[$i] == $unit_types[$j] &&
                        $subunit_contains[$i] == $subunit_contains[$j]) {
                            $quotation_error = "Same Combination exists in Row No.".($i+1)." & ".($j+1);
                            break;
                    }
                }
            }
        }
    }
    else {
        $quotation_error = "Select Products";
    }
    $total_amount = $sub_total;
    if(isset($_POST['charges_id'])) {
        $charges_id = $_POST['charges_id'];
    }
    if(isset($_POST['charges_type'])) {
        $charges_type = $_POST['charges_type'];
    }
    if(isset($_POST['charges_value'])) {
        $charges_values = $_POST['charges_value'];
    }
    if(!empty($charges_id) && empty($quotation_error)) {
        for($i=0; $i < count($charges_id); $i++) {
            $charges_id[$i] = trim($charges_id[$i]);
            if(!empty($charges_id[$i])) {
                $charges_name = ""; $charges_value = 0;
                $charges_name = $obj->getTableColumnValue($GLOBALS['charges_table'], 'charges_id', $charges_id[$i], 'charges_name');
                $charges_names[$i] = $charges_name;
                $charges_type[$i] = trim($charges_type[$i]);
                $charges_values[$i] = trim($charges_values[$i]);
                if(isset($charges_values[$i])) {
                    $charges_error = "";
                    if(strpos($charges_values[$i], '%') !== false) {
                        $charges_value = str_replace('%', '', $charges_values[$i]);
                        $charges_value = trim($charges_value);
                    }
                    else {
                        $charges_value = $charges_values[$i];
                    }
                    $charges_error = $valid->valid_price($charges_value, ($obj->encode_decode('decrypt', $charges_name)), 1, '');
                    if(!empty($charges_error)) {
                        if(!empty($quotation_error)) {
                            $quotation_error = $quotation_error."<br>".$charges_error;
                        }
                        else {
                            $quotation_error = $charges_error;
                        }
                    }
                    else {
                        if(strpos($charges_values[$i], '%') !== false) {
                            $charges_value = ($charges_value * $total_amount) / 100;
                            $charges_value = number_format($charges_value, 2);
                            $charges_value = str_replace(",", "", $charges_value);
                        }
                    }
                }
                if(empty($quotation_error)) {
                    $charges_total[$i] = $charges_value;
                    if($charges_type[$i] == "minus") {
                        $total_amount -= $charges_value;
                    }
                    else if($charges_type[$i] == "plus") {
                        $total_amount += $charges_value;
                    }
                }
            }
            if(empty($quotation_error)) {
                for($j=$i+1; $j < count($charges_id); $j++) {
                    if($charges_id[$i] == $charges_id[$j]) {
                        $quotation_error = "Same Charges Repeatedly Exists";
                        break;
                    }
                }
            }
        }
    }
   

    $total_amount = number_format((float)$total_amount, 2, '.', '');
    $grand_total = $total_amount;

    $round_off = 0;
    if(!empty($grand_total)) {	
        if (strpos( $grand_total, "." ) !== false) {
            $pos = strpos($grand_total, ".");
            $decimal = substr($grand_total, ($pos + 1), strlen($grand_total));
            if($decimal != "00") {
                if(strlen($decimal) == 1) {
                    $decimal = $decimal."0";
                }
                if($decimal >= 50) {				
                    $round_off = 100 - $decimal;
                    if($round_off < 10) {
                        $round_off = "0.0".$round_off;
                    }
                    else {
                        $round_off = "0.".$round_off;
                    }
                    
                    $grand_total = $grand_total + $round_off;
                }
                else {
                    $decimal = "0.".$decimal;
                    $round_off = "-".$decimal;
                    $grand_total = $grand_total - $decimal;
                }
            }
        }
    }



    $party_error = "";
    if ($draft == "1" && empty($party_id)) {
        $valid_quotation = "";
        $quotation_error = "";
        $party_error = "Select Party Name";
    } else if ($draft == "1" && !empty($party_id)) {
        $valid_quotation = "";
        $quotation_error = "";
    }
    $result = "";
    if(empty($valid_quotation) && empty($quotation_error) && empty($party_error)) {
        $check_user_id_ip_address = 0;
        $check_user_id_ip_address = $obj->check_user_id_ip_address();	
        if(preg_match("/^\d+$/", $check_user_id_ip_address)) { 
            $party_name_mobile_city = ""; $party_details = "";
            $agent_name_mobile_city = ""; $agent_details = "";
            if(!empty($quotation_number)) {
                $quotation_number = $obj->encode_decode('encrypt', $quotation_number);
            }
            else {
                $quotation_number = $GLOBALS['null_value'];
            }
            if(!empty($quotation_date)) {
                $quotation_date = date('Y-m-d', strtotime($quotation_date));
            }
            if(!empty($agent_id)) {
                $agent_name_mobile_city = $obj->getTableColumnValue($GLOBALS['agent_table'], 'agent_id', $agent_id, 'name_mobile_city');
                $agent_details = $obj->getTableColumnValue($GLOBALS['agent_table'], 'agent_id', $agent_id, 'agent_details');
            }
            else {
                $agent_id = $GLOBALS['null_value'];
                $agent_name_mobile_city = $GLOBALS['null_value'];
                $agent_details = $GLOBALS['null_value'];
            }
            
            if(!empty($party_id)) {
                $party_name_mobile_city = $obj->getTableColumnValue($GLOBALS['party_table'], 'party_id', $party_id, 'name_mobile_city');
                $party_details = $obj->getTableColumnValue($GLOBALS['party_table'], 'party_id', $party_id, 'party_details');
            }
            else {
                $party_id = $GLOBALS['null_value'];
                $party_name_mobile_city = $GLOBALS['null_value'];
                $party_details = $GLOBALS['null_value'];
            }
            if(!empty($product_ids)) {
                $product_ids = array_reverse($product_ids);
                $product_ids = implode(",", $product_ids);
            }
            else {
                $product_ids = $GLOBALS['null_value'];
            }
            if(!empty($product_names)) {
                $product_names = array_reverse($product_names);
                $product_names = implode(",", $product_names);
            }
            else {
                $product_names = $GLOBALS['null_value'];
            }
            if(!empty($brand_ids)) {
                $brand_ids = array_reverse($brand_ids);
                $brand_ids = implode(",", $brand_ids);
            }
            else {
                $brand_ids = $GLOBALS['null_value'];
            }
            if(!empty($brand_names)) {
                $brand_names = array_reverse($brand_names);
                $brand_names = implode(",", $brand_names);
            }
            else {
                $brand_names = $GLOBALS['null_value'];
            }
            if(!empty($unit_ids)) {
                $unit_ids = array_reverse($unit_ids);
                $unit_ids = implode(",", $unit_ids);
            }
            else {
                $unit_ids = $GLOBALS['null_value'];
            }
            if(!empty($unit_names)) {
                $unit_names = array_reverse($unit_names);
                $unit_names = implode(",", $unit_names);
            }
            else {
                $unit_names = $GLOBALS['null_value'];
            }
            if(!empty($subunit_ids)) {
                $subunit_ids = array_reverse($subunit_ids);
                $subunit_ids = implode(",", $subunit_ids);
            }
            else {
                $subunit_ids = $GLOBALS['null_value'];
            }
            if(!empty($subunit_names)) {
                $subunit_names = array_reverse($subunit_names);
                $subunit_names = implode(",", $subunit_names);
            }
            else {
                $subunit_names = $GLOBALS['null_value'];
            }
            if(!empty($unit_types)) {
                $unit_types = array_reverse($unit_types);
                $unit_types = implode(",", $unit_types);
            }
            else {
                $unit_types = $GLOBALS['null_value'];
            }
            if(!empty(array_filter($subunit_contains, fn($value) => $value !== ""))) {
                $subunit_contains = array_reverse($subunit_contains);
                $subunit_contains = implode(",", $subunit_contains);
            }
            else {
                $subunit_contains = $GLOBALS['null_value'];
            }
            if(!empty($product_quantity)) {
                $product_quantity = array_reverse($product_quantity);
                $product_quantity = implode(",", $product_quantity);
            }
            else {
                $product_quantity = $GLOBALS['null_value'];
            }
            if(!empty($product_rate)) {
                $product_rate = array_reverse($product_rate);
                $product_rate = implode(",", $product_rate);
            }
            else {
                $product_rate = $GLOBALS['null_value'];
            }
            if(!empty($per)) {
                $per = array_reverse($per);
                $per = implode(",", $per);
            }
            else {
                $per = $GLOBALS['null_value'];
            }
            if(!empty($per_type)) {
                $per_type = array_reverse($per_type);
                $per_type = implode(",", $per_type);
            }
            else {
                $per_type = $GLOBALS['null_value'];
            }
            if(!empty($rate_per_unit)) {
                $rate_per_unit = array_reverse($rate_per_unit);
                $rate_per_unit = implode(",", $rate_per_unit);
            }
            else {
                $rate_per_unit = $GLOBALS['null_value'];
            }
            if(!empty($product_amount)) {
                $product_amount = array_reverse($product_amount);
                $product_amount = implode(",", $product_amount);
            }
            else {
                $product_amount = $GLOBALS['null_value'];
            }
            if(!empty(array_filter($charges_id, fn($value) => $value !== ""))) {
                $charges_id = implode(",", $charges_id);
            }
            else {
                $charges_id = $GLOBALS['null_value'];
            }
            if(!empty(array_filter($charges_type, fn($value) => $value !== ""))) {
                $charges_type = implode(",", $charges_type);
            }
            else {
                $charges_type = $GLOBALS['null_value'];
            }
            if(!empty(array_filter($charges_values, fn($value) => $value !== ""))) {
                $charges_values = implode(",", $charges_values);
            }
            else {
                $charges_values = $GLOBALS['null_value'];
            }
            if(!empty(array_filter($charges_total, fn($value) => $value !== ""))) {
                $charges_total = implode(",", $charges_total);
            }
            else {
                $charges_total = $GLOBALS['null_value'];
            }
            if(!empty($total_unit_qty)) {
                $total_quantity = $total_unit_qty." Case";
            }
            else {
                $total_unit_qty = $GLOBALS['null_value'];
            }
            if(!empty($total_subunit_qty)) {
                if(!empty($total_quantity)) {
                    $total_quantity = $total_quantity." ".$total_subunit_qty." Pcs";
                }
                else {
                    $total_quantity = $total_subunit_qty." Pcs";
                }
            }
            else {
                $total_subunit_qty = $GLOBALS['null_value'];
            }
            $grand_qty = 0;
            if(!empty($total_subunit_quantity)) {
                $total_subunit_quantity = array_reverse($total_subunit_quantity);
                for($i = 0; $i< count($total_subunit_quantity); $i++) {
                    $total_subunit_quantity[$i] = trim($total_subunit_quantity[$i]);
                    if(!empty($total_subunit_quantity[$i])) {
                        $grand_qty += (int)$total_subunit_quantity[$i];
                    }
                }
                $total_subunit_quantity = implode(",", $total_subunit_quantity);
            }
            else {
                $total_subunit_quantity = $GLOBALS['null_value'];
            }


            $created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
            $creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
            $bill_company_id = $GLOBALS['bill_company_id'];
            $null_value = $GLOBALS['null_value'];
            $quotation_number = $null_value;

            if(empty($edit_id)) {
                $action = "";
                if(!empty($party_name_mobile_city) && $party_name_mobile_city != $GLOBALS['null_value']) {
                    $action = "New Quotation Created. Party - ".($obj->encode_decode('decrypt', $party_name_mobile_city));
                }
                if(empty($draft) && $draft != "1") {
                    $quotation_number = $obj->automate_number($GLOBALS['quotation_table'], 'quotation_number');
                }
                $columns = array(); $values = array();
                $columns = array('created_date_time', 'creator', 'creator_name', 'bill_company_id', 'quotation_id', 'quotation_number', 'quotation_date',  'party_id', 'party_name_mobile_city', 'party_details', 'agent_id', 'agent_name_mobile_city', 'agent_details', 'product_id', 'product_name', 'brand_id', 'brand_name', 'subunit_contains', 'unit_id', 'unit_name', 'subunit_id', 'subunit_name', 'product_quantity', 'unit_type', 'product_rate', 'per', 'per_type', 'product_amount', 'rate_per_unit', 'sub_total', 'charges_id', 'charges_type', 'charges_value', 'charges_total',  'total_amount', 'round_off', 'grand_total','total_unit_qty', 'total_subunit_qty','total_quantity', 'total_qty','grand_qty', 'drafted', 'cancelled', 'deleted');
                $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$bill_company_id."'", "'".$null_value."'", "'".$quotation_number."'", "'".$quotation_date."'", "'".$party_id."'", "'".$party_name_mobile_city."'", "'".$party_details."'","'".$agent_id."'", "'".$agent_name_mobile_city."'", "'".$agent_details."'", "'".$product_ids."'", "'".$product_names."'", "'".$brand_ids."'", "'".$brand_names."'", "'".$subunit_contains."'", "'".$unit_ids."'", "'".$unit_names."'",  "'".$subunit_ids."'", "'".$subunit_names."'", "'".$product_quantity."'", "'".$unit_types."'",  "'".$product_rate."'", "'".$per."'", "'".$per_type."'", "'".$product_amount."'", "'".$rate_per_unit."'", "'".$sub_total."'", "'".$charges_id."'", "'".$charges_type."'", "'".$charges_values."'", "'".$charges_total."'", "'".$total_amount."'", "'".$round_off."'", "'".$grand_total."'", "'".$total_unit_qty."'", "'".$total_subunit_qty."'", "'".$total_quantity."'","'".$total_subunit_quantity."'", "'".$grand_qty."'", "'".$draft."'", "'0'", "'0'");

                $quotation_insert_id = $obj->InsertSQL($GLOBALS['quotation_table'], $columns, $values,'quotation_id', '', $action);

                if(preg_match("/^\d+$/", $quotation_insert_id)) {
                    if ($draft != "1") {
                        $quotation_id = $obj->getTableColumnValue($GLOBALS['quotation_table'], 'id', $quotation_insert_id, 'quotation_id');
                        $quotation_number = $obj->getTableColumnValue($GLOBALS['quotation_table'], 'id', $quotation_insert_id, 'quotation_number');

                        if(!empty($product_ids)) {
                            $product_ids = explode(",", $product_ids);
                        }
                        else {
                            $product_ids = $GLOBALS['null_value'];
                        }
                        if(!empty($product_names)) {
                            $product_names = explode(",", $product_names);
                        }
                        else {
                            $product_names = $GLOBALS['null_value'];
                        }
                        if(!empty($brand_ids)) {
                            $brand_ids = explode(",", $brand_ids);
                        }
                        else {
                            $brand_ids = $GLOBALS['null_value'];
                        }
                        if(!empty($brand_names)) {
                            $brand_names = explode(",", $brand_names);
                        }
                        else {
                            $brand_names = $GLOBALS['null_value'];
                        }
                        if(!empty($unit_ids)) {
                            $unit_ids = explode(",", $unit_ids);
                        }
                        else {
                            $unit_ids = $GLOBALS['null_value'];
                        }
                        if(!empty($unit_names)) {
                            $unit_names = explode(",", $unit_names);
                        }
                        else {
                            $unit_names = $GLOBALS['null_value'];
                        }
                        if(!empty($subunit_ids)) {
                            $subunit_ids = explode(",", $subunit_ids);
                        }
                        else {
                            $subunit_ids = $GLOBALS['null_value'];
                        }
                        if(!empty($subunit_names)) {
                            $subunit_names = explode(",", $subunit_names);
                        }
                        else {
                            $subunit_names = $GLOBALS['null_value'];
                        }
                        if(!empty($unit_types)) {
                            $unit_types = explode(",", $unit_types);
                        }
                        else {
                            $unit_types = $GLOBALS['null_value'];
                        }
                        if(!empty($subunit_contains)) {
                            $subunit_contains = explode(",", $subunit_contains);
                        }
                        else {
                            $subunit_contains = $GLOBALS['null_value'];
                        }
                        if(!empty($product_quantity)) {
                            $product_quantity = explode(",", $product_quantity);
                        }
                        else {
                            $product_quantity = $GLOBALS['null_value'];
                        }
                        if(!empty($product_rate)) {
                            $product_rate = explode(",", $product_rate);
                        }
                        else {
                            $product_rate = $GLOBALS['null_value'];
                        }
                        if(!empty($per)) {
                            $per = explode(",", $per);
                        }
                        else {
                            $per = $GLOBALS['null_value'];
                        }
                        if(!empty($per_type)) {
                            $per_type = explode(",", $per_type);
                        }
                        else {
                            $per_type = $GLOBALS['null_value'];
                        }
                        if(!empty($rate_per_unit)) {
                            $rate_per_unit = explode(",", $rate_per_unit);
                        }
                        else {
                            $rate_per_unit = $GLOBALS['null_value'];
                        }
                        if(!empty($product_amount)) {
                            $product_amount = explode(",", $product_amount);
                        }
                        else {
                            $product_amount = $GLOBALS['null_value'];
                        }

                        if(!empty($product_ids) && $product_ids != $GLOBALS['null_value']) {
                            for($i=0; $i < count($product_ids); $i++) {
                                $columns = array(); $values = array();
                                $columns = array('created_date_time', 'creator', 'creator_name', 'bill_company_id',  'quotation_number', 'product_id', 'product_name', 'brand_id', 'brand_name', 'subunit_contains', 'unit_id', 'unit_name', 'subunit_id', 'subunit_name', 'product_quantity', 'unit_type', 'product_rate', 'per', 'per_type', 'product_amount',  'deleted');
                                $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$bill_company_id."'", "'".$quotation_number."'", "'".$product_ids[$i]."'", "'".$product_names[$i]."'", "'".$brand_ids[$i]."'", "'".$brand_names[$i]."'", "'".$subunit_contains[$i]."'", "'".$unit_ids[$i]."'", "'".$unit_names[$i]."'",  "'".$subunit_ids[$i]."'", "'".$subunit_names[$i]."'", "'".$product_quantity[$i]."'", "'".$unit_types[$i]."'",  "'".$product_rate[$i]."'", "'".$per[$i]."'", "'".$per_type[$i]."'", "'".$product_amount[$i]."'", "'0'");
                                $quotation_insert_id = $obj->InsertSQL($GLOBALS['quotation_product_table'], $columns, $values,'', '', $action);
                            }
                        }

                        $result = array('number' => '1', 'msg' => 'Quotation Successfully Created');
                    } else {

                        $result = array('number' => '1', 'msg' => 'Quotation Saved in Draft');
                    }
                }
                else {
                    $result = array('number' => '2', 'msg' => $quotation_insert_id);
                }
            }
            else {
                $getUniqueID = "";
                $getUniqueID = $obj->getTableColumnValue($GLOBALS['quotation_table'], 'quotation_id', $edit_id, 'id');
                $quotation_number = $obj->getTableColumnValue($GLOBALS['quotation_table'], 'quotation_id', $edit_id, 'quotation_number');
                if (empty($draft) || $draft == '0') {
                    if (empty($quotation_number) || $quotation_number == $null_value) {
                        $quotation_number = $obj->automate_number($GLOBALS['quotation_table'], 'quotation_number');
                    }
                }
                if (empty($quotation_number)) {
                    $quotation_number = $null_value;
                }
                if(preg_match("/^\d+$/", $getUniqueID)) {
                    $action = "";
                    if(!empty($party_name_mobile_city) && $party_name_mobile_city != $GLOBALS['null_value']) {
                        $action = "Quotation Updated. Party - ".($obj->encode_decode('decrypt', $party_name_mobile_city));
                    }

                    $columns = array(); $values = array();		
                    $columns = array('creator_name', 'quotation_number', 'quotation_date', 'party_id', 'party_name_mobile_city', 'party_details','agent_id', 'agent_name_mobile_city', 'agent_details',  'product_id', 'product_name', 'brand_id', 'brand_name', 'subunit_contains', 'unit_id', 'unit_name','subunit_id', 'subunit_name', 'product_quantity', 'unit_type', 'product_rate', 'per', 'per_type', 'product_amount', 'rate_per_unit', 'sub_total', 'charges_id', 'charges_type', 'charges_value', 'charges_total',  'total_amount', 'round_off', 'grand_total', 'total_unit_qty', 'total_subunit_qty', 'total_quantity', 'total_qty','grand_qty', 'drafted');
                    $values = array("'".$creator_name."'", "'".$quotation_number."'", "'".$quotation_date."'",  "'".$party_id."'", "'".$party_name_mobile_city."'", "'".$party_details."'", "'".$agent_id."'", "'".$agent_name_mobile_city."'", "'".$agent_details."'", "'".$product_ids."'", "'".$product_names."'", "'".$brand_ids."'", "'".$brand_names."'", "'".$subunit_contains."'", "'".$unit_ids."'", "'".$unit_names."'", "'".$subunit_ids."'", "'".$subunit_names."'", "'".$product_quantity."'", "'".$unit_types."'", "'".$product_rate."'", "'".$per."'", "'".$per_type."'", "'".$product_amount."'", "'".$rate_per_unit."'", "'".$sub_total."'", "'".$charges_id."'", "'".$charges_type."'", "'".$charges_values."'", "'".$charges_total."'", "'".$total_amount."'", "'".$round_off."'", "'".$grand_total."'", "'".$total_unit_qty."'", "'".$total_subunit_qty."'",  "'".$total_quantity."'", "'".$total_subunit_quantity."'", "'".$grand_qty."'", "'".$draft."'");

                    $quotation_update_id = $obj->UpdateSQL($GLOBALS['quotation_table'], $getUniqueID, $columns, $values, $action);

                    if(preg_match("/^\d+$/", $quotation_update_id)) {
                        if ($draft != "1") {
                            $quotation_id = $edit_id;
                            $quotation_number = $obj->getTableColumnValue($GLOBALS['quotation_table'], 'quotation_id', $edit_id, 'quotation_number');
                            if(!empty($product_ids)) {
                                $product_ids = explode(",", $product_ids);
                            }
                            else {
                                $product_ids = $GLOBALS['null_value'];
                            }
                            if(!empty($product_names)) {
                                $product_names = explode(",", $product_names);
                            }
                            else {
                                $product_names = $GLOBALS['null_value'];
                            }
                            if(!empty($brand_ids)) {
                                $brand_ids = explode(",", $brand_ids);
                            }
                            else {
                                $brand_ids = $GLOBALS['null_value'];
                            }
                            if(!empty($brand_names)) {
                                $brand_names = explode(",", $brand_names);
                            }
                            else {
                                $brand_names = $GLOBALS['null_value'];
                            }
                            if(!empty($unit_ids)) {
                                $unit_ids = explode(",", $unit_ids);
                            }
                            else {
                                $unit_ids = $GLOBALS['null_value'];
                            }
                            if(!empty($unit_names)) {
                                $unit_names = explode(",", $unit_names);
                            }
                            else {
                                $unit_names = $GLOBALS['null_value'];
                            }
                            if(!empty($subunit_ids)) {
                                $subunit_ids = explode(",", $subunit_ids);
                            }
                            else {
                                $subunit_ids = $GLOBALS['null_value'];
                            }
                            if(!empty($subunit_names)) {
                                $subunit_names = explode(",", $subunit_names);
                            }
                            else {
                                $subunit_names = $GLOBALS['null_value'];
                            }
                            if(!empty($unit_types)) {
                                $unit_types = explode(",", $unit_types);
                            }
                            else {
                                $unit_types = $GLOBALS['null_value'];
                            }
                            if(!empty($subunit_contains)) {
                                $subunit_contains = explode(",", $subunit_contains);
                            }
                            else {
                                $subunit_contains = $GLOBALS['null_value'];
                            }
                            if(!empty($product_quantity)) {
                                $product_quantity = explode(",", $product_quantity);
                            }
                            else {
                                $product_quantity = $GLOBALS['null_value'];
                            }
                            if(!empty($product_rate)) {
                                $product_rate = explode(",", $product_rate);
                            }
                            else {
                                $product_rate = $GLOBALS['null_value'];
                            }
                            if(!empty($per)) {
                                $per = explode(",", $per);
                            }
                            else {
                                $per = $GLOBALS['null_value'];
                            }
                            if(!empty($per_type)) {
                                $per_type = explode(",", $per_type);
                            }
                            else {
                                $per_type = $GLOBALS['null_value'];
                            }
                            if(!empty($rate_per_unit)) {
                                $rate_per_unit = explode(",", $rate_per_unit);
                            }
                            else {
                                $rate_per_unit = $GLOBALS['null_value'];
                            }
                            if(!empty($product_amount)) {
                                $product_amount = explode(",", $product_amount);
                            }
                            else {
                                $product_amount = $GLOBALS['null_value'];
                            }
                            if(!empty($product_ids) && $product_ids != $GLOBALS['null_value']) {
                                $quotation_product_list = $obj->getTableRecords($GLOBALS['quotation_product_table'], 'quotation_number', $quotation_number, '');
                                $quotation_product_all_id =[];
                                for($i=0; $i < count($product_ids); $i++) {
                                    $getUniqueID = "";
                                    $getUniqueID = $obj->getTableQuotationProduct($quotation_number,$product_ids[$i],$brand_ids[$i],$unit_types[$i]);
                                    $columns = array(); $values = array();
                                    $columns = array('created_date_time', 'creator', 'creator_name', 'bill_company_id',  'quotation_number', 'product_id', 'product_name', 'brand_id', 'brand_name', 'subunit_contains', 'unit_id', 'unit_name', 'subunit_id', 'subunit_name', 'product_quantity', 'unit_type', 'product_rate', 'per', 'per_type', 'product_amount',  'deleted');
                                    $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$bill_company_id."'", "'".$quotation_number."'", "'".$product_ids[$i]."'", "'".$product_names[$i]."'", "'".$brand_ids[$i]."'", "'".$brand_names[$i]."'", "'".$subunit_contains[$i]."'", "'".$unit_ids[$i]."'", "'".$unit_names[$i]."'",  "'".$subunit_ids[$i]."'", "'".$subunit_names[$i]."'", "'".$product_quantity[$i]."'", "'".$unit_types[$i]."'",  "'".$product_rate[$i]."'", "'".$per[$i]."'", "'".$per_type[$i]."'", "'".$product_amount[$i]."'", "'0'");
                                    if($getUniqueID == $GLOBALS['null_value']) {
                                        $quotation_insert_id = $obj->InsertSQL($GLOBALS['quotation_product_table'], $columns, $values,'', '', $action);
                                    } else {
                                        $quotation_update_id = $obj->UpdateSQL($GLOBALS['quotation_product_table'], $getUniqueID, $columns, $values, $action);
                                    }
                                    $quotation_product_all_id[] = $getUniqueID;
                                }
                            }
                            $filtered_ids = array_column(array_filter($quotation_product_list, function($item) use ($quotation_product_all_id) {
                                return !in_array($item['id'], $quotation_product_all_id);
                            }), 'id');
                            
                            if(!empty($filtered_ids)) {
                                for($i = 0; $i< count($filtered_ids); $i++) {
                                    $columns = array(); $values = array();
                                    $columns = array('deleted');
                                    $values = array("'1'");
                                    $quotation_update_id = $obj->UpdateSQL($GLOBALS['quotation_product_table'], $filtered_ids[$i], $columns, $values, $action);
                                }
                            }
                            $result = array('number' => '1', 'msg' => 'Updated Successfully');
                        } else {

                            $result = array('number' => '1', 'msg' => 'Draft Updated Successfully');
                        }
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $quotation_update_id);
                    }							
                }
            }
        }
        else {
            $result = array('number' => '2', 'msg' => 'Invalid IP');
        }
    }
    else {
        if(!empty($valid_quotation)) {
            $result = array('number' => '3', 'msg' => $valid_quotation);
        } else if(!empty($quotation_error)) {
            $result = array('number' => '2', 'msg' => $quotation_error);
        } else if (!empty($party_error)) {
            $result = array('number' => '2', 'msg' => $party_error);
        }
    }
    
    if(!empty($result)) {
        $result = json_encode($result);
    }
    echo $result; exit;
}

if (isset($_REQUEST['delete_quotation_id'])) {
    $delete_quotation_id = $_REQUEST['delete_quotation_id'];
    $msg = "";
    if (!empty($delete_quotation_id)) {
        $quotation_unique_id = "";
        $quotation_unique_id = $obj->getTableColumnValue($GLOBALS['quotation_table'], 'quotation_id', $delete_quotation_id, 'id');
        $quotation_unique_number = $obj->getTableColumnValue($GLOBALS['quotation_table'], 'quotation_id', $delete_quotation_id, 'quotation_number');
        if (preg_match("/^\d+$/", $quotation_unique_id)) {
        
            $action = "";
            if (!empty($name)) {
                $action = "Quotation Deleted.";
            }
                $columns = array();
                $values = array();
                $columns = array('deleted');
                $values = array("'1'");
                $msg = $obj->UpdateSQL($GLOBALS['quotation_table'], $quotation_unique_id, $columns, $values, $action);

                if(!empty($quotation_unique_number)) {
                    $quotation_product_list = $obj->getTableRecords($GLOBALS['quotation_product_table'], 'quotation_number', $quotation_unique_number, '');
                    foreach($quotation_product_list as $quotation_product) {
                        $quotation_product_id = $quotation_product['id'];
                        $quotation_product_msg = $obj->UpdateSQL($GLOBALS['quotation_product_table'], $quotation_product_id, $columns, $values, $action);
                    }
                }



        }
    }
    echo $msg;
    exit;
}
?>
