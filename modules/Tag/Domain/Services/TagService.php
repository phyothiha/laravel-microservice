<?php

namespace Meraki\Tag\Domain\Services;

use Meraki\Foundations\Domain\BaseService;
use Meraki\Tag\Infrastructure\Repositories\TagRepository;

class TagService extends BaseService
{
    public function __construct(
        protected TagRepository $tagRepository,
    )
    {
        //
    }

    public function getAll()
    {
        return $this->tagRepository->selectAll();
    }

    public function create(array $inputs)
    {
        $tag = $this->tagRepository->insert($inputs);

        return $tag;
    }

    public function findById(int $id)
    {
        return $this->tagRepository->selectById($id);
    }

    public function update(int $id, array $inputs)
    {
        $tag = $this->tagRepository->updateById($id, $inputs);

        return $tag;
    }

    public function delete(int $id)
    {
        $this->tagRepository->deleteById($id);
    }
}
