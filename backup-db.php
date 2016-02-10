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
	
	// Create the mysqldump command
	$mysqlDump = "mysqldump -h ".$dbHost." -u ".$dbUsername." -p".$dbPassword." ".$dbDatabase." > ".$dbBackupPath."bak".date("U").".sql";

	// Execute the command
	exec($mysqlDump);

?>
