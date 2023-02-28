<?php

namespace App\Http\Controllers;

use App\Models\JsonObject;
use App\Http\Requests\StoreJsonObjectRequest;
use App\Http\Requests\UpdateJsonObjectRequest;
use Laravel\Sanctum\PersonalAccessToken;

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
        $memory = memory_get_usage();
        $usage_start = microtime(true);

        $validated = $request->validated();
        $userToken = PersonalAccessToken::findToken($request->header('X-Header-Token'));

        $user = $userToken->tokenable;

        $object = new JsonObject([
            'data' => $validated['data'],
            'user_id' => $user->id,
        ]);

        $object->save();

        $memory_used = (memory_get_usage() - $memory) / 1024;
        $time_used = (microtime(true) - $usage_start);

        return response()->json([
            'object_id' => $object->id,
            'memory_used' => floor($memory_used / 1024),
            'time_used' => $time_used,
        ]);



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
