<?php 
    
    require('config/db.php');

    //get id of the complaint of complaint 3
    //$id = mysqli_real_escape_string($conn,$_GET['c_id']);
    

    $query = 'SELECT * FROM complaints where c_id= 7';
    $q2 = 'SELECT * FROM remarks where com_id=7';
    
    /*do complaint and user join to get the user name who issued
    complaint with id=3
*/
    $result = mysqli_query($conn,$query);
    $res2 = mysqli_query($conn,$q2);
    //var_dump($result)

    //fetch data
    $complaints = mysqli_fetch_assoc($result);
    $remark = mysqli_fetch_assoc($res2);

    //FREE RESULT
    mysqli_free_result($result);
    mysqli_free_result($res2);

    //close connection
    mysqli_close($conn);
?>
<?php include("header.php")?>
    <div class="container">
    <h1> closed complaint detail</h1>
            <h3> complaint id: <?php echo $complaints['c_id']; ?></h3>
            <small> complaint lodged by user: <?php echo $complaints['user_id']; ?></small>
            <p>Detail of complaint: <?php echo $complaints['details']; ?></p>
            <h5>STATUS: <?php echo $complaints['state']; ?></h5>
            <h5>Complaint Remark: <?php echo $remark['details']; ?></h5>
            <h5>Date of issue: <?php echo $complaints['lodge_date']; ?></h5>
    </div>
<?php include("footer.php")?>


