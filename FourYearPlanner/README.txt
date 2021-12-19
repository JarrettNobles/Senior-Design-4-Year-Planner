*IMPORTANT - all of the logins for your mySQL database need to be changed over to the user and password for your specific system

The 4YearPlanner.ods file is a copy of our mySQL database but missing column headers in the table
The 4YearPlanner.sql file is a direct copy of our mySQL database

the 'raw' directory is an exact copy of our /var/www/html (apache) directory with no changes or anything removed

The 'html' directory is a cleaned version of our /var/www/html directory
**ALSO IMPORTANT all contents of the 'html' folder have flags set to 777 (i.e. chmod 777) so make sure to set these appropriately

Explanations of files in 'html'

Photos - directory where photos for the site are stored

about.php - the about page
advisor.php - the page that advisors go to after login
anav.php - the navbar for advisors
create.php - the page for creating 4 year planners
db_config.php - used for logging into mySQL USING THE PASSWORD ON OUR SERVER*
index.php - the index for logged in students
login.php - the login page
logout.php - page that just has logout code
majorForm.php - the change major page
navbar.php - the navbar for students
pass.html - the login credentials for phpMyAdmin on OUR SERVER*
profile.php - the page with details of the logged in student
register.php - the page for creating new student accounts
template.php - template page with navbar and footer for creating new pages