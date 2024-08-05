<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AddDatabaseCustomer extends Seeder
{
    protected static string $password;
    public function run(): void
    {

        Customer::query()->create(
            [
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'password' => static::$password ??= Hash::make('password'),
            ]
        );

        Customer::query()->create(
            [
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'password' => static::$password ??= Hash::make('password'),
            ]
        );

        Customer::query()->create(
            [
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'password' => static::$password ??= Hash::make('password'),
            ]
        );

        Customer::query()->create(
            [
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'password' => static::$password ??= Hash::make('password'),
            ]
        );

        Customer::query()->create(
            [
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'password' => static::$password ??= Hash::make('password'),
            ]
        );
    }
}
