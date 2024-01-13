<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comptes = Compte::all();
        return response()->json([
            'status' => 'success',
            'comptes' => $comptes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:comptes',
            'password' => 'required',
            'role' => 'required',
        ]);

        $compte = Compte::create([
            'username' => $request->username,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Compte created successfully',
            'compte' => $compte,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compte = Compte::find($id);

        if (!$compte) {
            return response()->json([
                'status' => 'error',
                'message' => 'Compte not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'compte' => $compte,
        ]);
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
        $request->validate([
            'username' => 'required|unique:comptes,username,' . $id,
            'password' => 'required',
            'role' => 'required',
        ]);

        $compte = Compte::find($id);

        if (!$compte) {
            return response()->json([
                'status' => 'error',
                'message' => 'Compte not found',
            ], 404);
        }

        $compte->username = $request->username;
        $compte->password = $request->password;
        $compte->role = $request->role;
        $compte->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Compte updated successfully',
            'compte' => $compte,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compte = Compte::find($id);

        if (!$compte) {
            return response()->json([
                'status' => 'error',
                'message' => 'Compte not found',
            ], 404);
        }

        $compte->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Compte deleted successfully',
        ]);
    }
}
