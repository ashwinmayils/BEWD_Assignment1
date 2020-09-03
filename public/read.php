<?php 
ob_start();
// this code will only execute after the submit button is clicked
if (isset($_POST['submit'])) {
	
    // include the config file that we created before
    require "../config.php"; 
    
    // this is called a try/catch statement 
	try {
        // FIRST: Connect to the database
        $connection = new PDO($dsn, $username, $password, $options);
		
        // SECOND: Create the SQL 
        $sql = "SELECT * FROM recipes";
        
        // THIRD: Prepare the SQL
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        // FOURTH: Put it into a $result object that we can access in the page
        $result = $statement->fetchAll();

	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
	}	
}
?>


<?php include "templates/header.php"; ?>


<?php  
    if (isset($_POST['submit'])) {
        //if there are some results
        if ($result && $statement->rowCount() > 0) { ?>
<h2 class="subMainTitle">Results</h2>

<?php 
                // This is a loop, which will loop through each result in the array
                foreach($result as $row) { 
            ?>

<p class="subtitle">
    <b>ID:</b>
    <?php echo $row["id"]; ?><br><b>Recipe Name:</b>
    <?php echo $row['recipename']; ?><br><b>Ingredients:</b>
    <?php echo $row['ingredients']; ?><br><b>Recipe:</b>
    <?php echo $row['recipe']; ?><br><b>Difficulty:</b>
    <?php echo $row['difficulty']; ?><br>
</p>

<hr>
<?php }; //close the foreach
        }; 
    }; 
?>

<form method="post" class="subHeading">

    <input class="subHeading2" type="submit" name="submit" value="View all">

</form>


<?php include "templates/footer.php"; ?>