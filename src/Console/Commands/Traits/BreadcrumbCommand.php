<?php

namespace Marshmallow\Breadcrumb\Console\Commands\Traits;

trait BreadcrumbCommand
{
    protected function makeBreadcrumbFolder()
    {
        if (! file_exists($this->getCrumbClassPath())) {
            mkdir($this->getCrumbClassPath());
        }
    }

    protected function getStub($stub)
    {
        return file_get_contents(__dir__ . '/../../../resources/stubs/'. $stub .'.stub');
    }

    protected function getCrumbClassPath()
    {
        return app_path('Breadcrumbs');
    }
}
