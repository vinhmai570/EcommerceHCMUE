- First simply clone this repo by using following command:
```sh
git clone https://github.com/vinhmai570/EcommerceHCMUE.git [your-directory]
```

- Now navigate to the directory you cloned the repo into and run the following command
```
composer install
```

- Publish configuration & views:
```
php artisan vendor:publish
```

- Create .env file
```
cp .env.example .env
```

- Set application key
```
php artisan key:generate
```

- Set your database credentials.

- Migrate the databases:
```
php artisan migrate
```
