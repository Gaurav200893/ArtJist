<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;

use Illuminate\Http\Request;
use App\Profile;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        $profile = Profile:: where("user_id", $request->session()->get('user_id'))->first();
        if($profile){
            $profile = $profile->attributesToArray();
        }else{
            $profile = Profile:: firstOrNew(["user_id" => $request->session()->get('user_id')]);

            $columns = Schema::getColumnListing($profile->getTable());
            $columns = array_fill_keys($columns, null);
            $profile = array_merge($columns, $profile->attributesToArray());
        }


        $key_elements = array(
            'user_id' => '<input class="user_id" />',
            'type'  => '<input class="type" />',
            'gender'  => '<input class="gender" />',
            'country'  => '<input class="country" />',
            'city'  => '<input class="city" />',
            'zipcode'  => '<input class="zipcode" />',
            'medium'  => '<input class="medium" />'
        );
        
        
        return view('users.index')->with(['profile' => $profile]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile:: where("user_id", $id)->first();
        if($profile){
            $profile = $profile->attributesToArray();
        }else{
            $profile = Profile:: firstOrNew(["user_id" => $id]);

            $columns = Schema::getColumnListing($profile->getTable());
            $columns = array_fill_keys($columns, null);
            $profile = array_merge($columns, $profile->attributesToArray());
        }


        $key_elements = array(
            'user_id' => '<input class="user_id" />',
            'type'  => '<input class="type" />',
            'gender'  => '<input class="gender" />',
            'country'  => '<input class="country" />',
            'city'  => '<input class="city" />',
            'zipcode'  => '<input class="zipcode" />',
            'medium'  => '<input class="medium" />'
        );
        
        
        return view('users.index')->with(['profile' => $profile]);
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
