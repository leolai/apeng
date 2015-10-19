<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
     * 汇总信息
     */
    public static function count_info(){
    	return DB::table('datas')
    		->select(DB::raw('count(*) as count,DATE(created_at) as ctime'))
    		->groupBy('ctime')->get();
    }
    
    /**
     * 唯一用户总数
     */
    public static function count(){
    	return DB::table('datas')->select( DB::raw('DISTINCT(imei)') )->count();
    }
}
