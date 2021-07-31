<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    use HasFactory;
    public $table = 'card';

    protected $fillable = ['content'];

    public function row()
    {
        return $this->belongsTo(Row::class);
    }

}
