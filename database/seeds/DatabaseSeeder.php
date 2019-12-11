<?php

use Illuminate\Database\Seeder;
use App\Teams;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        //factory(App\Posts::class, 20)->create();

        //ejemplo de crear una facultad
        Teams::create([
            'email' => "informatics@workflow.com",
            'area' => "Informatics"
        ]);
        Teams::create([
            'email' => "art.and.design@workflow.com",
            'area' => "Art and Design"
        ]);
        Teams::create([
            'email' => "social.sciences@workflow.com",
            'area' => "Social sciences"
        ]);
        Teams::create([
            'email' => "medicine@workflow.com",
            'area' => "Medicine"
        ]);
        Teams::create([
            'email' => "economic.sciences@workflow.com",
            'area' => "Economic sciences"
        ]);
    }
}
