<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller {
    public function search(Request $request) {

        $userName = $request->search; // Record being searched
        $userdetails = DB::table("users")->where("name",$userName)->first();
        echo "<br/>";
        if ($userdetails) {
            echo "The name exists in the table";
        } else {
            echo "No data found";
        }
    }
}
