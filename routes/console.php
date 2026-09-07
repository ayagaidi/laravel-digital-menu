<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('menu:about', function () {
    $this->info('Laravel Digital Menu by Aya Aljaidi');
})->purpose('Show project information');
