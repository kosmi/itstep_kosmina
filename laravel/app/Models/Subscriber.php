<?php

namespace itsep\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
   protected $fillable=['user_id','first_name','last_name','email'];//куда разрешается записывать
}
