<?php

namespace App\Http\Controllers\Client;

//use App\Http\Controllers\Controller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $queries = DB::select('SELECT a.id as user_id, b.id as loan_id, concat(a.first_name," ",ifnull(a.second_name,"")," ",a.last_name," ",
        a.second_last_name) AS full_name, d.name AS sector, b.loan, b.monetary_interest, b.amount, c.payment, c.new_payment, c.loan_status, c.payment_status, c.updated_at,
      CASE
      	WHEN c.loan_status IS NULL THEN "Pendiente"
      	WHEN c.loan_status IS NOT NULL AND DATE_FORMAT(c.updated_at, "%Y%m%d") < DATE_FORMAT(NOW(), "%Y%m%d") THEN "Pendiente"
      	WHEN c.new_payment = 0 THEN "Completo"
      	ELSE "Pagado"
      END AS "status"
        FROM users a INNER JOIN sectors d ON a.sector_id=d.id INNER JOIN loans b ON a.id=b.user_id AND a.id=? LEFT OUTER JOIN
            (SELECT a.* FROM payments a, (SELECT a.loan_id, a.created_at FROM payments a INNER JOIN(
                SELECT loan_id, MAX(created_at) fecha_max FROM payments GROUP BY loan_id) b ON a.loan_id = b.loan_id
                AND a.created_at = b.fecha_max ORDER BY a.created_at DESC) b WHERE a.created_at=b.created_at
                AND a.loan_id=b.loan_id) c ON a.id=c.user_id AND b.id=c.loan_id ORDER BY updated_at desc', array(Auth::user()->id));

        $queries2 = DB::select('SELECT a.id as user_id, concat(a.first_name," ",ifnull(a.second_name,"")," ",a.last_name," ",
        a.second_last_name) AS full_name
        FROM users a WHERE a.id=?', array(Auth::user()->id));
        
        //dd($queries);

        if ( $queries == [] ) {
          return view('clients.index2', compact('queries2'));
        } else {
          return view('clients.index', compact('queries'));
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //dd($request->all());
        $query = DB::select('SELECT a.id as user_id, b.id as loan_id, c.id as payment_id, /**a.first_name, a.second_name ,a.last_name,a.second_last_name,*/
        concat(a.first_name," ",ifnull(a.second_name,"")," ",a.last_name," ",a.second_last_name) AS full_name,
        b.loan, b.monetary_interest, b.amount, b.created_at AS loan_created_at, c.payment, c.new_payment,
        c.created_at AS payment_created_at, CASE
      	WHEN c.loan_status IS NULL THEN "Pendiente"
      	WHEN c.loan_status IS NOT NULL AND DATE_FORMAT(c.created_at, "%Y%m%d") < DATE_FORMAT(NOW(), "%Y%m%d") THEN "Pendiente"
      	WHEN c.new_payment = 0 THEN "Completo"
      	ELSE "Pagado"
      END AS status
        FROM users a INNER JOIN loans b ON a.id=b.user_id AND b.id=?
        LEFT JOIN payments c ON a.id=c.user_id AND b.id=c.loan_id ORDER BY c.updated_at DESC', array($request->input('id_payment')));

        //dd($query);
        return view('clients.show', compact('query'));
    }
}
