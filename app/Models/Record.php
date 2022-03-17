<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Jenssegers\Mongodb\Eloquent\Model as Moloquent;

class Measure extends Moloquent
{
    use HasFactory;
	protected $connection = 'mongodb';

    protected $fillable = [
		'accelerometer',
		'gyroscope',
		'temperature',
	];

    public function setAccelerometerAttribute(array $value)
    {
        //
    }
    public function setGyroscopeAttribute(array $value)
    {
        //
    }
    public function setTemperatureAttribute($value)
    {
        $this->attributes['temperature'] = (float) $value;
    }
}
