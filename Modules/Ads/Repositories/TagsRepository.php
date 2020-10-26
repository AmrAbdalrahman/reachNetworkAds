<?php

namespace Modules\Ads\Repositories;


use App\Http\Requests\AbstractRequest;
use Modules\Ads\Entities\Tag;
use Modules\Ads\Interfaces\AdsRepositoryInterface;

class TagsRepository implements AdsRepositoryInterface
{

    protected $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function create(AbstractRequest $request)
    {
        return $this->tag->create($request->all());
    }

    public function getAll()
    {
        return $this->tag->orderBy('id', 'DESC')->get();
    }

    public function get($id)
    {
        return $this->tag->findOrFail($id);
    }

    public function update(AbstractRequest $request, int $id)
    {
        $updatedTag = $this->tag->find($id);
        return $updatedTag->update($request->all());
    }

    public function delete(int $id)
    {
        return $this->tag->find($id)->delete();
    }


}
