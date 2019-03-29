<?php

namespace App\Http\Controllers\CwAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Redirect;
use Validator;

class CategoryController extends Controller
{
    /* Page events */
    public function index(){
    	$items=Category::all();
        $data=Category::where('parent_id','0')->get();
    	return view('cwadmin.category.index',compact('items','data'));
    }
    public function create(){
    	$data=Category::where('parent_id','0')->get();
    	return view('cwadmin.category.create',compact('data'));

    }
    public function store(Request $request){
    	$data=$request->all();
        $validator = Validator::make($data, Category::$rules);
        if ($validator->fails()) {
        return Redirect::back()->withInput($request->input())->withErrors($validator);
        }
        Category::create($data);
        return redirect('/cwadmin/categories')->with('message', 'category added.');

    }
    public function edit($id){ 	
    	$item = Category::findorFail($id)->toArray();
    	$data=Category::where('parent_id','0')->get();
    	return view('cwadmin.category.edit',compact('item','data'));
    }
    public function update(Request $request){
    	$data=$request->all();
    	$validator = Validator::make($data, Category::$rules);
        if ($validator->fails()) {
        return Redirect::back()->withInput($request->input())->withErrors($validator);
        }
    	$item = Category::findorFail($data['id']);
    	$item ->update($data);
    	return redirect('/cwadmin/categories');
    }
    public function delete($id){
        $data =Category::where('id',$id)->select('parent_id')->get();
        if($data[0]->parent_id > 0){
        Category::where('id',$id)->delete();
        return redirect('/cwadmin/categories')->with('message', 'child deleted.');
        }
        else
        Category::where('id',$id)->delete();
        return redirect('/cwadmin/categories')->with('message', 'deleted.');
      
    }
}