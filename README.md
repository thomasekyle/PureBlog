## PureBlog
Out of boredom I put together a personal blog web app using the Laravel (5.1 LTS) framework

## Deployment
<p>Make sure you set up your database prior to running these commands.</p>
<p>Database config can be found in the config folder named database.php. You can use MySQL, MariaDB, SQLite or whatever you prefer.
</p>

    git clone https://github.com/thomasekyle/PureBlog.git
    php artisan migrate
    php artisan db:seed
  
<p>Default account will be webadmin@pureblog.com. Password is pleasechangeme</p>
<p>You will get a default post, and blog details. You can change these as necessary.</p>


## What it looks like
![alt tag](https://github.com/thomasekyle/PureBlog/purefront.png)
![alt tag](https://github.com/thomasekyle/PureBlog/pureback.png)

All designs are responsive.

## Bugs
If you discover any bugs within the program please email me at thomasekyle@gmail.com

### License
GNU GPL3
