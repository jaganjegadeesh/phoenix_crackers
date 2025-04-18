<?php
	include("include_files.php");
	if(isset($_REQUEST['show_delivery_challan_id'])) { 
        $show_delivery_challan_id = $_REQUEST['show_delivery_challan_id'];
        if(isset($_REQUEST['quotation_id'])) {
            $quotation_id = $_REQUEST['quotation_id'];
        }
        if(!empty($quotation_id)) {
            $quotation_all_list = $obj->getTableRecords($GLOBALS['quotation_table'],  'quotation_id', $quotation_id,'');
            if(!empty($quotation_all_list)) {
                foreach($quotation_all_list as $quotation) {
                    $quotation_number = $quotation['quotation_number'];
                    $party_id = $quotation['party_id'];
                    $party_name =  $quotation['party_name_mobile_city'];
                    $agent_id = $quotation['agent_id'];
                    $agent_name =  $quotation['agent_name_mobile_city'];
                }
            }
            $challan_product_list = $obj->getTableRecords($GLOBALS['quotation_product_table'], 'quotation_number', $quotation_number, '');
        }
        if(!empty($show_delivery_challan_id)) {
            $challan_list = $obj->getTableRecords($GLOBALS['delivery_challan_table'], 'delivery_challan_id', $show_delivery_challan_id, '');
            if(!empty($challan_list)) {
                
                foreach($challan_list as $challan) {
                    if(!empty($challan['delivery_challan_date'])) {
                        $challan_date = date('Y-m-d', strtotime($challan['delivery_challan_date']));
                    } 
                    if(!empty($challan['party_id'])) {
                        $party_id = $challan['party_id'];
                    }
                    if(!empty($challan['party_name_mobile_city'])) {
                        $party_name = $challan['party_name_mobile_city'];
                    }
                    if(!empty($challan['agent_id'])) {
                        $agent_id = $challan['agent_id'];
                    }
                    if(!empty($challan['agent_name_mobile_city'])) {
                        $agent_name = $challan['agent_name_mobile_city'];
                    }
                    if(!empty($challan['product_id'])) {
                        $product_id = $challan['product_id'];
                        $product_id = explode(',', $product_id);
                    }
                    if(!empty($challan['brand_id'])) {
                        $brand_id = $challan['brand_id'];
                        $brand_id = explode(',', $brand_id);
                    }
                    if(!empty($challan['unit_id'])) {
                        $unit_id = $challan['unit_id'];
                        $unit_id = explode(',', $unit_id);
                    }
                    if(!empty($challan['subunit_id'])) {
                        $subunit_id = $challan['subunit_id'];
                        $subunit_id = explode(',', $subunit_id);
                    }
                    if(!empty($challan['subunit_contains'])) {
                        $subunit_contains = $challan['subunit_contains'];
                        $subunit_contains = explode(',', $subunit_contains);
                        
                    }
                    if(!empty($challan['product_quantity'])) {
                        $product_quantity = $challan['product_quantity'];
                        $product_quantity = explode(',', $product_quantity);
                    }
                    if(!empty($challan['quantity_limit'])) {
                        $quantity_limit = $challan['quantity_limit'];
                        $quantity_limit = explode(',', $quantity_limit);
                    }
                    if(!empty($challan['unit_type'])) {
                        $unit_type = $challan['unit_type'];
                        $unit_type = explode(',', $unit_type);
                    }
                    if(!empty($challan['total_quantity'])) {
                        $total_quantity = $challan['total_quantity'];
                        $total_quantity = explode(',', $total_quantity);
                    }
                    if(!empty($challan['grand_quantity'])) {
                        $grand_quantity = $challan['grand_quantity'];
                    }
                }
            }
        }
        ?>
        <form class="poppins pd-20" name="delivery_challan_form" method="POST">
            <input type="hidden" name="form_name" value="delivery_challan_form">
            <input type="hidden" name="quotation_id" value="<?php if(!empty($quotation_id)) { echo $quotation_id; } ?>">
            <input type="hidden" name="edit_id" value="<?php if(!empty($show_delivery_challan_id)) { echo $show_delivery_challan_id; } ?>">

			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
						<div class="h5">Add Delivery Challan</div>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('delivery_challan.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row p-3">
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-2 col-md-3 col-12 py-2">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                <input type="date" name="challan_date" class="form-control shadow-none" value="<?php  if (!empty($challan_date)) {  echo $challan_date;  } else {  echo date('Y-m-d');  } 
?>">
                                    <label>Date</label>
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-3 col-md-3 col-12 py-2">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <select name="agent_id" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                        <option value="<?php if(!empty($agent_id)) { echo $agent_id; } ?>" <?php if(!empty($agent_id)) { ?>selected<?php } ?>>
                                            <?php
                                                if(!empty($agent_name) && $agent_name != $GLOBALS['null_value']) {
                                                    echo $obj->encode_decode('decrypt', $agent_name);
                                                }
                                            ?>
                                        </option>
                                    </select>
                                    <label>Agent</label>
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-3 col-md-3 col-12 py-2">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <select class="select2 select2-danger" name="party_id" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                        <option value="<?php if(!empty($party_id)) { echo $party_id; } ?>" <?php if(!empty($party_id)) { ?>selected<?php } ?>>
                                            <?php
                                                if(!empty($party_name) && $party_name != $GLOBALS['null_value']) {
                                                    echo $obj->encode_decode('decrypt', $party_name);
                                                }
                                            ?>
                                        </option>
                                    </select>
                                    <label>Select Party</label>
                                </div>
                            </div>       
                        </div>
                       
                    </div>
                    <!-- <div class="row justify-content-center pt-3"> 
                        <div class="col-lg-3 col-md-3 col-6">
                            <div class="form-group pb-2">
                                <div class="form-label-group in-border mb-0">
                                    <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                        <option>Select Product</option>
                                        <option>Ground Chakkar Special</option>
                                    </select>
                                    <label>Select Product</label>
                                </div>
                            </div>        
                        </div>
                        <div class="col-lg-3 col-md-3 col-6">
                            <div class="form-group pb-2">
                                <div class="form-label-group in-border mb-0">
                                    <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                        <option>Select Brand</option>
                                        <option>Mothers</option>
                                    </select>
                                    <label>Select Brand</label>
                                </div>
                            </div>        
                        </div>
                        <div class="col-lg-1 col-md-3 col-6 px-lg-0">
                            <div class="form-group pb-1">
                                <div class="form-label-group in-border pb-1">
                                    <input type="text" class="form-control shadow-none" required="">
                                    <label>Per</label>
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-1 col-md-3 col-6 px-lg-0">
                            <div class="form-group pb-1">
                                <div class="form-label-group in-border pb-1">
                                    <input type="text" class="form-control shadow-none" required="">
                                    <label>QTY</label>
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-1 col-md-3 col-6">
                            <button class="btn btn-danger add_products_button" style="font-size:12px;" type="button" onclick="Javascript:AddInwardProducts();">
                                Add
                            </button>
                        </div> 
                    </div> -->
                    <div class="row justify-content-center"> 
                        <div class="col-lg-9">
                            <div class="table-responsive text-center">
                                <table class="table nowrap cursor smallfnt table-bordered">
                                    <thead class="bg-dark smallfnt">
                                        <tr style="white-space:pre;">
                                            <th style="width:100px;">#</th>
                                            <th style="width:200px;">Brand</th>
                                            <th style="width:200px;">Product</th>
                                            <th style="width:200px;">Qty</th>
                                            <th style="width:200px;">Type</th>
                                            <th style="width:200px;">Content</th>
                                            <th style="width:200px;">Total Qty</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $grand_total = 0;
                                        if(!empty($challan_product_list)) {
                                            $sno = 1;
                                            foreach($challan_product_list as $quotation) { 
                                                $total_qty = 0;
                                                ?>
                                                <tr class="delivery_challan_row" id="delivery_challan_row<?php echo $sno; ?>">
                                                    <td class="sno"><?php echo $sno; ?></td>
                                                    <td>
                                                        <?php if(!empty($quotation['brand_id'])) {
                                                            $brand_id = $quotation['brand_id'];
                                                            echo $obj->encode_decode('decrypt', $quotation['brand_name']);
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($quotation['product_id'])) {
                                                            $product_id = $quotation['product_id'];
                                                            echo $obj->encode_decode('decrypt', $quotation['product_name']);
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($quotation['product_quantity'])) {
                                                            $product_quantity = $quotation['product_quantity'];
                                                        } ?>
                                                        <input type="text" name="product_quantity[]" id="product_quantity_<?php echo $sno;?>" onfocus="Javascript:KeyboardControls(this,'number',8,'');" value="<?php if (!empty($product_quantity)) { echo $product_quantity; } ?>" onkeyup="Javascript:CalculateTotalQty('<?php echo $sno;?>');" class="form-control shadow-none">
                                                        <input type="hidden" name="quantity_limit[]" id="quantity_limit<?php echo $sno;?>"  value="<?php if (!empty($product_quantity)) { echo $product_quantity; } ?>"  class="form-control shadow-none">
                                                    </td>
                                                    <td>
                                                        <?php if($quotation['unit_type'] == '1') {
                                                            echo $obj->encode_decode('decrypt', $quotation['unit_name']);
                                                        } else {
                                                            echo $obj->encode_decode('decrypt', $quotation['subunit_name']);
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($quotation['subunit_contains'])) {
                                                            $subunit_contains = $quotation['subunit_contains'];
                                                            echo $subunit_contains;
                                                        } ?>
                                                    </td>
                                                    <td id="total_qty_td_<?php echo $sno;?>">
                                                        <?php  
                                                            if($quotation['unit_type'] == '1') {
                                                                $total_qty = $quotation['product_quantity'] * $quotation['subunit_contains'];
                                                            } else {
                                                                $total_qty = $quotation['product_quantity'];
                                                            } 
                                                            echo $total_qty;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger" type="button" onclick="Javascript:DeleteRow('<?php echo $sno;?>', 'delivery_challan_row');"><i class="fa fa-trash"></i></button>
                                                        
                                                        <input type="hidden" name="brand_id[]" id="brand_id_<?php echo $sno;?>" value="<?php if (!empty($brand_id)) { echo $brand_id; } ?>">
                                                        <input type="hidden" name="product_id[]" id="product_id_<?php echo $sno;?>" value="<?php if (!empty($product_id)) { echo $product_id; } ?>">
                                                        <input type="hidden" name="unit_type[]" id="unit_type_<?php echo $sno;?>" value="<?php if (!empty($quotation['unit_type'])) { echo $quotation['unit_type']; } ?>">
                                                        <input type="hidden" name="unit_id[]" id="unit_id_<?php echo $sno;?>" value="<?php if (!empty($quotation['unit_id'])) { echo $quotation['unit_id']; } ?>">
                                                        <input type="hidden" name="subunit_id[]" id="subunit_id_<?php echo $sno;?>" value="<?php if (!empty($quotation['subunit_id'])) { echo $quotation['subunit_id']; } ?>">
                                                        <input type="hidden" name="subunit_contains[]" id="subunit_contains_<?php echo $sno;?>" value="<?php if (!empty($subunit_contains)) { echo $subunit_contains; } ?>">
                                                        <input type="hidden" name="total_qty[]" id="total_qty_<?php echo $sno;?>" value="<?php if (!empty($total_qty)) { echo $total_qty; } ?>">

                                                    </td>
                                                </tr>
                                        <?php  $sno++; 
                                                $grand_total += $total_qty;
                                            }
                                        } else if(!empty($product_id)) {
                                            $count = count($product_id);
                                            for($i = 0; $i < $count; $i++) {
                                                $total_qty = 0;
                                                ?>
                                                <tr class="delivery_challan_row" id="delivery_challan_row<?php echo $i; ?>">
                                                    <td class="sno"><?php echo $i+1; ?></td>
                                                    <td>
                                                        <?php if(!empty($brand_id[$i])) {
                                                            $brand = $brand_id[$i];
                                                            $brand_name = $obj->getTableColumnValue($GLOBALS['brand_table'], 'brand_id', $brand, 'brand_name');
                                                            echo $obj->encode_decode('decrypt', $brand_name);
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($product_id[$i])) {
                                                            $product = $product_id[$i];
                                                            $product_name = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $product, 'product_name');
                                                            echo $obj->encode_decode('decrypt', $product_name);
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($product_quantity[$i])) {
                                                            $quantity = $product_quantity[$i];
                                                        } ?>
                                                        <input type="text" name="product_quantity[]" id="product_quantity_<?php echo $i;?>" onfocus="Javascript:KeyboardControls(this,'number',8,'');" value="<?php if (!empty($quantity)) { echo $quantity; } ?>" onkeyup="Javascript:CalculateTotalQty('<?php echo $i;?>');" class="form-control shadow-none">
                                                        <input type="hidden" name="quantity_limit[]" id="quantity_limit<?php echo $sno;?>"  value="<?php if (!empty($quantity_limit[$i])) { echo $quantity_limit[$i]; } ?>"  class="form-control shadow-none">
                                                    </td>
                                                    <td>
                                                        
                                                        <?php if($unit_type[$i] == '1') {
                                                            $unit_name = $obj->getTableColumnValue($GLOBALS['unit_table'], 'unit_id', $unit_id[$i], 'unit_name');
                                                            echo $obj->encode_decode('decrypt', $unit_name);
                                                        } else {
                                                            $subunit_name = $obj->getTableColumnValue($GLOBALS['unit_table'], 'unit_id', $subunit_id[$i], 'unit_name');
                                                            echo $obj->encode_decode('decrypt', $subunit_name);
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($subunit_contains[$i])) {
                                                            $subunit_contain = $subunit_contains[$i];
                                                            echo $subunit_contain;
                                                        } ?>
                                                    </td>
                                                    <td id="total_qty_td_<?php echo $i;?>">
                                                        <?php  
                                                            if($unit_type[$i] == '1') {
                                                                $total_qty = $quantity * $subunit_contain;
                                                            } else {
                                                                $total_qty = $quantity;
                                                            } 
                                                            echo $total_qty;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger" type="button" onclick="Javascript:DeleteRow('<?php echo $i;?>', 'delivery_challan_row');"><i class="fa fa-trash"></i></button>
                                                        <input type="hidden" name="brand_id[]" id="brand_id_<?php echo $i;?>" value="<?php if (!empty($brand_id[$i])) { echo $brand_id[$i]; } ?>">
                                                        <input type="hidden" name="product_id[]" id="product_id_<?php echo $i;?>" value="<?php if (!empty($product_id[$i])) { echo $product_id[$i]; } ?>">
                                                        <input type="hidden" name="unit_type[]" id="unit_type_<?php echo $i;?>" value="<?php if (!empty($unit_type[$i])) { echo $unit_type[$i]; } ?>">
                                                        <input type="hidden" name="unit_id[]" id="unit_id_<?php echo $i;?>" value="<?php if (!empty($unit_id[$i])) { echo $unit_id[$i]; } ?>">
                                                        <input type="hidden" name="subunit_id[]" id="subunit_id_<?php echo $i;?>" value="<?php if (!empty($subunit_id[$i])) { echo $subunit_id[$i]; } ?>">
                                                        <input type="hidden" name="subunit_contains[]" id="subunit_contains_<?php echo $i;?>" value="<?php if (!empty($subunit_contain)) { echo $subunit_contain; } ?>">
                                                        <input type="hidden" name="total_qty[]" id="total_qty_<?php echo $i;?>" value="<?php if (!empty($total_qty)) { echo $total_qty; } ?>">
                                                    </td>
                                                </tr>
                                            <?php $grand_total += $total_qty;
                                            }
                                        }
                                        ?>
                                       
                                        <tr class="fw-bold">
                                            <td colspan="6" class="text-end">Total</td>
                                            <td id="grand_total_qty">
                                                <?php echo $grand_total; ?>
                                            </td>
                                            <td>
                                                <input type="hidden" name="grand_total" id="grand_total" value="<?php if (!empty($grand_total)) { echo $grand_total; } ?>">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12 py-3 text-center">
                            <button class="btn btn-danger" type="button" onClick="Javascript:SaveModalContent(event,'delivery_challan_form', 'delivery_challan_changes.php', 'delivery_challan.php');">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>     
            </div>
            <script src="include/select2/js/select2.min.js"></script>
            <script src="include/select2/js/select.js"></script>
            <script src="include/js/creation_modules.js"></script>
        </form>
	<?php
    } 
    if(isset($_POST['page_number'])) {
        $page_number = $_POST['page_number'];
        $page_limit = $_POST['page_limit'];
        $page_title = $_POST['page_title']; 
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
        $total_records_list = $obj->getTableRecords($GLOBALS['delivery_challan_table'], '', '', 'DESC');

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
        <?php } 
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
                    <th>Challan Number</th>
                    <th>Sales Party Name</th>
                    <th>Total quantity</th>

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
                    <td><?php if(!empty($list['delivery_challan_date'])) { echo $list['delivery_challan_date'];}?></td>
                    <td><?php if(!empty($list['delivery_challan_number'])) { echo $list['delivery_challan_number'];}?></td>
                    <td><?php if(!empty($list['party_name_mobile_city'])) { echo $obj->encode_decode('decrypt', $list['party_name_mobile_city']);}?></td>
                    <td><?php if(!empty($list['grand_quantity'])) { echo $list['grand_quantity'];}?></td>
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
                                    } ?>', '<?php if (!empty($list['delivery_challan_id'])) {
                                            echo $list['delivery_challan_id'];
                                        } ?>');"><i class="fa fa-pencil"></i> &ensp; Edit</a></li>
                                <?php } 
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
                                        } ?>', '<?php if (!empty($list['delivery_challan_id'])) {
                                                echo $list['delivery_challan_id'];
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
<?php	}
    }

