<?php
    $Input = $_POST['input_box'];
    $conn = mysqli_connect('localhost', 'root', "", 'bookmark') or die("Connection Failed.");
    $sql = "SELECT * FROM books WHERE BookName = '$Input'";
    $res = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($res);

    if($check > 0){
        header("location: index.php?book=exists.");
        exit();
    }
    else{
        $insert = "INSERT INTO books(BookName) values('$Input')";
        mysqli_query($conn, $insert);
        header("location: index.php?book=added.");
        exit();
    }
    

    


?>