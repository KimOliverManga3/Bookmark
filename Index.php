<?php session_start(); ?>

<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/0366655ba3.js" crossorigin="anonymous"></script>
    <title>Homepage</title>
</head>

<body>

    <div class = "header">  
        <i class="far fa-bookmark"></i>
        <h1 id="Title">ʙᴏᴏᴋ<span id="mrk">ᴍᴀʀᴋ</span></h1>
    </div>

   
    <div class="container">
        <form action = "validation.php" method = "POST">
            <div class="primary"> 
                <div> <input class = "input-container" placeholder="Name of the Book to be Saved" name = "input_box" required> </div>

                <?php
                    $link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if(strpos($link, "book=exists") == true){
                        echo "<p id = 'msg'> Book is Already Listed. </p>";
                    }    
                ?>

                <div> <button class = "save-button" name = "save_changes">Save</button> </div>
                <div> <button class = "delete-button" name = "remove_something"> Delete </button> </div>
            </div>       
        </form>

        <?php
            
            if(isset($_SESSION['Book']))
                echo "<div id = 'Book'> • ".$_SESSION['Book']." <br> </div>";      
            else
                unset($_SESSION['Book']);

            session_destroy();
        ?>

    </div> 

</body>

</html>
