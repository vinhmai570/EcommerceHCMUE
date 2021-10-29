<?php

namespace App\Traits;

use Artesaos\SEOTools\Facades\SEOTools;

trait SeoTrait {

    public function setSeoMeta($title) {
        SEOTools::setTitle($title);
        SEOTools::setDescription('Free shipping on millions of items. Get the best of Shopping and Entertainment with Dama. Enjoy low prices and great deals on the largest selection of everyday essentials and other products technology, electronics, video games, and more');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addImage(asset('frontend/images/Dana-home1-banner-bottom.png'), ['size' => 300]);
    }
}
