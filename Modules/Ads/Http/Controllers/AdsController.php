<?php

namespace Modules\Ads\Http\Controllers;

use App\Traits\ApiResponseTrait;
use Illuminate\Routing\Controller;
use Modules\Ads\Http\Requests\AdsRequest;
use Modules\Ads\Repositories\AdsRepository;
use Modules\Ads\Transformers\AdResource;

class AdsController extends Controller
{
    use ApiResponseTrait;

    private $adsRepository;

    public function __construct(AdsRepository $adsRepository)
    {
        $this->adsRepository = $adsRepository;
    }


    public function index()
    {
        $ads = $this->adsRepository->getAll();
        if (count($ads) > 0) {
            return $this->apiResponse(AdResource::collection($ads));
        }
        return $this->notFoundResponse('no ads found');
    }

    /**
     * Store a newly created resource in storage.
     * @param AdsRequest $request
     */
    public function store(AdsRequest $request)
    {
        if ($this->adsRepository->create($request)) {
            return $this->apiResponse("Ad added successfully");
        }
        return $this->unKnowError("Error while saving the Ad");
    }

    /**
     * @param $id
     * @return mixed
     */
    public function filterByCategory($id)
    {
        $ads = $this->adsRepository->categoryAds($id);
        if (count($ads) > 0) {
            return $this->apiResponse(AdResource::collection($ads));
        }
        return $this->notFoundResponse('no ads found for this category');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function filterByTag($id)
    {
        $ads = $this->adsRepository->tagAds($id);
        if (count($ads) > 0) {
            return $this->apiResponse(AdResource::collection($ads));
        }
        return $this->notFoundResponse('no ads found for this tag');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function advertiserAds($id)
    {
        $ads = $this->adsRepository->advertiserAds($id);
        if (count($ads) > 0) {
            return $this->apiResponse(AdResource::collection($ads));
        }
        return $this->notFoundResponse('no ads found for this advertiser');
    }
}
