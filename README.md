Installation Steps:
https://github.com/Gunjan808/user-form  

1. Clone repository to your local environment.
2. Rename the 'env.example' file to '.env'.
3. Set the following environment variables in the '.env' file:
            DB_DATABASE=users
            DB_USERNAME=root
            DB_PASSWORD=
4.  Run composer intsall

5. Run php artisan migrate
6.Run php artisan storage:link
7. Run php artisan db:seed
8.php artisan key:generate
9.http://127.0.0.1:8000/user-form
