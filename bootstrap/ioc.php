<?php


App::bind('EnvironmentComposer', function($app){
    return new EnvironmentComposer();
});

View::composer('layout', 'EnvironmentComposer');