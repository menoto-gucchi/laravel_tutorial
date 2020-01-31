<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //passwordはtesttest
        DB::insert(
            'insert into users (
                name,
                email,
                email_verified_at,
                password) 
            values (
                "test",
                "test@test.com",
                "2020-01-31",
                "$2y$10$sbaLlcs1.gQllGK3WbGFq.kSbvfCl90O.K7JhLooxl0dTngT4xeG.")');
    }
  
}
