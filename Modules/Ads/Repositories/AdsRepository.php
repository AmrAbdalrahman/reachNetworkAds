<?php

namespace Modules\Ads\Repositories;

use App\Http\Requests\AbstractRequest;
use Carbon\Carbon;
use Modules\Ads\Entities\Ads;
use Modules\Ads\Entities\AdsTags;
use Modules\Ads\Entities\Tag;
use Modules\Ads\Interfaces\AdsRepositoryInterface;

class AdsRepository implements AdsRepositoryInterface
{

    protected $ads;
    protected $tag;

    public function __construct(Ads $ads, Tag $tag)
    {
        $this->ads = $ads;
        $this->tag = $tag;
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

    public function categoryAds($id)
    {
        return $this->ads->where('category_id', $id)->orderBy('id', 'DESC')->get();
    }

    public function tagAds($id)
    {
        $tag = $this->tag->findOrFail($id);
        return $tag->ads;
    }

    public function advertiserAds($id)
    {
        return $this->ads->where('advertiser_id', $id)->orderBy('id', 'DESC')->get();
    }

    public function tomorrowAds()
    {
        $tomorrowDate = Carbon::tomorrow();
       return $this->ads->where('start_date', $tomorrowDate)->orderBy('id', 'DESC')->with('advertiser')->get();
    }






}
