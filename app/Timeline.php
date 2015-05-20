<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model {

	protected $fillable = ['name'];

	public function events(){
		return $this->hasMany('App\Event');
	}

}
