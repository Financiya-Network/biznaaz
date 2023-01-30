<?php

return [
    // Safe Mode
    'safeMode' => false,

    // HSTS Strict-Transport-Security
    'hsts' => [
        'enabled' => true,
    ],

    // Content Security Policy
    'csp' => [
        'default-src' => [
            '*',
            'https://www.google.com',
            'https://www.gstatic.com'
        ],
        'script-src' => [
            'self',
            'unsafe-inline', // Allow inline script
            'unsafe-eval',
            'https://www.google.com',
            'https://www.gstatic.com',
            'https://connect.facebook.net',
            'https://code.highcharts.com',
            'https://ajax.cloudflare.com',
             'https://cdnjs.cloudflare.com',
            'https://v2.zopim.com',
            'http://cdnjs.cloudflare.com',
            'https://www.youtube.com',
            'https://s.ytimg.com',
            'https://www.iplocate.io',
            'https://static.zdassets.com',
        ],
        'img-src' => [
            '*', // Allow images from anywhere
            'self data:'
        ],
        'style-src' => [
            'self',
            'unsafe-inline', // Allow inline styles
            'https://fonts.googleapis.com', // Allow stylesheets from Google Fonts
            'https://cdnjs.cloudflare.com',
            'http://cdnjs.cloudflare.com'
        ],
        'font-src' => [
            'self',
            'https://fonts.gstatic.com', // Allow fonts from the Google Fonts CDN
            'https://v2.zopim.com',
            'self data:'
        ],
    ],
];