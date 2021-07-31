<?php

namespace App\Http\Controllers;

use App\Http\Resources\RowResource;
use App\Models\Row;
use Illuminate\Http\Request;

class RowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // $rows = Row::all();
        // $rows=Row::with(['cards']);
        // $ressource= RowResource::collection($rows->paginate(10));
        $rows=Row::with(['cards'])->get();
        // $rows=Row::whereHas('cards', function ($params)
        // {
        //     $params->where();
        // })->get();
    // dd($rows);
        return view('rows.index',  ['rows'=>$rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rows.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        //
        $row =new Row(["title"=>$request->input('title')]);
        // flash('Successfully created new row.');
        $row->save();
        return redirect()->route('rows.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Row  $row
     * @return \Illuminate\Http\Response
     */
    public function show(Row $row)
    {
        //
        return view('rows.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Row  $row
     * @return \Illuminate\Http\Response
     */
    public function edit(Row $row)
    {
        //
        return view('rows.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Row  $row
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Row $row)
    {
        //
        $this->validate($request, [
            'title' => 'required'
        ]);
        //
        $row->title=$request->input('title');
        // flash('Successfully created new row.');
        $row->save();
        return redirect()->route('rows.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Row  $row
     * @return \Illuminate\Http\Response
     */
    public function destroy(Row $row)
    {
        $row->delete();
        return back();
    }
}
