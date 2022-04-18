<?php
    //creating connections
    $conn = mysqli_connect('localhost','root','','370main');

    //check connection
    if(mysqli_connect_errno()){
        //connection failed

        echo 'try again honey'.mysqli_connect_errno();
    }
?>