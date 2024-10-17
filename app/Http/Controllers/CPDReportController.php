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
            'CPD_name' => 'required',
            'Qualification' => 'required',
            'Qualification_category' => 'nullable',
            'cpd_type' => 'nullable',
            'CPD_evidence' => 'nullable',
            'units' => ['nullable', 'min:0'],
            'CPD_year' => ['required', 'min:4', 'max:4'],
            'year_completed' => ['required', 'min:4', 'max:4']

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

        $report->save();

//        $cpd_id = $report->cpd_id;

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
        // Find the CPD report by its ID
//            $report =DB::table('CPDReport')
//                ->select('CPDReport.*')
//                ->where('CPDReport.cpd_id', $cpd_id)
//                ->first();

        $report = DB::table('CPDReport')
            ->join('QualificationsDetails', 'CPDReport.qualification_id', '=', 'QualificationsDetails.qualification_id')
            ->select('CPDReport.*', 'QualificationsDetails.qualification_name as qualification_name', 'QualificationsDetails.state_or_territory as region', 'QualificationsDetails.CPD_unit as cpd_unit')
            ->where('CPDReport.cpd_id', $cpd_id)
            ->first();

        // Check if the report exists
        if (!$report) {
            return redirect()->route('home')->with('error', 'Report not found.');
        }

        // Pass the report data to the view
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
        // Delete the report with the given cpd_id
        DB::table('CPDReport')->where('cpd_id', $cpd_id)->delete();

        // Redirect back to the page showing all CPD records with a success message
        return redirect()->route('agentAllCPD')->with('success', 'CPD record deleted successfully.');
    }

    public function updateReport(Request $request, $cpd_id) {
        // Validate the incoming request data
        $request->validate([
            'CPD_name' => 'required',
            'Qualification' => 'required',
            'Qualification_category' => 'nullable',
            'cpd_type' => 'nullable',
            'CPD_evidence' => 'nullable',
            'units' => ['nullable', 'min:0'],
            'CPD_year' => ['required', 'min:4', 'max:4'],
            'year_completed' => ['required', 'min:4', 'max:4']
        ]);

        // Prepare the data to update
        $data = [
            'cpd_name' => $request->input('CPD_name'),
            'qualification_id' => $request->input('Qualification'),
            'qualification_category' => $request->input('Qualification_category'),
            'cpd_type' => $request->input('cpd_type'),
            'units' => $request->input('units'),
            'CPD_year' => $request->input('CPD_year'),
            'year_completed' => $request->input('year_completed'),
            'last_updated' => now()
        ];


        // Update the report in the database
        DB::table('CPDReport')->where('cpd_id', $cpd_id)->update($data);

        // Redirect back to the page showing all CPD records with a success message
        return redirect()->route('yourRouteToAllCPDRecords')->with('success', 'CPD record updated successfully.');
    }
}
