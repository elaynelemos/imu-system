<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Driver\BulkWrite;

class MesureController extends BaseController 
{
    public function index(Request $request){
        $accelerometer = array(
            "x" => $request->xacc,
            "y" => $request->yacc,
            "z" => $request->zacc
        );
        
        $gyro = array(
            "x" => $request->xgyro,
            "y" => $request->ygyro,
            "z" => $request->zgyro
        );

        $temp = $request->temperature;

        store($accelerometer, $gyro, $temp);
    }

    public function store($accelerometer, $gyro, $temp){
        $bulk = new BulkWrite;
        $bulk->insert($accelerometer);
        $bulk->insert($gyro);
        $bulk->insert($temp);

        //nao tenho certeza se eh assim amigos, sinceramente nao lembro direito
    }

    public function update(Request $updated){
        $accelerometer->x = $updated->xacc;
        $accelerometer->y = $updated->yacc;
        $accelerometer->z = $updated->zacc;
        
        $gyro->x = $updated->xgyro;
        $gyro->y = $updated->ygyro;
        $gyro->z = $updated->zgyro;

        $temp = $updated->temperature;

        store($accelerometer, $gyro, $temp);
    }
}