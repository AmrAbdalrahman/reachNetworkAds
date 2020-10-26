<?php

namespace Modules\Ads\Interfaces;

use App\Http\Requests\AbstractRequest;

/**
 * Interface ItemRepositoryInterface
 * @package Modules\Ads\Interfaces
 */
interface ItemRepositoryInterface
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
    public function get($id);

    /**
     * @param AbstractRequest $request
     * @param int $id
     * @return mixed
     */
    public function update(AbstractRequest $request, int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);
}
