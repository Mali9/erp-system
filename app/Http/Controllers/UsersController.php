<?php

namespace App\Http\Controllers;

use App\Col_point;
use App\Foundation;
use App\Person;
use App\User;
use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{
     public function show()
    {
        $users=Person::paginate(5);
        $b=\App\Person::all();
        $total=$b->count();
        $url='user_search';
    	return view('users',compact('users','total','url'));
    }
    public function active_user($id)
    {
        $user=Person::find($id);
        $user->active=TRUE;
        $user->save();
        //echo $user->active;
        return redirect()->back()->with('success','تم تفعيل المشترك بنجاح');
    }
    public function disactive_user($id)
    {
        $user=Person::find($id);
        $user->active=FALSE;
        $user->save();
        //echo $user->active;
        return redirect()->back()->with('success','تم الغاء تفعيل المشترك بنجاح');
    }
    public function edit_user_form($id)
    {
        $u=Person::find($id);
        $found=Foundation::pluck('name','foundation_id');
        $col=Col_point::pluck('name','id');
        return view('edit_user_form',compact('u','found','col'));
    }
    public function edit_user_submit(Request $request,$id)
    {
        $user=Person::find($id);
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->card_id=$request->card_id;
        $user->point_id=$request->point_id;
        $user->foundation_id=$request->foundation_id;
        $user->save();
        return redirect()->back()->with('success','تم التعديل بنجاح');
    }
    public function delete($id)
    {
        $bus=Person::find($id);
        $bus->delete();

        return Redirect()->back()->with('success','تم المسح بنجاح');
    }

    public function search(Request $request)
    {
        if($request->search != '') {
            $re = Person::where('name', 'like', '%' . $request->search . '%')->orWhere('address', 'like', '%' . $request->search . '%')->get();
            $b = DB::table('users')->where('name', 'like', '%' . $request->search . '%')->orWhere('address', 'like', '%' . $request->search . '%')->get();
            $total = $b->count();
            $url = 'user_search';
            if ($re->count() > 0) {

                return view('user_search_result', compact('re', 'total', 'url'));
            } else {
                return view('user_search_result', compact('re', 'total', 'url'));
            }
        }
        else{
            return redirect()->back()->with('success','لم يتم ادخال كلمات للبحث');
        }
    }
}

