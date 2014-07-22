<?php
/**
 * User: jgab
 * Date: 17/07/14
 * Time: 06:02 PM
 */

use Illuminate\Support\MessageBag;

class SyncController extends BaseController{

    public function getIndex(){

        try{
            $request = Requests::get(
                Config::get('services.pivotal.projects'),
                array(
                    'Accept' => 'application/json',
                    'X-TrackerToken' => Auth::user()->api_token
                )
            );
        }catch (Requests_Exception $e){

            $errors = new MessageBag();
            $errors ->add('requests','requests: bad url');
            return Response::json($errors);
        }

        $pivotalProjects = json_decode($request->body, JSON_UNESCAPED_SLASHES);

        $projects = array();
        foreach($pivotalProjects as $pivotalProject){

            $project = Project::firstOrNew(array('pivotal_id' => $pivotalProject['id']));
            $project->name = $pivotalProject['name'];
            $projects[] = $project;
        }

        Auth::user()->projects()->saveMany($projects);

        foreach($projects as $project){
            try{
                $request = Requests::get(
                    str_replace(
                        array('{project_id}','{owner_id}'),
                        array($project->pivotal_id,Auth::user()->pivotal_id),
                        Config::get('services.pivotal.stories')
                    ),
                    array(
                        'Accept' => 'application/json',
                        'X-TrackerToken' => Auth::user()->api_token
                    )
                );
            }catch (Requests_Exception $e){

                $errors = new MessageBag();
                $errors ->add('requests','requests: bad url');
                return Response::json($errors);
            }

            $search = json_decode($request->body, JSON_UNESCAPED_SLASHES);

            //$stories = array();

            foreach($search['stories']['stories'] as $pivotalStory){

                $story = Story::withTrashed()->where('pivotal_id',$pivotalStory['id'])->first();

                if(is_null($story)){
                    $story = new Story();
                }

                $story->pivotal_id = $pivotalStory['id'];
                $story->description = $pivotalStory['name'];
                $story->url = $pivotalStory['url'];
                $story->current_state = $pivotalStory['current_state'];
                $story->type = $pivotalStory['story_type'];
                $story->user_id = Auth::user()->id;


                if($story->trashed()){
                    $story->status = 'DEFAULT';
                    $story->restore();
                }

            }

            //$project->stories()->saveMany($stories);
        }

        $response = new stdClass();
        $response->message = 'Synchronizated';
        return Response::json($response);

    }

}