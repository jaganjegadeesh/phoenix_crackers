<?php 
    include("include.php");
?>
    
<script type="text/javascript" src="include/js/xlsx.full.min.js"></script>
<table id="tbl_product_list" class="data-table table nowrap tablefont" style="margin: auto; width: 900px;display:none;">
    <thead class="thead-dark">
        <tr>
            <th style="text-align: center; width: 50px;">S.No</th>
            <th style="text-align: center; width: 200px;">Product Name</th>
            <th style="text-align: center; width: 125px;">Unit</th>
            <th style="text-align: center; width: 200px;">Sub Unit</th>
            <th style="text-align: center; width: 125px;">SubContains</th>                 
            <th style="text-align: center; width: 125px;">Per</th>                 
            <th style="text-align: center; width: 125px;">Per Type</th>                 
            <th style="text-align: center; width: 125px;">Sales Rate</th>                 
        </tr>
    </thead>
    
    <tbody>
        <?php 
        $filter_category_id = ""; $search_text = "";
        if(isset($_REQUEST['filter_category_id'])) {
            $filter_category_id = $_REQUEST['filter_category_id'];
        }
     
        if(isset($_REQUEST['search_text'])) {
            $search_text = $_REQUEST['search_text'];
        }
        
        $total_records_list = array();
        $total_records_list = $obj->getTableRecords($GLOBALS['product_table'],'','','DESC');

        if(!empty($search_text)) {
            $search_text = strtolower($search_text);
            $list = array();
            if(!empty($total_records_list)) {
                foreach($total_records_list as $val) {
                    if((strpos(strtolower($obj->encode_decode('decrypt', $val['product_name'])), $search_text) !== false) ) {
                        $list[] = $val;
                    }
                }
            }
            $total_records_list = $list;
        }

        if(!empty($total_records_list)) {
            foreach($total_records_list as $key => $data) {
                $index = $key + 1; ?>
                <tr>
                    <td class="text-center px-2 py-2"><?php echo $index; ?></td>
                    <td class="text-center px-2 py-2">
                        <div class="w-100">
                            <?php
                                if(!empty($data['product_name']) && ($data['product_name'] != $GLOBALS['null_value'])) {
                                    $product_name = $data['product_name'];
                                    echo $obj->encode_decode("decrypt",$product_name);
                                }
                            ?>
                        </div>
                    </td>
                    <td class="text-center px-2 py-2">
                        <div class="w-100">
                            <?php
                                if(!empty($data['unit_name']) && ($data['unit_name'] != $GLOBALS['null_value'])) {
                                    $unit_name = $data['unit_name'];
                                    echo $obj->encode_decode("decrypt",$unit_name);
                                }
                            ?>
                        </div>
                    </td>
                
                    <td class="text-center px-2 py-2">
                        <div class="w-100">
                            <?php
                                if(!empty($data['subunit_name']) && ($data['subunit_name'] != $GLOBALS['null_value'])) {
                                    $subunit_name = $data['subunit_name'];
                                    echo $obj->encode_decode("decrypt",$subunit_name);
                                }
                            ?>
                        </div>
                    </td>
                    <td class="text-center px-2 py-2">
                        <div class="w-100">
                            <?php
                                if(!empty($data['subunit_contains']) && ($data['subunit_contains'] != $GLOBALS['null_value'])) {
                                    $subunit_contains = $data['subunit_contains'];
                                    echo $subunit_contains;
                                }
                            ?>
                        </div>
                    </td>
                    <td class="text-center px-2 py-2">
                        <div class="w-100">
                            <?php
                                if(!empty($data['per']) && ($data['per'] != $GLOBALS['null_value'])) {
                                    $per = $data['per'];
                                    echo $per;
                                }
                            ?>
                        </div>
                    </td>
                    <td class="text-center px-2 py-2">
                        <div class="w-100">
                            <?php
                                if(!empty($data['per_type']) && ($data['per_type'] != $GLOBALS['null_value'])) {
                                    $per_type = $data['per_type'];
                                    if($per_type == '1'){
                                        echo "Unit";
                                    }else if($per_type == '2'){
                                        echo "SubUnit";
                                    }
                                }
                            ?>
                        </div>
                    </td>
                    <td class="text-center px-2 py-2">
                        <div class="w-100">
                            <?php
                                if(!empty($data['sales_rate']) && ($data['sales_rate'] != $GLOBALS['null_value'])) {
                                    $sales_rate = $data['sales_rate'];
                                    echo $sales_rate;
                                }
                            ?>
                        </div>
                    </td>
                </tr>
            <?php }
        } ?>
    </tbody>
</table>

<script>
    ExportToExcel();
    function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById('tbl_product_list');
        var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
        if (dl) {
            XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' });
        } else {
            XLSX.writeFile(wb, fn || ('product_list.' + (type || 'xlsx')));
        }
        window.open("product.php", "_self");
    }
</script>