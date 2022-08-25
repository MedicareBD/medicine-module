<?php

namespace Modules\Medicine\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Core\Helpers\HasAmount;

class Medicine extends Model
{
    use HasFactory, HasAmount;

    protected $guarded = ['id'];

    public function addedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function leaf(): BelongsTo
    {
        return $this->belongsTo(Leaf::class);
    }

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory()
    {
        return \Modules\Medicine\Database\factories\MedicineFactory::new();
    }
}
