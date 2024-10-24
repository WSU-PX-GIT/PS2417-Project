<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualificationsDetails extends Model
{
    use HasFactory;

    protected $table = 'QualificationsDetails';
    protected $fillable = [
        'qualification_name',
        'state_or_territory',
        'state_abbreviation',
        'truncated_name',
        'CPD_unit',
        'expiry_renewal_date',
        'retention_period',
        'last_updated'
    ];

}
