<?php

namespace App\Domain\Partner\Service;

use App\Domain\Partner\PartnerStoreDTO;
use App\Enum\StatusEnum;
use App\Models\Partner;

class PartnerService
{
    public function create(PartnerStoreDTO $partnerStoreDTO): Partner
    {
        $partner = new Partner();

        $this->setFields($partner, $partnerStoreDTO);

        return $partner;
    }

    public function update(Partner $partner, PartnerStoreDTO $partnerStoreDTO): void
    {
        $this->setFields($partner, $partnerStoreDTO);
    }

    public function publish(Partner $product): void
    {
        $product->status = StatusEnum::PUBLISHED;
        $product->save();
    }

    private function setFields(Partner $partner, PartnerStoreDTO $partnerStoreDTO): void
    {
        $partner->status = $partnerStoreDTO->status;
        $partner->name = $partnerStoreDTO->name;
        $partner->slug = $partnerStoreDTO->slug;
        $partner->sort = $partnerStoreDTO->sort;
        $partner->preview_text = $partnerStoreDTO->previewText;
        $partner->detail_text = $partnerStoreDTO->detailText;

        $partner->save();

        if ($partnerStoreDTO->previewPicture) {
            $partner->clearMediaCollection('preview_picture');
            $partner->addMedia($partnerStoreDTO->previewPicture)->toMediaCollection('preview_picture');
        }
        if (
            $partnerStoreDTO->detailPicture
            && $partnerStoreDTO->detailPicture != $partnerStoreDTO->previewPicture
        ) {
            $partner->clearMediaCollection('detail_picture');
            $partner->addMedia($partnerStoreDTO->detailPicture)->toMediaCollection('detail_picture');
        }
    }
}
