<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Illuminate\Support\Carbon;
use Spatie\Sitemap\Tags\Url;
use App\Models\Product;

class CreateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = Sitemap::create()
                    ->add(Url::create('/home'))
                    ->add(Url::create('/products/search'))
                    ->add(Url::create('/carts'));

        Product::all()->each(function (Product $product) use ($sitemap) {
            $sitemap->add(Url::create("/products/{$product->slug}"));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        return Command::SUCCESS;
    }
}
