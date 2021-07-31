<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    use HasFactory;
    public $table = 'card';

     // Primary Key
     public $primaryKey = 'id';

    protected $fillable = ['content', 'row_id'];

    public function row()
    {
        return $this->belongsTo(Row::class);
    }


}
