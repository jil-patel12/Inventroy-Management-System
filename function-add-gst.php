<?php
    function addGSTPercentage($percentage){
        include("config.php");
        $sql = "INSERT INTO `gst`(`gst_percentage`) VALUES ('$percentage')";

        if ($conn->query($sql) === TRUE) {
            echo $percentage . "% GST is Added.";
        } 
        else {
            echo "GST is not added.";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>