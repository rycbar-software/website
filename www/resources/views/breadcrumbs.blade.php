@unless ($breadcrumbs->isEmpty())
    <nav class="breadcrumbs">
        <ol class="breadcrumbs__list" itemscope itemtype="https://schema.org/BreadcrumbList">
            @foreach ($breadcrumbs as $key => $breadcrumb)
                @if ($breadcrumb->url && !$loop->last)
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a href="{{ $breadcrumb->url }}" itemprop="item" class="link link--blue">
                            <span itemprop="name">{{ $breadcrumb->title }}</span>
                            <meta itemprop="position" content="{{ $key + 1 }}" />
                        </a>
                    </li>
                @else
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <span>
                            <span itemprop="name">{{ $breadcrumb->title }}</span>
                            <meta itemprop="position" content="{{ $key + 1 }}" />
                        </span>
                    </li>
                @endif

                @unless($loop->last)
                    <li>&nbsp;/&nbsp;</li>
                @endif

            @endforeach
        </ol>
    </nav>
@endunless
