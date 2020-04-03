<?php

namespace Marshmallow\Breadcrumb\App\Console\Commands;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Marshmallow\Breadcrumb\App\Console\Commands\Traits\BreadcrumbCommand;

class InstallCommand extends Command
{
    use BreadcrumbCommand;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'breadcrumb:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install breadcrumb functionality and defaults.';

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
     * @return mixed
     */
    public function handle()
    {
        $this->makeBreadcrumbFolder();
        $this->makeHomeBreadcrumbClass();

        Artisan::call('vendor:publish', [
            '--provider' => 'Marshmallow\Breadcrumb\BreadcrumbServiceProvider',
            '--tag' => ['config'],
            '--force' => true,
        ]);

        $this->info('Installation is done :).');
    }

    private function makeHomeBreadcrumbClass ()
    {
        $class_name = 'HomeBreadcrumb.php';
        $home_breadcrumb = $this->getCrumbClassPath() . '/' . $class_name;
        if (file_exists($home_breadcrumb)) {
            if (!$this->confirm('HomeBreadcrumb bestaat al, wil je deze opnieuw aanmaken? [yes|no]')) {
                return;
            }
        }
        
        file_put_contents($home_breadcrumb, $this->getStub('HomeCrumb'));
    }
}
