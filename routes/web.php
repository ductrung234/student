use App\Http\Controllers\ScopeController;

Route::get('/scope/active', [ScopeController::class, 'testLocalScope']);
Route::get('/scope/all', [ScopeController::class, 'testGlobalScope']);