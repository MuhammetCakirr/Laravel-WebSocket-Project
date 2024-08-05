<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
class AddDatabaseStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusRecieved =Status::query()->create(
            ["name"=>"Order Received"]
        );

        $statusPreparing =Status::query()->create(
            ["name"=>"Order Preparing"]
        );

        $statusIsOnTheWay =Status::query()->create(
            ["name"=>"Order is on the way"]
        );

        $statusDelivered =Status::query()->create(
            ["name"=>"Order has been delivered"]
        );

        $statusCanceled =Status::query()->create(
            ["name"=>"Order has been canceled"]
        );
    }
}
