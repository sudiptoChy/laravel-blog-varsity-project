<?php
namespace App\Http\Controllers;


use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class categoriesController extends Controller{

    /*
	* Table name will be place in here
	*/
	protected $tableName = 'categories';



	/*
	* All method for categories will be here
	*/
	public function categoriesList(){

		$categories = DB::table($this->tableName)->select('cat_id','cat_name')->get();
		return json_encode($categories);

	}

	public function categoriesInsert($cat_name,$author_name){

		$categoriesItem = DB::table($this->tableName)->where('cat_name', $cat_name)->get();
		$categoriesChecking = count($categoriesItem);
		if($categoriesChecking == 0){
			$categoriesInsert = DB::table('categories')->insert(
				[
					'cat_name' => strtolower($cat_name),
					'author_id' => $author_name
				]
			);
			return json_encode('categories created successfully');
		}else{
			return json_encode('categories already stored in database');
		}

	}

	public function showCategoriesListByAuthor($author_id){

		$authorList = DB::table($this->tableName)->where('author_id',$author_id)->get();
		return $authorList;
	}


	public function updateCategoriesList($cat_id,$cat_changes){
		$updateCategories = DB::table($this->tableName)
							->where('cat_id',$cat_id)
							->update(
								['cat_name' => $cat_changes]
							 );
		if($updateCategories == 1){
			return json_encode('categories changes successfully');
		}else{
			return json_encode('categories changes unsuccesfull');
		}
	}

	public function deleteCategoriesItem($cat_id){
		$deleteCategoryItem = DB::table($this->tableName)
								->where('cat_id',$cat_id)
								->delete();
		if($deleteCategoryItem == 1){
			return json_encode('category deleted successfully');
		}else{
			return json_encode('categories deleted unsuccesfull');
		}
	}
}



?>
