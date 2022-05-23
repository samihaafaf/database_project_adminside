
<?php 
    
    require('config/db.php');
    
    if (isset($_POST['submit'])){
        $name = $_POST['new_cat'];
        echo 'name is-->'.$name;

        $query = 'INSERT into category(name) values("'.$name.'")';
        $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

        if ($run){
            echo 'category added successfully';
        }
        else{
            echo 'try again';
        }

    }

    
?>






<?php include("header.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <label>Category name</label>
    <input type="text" name="new_cat">
    <button type="submit" name="submit"> ADD</button>

    </form>
</body>
</html>
<?php include("footer.php")?>