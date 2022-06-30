<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CameraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cameras')->insert([
            'ip' => '127.0.0.1',
            'name' => 'Camera 1',
            'user_id' => User::all()->first()->id,
        ]);

        DB::table('cameras')->insert([
            'ip' => '127.0.0.2',
            'name' => 'Camera 2',
            'user_id' => User::all()->first()->id,
        ]);
    }
}
