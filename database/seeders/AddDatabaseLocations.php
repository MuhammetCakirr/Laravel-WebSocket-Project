<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class AddDatabaseLocations extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::query()->create(
            [
                "country"=>"Türkiye",
                "city"=>"İstanbul",
                "state"=>"Kağıthane",
                "line_1"=>"Yahya Kemal Mh, Şair Sk. Sarılar İş Merkezi No:1 K:1",
                "line_2"=>""
            ]
        );

        Location::query()->create(
            [
                "country"=>"Türkiye",
                "city"=>"İstanbul",
                "state"=>"Beykoz",
                "line_1"=>"Gümüşsuyu, Kirazlı Yayla Cd. No:89, 34820",
                "line_2"=>""
            ]
        );

        Location::query()->create(
            [
                "country"=>"Türkiye",
                "city"=>"İstanbul",
                "state"=>"Şişli",
                "line_1"=>"19 Mayıs, Büyükdere Cd. No:22, 34360 Şişli/İstanbul",
                "line_2"=>""
            ]
        );

        Location::query()->create(
            [
                "country"=>"Türkiye",
                "city"=>"İstanbul",
                "state"=>"Kartal",
                "line_1"=>"Yalı, Turgut Özal Blv. No:261, 34844 Maltepe/İstanbul",
                "line_2"=>""
            ]
        );

        Location::query()->create(
            [
                "country"=>"Türkiye",
                "city"=>"Kocaeli",
                "state"=>"İzmit",
                "line_1"=>"Yenişehir, Adnan Menderes Blv. No:9, 41000 İzmit/Kocaeli",
                "line_2"=>""
            ]
        );
    }
}
