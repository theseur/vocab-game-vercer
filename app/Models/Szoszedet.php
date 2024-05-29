<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Szoszedet extends Model
{
    protected $table = 'szoszedet';
    protected $primaryKey = 'id';
    public $incrementing = true;
}
