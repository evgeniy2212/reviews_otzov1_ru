<?php

namespace App\Http\Repositories;

use App\Models\User as Model;


/**
 * Class ProfileRepository
 *
 * @package App\Repositories
 */
class ProfileRepository extends CoreRepository {

    /**
     * @return string
     */
    public function getModelClass()
    {
        return Model::class;
    }

    public function getProfileInfo()
    {
        return auth()->user();
    }

    /**
     * @param null $perPage
     * @return mixed
     */
    public function getAllUserReviewWithMessages($perPage = 5)
    {
        $result = auth()->user()
            ->with(['messages' => function ($query) {
                $query->orderByDesc('created_at');
            }])
            ->with(['given_by_messages'])
            ->paginate($perPage);

        return $result;
    }
}
