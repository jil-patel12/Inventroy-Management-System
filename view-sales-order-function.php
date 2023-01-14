<?php
function fetchSalesOrderDetails($salesId){
    include("config.php");
    $sql = "SELECT * FROM `sales_orders_detail` WHERE `order_id` = $salesId";
    $result = $conn->query($sql);
    $sql1 = "SELECT `order_id`, `payment_status`, `order_status`, `receive_by`, `Insert_At` FROM `sales_orders_master` WHERE `order_id` = $salesId";
    $result1= $conn->query($sql1);
    
    if ($result1->num_rows == 1) {
        $row1= $result1->fetch_assoc();
    }
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row["order_detail_id"]; ?></td>
                <td><?php echo getCustomerName($row["customer_id"]); ?></td>
                <td><?php echo getProductName($row["product_id"]); ?></td>
                <td><?php echo $row["sales_quantity"]; ?></td>
                <td><?php echo $row["sales_price"]; ?></td>
                <td><?php echo $row1["payment_status"]; ?></td>
                <td><?php echo $row1["order_status"]; ?></td>
                <td><?php echo $row1["receive_by"]; ?></td>
                <td><?php echo $row1["Insert_At"]; ?></td>
                <td>
                    <!-- <a class="btn btn-info btn-sm" href="edit-purchase-order-details.php?pdId=">
                        <i class="fas fa-edit"></i>
                        Edit
                    </a> -->
                    <!-- <a class="btn btn-danger btn-sm" href="#">
                        <i class="fas fa-trash"></i>
                        Delete
                    </a> -->
                </td>
            </tr>
        <?php
    }
    } else {
    echo "0 results";
    }
    $conn->close();
}

function getCustomerName($customerId){
    include("config.php");
    $sql = "SELECT `customer_id`, `cust_name` FROM `customer_master` WHERE `customer_id`=$customerId";
    $result = $conn->query($sql);
    $customerName = NULL;
    if ($result->num_rows == 1) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $customerName = $row["cust_name"];
        }
    } 
    else {
    echo "0 results";
    }
    $conn->close();
    return $customerName;
}

function getProductName($productId){
    include("config.php");
    $sql = "SELECT `product_id`,`product_name` FROM `product_master` WHERE `product_id`=$productId";
    $result = $conn->query($sql);
    $productName = NULL;
    if ($result->num_rows == 1) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $productName = $row["product_name"];
        }
    } 
    else {
    echo "0 results";
    }
    $conn->close();
    return $productName;
}
?>