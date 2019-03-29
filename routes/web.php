<?php
# File: app / Http / routes.php
if (\App::environment('local')) {
    \DB::enableQueryLog();
}

if (!function_exists('dump_query')) {
    function dump_query($last_query_only = true, $remove_back_ticks = true)
    {

        // location and line
        $caller = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
        $info = count($caller) ? sprintf("%s (%d)", $caller[0]['file'], $caller[0]['line']) : "*** Unable to parse location info. ***";

        // log of executed queries
        $logs = DB::getQueryLog();
        if (empty($logs) || !is_array($logs)) {
            $logs = "No SQL query found. *** Make sure you have enabled DB::enableQueryLog() ***";
        } else {
            $logs = $last_query_only ? array_pop($logs) : $logs;
        }

        // flatten bindings
        if (isset($logs['query'])) {
            $logs['query'] = $remove_back_ticks ? preg_replace("/`/", "", $logs['query']) : $logs['query'];

            // updating bindings
            $bindings = $logs['bindings'];
            if (!empty($bindings)) {
                $logs['query'] = preg_replace_callback('/\?/',
                    function ($match) use (& $bindings) {
                        return "'" . array_shift($bindings) . "'";
                    }, $logs['query']);
            }
        } else
            foreach ($logs as & $log) {
                $log['query'] = $remove_back_ticks ? preg_replace("/`/", "", $log['query']) : $log['query'];

                // updating bindings
                $bindings = $log['bindings'];
                if (!empty($bindings)) {
                    $log['query'] = preg_replace_callback(
                        '/\?/',
                        function ($match) use (& $bindings) {
                            return "'" . array_shift($bindings) . "'";
                        }, $log['query']
                    );
                }
            }

        // output
        $output = ["*FILE*" => $info,
            '*SQL*' => $logs
        ];

        dump($output);
    }
}

    /* Admin authentication */
    Route::get('/', 'CwAdmin\AuthenticateController@login');
    Route::get('/cwadmin', 'CwAdmin\AuthenticateController@login');
    Route::get('/cwadmin/login', 'CwAdmin\AuthenticateController@login');
    Route::post('/cwadmin/authenticate', 'CwAdmin\AuthenticateController@authenticate');
    Route::get('/cwadmin/logout', 'CwAdmin\AuthenticateController@logout');

    /* Password reset */
    Route::post('/cwadmin/reset/password/link', 'CwAdmin\AuthenticateController@send_email_link');
    Route::get('/cwadmin/reset/password/view/{email}', 'CwAdmin\AuthenticateController@view_reset_password');
    Route::post('/cwadmin/reset/password/save', 'CwAdmin\AuthenticateController@save_reset_password');

    Route::group(['middleware' => ['authenticate', 'authorize']], function () {
    Route::get('/cwadmin/not_authorized', function () {
        return view('auth.access_denied');
    });
    /* Admin profile update */
    Route::get('/cwadmin/profile', 'CwAdmin\ProfileController@edit');
    Route::post('/cwadmin/profile/update', 'CwAdmin\ProfileController@update');
    Route::post('/cwadmin/password/update', 'CwAdmin\ProfileController@update_password');
   

    /* Dashboard */
    Route::get('/cwadmin/dashboard', 'CwAdmin\DashboardController@dashboard');
   

    /* Users */
    Route::resource('/cwadmin/users', 'CwAdmin\CustomerController');
    Route::get('/cwadmin/user/create', 'CwAdmin\CustomerController@create');
    Route::post('/cwadmin/user/store', 'CwAdmin\CustomerController@store');
    Route::get('/cwadmin/user/edit/{id}', 'CwAdmin\CustomerController@edit');
    Route::post('/cwadmin/user/update', 'CwAdmin\CustomerController@update');
    Route::get('/cwadmin/user/view/{id}', 'CwAdmin\CustomerController@show');
    Route::get('/cwadmin/user/delete/{id}', 'CwAdmin\CustomerController@destroy');
    Route::get('/cwadmin/user/activate/{id}', 'CwAdmin\CustomerController@activate');
    Route::get('/cwadmin/user/deactivate/{id}', 'CwAdmin\CustomerController@deactivate');

    /* Category*/
    
     Route::get('/cwadmin/categories', 'CwAdmin\CategoryController@index');
     Route::get('/cwadmin/category/create', 'CwAdmin\CategoryController@create');
     Route::post('/cwadmin/category/store', 'CwAdmin\CategoryController@store');
     Route::get('/cwadmin/category/edit/{id}', 'CwAdmin\CategoryController@edit');
     Route::post('/cwadmin/category/update', 'CwAdmin\CategoryController@update');
     Route::get('/cwadmin/category/delete/{id}', 'CwAdmin\CategoryController@delete');

     /* Videos*/

     Route::get('/cwadmin/videos', 'CwAdmin\VideoController@index');
     Route::get('/cwadmin/video/create', 'CwAdmin\VideoController@create');
     Route::post('/cwadmin/video/store', 'CwAdmin\VideoController@store');
     Route::get('/cwadmin/video/view/{id}', 'CwAdmin\VideoController@view');
     Route::get('/cwadmin/video/activate/{id}', 'CwAdmin\VideoController@activate');
     Route::get('/cwadmin/video/deactivate/{id}', 'CwAdmin\VideoController@deactivate');
     Route::get('/cwadmin/video/edit/{id}', 'CwAdmin\VideoController@edit');
     Route::post('/cwadmin/video/update', 'CwAdmin\VideoController@update'); 
     Route::get('/cwadmin/video/delete/{id}', 'CwAdmin\VideoController@delete');
     Route::post('/cwadmin/video/search', 'CwAdmin\VideoController@search');









    

});
