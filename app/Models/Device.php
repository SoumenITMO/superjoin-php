<?php

namespace App\Models;

use App\Models\DeviceChannel;
use App\Channel;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Device extends Eloquent
{
    protected $table = "device";
	protected $primaryKey = 'id';
	
	public function deviceChannels()
    {
        return $this->hasMany(DeviceChannel::class);
    }
}
