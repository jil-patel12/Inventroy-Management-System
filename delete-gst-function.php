<?php
    function deleteGSTPercentage($gstId){
        include("config.php");
        $status = FALSE;
        $sql = "DELETE FROM `gst` WHERE `gst_id` = $gstId";

        if ($conn->query($sql) === TRUE) {
            $status = TRUE;
        } 
        $conn->close();
        return $status;   
    }
?>