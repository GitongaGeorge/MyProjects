<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarehe extends Model
{
  protected $table="tarehes";
  protected $primarykey="id";
  public $timestamps = false;
}
