<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualificationsCategory extends Model
{
    use HasFactory;

    protected $table = 'QualificationsCategory';
    protected $fillable = [
        'qualification_id',
        'category_name'
    ];

}
