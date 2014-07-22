<?php
/**
 * User: jgab
 * Date: 16/07/14
 * Time: 05:28 PM
 */

class StoriesTableSeeder extends Seeder{
    public function run(){
        DB::table('stories')->delete();

        $user = User::where('username', 'jgab')->first();
        $project = Project::where('name', 'test')->first();

        Story::create(
            array(
                'description' => 'story',
                'time' => 2,
                'pivotal_id' => 61424662,
                'type' => 'type',
                'user_id' => $user->id,
                'url' => '',
                'project_id' => $project->id
            )
        );
    }
} 