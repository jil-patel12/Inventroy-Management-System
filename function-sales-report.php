<?php
    function getSalesData($sd,$ed){
        include("config.php");
        ?>
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                  <th>Sales Id</th>
                  <th>Customer Name</th>
                  <th>Receipt No.</th>
                  <th>Sub Total</th>
                  <th>GST</th>
                  <th>Discount</th>
                  <th>Shipping Charge</th>
                  <th>Total</th>
                  <th>Payment Status</th>
                  <th>Order Status</th>
                  <th>Deliver To</th>
                  <th>Last Update</th>
                </tr>
            </thead>
            <tbody>
        <?php        
        $sql = "SELECT * FROM `sales_orders_master`";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                $orderDate = strtotime($row["order_date"]);
                $startDate = strtotime($sd);
                $endDate = strtotime($ed);
                if($orderDate>$startDate && $orderDate<$endDate){
                    ?>
                        <tr>
                            <td><?php echo $row["order_id"]; ?></td>
                            <td><?php echo getCustomerName($row["customer_id"]); ?></td>
                            <td><?php echo $row["receipt_no"]; ?></td>
                            <td><?php echo $row["bill_amount"]; ?></td>
                            <td><?php echo $row["GST"]; ?></td>
                            <td><?php echo $row["discount"]; ?></td>
                            <td><?php echo $row["shipping"]; ?></td>
                            <td><?php echo $row["total_amount"]; ?></td>
                            <td><?php echo $row["payment_status"]; ?></td>
                            <td><?php echo $row["order_status"]; ?></td>
                            <td><?php echo $row["receive_by"]; ?></td>
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
        $conn->close();
        return $customerName;
    }

    function getSalesDetailsData($sd,$ed){
        include("config.php");
        ?>
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                  <th>O. D. Id</th>
                  <th>Sales Id</th>
                  <th>Customer Name</th>
                  <th>Product Name</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Date Time</th>
                </tr>
            </thead>
            <tbody>
        <?php        
        $sql = "SELECT `order_id`,`order_date`,`Insert_At` FROM `sales_orders_master`";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                $orderDate = strtotime($row["order_date"]);
                $startDate = strtotime($sd);
                $endDate = strtotime($ed);
                $salesId = $row["order_id"];
                if($orderDate>$startDate && $orderDate<$endDate){
                    $sql1 = "SELECT * FROM `sales_orders_detail` WHERE `order_id` = $salesId";
                    $result1 = $conn->query($sql1);
                    if($result1->num_rows>0){
                        while($row1 = $result1->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $row1["order_detail_id"]; ?></td>
                                <td><?php echo $row1["order_id"]; ?></td>
                                <td><?php echo getCustomerName($row1["customer_id"]); ?></td>
                                <td><?php echo getProductName($row1["product_id"]); ?></td>
                                <td><?php echo $row1["sales_quantity"]; ?></td>
                                <td><?php echo $row1["sales_price"]; ?></td>
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