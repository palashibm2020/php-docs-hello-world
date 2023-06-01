<?php
	// Initialize connection variables.
	$host = "palashdemoavnet.postgres.database.azure.com";
	$database = "postgres";
	$user = "palashdemoavnet@palashdemoavnet";
	$password = "Welcome123";

	// Initialize connection object.
	$connection = pg_connect("host=$host dbname=$database user=$user password=$password")
				or die("Failed to create connection to database: ". pg_last_error(). "<br/>");

	print "Successfully created connection to database. <br/>";

	// Perform some SQL queries over the connection.
	$query = "SELECT * from employees";
	$result_set = pg_query($connection, $query) 
		or die("Encountered an error when executing given sql statement: ". pg_last_error(). "<br/>");
	while ($row = pg_fetch_row($result_set))
	{
		print "Data row = ($row[0], $row[1], $row[2], $row[3]). <br/>";
	}

	// Free result_set
	pg_free_result($result_set);

	// Closing connection
	pg_close($connection);
?>
