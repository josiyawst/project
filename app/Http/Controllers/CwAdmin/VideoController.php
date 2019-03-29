<?php

namespace App\Http\Controllers\CwAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use Redirect;
use Validator;

class VideoController extends Controller
{
    /* Page events */
    public function index(){
    	$items=Video::all();
    	return view('cwadmin.video.index',compact('items'));
    }
    public function create(){
    	$data=Video::all();
    	return view('cwadmin.video.create',compact('data'));
    }
    public function store(Request $request){
    	$data=$request->all();
        $validator = Validator::make($data, Video::$rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput($request->input())->withErrors($validator);
        }
        Video::create($data);
        return redirect('/cwadmin/videos')->with('message', 'video added.');
    }
    public function view($id){
    	$item = Video::findorFail($id)->toArray();
    	return view('cwadmin.video.show',compact('item'));
    }
    public function activate($id){
    	Video::where('id',$id)->update(['status'=>1]);
    	return redirect('/cwadmin/videos');
    }
    public function deactivate($id){
		Video::where('id',$id)->update(['status'=>0]);
    	return redirect('/cwadmin/videos');
    }
    public function edit($id){
    	$item = Video::findorFail($id)->toArray();
    	return view('cwadmin.video.edit',compact('item'));
    }
    public function update(Request $request){
    	$data=$request->all();
    	$validator = Validator::make($data, Video::$rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput($request->input())->withErrors($validator);
        }
        $item= Video::findorFail($data['id']);
        $item->update($data);
        return redirect('/cwadmin/videos');
    }
    public function search(Request $request){
		$data2=$request->all();
    	$items=Video::where('title', 'LIKE', '%' . $data2['search'] . '%')->get();
		return view('cwadmin.video.index',compact('items'));	
	}
    public function delete($id){
    	Video::where('id',$id)->delete();
    	return redirect('/cwadmin/videos');	
    }
}