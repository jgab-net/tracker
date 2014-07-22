<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace {
/**
 * User: jgab
 * Date: 16/07/14
 * Time: 12:28 PM
 *
 * @property integer $id
 * @property integer $pivotal_id
 * @property string $name
 * @property integer $user_id
 * @property-read \User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\Story[] $stories
 * @method static \Illuminate\Database\Query\Builder|\Project whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Project wherePivotalId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Project whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\Project whereUserId($value) 
 */
	class Project {}
}

namespace {
/**
 * User
 *
 * @property integer $id
 * @property integer $pivotal_id
 * @property string $email
 * @property string $name
 * @property string $username
 * @property string $api_token
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Story[] $stories
 * @property-read \Illuminate\Database\Eloquent\Collection|\Project[] $projects
 * @property-read \Illuminate\Database\Eloquent\Collection|\Role[] $roles
 * @method static \Illuminate\Database\Query\Builder|\User whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\User wherePivotalId($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereEmail($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereUsername($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereApiToken($value) 
 * @method static \Illuminate\Database\Query\Builder|\User wherePassword($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereRememberToken($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereDeletedAt($value) 
 */
	class User {}
}

namespace {
/**
 * User: jgab
 * Date: 19/07/14
 * Time: 12:55 PM
 *
 * @property integer $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\Role whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Role whereName($value) 
 */
	class Role {}
}

namespace {
/**
 * User: jgab
 * Date: 16/07/14
 * Time: 12:28 PM
 *
 * @property integer $id
 * @property integer $pivotal_id
 * @property string $description
 * @property integer $time
 * @property string $url
 * @property string $status
 * @property integer $change
 * @property string $current_state
 * @property string $type
 * @property integer $user_id
 * @property integer $project_id
 * @property \Carbon\Carbon $deleted_at
 * @property-read \User $user
 * @property-read \Project $project
 * @method static \Illuminate\Database\Query\Builder|\Story whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Story wherePivotalId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Story whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\Story whereTime($value) 
 * @method static \Illuminate\Database\Query\Builder|\Story whereUrl($value) 
 * @method static \Illuminate\Database\Query\Builder|\Story whereStatus($value) 
 * @method static \Illuminate\Database\Query\Builder|\Story whereChange($value) 
 * @method static \Illuminate\Database\Query\Builder|\Story whereCurrentState($value) 
 * @method static \Illuminate\Database\Query\Builder|\Story whereType($value) 
 * @method static \Illuminate\Database\Query\Builder|\Story whereUserId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Story whereProjectId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Story whereDeletedAt($value) 
 * @method static \Story rejected($value) 
 */
	class Story {}
}

