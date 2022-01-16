<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Employee;
use App\Models\Department;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items =Employee::all();
        /*$items = DB::table("employess")
        ->leftJoin("departments","departments.id","employess.department_id")
        ->select("employess.*","departments.name as  department")
        ->orderBy("name")
        ->get();*/
     
        return view("employess.index")->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("employess.create");
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
        'firstname' => 'required|max:50',
        'lastname' => 'required|max:50',
        'phone' => 'required|max:50',
        'email' => 'required|max:50',
        'gender'=>'required|max:1',
        'empno'=>'required|max:50'
     ],[
         'firstname.required'=>'Please Enter Your First Name',
         'lastname.required'=>'Please Enter Your Last Name'
     ]);
    
     DB::table("employess")->insert([
        'firstname' => $request['firstname'],
        'lastname' => $request['lastname'],
        'phone' => $request['phone'],
        'email' => $request['email'],
        'gender' => $request['gender'],
        'empno'=>$request['empno']
    ]);

     Session::flash("msg","Employee Created Successfully");

     return redirect(route("employess.create"));
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $item = DB::table("employess")->find($id);
       if(!$item){
        session()->flash("msg","Invalid Id");
        return redirect(route("employess.index"));
    }
    $department = DB::table("departments")->find($item->department_id)->name??'no-department';

    return view("employess.show",compact('item','department'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DB::table("employess")->find($id);
        if(!$item){
            session()->flash("msg","Invalid Id");
            return redirect(route("employess.index"));
        }
        
        return view("employess.edit",compact('item'));
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
        'firstname' => 'required|max:50',
        'lastname' => 'required|max:50',
        'phone' => 'required|max:50',
        'email' => 'required|max:50',
        'gender'=>'required|max:1',
        'empno'=>'required|max:50'
    ]);

     DB::table("employess")->where("id",$id)->update([
        'firstname' => $request['firstname'],
        'lastname' => $request['lastname'],
        'phone' => $request['phone'],
        'email' => $request['email'],
        'gender' => $request['gender'],
        'empno'=>$request['empno']
    ]);
     session()->flash("msg","Employee Updated Successfully");
     return redirect(route("employess.index"));
     
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       DB::table("employess")->where("id",$id)->delete();
       session()->flash("msg","Employee Deleted Successfully");
       return redirect(route("employess.index"));
   }
}
