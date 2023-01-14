<?php
    function deleteSalesOrder($salesOrderId){
        include("config.php");
        $salesOrderDeleteStatus = FALSE;
        $sql = "SELECT `order_detail_id`, `order_id` FROM `sales_orders_detail` WHERE `order_id` = $salesOrderId";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $salesDetailId = $row["order_detail_id"];
                if(!deleteFromSalesDetails($salesDetailId)){
                    return FALSE;
                }
                else{
                    $salesOrderDeleteStatus = TRUE;
                }
            }
        } 
        
        if(!deleteFromsalesMaster($salesOrderId)){
            return FALSE;
        }
        else{
            $salesOrderDeleteStatus = TRUE;
        }

        return $salesOrderDeleteStatus;
    }

    function deleteFromSalesDetails($salesDetailId){
        include("config.php");
        $status=FALSE;
        $sql1 = "DELETE FROM `sales_orders_detail` WHERE `order_detail_id` = $salesDetailId";
        if ($conn->query($sql1) === TRUE){
            $status = TRUE;
        }
        $conn->close();
        return $status;
    }
    
    function deleteFromSalesMaster($salesOrderId){
        include("config.php");
        $status=FALSE;
        $sql2 = "DELETE FROM `sales_orders_master` WHERE `order_id` = $salesOrderId";
        if ($conn->query($sql2) === TRUE){
            $status = TRUE;
        }
        $conn->close();
        return $status;
    }
?>