<?php 
    
    require('config/db.php');

    //get id of the complaint of complaint 3
    //$id = mysqli_real_escape_string($conn,$_GET['c_id']);
    

    $query = 'SELECT * FROM complaints where c_id= 3';
    
    /*do complaint and user join to get the user name who issued
    complaint with id=3
*/
    $result = mysqli_query($conn,$query);
    //var_dump($result)

    //fetch data
    $complaints = mysqli_fetch_assoc($result);

    //FREE RESULT
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);
?>
<?php include("header.php")?>
    <div class="container">
    <h1> pending complaint detail</h1>
            <h3> complaint id: <?php echo $complaints['c_id']; ?></h3>
            <small> complaint lodged by user: <?php echo $complaints['user_id']; ?></small>
            <p>Detail of complaint: <?php echo $complaints['details']; ?></p>
            <h5>Date of issue: <?php echo $complaints['lodge_date']; ?></h5>
    </div>
<?php include("footer.php")?>
</body>
</html>



