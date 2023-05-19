<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BonVenteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\fraisController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\MagazinController;
use App\Http\Controllers\ActivationController;
use App\Price ;
Route::redirect('/','/login');

// Route::get('/activation', [DashboardController::class,'notActivated'])->name('notActivated');

// Route::post('/activation', [ActivationController::class,'activate'])->name('activation.activate');

// Route::middleware(['auth','chekcActivation'])->group(function(){
Route::middleware(['auth'])->group(function(){

   Route::get('/fixBug',function(){
      $pr = Price::where('id',110)->first();
      $pr->update([
         'prixVenteGros' => 0.0,
      ]);
      $pr->update([
         'prixVenteGros' => 41000.0,
      ]);

   });

   Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

         Route::prefix('backoffice/product')->group(function(){
            Route::name('product.')->group(function(){
                  Route::get('/remove/{product}',[ProductController::class,'Remove'])->name('remove');
                  Route::get('/removed',[ProductController::class,'Removed'])->name('removed');
                  Route::get('/restore/{id}',[ProductController::class,'Restore'])->name('restore');
                  Route::get('/delete/{product}',[ProductController::class,'Delete'])->name('delete');
                  Route::get('/remise',[ProductController::class,'Remise'])->name('remise');
                  Route::get('/endDiscount/{product}',[ProductController::class,'endDiscount'])->name('endDiscount');
                  Route::post('/remise/{product}',[ProductController::class,'RemisePrix'])->name('remisePrix');
            });
         });

         Route::prefix('backoffice/facture')->group(function(){
            Route::name('bonVente.')->group(function(){
                  Route::get('/',[BonVenteController::class,'index'])->name('index');
                  Route::get('/{bonVente}/details',[BonVenteController::class,'details'])->name('details');
                  Route::post('/{bonVente}/versement/',[BonVenteController::class,'versement'])->name('versement');
                  Route::get('/removeProduct/{bonVente}/{product}',[BonVenteController::class,'removeProduct'])->name('removeProduct');
                  Route::post('/editQuantite/{bonVente}/{product}',[BonVenteController::class,'editQuantite'])->name('editQuantite');
                  Route::get('/{bonVente}/removeBon',[BonVenteController::class,'removeBonVente'])->name('remove');
                  Route::get('telecharger/{bonVente}',[BonVenteController::class,'Telecharge'])->name('telecharge');
                  Route::get('/{bonVente}/client',[BonVenteController::class,'addClient'])->name('addClient');
                  Route::patch('/client',[BonVenteController::class,'saveClient'])->name('saveClient');
            });
         });

         Route::prefix('backoffice')->group(function(){
                  Route::resource('/client',ClientController::class);
                  Route::resource('/category',CategoryController::class);
                  Route::resource('/marque',MarqueController::class);
                  Route::resource('/product',ProductController::class);
                  Route::resource('/stock',StockController::class);
                  Route::resource('/statistique',StatistiqueController::class);
                  Route::resource('/fournisseur',FournisseurController::class);
                  Route::get('/fournisseur/{fournisseur}/transaction/list',[TransactionController::class,'List'])->name('transaction.list');
                  Route::resource('/fournisseur/{fournisseur}/transaction',TransactionController::class);

                  Route::get('/client/{client}/supprime',[ClientController::class,'Supprime']);
                  Route::get('/marque/{marque}/supprime',[MarqueController::class,'Supprime']);
                  Route::get('/category/{category}/supprime',[CategoryController::class,'Supprime']);
                  Route::get('/fournisseur/{fournisseur}/supprime',[FournisseurController::class,'Supprime']);
                  Route::get('/transaction/{transaction}/supprime',[TransactionController::class,'supprime']);
                  Route::get('/transaction/{transaction}/supprime',[TransactionController::class,'supprime']);

                  Route::post('/stock/{product}/add',[StockController::class,'AddQuantite']);
                  Route::patch('/stock/{product}/edit',[StockController::class,'UpdateQuantite']);

               Route::get('/marque/{marque}/products',[MarqueController::class,'products'])->name('marque.products');
               Route::get('/category/{category}/products',[CategoryController::class,'products'])->name('category.products');

         });

         Route::prefix('backoffice/magazin')->group(function(){
            Route::name('magazin.')->group(function(){
               Route::get('/profile',[MagazinController::class,'profile'])->name('profile');
               Route::patch('/profile/{magazin}',[MagazinController::class,'update'])->name('updateProfile');

            });

         });

         Route::get('/users/{user}/supprime',[UserController::class,'supprime'])->name('user.supprime');


         Route::resource('/employee',EmployeController::class);
         Route::resource('/users',UserController::class);
         Route::resource('/frais',fraisController::class);

         Route::get('/frais/{frais}/supprime',[fraisController::class,'supprime'])->name('frais.supprime');
         Route::get('/employee/{employe}/supprime',[EmployeController::class,'Supprime'])->name('employee.supprime');

         Route::prefix('backoffice/vente')->group(function(){
            Route::name('vente.')->group(function(){
               Route::get('/',[VenteController::class,'VenteGros'])->name('gros');
               Route::get('/selectProduct/client/{client}',[VenteController::class,'selectProduct'])->name('selectProduct');
               
            });
            Route::name('facilite.')->group(function(){
               Route::get('/facilite',[VenteController::class,'facilite'])->name('index');
               Route::get('/facilite/{bonVente}/versement',[VenteController::class,'versement'])->name('versement');
               Route::post('/facilite/{bonVente}/versement',[VenteController::class,'versementMontant'])->name('versement');
               Route::get('/facilite/{bonVente}/telecharge',[VenteController::class,'telechargerBonVente'])->name('telecharger');
            });
         });

});
require __DIR__.'/auth.php';
