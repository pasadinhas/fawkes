<?php

return [

    'storage' => 'Session',

    'consumers' => [

        'FenixEdu' => [
            'client_id' => getenv('laravel-oauth.consumers.FenixEdu.client_id'),
            'client_secret' => getenv('laravel-oauth.consumers.FenixEdu.client_secret'),
            'redirect_url' => getenv('laravel-oauth.consumers.FenixEdu.redirect_url')
        ]

    ]

];