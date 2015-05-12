# 370-GUI
We need these tools to complete this GUI. They are as follows:
1.) GitHub Account
2.) GitHub Client
3.) Wamp PHP Server

All of these are free forever and are easy to install. Wamp Server comes with PHPMyAdmin and MySQL stuff, so don't worry about having to get any of that. 

To test if the server is up and running, type in "localhost" in the URL bar, and if it goes somewhere, you are good. If this doesn't work, there is probably some port issues occuring.

Once you have the GitHub account, send me your account name and I'll invite you to collaborate on the GitHub repository. Once you are a collaborator on the respository, you have to clone the repository in the GitHub client by opening it up, clicking the + in the upper left hand corner, and hitting "clone". The repository should be in that list, then click it and set the folder it should be in as the folder that is your Wamp Server root. That folder is probably something like "C:\Program Files (x86)\Wamp\Apache22\htdocs". The main part is the "Apache22\htdocs", that is where your root server folder is. 

Make sure to sync the repository by hitting "sync" in the upper right hand corner. Now go into your server root folder and go into 370-GUI. There, open up the dbcreds.php file in your favorite text editor. Put in your information, which is private, as is directed by the comments in the file. Make sure you NEVER commit this file to the repository, because then everyone will have to change their own personal login information for the database.

Now you should be set to run PHP on your server to test and develop our GUI. I have added some files to the respository that you can look at and test your server with. The first thing you should do is go to localhost/PHPMyAdmin, as I believe PHPMyAdmin should be there, and run the SQL code given on the repository. 

After you've imported the SQL code, go to your favorite browser, and put in "localhost/370-GUI" and you should see a table with some fake data that is updated via PHP. Look at the code, see what's going on and have fun! 