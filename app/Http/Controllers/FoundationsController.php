<?php

namespace App\Http\Controllers;

use App\Foundation;
use App\Rep;
use Illuminate\Http\Request;
use DB;

class FoundationsController extends Controller
{
 public function show()
    {
        $foundatios=Foundation::paginate(5);
        $b=\App\Foundation::all();
        $total=$b->count();

        $url='found_search';
        //print_r($foundatios);
    	return view('foundations',compact('foundatios','total','url'));
    }
    public function add_form()
{
    $rep=Rep::pluck('name','rep_id');
    return view('add_found_form',compact('rep'));
}
    public function add_found_submit(Request $request)
    {
        $found=Foundation::create($request->all());
        return redirect()->back()->with('success','تم الاضافة بنجاح');
    }
    public function edit_found_form($id)
    {
        $rep=Rep::pluck('name','rep_id');
        $f=Foundation::find($id);
        return view('edit_found_form',compact('rep','f'));
    }
    public function edit_found_submit(Request $request , $id)
    {
        $f=Foundation::find($id);
        $f->name=$request->name;
        $f->address=$request->address;
        $f->coming_app=$request->coming_app;
        $f->leaving_app=$request->leaving_app;
        $f->rep_id=$request->rep_id;
        $f->save();
        return redirect()->back()->with('success','تم التعديل بنجاح');
    }
    public function delete($id)
    {
        $bus=Foundation::find($id);
        $bus->delete();

        return Redirect()->back()->with('success','مبروك');
    }
    public function search(Request $request)
    {
        if ($request->search != '') {

            $res=Foundation::where('name','like','%'.$request->search.'%')->orWhere('address','like','%'.$request->search.'%')->get();
        $b=DB::table('foundation')->where('name','like','%'.$request->search.'%')->orWhere('address','like','%'.$request->search.'%')->get();
        $total=$b->count();
        $url='found_search';
        if($res->count() > 0)
        {

            return view('foundation_search_result',compact('res','total','url'));
        }
        else
        {
            return view('foundation_search_result',compact('res','total','url'));
        }
        } else {
            return redirect()->back()->with('success', 'لم يتم ادخال كلمات للبحث');
        }
    }
}
