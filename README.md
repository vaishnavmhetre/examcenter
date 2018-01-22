# examcenter

The ExamCenter is a system built for easy set up for an MCQ Examination System.  


#### Getting Started:

Very basic work needs to be done to get this system running.

##### Prerequisites:

- Apache, PHP 5-7, MySql (Prefer some LAMP, MAMP or WAMP stack)


##### Setting up:

- Just point your Base Directory for the domain name to public directory in this source in Apache config. 


##### (For Shared Hosting):

Some Shared Hostings may not provide a way to point Apache Config to specific directory and leads to single endpoint of public access (eg: public_html). At such times, follow these instructions -

- Copy **source** to directory where public_html or any publicly accessible folder provided by hosting is situated.

    - [eg.] If the directory structure with public accessible directory is **/public_html**, the source path should be **/source_directory**.

    
- Copy the contents of public folder in source directory to publicly accessible directory (public_html). 

    - Note: please be careful while replacing the **.htaccess** file as it holds apache configs for project. Better don't tamper them.
    

- Go to the copied index.php file in and search for - 

    ```
        ...
        $app = require_once __DIR__.'/../bootstrap/app.php';
        ...
    ```

    and make it point to **app.php** file in *source_dir/bootstrap/*


##### Database Setup:

- Copy *.env.example* to *.env*

- Set Database Name, Username, Password to your setup

- If you're working on local dev, open a terminal in source directory and run ```php artisan migrate```. It will create the desired tables in the database to work over.

- If you're working over a shared hosting, just export the sql file of database using *phpmyadmin* and import it in your shared hosting.

- Now you're good to go