<?php

declare(strict_types=1);

use function Pest\Laravel\get;

it('has a welcome page', function () {
    get(route('welcome'))->assertOk();
});
