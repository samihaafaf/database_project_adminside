<?php 
// view inorocess comlaints and has buttons to click in them for further
//work
//another query to list number of complaints for each category

    require('config/db.php');

    //$query = "SELECT * FROM complaints where category_name = 'roads'";
    $q2 = "SELECT user_id,count(*) as num from complaints group by user_id";

    $result = mysqli_query($conn,$q2);

    //fetch data
    $complaints = mysqli_fetch_all($result,MYSQLI_ASSOC);

    //FREE RESULT
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);
?>
<?php include("header.php")?>
    <div class="container">
    <h2>Complaints per User</h2>
    <?php foreach($complaints as $com) : ?>
        <div class="well">
        </br>
        <h3><?php echo 'User ID - '. $com['user_id'].' has lodged : '.$com['num'].' complaint(s)'; ?></h3>
        </div>
    <?php endforeach; ?>
    </div>
    <br>
    <br>
    <br>
    <br>
<?php include("footer.php")?>
