<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;
use App\Models\CPDreport;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class CPDReportController extends Controller
{
    public function downloadReport($cpd_filename){
        Storage::download($cpd_filename);
    }
    public function addReport(Request $request)
    {
        $incoming_fields = $request->validate([
            'CPD_name' => ['required', 'string'],
            'Qualification' => ['required', 'string'],
            'cpd_type' => 'required',
            'CPD_evidence' => ['mimes:doc,docx,pdf|max:2048'],
            'units' => ['required', 'min:0', 'integer'],
            'CPD_year' => ['required', 'digits:4', 'integer'],
            'year_completed' => ['required', 'digits:4', 'integer', 'gte:CPD_year']
        ]);

        $report = new CPDReport();

        $report->user_id = Auth::id();
        $report->cpd_name = $request['CPD_name'];
        $report->qualification_id = $request['Qualification'];
        $report->cpd_type = $request['cpd_type'];
        $report->units = $request['units'];
        $report->CPD_year = $request['CPD_year'];
        $report->year_completed = $request['year_completed'];

        if (empty($request['CPD_evidence'])) {
           $report->is_cpd_evidence_attached = false;
           $report->cpd_evidence = 'No Evidence Attached';
       } else {
            $fileName = $request['CPD_evidence']->getClientOriginalName();
            $path = Storage::putFileAs('CPD_Evidence', $request['CPD_evidence'], $fileName);
            $report->cpd_evidence = $path;
            $report->is_cpd_evidence_attached = true;
        }

        $report->last_updated = now();
        $report->record_status = false;

        $qualification = DB::table('QualificationsDetails')
            ->select('QualificationsDetails.retention_period')
            ->where('qualification_id', $request['Qualification'])
            ->first();

        $date = now()->addYears($qualification->retention_period)->format('d-m-Y');;

        $report->expiry_date = $date;

        $report->save();


        return redirect()->route('agentViewReport', ['cpd_id' => $report->id]);

    }



    public function getQualifications()
    {
        $qualifications = DB::table('QualificationsDetails')
            ->select('QualificationsDetails.*')
            ->get();

        return view('agent.agentAddReport', ['qualifications' => $qualifications]);
    }

    public function viewOneReport($cpd_id)
    {

        $report = DB::table('CPDReport')
            ->join('QualificationsDetails', 'CPDReport.qualification_id', '=', 'QualificationsDetails.qualification_id')
            ->select('CPDReport.*', 'QualificationsDetails.qualification_name as qualification_name', 'QualificationsDetails.state_or_territory as region', 'QualificationsDetails.CPD_unit as cpd_unit')
            ->where('CPDReport.cpd_id', $cpd_id)
            ->first();

        if (!$report) {
            return redirect()->route('home')->with('error', 'Report not found.');
        }

        return view('agent.agentViewReport', ['report' => $report]);
    }

    public function viewAllReports()
    {

        $reports = DB::table('CPDReport')
            ->join('QualificationsDetails', 'CPDReport.qualification_id', '=', 'QualificationsDetails.qualification_id')
            ->select('CPDReport.*', 'QualificationsDetails.qualification_name as qualification_name', 'QualificationsDetails.state_or_territory as region')
            ->where('CPDReport.user_id', Auth::id())
            ->get();


        return view('agent.agentAllCPD', compact('reports'));
    }

    public function deleteReport($cpd_id) {
        $record = DB::table('CPDReport')->where('cpd_id', $cpd_id)->first();
        $recordFile = $record->cpd_evidence;
        Storage::delete($recordFile);
        DB::table('CPDReport')->where('cpd_id', $cpd_id)->delete();

        return redirect()->route('agentAllCPD')->with('success', 'CPD record deleted successfully.');
    }
    public function editReport($cpd_id) {
        $qualifications = DB::table('QualificationsDetails')
            ->select('QualificationsDetails.*')
            ->get();

        $report = DB::table('CPDReport')
            ->join('QualificationsDetails', 'CPDReport.qualification_id', '=', 'QualificationsDetails.qualification_id')
            ->select('CPDReport.*', 'QualificationsDetails.qualification_name as qualification_name', 'QualificationsDetails.state_or_territory as region', 'QualificationsDetails.CPD_unit as cpd_unit')
            ->where('CPDReport.cpd_id', $cpd_id)
            ->first();

        if (!$report) {
            return redirect()->route('home')->with('error', 'Report not found.');
        }

        return view('agent.agentEditReport', [
            'report' => $report,
            'qualifications' => $qualifications
        ]);
    }

    public function updateReport(Request $request, $cpd_id) {
        $request->validate([
            'CPD_name' => ['required', 'string'],
            'Qualification' => ['required', 'string'],
            'Qualification_category' => ['nullable', 'string'],
            'cpd_type' => 'required',
            'CPD_evidence' => 'nullable',
            'units' => ['required', 'min:0', 'integer'],
            'CPD_year' => ['required', 'digits:4', 'integer'],
            'year_completed' => ['required', 'digits:4', 'integer', 'gte:CPD_year']
        ]);

        $data = [
            'cpd_name' => $request->input('CPD_name'),
            'qualification_id' => $request->input('Qualification'),
            'cpd_type' => $request->input('cpd_type'),
            'units' => $request->input('units'),
            'CPD_year' => $request->input('CPD_year'),
            'year_completed' => $request->input('year_completed'),
            'last_updated' => now()
        ];


        DB::table('CPDReport')->where('cpd_id', $cpd_id)->update($data);

        return redirect()->route('agentAllCPD')->with('success', 'CPD record updated successfully.');
    }
    public function search(Request $request) {
        $searchTerm = $request->input('search');

        $reports = DB::table('CPDReport')
            ->join('QualificationsDetails', 'CPDReport.qualification_id', '=', 'QualificationsDetails.qualification_id')
            ->select('CPDReport.*', 'QualificationsDetails.qualification_name as qualification_name', 'QualificationsDetails.state_or_territory as region')
            ->where('CPDReport.user_id', Auth::id())
            ->where('CPDReport.cpd_name', 'LIKE', "%{$searchTerm}%")
            ->orWhere('QualificationsDetails.qualification_name', 'LIKE', "%{$searchTerm}%")
            ->get();

        return view('agent.agentAllCPD', ['reports' => $reports]);
    }

    public function closeToExpiryReports()
    {
        $today = now();

        $reports = DB::table('CPDReport')
            ->join('QualificationsDetails', 'CPDReport.qualification_id', '=', 'QualificationsDetails.qualification_id')
            ->select('CPDReport.*', 'QualificationsDetails.qualification_name as qualification_name', 'QualificationsDetails.state_or_territory as region')
            ->where('CPDReport.user_id', Auth::id())
            ->orderBy('CPDReport.expiry_date', 'asc')
            ->get();

        return view('agent.agentActionRequired', compact('reports'));
    }

    public function findAgentReports()
    {

        $reports = DB::table('CPDReport')
            ->join('users', 'users.id', '=', 'CPDReport.user_id')
            ->where('users.usertype', 'agent')
            ->select('CPDReport.*', 'users.id as user_id', 'users.name as user_name')
            ->orderBy('CPDReport.expiry_date', 'asc')
            ->get();


        return view('agency.agencySendReminder', compact('reports'));
    }
}
