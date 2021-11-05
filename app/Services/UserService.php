<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService {

    public static function getAdminFilteredUsers($filter = [], $search = '', $perPage = 10) {
        $userFilter = self::getFilterMethod($filter);

        $result = User::when(!empty($userFilter), function($q) use ($userFilter){
                $key = key($userFilter);
                $q->where($key, $userFilter[$key]);
            })
            ->where(function($q) use($search){
                $q->where(DB::raw('CONCAT_WS(" ", name, last_name)'), 'like', "%{$search}%")
                    ->orWhere('nickname', 'like', "%{$search}%");
            })
            ->whereIsAdmin(false)
            ->paginate($perPage);

        return $result;
    }

    protected static function getFilterMethod($filters = []){
        $key = array_key_first($filters);
        return $key
            ? User::FILTERS[$key][$filters[$key]]
            : $key;
    }
}
