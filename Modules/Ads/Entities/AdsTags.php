<?php

namespace Modules\Ads\Entities;

use Illuminate\Database\Eloquent\Model;

class AdsTags extends Model
{
    protected $table = 'ads_tags';
    protected $fillable = ['ads_id', 'tags_id', 'created_at', 'updated_at', 'deleted_at'];
}
