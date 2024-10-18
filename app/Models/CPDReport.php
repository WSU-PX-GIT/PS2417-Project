<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPDReport extends Model
{
    use HasFactory;

    protected $table = 'CPDReport';
    protected $fillable = [
        'user_id',
        'cpd_name',
        'qualification_id',
        'cpd_type',
        'units',
        'is_cpd_evidence_attached',
        'cpd_evidence',
        'expiry_date',
        'CPD_year',
        'year_completed',
        'last_updated',
        'record_status'
    ];



}
