<?php

namespace Meraki\Attachment\Infrastructure\Repositories;

use Meraki\Foundations\Infrastructure\BaseRepository;
use Meraki\Attachment\Contracts\AttachmentRepositoryContract;
use Meraki\Attachment\Domain\Models\Attachment;

class AttachmentRepository extends BaseRepository implements AttachmentRepositoryContract
{
    public function __construct(Attachment $model)
    {
        parent::__construct($model);
    }
}
