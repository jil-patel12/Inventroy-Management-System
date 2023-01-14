<?php
    function getCustomerInfo($salesId){
        include("config.php");
        $customerInfo = NULL;
        if($customerId = getCustomerId($salesId)){
            $sql = "SELECT * FROM `customer_master` WHERE `customer_id` = $customerId";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
            // output data of each row
                $row = $result->fetch_assoc();
                $customerInfo = $row;
            } else {
            echo "0 results";
            }
            $conn->close();
        }
        else{
            echo "Customer of Product Id not found.";
        }
        return $customerInfo;
    }

    function getCustomerId($salesId){
        include("config.php");
        $sql = "SELECT `order_id`, `customer_id` FROM `sales_orders_master` WHERE `order_id` = $salesId";
        $result = $conn->query($sql);
        $customerId= null;
        if ($result->num_rows == 1) {
        // output data of each row
            $row = $result->fetch_assoc();
            $customerId = $row["customer_id"];
        } else {
        echo "0 results";
        }
        $conn->close();
        return $customerId;
    }

    function getOrderInfo($salesId){
        include("config.php");
        $sql = "SELECT * FROM `sales_orders_master` WHERE `order_id` = $salesId";
        $result = $conn->query($sql);
        $customerInfo= null;
        if ($result->num_rows == 1) {
        // output data of each row
            $row = $result->fetch_assoc();
            $customerInfo = $row;
        } else {
        echo "0 results";
        }
        $conn->close();
        return $customerInfo;
    }

    function getOrderDetails($salesId){
        $salesId = (int)$salesId;
        include("config.php");
        $sql = "SELECT * FROM `sales_orders_detail` WHERE `order_id` = $salesId";
        $result = $conn->query($sql);
        $totalamt= null;
        if ($result->num_rows  >0) {
        // output data of each row
            while($row = $result->fetch_assoc()){
                ?>
                    <tr>
                      <td><?php echo $row["sales_quantity"] ?></td>
                      <td><?php echo getProductName($row["product_id"]) ?></td>
                      <td><?php echo getProductCode($row["product_id"]) ?></td>
                      <td>
                        <?php 
                            $totalamt +=$row["sales_price"];
                            echo "Rs." . $row["sales_price"];
                        ?>
                      </td>
                    </tr>
                <?php
            }
        } else {
        echo "0 results";
        }
        $conn->close();
        return $totalamt;
    }

    function getProductName($productId){
        include("config.php");
        $sql = "SELECT `product_id`, `product_name` FROM `product_master` WHERE `product_id` = $productId";
        $result = $conn->query($sql);
        $productName = null;
        if ($result->num_rows == 1) {
        // output data of each row
            $row = $result->fetch_assoc();
            $productName =  $row["product_name"];
        } else {
        echo "0 results";
        }
        $conn->close();
        return $productName;
    }

    function getProductCode($productId){
        include("config.php");
        $sql = "SELECT `product_id`, `product_code` FROM `product_master` WHERE `product_id` = $productId";
        $result = $conn->query($sql);
        $productCode = null;
        if ($result->num_rows == 1) {
        // output data of each row
            $row = $result->fetch_assoc();
            $productCode =  $row["product_code"];
        } else {
        echo "0 results";
        }
        $conn->close();
        return $productCode;
    }
?>