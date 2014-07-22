<?php

use Illuminate\Support\MessageBag;

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    public function missingMethod($parameters = array())
    {
        $errors = new MessageBag();
        $errors ->add('method','Route not found');

        if(Request::ajax()){
            return Response::json($errors,404);
        }else{
            return Redirect::to('/')->withErrors($errors);
        }
    }
}
