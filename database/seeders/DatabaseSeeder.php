<?php namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Status;
use App\Models\Application;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        collect(["Open", "Needs offer", "Offered", "Approved", "In progress", "Ready", "Verified", "Closed"])->map(function ($name) {
                $status=Status::create(compact("name"));
                Application::factory(2)->create(["status_id"=> $status->id]);
            }

        );
    }
}