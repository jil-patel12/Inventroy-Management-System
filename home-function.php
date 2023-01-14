<?php
function getTotalPurchaseOrder(){
    include("config.php");
    $count = 0;
    $sql = "SELECT `purchase_id` FROM `purchase_master`";
    $result = $conn->query($sql);
    $count = $result->num_rows;
    return $count;
}

function getTotalSalesOrder(){
    include("config.php");
    $count = 0;
    $sql = "SELECT `order_id` FROM `sales_orders_master`";
    $result = $conn->query($sql);
    $count = $result->num_rows;
    return $count;
}

function getTotalTodaysPurchaseOrder(){
    include("config.php");
    $count = 0;
    $date =date("Y-m-d");
    $sql = "SELECT `purchase_id`,`purchase_date` FROM `purchase_master` WHERE `purchase_date` = '$date'";
    $result = $conn->query($sql);
    $count = $result->num_rows;
    return $count;
}

function getTotalTodaysSalesOrder(){
    include("config.php");
    $count = 0;
    $date =date("Y-m-d");
    $sql = "SELECT `order_id`,`order_date` FROM `sales_orders_master` WHERE `order_date` = '$date'";
    $result = $conn->query($sql);
    $count = $result->num_rows;
    return $count;
}
function getPurchaseAmt(){
    include("config.php");
    $count = Null;
    $date =date("Y-m-d");
    $sql = "SELECT `purchase_id`,`total_amount` FROM `purchase_master`";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()) {
            $val = $row["total_amount"];
            $count = $count + (int)$val;
        }
    }
    return $count;
}

function getSalesAmt(){
    include("config.php");
    $count = Null;
    $date =date("Y-m-d");
    $sql = "SELECT `order_id`,`total_amount` FROM `sales_orders_master`";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()) {
            $val = $row["total_amount"];
            $count = $count + (int)$val;
        }
    }
    return $count;
}


function getPurchaseOrderData(){
    include("config.php");
    $count = Null;
    $date =date("Y-m-d");
    $sql = "SELECT `product_id`, `product_name`, `product_code`, `stock`, `vendor_id` FROM `product_master`";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()) {
            $stock = (int)$row["stock"];
            if($stock<=5){
                ?>
                    <tr>
                        <td class="text-center"><?php echo $row["product_id"]; ?></td>
                        <td><?php echo $row["product_code"]; ?></td>
                        <td><?php echo $row["product_name"]; ?></td>
                        <td class="text-center"><?php echo $row["stock"]; ?></td>
                        <td><?php echo getVendorName($row["vendor_id"]); ?></td>
                    </tr>
                <?php
            }
        }
    }
    return $count;
}

function getVendorName($vendorId){
    include("config.php");
    $vendorName = Null;
    $date =date("Y-m-d");
    $sql = "SELECT `vendor_id`, `vendor_name` FROM `vendor_master` WHERE `vendor_id` = $vendorId";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()) {
            $vendorName = $row["vendor_name"];
        }
    }
    return $vendorName;
}

function getLatestFiveProducts(){
    include("config.php");
    $count = Null;
    $date =date("Y-m-d");
    $sql = "SELECT * FROM `product_master` ORDER BY `product_id` DESC LIMIT 5";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td class="text-center"><?php echo $row["product_id"]; ?></td>
                    <td><?php echo getBrandName($row["brand_id"]); ?></td>
                    <td><?php echo getCategoryName($row["pro_cat_id"]); ?></td>
                    <td><?php echo $row["product_name"]; ?></td>
                    <td><?php echo $row["product_code"]; ?></td>
                    <td><?php echo $row["stock"]; ?></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td><?php echo getVendorName($row["vendor_id"]); ?></td>
                </tr>
            <?php
        }
    }
    return $count;  
}

function getBrandName($brandId){
    include("config.php");
    $brandName = Null;
    $date =date("Y-m-d");
    $sql = "SELECT `brand_id`,`brand_name` FROM `brand_master` WHERE `brand_id` = $brandId";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()) {
            $brandName = $row["brand_name"];
        }
    }
    return $brandName;
}

function getCategoryName($categoryId){
    include("config.php");
    $categoryName = Null;
    $date =date("Y-m-d");
    $sql = "SELECT `pro_cat_id`, `pro_cat_name` FROM `product_categories_master` WHERE `pro_cat_id` = $categoryId";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()) {
            $categoryName = $row["pro_cat_name"];
        }
    }
    return $categoryName;
}

?>