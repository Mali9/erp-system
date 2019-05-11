<?php

namespace App\Http\Controllers;

use App\Re;
use App\Rep;
use Illuminate\Http\Request;
use SoftDeletes;
use Illuminate\Support\Facades\DB;


class RepresentativesController extends Controller
{
    protected $dates = ['deleted_at'];
    public function show()
    {
        $rep=Rep::paginate(5);
        $b=\App\Rep::all();
        $total=$b->count();
        $url='rep_search';
        return view('representatives',compact('rep','total','url'));
    }
    public function add_rep_form()
    {
        return view('add_rep_form');
    }

    public function add_rep_submit(Request $request)
    {
        Rep::create($request->all());
        return redirect()->back()->with('success','تم اضافة مندوب بنجاح');
    }

    public function edit_rep_form($id)
    {
        $rep=Rep::find($id);

        return view('edit_rep_form',compact('rep'));
    }

    public function edit_rep_submit(Request $request,$id)
    {
        $user=Rep::find($id);
        $user->name=$request->name;
        $user->phone=$request->phone;

        $user->save();
        return redirect()->back()->with('success','تم التعديل بنجاح');
    }
    public function delete($id)
    {
        $bus=DB::table('foundation')->where('rep_id',$id)->get();
        $bus1=DB::table('re')->where('rep_id',$id)->get();

        if ($bus->count() > 0 || $bus1->count() > 0) {
            return Redirect()->back()->with('success', 'لا يمكن حذف هذا العضو لانه مرتبط بجدول أخر');
        }
        else{
            $captain = Rep::find($id);
            $captain->delete();

            return Redirect()->back()->with('success', 'تم الحذف');

        }

    }
    public function search(Request $request)
    {
        if ($request->search != '') {
            $res=Rep::where('name','like','%'.$request->search.'%')->get();
        $b=DB::table('rep')->where('name','like','%'.$request->search.'%')->get();
        $total=$b->count();
        $url='rep_search';
        if($res->count() > 0)
        {

            return view('rep_search_result',compact('res','total','url'));
        }
        else
        {
            return view('rep_search_result',compact('res','total','url'));
        }
    } else {
return redirect()->back()->with('success', 'لم يتم ادخال كلمات للبحث');
}
}
}
