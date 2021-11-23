<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = DB::select('SELECT * FROM(
            SELECT a.id as user_id, b.id as loan_id, concat(a.document," ",a.document_number) as document, concat(a.first_name," ",ifnull(a.second_name,"")," ",a.last_name," ",
                    a.second_last_name) AS full_name, d.name AS sector, b.loan, b.monetary_interest, b.amount, c.payment, c.new_payment, c.loan_status, c.payment_status, c.updated_at,
                  CASE
                      WHEN c.loan_status IS NULL THEN "Pendiente"
                      WHEN c.loan_status IS NOT NULL AND DATE_FORMAT(c.updated_at, "%Y%m%d") < DATE_FORMAT(NOW(), "%Y%m%d") THEN "Pendiente"
                      ELSE "Pagado"
                  END AS "status"
                    FROM users a INNER JOIN sectors d ON a.sector_id=d.id INNER JOIN loans b ON a.is_admin=0 AND a.id=b.user_id LEFT OUTER JOIN
                        (SELECT a.* FROM payments a, (SELECT a.loan_id, a.created_at FROM payments a INNER JOIN(
                            SELECT loan_id, MAX(created_at) fecha_max FROM payments GROUP BY loan_id) b ON a.loan_id = b.loan_id
                            AND a.created_at = b.fecha_max ORDER BY a.created_at DESC) b WHERE a.created_at=b.created_at
                            AND a.loan_id=b.loan_id) c ON a.id=c.user_id AND b.id=c.loan_id ORDER BY updated_at desc
            ) a WHERE STATUS = "Pendiente"');

        return view('payments.index', compact('payments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $payments = DB::select('SELECT a.id as user_id, b.id as loan_id, concat(a.first_name," ",ifnull(a.second_name,"")," ",a.last_name," ",
        a.second_last_name) AS full_name, d.name AS sector, b.loan, b.monetary_interest, b.amount, c.payment, c.new_payment, c.loan_status, c.payment_status, c.updated_at,
      CASE
      	WHEN c.loan_status IS NULL THEN "Pendiente"
      	WHEN c.loan_status IS NOT NULL AND DATE_FORMAT(c.updated_at, "%Y%m%d") < DATE_FORMAT(NOW(), "%Y%m%d") THEN "Pendiente"
      	WHEN c.new_payment = 0 THEN "Completo"
      	ELSE "Pagado"
      END AS "status"
        FROM users a INNER JOIN sectors d ON a.sector_id=d.id INNER JOIN loans b ON a.is_admin=0 and a.id=b.user_id AND a.id=? LEFT OUTER JOIN
            (SELECT a.* FROM payments a, (SELECT a.loan_id, a.created_at FROM payments a INNER JOIN(
                SELECT loan_id, MAX(created_at) fecha_max FROM payments GROUP BY loan_id) b ON a.loan_id = b.loan_id
                AND a.created_at = b.fecha_max ORDER BY a.created_at DESC) b WHERE a.created_at=b.created_at
                AND a.loan_id=b.loan_id) c ON a.id=c.user_id AND b.id=c.loan_id ORDER BY updated_at desc'
                ,array($request->input('id_payment')));

        //dd($payments);
        if ($payments == []){
            return redirect()->route('users.index')->with('warning','El cliente no cuenta con prestamos ir a "Detalle/Nuevo Prestamo"');
        }else{
            return view('payments.create', compact('payments'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $query = DB::table('loans')
            ->leftJoin('payments','loans.id','=','payments.loan_id')
            ->where('loans.id','=',$request->input('loan_id'))->get();
        $queries = $query->toArray();
        foreach ($queries as $q){
            if (is_null($q->new_payment)){
                $new_payment = $q->amount - $request['payment'];
            }else{
                $new_payment = $q->new_payment - $request['payment'];
            }
        };
        //dd($request['user_id']);
        Payment::create([
            'payment' => $request['payment'],
            'new_payment' => $new_payment,
            'loan_id' => $request['loan_id'],
            'user_id' => $request['user_id'],

        ]);


        //return redirect()->route('loans.index')->with('success','Pago efectuado correctamente');
        //return redirect('/payments/create?id_payment=',$request['user_id'])->with('success','Pago efectuado correctamente');
        return redirect()->back()->with('success','Pago efectuado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //dd($request->input('id_payment'));

        $query = DB::select('SELECT a.id as user_id, b.id as loan_id, c.id as payment_id, /**a.first_name, a.second_name ,a.last_name,a.second_last_name,*/
        concat(a.first_name," ",ifnull(a.second_name,"")," ",a.last_name," ",a.second_last_name) AS full_name,
        b.loan, b.monetary_interest, b.amount, b.created_at AS loan_created_at, c.payment, c.new_payment,
        c.created_at AS payment_created_at, CASE
      	WHEN c.loan_status IS NULL THEN "Pendiente"
      	WHEN c.loan_status IS NOT NULL AND DATE_FORMAT(c.created_at, "%Y%m%d") < DATE_FORMAT(NOW(), "%Y%m%d") THEN "Pendiente"
      	WHEN c.new_payment = 0 THEN "Completo"
      	ELSE "Pagado"
      END AS status
        FROM users a INNER JOIN loans b ON a.is_admin=0 and a.id=b.user_id AND b.id=?
        LEFT JOIN payments c ON a.id=c.user_id AND b.id=c.loan_id ORDER BY c.updated_at DESC', array($request->input('id_payment')));

        //dd($query);
        return view('payments.show', compact('query'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //dd($payment);
        $payment->delete();

        return redirect()->back()->with('error', 'Usuario eliminado correctamente');
    }
}
