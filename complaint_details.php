<?php 
    
    require('config/db.php');

    $id = mysqli_real_escape_string($conn,$_GET['c_id']);

    if(isset($_POST['state'])){
        //get form data
        $state = mysqli_real_escape_string($conn,$_POST['state']);
        update_state($id, $state, $conn);
    }

    function update_state($id, $state, $conn) {
        $q2 = 'UPDATE complaints SET state="'.$state.'" where c_id ='.$id;
        $res2 = mysqli_query($conn,$q2);
    }
    //get id of the complaint of complaint 3
    
    $query = 'SELECT * FROM complaints where c_id='. $id ;
    //die($q2);
    

    
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
<?php include("header.php")?>
    
    <div class="container-fluid">
        <form action="<?php echo $_SERVER["PHP_SELF"]."?c_id=".$id;?>" method="POST" >
            <h1>Complaint detail</h1>
            <br>
            <h3>Complaint id: <?php echo $complaints['c_id']; ?></h3>
            <br>
            <h3>Complaint lodged by user: <?php echo $complaints['user_id']; ?></h3>
            <br>
            <h3>Detail of complaint: <?php echo $complaints['details']; ?></h3>
            <br>
            <h3>Date of issue: <?php echo $complaints['lodge_date']; ?></h3>
            
            <select class="form-select" aria-label="Default select example" name="state" required>
                <option value="inprocess" <?php echo ($complaints['state'] == "inprocess") ? ' selected' : '' ?>>In Process</option>
                <option value="closed"  <?php echo ($complaints['state'] == "closed") ? ' selected' : '' ?>>Closed</option>
                
            </select>
            
            <button type="submit">Save</button>
        </form>
    </div>
<?php include("footer.php")?>




