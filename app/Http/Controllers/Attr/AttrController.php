<?php
/**
 * 货品属性管理
 */
namespace App\Http\Controllers\Attr;

use App\Model\CategoryModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AttrController extends Controller
{
    /**
     * 基本属性添加
     */
    public function addBasicAttr( Request $request )
    {
        if( $request -> ajax() ){
            $data = $request -> all();
            DB::beginTransaction();
            $time = time();
            foreach( $data['attr'] as $k => $v){
                $basic_info = [
                    'category_id'   =>  $data['category_id'],
                    'attr_name'     =>  $v,
                    'status'        =>  1,
                    'ctime'         =>  $time

                ];
                $basic_id = DB::table('shop_basic_attr')->insertGetId($basic_info);
                if(!$basic_id){
                    DB::rollBack();
                    return $this -> dataJson( 3 ,'添加失败');
                }
                //属性是否存在
                if( isset($data['value'][$k])){
                    foreach($data['value'][$k] as $key => $value){
                        $value_info = [
                            'category_id'   =>  $data['category_id'],
                            'attr_value'    =>  $value,
                            'basic_id'      =>  $basic_id,
                            'status'        =>  1,
                            'ctime'         =>  $time
                        ];
                        $value_insert[] = $value_info;
                    }

                }
            }
            $res = DB::table('shop_basic_attr_value')->insert( $value_insert);
            if($res){
                DB::commit();
                return $this -> dataJson( 1000 ,'添加成功');
            }else{
                DB::rollBack();
                return $this -> dataJson( 3 ,'添加失败');
            }

        }else{
            //分类下拉
            $where = [
                'status'    => 1,
            ];
            $data = CategoryModel::where( $where ) -> get();
            if( empty( $data[0] ) ){
                $data =  [];
            }else{
                $data = CategoryModel::getCateInfo( $data );
            }

            $info = [
                'title' =>  '基本属性添加',
                'data'  =>  $data
            ];

            return view( 'attr.add_basic' , $info );
        }
    }

    /**
     * 销售属性添加
     */
    public function addSaleAttr( Request $request )
    {
        if( $request -> ajax()){

            $data = $request -> all();
            DB::beginTransaction();
            $time = time();
            foreach( $data['attr'] as $k => $v){
                $basic_info = [
                    'category_id'   =>  $data['category_id'],
                    'attr_name'     =>  $v,
                    'status'        =>  1,
                    'ctime'         =>  $time

                ];
                $sale_id = DB::table('shop_sale_attr')->insertGetId($basic_info);
                if(!$sale_id){
                    DB::rollBack();
                    return $this -> dataJson( 3 ,'添加失败');
                }
                //属性是否存在
                if( isset($data['value'][$k])){
                    foreach($data['value'][$k] as $key => $value){
                        $value_info = [
                            'category_id'   =>  $data['category_id'],
                            'attr_value'    =>  $value,
                            'sale_id'      =>  $sale_id,
                            'status'        =>  1,
                            'ctime'         =>  $time
                        ];
                        $value_insert[] = $value_info;
                    }

                }
            }
            $res = DB::table('shop_sale_attr_value')->insert( $value_insert);
            if($res){
                DB::commit();
                return $this -> dataJson( 1000 ,'添加成功');
            }else{
                DB::rollBack();
                return $this -> dataJson( 3 ,'添加失败');
            }
        }else{
            //分类下拉
            $where = [
                'status'    => 1,
            ];
            $data = CategoryModel::where( $where ) -> get();
            if( empty( $data[0] ) ){
                $data =  [];
            }else{
                $data = CategoryModel::getCateInfo( $data );
            }

            $info = [
                'title' =>  '销售属性添加',
                'data'  =>  $data
            ];

            return view( 'attr.add_sale' , $info );
        }
    }

}
