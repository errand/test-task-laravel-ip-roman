<?php

namespace App\Http\Controllers;

use App\Models\JsonObject;
use App\Http\Requests\StoreJsonObjectRequest;
use App\Http\Requests\UpdateJsonObjectRequest;
use App\Http\Requests\DestroyJsonObjectRequest;
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
            'code' => 200,
            'message' => 'Success',
            'object_id' => $object->id,
            'memory_used' => floor($memory_used / 1024),
            'time_used' => $time_used,
        ]);
    }

    /**
     * Display the specified resource in Json format.
     */
    public function json(int $id)
    {
        $object = JsonObject::find($id);

        return response()->json([
            'object' => $object->data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $object = JsonObject::find($id);

        return view('objects.show', ['object_id' => json_encode($object->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('objects.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJsonObjectRequest $request)
    {
        $validated = $request->validated();
        $userToken = PersonalAccessToken::findToken($request->header('X-Header-Token'));

        $user = $userToken->tokenable;
        $object = JsonObject::find($validated['id']);

        if ($user->id !== $object->user_id) {
            return response()->json([
                'code' => 401,
                'message' => 'You are not authorize to edit this Object',
            ]);
        }

        $json = $object->data;

        $parsed_data = json_decode($json);

        $paths = str_replace("\n", "", $validated['data']);

        $exploded_path = explode(';', $paths);

        foreach (array_filter($exploded_path) as $path) {
            $parts = explode(' = ', $path);
            $this->set( $parts[0], $parsed_data->data[0], $parts[1] );
        }

        $object->data = json_encode($parsed_data);
        $object->save();

        return response()->json([
            'code' => 200,
            'action' => 'update',
            'message' => 'Object updated successfully',
        ]);
    }

    public function delete()
    {
        return view('objects.delete');
    }

    /**
     * @param DestroyJsonObjectRequest $request
     * @return mixed
     */

    public function destroy(DestroyJsonObjectRequest $request)
    {
        $memory = memory_get_usage();
        $usage_start = microtime(true);

        $validated = $request->validated();
        $userToken = PersonalAccessToken::findToken($request->header('X-Header-Token'));

        $user = $userToken->tokenable;
        $object = JsonObject::find($validated['id']);

        if ($user->id !== $object->user_id) {
            return response()->json([
                'code' => 401,
                'message' => 'You are not authorize to delete this Object',
            ]);
        }

        $object->delete();

        $memory_used = (memory_get_usage() - $memory) / 1024;
        $time_used = (microtime(true) - $usage_start);

        return response()->json([
            'code' => 200,
            'message' => 'Objects destroyed',
            'object_id' => $validated['id'],
            'memory_used' => floor($memory_used / 1024),
            'time_used' => $time_used,
        ]);
    }

    /**
     * Helper function for setting the params value in Json object
     * @param $path
     * @param $data
     * @param null $value
     */
    public function set( $path, &$data, $value=null ) {
        $path = explode( '->', $path );
        $result =& $data;

        foreach( $path as $key ) {
            $result =& $result->{$key};
        }

        $result = $value;
    }
}
