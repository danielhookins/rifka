#!/usr/bin/python

# A SCRIPT TO GENERATE THE LARAVEL
# DATABASE MIGRATION FILES
# USING DATA DICTIONARY DEFINITIONS
#
# Daniel Hookins
# daniel@hookins.net

import time
import MySQLdb

# Read configuration from .env file
with open('../../.env') as envfile:
    for line in envfile:
        
		# Get Host Name
		left,sep,right = line.partition('DB_HOST=')
		if sep:
			env_host = right.rstrip()
		
		# Get Database Name
		left,sep,right = line.partition('DB_DATABASE=')
		if sep:
			env_db = right.rstrip()
			
		# Get Username
		left,sep,right = line.partition('DB_USERNAME=')
		if sep:
			env_user = right.rstrip()
			
		# Get Password
		left,sep,right = line.partition('DB_PASSWORD=')
		if sep:
			env_passwd = right.rstrip()

envfile.close()

# Connect to the DB
db = MySQLdb.connect(host = env_host, 
		user = env_user, 
		passwd = env_passwd, 
		db = env_db)
cur = db.cursor() 

# Define Variables
date = time.strftime("%Y_%m_%d_%H%M%S")
useStatements = ["use Illuminate\Database\Schema\Blueprint;\n", 
	"use Illuminate\Database\Migrations\Migration;\n"]

# Iterate through all of the tables
cur.execute("SELECT name FROM kamus_tables")

tables = list(cur.fetchall())
cur.close()

for table in tables :

	tableName = table[0]

	# Get the party started
	migration_file = open(date + "_create_" + tableName.lower() + "_table.php", "w")
	migration_file.write("<?php\n\n") 

	# Use Statements
	migration_file.writelines(useStatements) 


	# Class Open
	migration_file.write("\nclass Create" + tableName.replace("_", "") + "Table extends Migration {\n")

	# Up Function Open
	migration_file.write("\n\t/**\n\t * Run the migrations.\n\t *\n\t * @return void\n\t */\n\tpublic function up()\n\t{\n\t\tSchema::create('" + tableName + "', function(Blueprint $table)\n\t\t{\n")
		
	# Get the attributes for the table
	cur = db.cursor() 
	query = "SELECT * FROM `kamus_attributes` WHERE `table`='" + tableName + "'"
	cur.execute(query)
	attributes = list(cur.fetchall())
	cur.close()
	
	for attribute in attributes :
		if not attribute[4] :
			migration_file.write("\t\t\t$table->" + attribute[5] + "('" + attribute[2] + "');\n")
		else :
			migration_file.write("\t\t\t$table->" + attribute[5] + "('" + attribute[2] + "')->unsigned();\n")
	
	
	# Up Function Close
	migration_file.write("\t\t});\n\t}\n")

	# Down Function Complete
	migration_file.write("\n\t/**\n\t * Reverse the migrations.\n\t *\n\t * @return void\n\t */\n\tpublic function down()\n\t{\n\t\tSchema::drop('" + tableName + "');\n\t}\n")

	# Class Close
	migration_file.write("\n}\n")

	# Time to go home
	migration_file.close
	
#Close up shop
db.close ()