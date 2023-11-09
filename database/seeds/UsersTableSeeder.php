<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new User;
		$item->uuid = Str::uuid();
		$item->name = 'Super Administrator';
		$item->email = 'admin@gmail.com';
		$item->password = bcrypt('admin123');
		$item->email_verified_at = Carbon::now();
		$item->role_id = 0;
		$item->job_position = 'Super Administrator';
		$item->save();
    }
}
