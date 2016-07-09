<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {

	public $timestamps = false;
	protected $table = 'members'; //  เชื่อมกับตาราง member

	protected $fillable = [
		'fullname',
		'gender',
		'email',
		'tel',
		'age',
		'address',
		'avartar',
		'status'
	];


}
