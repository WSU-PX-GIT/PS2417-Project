<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\HasBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class CPD extends Model
{
    use HasBuilder;
    use HasFactory;
    protected $table = 'QualificationsDetails';

}
