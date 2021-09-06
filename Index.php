<?php 

    include('validation.php');
    session_start();

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];

        $retrieve = mysqli_query($conn, "SELECT * FROM books WHERE ID = '$id'") or die("Connection Failed.");
        $data = mysqli_fetch_array($retrieve);
        $Input = $data['BookName'];
        $_SESSION['id'] = $data['ID'];
        $update = true;
    }

?>

<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/0366655ba3.js" crossorigin="anonymous"></script>
    <title>Homepage</title>
</head>

<body>

    <div class = "header">  
        <span id = "bookmark-icon"> <i class="far fa-bookmark"></i> </span>
        <h1 id="Title">ʙᴏᴏᴋ<span id="mrk">ᴍᴀʀᴋ</span></h1>
    </div>

    <div class="container">
        <form action = "validation.php"method = "POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class = "primary">
                <div> 
                    <input class="input-container" placeholder="Name of the Book to be Saved" name="input_box" value="<?php echo $Input ?>" required> 
                </div> 
                
                <div>

                </div>
                    <select name="status" class="status" required>
                        <option value="" diasbled="disabled"> Status </option>
                        <option value="Added">Haven't Read</option>
                        <option value="Reading">Reading</option>
                        <option value="Finished">Finished</option>
                        <option value="Dropped">Dropped</option>
                    </select>
                <div> 
                    <?php  if($update == false): ?>
                        <button class = "save-button" name = "save_changes">Save</button>
                    <?php  else: ?>
                        <button class = "save-button" name = "update_changes">Update</button>
                    <?php  endif ?>
                </div> 
            </div>    
        </form>

        <?php
            $link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if(strpos($link, "book=exists") == true){
                echo "<script> alert('$Input already Exists.') </script>";
            }
            else if (strpos($link, "status=updated") == true){
                echo "<script> alert('Update Successful.') </script>";
            }  

            if(isset($Input)){
                $sql = "SELECT * FROM books";
                $conn = mysqli_connect('localhost', 'root', "", 'bookmark') or die("Connection Failed.");
                $reso = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_assoc($reso)){
                    echo "<div id = 'Book'> • ".$row['BookName']." (".$row['Status'].")
                    <a id = 'edit' href ='index.php?edit= ".$row['ID']."'> <i class='far fa-edit'></i> </a> 
                    <a id = 'delete' href =' validation.php?delete=".$row['ID']." '> <i class='far fa-trash-alt'></i> </a>
                    <br> </div>";
                }   
            }
        ?>
        

    </div> 

</body>

</html>
