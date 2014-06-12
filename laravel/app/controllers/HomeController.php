<?php

class HomeController extends BaseController {

	
	
	
	public function home(){
		//$user = User::find(2);
		//$view = View::make('home',array('name'=>$user->username));
		$foursquare = new Foursq();
		$rest = $this->Foursq->datawrite();
		$view = View::make('display',array('name'=>$rest));
	
		 return "view";
	}

}
