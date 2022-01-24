<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $table="tasks";
  protected $primarykey="id";
  public $timestamps = false;
}
