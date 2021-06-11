<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $data= Card::where('status',1)->where('user_id',$id)->with('profile')->orderBy('id', 'DESC')->get();
        return view('backend.card.view-cards',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCompany = Profile::where([['status', 1], ['user_id', Auth::id()]])->get();
        return view('backend.card.create-card',compact('allCompany'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Card::create([
            'card_number' => $request->input('prefix').generateCardNumber(),
            'pin_number' => generatePinNumber(),
            'profile_id' => $request->input('profile_id'),
            'user_id' => Auth::id(),
            'status' => 1,
        ]);

       return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $data = Card::find($id);
        return view('backend.card.card_print',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function singleView($id)
    {
        $data = Card::find($id);
        return view('backend.card.card_single_view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetch_prefix($id)
    {
        $company = Profile::whereId($id)->first();
        return $company;
    }

    public function allCard(Request $request){
        
        $ids = $request->id;

        if (!is_null($ids)) {
         return view('backend.card.all-card',compact('ids'));
        }
        abort(404);

       
       
    }
}
