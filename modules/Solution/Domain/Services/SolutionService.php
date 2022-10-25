<?php

namespace Meraki\Solution\Domain\Services;

use Illuminate\Support\Arr;
use Meraki\Foundations\Domain\BaseService;
use Meraki\Solution\Infrastructure\Repositories\SolutionRepository;

class SolutionService extends BaseService
{
    public function __construct(
        protected SolutionRepository $solutionRepository,
    )
    {
        //
    }

    public function getAll()
    {
        return $this->solutionRepository->selectAll();
    }

    public function create(array $inputs)
    {
        $inputs['user_id'] = $this->getUserId();

        // Send Notification if you publish as a review (need a reviewer user)

        $solution = $this->solutionRepository->insert($inputs);

        return $solution;
    }

    public function findById(int $id)
    {
        return $this->solutionRepository->selectById($id);
    }

    public function update(int $id, array $inputs)
    {
        // filtering
        $tags = Arr::get($inputs, 'tags');
        $filter_inputs = Arr::except($inputs, ['tags']);

        // first retrieve model
        $solution = $this->solutionRepository->selectById($id);

        // syncing tags
        $solution->syncTags($tags);

        // update solution static data
        $this->solutionRepository->updateById($id, $filter_inputs);

        return $solution;
    }

    public function delete(int $id)
    {
        $this->solutionRepository->deleteById($id);
    }
}
