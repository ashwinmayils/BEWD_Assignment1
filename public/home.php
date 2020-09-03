<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "../config.php";
?>

<?php include "templates/header.php"; ?>

    <!-- Main Title and Content-->
        <div>
            <h1 class="MainTitle">Ashwin's Recipes</h1>
            <h2 class="subMainTitle">A collection of recipes to cook to your hearts content</h2>

        </div>

<?php include "templates/footer.php"; ?>