<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php 
    // making connnection with database 
    $conn = mysqli_connect("localhost","root","","crud")or die("connection failed");


    // writing myql query 
    $sql = "SELECT * FROM student JOIN studentclass ON student.sclass = studentclass.cid";

//  executing mysqk query 
    $result = mysqli_query($conn, $sql)or die("query unsuccessfull");


    // checking the query 
                if(mysqli_num_rows($result)>0)
                {

                
    ?>
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
                    <!-- fetching rows from database and showing in table  -->
        <?php 
        while($row = mysqli_fetch_assoc($result)){
        ?>

            <tr>
                <td><?php echo $row ['sid']; ?></td>
                <td><?php echo $row ['sname'];  ?></td>
                <td><?php echo $row ['saddress']; ?></td>
                <td><?php echo $row ['cname']; ?></td>
                <td><?php echo $row ['sphone']; ?></td>
                <td>
                    <a href='edit.php'>Edit</a>
                    <a href='delete-inline.php'>Delete</a>
                </td>
            </tr>
            <?php } ?>

        <h2></h2>   
        </tbody>
    </table>

    <?php
    
    }
    else
    {  echo "<h2>No Record Found</h2>  " ;
     }

    //  closing the connection 
    mysqli_close($conn);

    ?>
</div>
</div>
</body>
</html>
