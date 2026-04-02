<?php

namespace App\Models;

// change namespace to App\Models if you put your model inside models namespace App\Models;

// library to create Model under lumen use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;

class UserJob extends Model
{
// name of table
protected $table = 'user_job';

// column in table
protected $fillable = [
'jobID', 'jobName',
];

// The code below will not require the field create at and update at in Lumen
public $timestamps = false;

// The code will customized your primary key field name, default in lumen is id
protected $primaryKey = 'jobID';
}

