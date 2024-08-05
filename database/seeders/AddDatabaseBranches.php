<?php

namespace Database\Seeders;

use App\Models\Branche;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddDatabaseBranches extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branche::query()->create(
            [
              "name"=>"İstanbul Kağıthane Şubesi",
              "location_id"=>1
            ]
        );

        Branche::query()->create(
            [
              "name"=>"İstanbul Beykoz Şubesi",
              "location_id"=>2
            ]
        );

        Branche::query()->create(
            [
              "name"=>"İstanbul Şişli Şubesi",
              "location_id"=>3
            ]
        );
        Branche::query()->create(
            [
              "name"=>"İstanbul Kartal Şubesi",
              "location_id"=>4
            ]
        );

        Branche::query()->create(
            [
              "name"=>"Kocaeli İzmit Şubesi",
              "location_id"=>5
            ]
        );
    }
}
