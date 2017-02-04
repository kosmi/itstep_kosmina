<?php

namespace itsep\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListModel extends Model
{
	use SoftDeletes;
    protected $table = 'lists';
    protected $fillable = ['user_id', 'name'];
}
