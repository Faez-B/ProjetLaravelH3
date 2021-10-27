<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormationStoreRequest;
use App\Models\Type;
use App\Models\User;
use App\Models\Category;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::all();
        // $users = "User";
        return view("formations.index", compact([
            "formations",
            // "users"
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()){
            $categories =  Category::all();
            $types =  Type::all();
            return view("formations.add", compact([
                "categories",
                "types",
            ]));
        }

        return redirect()->route('index'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormationStoreRequest $request)
    {
        $params = $request->validated();
        $file = Storage::put('public', $params['image']);

        $params['image'] = substr($file, 7);

        // dd($params);

        $formation = Formation::create([
            'name' => $params['name'],
            'description' => $params['description'],
            'image' => $params['image'],
            'prix' => $params['prix'],
            'user' => Auth::user()->id,
        ]);

        if (!empty($params['checkboxCategories'])) {
            $formation->categories()->attach($params['checkboxCategories']);
        }

        if (!empty($params['checkboxTypes'])) {
            $formation->types()->attach($params['checkboxTypes']);
        }

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $formation = Formation::find($id);

        return view("formations.details", compact([
            "formation",
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formation  $formation
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
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check()){
            
        }

        return redirect()->route('index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $formation = Formation::find($id);

        // Si tu trouves l'image tu la supprime
        if (Storage::exists("public/$formation->picture")) {
            Storage::delete("public/$formation->picture");
        }

        $formation->delete();

        return redirect()->route('index'); 
    }
}
