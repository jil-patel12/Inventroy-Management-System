<?php
    function getGSTPercentage($gstId){
        include("config.php");
        // echo $gstId;
        $gstPercentage = Null;
        $sql = "SELECT * FROM `gst` WHERE `gst_id` = $gstId";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()) {
                $gstPercentage = $row['gst_percentage'];
            }
        }
        $conn->close();
        return $gstPercentage;
    }

    function editGSTPercentage($gstId,$gstPercentage){
        include("config.php");
        if(isset($gstId) && isset($gstPercentage)){
            $gstId = (int)$gstId;
            $gstPercentage = (int)$gstPercentage;
            $sql = "UPDATE `gst` SET `gst_percentage`=$gstPercentage WHERE `gst_id`= $gstId";
            if ($conn->query($sql) === TRUE) {
                echo "GST Percentage Updated.";
                header("location:view-gst.php");
            } else {
                echo "GST Percentage Not Updated.";
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        }
        else{
            echo "Empty";
        }
    }
?>