<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function view()
    {	
        if (Auth::user()->role == "superadmin") {
              $data['allData'] = User::where('role','admin')->get();
        return view('backend.users.view-user',$data);
        }
        abort(404);
 
    }
    public function add()
    {
        if (Auth::user()->role == "superadmin") {
               return view('backend.users.add-user');
        }
        abort(404);
 
       
     
    }

    public function edit($id)
    {
        if (Auth::user()->role == "superadmin") {
               $editData=User::find($id);
         return view('backend.users.edit-user',compact('editData'));
        }
        abort(404);
 
      
     
    }

    public function store(Request $request)
    {

       
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users,email'
            

        ]);
        $code=rand(0000,9999);
    	$Data = new User;
    	$Data->userType = "admin";
        $Data->name = $request->name;
    	$Data->email = $request->email;
        $Data->role = $request->role;
    	$Data->password = bcrypt($code);
        $Data->code = $code;
    	$Data->save();

    	return redirect()->route('users.view')->with('success','User added successfully !!');

    }

    

    public function update(Request $request,$id)
    {
        $Data =User::find($id);
        $Data->userType = "admin";
        $Data->name = $request->name;
        $Data->email = $request->email;
        $Data->role = $request->role;
        $Data->save();

        return redirect()->route('users.view')->with('success','User Updated successfully !!');
    }

    public function delete($id)
    {
        if (Auth::user()->role == "superadmin") {
          
          $user=User::find($id);
            $user->delete();
            return redirect()->route('users.view')->with('success','User Deleted successfully !!');
        }else{
            return back()->with('error','Sorry !, Your role is not admin !!');
        }
        abort(404);
       
    } 
       
       
 
        

   

    
}