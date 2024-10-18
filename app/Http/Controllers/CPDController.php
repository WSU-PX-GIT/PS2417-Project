<?php

namespace App\Http\Controllers;

use App\Models\CPD;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CPDController extends Controller
{
    public function searchCPD()
    {
        $reports = DB::table('QualificationsDetails')->get();


        return view('admin.cpdmanagement', ['reports' => $reports]);

    }
    public function addCPD(Request $request): RedirectResponse
    {
        $CPD = new CPD();
        $CPD->qualification_name = $request->qualification_name;
        $CPD->state_or_territory = $request->state_or_territory;
        $CPD->state_abbreviation = $request->state_abbreviation;
        $CPD->truncated_name = $request->truncated_name;
        $CPD->CPD_unit = $request->CPD_unit;
        $CPD->expiry_renewal_date = $request->expiry_renewal_date;
        $CPD->last_updated = now();
        $CPD->save();
        return back()->with('success', 'Register successfully');

    }
}
