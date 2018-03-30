<?php

namespace Users;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table;

	/**
	 * The number of models to return for pagination.
	 *
	 * @var int
	 */
	protected $perPage = 15;

	/**
	 * The name of the "created at" column.
	 *
	 * @var string
	 */
	const CREATED_AT = 'visited_at';
}
