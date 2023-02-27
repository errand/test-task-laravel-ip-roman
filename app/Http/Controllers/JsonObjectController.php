<?php

namespace App\Http\Controllers;

use App\Models\JsonObject;
use App\Http\Requests\StoreJsonObjectRequest;
use App\Http\Requests\UpdateJsonObjectRequest;

class JsonObjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objects = JsonObject::all();
        return view('objects/index', [
            'objects' => $objects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('objects/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJsonObjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JsonObject $jsonObject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JsonObject $jsonObject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJsonObjectRequest $request, JsonObject $jsonObject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JsonObject $jsonObject)
    {
        //
    }
}
