<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'elkhaddari ayoub',
            'role' => '1',
            'email' => 'me@me.me',
            'password' => '123456'
        ]);

        for ($i=1; $i <= 10; $i++) {
        	DB::table('users')->insert([
        		'name' => 'name-' . $i,
                'role' => '2',
                'email' => Str::random(10).'@gmail.com',
                'password' => 'password-' . $i
        	]);
        }

        for ($i=1; $i <= 4; $i++) {
        	DB::table('filieres')->insert([
        		'name' => 'GI-' . $i,
        	]);
        }

        for ($i=1; $i <= 4; $i++) {
        	DB::table('matieres')->insert([
                'name_matiere' => 'ANALYSE-' . $i,

                'filiere_id'=> $i ,
        	]);
        }

        for ($i=1; $i <= 4; $i++) {
        	DB::table('etudiants')->insert([
                'fullname' => 'name-' . $i,
                'apogie' => $i*102,
                'filiere_id' => 1 ,
        	]);
        }



}
}
