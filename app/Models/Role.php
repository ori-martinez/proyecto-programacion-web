<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    protected array $dates = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'name' => 'string',
    ];

    /**
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->HasMany(User::class, 'rol_id', 'id');
    }
}
