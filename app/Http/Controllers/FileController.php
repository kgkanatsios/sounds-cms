<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use App\Exceptions\ApiErrorException;
use App\Http\Resources\FileCollection;
use App\Http\Resources\File as FileResource;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        return response(new FileCollection($files), 200)->header('Content-Type', 'application/json');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function store(File $file)
    {
        $data = request()->validate([
            'title' => '',
            'file' => 'required|mimes:mp3'
        ]);

        $data['file'] = $data['file']->store('files', 'public');

        $file->create($data);

        $files = File::all();
        return response(new FileCollection($files), 201)->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return response(new FileResource($file), 200)->header('Content-Type', 'application/json');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $data = request()->validate([
            'title' => '',
            'file' => 'required|mimes:mp3'
        ]);

        $file->fill($request->only([
            'title',
            'file'
        ]));

        $file->file = $data['file']->store('files', 'public');

        if ($file->isClean()) {
            throw new ApiErrorException('You need to specify a different value to update', 422);
        }
        $file->save();
        return response(new FileResource($file), 200)->header('Content-Type', 'application/json');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();
        return response(new FileResource($file), 200)->header('Content-Type', 'application/json');
    }
}
