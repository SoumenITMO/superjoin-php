<?php

namespace App\Models;

use App\Models\Channel;
use Illuminate\Database\Eloquent\Model;

class DeviceChannel extends Model
{
    protected $table = "device_channel";
	protected $primaryKey = 'id';
	
	public function channels()
    {
        return $this->hasMany(Channel::class, 'id', 'channel_id');
    }
	
	public function deviceChannelPlaylist()
	{
		return $this->hasMany(PlaylistCache::class, 'target_id', 'id');
	}
}
