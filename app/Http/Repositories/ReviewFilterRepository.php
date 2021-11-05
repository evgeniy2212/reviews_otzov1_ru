<?php

namespace App\Http\Repositories;

use App\Models\ReviewFilter as Model;

/**
 * Class ReviewFilterRepository
 *
 * @package App\Repositories
 */
class ReviewFilterRepository extends CoreRepository {

    /**
     * @return string
     */
    public function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param $categorySlug
     * @return mixed
     */
    public function getAllCategoryFilters($categorySlug = null)
    {
        $result = $this->startConditions()
            ->whereHas('category', function ($query) use($categorySlug) {
                $query->where('slug', $categorySlug);
            })
            ->orWhere('review_category_id', null)
            ->with(['filter_values'])
            ->get();
        return $result;
    }
}
