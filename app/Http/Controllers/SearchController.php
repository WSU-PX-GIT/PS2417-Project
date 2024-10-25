<?php
namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller {
    public function adminsearch(Request $request) {

        $userName = $request->search; // Record being searched
        $userdetails = DB::table("users")->where("name",$userName)->first();
        echo "<br/>";
        if ($userdetails) {
            return view('admin.adminassignconfirm', ['user' => $userdetails]);
        } else {
            return back()->with('success', 'No User Found');
        }
    }
    public function agencysearch(Request $request) {

        $userName = $request->search; // Record being searched
        $userdetails = DB::table("users")->where("name",$userName)->first();
        echo "<br/>";
        if ($userdetails) {
            if ($userdetails->usertype == "admin") {
                return back()->with('success', 'Cannot Change Administrator User');
            }
            else{
                return view('agency.agencyassignconfirm', ['user' => $userdetails]);
            }

        } else {
            return back()->with('success', 'No User Found');
        }
    }
    public function editAdminUserConfirm(Request $request,$id): RedirectResponse
    {

        $data = [
            'AgencyName' => null,
            'AgencyID' => null,
            'usertype' => $request->input('usertype'),
            'updated_at' => now()
        ];


        DB::table('users')->where('id', $id)->update($data);
        return back()->with('success', 'Edited successfully');
    }
    public function editAgencyUserConfirm(Request $request,$id): RedirectResponse
    {
        if ($request->input('usertype') == 'agent'){
            $data = [

                'AgencyName' => Auth::user()->AgencyName,
                'AgencyID' => Auth::user()->AgencyID,
                'updated_at' => now()
            ];
        }
        else {
            $data = [
                'usertype' => $request->input('usertype'),
                'AgencyName' => Auth::user()->AgencyName,
                'AgencyID' => Auth::user()->AgencyID,
                'updated_at' => now()
            ];
        }


        DB::table('users')->where('id', $id)->update($data);
        return back()->with('success', 'Edited successfully');
    }
}
