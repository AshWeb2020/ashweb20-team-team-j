# ashweb20-team-team-j
Team J is developing a data powered to help the Ashesi Leo Club easily register members, accept donations, and announce all upcoming events to all interested parties.
The title of our project is: Ashesi Leo Club website.
Link to our website: https://leoclubmembership.wordpress.com/

## Setting Up a Server to Run the Website
1. Create a virtual machine in Microsoft Azure
2. Connect to the Virtual Machine
3. Connect to the virtual machine with SSH in shell.
4. Navigate to cd /opt/bitnami/apache2/htdocs where you would then clone GitHub repository in htdocs, using the given file path.
3. Create corresponding database "GJ2022" (the sql query can be found in sprint1.sql file) in phpMyAdmin and export the file to any location
4. Copy the .sql file from the local machine to the Azure virtual machine using scp<filename.sql><destination>:~ (with destination being the the ip address of the virtual machine)
5. Import .sql file into mysql by using the command :  mysql -u root -p bitnami-password< database-file
6. Configure httpd.docs to create environment variable

