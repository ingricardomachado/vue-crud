<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name')->get();

        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            
            $category = Category::create($request->all());
            
            return response()->json([
                    'message' => 'Categoría registrada exitosamente',
                    'data' => $category
                ], 200);
            
        } catch (Exception $e) {
            return response()->json([
                    'message' => $e->getMessage()
                ], 500);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return $category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update($request->all());

            return response()->json([
                    'message' => 'Categoría actualizada exitosamente',
                    'data' => $category
                ], 200);
            
        } catch (Exception $e) {
            
            return response()->json([
                    'message' => $e->getMessage()
                ], 500);
        }


        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            
            return response()->json([
                'message' => 'Categoría eliminada exitosamente'
            ], 200);

        } catch (Exception $e) {
            
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

    }
}
