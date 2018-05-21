
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
        'name' => $faker->name,
        'username' => $faker->unique()->username,
        'password' => 'secret', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\TypeMerk::class, function (Faker $faker) {
    return [
        'nama_type' => $faker->name,
    ];
});

$factory->define(App\ProductsUnit::class, function (Faker $faker) {
    return [
        'nama_unit' => $faker->name,
        'harga_jual' => 2000,
        'kondisi' => $faker->name,
        'type_merk_id' => function(){
            return factory(App\TypeMerk::class)->create()->id;
        },
    ];
});

$factory->define(App\Supplier::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'tlpn' => $faker->phoneNumber,
        'alamat' => $faker->sentence,
    ];
});
