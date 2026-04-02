<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
protected $table = 'users';


protected $fillable = [

'username', 'password', 'gender', 'jobID'
];

protected $hidden = [
'password',

];

public $timestamps = false;
}