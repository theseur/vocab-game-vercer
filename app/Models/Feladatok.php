<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feladatok extends Model
{
    protected $table = 'feladatok';
    protected $primaryKey = 'id';
    public $incrementing = true;
}
