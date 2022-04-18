<?php 
    
    require('config/db.php');

    $query = 'SELECT * FROM user';

    $result = mysqli_query($conn,$query);

    //fetch data
    $users = mysqli_fetch_all($result,MYSQLI_ASSOC);

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
    <title>user list</title>
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/5/minty/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h1> USER LIST</h1>
    <?php foreach($users as $user) : ?>
        <div class="well">
            <h3><?php echo $user['name']; ?></h3>
            <small> user id is: <?php echo $user['u_id']; ?></small>
        </div>
    <?php endforeach; ?>
    </div>

</body>
</html>



