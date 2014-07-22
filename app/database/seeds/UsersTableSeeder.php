<?php
/**
 * User: jgab
 * Date: 16/07/14
 * Time: 05:27 PM
 */

class UsersTableSeeder extends Seeder {

    public function run(){
        DB::table('users')->delete();

        User::create(
            array(
                'email' => 'agonzalez@stcsolutions.com.ve',
                'name' => 'Abraham José González Barboza',
                'username' => 'jgab',
                'pivotal_id' => 1205574,
                'password' => Hash::make('Exito.pivot'),
                'api_token' => '945d7ebf96e54dcb8d1223620d98a709'
            )
        );
    }
} 