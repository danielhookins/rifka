<?php

/**
 * Automatic DB Backup Script
 *
 * run this as a cron job or windows sheduled task
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
		// Rename existing backup file
		if(file_exists($dbBackupPath."bak.sql"))
		{
			// Delete existing old backup file
			if(file_exists($dbBackupPath."bak.old"))
			{
				unlink($dbBackupPath."bak.old");
			}
			rename($dbBackupPath."bak.sql", $dbBackupPath."bak.old");
		}

		// Create the mysqldump command
		$mysqlDump = "mysqldump -h ".$dbHost." -u ".$dbUsername." -p".$dbPassword." ".$dbDatabase." > ".$dbBackupPath."bak.sql";

		// Execute the command
		exec($mysqlDump);

	} catch (Exception $e) {
		echo "Error: Could not back up database.\n";
		echo $e;
	}	

?>
