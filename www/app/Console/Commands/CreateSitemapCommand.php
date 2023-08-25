<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Partner;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Url;

class CreateSitemapCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        SitemapIndex::create()
            ->add($this->generateStaticSitemap())
            ->add($this->generateEntitySitemap('articles', Article::all()))
            ->add($this->generateEntitySitemap('partners', Partner::all()))
            ->add($this->generateEntitySitemap('products', Product::all()))
            ->writeToFile(public_path('/sitemap.xml'));
    }

    private function generateStaticSitemap(): string
    {
        $path = '/sitemap_files.xml';

        $files = [
            '/',
            '/contacts'
        ];
        foreach ($files as $file) {
            $sitemap = Sitemap::create()->add(
                Url::create($file)
                    ->setLastModificationDate(Carbon::create('2023', '8', '25'))
                    ->setPriority(1.0)
            );
        }
        $sitemap->writeToFile(public_path($path));

        return $path;
    }

    private function generateEntitySitemap(string $entityName, Collection $entities): string
    {
        $path = '/sitemap_'.$entityName.'.xml';

        $sitemap = Sitemap::create()->add(
            Url::create(route($entityName . '.index'))
                ->setLastModificationDate(Carbon::create('2023', '8', '25'))
                ->setPriority(1.0)
        );
        foreach ($entities as $entity) {
            $sitemap->add(
                Url::create(route($entityName . '.show', [$entity]))->setLastModificationDate($entity->updated_at)
            );
        }
        $sitemap->writeToFile(public_path($path));

        return $path;
    }
}
