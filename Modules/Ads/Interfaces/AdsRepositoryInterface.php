<?php

namespace Modules\Ads\Interfaces;

use App\Http\Requests\AbstractRequest;

/**
 * Interface ItemRepositoryInterface
 * @package Modules\Ads\Interfaces
 */
interface AdsRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param AbstractRequest $request
     * @return mixed
     */
    public function create(AbstractRequest $request);

    /**
     * @param $id
     * @return mixed
     */
    public function categoryAds($id);

    /**
     * @param $id
     * @return mixed
     */
    public function tagAds($id);

    /**
     * @param $id
     * @return mixed
     */
    public function advertiserAds($id);

}
