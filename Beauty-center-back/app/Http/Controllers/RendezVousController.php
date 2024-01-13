<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use Illuminate\Http\Request;

class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rendezVous = RendezVous::all();
        return response()->json([
            'status' => 'success',
            'rendezVous' => $rendezVous,
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
            'id_Client' => 'required|exists:clients,id',
            'id_Employe' => 'required|exists:employes,id',
            'id_Service' => 'required|exists:services,id',
            'date_rendezvous' => 'required|date',
            'statut' => 'nullable',
        ]);

        $rendezVous = RendezVous::create([
            'id_Client' => $request->id_Client,
            'id_Employe' => $request->id_Employe,
            'id_Service' => $request->id_Service,
            'date_rendezvous' => $request->date_rendezvous,
            'statut' => $request->statut ?? 'en_attente',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'RendezVous created successfully',
            'rendezVous' => $rendezVous,
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
        $rendezVous = RendezVous::find($id);

        if (!$rendezVous) {
            return response()->json([
                'status' => 'error',
                'message' => 'RendezVous not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'rendezVous' => $rendezVous,
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
            'id_Client' => 'required|exists:clients,id',
            'id_Employe' => 'required|exists:employes,id',
            'id_Service' => 'required|exists:services,id',
            'date_rendezvous' => 'required|date',
            'statut' => 'nullable',
        ]);

        $rendezVous = RendezVous::find($id);

        if (!$rendezVous) {
            return response()->json([
                'status' => 'error',
                'message' => 'RendezVous not found',
            ], 404);
        }

        $rendezVous->id_Client = $request->id_Client;
        $rendezVous->id_Employe = $request->id_Employe;
        $rendezVous->id_Service = $request->id_Service;
        $rendezVous->date_rendezvous = $request->date_rendezvous;
        $rendezVous->statut = $request->statut ?? 'en_attente';
        $rendezVous->save();

        return response()->json([
            'status' => 'success',
            'message' => 'RendezVous updated successfully',
            'rendezVous' => $rendezVous,
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
        $rendezVous = RendezVous::find($id);

        if (!$rendezVous) {
            return response()->json([
                'status' => 'error',
                'message' => 'RendezVous not found',
            ], 404);
        }

        $rendezVous->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'RendezVous deleted successfully',
        ]);
    }
}
