<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Clone the repository

    https://github.com/ngokebi/Gigs.git

Switch to the repo folder

    cd Gigs

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Import the database file into phpmyadmin

    gigs_db.sql

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

Login requirment

    email: gigs@gmail.com
    password: @rch_101!

Login to Mailtrap to follow up on mails sent to Admin https://mailtrap.io

    email: gigstested@gmail.com
    password: @rch_101!

**TL;DR command list**

    https://github.com/ngokebi/Gigs.git
    cd Gigs
    composer install
    cp .env.example .env
