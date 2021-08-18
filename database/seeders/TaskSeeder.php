<?php

namespace Database\Seeders;

use App\Models\DemoTask;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DemoTask::create([
            'title' => 'Lorem ipsum dolor sit amet',
            'order' => 1,
            'status' => 0,
        ]);
        DemoTask::create([
            'title' => 'Sed ut perspiciatis unde',
            'order' => 1,
            'status' => 0,
        ]);
        DemoTask::create([
            'title' => 'omnis iste natus error sit voluptatem',
            'order' => 1,
            'status' => 0,
        ]);
        DemoTask::create([
            'title' => 'accusantium doloremque laudantium',
            'order' => 1,
            'status' => 0,
        ]);
        DemoTask::create([
            'title' => 'otam rem aperiam, eaque',
            'order' => 1,
            'status' => 0,
        ]);
        DemoTask::create([
            'title' => 'Nemo enim ipsam voluptatem',
            'order' => 1,
            'status' => 0,
        ]);
        DemoTask::create([
            'title' => 'Quis autem vel eum iure reprehenderit',
            'order' => 1,
            'status' => 0,
        ]);
        DemoTask::create([
            'title' => 'qui in ea voluptate velit esse',
            'order' => 1,
            'status' => 0,
        ]);
        DemoTask::create([
            'title' => 'Quis autem vel eum iure reprehenderit ',
            'order' => 1,
            'status' => 0,
        ]);
    }
}
