<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return response()->json([
            'status' => 'success',
            'services' => $services,
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
            'id_TypeService' => 'required|exists:type_services,id',
            'nom_service' => 'required',
            'description' => 'nullable',
            'tarif' => 'required|numeric',
        ]);

        $service = Service::create([
            'id_TypeService' => $request->id_TypeService,
            'nom_service' => $request->nom_service,
            'description' => $request->description,
            'tarif' => $request->tarif,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Service created successfully',
            'service' => $service,
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
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'status' => 'error',
                'message' => 'Service not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'service' => $service,
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
            'id_TypeService' => 'required|exists:type_services,id',
            'nom_service' => 'required',
            'description' => 'nullable',
            'tarif' => 'required|numeric',
        ]);

        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'status' => 'error',
                'message' => 'Service not found',
            ], 404);
        }

        $service->id_TypeService = $request->id_TypeService;
        $service->nom_service = $request->nom_service;
        $service->description = $request->description;
        $service->tarif = $request->tarif;
        $service->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Service updated successfully',
            'service' => $service,
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
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'status' => 'error',
                'message' => 'Service not found',
            ], 404);
        }

        $service->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Service deleted successfully',
        ]);
    }
}
