<?php 
/* view closed comlaints and has buttons to click in them for viewing details like remarks
and deleting the complaint finally
*/
    require('config/db.php');

    $query = "SELECT * FROM complaints where state = 'closed'";

    $result = mysqli_query($conn,$query);

    //fetch data
    $complaints = mysqli_fetch_all($result,MYSQLI_ASSOC);

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
    <title>complaints list</title>
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/5/minty/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h1> COMPLAINT LIST</h1>
    <h2>closed complaints complaints</h2>
    <?php foreach($complaints as $com) : ?>
        <div class="well">
            <h3>Complaint ID: <?php echo $com['c_id']; ?></h3>
            <small> complaint category: <?php echo $com['category_name']; ?></small>
            <a href="closed_det.php?c_id=<?php echo $com['c_id']; ?>">Details</a>
        </div>
    <?php endforeach; ?>
    </div>
