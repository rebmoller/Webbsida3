<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Comment extends Model
 
{
 	
	protected $fillable = ['comment','recipe_id','user_id'];

	public function user(){

		return $this->hasOne('App\User', 'foreign_key', 'name');
	}
 
}
