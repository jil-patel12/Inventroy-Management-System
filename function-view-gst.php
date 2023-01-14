<?php
    function getGSTPercentage(){
        include("config.php");
        $gstPercentage = Null;
        $sql = "SELECT * FROM `gst`";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $row["gst_id"]  ?></td>
                  <td><?php echo $row['gst_percentage']."%"; ?></td>
                  <td> 
					<a title="Edit" class="btn btn-info btn-sm" href="edit-gst.php?id=<?php echo $row['gst_id']; ?>"><i class="fas fa-edit"></i> Edit</a>
				  
					<a title="Delete" class="btn btn-danger btn-sm" href="delete-gst.php?id=<?php echo $row['gst_id']; ?>" onclick="return confirm('Are you sure you wan\'t to detele this record');"><i class="fas fa-trash"></i> Delete</a>
				  </td>
                </tr>
                <?php
            }
        }
        $conn->close();
    }
?>