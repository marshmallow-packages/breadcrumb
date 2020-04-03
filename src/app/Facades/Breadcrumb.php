<?php 

namespace Marshmallow\Breadcrumb\Facades;

/**
 * @method static \Barryvdh\Debugbar\LaravelDebugbar addCollector(\DebugBar\DataCollector\DataCollectorInterface $collector)
 * @method static void addMessage(mixed $message, string $label = 'info')
 * @method static void alert(string $message)
 * @method static void critical(string $message)
 * @method static void debug(string $message)
 * @method static void emergency(string $message)
 * @method static void error(string $message)
 * @method static \Barryvdh\Debugbar\LaravelDebugbar getCollector(string $name)
 * @method static bool hasCollector(string $name)
 * @method static void info(string $message)
 * @method static void log(string $message)
 * @method static void notice(string $message)
 * @method static void warning(string $message)
 *
 * @see \Barryvdh\Debugbar\LaravelDebugbar
 */
class Breadcrumb extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return \Marshmallow\Breadcrumb\Breadcrumb::class;
    }
}