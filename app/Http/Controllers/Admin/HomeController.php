<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd(auth()->check() && auth()->user()->is_admin);
        //if (auth()->check() && auth()->user()->is_admin){
            $index = DB::select('SELECT SUM(a.PAYMENT) AS SUMA, NOW() AS FECHA FROM payments a, users b 
            WHERE DATE_FORMAT(a.CREATED_AT, "%Y%m%d") = DATE_FORMAT(NOW(), "%Y%m%d") AND a.USER_ID=b.ID AND b.IS_ADMIN=0');


            return view('home', compact('index'));
        //}else {
        //    return redirect()->route('client.index');
        //}


    }
}
