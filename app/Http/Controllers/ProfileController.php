<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\User;
use Auth;
use App\Designation;

class ProfileController extends Controller
{
     public function view()
    {
    	$id = Auth::user()->id;
    	$data['user'] = User::find($id);


    	return view('backend.users.profiles.view-profile',$data);
    }
    public function edit()
    {

    	$id=Auth::user()->id;
    	$data['editData']=User::find($id);
    	return view('backend.users.profiles.edit-profile',$data);
    }

    public function update(Request $request)
    {	

    	
    	$user=User::find(Auth::user()->id);
    	$user->name =$request->name;
    	$user->gender =$request->gender;
    	$user->email =$request->email;
    	$user->mobile =$request->mobile;
    	$user->designation_id =$request->designation_id;
        $user->dob =date('Y-m-d',strtotime($request->dob));
        $user->religion =$request->religion;
        $user->address =$request->address;
       
           if ($request->hasFile('image')) {
               $image = $request->file('image');
               $img = time().'.'.$image->getClientOriginalExtension();
               $location =  public_path('backend/img/users/'.$img);
               Image::make($image)->save($location);
               $user->image = $img;
           }

        
        $user->save();
    	
    	
    	// if($request->hasFile('image'))
     //    {

     //       $image=$request->file('image');
     //        $img=time().'.'.$image->getClientOriginalExtension();
     //        $location =public_path('images/users/'.$img);
     //        Image::make($image)->save($location);

     //        //
     //        $user->image=$img;

     //    }
    	
    	return back()->with('success','Profile Updated');
    }

    public function password()
    {
    	return view('backend.users.profiles.edit-password');
    }

    public function passwordUpdate(Request $request)
    {
            $request->validate([
                'current_password'=>"required",
                "new_password"=>"required"
            ]);
        
    	if (Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->current_password])) {
    		
    		$user=User::find(Auth::user()->id);
    		$user->password = bcrypt($request->new_password);
    		$user->save();

    		return back()->with('success','Password changed successfully !!');

    	}else{
    		return back()->with('error','Please Enter your current password');
    	}

    }
}