### Minimal working example

This repository contains a minimal working example to showcase the behavior of Ziggy's model binding.
The setup is a `Laravel` project with `Breeze` using `InertiaJS` and `React`; installation steps according to the official documentation.

#### Issue under test

The issue inspected here is that the model bindings are not generated as expected.
They are either not complete or not present at all when using `getRouteKeyName()`.

A work-around is to define the keys in the route defintion.

### Setup

-   checkout the repository
-   `cd` into the folder
-   run `composer install`
-   define a database configuration in the `.env` file, e.g. Sqlite
-   run `php artisan migrate`
-   (optional) run `npm install`

### Showcase

When the setup steps are done. Have a look at `routes/web.php` to get an impression of the route configuration.
Then run

-   `php artisan route:cache`
-   `php artisan ziggy:generate`

Inspect the generated configuration at `resources/js/ziggy.js`.
Check if the expected bindings `organization: 'slug'` and `registration_token: 'token'` appear as defined by the models through exposing a key via `getRouteKeyName()`.
