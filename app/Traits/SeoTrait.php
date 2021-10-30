<?php

namespace App\Traits;

use Artesaos\SEOTools\Facades\SEOTools;

trait SeoTrait {


    public function setSeoMeta($title, $description, $image) {
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addImage($image, ['size' => 300]);
    }
}


