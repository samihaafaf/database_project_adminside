<?php 
// view inorocess comlaints and has buttons to click in them for further
//work
//another query to list number of complaints for each category

    require('config/db.php');

    //$query = "SELECT * FROM complaints where category_name = 'roads'";
    $q2 = "SELECT category_name,count(*) as num from complaints group by category_name";

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
    <h1> complaints</h1>
    <h2>complaints per cat</h2>
    <?php foreach($complaints as $com) : ?>
        <div class="well">
        <h3><?php echo 'In '. $com['category_name'].'there are : '.$com['num'].' complaints'; ?></h3>
        </div>
    <?php endforeach; ?>
    </div>
<?php include("footer.php")?>
</body>
</html>
