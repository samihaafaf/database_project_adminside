<?php 
    
    require_once('config/db.php');

    $query = 'SELECT * FROM user';

    $result = mysqli_query($conn,$query);

    //fetch data
    $users = mysqli_fetch_all($result,MYSQLI_ASSOC); 

    //FREE RESULT
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);
?>
<?php include("header.php")?>
        <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <div
              class="d-sm-flex align-items-center justify-content-between mb-4"
            >
              <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
              
            </div>

          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
<?php include("footer.php")?>