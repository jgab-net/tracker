<?php
/**
 * User: jgab
 * Date: 18/07/14
 * Time: 08:39 PM
 */

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\MessageBag;

class StoryController extends BaseController{

    public function index(){
        return Response::make(
            json_encode(Story::withTrashed()->get(),JSON_UNESCAPED_SLASHES)
        )->header('Content-Type', "application/json");
    }

    public function start($storyId){

        try{
            $story=Story::findOrFail($storyId);

            $story->change = time();
            $story->status = 'START';
            $story->save();

            Requests::put(
                str_replace(
                    array('{project_id}','{story_id}'),
                    array($story->project->pivotal_id,$story->pivotal_id),
                    Config::get('services.pivotal.story')
                ),
                array(
                    'Accept' => 'application/json',
                    'X-TrackerToken' => Auth::user()->api_token
                ),
                array('current_state' => 'started')
            );

            $response = new stdClass();
            $response->message = 'Story Started';
            return Response::json($response);

        }catch(ModelNotFoundException $e){

            $errors = new MessageBag();
            $errors ->add('model','story not found');
            return Response::json($errors, 400);

        }catch(Requests_Exception $e){

            $errors = new MessageBag();
            $errors ->add('model','requests: bad url');
            return Response::json($errors, 400);

        }

    }

    public function pause($storyId){
        try{
            $story=Story::findOrFail($storyId);

            $story->time += time() - $story->change;
            $story->status = 'PAUSE';

            $story->save();

            $response = new stdClass();
            $response->message = 'Story Paused';
            return Response::json($response);

        }catch(ModelNotFoundException $e){
            $errors = new MessageBag();
            $errors ->add('model','story not found');
            return Response::json($errors, 400);
        }
    }

    public function stop($storyId){
        try{
            $story=Story::findOrFail($storyId);

            if($story->started()){
                $story->time += time() - $story->change;
            }

            $story->status = 'CLOSE';
            $story->save();
            $story->delete();

            Requests::put(
                str_replace(
                    array('{project_id}','{story_id}'),
                    array($story->project->pivotal_id,$story->pivotal_id),
                    Config::get('services.pivotal.story')
                ),
                array(
                    'Accept' => 'application/json',
                    'X-TrackerToken' => Auth::user()->api_token
                ),
                array('current_state' => 'finished')
            );

            $response = new stdClass();
            $response->message = 'Story Finished';
            return Response::json($response);

        }catch(ModelNotFoundException $e){

            $errors = new MessageBag();
            $errors ->add('model','story not found');
            return Response::json($errors, 400);

        }catch(Requests_Exception $e){

            $errors = new MessageBag();
            $errors ->add('model','requests: bad url');
            return Response::json($errors, 400);

        }

    }

} 