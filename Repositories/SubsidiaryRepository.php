<?php

namespace Modules\Subsidiary\Repositories;

use Modules\Subsidiary\Entities\Subsidiary;

class SubsidiaryRepository
{

	// LOAD
	public static function loadToSelect($value, $description){
		return Subsidiary::pluck($description, $value);
	}


	// SAVE
	public static function store($data){
		Subsidiary::create($data);
	}
 

}
