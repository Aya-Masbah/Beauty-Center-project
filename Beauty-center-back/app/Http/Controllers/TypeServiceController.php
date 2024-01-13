<?php

namespace App\Http\Controllers;

use App\Models\TypeService;
use Illuminate\Http\Request;

class TypeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeServices = TypeService::all();
        return response()->json([
            'status' => 'success',
            'typeServices' => $typeServices,
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
            'nomTypeService' => 'required',
            'description' => 'nullable',
        ]);

        $typeService = TypeService::create([
            'nomTypeService' => $request->nomTypeService,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'TypeService created successfully',
            'typeService' => $typeService,
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
        $typeService = TypeService::find($id);

        if (!$typeService) {
            return response()->json([
                'status' => 'error',
                'message' => 'TypeService not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'typeService' => $typeService,
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
            'nomTypeService' => 'required',
            'description' => 'nullable',
        ]);

        $typeService = TypeService::find($id);

        if (!$typeService) {
            return response()->json([
                'status' => 'error',
                'message' => 'TypeService not found',
            ], 404);
        }

        $typeService->nomTypeService = $request->nomTypeService;
        $typeService->description = $request->description;
        $typeService->save();

        return response()->json([
            'status' => 'success',
            'message' => 'TypeService updated successfully',
            'typeService' => $typeService,
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
        $typeService = TypeService::find($id);

        if (!$typeService) {
            return response()->json([
                'status' => 'error',
                'message' => 'TypeService not found',
            ], 404);
        }

        $typeService->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'TypeService deleted successfully',
        ]);
    }
}
