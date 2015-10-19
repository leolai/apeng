<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;
use Hash;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Excel;
use App\Data;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {   return view('index');
		if(Auth::check()){
			return redirect('data');
		}
		return redirect('/auth/login');
    }
    
    public function reset(){
    	if($id = Input::get('id')){
    		$pwd = trim(Input::get('pwd'));
    		$repwd = trim(Input::get('re-pwd'));
    		if(!$pwd || !$repwd || $pwd != $repwd){
    			return Redirect::back()->withInput()->withErrors('保存失败！');
    		}
    		
    		$pwd = Hash::make($pwd); 
    		$user = User::find($id);
    		$user->password = $pwd;
    		$user->save();
    		Auth::logout();
    		redirect('auth/login');
    	}
    	$user = auth()->user();
    	return view('pwd')->withId($user->id);
    }
    
    public function excel(){
		$data = Data::all();
    	Excel::create(time(), function($excel) use ($data) {
    		$excel->sheet('数据', function($sheet) use ($data) {
    			$sheet->fromModel($data);
    		});
    	})->export('xls');
    }
}
