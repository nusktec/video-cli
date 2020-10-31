<?php
use \App\Http\Controllers\MainApis;
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
    return Response()->json(array("msg"=>"Invalid vFX initialization", "status"=>false, "data"=>[]));
});
Route::get('/vfx/live/{id}', [MainApis::class, 'live']);

/*
 * {"data":{"_id":"5f998e19da230000a3005272","name":"sanjana narula","email":"sanjana@softuvo.com","dob":"01-03-2019","gender":"Female","class_id":"5c95f7b2b38edb7cff5b68c4","address":"#1234, phase 5, S.A.S Nagar Mohali","country":"81","state":"8766","city":"Select Town","image":"\"5c8e5ba1b38edb20c829bf62","admissionNumber":1,"school_id":"5c8e5ba1b38edb20c829bf62","password":"$2y$10$\/fnEt1KTAJQs9HowEK6dZuTC6rhINw.6i6ATVgKJBNrNCbrZoA46C","active":1,"updated_at":"2020-10-31 08:35:22","created_at":"2020-10-28 16:28:25","last_login_at":"2020-10-31 08:35:22","last_login_ip":"127.0.0.1"},"msg":"Student data loaded","status":true}
 */
