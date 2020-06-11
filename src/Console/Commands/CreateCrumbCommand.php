<?php

namespace Marshmallow\Breadcrumb\Console\Commands;

use Illuminate\Console\Command;
use Marshmallow\Breadcrumb\Console\Commands\Traits\BreadcrumbCommand;

class CreateCrumbCommand extends Command
{
	use BreadcrumbCommand;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'breadcrumb:make {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new breadcrumb so it can be re-used easily.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->makeBreadcrumbFolder();

        $class_name = $this->argument('name') . '.php';
        $breadcrumb_class = $this->getCrumbClassPath() . '/' . $class_name;
        if (file_exists($breadcrumb_class)) {
            $this->error($this->argument('name') . ' already exists.');
        }

        $stub = $this->getStub('Crumb');
        $stub = str_replace('{{crumbname}}', $this->argument('name'), $stub);
        file_put_contents($breadcrumb_class, $stub);

        $this->info($class_name . ' is created.');
    }
}
