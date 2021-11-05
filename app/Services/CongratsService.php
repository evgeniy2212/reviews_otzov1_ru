<?php

namespace App\Services;

use App\Models\Congratulation;
use App\Models\User;

class CongratsService {
    public static function getUserCongratulation(User $user){
        return asset($user->congratulation->src);
    }

    public static function checkUserCongratulation(User $user){
        $congratulation = self::getCongratulationByCount($user->reviews_count);
        return $congratulation->id;
    }

    public static function getCongratulationSrcByCount($count){
        $congratulation = self::getCongratulationByCount($count);
        return asset($congratulation->src);
    }

    private static function getCongratulationByCount($count){
        $result = '';
        switch ($count){
            case(0):
                $result = Congratulation::firstWhere('name', 'default');
                break;
            case ($count >= Congratulation::FIRST_CONGRATULATION
                && $count < Congratulation::SECOND_CONGRATULATION):
                $result = Congratulation::firstWhere('name', 'first');
                break;
            case ($count >= Congratulation::SECOND_CONGRATULATION
                && $count < Congratulation::THIRD_CONGRATULATION):
                $result = Congratulation::firstWhere('name', 'second');
                break;
            case ($count >= Congratulation::THIRD_CONGRATULATION
                && $count < Congratulation::FOURTH_CONGRATULATION):
                $result = Congratulation::firstWhere('name', 'third');
                break;
            case ($count >= Congratulation::FOURTH_CONGRATULATION
                && $count < Congratulation::FIFTH_CONGRATULATION):
                $result = Congratulation::firstWhere('name', 'fourth');
                break;
            case ($count >= Congratulation::FIFTH_CONGRATULATION):
                $result = Congratulation::firstWhere('name', 'fifth');
                break;
            default:
                $result = Congratulation::firstWhere('name', 'default');
                break;
        }

        return $result;
    }
}
