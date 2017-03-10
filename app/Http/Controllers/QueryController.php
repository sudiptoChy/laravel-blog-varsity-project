<?php
namespace App\Http\Controllers;


use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

Class QueryController extends Controller{
	
	public function insertNew(){
		$users = DB::table('users')->insert(
				[
					'name' => 'HashemiRafsan',
					'email' => 'rafu.rafsan@gmail.com',
					'password' => '1122'
				]
			);
		return 'new Data inserted';
	}

	public function allData(){
		$users = DB::table('users')->get();
		return $users;
	}

	public function whereData(){
		$users = DB::table('users')->where('name','HashemiRafsan')->value('email');
		return $users;
	}
}


?>
