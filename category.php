
<?php 
// view inorocess comlaints and has buttons to click in them for further
//work

    require('config/db.php');

    if(isset($_POST['name'])){
        //get form data
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        delete_cat($name, $conn);
    }

    function delete_cat($name, $conn) {
        $q2 = 'DELETE from category where name="'.$name.'"';
        $res2 = mysqli_query($conn,$q2);
    }

    $query = "SELECT * FROM category";

    $result = mysqli_query($conn,$query);

    //fetch data
    $categories = mysqli_fetch_all($result,MYSQLI_ASSOC);

    //FREE RESULT
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);
?>
<?php include("header.php")?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Category List</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Category Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $cat) : ?>
                        <tr>
                            <td><?php echo $cat['name'];?></td>
                            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" >
                                <input type="hidden" name="name" value="<?php echo $cat['name'];?>">
                                <th><input type="submit" value="Delete"></th>
                            </form>
                    
                            
                        </tr>
                    
                    <?php endforeach; ?>
                    <a href="update.php?>">ADD category</a>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<?php include("footer.php")?>