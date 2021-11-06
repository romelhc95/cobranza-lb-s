<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Document;
use App\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = DB::select('SELECT a.id, CONCAT(a.document, " ", a.document_number) AS document_numberuser, concat(a.first_name," ",ifnull(a.second_name,"")," ",a.last_name," ",
        a.second_last_name) AS full_name, a.created_at, a.is_admin, b.name AS sector FROM users a INNER JOIN sectors b ON a.sector_id=b.id AND a.is_admin<>0');

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documents = Document::all();
        return view('roles.create', compact('documents'));
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
            'sector_id' => 1,
            'is_admin' => $request['role'],
        ]);

        return redirect()->route('roles.index')->with('success','Rol Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $user = User::find($user);
        //dd($user);
        return view('roles.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = User::find($id);
        //dd($user);
        $documents = Document::all();
        return view('roles.edit', compact('user', 'documents'));
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
        //dd($request->all());
        //$user->update($request->all());
        $user->update([
            'document' => $request['document'],
            'document_number' => $request['document_number'],
            'first_name' => $request['first_name'],
            'second_name' => $request['second_name'],
            'second_last_name' => $request['second_last_name'],
            'phone' => $request['phone'],
            'password' => bcrypt($request['password']),
            'sector' => 1,
            'role' => $request['role'],
        ]);
        //dd($user);

        return redirect()->route('roles.index')->with('warning','Rol Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $user = User::find($user);
        $user->delete();

        return redirect()->route('roles.index')->with('error', 'Rol eliminado correctamente');
    }
}
