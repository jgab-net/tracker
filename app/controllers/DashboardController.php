<?php
/**
 * User: jgab
 * Date: 18/07/14
 * Time: 06:38 PM
 */

class DashboardController extends BaseController{

    public function __construct(){
        $this->beforeFilter('auth', array('except'=>'getLogin'));
        $this->beforeFilter('guest', array('only'=>'getLogin'));
    }

    public function getIndex(){

        //$user = Auth::user()->load('stories');

        $stories = Auth::user()->stories()->paginate(10);

        return Response::view('dashboard', array(
            'stories' => $stories
        ));
    }

    public function getLogin(){


        return Response::view('user.login');
    }

    public function getExit(){
        Auth::logout();
        return Redirect::to('login');
    }
} 