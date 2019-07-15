# Slot Machine

## Functionality Description
This repository contains a Lumen application with a list of commands that simulates a simple slot game. Upon running the commands, a 5x3 grid is generated and depending on the amount of repeated symbols matching pay-lines and payout percentage is returned

### Fixed Pay-lines
The below grid shows the fixed pay-lines that will be returned if a grid row has 3 or more consecutive symbols:
- 0 3 6 9  12
- 1 4 7 10 13
- 2 5 8 11 14
- 0 4 8 10 12
- 2 4 6 10 14

### Assumptions
1. The pay-line grid is a fixed multi-dimensional and does not increase in rows.
2. Since the pay-line grid is fixed and has 5 rows, then the 1st and 2nd rows of the slots grid will have 2 pay-lines if a payout exist

|Slot Grid Row |Pay-lines Rows |
| --- | ---- |
| 1 | Row 1 + Row 4 |
| 2 | Row 2 + Row 5 |
| 3 | Row 3 | 


## Setup

### Requirements
|Vendor |Version | Repository |
| --- | ---- | ---- |
| PHP | >=7.1.0 | |
| Laravel/Lumen | 5.5.* | https://packagist.org/packages/laravel/lumen-framework |
| vlucas/phpdotenv | ~2.2 | https://packagist.org/packages/vlucas/phpdotenv | 

### Locally Run
1. Clone / download repository locally.
2. Install composer vendors.

    `composer install`
3. Open terminal and navigate to the project's directory.
4. Run PHP Artisan to list all commands.

    `php artisan`
5. Run the command to sample out the functionality of the application. 

    `php artisan demo:auto-spin`

### Docker Container Setup
1. Clone / download repository locally.
3. Open terminal and navigate to the project's directory.
4. Run the docker-compose file to build the docker setup together with composer update.

    `docker-compose up --build -d`
5. List the docker containers to get the id or the name of the container

    `docker ps`
6. Open the container

    `docker exec -it slot-machine-php-fpm bash` 
7. Run the command to sample out the functionality of the application. 

    `php artisan demo:auto-spin`

## Running Commands
|Command | Description | PHP Artisan |
| --- | ---- | --- |
| Auto Spin | Generate a random spin with a bet amount of Eur 1.00 | `php artisan demo:auto-spin` | 

## Running Tests
To run all `phpunit` tests against Models, Services and DTO (_Request, Response_) classes, follow the below steps:
1. Open Terminal to the project's directory
2. Run phpunit (_ideally within the vendor directory for potential version mismatch_) 
    - Local: ```.\vendor\bin\phpunit```
    - Container: ````vendor/bin/phpunit````