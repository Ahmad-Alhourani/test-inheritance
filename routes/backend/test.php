<?php

/**
 * Test Management
 * All route names are prefixed with 'admin.test'.
 */
Route::group(
    [
        'namespace' => 'Test',
        'middleware' => 'role:administrator'
    ],
    function () {
        /*
         * Test CRUD
         */
        Route::resource('test', 'TestController');
    }
);
