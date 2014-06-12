<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

require_once "FoursquareAPI.class.php";


class Foursq extends Eloquent {

	//use UserTrait, RemindableTrait;

	protected $table = 'members';
	//protected $hidden = array('password', 'remember_token');
	
	public function datawrite(){

			$foursquare = new FoursquareAPI("Z4YI1WLX2P1N3W3KQMCY12VZR3UOKRNZ3ZSJLBU4H3JDLZYA", "3UMKWJGHVGI3QHQCE5C3DACKYCWGSQDC3B3LGWAK1R02IYN0");

			// Searching for venues nearby Montreal, Quebec
			$endpoint = "venues/explore";

			// Prepare parameterss
			$params = array("section"=>"food","ll"=>"40.744749, -73.993705","v"=>"20141006","limit"=>"50");
			// Perform a request to a public resource
			$response = $foursquare->GetPublic($endpoint,$params);
			//print $response;
			$response=json_decode($response);
			foreach ($response as $groups)
			{
				foreach ($groups->groups as $items)
				{
					foreach ($items->items as $data) 
					{	
						$rest = new Foursq;
						$id = $data->venue->id;
						$name =$data->venue->name;
						//$location = $data->location;
						$address = $data->venue->location->address.", ".$data->venue->location->crossStreet.", ".$data->venue->location->city.", ".$data->venue->location->state;
						$distance =$data->venue->location->distance;
						$rating=$data->venue->rating;
						foreach($data->venue->categories as $cat)
						{
							$categoriesId = $cat->id;
							$categoriesName = $cat->name;				
			 			}
			 			
			 			$rest = Foursq::create(array('id'=>$id,'name'=>$name,'address'=>$address,'distance'=>$distance,'categoriesId'=>$categoriesId,'categoriesName'=>$categoriesName,'rating'=>$rating));
			 			$rest ->save();
					}
				}
			}
			return "done";
		}
}
