<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name'            => $faker->name,
        'username'        => $faker->unique()->username,
        'password'        => 'secret', // secret
        'remember_token'  => str_random(10),
    ];
});

$factory->define(App\TypeMerk::class, function (Faker $faker) {
    return [
        'nama_type' => $faker->name,
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name'         => $faker->name,
        'harga_jual'   => 2000,
        'kondisi'      => 'Baru',
        'type_merk_id' => function(){
            return factory(App\TypeMerk::class)->create()->id;
        },
    ];
});

$factory->define(App\Supplier::class, function (Faker $faker) {
    return [
        'nama'   => $faker->name,
        'tlpn'   => $faker->phoneNumber,
        'alamat' => $faker->sentence,
    ];
});

$factory->define(App\Transaksi::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory(App\User::class)->create()->id;
        },
        'product_id' => function(){
            return factory(App\Product::class)->create()->id;
        },
        'stok_id' => function(){
            return factory(App\Stok::class)->create()->id;
        },
        'invoice_no' => str_random(5),
        'items'   => [],
        'customer'=> ['name' => $faker->name, 'phone' => $faker->phoneNumber],
        'payment' => 1000,
        'total'   => 1000,
    ];
});

$factory->define(App\Stok::class, function (Faker $faker) {
    return [
        'product_id' => function(){
            return factory(App\Product::class)->create()->id;
        },
        'sm_no'          => str_random(5),
        'stok_masuk'     => 10,
        'stok_awal'      => 0,
        'stok_akhir'     => 10,
        'penjualan_stok' => 5,
        'harga_beli'     => 1000,
        'total'          => 100000,
        'tgl_masuk'      => $faker->dateTimeThisYear('+1 month'),
    ];
});
