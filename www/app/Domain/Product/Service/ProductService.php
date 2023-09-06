<?php

namespace App\Domain\Product\Service;

use App\Domain\Product\ProductStoreDTO;
use App\Enum\StatusEnum;
use App\Models\Product;

class ProductService
{
    public function create(ProductStoreDTO $productStoreDTO): Product
    {
        $product = new Product();

        $this->setFields($product, $productStoreDTO);

        return $product;
    }

    public function update(Product $product, ProductStoreDTO $productStoreDTO): void
    {
        $this->setFields($product, $productStoreDTO);
    }

    public function publish(Product $product): void
    {
        $product->status = StatusEnum::PUBLISHED;
        $product->save();
    }

    private function setFields(Product $product, ProductStoreDTO $productStoreDTO): void
    {
        $product->status = $productStoreDTO->status;
        $product->name = $productStoreDTO->name;
        $product->slug = $productStoreDTO->slug;
        $product->sort = $productStoreDTO->sort;
        $product->preview_text = $productStoreDTO->previewText;
        $product->detail_text = $productStoreDTO->detailText;
        $product->external_link = $productStoreDTO->link;

        $product->save();

        if ($productStoreDTO->previewPicture) {
            $product->clearMediaCollection('preview_picture');
            $product->addMedia($productStoreDTO->previewPicture)->toMediaCollection('preview_picture');
        }
        if (
            $productStoreDTO->detailPicture
            && $productStoreDTO->detailPicture != $productStoreDTO->previewPicture
        ) {
            $product->clearMediaCollection('detail_picture');
            $product->addMedia($productStoreDTO->detailPicture)->toMediaCollection('detail_picture');
        }
    }
}
