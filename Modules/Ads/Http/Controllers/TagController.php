<?php

namespace Modules\Ads\Http\Controllers;

use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Ads\Http\Requests\ItemRequest;
use Modules\Ads\Repositories\TagsRepository;
use Modules\Ads\Transformers\ItemResource;

class TagController extends Controller
{
    use ApiResponseTrait;

    private $tagsRepository;

    public function __construct(TagsRepository $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }


    public function index()
    {
        $tags = $this->tagsRepository->getAll();
        if (count($tags) > 0) {
            return $this->apiResponse(ItemResource::collection($tags));
        }
        return $this->notFoundResponse('no tags found');
    }

    /**
     * Store a newly created resource in storage.
     * @param ItemRequest $request
     */
    public function store(ItemRequest $request)
    {

        if ($this->tagsRepository->create($request)) {
            return $this->apiResponse("tag added successfully");
        }
        return $this->unKnowError("Error while saving the tag");
    }

    /**
     * Show the specified resource.
     * @param int $id
     */

    public function show($id)
    {
        $tag = $this->tagsRepository->get($id);
        if ($tag) {
            return $this->apiResponse(new ItemResource($tag));
        }
        return $this->notFoundResponse("no tag found");
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     */
    public function update(ItemRequest $request, $id)
    {
        if ($this->tagsRepository->update($request, $id)) {
            return $this->apiResponse("tag updated successfully");
        }
        return $this->unKnowError("Error while updating the tag");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     */
    public function destroy($id)
    {
        if ($this->tagsRepository->delete($id)) {
            return $this->apiResponse("tag deleted successfully");
        }
        return $this->unKnowError("Error while deleting the tag");
    }
}
