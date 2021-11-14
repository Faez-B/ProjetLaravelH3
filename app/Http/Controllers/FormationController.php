<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormationStoreRequest;
use App\Models\Type;
use App\Models\User;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Formation;
use App\Models\Formation_Category;
use App\Models\Formation_Type;
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
        // ?page=2
        // 10 formations maximum par page
        $formations = Formation::all();

        $nb_formations = count($formations);

        $reste = $nb_formations % 10;
        // $nb_formations = 20;
        
        // dd($nb_formations % 10);

        // if ($nb_formations % 10 == 0) {
            
        // }
        

        
        // $formations = Formation::paginate(10);
        // dd($nb_formations);
        $categories = Category::all();
        $types = Type::all();
        $users = User::all();
        return view("formations.index", compact([
            "formations",
            "categories",
            "types",
            "users"
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
     * @param  App\Http\Requests\FormationStoreRequest  $request
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
     * @param  \App\Models\Formation  $formation's id
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $users = User::all();
        $formation = Formation::find($id);

        $chapitres = Chapter::where('formation', $id)->get();

        // dd($chapitres);

        return view("formations.details", compact([
            "formation",
            "chapitres",
            "users",
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formation  $formation's id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\FormationStoreRequest  $request
     * @param  \App\Models\Formation  $formation's id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check()){
            $formation = Formation::find($id);
            $params = $request->validated();

            // dd($params);
            $formation->update([
                "name" => $params['name'],
                "description" => $params['description'],
                "image" => $params['image'],
            ]);

            // dd($post);

            $formation->categories()->detach();
            if (!empty($params['checkboxCategories'])) {
                $formation->categories()->attach($params['checkboxCategories']);
            }

            return redirect()->route("index");
        }

        return redirect()->route('index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formation  $formation's id
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

    public function searchCat($category)
    {
        $cat = Category::where('name', $category);
        $cat_id = $cat->first()->id;
        // dd($cat_id);
        // Les formations avec la catégorie
        $formations = [];

        $formations_category = Formation_Category::select("formation")->where("category", $cat_id)->get();
        $formations_all = Formation::all();

        // dd(count($formations_category));

        // dd($cat_id, $formations_category[0] , $formations_category[0]->formation);
        for ($i=0; $i < count($formations_category); $i++) { 
            array_push($formations, Formation::find($formations_category[$i]->formation));
        }

        // dd($formations_category);

        $categories = Category::all();
        $types = Type::all();
        $users = User::all();

        return view('formations.category', compact([
            "formations",
            "categories",
            "types",
            "users",
        ]));
    }

    public function searchType($type)
    {
        $type_obj = Type::where('name', $type);
        $type_id = $type_obj->first()->id;
        $formations = [];

        $formations_type = Formation_Type::select("formation")->where("type", $type_id)->get();
        $formations_all = Formation::all();

        for ($i=0; $i < count($formations_type); $i++) { 
            array_push($formations, Formation::find($formations_type[$i]->formation));
        }

        $categories = Category::all();
        $types = Type::all();
        $users = User::all();

        return view('formations.category', compact([
            "formations",
            "categories",
            "types",
            "users",
        ]));
    }

    public function searchFormateur($id)
    {
        $user = User::find($id);
        $formations = Formation::where('user', $user->id)->get();
        $categories = Category::all();
        $types = Type::all();

        return view('formations.users', compact([
            "formations",
            "categories",
            "types",
            "user"
        ]));
    }

    public function searchName(Request $request)
    {
        $name = $request->nom_formation;

        // Le regex ici permet de récupérer une formation même si on ne tape qu'un mot de la formation
        // Example : Node JS avec node
        $formations = Formation::where('name', 'LIKE', '%' . $name . '%')->get();
        $categories = Category::all();
        $types = Type::all();
        $users = User::all();

        return view('formations.search', compact([
            "formations",
            "categories",
            "types",
            "users"
        ]));
    }
}
