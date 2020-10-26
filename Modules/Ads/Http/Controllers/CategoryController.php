<?php

namespace Modules\Ads\Http\Controllers;

use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Ads\Http\Requests\ItemRequest;
use Modules\Ads\Repositories\CategoriesRepository;
use Modules\Ads\Transformers\ItemResource;

class CategoryController extends Controller
{
    use ApiResponseTrait;

    private $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }


    public function index()
    {
        $categories = $this->categoriesRepository->getAll();
        if (count($categories) > 0) {
            return $this->apiResponse(ItemResource::collection($categories));
        }
        return $this->notFoundResponse('no categories found');
    }

    /**
     * Store a newly created resource in storage.
     * @param ItemRequest $request
     */
    public function store(ItemRequest $request)
    {

        if ($this->categoriesRepository->create($request)) {
            return $this->apiResponse("category added successfully");
        }
        return $this->unKnowError("Error while saving the category");
    }

    /**
     * Show the specified resource.
     * @param int $id
     */

    public function show($id)
    {
        $category = $this->categoriesRepository->get($id);
        if ($category) {
            return $this->apiResponse(new ItemResource($category));
        }
        return $this->notFoundResponse("no category found");
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     */
    public function update(ItemRequest $request, $id)
    {
        if ($this->categoriesRepository->update($request, $id)) {
            return $this->apiResponse("category updated successfully");
        }
        return $this->unKnowError("Error while updating the category");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     */
    public function destroy($id)
    {
        if ($this->categoriesRepository->delete($id)) {
            return $this->apiResponse("category deleted successfully");
        }
        return $this->unKnowError("Error while deleting the category");
    }
}
