<?php

    session_start();

    $Input = $_POST['input_box'];
    $conn = mysqli_connect('localhost', 'root', "", 'bookmark') or die("Connection Failed.");
    $sql = "SELECT * FROM books WHERE BookName = '$Input'";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) == 0){

        $insert = "INSERT INTO books(BookName) values('$Input')";
        mysqli_query($conn, $insert);
        header("location: index.php?book=added.");
        $reso = mysqli_query($conn,$sql);
        
        //Need the output to be fixed
        while ($row = mysqli_fetch_assoc($reso)){
            $_SESSION['Book'] = $row['BookName'];          
        }
        exit();
        
    }
    else{
        header("location: index.php?book=exists.");
        exit();
    }




?>