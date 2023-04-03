<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'img',
        'price',
        'category_id',
        'sport_id',
    ];

    protected array $dates = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'name' => 'string',
        'img' => 'string',
        'price' => 'string',
        'category_id' => 'integer',
        'sport_id' => 'integer',
    ];

    /**
     * @return belongsTo
     */
    public function categorie(): belongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * @return belongsTo
     */
    public function sport(): belongsTo
    {
        return $this->belongsTo(Sport::class, 'sport_id');
    }
}
