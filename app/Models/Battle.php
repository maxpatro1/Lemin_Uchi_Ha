<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Battle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pack_id',
        'team_id',
    ];

    public function pack(): BelongsTo
    {
        return $this->belongsTo(QuestionPack::class,'pack_id','id');
    }
    public function teams(): HasMany
    {
        return $this->HasMany(Teams::class,'team_id','id');
    }
}
