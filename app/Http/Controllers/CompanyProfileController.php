<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Union;
use App\Models\Profile;
use App\Models\Pouroshova;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyProfileController extends Controller
{
    public function view(){
        
            $data['allData']= Profile::where('status','1')->where('user_id',Auth::user()->id)->get();
        return view('backend.company.view-company-profiles',$data);
    
        
    }

    public function add(){
        return view('backend.company.add-company-profile');
    }

    public function edit($id){

        $data['editData'] = Profile::find($id);
        return view('backend.company.edit-company-profile',$data);
    }



    public function store(Request $request){

        
        $request->validate([
                'name'=>'required',
                'company_prefix'=>'required|unique:profiles,company_prefix|integer|min:4|digits_between: 4,4',
        ]);

        $unioun = Union::create([
            "district_name"=>$request->district_name,
            "upazilla_name"=>$request->upazilla_name,
            "union_name"=>$request->union_name,
            "url"=>$request->url,
        ]);


        Profile::create([
            "name"=>$request->name,
            "company_prefix"=>$request->company_prefix,
            "comments"=>$request->comments,
            "union_id"=>$unioun->id,
            "status"=>"1",
            'user_id'=>Auth::user()->id,

        ]);

       
        return redirect()->route('company.view')->with('success','Your company has created !!');
    }
    public function update(Request $request,$id){
       
         
                $request->validate([
                    'name'=>'required',
                    
            ]);

            $profile = Profile::find($id);

           if ($profile->union_id) {
                 $union = Union::find($profile->union_id)->update([
                "district_name"=>$request->district_name,
                "upazilla_name"=>$request->upazilla_name,
                "union_name"=>$request->union_name,
                "url"=>$request->url,
               
            ]);
           
          
           }else{
            $pouroshova = Pouroshova::find($profile->pouroshova_id)->update([
                "pouroshova_name"=>$request->pouroshova_name,
                "address"=>$request->address,
                "url"=>$request->url,
            ]);
           
           }

           $profile->update([
            "name"=>$request->name,
            "company_prefix"=>$request->company_prefix,
            "comments"=>$request->comments,
            "status"=>"1",
            'user_id'=>Auth::user()->id,

        ]);

          


        // $request->validate([
        //         'name'=>'required',
        //         'company_prefix'=>'required|min:4',
        // ]);

        // Profile::find($id)->update([
        //     "name"=>$request->name,
        //     "company_prefix"=>$request->company_prefix,
        //     "comments"=>$request->comments,
        //     "status"=>"1",
        //     'user_id'=>Auth::user()->id,

        // ]);

        return redirect()->route('company.view')->with('success','Your company has updated !!');
    }

    public function delete($id){

        $profile = Profile::find($id);
        foreach ($profile->cards as $key => $card) {
            Card::find($card->id)->delete();
        }
        
        if ($profile->union_id) {
            Union::find($profile->union_id)->delete();
        }else{
            Pouroshova::find($profile->pouroshova_id)->delete();
        }
        $profile->delete();

       
        


        return back()->with('success','Profile has Deleted');
    }

    public function pouroForm(){
        return view('backend.company.add-company-pouroshova');
    }

    public function pouroStore(Request $request){
       
        $request->validate([
            'name'=>'required',
            'company_prefix'=>'required|unique:profiles,company_prefix|integer|min:4|digits_between: 4,4',
    ]);

    $pouroshova = Pouroshova::create([
        "pouroshova_name"=>$request->pouroshova_name,
        "address"=>$request->address,
        "url"=>$request->url,
    ]);


    Profile::create([
        "name"=>$request->name,
        "company_prefix"=>$request->company_prefix,
        "comments"=>$request->comments,
        "pouroshova_id"=>$pouroshova->id,
        "status"=>"1",
        'user_id'=>Auth::user()->id,

    ]);

    return redirect()->route('company.view')->with('success','Your company has updated !!');
    }
}
