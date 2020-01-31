<?php

use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert(
            'insert into todos (
                user_id,
                title,
                comp_cls,
                time_limit,
                priority_cls,
                description) 
            values (
                1,
                "test",
                false,
                "2020-01-31",
                0,
                "test")');
    }
}
