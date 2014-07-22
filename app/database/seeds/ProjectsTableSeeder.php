<?php
/**
 * User: jgab
 * Date: 16/07/14
 * Time: 05:28 PM
 */

class ProjectsTableSeeder extends Seeder{

    public function run(){
        DB::table('projects')->delete();

        $user = User::where('username','jgab')->first();

        Project::create(
            array(
                'pivotal_id' => 981282,
                'name' => 'test',
                'user_id' => $user->id
            )
        );
    }
} 