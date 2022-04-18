
<?php 
// view inorocess comlaints and has buttons to click in them for further
//work

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
<?php include("header.php")?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Closed LIST</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Lodged by user</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Date of Issue</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($complaints as $com) : ?>
                        <tr>
                            <td><?php echo $com['c_id'];?></td>
                            <td><?php echo $com['user_id'];?></td>
                            <td><?php echo $com['category_name'];?></td>
                            <td><?php echo $com['state'];?></td>
                            <td><?php echo $com['lodge_date'];?></td>
                            <td><a href="complaint_details.php?c_id=<?php echo $com['c_id']; ?>">Edit</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<?php include("footer.php")?>


