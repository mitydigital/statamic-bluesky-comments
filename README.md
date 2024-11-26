# Bluesky Comments for Statamic

<!-- statamic:hide -->

![Statamic 5](https://img.shields.io/badge/Statamic-5.0-FF269E?style=for-the-badge&link=https://statamic.com)
[![Bluesky Comments for Statamic on Packagist](https://img.shields.io/packagist/v/mitydigital/statamic-bluesky-comments?style=for-the-badge)](https://packagist.org/packages/mitydigital/statamic-bluesky-comments/stats)

---

<!-- /statamic:hide -->

> Attach a Bluesky thread to your Entries for a commenting system managed through Bluesky.

This is currently a work in progress.

Feedback and comments are welcome. Remember to be polite.

## Installation
```bash
composer require mitydigital/statamic-bluesky-comments
```

To get up and running you need a few things:
1. Blueprint field named `bluesky_thread_uri`
2. Add the `{{ bluesky_comments }}` tag to your layout where you want comments to appear

When an entry has a value for the `bluesky_thread_uri`, the `bluesky_comments` tag will render
the comment block.

Currently populating the `bluesky_thread_uri` is a manual step - future plans are to automate that
from within the Statamic CP.

You can get this from the direct link to your post (thread) on Bluesky.

The real-world workflow is currently manual:
1. Publish your entry
2. Manually create a post on Bluesky, and get its URI
3. Edit your entry and include the Bluesky Thread URI

Future updates will attempt to automate these 3 steps using an Action within the Statamic CP 
(so you can trigger it when you want, not just on publish). Stay tuned.

## Views

You don't need to publish views: but you can if you want to make changes.

```bash
php artisan vendor:publish --tag=statamic-bluesky-comments-views
```

### Layout

The `bluesky-comments.antlers.html` file includes the main layout for the Comments component.

### Comment Directive

The Comment Directive is used to recursively attach comments to the list, with styles
stored in one reusable area.

This is in the `bluesky-comments-alpine.antlers.html` file, and is the comment directive.

You'll see a template within this directive. You can freely change this to show whatever 
you need your layout to do. You do have access to the entire response from the Bluesky API too.

### Alpine logic

This is in the `bluesky-comments-alpine.antlers.html` file, and is the data definition.

## Features
- [x] the `bluesky_comments` frontend tag for rendering comments
- [ ] action for creating a Bluesky Thread from the Statamic CP

## Credits

Written for Statamic:
- [Marty Friedel](https://github.com/martyf)

Inspired by [Emily Liu](https://bsky.app/profile/emilyliu.me/post/3lbqta5lnck2i)

Icons are lovingly used from [HeroIcons](https://heroicons.com)