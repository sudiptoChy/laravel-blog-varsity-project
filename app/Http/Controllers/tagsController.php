<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class tagsController extends Controller
{
    // Table name
    protected $tableName = 'tags';

    public function tagsList(){

  		$tags = DB::table($this->tableName)->select('tag_id','tag_name')->get();
  		return json_encode($tags);

  	}

    public function tagsInsert($tag_name, $cat_id, $author_id){

  		$tagsItem = DB::table($this->tableName)->where('tag_name', $tag_name)->get();
  		$tagsChecking = count($tagsItem);
  		if($tagsChecking == 0){
  			$tagsInsert = DB::table('tags')->insert(
  				[
  					'tag_name' => strtolower($tag_name),
            'cat_id' => $cat_id,
            'author_id' => $author_id,
  				]
  			);
  			return json_encode('tags created successfully');
  		}else{
  			return json_encode('tags already stored in database');
  		}
  	}

    public function showTagsListByAuthor($author_id){

  		$authorList = DB::table($this->tableName)->where('author_id',$author_id)->get();
  		return $authorList;
  	}

    	public function updateTagsList($tag_id, $tag_changes){
    		$updateTags = DB::table($this->tableName)
    							->where('tag_id',$tag_id)
    							->update(
    								['tag_name' => $tag_changes]
    							 );
    		if($updateTags == 1){
    			return json_encode('tags changed successfully');
    		}else{
    			return json_encode('tags change unsuccesfull');
    		}
    	}

      public function deleteTagsItem($tag_id){
    		$deleteTagsItem = DB::table($this->tableName)
    								->where('tag_id',$tag_id)
    								->delete();
    		if($deleteTagsItem == 1){
    			return json_encode('tags deleted successfully');
    		}else{
    			return json_encode('tags deleted unsuccesfull');
    		}
    	}
}
