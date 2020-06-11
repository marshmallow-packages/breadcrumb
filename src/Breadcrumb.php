<?php

namespace Marshmallow\Breadcrumb;

use Marshmallow\Breadcrumb\Crumb;
use Illuminate\Support\Collection;

class Breadcrumb
{
	protected $crumbs = [];

	public function __construct(array $config = [])
	{
		if (isset($config['default']) && is_array($config['default'])) {
			foreach ($config['default'] as $crumb) {
				$this->addCrumb($crumb);
			}
		}
	}

	public function addCrumbs(array $crumbs): void
	{
		foreach ($crumbs as $crumb) {
			$this->addCrumb($crumb);
		}
	}

	public function addCrumb(Crumb $crumb): void
	{
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
		return view('marshmallow::breadcrumb.container')->with([
			'breadcrumb' => $this->getCollection(),
			'config' => collect(
				config('breadcrumb')
			),
		]);
	}
}
