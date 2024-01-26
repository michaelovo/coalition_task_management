Please, treat the below as the steps to reproduce while configuring the project

1. Create a database with any name of your choice, and Configure the database credential by replacing the .env database configuration as shown below:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YOUR_DATABASE_NAME
DB_USERNAME=YOUR_DATABASE_USERNAME
DB_PASSWORD=YOUR_DATABASE_PASSWORD

2. Run the following commands to setup your project environment.
  # composer install

  # php artisan migrate

  # php artisan db:seed

  # php artisan serve

  3. Visit the url below on your browser:

  # http://localhost:8000
