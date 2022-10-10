<?php

namespace Meraki\Acme\Infrastructure\Repositories;

use Meraki\Foundations\Infrastructure\BaseRepository;
use Meraki\Acme\Contracts\AcmeRepositoryContract;
use Meraki\Acme\Domain\Models\Acme;

class AcmeRepository extends BaseRepository implements AcmeRepositoryContract
{
    public function __construct(Acme $model)
    {
        parent::__construct($model);
    }
}
