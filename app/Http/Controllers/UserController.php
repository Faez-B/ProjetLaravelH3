<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UserUpdateRequest;
use App\Mail\ReponseMail;

class UserController extends Controller
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
    public function create($email, $firstname, $lastname)
    {
        // $params = $request->all();
        // $params = $data;
        // dd($params);
        // dd($email, $firstname, $lastname);
        // var_dump($email);
        // var_dump($firstname);
        // var_dump($lastname);
        // exit;
        Mail::to($email)
            ->send(new ReponseMail($email, $firstname, $lastname));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user's id
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $user = User::find($id);

        return view("users.details", compact([
            "id",
            "user",
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserUpdateRequest  $request
     * @param  \App\Models\User  $user's id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $params = $request->validated();
        $user = User::find($id);

        $user->update([
            "firstname" => $params['modifFirstName'],
            "lastname" => $params['modifLastName'],
            "email" => $params['modifEmail'],
            "password" => bcrypt($params['modifPassword']),
        ]);

        return redirect()->route('index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user's id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }
}
