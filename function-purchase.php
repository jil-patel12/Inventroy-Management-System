<?php
    function getGSTPercentage(){
        include("config.php");
        $gstPercentage = Null;
        $sql = "SELECT * FROM `gst`";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()) {
                ?>
                    <option value="<?php echo $row["gst_percentage"]; ?>"><?php echo $row["gst_percentage"]; ?>%</option>
                <?php
            }
        }
        $conn->close();
    }
?>