<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\User;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\EditRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->q;
        $items = User::where('email','like',"%$q%")
            ->orWhere('name','like',"%$q%")
            ->paginate(2)
            ->appends(['q'=>$q]);

        return view("users.index")->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $requestData = $request->all();
        $requestData['password'] = bcrypt($requestData['password']);
        User::create($requestData);
        Session::flash("msg","s:User Created Successfully");
        return redirect(route("users.create"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::find($id);
        if(!$item){
            session()->flash("msg","e:Invalid Id");
            return redirect(route("users.index"));
        }
        return view("users.edit",compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        $user = User::find($id);
        $requestData = $request->all();
        if($request->password){
            $requestData['password'] = bcrypt($requestData['password']);
        }
        else{
            unset($requestData['password']);
        }
        $user->update($requestData);

        session()->flash("msg","s:User Updated Successfully");
        return redirect(route("users.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemDB = User::find($id);
        $itemDB->delete();
        session()->flash("msg","w:User Deleted Successfully");
        return redirect(route("users.index"));
    }
}
