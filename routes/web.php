<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustodyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ExportItemController;
use App\Http\Controllers\ImportItemController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceExportController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SubDepartmentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Models\CustodyProduct;
use App\Models\InvoiceExport;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', function () {
        return view('dashboard');
    });

    Route::resource('inventory/unit', UnitController::class);
    Route::resource('inventory/category', CategoryController::class);
    Route::resource('inventory/item', ItemController::class);
    Route::resource('inventory/store', StoreController::class);
    Route::resource('inventory/supplier', SupplierController::class);
    Route::resource('inventory/department', DepartmentController::class);
    Route::resource('inventory/sub_department', SubDepartmentController::class);
    Route::resource('inventory/invoice', InvoiceController::class);
    Route::resource('inventory/custody', CustodyController::class);
    Route::resource('inventory/invoice_export', InvoiceExportController::class);

    // **********************************************Repooooooooooooooortالتفارير *************************************************
    Route::get('totalreport', [ReportController::class, 'totalreport']);
    Route::post('searchbalance', [ReportController::class, 'searchbalance']);

    Route::get('/transactions_report', [ReportController::class, 'transactions_report'])->name('transactions_report');
    Route::get('/transactions/{itemId}', [ReportController::class, 'transactions'])->name('transactions');

    Route::get('/elgard', [ReportController::class, 'elgard'])->name('elgard');
    Route::post('/elgarditem', [ReportController::class, 'elgarditem']);


    //********************************************************************************************************* */
    Route::get('inventory/invoiceshow/{id}', [InvoiceController::class,'invoiceshow']);
    Route::get('inventory/exportshow/{id}', [InvoiceExportController::class,'exportshow']);
    Route::get('inventory/custodyshow/{id}', [CustodyController::class,'custodyshow']);
});
/**********************************************ايجاد القسم بناءا على الدائرة********************************* */
Route::get('/getdepartment/{id}', [CustodyController::class, 'getdepartments']);

Route::get('/getdepartment/{id}', [UserController::class, 'getdepartments']);

Route::get('/getdepartment/{id}', [RegisteredUserController::class, 'getdepartments']);

// Route::get('/get-sub-departments/{id}', [CustodyProduct::class, 'getSubDepartments']);


// *******************************************الحد الأدنى و الرصيد ***********************************************
Route::get('lowlimititem', [ItemController::class,'lowlimititem']);


Route::group(['middleware' => ['auth']], function () {

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);

});


Route::get('/{page}', [AdminController::class, 'index']);
