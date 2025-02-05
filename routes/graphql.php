<?php
use Nuwave\Lighthouse\Support\Http\Controllers\GraphQLController;

Route::post('/graphql', [GraphQLController::class, 'query']);
