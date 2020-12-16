<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Device;
use App\Models\PlaylistCache;
use App\Models\DeviceChannel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    
	public function index()
	{
		$getData = Device::with(["deviceChannels" => function($mainquery) 
					{
						$mainquery->with(['channels' => function($subquery) 
						{
							$subquery->where("hash", "q275fyp2");
						}]);
					}])->where("hash", "dg3xfy99")->get();
	
		echo "<pre>";
		print_r($getData);
		echo "</pre>";
		
		/*
		echo "<pre>";
		print_r($get_data[0]->deviceChannels[0]->channels[0]->hash);
		echo "</pre>";
		
		echo "<pre>";
		print_r($get_data[0]->hash);
		echo "</pre>";
		*/
	}
	
	public function playList()
	{
		$getPlaylist = DeviceChannel::find(1)->deviceChannelPlaylist;
		
		if(sizeof($getPlaylist) > 0)
		{
			echo "<pre>";
			print_r($getPlaylist);
			echo "</pre>";
		}
		
		else
		{
			$dt = new DateTime;
			$date = now()->timestamp;
			
			$playlist = PlaylistCache::insertGetId(array("target_id" => 1, "sequence_pointer" => 8878, 
			"created_at" => $dt->getTimestamp(), "updated_at" => $dt->getTimestamp()));
		}
	}
	
	public function updatePlayList()
	{
		$target_id = 1;
		$dt = new DateTime;
		
		PlaylistCache::where("target_id", $target_id)->update(["updated_at" => $dt->getTimestamp()]); 
	}
}
