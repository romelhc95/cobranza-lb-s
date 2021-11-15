<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Document;
use App\Sector;
use App\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**return view('users.index', [
            'users' => User::with('sector')->latest()->get()
        ]); */

        $users = DB::select('SELECT a.id, CONCAT(a.document, " ", a.document_number) AS document_numberuser, concat(a.first_name," ",ifnull(a.second_name,"")," ",a.last_name," ",
        a.second_last_name) AS full_name, a.created_at, b.name AS sector FROM users a INNER JOIN sectors b ON a.sector_id=b.id AND a.is_admin=0');

        /**$users = User::latest()->paginate(10); */

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documents = Document::all();
        $sectors = Sector::all();
        return view('users.create', compact('documents', 'sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'document' => $request['document'],
            'document_number' => $request['document_number'],
            'first_name' => $request['first_name'],
            'second_name' => $request['second_name'],
            'last_name' => $request['last_name'],
            'second_last_name' => $request['second_last_name'],
            'phone' => $request['phone'],
            'password' => Hash::make($request['password']),
            'address' => $request['address'],
            'sector_id' => $request['sector'],
        ]);

        return redirect()->route('users.index')->with('success','Usuario Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        dd($user);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $documents = Document::all();
        $sectors = Sector::all();
        return view('users.edit', compact('user', 'documents', 'sectors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('users.index')->with('warning','Usuario Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('error', 'Usuario eliminado correctamente');
    }
}
