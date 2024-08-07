<?php

namespace Database\Seeders;

use App\Models\Personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use function Laravel\Prompts\password;

class AddDatabasePersonal extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password=123456;
        Personal::query()->create(
            [
                "name"=>"Mahmut Ceylan",
                "email"=>"mahmut.ceylan@gmail.com",
                "password"=>Hash::make($password),
                "branchId"=>1
            ]
        );
        Personal::query()->create(
            [
                "name"=>"Mustafa Fil",
                "email"=>"mustafa.fil@gmail.com",
                "password"=>Hash::make($password),
                "branchId"=>1
            ]
        );
        Personal::query()->create(
            [
                "name"=>"Ahmet Duldul",
                "email"=>"ahmet.duldul@gmail.com",
                "password"=>Hash::make($password),
                "branchId"=>2
            ]
        );
        Personal::query()->create(
            [
                "name"=>"Süleyman Kul",
                "email"=>"suleyman.kul@gmail.com",
                "password"=>Hash::make($password),
                "branchId"=>2
            ]
        );
        Personal::query()->create(
            [
                "name"=>"Ensar Cunda",
                "email"=>"ensar.cunda@gmail.com",
                "password"=>Hash::make($password),
                "branchId"=>3
            ]
        );
        Personal::query()->create(
            [
                "name"=>"Selim Çiçek",
                "email"=>"selim.cicek@gmail.com",
                "password"=>Hash::make($password),
                "branchId"=>3
            ]
        );
        Personal::query()->create(
            [
                "name"=>"Beyza Yaz",
                "email"=>"beyza.yaz@gmail.com",
                "password"=>Hash::make($password),
                "branchId"=>4
            ]
        );
        Personal::query()->create(
            [
                "name"=>"Demet Akalın",
                "email"=>"demet.akalin@gmail.com",
                "password"=>Hash::make($password),
                "branchId"=>4
            ]
        );
        Personal::query()->create(
            [
                "name"=>"Elif Bozon",
                "email"=>"elif.bozon@gmail.com",
                "password"=>Hash::make($password),
                "branchId"=>5
            ]
        );

    }
}
