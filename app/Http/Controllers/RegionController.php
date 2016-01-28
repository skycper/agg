<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class RegionController extends Controller
{
    public function getAllProvinces()
    {
        $provinces = DB::select('select * from provinces');
        return $provinces;
    }

    public function getProvinceById($id)
    {
        $province = DB::select('select * from provinces where provinceid = ?', [$id]);
        return $province;
    }

    public function getCitiesForProvince($provinceid)
    {
        $cities = DB::select('select * from cities where provinceid = ?', [$provinceid]);
        return $cities;
    }

    public function getCityById($id)
    {
        $city = DB::select('select * from cities where cityid = ?', [$id]);
        return $city;
    }

    public function getAreasForCity($cityid)
    {
        $areas = DB::select('select * from areas where cityid = ?', [$cityid]);
        return $areas;
    }

    public function getAreaById($id)
    {
        $area = DB::select('select * from areas where areaid = ?', [$id]);
        return $area;
    }
}
