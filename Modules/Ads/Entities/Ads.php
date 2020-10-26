<?php

namespace Modules\Ads\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ads extends Model
{
    use SoftDeletes;

    protected $table = 'ads';
    protected $fillable = ['title', 'type', 'description', 'start_date', 'advertiser_id', 'category_id', 'created_at', 'updated_at', 'deleted_at'];


    public function category()
    {
        return $this->belongsTo('Modules\Ads\Entities\Category', 'category_id');
    }

    public function advertiser()
    {
        return $this->belongsTo('App\User', 'advertiser_id');
    }

    public function tags()
    {
        return $this->belongsToMany('Modules\Ads\Entities\Tag', 'ads_tags','ads_id','tags_id');
    }
}
