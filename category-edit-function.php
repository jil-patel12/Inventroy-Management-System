<?php
	function editCategory($categoryName,$categoryId){
        include("config.php");
        // ob_start();
        $categoryUpdateStatus = FALSE;
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE `product_categories_master` SET `pro_cat_name`='$categoryName',`Is_Actived`='0',`Is_Deleted`='0',`Insert_At`='$date',`Temp_Flag`='0' WHERE `pro_cat_id`= $categoryId";
        if ($conn->query($sql) === TRUE) {
            $categoryUpdateStatus = TRUE;
        } 
        else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
        return $categoryUpdateStatus;
    }

?>