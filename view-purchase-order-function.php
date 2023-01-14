<?php
function fetchPurchaseOrderDetails($purchaseId){
    include("config.php");
    $sql = "SELECT `purchase_detail_id`,`purchase_id`, `vendor_id`, `product_id`, `buying_qty`, `unit_price`, `short_item`, `actual_quantity`, `buying_price` FROM `purchase_detail` WHERE `purchase_id` = $purchaseId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row["purchase_detail_id"]; ?></td>
                <td><?php echo getVendorName($row["vendor_id"]); ?></td>
                <td><?php echo getProductName($row["product_id"]); ?></td>
                <td><?php echo $row["buying_qty"]; ?></td>
                <td><?php echo $row["unit_price"]; ?></td>
                <td><?php echo $row["short_item"]; ?></td>
                <td><?php echo $row["actual_quantity"]; ?></td>
                <td><?php echo $row["buying_price"]; ?></td>
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

function getVendorName($vendorId){
    include("config.php");
    $sql = "SELECT `vendor_id`, `vendor_name`  FROM `vendor_master` WHERE `vendor_id` = $vendorId";
    $result = $conn->query($sql);
    $vendorName = NULL;
    if ($result->num_rows == 1) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $vendorName = $row["vendor_name"];
        }
    } 
    else {
    echo "0 results";
    }
    $conn->close();
    return $vendorName;
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