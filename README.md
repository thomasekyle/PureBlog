## PureBlog

Out of boredom I put together a personal blog web app using the Laravel (5.1 LTS) framework

## Deployment
Make sure you set up your database prior to running these commands.
Database config can be found in the config folder named database.php. You can use MySQL, MariaDB, SQLite or whatever you prefer.

git clone https://github.com/thomasekyle/PureBlog.git
php artisan migrate
php artisan db:seed

Default account will be webadmin@pureblog.com. Password is pleasechangeme

You will get a default post, and blog details. You can change these as necessary.


## Bugs

If you discover any bugs within the program please email me at thomasekyle@gmail.com

### License

GNU GPL3
