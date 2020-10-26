<?php

namespace Modules\Ads\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $table = 'tags';
    protected $fillable = ['name', 'created_at', 'updated_at', 'deleted_at'];

    public function ads()
    {
        return $this->belongsToMany('Modules\Ads\Entities\Ads', 'ads_tags','tags_id','ads_id');
    }
}
