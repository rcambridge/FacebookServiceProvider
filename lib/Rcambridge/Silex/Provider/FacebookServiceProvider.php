<?php

/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this file,
 * You can obtain one at http://mozilla.org/MPL/2.0/. */

namespace Rcambridge\Silex\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

use Rcambridge\Silex\Api\Facebook;

class FacebookServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['facebook'] = $app->share(function () use ($app) {
            return new Facebook(array(
                'appId'  => $app['facebook.app_id'],
                'secret' => $app['facebook.secret'],
                'app'    => $app,
            ));
        });
    }

    public function boot(Application $app)
    {
    }
}
