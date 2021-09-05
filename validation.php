<?php
    session_start();

    $Input = '';
    $update = false;
    $conn = mysqli_connect('localhost', 'root', "", 'bookmark') or die("Connection Failed.");

    if(isset($_POST['save_changes'])){
        $Input = $_POST['input_box'];
        $sql = "SELECT * FROM books WHERE BookName = '$Input'";
        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0){
            $_SESSION['Input'] = $Input;
            header("location: index.php?book=exists");
            exit();
        }
        else{
            $insert = "INSERT INTO books(BookName) values('$Input')";
            mysqli_query($conn, $insert);
            $_SESSION['Input'] = $Input;
            header("location: index.php");
            exit();
        }
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $delete = "DELETE FROM books WHERE ID = '$id'";
        mysqli_query($conn, $delete);
        header("location: index.php");
        exit();
    }

    if(isset($_POST['update_changes'])){
        $name = $_POST['input_box'];
        $change = "UPDATE books SET BookName = '$name'";
        mysqli_query($conn, $change);
        header("location: index.php");
        exit();
    }

    //need to finish the status part and maybe add a custom alert notif or something
    

?>