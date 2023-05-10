<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Web Hook URL for slack
    |--------------------------------------------------------------------------
    |
    | This configuration option defines the web hook url  that will be used as
    | the route notification for user model.
    |
    */
    'web_hook_url' => env('SLACK_WEB_HOOK_URL',''),
];
