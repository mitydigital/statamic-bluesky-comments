<?php

namespace MityDigital\StatamicBlueskyComments\Tags;

use Illuminate\Support\Facades\Log;
use Statamic\Facades\Blink;
use Statamic\Tags\Tags;

class BlueskyComments extends Tags
{
    public function index(): string
    {
        $bluesky_thread_uri = $this->context->get('bluesky_thread_uri', '');

        if (! $bluesky_thread_uri) {
            return '';
        }

        if (is_object($bluesky_thread_uri) && method_exists($bluesky_thread_uri, 'value')) {
            $bluesky_thread_uri = $bluesky_thread_uri->value();

            if (! $bluesky_thread_uri) {
                return '';
            }
        }

        preg_match('/https:\/\/bsky.app\/profile\/(\S+)\/post\/(\S+)/', $bluesky_thread_uri, $matches);
        if (count($matches) !== 3) {
            Log::error('Invalid Bluesky Thread URI provided: '.$bluesky_thread_uri);

            return '';
        }

        $comments = view('statamic-bluesky-comments::bluesky-comments', [
            'at_uri' => sprintf('at://%s/app.bsky.feed.post/%s', $matches[1], $matches[2]),
            'bluesky_thread_uri' => $bluesky_thread_uri,
        ]);

        $logic = '';
        if (! Blink::get('statamic-bluesky-comments-logic', false)) {
            $logic = view('statamic-bluesky-comments::bluesky-comments-alpine', []);
            Blink::put('statamic-bluesky-comments-logic', true);
        }

        return $comments.$logic;
    }
}
