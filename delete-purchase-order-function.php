<?php
    function deletePurchaseOrder($purchaseOrderId){
        include("config.php");
        $purchaseOrderDeleteStatus = FALSE;
        $sql = "SELECT `purchase_detail_id`, `purchase_id` FROM `purchase_detail` WHERE `purchase_id` = $purchaseOrderId";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $purchaseDetailId = $row["purchase_detail_id"];
                if(!deleteFromPurchaseDetails($purchaseDetailId)){
                    return FALSE;
                }
                else{
                    $purchaseOrderDeleteStatus = TRUE;
                }
            }
        } 
        
        if(!deleteFromPurchaseMaster($purchaseOrderId)){
            return FALSE;
        }
        else{
            $purchaseOrderDeleteStatus = TRUE;
        }

        return $purchaseOrderDeleteStatus;
    }

    function deleteFromPurchaseDetails($purchaseDetailId){
        include("config.php");
        $status=FALSE;
        $sql1 = "DELETE FROM `purchase_detail` WHERE `purchase_detail_id` = $purchaseDetailId";
        if ($conn->query($sql1) === TRUE){
            $status = TRUE;
        }
        $conn->close();
        return $status;
    }
    
    function deleteFromPurchaseMaster($purchaseOrderId){
        include("config.php");
        $status=FALSE;
        $sql2 = "DELETE FROM `purchase_master` WHERE `purchase_id` = $purchaseOrderId";
        if ($conn->query($sql2) === TRUE){
            $status = TRUE;
        }
        $conn->close();
        return $status;
    }
?>