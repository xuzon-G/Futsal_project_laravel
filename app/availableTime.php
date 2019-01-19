<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class availableTime extends Model
{
    protected $table="available_times";
    public $primaryKey='id';
    public $timestamps=true;
}
