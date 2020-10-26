<?php

namespace Modules\Ads\Http\Controllers;

use App\Traits\ApiResponseTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Ads\Http\Requests\TagRequest;
use Modules\Ads\Repositories\TagsRepository;
use Modules\Ads\Transformers\TagResource;
use phpDocumentor\Reflection\Types\Void_;

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
            return $this->apiResponse(TagResource::collection($tags));
        }
        return $this->notFoundResponse('no tags found');
    }

    /**
     * Store a newly created resource in storage.
     * @param TagRequest $request
     */
    public function store(TagRequest $request)
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
            return $this->apiResponse(new TagResource($tag));
        }
        return $this->notFoundResponse("no tag found");
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     */
    public function update(TagRequest $request, $id)
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
