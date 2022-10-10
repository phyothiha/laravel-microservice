<?php

namespace Meraki\Foundations\Providers;

use Illuminate\Support\ServiceProvider;
use Meraki\Foundations\Contracts\BaseRepositoryInterface;
use Meraki\Foundations\Infrastructure\BaseRepository;

class BaseServiceProvider extends ServiceProvider
{
    public $bindings = [
        BaseRepositoryInterface::class => BaseRepository::class,
    ];
}
