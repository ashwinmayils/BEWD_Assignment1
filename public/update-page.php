<?php 

    // include the config file that we created last week
    require "../config.php";

    //simple if/else statement to check if the id is available
    if (isset($_GET['id'])) {
        //yes the id exists 
        
        // quickly show the id on the page
        echo $_GET['id'];
        
    } else {
        // no id, show error
        echo "No ID - Unkown Error";
        //exit;
    }
?>