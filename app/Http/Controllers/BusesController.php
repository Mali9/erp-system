<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Prof;
use App\Book;
use Session;


class BusesController extends Controller
{
    public function show()
    {
        $book=\App\Book::paginate(7);
        $b=\App\Book::all();
        $total=$b->count();
        $url='bus_search';
        return view('book',compact('book','url','total'));
    	//return view('buses',compact('buses'));
    }
    public function add_form()
    {
    	$captains = Prof::pluck('name','id');
    	return view('add_bus_form',compact('captains'));
    }
     public function add_bus_submit(Request $request) {
        //echo $id . "<br>";
        //print_r($request->all());
        $request->validate([
          
            'number' => 'required|max:255|min:1',
             'cap_id' => 'required',
           

        ]);
       

        $bus = new Book();
       	$bus->bus_num=$request->number;
       	$bus->prof_id=$request->cap_id;
       	$bus->save();
     
       // $con->save();
        //print_r($request->all());

         return Redirect()->back()->with('success','مبروك');
           }
           public function edit_bus_form($id){
            $book=Book::find($id);
               $captains = Prof::pluck('name','id');
               return view('edit_bus_form',compact('book','captains'));

           }
           public function edit_bus_submit(Request $request,$id)
           {
               $bus=Book::find($id);
               $bus->bus_num=$request->number;
               $bus->prof_id=$request->cap_id;
               $bus->save();
               return Redirect()->back()->with('success','تم التعديل بنجاح');
           }
    public function delete($id)
    {
        $bus=Book::find($id);
        $bus->delete();

        return Redirect()->back()->with('success','تم المسح بنجاح');
    }


    public function search(Request $request)
    {
        if ($request->search != '') {
            $res = Book::where('bus_num', 'like', '%' . $request->search . '%')->get();
            $b = DB::table('book')->where('bus_num', 'like', '%' . $request->search . '%')->get();
            $total = $b->count();
            $url = 'bus_search';
            if ($res->count() > 0) {

                return view('bus_search_result', compact('res', 'total', 'url'));
            } else {
                return view('bus_search_result', compact('res', 'total', 'url'));
            }
        } else {
            return redirect()->back()->with('success', 'لم يتم ادخال كلمات للبحث');
        }
    }

}
