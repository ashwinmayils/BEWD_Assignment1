<?php 
	
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
?>


<?php include "templates/header.php"; ?>

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
    <a href='update-page.php?id=<?php echo $row['id']; ?>'>Edit</a>
</p>

<hr>
<?php }; //close the foreach

?>

<?php include "templates/footer.php"; ?>