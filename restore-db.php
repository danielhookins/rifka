<?php

/**
 * Restore DB from backup file
 * Assumes client is using XAMPP on windows.
 */ 

	// Load .env file
	require_once __DIR__.'/bootstrap/autoload.php'; 
	Dotenv::load(__DIR__);
	
	// Set environment variables
	$dbHost 			= Dotenv::findEnvironmentVariable('DB_HOST');
	$dbDatabase 	= Dotenv::findEnvironmentVariable('DB_DATABASE');
	$dbUsername 	= Dotenv::findEnvironmentVariable('DB_USERNAME');
	$dbPassword 	= Dotenv::findEnvironmentVariable('DB_PASSWORD');
	$dbBackupPath = Dotenv::findEnvironmentVariable('DB_BACKUP_PATH');

	try {
		
		// Restore from existing backup file
		if(file_exists($dbBackupPath."bak.sql"))
		{
			// Create the mysql command
			$mysqlCmd = "c:\\xampp\\mysql\\bin\\mysql.exe -h ".$dbHost." -D ".$dbDatabase." -u ".$dbUsername." -p".$dbPassword." < ".$dbBackupPath."bak.sql";
			
			// Execute the command
			exec($mysqlCmd);
			
		} else {
			echo "Error: could not restore database.\n";
			echo "No backup file exists.\n";
		}

	} catch (Exception $e) {
		echo "Error: Could not restore database.\n";
		echo $e;
	}	

?>