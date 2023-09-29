<?php

namespace App\Domain\Partner;

use App\Enum\StatusEnum;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PartnerStoreDTO
{
    public function __construct(
        readonly public StatusEnum    $status,
        readonly public string        $name,
        readonly public string        $slug,
        readonly public string        $previewText,
        readonly public string        $detailText,
        readonly public int           $sort,
        readonly public ?UploadedFile $previewPicture,
        readonly public ?UploadedFile $detailPicture
    )
    {
    }
}
