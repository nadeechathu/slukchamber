# INSTALLATION AND OTHER INSTRUCTIONS 

## Started on 2023-09-20

## Structure

- Admin panel - Laravel (10.10)

## Installation instructions

- clone the project from the github (git clone https://github.com/guisrilanka/GUI_CMS_Revamp.git)

### Admin panel

- composer install (to resolve admin dependencies)
- copy the .env.example file and rename as .env
- php artisan migrate (run the migrations)
- php artisan db:seed (to run the database seeders)
- npm install
- npm run build (to create manifest json)
- php artisan serve --host host --port port (Eg : php artisan serve --host localhost --port 8001)



## Admin panel login credentials

- username - admin@guisrilanka.com
- pass - gui12345

## Permissions update

- add newly added permissions to CSV file located in "public/csvs/permission.csv"