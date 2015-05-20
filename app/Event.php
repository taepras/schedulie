<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

	protected $fillable = ['name','start_time','end_time','undertaker','notes','timeline_id'];

	public function timeline(){
		return $this->belongsTo('App\Timeline');
	}
}
