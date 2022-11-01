<?php

namespace Meraki\Tag\Application\Http\Controllers;

use Meraki\Tag\Domain\Services\TagService;
use Meraki\Foundations\Application\BaseController;
use Meraki\Tag\Application\Http\Resources\TagResource;
use Meraki\Tag\Application\Http\Requests\StoreTagRequest;

class TagController extends BaseController
{
    public function __construct(
        protected TagService $tagService
    )
    {
        //
    }

    public function index()
    {
        return TagResource::collection(
            $this->tagService->getAll()
        );
    }

    public function store(StoreTagRequest $request)
    {
        $validated = $request->validated();

        $this->tagService->create($validated);

        return $this->simpleSuccessResponse('Tag Created.');
    }

    public function update(StoreTagRequest $request, int $id)
    {
        $validated = $request->validated();

        $this->tagService->update($id, $validated);

        return $this->simpleSuccessResponse('Tag Updated.');
    }

    public function destroy(int $id)
    {
        $this->tagService->delete($id);

        return $this->simpleSuccessResponse('Tag Deleted.');
    }
}
