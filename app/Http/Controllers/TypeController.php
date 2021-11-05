<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TypeStoreRequest;

class TypeController extends Controller
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
        if (Auth::check() && Auth::user()->role == "admin"){
            $types = Type::all();
            return view("type.add", compact([
                "types"
            ]));
        }
        return redirect()->route('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TypeStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeStoreRequest $request)
    {
        $params = $request->validated();
        Type::create($params);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type's id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $type = Type::find($id);

        $type->delete();

        return back();
    }
}
