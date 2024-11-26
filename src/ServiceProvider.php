<?php

namespace MityDigital\StatamicBlueskyComments;

use MityDigital\StatamicBlueskyComments\Tags\BlueskyComments;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $tags = [
        BlueskyComments::class,
    ];

    public function bootAddon()
    {
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/statamic-bluesky-comments'),
        ], 'statamic-bluesky-comments-views');
    }
}
