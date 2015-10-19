<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Data extends Model
{
    protected $table = 'datas';
    protected $visible = ['transform', 'price', 'income', 'updated_at'];
    public function getDates()
    {
    	return ['updated_at'];
    }

    /**
     * 今日新增
     */
    public static function today_add(){
    	return DB::table('datas')->select(DB::raw('DATE(created_at) = curdate()'))->count();
    }
    
    /**
     * 日新增 分页返回
     */
    public static function day_add(){
    	return DB::table('datas')->select(DB::raw('count(*) as dcount,DATE(created_at) as d'))->groupBy(DB::raw('DATE(created_at)'))->orderBy('created_at','DESC')->paginate(5);
    }
    
    /**
     * 汇总信息
     */
    public static function count_info(){
    	return DB::table('datas')
    		->select(DB::raw('count(*) as count,DATE(created_at) as ctime'))
    		->groupBy('ctime')->get();
    }
    
    /**
     * 当月新增
     */
    public static function m_add(){
    	return DB::select(DB::raw('select count(b.mimei) as mcount from (select distinct(imei) as mimei from datas where MONTH(created_at)=MONTH(NOW())) as b'));
    }
    
    /**
     * 唯一用户总数
     */
    public static function unique_user(){
    	return DB::select(DB::raw('select count(b.imei) as countuser from (select distinct(imei) from datas) as b'));
    }
}
