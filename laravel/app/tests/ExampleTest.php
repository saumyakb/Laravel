<?php
require_once "FoursquareAPI.class.php";
class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());

		$foursquare = new FoursquareAPI("Z4YI1WLX2P1N3W3KQMCY12VZR3UOKRNZ3ZSJLBU4H3JDLZYA", "3UMKWJGHVGI3QHQCE5C3DACKYCWGSQDC3B3LGWAK1R02IYN0");

		// Searching for venues nearby Montreal, Quebec
		$endpoint = "venues/explore";

		// Prepare parameters
		$params = array("section"=>"food","ll"=>"40.744749, -73.993705","v"=>"20141006","limit"=>"50");
		// Perform a request to a public resource
		$response = $foursquare->GetPublic($endpoint,$params);
		var_dump($response);
	}

}
