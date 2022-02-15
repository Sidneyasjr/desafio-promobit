<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Tag::paginate(10);

        return view('tags.index')->with('tags', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $data = $request->except('_token');
        Tag::create($data);
        return redirect()->route('tags.index')->with('message', 'Tag criada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $data = $request->except(['_token', '_method']);
        $tag->update($data);
        return redirect()->route('tags.index')->with('message', 'Tag editada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('message', 'Tag excluida com sucesso');
    }

    public function productsRelevance()
    {
        $productsRelevance = Tag::join('product_tag', 'tags.id', '=', 'product_tag.tag_id')
            ->select('tags.id', 'tags.name', DB::raw('COUNT(product_tag.product_id) as qtde_products'))
            ->groupBy('tags.name')
            ->orderBy('tags.id')
            ->get();
        return view('reports.relevance')->with('productsRelevance', $productsRelevance);
    }
}
