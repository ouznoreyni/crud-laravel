<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Row;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all();
    
        //
        return view('cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cards.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Row $row)
    {
        //
        $this->validate($request, [
            'content' => 'required'
        ]);
        //
        // $row =new Row(["title"=>$request->input('title')]);
        // flash('Successfully created new row.');
        // $row->save();
        // return redirect()->route('rows.index');

        // dd($row);
        $card = new Card();
        $card->content = $request->input('content');
        $card->row_id=$row->id;
        $card->save();
        return redirect()->route('rows.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
        return view('cards.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
        return view('cards.edit', compact('card'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        $this->validate($request, [
            'content' => 'required'
        ]);
        //
        $card->content=$request->input('content');
        // flash('Successfully created new car$card.');
        $card->save();
        return redirect()->route('rows.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();
        return back();
    }
}
