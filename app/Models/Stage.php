<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
  protected $table="stages";
  protected $primarykey="id";
  public $timestamps = false;
}
