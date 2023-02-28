<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Idea::with('categories')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'image' => 'required',
            'categories' => 'required|array',
            'categories.*' => 'required|string|max:50'
        ]); 

        $idea = Idea::create([
            'user_id' => Auth::id(),
            'title' => $valid['title'],
            'description' => $valid['description'],
            'image' => $valid['image']
        ]);

        // $idea->categories()->attach($valid['categories']);
        // $idea->categories()->sync($valid['categories']);

        $categoriesIds = [];

        foreach($valid['categories'] as $categorie) {
            $categorieObj = Categorie::firstOrCreate(['name' => $categorie]);
            $categoriesIds[] = $categorieObj->id;
        }

        $idea->categories()->syncWithoutDetaching($categoriesIds);

        return response([
            'status' => 201,
            'message' => 'Idea Created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return $idea->load('categories');
    }

    /**
     * Display all resources.
     */
    public function showAll()
    {
        $ideas = Idea::with('categories')->get();
        return response()->json($ideas, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($idea = Idea::find($id)) {
            $idea->update($request->only(['title', 'description', 'image']));

            if($request->has('categories')) {
                $categoriesIds = [];

                foreach($request->categories as $categorie) {
                    $categorieObj = Categorie::firstOrCreate(['name' => $categorie]);
                    $categoriesIds[] = $categorieObj->id;
                }

                $idea->categories()->sync($categoriesIds);
            }
            
            return [
                'status' => 200,
                'message' => 'Idea Updated Successfully'
            ];
        } else {
            return [
                'status' => 404,
                'message' => 'Idea Not Found'
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Idea::destroy($id)) {
            return [
                'status' => 200,
                'message' => 'Idea Deleted Successfully'
            ];
        } else {
            return [
                'status' => 404,
                'message' => 'Idea Not Found'
            ];
        }
    }

    public function search(string $titel)
    {
        return Idea::where('title', 'like', '%' . $titel . '%')->with('categories')->get();
    }
}
