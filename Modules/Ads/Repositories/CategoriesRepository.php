<?php

namespace Modules\Ads\Repositories;


use App\Http\Requests\AbstractRequest;
use Modules\Ads\Entities\Category;
use Modules\Ads\Interfaces\AdsRepositoryInterface;

class CategoriesRepository implements AdsRepositoryInterface
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function create(AbstractRequest $request)
    {
        return $this->category->create($request->all());
    }

    public function getAll()
    {
        return $this->category->orderBy('id', 'DESC')->get();
    }

    public function get($id)
    {
        return $this->category->findOrFail($id);
    }

    public function update(AbstractRequest $request, int $id)
    {
        $updatedTag = $this->category->find($id);
        return $updatedTag->update($request->all());
    }

    public function delete(int $id)
    {
        return $this->category->find($id)->delete();
    }


}
