<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CPDController extends Controller
{
    public function searchCPD()
    {
        $reports = DB::table('QualificationsDetails')->get();


        return view('admin.cpdmanagement', $reports);

    }
    public function addCPD(Request $request): RedirectResponse
    {
        $CPD = array();
        $CPD->qualification_name = $request->qualification_name;
        $CPD->state_or_territory = $request->state_or_territory;
        $CPD->state_abbreviation = $request->state_abbreviation;
        $CPD->truncated_name = $request->truncated_name;
        $CPD->qualification_classes = $request->qualification_classes;
        $CPD->CPD_unit = $request->CPD_unit;
        $CPD->expiry_renewal_date = $request->expiry_renewal_date;
        DB::table('QualificationsDetails')->insert($CPD);
        return back()->with('success', 'Register successfully');

    }
}
