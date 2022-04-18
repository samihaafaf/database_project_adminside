<?php 
    
    require('config/db.php');

    //get id of the complaint of complaint 3
    //$id = mysqli_real_escape_string($conn,$_GET['c_id']);
    

    $query = 'SELECT * FROM complaints where c_id= 2';

    
    /*do complaint and user join to get the user name who issued
    complaint with id=3
    $issuer_name = select name from complaints INNER JOIN user ON complaints.user_id = user.u_id where c_id=2;
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inprocess complaint details list</title>
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/5/minty/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h1> inprocess complaint detail</h1>
            <h3> complaint id: <?php echo $complaints['c_id']; ?></h3>
            <small> complaint lodged by user: <?php echo $complaints['user_id']; ?></small>
            <p>Detail of complaint: <?php echo $complaints['details']; ?></p>
            <h5>STATUS: <?php echo $complaints['state']; ?></h5>
            <h5>Date of issue: <?php echo $complaints['lodge_date']; ?></h5>
    </div>

</body>
</html>



