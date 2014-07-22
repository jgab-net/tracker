<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => array(
		'domain' => '',
		'secret' => '',
	),

	'mandrill' => array(
		'secret' => '',
	),

	'stripe' => array(
		'model'  => 'User',
		'secret' => '',
	),
    'pivotal' => array(
        'me' => 'https://www.pivotaltracker.com/services/v5/me',
        'projects' => 'https://www.pivotaltracker.com/services/v5/projects',
        'stories' => 'https://www.pivotaltracker.com/services/v5/projects/{project_id}/search?query=owner:{owner_id} AND state:unscheduled,rejected',
        'story' => 'https://www.pivotaltracker.com/services/v5/projects/{project_id}/stories/{story_id}'
    )

);
