<?php

namespace Modules\Medicine\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaf extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'leafs';
}
