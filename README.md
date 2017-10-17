# SEP 2017 - [![Build Status](https://travis-ci.com/IdrisDose/SEP2017.svg?token=7ppvptVmsRbWyCMsFksi&branch=master)](https://travis-ci.com/IdrisDose/SEP2017)

# REQUIRES
    - PHP
    - A Webserver
    - Composer
    - league/flysystem-aws-s3-v3
    - intervention/image
    - ADDING AWS_KEY,AWS_SECRET,AWS_REGION,AWS_BUCKET to .env
# Installation Instructions
 - See How to install [laravel](https://laravel.com/docs/5.5#installation)
 - Once laravel is installed put extract zip or clone to directory
 - Run Composer Install
 - Setup .env to link to your database
 - ADDING AWS_KEY,AWS_SECRET,AWS_REGION,AWS_BUCKET to .env for file storage
 - run 'php artisan migrate' command.
 - run 'php artisan serve' command to host on localhost:8000
