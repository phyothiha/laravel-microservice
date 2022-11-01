<?php

namespace Meraki\Attachment\Domain\Services;

use Meraki\Foundations\Domain\BaseService;
use Meraki\Attachment\Infrastructure\Repositories\AttachmentRepository;

class AttachmentService extends BaseService
{
    public function __construct(
        protected AttachmentRepository $attachmentRepository,
    ) {
        //
    }

    //
}
