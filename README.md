![alt text](https://cdn.marshmallow-office.com/media/images/logo/marshmallow.transparent.red.png "marshmallow.")

# Laravel Breadcrumb

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marshmallow/breadcrumb.svg?style=flat-square)](https://packagist.org/packages/marshmallow/breadcrumb)
[![Total Downloads](https://img.shields.io/packagist/dt/marshmallow/breadcrumb.svg?style=flat-square)](https://packagist.org/packages/marshmallow/breadcrumb)

Laravel Breadcrumb makes it easy to generate breadcrumbs in your Laravel application. You can configure a default crumb, add crumbs on the fly, and render them through fully publishable Blade templates. If you also use our [Seoable](https://github.com/marshmallow-packages/seoable) package, it will generate the breadcrumb structured-data JSON for you automatically.

## Installation

Install the package via Composer:

```bash
composer require marshmallow/breadcrumb
```

The service provider and the `Breadcrumb` facade alias are registered automatically through Laravel package discovery.

Publish the config file:

```bash
php artisan vendor:publish --tag="config" --provider="Marshmallow\Breadcrumb\BreadcrumbServiceProvider"
```

Publish the Blade views so you can change the markup to your liking:

```bash
php artisan vendor:publish --provider="Marshmallow\Breadcrumb\BreadcrumbServiceProvider"
```

The views are published to `resources/views/vendor/marshmallow/breadcrumb`.

## Usage

### Add a crumb

Use the `Breadcrumb` facade to add a crumb. The icon class is optional.

```php
use Marshmallow\Breadcrumb\Facades\Breadcrumb;

Breadcrumb::add('Blog', '/blog');
Breadcrumb::add('My article', '/blog/my-article', 'fas fa-newspaper');
```

A default crumb (configured under `breadcrumb.default`) is added for you when the breadcrumb is resolved, so you usually only add the crumbs that come after it.

### Add multiple crumbs

You can build `Crumb` instances yourself and add them in bulk:

```php
use Marshmallow\Breadcrumb\Crumb;
use Marshmallow\Breadcrumb\Facades\Breadcrumb;

Breadcrumb::addCrumbs([
    Crumb::make('Blog', '/blog'),
    Crumb::make('My article', '/blog/my-article'),
]);
```

The `Crumb` class also lets you resolve the URL from a named route and set an icon:

```php
use Marshmallow\Breadcrumb\Crumb;

$crumb = Crumb::make('My article', '/blog/my-article')
    ->setRoute('blog.show', ['article' => $article])
    ->setIconClass('fas fa-newspaper');
```

When a crumb's URL matches the current request, it is automatically flagged as the current (active) crumb.

### Render the breadcrumbs

Render the breadcrumbs in your Blade view:

```blade
{!! Breadcrumb::generate() !!}
```

## Configuration

After publishing, the configuration lives in `config/breadcrumb.php`.

| Key | Default | Description |
| --- | --- | --- |
| `default.name` | `'Home'` | Name of the default crumb prepended to every breadcrumb. |
| `default.url` | `env('APP_URL')` | URL of the default crumb. |
| `default.icon` | `'fas fa-home'` | Icon class of the default crumb. |
| `view` | `'marshmallow::breadcrumb.container'` | The view used to render the breadcrumb. |
| `classes.container` | `'breadcrumb-container'` | CSS class for the container element. |
| `classes.list` | `'breadcrumb-list'` | CSS class for the list element. |
| `classes.item` | `'breadcrumb-item'` | CSS class for each item. |
| `classes.link` | `'breadcrumb-link'` | CSS class for each link. |
| `classes.icon` | `'breadcrumb-icon'` | CSS class for each icon. |
| `classes.active_item` | `'active-item'` | CSS class for the active item. |
| `classes.active_link` | `'active-link'` | CSS class for the active link. |

## Security Vulnerabilities

Please report security vulnerabilities by email to [stef@marshmallow.dev](mailto:stef@marshmallow.dev) rather than via the public issue tracker.

## Credits

- [Stef](https://marshmallow.dev)
- [All Contributors](https://github.com/marshmallow-packages/breadcrumb/contributors)

## License

The MIT License. Please see the [License File](LICENSE) for more information.
