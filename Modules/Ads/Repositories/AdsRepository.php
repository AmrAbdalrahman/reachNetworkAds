<?php

namespace Modules\Ads\Repositories;

use App\Http\Requests\AbstractRequest;
use Modules\Ads\Entities\Ads;
use Modules\Ads\Entities\AdsTags;
use Modules\Ads\Interfaces\AdsRepositoryInterface;

class AdsRepository implements AdsRepositoryInterface
{

    protected $ads;

    public function __construct(Ads $ads)
    {
        $this->ads = $ads;
    }

    public function create(AbstractRequest $request)
    {
        try {
            $adsId = $this->ads->create($request->all())->id;

            if ($request->tags) {
                foreach ($request->tags as $tag) {
                    $code = new AdsTags();
                    $code->ads_id = $adsId;
                    $code->tags_id = $tag;
                    $code->save();
                }
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }

    }


    public function getAll()
    {
        return $this->ads->orderBy('id', 'DESC')->get();
    }


}
