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

    <form action = "validation.php" method = "POST">
        <div class="container">    
            <div> 
                <input class = "input-container" placeholder="Name of the Book to be Saved" name = "input_box" required>
                <?php
                    $link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if(strpos($link, "book=exists") == true){
                        echo "<p id = 'msg'> Book is Already Listed. </p>";
                    }    
                ?>
            </div>
            <div> <button class = "save-button" name = "save_changes">Save</button> </div>
            <div> <button class = "delete-button" name = "remove_something"> Delete </button> </div>     
        </div>    
    </form>

   

</body>

</html>