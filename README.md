![alt text](https://cdn.marshmallow-office.com/media/images/logo/marshmallow.transparent.red.png "marshmallow.")

# Laravel Breadcrumb
Laravel breadcrumb is a package that will make it easy to generate breadcrumbs in your Laravel application. If you use our Seoable package as well, then it will generate the structured data json for you as well.

### Installatie
```bash
composer require marshmallow/breadcrumb
```

## Usage
### Add a new crumb
To add a new crumb path you can use the breadcrumb facade.
```php
use Marshmallow\Breadcrumb\Facades\Breadcrumb;
Breadcrumb::add('Name', 'Full path (uri)', 'icon class (optional)');
```

### Render your breadcrumbs
```
{!! Breadcrumb::generate() !!}
```

### Publish
When you publish the breadcrumb package, all blade files will be available for you to change as you like.
```bash
php artisan vendor:publish --provider="Marshmallow\Breadcrumb\BreadcrumbServiceProvider"
```
