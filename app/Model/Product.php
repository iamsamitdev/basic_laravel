<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	public $timestamps = false;
	protected $table = 'product'; //  เชื่อมกับตาราง member

	protected $fillable = [
		'prd_id',
		'category_id',
		'prdname',
		'price',
		'menufac_id',
		'status'
	];

}
