<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;
use App\Models\CPDreport;
use Illuminate\support\Facades\Auth;

class CPDReportController extends Controller
{
    public function addReport(Request $request)
    {
        $incoming_fields = $request->validate([
            'CPD_name' => ['required', 'string'],
            'Qualification' => ['required', 'string'],
            'Qualification_category' => ['nullable', 'string'],
            'cpd_type' => 'required',
            'CPD_evidence' => 'nullable',
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

        $report->is_cpd_evidence_attached = false;
        $report->cpd_evidence = 'no';
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

    public function uploadFile()
    {

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
            ->where('CPDReport.user_id', Auth::id()) // Show only where user_id = 2
            ->get();


        return view('agent.agentAllCPD', compact('reports'));
    }

    public function deleteReport($cpd_id) {
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
        // Validate the incoming request data
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

        // Query to filter based on CPD name or qualification
        $reports = DB::table('CPDReport')
            ->join('QualificationsDetails', 'CPDReport.qualification_id', '=', 'QualificationsDetails.qualification_id')
            ->select('CPDReport.*', 'QualificationsDetails.qualification_name as qualification_name', 'QualificationsDetails.state_or_territory as region')
            ->where('CPDReport.cpd_name', 'LIKE', "%{$searchTerm}%")
            ->orWhere('QualificationsDetails.qualification_name', 'LIKE', "%{$searchTerm}%")
            ->get();

        return view('agent.agentAllCPD', ['reports' => $reports]);
    }
}
