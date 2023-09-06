<?php

namespace App\Domain\Product;

use App\Enum\StatusEnum;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProductStoreDTO
{
    public function __construct(
        readonly public StatusEnum    $status,
        readonly public string        $name,
        readonly public string        $slug,
        readonly public string        $previewText,
        readonly public string        $detailText,
        readonly public int           $sort,
        readonly public string        $link,
        readonly public ?UploadedFile $previewPicture,
        readonly public ?UploadedFile $detailPicture
    )
    {
    }
}
