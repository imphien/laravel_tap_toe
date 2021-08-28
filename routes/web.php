<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('Hello',function(){
    return "Xin chào các bạn";
});

Route::get('Gioithieu',function(){
    return "<h1>Đây là project đầu tiên</h1>";
});

//truyền tham số
Route::get('Hoten/{ten}', function($ten){
    echo "Đây là tên của mình: ".$ten;
});

//gán điều kiện cho tham số
Route::get('Ngaysinh/{date}',function($date){
    echo "Mình sinh ngày: ".$date;
})->where(['date'=>'[a-zA-Z]+']);


//định danh cho route
Route::get('Route1',['as'=>'MyRoute',function(){
    echo "Xin chào các bạn";
}]);

Route::get('Route2',function(){
    echo "Đây là Route2";
})->name('MyRoute2');

Route::get('GoiTen',function(){
    return Redirect()->route('MyRoute2');
});

//Group route
Route::group(['prefix'=>'MyGroup'],function(){
    Route::get('User1',function(){
        echo "User1";
    });
    Route::get('User2',function(){
        echo "User2";
    });
    Route::get('User3',function(){
        echo "User3";
    });
});

//gọi controller
Route::get('GoiController','App\Http\Controllers\MyController@XinChao');