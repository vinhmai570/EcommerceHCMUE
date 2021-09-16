## About Project

This projec is Course projects for e-commerce course in HCMUE

## Requirements
* php 7.4
* php extension: pdo_mysql mbstring zip exif pcntl gd
* mysql 5.7

## Development setup

- PHP
```sh
# Macos
brew install php@7.4

# Ubuntu
sudo apt update
sudo apt -y install php7.4
sudo apt-get install -y php7.4-{pdo_mysql,exif,pcntl,gd,mbstring,mysql,zip,gd}
```

- Composer
```sh
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

sudo mv composer.phar /usr/local/bin/composer
```

- Mysql
```sh
# Ubuntu
sudo apt update
sudo apt install mysql-server
sudo mysql_secure_installation
```

## Installation
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

### Todo

- [ ] Activities log

- [ ] Export CSV

- [ ] Improve SEO

- [ ] Paypal checkout

- [ ] Push notification

- [ ] Setup CI/CD

- [ ] Multi Language
