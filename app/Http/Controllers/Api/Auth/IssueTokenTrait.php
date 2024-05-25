<?php 

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;

trait IssueTokenTrait{

	public function issueToken(Request $request, $grantType, $scope = "*"){

		$params = [
    		'grant_type' => $grantType,
    		'client_id' => $this->client->id,
    		'client_secret' => $this->client->secret, 
            'username' => $request->email, 		
    		'scope' => $scope
    	];

    	$request->request->add($params);

    	$proxy = Request::create('oauth/token', 'POST');

    	return Route::dispatch($proxy);

	}


	public function issueToken2(Request $request, $grantType, $scope = "*"){
		
		$params = [
    		'grant_type' => $grantType,
    		'client_id' => $this->client->id,
    		'client_secret' => $this->client->secret, 
            'username' => $request->email, 		
            //'password' => bcrypt(request('password')), 		
    		'scope' => $scope
    	];
    		
    	$request->request->add($params);
    	
    	$proxy = Request::create('oauth/token', 'POST');

    	//dd($proxy);
    	//dd(Route::dispatch($proxy));
    	$login_data = Route::dispatch($proxy);

    	$content = json_decode($login_data->getContent(), true);
    	// echo '<pre>'; print_r($content);exit;

    	// if($content['access_token'] != ""){
    	// 	$mobile = $request['mobile'];
    	// 	$device_id = $request['device_id'];
    	// 	$updateDeviceId = User::where('mobile', $mobile)->update([ 'device_id' => $device_id ]);
    	// 	return $login_data;
    	// }else{
    	// 	return $login_data;
    	// }

    	return $login_data;

	}

}