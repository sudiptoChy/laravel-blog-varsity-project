<?php
namespace App\Http\Controllers;


use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB as DB;
use Carbon\Carbon;

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

	public function categoriesInsert($cat_name,$author_name){
		// $current_time = Carbon::now()->toDayDateTimeString();
		// $categories = DB::table('categories')->insert(
			
		// 		[
		// 			'cat_name' => 'EEE',
		// 			'author_name' => 'Hashemi Rafsan'
		// 		]
		// 	);
		// return 'new Data insert';
		echo $cat_name ;
		echo $author_name;
	}

}


?>
