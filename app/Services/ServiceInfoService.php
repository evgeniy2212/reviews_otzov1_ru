<?php

namespace App\Services;

use App\Models\ServiceInfo;

class ServiceInfoService {
    public static function getInfoValueByName(string $name){
        return ServiceInfo::firstWhere('name', $name)->value ?? '';
    }
}
