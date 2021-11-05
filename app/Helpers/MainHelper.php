<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class MainHelper {
    /**
     * @param int $user_id User-id
     *
     * @return string
     */
    public static function get_username($user_id) {
        $user = DB::table('users')->where('userid', $user_id)->first();

        return (isset($user->username) ? $user->username : '');
    }
}
