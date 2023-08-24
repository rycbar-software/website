<?php

namespace App\Models;

use RalphJSmit\Laravel\SEO\Support\SEOData;

class Product extends DataModel
{
    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->name,
            description: $this->name
        );
    }
}
