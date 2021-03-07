<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Image;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::all();
        return response()->json($announcements, 200,);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // $rules = array(
        //     'file' => 'required|image',
        //     'imageable_id' => 'required',
        //     'imageable_type' => 'required'
        // );

        // $validator = Validator::make($req->all(), $rules);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'error' => true,
        //         'response' => $validator->errors()
        //     ], 401);
        // }

        $announcement = new Announcement($req->all());

        if ($req->file('file') == null) {
            $req->file = "";
        } else {
            $image_file = $req->file('file')->store('public/images');
            $url = Storage::url($image_file);
            $announcement->image()->create([
                'file' => $url,
                'imageable_id' => $announcement->id
            ]);
        }
        $announcement->save();
        return response()->json($announcement, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
