<?php
    function getReportData($sd,$ed){
        include("config.php");
        ?>
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                  <th>Purchase Id</th>
                  <th>Vendor Name</th>
                  <th>Challan</th>
                  <th>Sub Total</th>
                  <th>GST</th>
                  <th>Discount</th>
                  <th>Shipping Charge</th>
                  <th>Total Amount</th>
                  <th>Order Status</th>
                  <th>Payment Status</th>
                  <th>Delivery Received by</th>
                  <th>Datetime</th>
                </tr>
            </thead>
            <tbody>
        <?php        
        $sql = "SELECT * FROM `purchase_master`";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                $orderDate = strtotime($row["purchase_date"]);
                $startDate = strtotime($sd);
                $endDate = strtotime($ed);
                if($orderDate>$startDate && $orderDate<$endDate){
                    ?>
                        <tr>
                            <td><?php echo $row["purchase_id"]; ?></td>
                            <td><?php echo getVendorName($row["vendor_id"]); ?></td>
                            <td><?php echo $row["challan"]; ?></td>
                            <td><?php echo $row["bill_amount"]; ?></td>
                            <td><?php echo $row["GST"]; ?></td>
                            <td><?php echo $row["discount"]; ?></td>
                            <td><?php echo $row["shipping"]; ?></td>
                            <td><?php echo $row["total_amount"]; ?></td>
                            <td><?php echo $row["order_status"]; ?></td>
                            <td><?php echo $row["payment_status"]; ?></td>
                            <td><?php echo $row["received_by"]; ?></td>
                            <td><?php echo $row["Insert_At"]; ?></td>
                        </tr>
                    <?php
                }
            }
        } else {
        echo "0 results";
        }
        $conn->close();
        ?>
        </tbody>
        </table>
        <?php
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

    function getPurchaseDetailsData($sd,$ed){
        include("config.php");
        ?>
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                  <th>P. D. Id</th>
                  <th>Purchase Id</th>
                  <th>Vendor Name</th>
                  <th>Product Name</th>
                  <th>Unit Price</th>
                  <th>Actual Qty</th>
                  <th>Buying Qty</th>
                  <th>Short Item</th>
                  <th>Buying Price</th>
                  <th>Date Time</th>
                </tr>
            </thead>
            <tbody>
        <?php        
        $sql = "SELECT `purchase_id`,`purchase_date`,`Insert_At` FROM `purchase_master`";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                $orderDate = strtotime($row["purchase_date"]);
                $startDate = strtotime($sd);
                $endDate = strtotime($ed);
                $purchaseId = $row["purchase_id"];
                if($orderDate>$startDate && $orderDate<$endDate){
                    $sql1 = "SELECT * FROM `purchase_detail` WHERE `purchase_id` = $purchaseId";
                    $result1 = $conn->query($sql1);
                    if($result1->num_rows>0){
                        while($row1 = $result1->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $row1["purchase_detail_id"]; ?></td>
                                <td><?php echo $row1["purchase_id"]; ?></td>
                                <td><?php echo getVendorName($row1["vendor_id"]); ?></td>
                                <td><?php echo getProductName($row1["product_id"]); ?></td>
                                <td><?php echo $row1["unit_price"]; ?></td>
                                <td><?php echo $row1["actual_quantity"]; ?></td>
                                <td><?php echo $row1["buying_qty"]; ?></td>
                                <td><?php echo $row1["short_item"]; ?></td>
                                <td><?php echo $row1["buying_price"]; ?></td>
                                <td><?php echo $row["Insert_At"]; ?></td>
                            </tr>
                            <?php
                        }
                    }
                }
            }
        } else {
        echo "0 results";
        }
        $conn->close();
        ?>
        </tbody>
        </table>
        <?php
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
        $conn->close();
        return $productName;
    }

?>