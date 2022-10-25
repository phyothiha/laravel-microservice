<?php

namespace Meraki\Solution\Infrastructure\Repositories;

use Meraki\Foundations\Infrastructure\BaseRepository;
use Meraki\Solution\Contracts\SolutionRepositoryContract;
use Meraki\Solution\Domain\Models\Solution;

class SolutionRepository extends BaseRepository implements SolutionRepositoryContract
{
    public function __construct(Solution $model)
    {
        parent::__construct($model);
    }
}
