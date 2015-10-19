<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use Auth;
use Input;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    	$datas = Data::paginate(5);
        $today_add = Data::today_add();
    	$user = Auth::user();//登陆的用户的信息
    	$isAdmin = $user->isAdmin;
    	return view('data.index',[
    			'datas'		=>	$datas,
    			'isAdmin'	=>	$isAdmin,
                'today_add' =>  $today_add,
                'user' 		=>  $user,
    	]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    	return view('data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
			'transform' => 'required|max:255',
			'price' 	=> 'required',
			'income' 	=> 'required',
		]);

		$data = new Data;
		$data->transform = Input::get('transform');
		$data->price = Input::get('price');
		$data->income = Input::get('income');

		if ($data->save()) {
			return Redirect::to('data');
		} else {
			return Redirect::back()->withInput()->withErrors('保存失败！');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    	echo 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Data $data)
    {
        return view('data.edit')->withData($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Data $data)
    {
    	$this->validate($request, [
			'transform' => 'required|max:255',
			'price' 	=> 'required',
			'income' 	=> 'required',
		]);

		$data->transform = Input::get('transform');
		$data->price = Input::get('price');
		$data->income = Input::get('income');

		if ($data->save()) {
			return Redirect::to('data');
		} else {
			return Redirect::back()->withInput()->withErrors('保存失败！');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Data $data)
    {
		$data->delete();
		return Redirect::to('data');
    }
    
    /**
     * 统计
     */
    public function collect(){
    	$user = Auth::user();//登陆的用户的信息
    	$isAdmin = $user->isAdmin;
    	//日新增
    	$day = Data::day_add();
    	//当月新增
    	$madd = Data::m_add();
    	//总数
    	$all = Data::unique_user();
    	return view('data.collect',compact('day', 'madd', 'all', 'user', 'isAdmin'));
    }
}
