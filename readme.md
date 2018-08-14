<p align="left"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<h1 align="left">Aplikasi Point Of Sale Toko Sepeda Ali Cycle</h1>

[![Build Status](https://travis-ci.org/gonedie/ali-cycle-pos.svg?branch=master)](https://travis-ci.org/gonedie/ali-cycle-pos)

Aplikasi Point Of Sale adalah sebuah sistem kasir dan manajemen produk sepeda yang dibuat menggunakan framework Laravel, dibangun dengan Test-Driven Development.

<hr>

## Instalasi
### Spesifikasi
- PHP 7.0
- Laravel 5.4
- MySQL
- SQlite (untuk `automated testing`)

### Cara Install

1. Clone atau download source code
    - Para terminal, clone repo `git clone git@github.com:gonedie/ali-cycle-pos.git`
    - atau `git clone https://github.com/gonedie/ali-cycle-pos.git`
    - Jika tidak menggunakan Git, silakan **Download Zip** dan *extract* pada direktori web server (misal: xampp/htdocs)
2. `cd ali-cycle-pos`
3. `composer install`
4. `cp .env.example .env`
    - Jika tidak menggunakan Git, bisa rename file `.env.example` menjadi `.env`
5. Pada terminal `php artisan key:generate`
6. Buat **database pada mysql** untuk aplikasi ini
7. **Setting database** pada file `.env`
8. Masukkan **Nama Aplikasi**, **Nama Toko**, **Alamat Toko** dan **Telp Toko** pada pada file `.env`
    ```
    APP_NAME="App Test"
    STORE_NAME="Toko Test"
    STORE_ADDRESS="Jl. Test"
    STORE_PHONE="081243445454"
    ```
8. `php artisan migrate --seed`
9. `php artisan serve`
10. Selesai

### Login Admin
```
Username: admin
Password: secret
```

### Automated Testing
Aplikasi ini dilengkapi dengan **Testing Laravel**, ingin mencoba? Silakan:
```
vendor/bin/phpunit
```
<hr>
