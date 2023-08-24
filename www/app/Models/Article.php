<?php

namespace App\Models;

use App\Enum\StatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class Article extends DataModel
{
    use HasFactory, HasSEO;

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->name,
            description: $this->name
        );
    }
}
