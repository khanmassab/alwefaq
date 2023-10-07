<?php
/**
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 1/4/20, 4:55 PM
 * Project Name: Wafaq
 * File Name: HtmlServiceProvider.php
 */

declare(strict_types=1);


namespace App\Providers;

use Collective\Html\FormBuilder;
use Collective\Html\HtmlBuilder;
use Collective\Html\HtmlServiceProvider as BaseHtmlServiceProvider;

final class HtmlServiceProvider extends BaseHtmlServiceProvider
{
    protected function registerHtmlBuilder()
    {
        $this->app->singleton('html', function ($app) {
            if (env('FORCE_SSL')) {
                $app['url']->forceScheme('https');
            }

            return new HtmlBuilder($app['url'], $app['view']);
        });
    }

    protected function registerFormBuilder()
    {
        $this->app->singleton('form', function ($app) {
            if (env('FORCE_SSL')) {
                $app['url']->forceScheme('https');
            }

            $form = new FormBuilder($app['html'], $app['url'], $app['view'], $app['session.store']->token());

            return $form->setSessionStore($app['session.store']);
        });
    }
}
