<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AutocompleteController extends Controller
{
 
    //for create controller - php artisan make:controller AutocompleteController  
    function fetch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('tb_cmn_benificiary_master')
                // ->where('Benificiary_Name', 'LIKE', "$query%")
                ->where('Benificiary_Name', 'LIKE', "$query%")
                ->whereIn('Status_Id',[5])
                ->skip(0)
                ->take(50)
                ->orderBy('Benificiary_Name','ASC')
                ->groupBy(DB::raw("Benificiary_Name"))
                ->get('Benificiary_Name');
            $output = '<div class="col-sm-10" aria-colspan="5"> <ul class="dropdown-menu" style="font-size:small; padding:5px; display:block; position:absolute">';
            foreach ($data as $row) {
                $output .= '<li style="padding:2px;"><a href="#">' . $row->Benificiary_Name . '</a></li>';
            }
            $output .= '</ul> </div>';
            echo $output;
        }
    }
}