<?php

namespace App\Http\Controllers;

use App\Models\CPD;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CPDController extends Controller
{
    public function searchCPD()
    {
        $reports = DB::table('QualificationsDetails')->get();


        return view('admin.cpdmanagement', ['reports' => $reports]);

    }
    public function searchCPD2()
    {
        $reports = DB::table('QualificationsDetails')->get();


        return view('admin.adminEditCPD', ['reports' => $reports]);

    }
    public function searchCPD3()
    {
        $reports = DB::table('QualificationsDetails')->get();


        return view('admin.adminDeleteCPD', ['reports' => $reports]);

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
        $CPD->retention_period = $request->retention_period;
        $CPD->last_updated = now();
        $CPD->save();
        return back()->with('success', 'CPD Created successfully');

    }
    public function editCPD($id)
    {
        $CPD = DB::table('QualificationsDetails')->get()->where('qualification_id', $id)->first();


        return view('admin.adminEditConfirm', ['CPD' => $CPD]);

            }
    public function editCPDConfirm(Request $request,$id): RedirectResponse
    {
        $data = [
            'qualification_name' => $request->input('qualification_name'),
            'state_or_territory' => $request->input('state_or_territory'),
            'state_abbreviation' => $request->input('state_abbreviation'),
            'truncated_name' => $request->input('truncated_name'),
            'CPD_unit' => $request->input('CPD_unit'),
            'expiry_renewal_date' => $request->input('expiry_renewal_date'),
            'retention_period' => $request->input('retention_period'),
            'last_updated' => now()
        ];


        DB::table('QualificationsDetails')->where('qualification_id', $id)->update($data);
        return back()->with('success', 'Edited successfully');    }
    public function deleteCPD($delete): RedirectResponse
    {

        DB::table('QualificationsDetails')->where('qualification_id', $delete)->delete();
        return back()->with('success', 'Deleted successfully');
    }
}
