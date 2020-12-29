<?php

namespace Marshmallow\Breadcrumb;

use Illuminate\Support\Collection;
use Marshmallow\Seoable\Facades\Seo;
use Marshmallow\Seoable\Helpers\Schemas\SchemaListItem;

class Breadcrumb
{
    protected $crumbs = [];

    public function add($name, $url, $icon = null)
    {
        $crumb = Crumb::make($name, $url);
        if ($icon) {
            $crumb->setIconClass($icon);
        }

        $this->addCrumb($crumb);
    }

    public function addCrumbs(array $crumbs): void
    {
        foreach ($crumbs as $crumb) {
            $this->addCrumb($crumb);
        }
    }

    public function addCrumb(Crumb $crumb): void
    {
        if (class_exists(Seo::class)) {

            /**
             * Add this to the breadcrumb schema if we are
             * using the Marshmallow Seoable package.
             */
            $list_item = SchemaListItem::make($crumb->name);
            $list_item->url($crumb->url);
            Seo::addBreadcrumb($list_item);
        }

        /**
         * Add this to the crumbs array so we can output
         * this in the breadcrumb view template.
         */
        $this->crumbs[] = $crumb;
    }

    protected function getCollection(): Collection
    {
        return collect(
            $this->crumbs
        );
    }

    public function generate()
    {
        return view(config('breadcrumb.view'))->with([
            'breadcrumb' => $this->getCollection(),
            'config' => collect(
                config('breadcrumb')
            ),
        ]);
    }
}
