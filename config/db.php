<?php
    //creating connections
    $conn = mysqli_connect('localhost','root','','project');

    //check connection
    if(mysqli_connect_errno()){
        //connection failed

        echo 'try again'.mysqli_connect_errno();
    }
?>