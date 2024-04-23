<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbBankMaster
 * 
 * @property int $Pkid
 * @property string|null $FY
 * @property Carbon|null $Start_Date
 * @property Carbon|null $End_Date
 * @package App\Models
 */
class dimFY extends Model
{
	protected $table = 'dim_FY';
	protected $primaryKey = 'Pkid';
	public $timestamps = false;

	protected $casts = [
		 
	];

	protected $dates = [
		'Start_Date',
		'End_Date' 
	];

	protected $fillable = [
		'FY',		 
		'Start_Date',
		'End_Date'		 
	];
 
}
