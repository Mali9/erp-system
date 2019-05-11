<?php

namespace App\Http\Controllers;

use App\Col_point;
use Illuminate\Http\Request;
use DB;

class Col_pointsController extends Controller
{
    public function show()
    {
        $col=Col_point::paginate(7);
        $b=\App\Col_point::all();
        $total=$b->count();
        $url='col_search';
    	return view('col_points',compact('col','total','url'));
    }
    public function add_col_form()
    {
        return view('add_col_form');
    }
    public function add_col_submit(Request $request)
    {
        Col_point::create($request->all());
        return redirect()->back()->with('success','تم اضافة نقطة تجمع بنجاح');
    }
    public function edit_col_form($id)
    {
        $col=Col_point::find($id);

        return view('edit_col_form',compact('col'));
    }

    public function edit_col_submit(Request $request,$id)
    {
        $user=Col_point::find($id);
        $user->name=$request->name;
        $user->time=$request->time;
        $user->lang=$request->lang;
        $user->lat=$request->lat;
        $user->address=$request->address;


        $user->save();
        return redirect()->back()->with('success','تم التعديل بنجاح');
    }

    public function delete($id)
    {
        $bus=DB::table('users')->where('point_id',$id)->get();
        $bus1=DB::table('path')->where('col_id',$id)->get();

        if ($bus->count() > 0 || $bus1->count() > 0) {
            return Redirect()->back()->with('success', 'لا يمكن حذف هذا العضو لانه مرتبط بجدول أخر');
        }
        else{
            $captain = Col_point::find($id);
            $captain->delete();

            return Redirect()->back()->with('تم الحذف');

        }

    }
    public function search(Request $request)
    {
        if ($request->search != '') {

            $res=Col_point::where('name','like','%'.$request->search.'%')->orWhere('address','like','%'.$request->search.'%')->get();
        $b=DB::table('col_point')->where('name','like','%'.$request->search.'%')->orWhere('address','like','%'.$request->search.'%')->get();
        $total=$b->count();
        $url='col_search';
        if($res->count() > 0)
        {

            return view('col_search_result',compact('res','total','url'));
        }
        else
        {
            return view('col_search_result',compact('res','total','url'));
        }
    } else {
return redirect()->back()->with('success', 'لم يتم ادخال كلمات للبحث');
}
    }
}
