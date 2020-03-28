<?php

use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \Illuminate\Support\Facades\DB::table('questions')->insertOrIgnore([
                'id' => 1,
                'text' => 'First And Last Name',
                'rules' => 'required',
                'sort_order' => 1,
         ]);
         \Illuminate\Support\Facades\DB::table('questions')->insertOrIgnore([
                'id' => 2,
                'text' => 'Age',
                'rules' => 'required|integer|min:1',
                'sort_order' => 2,
         ]);
    }
}
