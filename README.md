# Hotel Booking and Recommendation System

<b> Features:-</b>
1. It inputs a json file with predefined data fields and feed them into the database.
2. Users can book a hotel in this application. But first they have to sign up or login to make a booking.
3. Users can also save the incomplete booking of Hotel and see them in their Draft space and complete thie booking process.
4. When a user complete a previously saved incomplete booking from draft, so it autodeletes from the drafts.
5. User can see all his/her previous booking along with the booking date and all the information about the booking.
6. While checking a hotel information, the application automatically identifies the location of the hotel and recommend the user similar hotels in the same location/city.
7. Each hotel contains total number of visitors ever visited the hotel. If a usr revisit the same hotel after 7 days, so he/she will be considered as a new visitor.
<hr>
<b>Installation</b>
1. Copy the whole directory into your server/virtual-server root directory.
2. Upload the .sql file into your MySQL database.
3. Edit /includes/conn.php and add MySQL username and password into the file.
4. Upload the json file into the http://hostname/admin page.
5. Access the application at http://hostname/
<hr>
<b>Limitations</b>

This project has some limitations which are ignored due to the deadline of the project and those flaws do not affect the functioning of the project.
1. There's no authentication system is made for the admin to upload json file.
2. There's no validation is done on the file uploaded.
3. There's no delete option of the user records - manual drafts and booking history
4. The application is only tested on Google Chrome Version 67.0.3396.87 and not on any other browser.