if(isset($_POST['form_name'])) {
    $form_name = $_POST['form_name'];
    $quotation_id = ''; $edit_id = ''; $current_date = date('Y-m-d');
    if(isset($_POST['quotation_id'])) {
        $quotation_id = $_POST['quotation_id'];
    }

    if(isset($_POST['edit_id'])) {
        $edit_id = $_POST['edit_id'];
        $edit_id = trim($edit_id);
    }
    if(isset($_POST['challan_date'])) {
        $challan_date = $_POST['challan_date'];
        $challan_date = trim($challan_date);
        $challan_date_error = $valid->valid_date($challan_date, 'Bill Date', '1');
        if(empty($challan_date_error)) {
            if($challan_date > $current_date) {
                $challan_date_error = "Future Date not allowed";
            }
        }
    }
    if(!empty($challan_date_error)) {
        if(!empty($valid_challan)) {
            $valid_challan = $valid_challan." ".$valid->error_display($form_name, "challan_date", $challan_date_error, 'text');
        }
        else {
            $valid_challan = $valid->error_display($form_name, "challan_date", $challan_date_error, 'text');
        }
    }

    if(isset($_POST['party_id'])) {
        $party_id = $_POST['party_id'];
        $party_id = trim($party_id);
        $party_id_error = $valid->common_validation($party_id, 'Party', 'select');
    }
    if(!empty($party_id_error)) {
        if(!empty($valid_challan)) {
            $valid_challan = $valid_challan." ".$valid->error_display($form_name, "party_id", $party_id_error, 'select');
        }
        else {
            $valid_challan = $valid->error_display($form_name, "party_id", $party_id_error, 'select');
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
        if(!empty($valid_challan)) {
            $valid_challan = $valid_challan." ".$valid->error_display($form_name, "agent_id", $agent_id_error, 'select');
        }
        else {
            $valid_challan = $valid->error_display($form_name, "agent_id", $agent_id_error, 'select');
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
    if(isset($_POST['product_quantity'])) {
        $product_quantity = $_POST['product_quantity'];
        $product_quantity = array_reverse($product_quantity);
    }
    if(isset($_POST['quantity_limit'])) {
        $quantity_limit = $_POST['quantity_limit'];
        $quantity_limit = array_reverse($quantity_limit);
    }
    if(isset($_POST['unit_type'])) {
        $unit_types = $_POST['unit_type'];
        $unit_types = array_reverse($unit_types);
    }
    if(isset($_POST['unit_id'])) {
        $unit_ids = $_POST['unit_id'];
        $unit_ids = array_reverse($unit_ids);
    }
    if(isset($_POST['subunit_id'])) {
        $subunit_ids = $_POST['subunit_id'];
        $subunit_ids = array_reverse($subunit_ids);
    }
    if(isset($_POST['subunit_contains'])) {
        $subunit_contains = $_POST['subunit_contains'];
        $subunit_contains = array_reverse($subunit_contains);
    }
    if(isset($_POST['total_qty'])) {
        $total_qty = $_POST['total_qty'];
        $total_qty = array_reverse($total_qty);
    }
    if(isset($_POST['grand_total'])) {
        $grand_total = $_POST['grand_total'];
    }

    if(!empty($product_ids)) {
        $product_quantity = array_reverse($product_quantity);
        $quantity_limit = array_reverse($quantity_limit);
        for($i=0; $i < count($product_ids); $i++) {
            $product_quantity[$i] = trim($product_quantity[$i]);
            $quantity_limit[$i] = trim($quantity_limit[$i]);
            if(isset($product_quantity[$i])) {
                $product_quantity_error = "";
                $product_quantity_error = $valid->common_validation($product_quantity[$i], 'quantity', 'select');
                if(!empty($product_quantity_error)) {
                    if(!empty($valid_challan)) {
                        $valid_challan = $valid_challan." ".$valid->row_error_display($form_name, 'product_quantity[]', $product_quantity_error, 'text', 'delivery_challan_row', ($i+1));
                    }
                    else {
                        $valid_challan = $valid->row_error_display($form_name, 'product_quantity[]', $product_quantity_error, 'text', 'delivery_challan_row', ($i+1));
                    }
                }
                if($quantity_limit[$i] < $product_quantity[$i]) {
                    if(!empty($valid_challan)) {
                        $valid_challan = $valid_challan." ".$valid->row_error_display($form_name, 'product_quantity[]', "Quantity should not be greater than ".$quantity_limit[$i], 'text', 'delivery_challan_row', ($i+1));
                    }
                    else {
                        $valid_challan = $valid->row_error_display($form_name, 'product_quantity[]', "Quantity should not be greater than ".$quantity_limit[$i], 'text', 'delivery_challan_row', ($i+1));
                    }
                }
            }

        }
        $product_quantity = array_reverse($product_quantity);
        $quantity_limit = array_reverse($quantity_limit);
    }
    if(empty($valid_challan)) {
        $check_user_id_ip_address = 0;
        $check_user_id_ip_address = $obj->check_user_id_ip_address();	
        if(preg_match("/^\d+$/", $check_user_id_ip_address)) { 
            $party_name_mobile_city = ""; $party_details = "";
            $agent_name_mobile_city = ""; $agent_details = "";

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
        
            if(!empty($brand_ids)) {
                $brand_ids = array_reverse($brand_ids);
                $brand_ids = implode(",", $brand_ids);
            }
            else {
                $brand_ids = $GLOBALS['null_value'];
            }
           
            if(!empty($unit_ids)) {
                $unit_ids = array_reverse($unit_ids);
                $unit_ids = implode(",", $unit_ids);
            }
            else {
                $unit_ids = $GLOBALS['null_value'];
            }
            if(!empty($subunit_ids)) {
                $subunit_ids = array_reverse($subunit_ids);
                $subunit_ids = implode(",", $subunit_ids);
            }
            else {
                $subunit_ids = $GLOBALS['null_value'];
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
            if(!empty($quantity_limit)) {
                $quantity_limit = array_reverse($quantity_limit);
                $quantity_limit = implode(",", $quantity_limit);
            }
            else {
                $quantity_limit = $GLOBALS['null_value'];
            }
            if(!empty($total_qty)) {
                $total_qty = array_reverse($total_qty);
                $total_qty = implode(",", $total_qty);
            }
            else {
                $total_qty = $GLOBALS['null_value'];
            }

            $created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
            $creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
            $bill_company_id = $GLOBALS['bill_company_id'];
            $null_value = $GLOBALS['null_value'];
            $result = '';
            if(empty($edit_id)) {
                $action = "";
                if(!empty($party_name_mobile_city) && $party_name_mobile_city != $GLOBALS['null_value']) {
                    $action = "New Delivery Challan Created. Party - ".($obj->encode_decode('decrypt', $party_name_mobile_city));
                }
                $columns = array(); $values = array();
                $columns = array('created_date_time', 'creator', 'creator_name', 'bill_company_id', 'delivery_challan_id', 'quotation_id', 'delivery_challan_date',  'party_id', 'party_name_mobile_city', 'party_details', 'agent_id', 'agent_name_mobile_city', 'agent_details', 'product_id', 'brand_id','subunit_contains', 'unit_id',  'subunit_id', 'product_quantity','quantity_limit', 'unit_type','total_quantity','grand_quantity', 'deleted');
                $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$bill_company_id."'", "'".$null_value."'", "'".$quotation_id."'", "'".$challan_date."'", "'".$party_id."'", "'".$party_name_mobile_city."'", "'".$party_details."'","'".$agent_id."'", "'".$agent_name_mobile_city."'", "'".$agent_details."'","'".$product_ids."'", "'".$brand_ids."'", "'".$subunit_contains."'", "'".$unit_ids."'",   "'".$subunit_ids."'", "'".$product_quantity."'", "'".$quantity_limit."'", "'".$unit_types."'",  "'".$total_qty."'","'".$grand_total."'", "'0'");

                $delivery_challan_insert_id = $obj->InsertSQL($GLOBALS['delivery_challan_table'], $columns, $values,'delivery_challan_id', 'delivery_challan_number', $action);
                if(preg_match("/^\d+$/", $delivery_challan_insert_id)) {
                    $delivery_challan_id = $obj->getTableColumnValue($GLOBALS['delivery_challan_table'], 'id', $delivery_challan_insert_id, 'delivery_challan_id');
                    $result = array('number' => '1', 'msg' => 'Delivery Challan Successfully Created');
                }
            } else {
                $getUniqueID = "";
                $getUniqueID = $obj->getTableColumnValue($GLOBALS['delivery_challan_table'], 'delivery_challan_id', $edit_id, 'id');
                if(preg_match("/^\d+$/", $getUniqueID)) {
                    $action = "";
                    if(!empty($party_name_mobile_city) && $party_name_mobile_city != $GLOBALS['null_value']) {
                        $action = "Delivery Challan Update. Party - ".($obj->encode_decode('decrypt', $party_name_mobile_city));
                    }
                    $columns = array(); $values = array();
                    $columns = array('delivery_challan_date', 'product_id', 'brand_id','subunit_contains', 'unit_id',  'subunit_id', 'product_quantity', 'unit_type','total_quantity','grand_quantity', 'deleted');
                    $values = array( "'".$challan_date."'", "'".$product_ids."'", "'".$brand_ids."'", "'".$subunit_contains."'", "'".$unit_ids."'",   "'".$subunit_ids."'", "'".$product_quantity."'", "'".$unit_types."'",  "'".$total_qty."'","'".$grand_total."'", "'0'");
                    $delivery_challan_update_id = $obj->UpdateSQL($GLOBALS['delivery_challan_table'], $getUniqueID, $columns, $values, $action);

                    if(preg_match("/^\d+$/", $delivery_challan_update_id)) {
                        $result = array('number' => '1', 'msg' => 'Updated Successfully');
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $delivery_challan_update_id);
                    }	
                }
            }
        } else {
            $result = array('number' => '2', 'msg' => 'Invalid IP');
        } 
    }  else {
        if(!empty($valid_challan)) {
            $result = array('number' => '3', 'msg' => $valid_challan);
        }
    }
    if(!empty($result)) {
        $result = json_encode($result);
    }
    echo $result; exit;

}

if (isset($_REQUEST['delete_delivery_challan_id'])) {
    $delete_delivery_challan_id = $_REQUEST['delete_delivery_challan_id'];
    $msg = "";
    if (!empty($delete_delivery_challan_id)) {
        $delivery_challan_unique_id = "";
        $delivery_challan_unique_id = $obj->getTableColumnValue($GLOBALS['delivery_challan_table'], 'delivery_challan_id', $delete_delivery_challan_id, 'id');
        $delivery_challan_unique_number = $obj->getTableColumnValue($GLOBALS['delivery_challan_table'], 'delivery_challan_id', $delete_delivery_challan_id, 'delivery_challan_number');
        if (preg_match("/^\d+$/", $delivery_challan_unique_id)) {
        
            $action = "";
            if (!empty($name)) {
                $action = "delivery_challan Deleted.";
            }
                $columns = array();
                $values = array();
                $columns = array('deleted');
                $values = array("'1'");
                $msg = $obj->UpdateSQL($GLOBALS['delivery_challan_table'], $delivery_challan_unique_id, $columns, $values, $action);
        }
    }
    echo $msg;
    exit;
}


?>