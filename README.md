![alt text](https://cdn.marshmallow-office.com/media/images/logo/marshmallow.transparent.red.png "marshmallow.")

# Marshmallow Breadcrumb
Dit is een handige package om gemakkelijk breadcrumbs op je laravel websites te krijgen. Hij is volledig te customizen qua templates. Deze kan je publiseren en daarna zelf inrichten. Met het config bestand kom je ook een heel eind dus misschien is het publiseren niet nodig.

### Installatie
```
composer require marshmallow/breadcrumb

php artisan breadcrumb:install
```

## Usage
### Add a crumb once
Er zijn 2 mogelijkheden om een kruimel toe te voegen aan het kruimelpad. De eerste is door gebruik te maken van de `Crumb` class in combinatie met de `Breadcrumn Facade`. Zie hieronder een voorbeeld:
```
use Marshmallow\Breadcrumb\Facades\Breadcrumb;
use Marshmallow\Breadcrumb\Crumb;

... 

Breadcrumb::addCrumb(
	(new Crumb)->setName('Shop')->setRoute(route('shop')),
);
```

### Add a crumb multiple times
It's also possible to create a helper class for a breadcrumb so it's easy to re-use. You can generate a class with the artisan command `php artisan breadcrumb:make ProductBreadcrumb`. This will generate a class for you wish you can re-use.

Helper class example
```
<?php

namespace App\Breadcrumbs;

use Marshmallow\Breadcrumb\Crumb;
use App\Models\Product;

class ProductBreadcrumb extends Crumb
{
	public function __construct (Product $product)
	{
		$this
				->setRoute(route('product', ['product' => $product]))
				->isCurrent(true)
				->setName($product->name);
	}
}
```

If you have created this class, it can always be re-used by calling it like this:
```
use Marshmallow\Breadcrumb\Facades\Breadcrumb;
use App\Breadcrumbs\ShopBreadcrumb;

...

Breadcrumb::addCrumb(
	new ShopBreadcrumb($product)
);
```

### Show your breadcrumbs in blade
```
{!! Breadcrumb::generate() !!}
```

### Template bestanden overschrijven
```
php artisan vendor:publish --provider="Marshmallow\Breadcrumb\BreadcrumbServiceProvider"
```

...