<?php
    
    $filename = "product_template";
    header("Content-Type: application/octet-stream");    
    header("Content-Disposition: attachment; filename=".$filename.".xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    echo "S.No \t";
    echo "Product Name \t";
    echo "Unit Name \t";
    echo "Subunit Need \t";
    echo "Subunit Name \t";
    echo "Subunit Contains\t";
    echo "Per\t";
    echo "Per Type\t";
    echo "Sales Rate\t";
?>