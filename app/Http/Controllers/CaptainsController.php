<?php

namespace App\Http\Controllers;

use App\Captain;
use App\Prof;
use App\Re;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaptainsController extends Controller
{
    public function show()
    {
        $captains=Prof::paginate(5);
        $b=\App\Prof::all();
        $total=$b->count();
        $url='captain_search';
    	return view('captains',compact('captains','total','url'));
    }
    public function add_form()
    {
        return view('add_captain_form');
    }
    public function add_captain_submit(Request $request)
    {
        $request->validate([

            'name' => 'required|max:255|min:1',
            'number' => 'required',
            'hw_number'=>'required'
        ]);
        $cap=new Prof();
        $cap->name=$request->name;
        $cap->phone=$request->number;
        $cap->hw_id=$request->hw_number;
        $cap->save();
       return redirect()->back();
    }
    public function edit_captain_form($id){
        $captains=Prof::find($id);

        return view('edit_captain_form',compact('captains'));

    }
    public function edit_captain_submit(Request $request,$id)
    {
        $request->validate([

            'name' => 'required|max:255|min:1',
            'phone' => 'required',
            'hw_id'=>'required'
        ]);
        $captain=Prof::find($id);
        $captain->name=$request->name;
        $captain->phone=$request->phone;
        $captain->hw_id=$request->hw_id;
        $captain->save();
        return Redirect()->back()->with('success','تم التعديل');
    }
    public function delete($id)
    {
        $bus=DB::table('book')->where('prof_id',$id)->get();
        if ($bus->count() > 0) {
          return Redirect()->back()->with('success', 'لا يمكن حذف هذا العضو لانه مرتبط بجدول أخر');
        }
        else{
            $captain = Prof::find($id);
            $captain->delete();

            return Redirect()->back()->with('success', 'تم الحذف');

        }
    }
    public function search(Request $request)
    {
        if ($request->search != '') {
        $res=Prof::where('name','like','%'.$request->search.'%')->orWhere('phone','like','%'.$request->search.'%')->orWhere('hw_id','like','%'.$request->search.'%')->get();
        $b=DB::table('prof')->where('name','like','%'.$request->search.'%')->orWhere('phone','like','%'.$request->search.'%')->orWhere('hw_id','like','%'.$request->search.'%')->get();
        $total=$b->count();
        $url='captain_search';
        if($res->count() > 0)
        {

            return view('captain_search_result',compact('res','total','url'));
        }
        else
        {
            return view('captain_search_result',compact('res','total','url'));
        }
        } else {
            return redirect()->back()->with('success', 'لم يتم ادخال كلمات للبحث');
        }
    }
}
