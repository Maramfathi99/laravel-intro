<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       $items = \DB::table("students")->get();
       return view("students.index")->withItems($items);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("students.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'name' => 'required|max:50',
        'email' => 'required|max:50',
        'mobile' => 'required|max:50',
        'gender'=>'required'
            ]);
          \DB::table("students")->insert([
            'name' => $request['name'],
             'email' => $request['email'],
              'mobile' => $request['mobile'],
               'gender' => $request['gender'],
        ]);
             \Session::flash("msg","Created Successfully");
              return redirect(route("students.index"));
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $item = \DB::table("students")->find($id);
            if(!$item){
           
            \Session::flash("msg","Invalid Item ID");

            return redirect(route("students.index"));
        }
      return view("students.show")->withItem($item);

  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $item = \DB::table("students")->find($id);
            if(!$item){
           
            \Session::flash("msg","Invalid Item ID");

            return redirect(route("students.index"));
        }
      return view("students.edit")->withItem($item);

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
       $request->validate([
        'name' => 'required|max:50',
        'email' => 'required|max:50',
        'mobile' => 'required|max:50',
        'gender'=>'required'
            ]);
          \DB::table("students")->where("id",$id)->update
          ([
            'name' => $request['name'],
             'email' => $request['email'],
              'mobile' => $request['mobile'],
               'gender' => $request['gender'],
        ]);
             \Session::flash("msg","Updated Successfully");
              return redirect(route("students.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
    \DB::table("students")->where('id',$id)->delete();
            
             \Session::flash("msg","Deleted Successfully");
              return redirect(route("students.index"));
    }
}
