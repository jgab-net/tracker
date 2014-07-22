<?php
/**
 * User: jgab
 * Date: 18/07/14
 * Time: 08:33 AM
 */

class EnvironmentComposer {

    public function compose($view){

        $jsEnv = new stdClass();

        $jsEnv->baseURL = URL::to('/');

        if(Auth::check()){
            $data = AuthToken::create(Auth::user());
            $jsEnv->token = AuthToken::publicToken($data);
        }

        $view->with('jsEnv', json_encode($jsEnv, JSON_UNESCAPED_SLASHES));
    }
} 