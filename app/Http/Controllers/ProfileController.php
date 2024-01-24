<?php

namespace App\Http\Controllers;

use App\Models\profile;
use App\Http\Requests\StoreprofileRequest;
use App\Http\Requests\UpdateprofileRequest;

class  ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = profile::query()->paginate(10);
        return response(view("profile.index", compact('profiles')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view("profile.create"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprofileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprofileRequest $request)
    {
        profile::create($request->validated());

        return redirect()->route('profiles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $profile = profile::where('status', $id)->first();
    return $profile;
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(profile $profile)
    {
        return response(view("profile.create", [
            'profile' => $profile
        ]));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprofileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprofileRequest $request, $id)
    {
        $profile = profile::find($id);
        $profile->name = $request->name;
        $profile->address = $request->address;
        $profile->gender = $request->gender;
        $profile->class = $request->class;
        $profile->age = $request->age;
        $profile->phone = $request->phone;
        $profile->email = $request->email;
        $profile->save();

        return redirect()->route('profiles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        profile::find($id)->delete();
        return redirect()->route('profiles');
    }
}
