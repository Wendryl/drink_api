# DRINK_API 
An API REST developed for a job test

## Cloning
Clone the project into a web server folder. Usually, in linux distributions, it's located at: /var/www/html/
```bash
git clone https://github.com/Wendryl/drink_api.git
```
You need to use a API Client for sending HTTP POST, PUT and DELETE requests.
I've used [Insomnia](https://insomnia.rest/download/) API Client for testing this project.
Alternatively, you can use any API client of your choice.

## Configuration
Navigate to the folder where the project is located
```bash
cd /var/www/html/drink_api/
```
Edit database configs to match your local database
```bash
vim config/Database.php

   private $host = 'localhost';
   private $db_name = 'rest_api';
   private $username = YOUR DATABASE USERNAME;
   private $password = YOUR DATABASE PASSWORD;
   private $conn;
```
Edit directory variable to match your project's folder location
```bash
vim index.php

   define('DIR', 'YOUR_PROJECT_COMPLETE_PATH');
```

