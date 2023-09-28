@unless ($breadcrumbs->isEmpty())
    <nav class="container">
        <ol class="py-4 flex flex-wrap text-sm text-gray-800" itemscope itemtype="https://schema.org/BreadcrumbList">
            @foreach ($breadcrumbs as $key => $breadcrumb)
                @if ($breadcrumb->url && !$loop->last)
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a href="{{ $breadcrumb->url }}" itemprop="item" class="text-blue-600 hover:text-blue-900 hover:underline focus:text-blue-900 focus:underline">
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
                    <li class="text-gray-500 px-2">
                        /
                    </li>
                @endif

            @endforeach
        </ol>
    </nav>
@endunless
