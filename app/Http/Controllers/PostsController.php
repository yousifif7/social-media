<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $this->validate($request,[
            'caption' => 'required',
            'file' => 'mimes:png,jpg,jpeg,|max:10000',
        ]);
        
        if($request->hasFile('userfile')){
            $path= $request->file('userfile')->store('userFiles','files');

            Posts::create([
                'user_id' => $request->user_id,
                'caption' => $request->caption,
                'image' => $path,
            ]);
        }   
        else{
            Posts::create([
                'user_id' => $request->user_id,
                'caption' => $request->caption,
                'image' => '',
            ]);
        } 
        return back()->with('success','Posted successfully');    
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
        $post= Posts::findorFail($id);
        $image_path = public_path('userFiles/'.$post->image);
        if ($post::exists(public_path($image_path))) {
            File::delete($image_path);        
        }
        $post->delete();
        return back()->with('deleted','');
    }
}
