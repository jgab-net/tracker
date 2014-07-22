<?php
/**
 * User: jgab
 * Date: 15/07/14
 * Time: 04:58 PM
 */

use Illuminate\Support\MessageBag;

class UsersController extends BaseController {

    public function postLogin(){

        $validator = Validator::make(Input::all(), array(
            'email' => 'required|email',
            'password' => 'required'
        ));

        if($validator->fails()){
            return Redirect::to('login')->withErrors($validator)->withInput();
        }

        try{
            $request = Requests::get(
                Config::get('services.pivotal.me'),
                array('Accept' => 'application/json'),
                array('auth' => array(Input::get('email'),Input::get('password')))
            );
        }catch (Requests_Exception $e){
            $errors = new MessageBag();
            $errors ->add('requests','requests: bad url');
            return Redirect::to('login')->withErrors($errors);
        }

        $pivotal = json_decode($request->body);

        if($request->status_code!=200 && $pivotal->kind=="error"){
            $errors = new MessageBag();
            $errors ->add('pivotaltracker',$pivotal->error.' '.$pivotal->possible_fix);
            return Redirect::to('login')->withErrors($errors);
        }

        $user = User::firstOrNew(array('email'=>Input::get('email')));

        $user->name = $pivotal->name;
        $user->pivotal_id = $pivotal->id;
        $user->username = $pivotal->username;
        $user->password = Hash::make(Input::get('password'));
        $user->api_token = $pivotal->api_token;

        $user->save();

        if (Auth::attempt(
            array(
                'email' => $user->email,
                'password' => Input::get('password')
            ),
            Input::has('remember')
        )){
            return Redirect::intended('/');
        }

        return Redirect::to('/');
    }

} 