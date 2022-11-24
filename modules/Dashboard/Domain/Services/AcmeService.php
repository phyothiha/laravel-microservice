<?php

namespace Meraki\Acme\Domain\Services;

use Meraki\Foundations\Domain\BaseService;
use Meraki\Acme\Infrastructure\Repositories\AcmeRepository;

class AcmeService extends BaseService
{
    public function __construct(
        protected AcmeRepository $AcmeRepository,
    ) {
        //
    }

    //
}
