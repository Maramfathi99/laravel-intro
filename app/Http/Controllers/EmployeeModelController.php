<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Employee;
use App\Models\Department;
use App\Http\Requests\ EmployeeRequest;

class EmployeeModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //هيك افضل طريقة جوا الاندكسpphp
    public function index(Request $request)
    {
        $q = '';
        if($request->q){
            $q = $request->q;
        }
        $items =Employee::where("firstname","like","%$q%")
        ->orWhere("lastname","like","%$q%")
        ->orWhere("email","like","%$q%")
        ->paginate(6)
        ->appends(['q'=>$q]);
        return view("employess-model.index")->with('items',$items);
    }
  

    public function searchPagingAdvanced(Request $request)
    {
        $departments= Department::all();
        $q = $request->q;
        $department_id = $request->department_id;
        /*$active = $request->active;*/
        $gender = $request->gender;
        //$query = Employee::whereRaw('true');
        $query = Employee::where('id','>',0);
        
        if($department_id){
            $query->where('department_id',$department_id);
        }
        if($gender){
            $query->where('gender',$gender);
        }
        //لا يوجد عندي هذا العمود يجب عمله
        /*if($active!=''){
            $query->where('active',$active);
        }*/
        if($q){
            //بطريقتين
            /*$query->where('name','like',"%$q%")
            ->orWhere('email','like',"%$q%")
            ->orWhere('phone','like',"%$q%");*/
            $query->whereRaw('(firstname like ? or email like ? or phone like?)',["%$q%","%$q%","%$q%"]);
        }
        $items = $query->paginate(4)
            ->appends([
                'q'     =>$q,
                'gender'=>$gender,
                'department_id'=>$department_id
                /*'active'=>$active*/
            ]);
         
        return view("employess-model.search-paging-advanced",compact('items','departments'));
                       /*اسهل نستخدم كومباكت

                       ->with('items',$items)
                        ->with('departments',$department_id);**/
          
    }
//سيرش و بيجنغ بنفس الصفحة
   /* public function searchPaging(Request $request)
    {
        $q = '';
        if($request->q){
            $q = $request->q;
        }
            $items = Employee::where("firstname","like","%$q%")
                    ->orWhere("lastname","like","%$q%")
                    ->orWhere("email","like","%$q%")
                    ->paginate(2)
                    ->appends(['q'=>$q]);
            return view("employess-model.search-paging")->with('items',$items);
        }*/
//لو بدي اغمل سيرش و بيجينغ كل واحد لحال
    /*public function search(Request $request)
    {
        $q = '';
        if($request->q){
            $q = $request->q;
        }
        $items = Employee::where("firstname","like","%$q%")
                ->orWhere("lastname","like","%$q%")
                ->orWhere("email","like","%$q%")
                ->get();
        return view("employess-model.search")->with('items',$items);
    }
    
    public function paging()
    {
        //$items = Student::simplePaginate(10);
        $items = Employee::paginate(10);
        return view("employess-model.paging")->with('items',$items);
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments= Department::all();
        return view("employess-model.create",compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $requestData = $request->all();
        if($request->image){
            $fileName = $request->image->store("public/images");
            $imageName = $request->image->hashName();
            $requestData['image'] = $imageName;
        }
        Employee::create($requestData);
        Session::flash("msg","Employee Created Successfully");

        return redirect(route("employess-model.create"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $item = Employee::find($id);
       if(!$item){
        session()->flash("msg","Invalid Id");
        return redirect(route("employess.index"));
    }
    $department = DB::table("departments")->find($item->department_id)->name??'no-department';

    return view("employess-model.show",compact('item','department'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Employee::find($id);
        if(!$item){
            session()->flash("msg","Invalid Id");
            return redirect(route("employess.index"));
        }
        $departments= Department::all();
        return view("employess-model.edit",compact('item','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $itemDB= Employee::find($id);
        $requestData = $request->all();
        if($request->image){
            $fileName = $request->image->store("public/images");
            $imageName = $request->image->hashName();
            $requestData['image'] = $imageName;
        }
   $itemDB->update($requestData);
  
     session()->flash("msg","Employee Updated Successfully");
     return redirect(route("employess-model.index"));
     
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemDB= Employee::find($id);
        $itemDB->delete();
       session()->flash("msg","Employee Deleted Successfully");
       return redirect(route("employess-model.index"));
   }
}
