
<?php
Route::get('/hello', function () {
    return response()
        ->json(['message' => 'Hello with CORS'])
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
});
?>