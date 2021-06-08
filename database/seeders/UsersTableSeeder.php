<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'email1@example.com',
                'email_verified_at' => '2020-08-09 00:00:00',
                'password' => '$2y$10$3Umthps6ZyrxWRAwjzPyUOta54kXfwkwmy34.8uQw8O9OFOn8tCnS',
                'api_token' => 'ynlGN3MAfLdjeHGEjp9aIeSiBPZJKAaBnosAix1ZvZfm27hQN2YtfRxTFjkE',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        User::insert($users);
    }
}
