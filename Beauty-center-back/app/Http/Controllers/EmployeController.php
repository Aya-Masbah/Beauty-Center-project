<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employe::all();
        return response()->json([
            'status' => 'success',
            'employes' => $employes,
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
            'id_Compte' => 'required|exists:comptes,id',
            'nom' => 'required',
            'prenom' => 'required',
            'numero_telephone' => 'nullable',
            'email' => 'required|email|unique:employes',
            'competences' => 'nullable',
            'horaires_travail' => 'nullable',
        ]);

        $employe = Employe::create([
            'id_Compte' => $request->id_Compte,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'numero_telephone' => $request->numero_telephone,
            'email' => $request->email,
            'competences' => $request->competences,
            'horaires_travail' => $request->horaires_travail,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Employe created successfully',
            'employe' => $employe,
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
        $employe = Employe::find($id);

        if (!$employe) {
            return response()->json([
                'status' => 'error',
                'message' => 'Employe not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'employe' => $employe,
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
            'id_Compte' => 'required|exists:comptes,id',
            'nom' => 'required',
            'prenom' => 'required',
            'numero_telephone' => 'nullable',
            'email' => 'required|email|unique:employes,email,' . $id,
            'competences' => 'nullable',
            'horaires_travail' => 'nullable',
        ]);

        $employe = Employe::find($id);

        if (!$employe) {
            return response()->json([
                'status' => 'error',
                'message' => 'Employe not found',
            ], 404);
        }

        $employe->id_Compte = $request->id_Compte;
        $employe->nom = $request->nom;
        $employe->prenom = $request->prenom;
        $employe->numero_telephone = $request->numero_telephone;
        $employe->email = $request->email;
        $employe->competences = $request->competences;
        $employe->horaires_travail = $request->horaires_travail;
        $employe->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Employe updated successfully',
            'employe' => $employe,
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
        $employe = Employe::find($id);

        if (!$employe) {
            return response()->json([
                'status' => 'error',
                'message' => 'Employe not found',
            ], 404);
        }

        $employe->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Employe deleted successfully',
        ]);
    }
}
