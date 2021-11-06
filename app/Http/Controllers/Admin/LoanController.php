<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Loan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $loans = DB::select('SELECT CONCAT(a.document, " ", a.document_number) AS document_numberuser, a.first_name, a.second_name, a.last_name, 
        a.second_last_name, b.id, b.loan, b.monetary_interest, b.amount, b.created_at FROM users a INNER JOIN loans b 
        ON a.id=b.user_id AND a.is_admin=0');

        //return view('loans.index', [
        //    'loans' => Loan::with('user')->latest()->get()
        //]);

        return view('loans.index', compact('loans'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request->input('id_loan'));
        $users = DB::select('select id, concat(first_name," ",ifnull(second_name,"")," ",last_name," ",
        second_last_name) as full_name from users where is_admin=0 and id = ?', array($request->input('id_loan')));

        return view('loans.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $amount = $request['loan'] + ($request['loan'] * ($request['monetary_interest']/100));
        Loan::create([
            'user_id' => $request['user_id'],
            //'loan_number' => $request['loan_number'],
            'loan' => $request['loan'],
            'monetary_interest' => $request['monetary_interest'],
            'amount' => $amount,
        ]);

        return redirect()->route('loans.index')->with('success','Préstamo Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $loan)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        $user = User::all();
        return view('loans.edit', compact('loan', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        $amount = $request['loan'] + ($request['loan'] * ($request['monetary_interest']/100));
        $loan->update([
            'loan' => $request['loan'],
            'monetary_interest' => $request['monetary_interest'],
            'amount' => $amount,
        ]);

        return redirect()->route('loans.index')->with('warning','Préstamo Actualizado Correctamente');

    }

    /**
     * Remove the spec  ified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();
        return redirect()->route('loans.index')->with('error', 'Préstamo eliminado correctamente');

    }
}
