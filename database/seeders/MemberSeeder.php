<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            'name' => 'Tuấn Kiệt',
            'user_id' => User::all()->first()->id,
        ]);

        DB::table('members')->insert([
            'name' => 'Thành Đạt',
            'user_id' => User::all()->first()->id,
        ]);
    }
}
