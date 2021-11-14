<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ReponseMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserPictureUpdate;
use App\Http\Requests\UserUpdateRequest;

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
        if (Auth::check()){
            $user = User::find($id);

            return view("users.details", compact([
                "id",
                "user",
            ]));
        }

        return redirect()->route('index');
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
        // dd("test");
        $user = User::find($id);

        $params = $request->validated();
        
        // dd($params);
        
        // L'utilisateur n'est pas obligé de changer de mot de passe
        // On s'assure que son mot mot de passe ne soit pas une chaine vide
        if ($params['modifPassword'] != "") {   
            $user->update([
                "firstname" => $params['modifFirstName'],
                "lastname" => $params['modifLastName'],
                "email" => $params['modifEmail'],
                "password" => bcrypt($params['modifPassword']),
                // "image" => $params['user_image'],
            ]);
        }
        else{
            $user->update([
                "firstname" => $params['modifFirstName'],
                "lastname" => $params['modifLastName'],
                "email" => $params['modifEmail'],
            ]);
        }

        return redirect()->route('index');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserPictureUpdate  $request
     * @param  \App\Models\User  $user's id
     * @return \Illuminate\Http\Response
     */
    public function updatePictureUser(UserPictureUpdate $request, $id)
    {
        $user = User::find($id);
        $params = $request->validated();
        
        // $params['user_image'] = "";
        
        // dd($params);
        // dd($user->image);

        if ($user->image) {
            if (Storage::exists("public/$user->image")) {
                Storage::delete("public/$user->image");
            }
        }

        if ($params) {
            $file = Storage::put('public', $params['user_image']);
            // dd($file);
            // dd(substr($file, 7));
            $user->image = substr($file, 7);
            $user->save();
        }

        // $user->update([
        //     "image" => $params['user_image'],
        // ]);

        return redirect()->back();

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
