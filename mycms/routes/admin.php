 <?php 
Route::prefix('/admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@getDashboard')->name('dashboard');

    //Module Users
    Route::get('/users/{status}', 'Admin\UserController@getUsers')->name('user_list');
    Route::get('/user/{id}/edit', 'Admin\UserController@getUsersEdit')->name('user_edit');
    Route::post('/user/{id}/edit', 'Admin\UserController@postUsersEdit')->name('user_edit');
    Route::get('/user/{id}/banned', 'Admin\UserController@getUsersBanned')->name('user_banned');
    Route::get('/user/{id}/permissions', 'Admin\UserController@getUsersPermissions')->name('user_permissions');
    Route::post('/user/{id}/permissions', 'Admin\UserController@postUsersPermissions')->name('user_permissions');



    //Module Products
    Route::get('/products/{status}', 'Admin\ProductController@getHome')->name('products');
    Route::get('/product/add', 'Admin\ProductController@getProductAdd')->name('product_add');
    Route::get('/product/{id}/edit', 'Admin\ProductController@getProductEdit')->name('product_edit');
    Route::get('/product/{id}/delete', 'Admin\ProductController@getProductDelete')->name('product_delete');
    Route::get('/product/{id}/restore', 'Admin\ProductController@getProductRestore')->name('product_delete');
    Route::post('/product/add', 'Admin\ProductController@postProductAdd')->name('product_add');
    Route::post('/product/search', 'Admin\ProductController@postProductSearch')->name('product_search');
    Route::post('/product/{id}/edit', 'Admin\ProductController@postProductEdit')->name('product_edit');
    Route::post('/product/{id}/gallery/add', 'Admin\ProductController@postProductGalleryAdd')->name('product_gallery_add');
    Route::get('/product/{id}/gallery/{gid}/delete', 'Admin\ProductController@getProductGalleryDelete')->name('product_gallery_delete');

    //Categories
    Route::get('/categories/{module}', 'Admin\CategoriesController@getHome')->name('categories');
    Route::post('/category/add', 'Admin\CategoriesController@postCategoryAdd')->name('category_add');
    Route::get('/category/{id}/edit', 'Admin\CategoriesController@getCategoryEdit')->name('category_edit');
    Route::post('/category/{id}/edit', 'Admin\CategoriesController@postCategoryEdit')->name('category_edit');
    Route::get('/category/{id}/delete', 'Admin\CategoriesController@getCategoryDelete')->name('category_delete');

});