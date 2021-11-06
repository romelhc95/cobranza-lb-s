<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SummaryController extends Controller
{
    public function index()
    {

        $summary = DB::select('SELECT concat(b.first_name," ",ifnull(b.second_name,"")," ",b.last_name," ",b.second_last_name) AS full_name, a.*
        FROM payments a, users b WHERE b.is_admin=0 and a.user_id=b.id and DATE_FORMAT(a.created_at, "%Y%m%d") = DATE_FORMAT(NOW(), "%Y%m%d")');

        $total = DB::select('SELECT SUM(a.PAYMENT) AS SUMA, NOW() AS FECHA FROM payments a, users b 
        WHERE DATE_FORMAT(a.CREATED_AT, "%Y%m%d") = DATE_FORMAT(NOW(), "%Y%m%d") AND a.USER_ID=b.ID AND b.IS_ADMIN=0');

        return view('summary.index', compact('summary','total'));

    }

   public function summaryloan(Request $request)
    {
        //dd(array($request->input('date')));

        $summary = DB::select('SELECT concat(b.first_name," ",ifnull(b.second_name,"")," ",b.last_name," ",b.second_last_name) AS full_name, 
        a.loan AS payment, DATE_FORMAT(a.created_at, "%Y%m%d") AS created_at
                FROM loans a, users b WHERE b.is_admin=0 and a.user_id=b.id 
                  and DATE_FORMAT(a.created_at, "%Y%m%d") = DATE_FORMAT(?, "%Y%m%d")', array($request->input('date')));

        $total = DB::select('SELECT SUM(a.loan) AS SUMA, NOW() AS FECHA FROM loans a, users b 
        WHERE DATE_FORMAT(a.CREATED_AT, "%Y%m%d") = DATE_FORMAT(?, "%Y%m%d") AND a.USER_ID=b.ID AND b.IS_ADMIN=0', array($request->input('date')));
        
        if ($summary == []){
            return redirect()->route('summary')->with('warning','La fecha ingresada no contiene registros');
        }else{
            return view('summary.loan.index', compact('summary','total')); 
        }
        
    }

    public function summarycollected(Request $request)
    {
        //dd(array($request->input('date')));

        $summary = DB::select('SELECT concat(b.first_name," ",ifnull(b.second_name,"")," ",b.last_name," ",b.second_last_name) AS full_name, a.*
        FROM payments a, users b WHERE b.is_admin=0 and a.user_id=b.id and DATE_FORMAT(a.created_at, "%Y%m%d") = DATE_FORMAT(?, "%Y%m%d")', array($request->input('date')));

        $total = DB::select('SELECT SUM(a.PAYMENT) AS SUMA, NOW() AS FECHA FROM payments a, users b 
        WHERE DATE_FORMAT(a.CREATED_AT, "%Y%m%d") = DATE_FORMAT(?, "%Y%m%d") AND a.USER_ID=b.ID AND b.IS_ADMIN=0', array($request->input('date')));

        if ($summary == []){
            return redirect()->route('summary')->with('warning','La fecha ingresada no contiene registros');
        }else{
            return view('summary.payment.index', compact('summary','total')); 
        }
        

    }

}
