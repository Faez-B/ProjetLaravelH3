<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChapterStoreRequest;
use App\Http\Requests\ChapterUpdateRequest;

class ChapterController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ChapterStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChapterStoreRequest $request, $formation_id)
    {
        $params = $request->validated();

        // dd($params);

        Chapter::create([
            'titre' => $params['new_chapitre_titre'],
            'content' => $params['new_chapitre_content'],
            'formation' => $formation_id,
        ]);

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ChapterUpdateRequest  $request
     * @param  \App\Models\Chapter  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChapterUpdateRequest $request, $id)
    {
        if (Auth::check()){
            $chapitre = Chapter::find($id);
            $params = $request->validated();
            
            // dd($params);

            $chapitre->update([
                "titre" => $params['chapitre-titre-update'],
                "content" => $params['chapitre-content-update'],
            ]);

            return redirect()->back();
        }

        return redirect()->route('index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapter  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $chapitre = Chapter::find($id);

        $chapitre->delete();

        return redirect()->back(); 
    }
}
