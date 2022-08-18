<?php

namespace Modules\Medicine\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leaf extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'leafs';

    protected static function newFactory()
    {
        return \Modules\Medicine\Database\factories\LeafFactory::new();
    }
}
