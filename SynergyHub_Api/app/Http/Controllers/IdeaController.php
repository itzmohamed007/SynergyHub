<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Idea::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'files' => 'required',
            // 'files.*' => 'required|file|mimes:jpeg,png|max:2048',
            'categorie' => 'required',
        ]);

        Idea::create($request->all());

        return [
            'status' => 200,
            'message' => 'Idea Created Successfully'
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Idea::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($idea = Idea::find($id)) {
            $idea->update($request->all());
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

    public function search(string $categorie)
    {
        return Idea::where('categorie', 'like', '%' . $categorie . '%')->get();
    }
}
