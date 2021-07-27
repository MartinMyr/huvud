<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MigraineLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'comment',
        'pain_level',
        'date',
        'type',
    ];

    /**
     * A Migrainelog has one medicin
     *
     * @return mixed
     */
    public function medicin()
    {
        return $this->hasOne(Medicin::class, 'id');
    }

}
