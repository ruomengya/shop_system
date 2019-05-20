<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Admin\IndexController@index');

//商品分类管理
Route::any('/category/add', 'Category\CategoryController@addCategory');//添加
Route::any('/category/list', 'Category\CategoryController@listCategory');//列表

//商品属性管理
Route::any('/attr/basic/add', 'Attr\AttrController@addBasicAttr');//基本属性添加
Route::any('/attr/sale/add', 'Attr\AttrController@addSaleAttr');//销售属性添加