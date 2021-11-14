    <?php

    use App\Http\Controllers\AdminCategoryController;
    use App\Http\Controllers\AdminPostController;
    use App\Http\Controllers\AdminUserController;
    use App\Http\Controllers\NewsletterController;
    use App\Http\Controllers\ProfilesController;
    use App\Services\MailchimpNewsletter;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PostController;
    use App\Http\Controllers\PostCommentsController;
    use App\Http\Controllers\RegisterController;
    use App\Http\Controllers\SessionsController;

    Route::get('profiles/create', [ProfilesController::class, 'create'])->middleware('auth');
    Route::get('profiles/{profile}', [ProfilesController::class, 'show'])->middleware('auth');
    Route::get('profiles/{profile}/edit', [ProfilesController::class, 'edit'])->middleware('auth');
    Route::patch('profiles/{profile}', [ProfilesController::class, 'update'])->middleware('auth');

    Route::get('/', [PostController::class, 'index'])->name('home');

    Route::get('posts/{post:slug}', [PostController::class, 'show']);
    Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

    Route::post('newsletter',NewsletterController::class);

    Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
    Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

    Route::get('login',[SessionsController::class, 'create'])->middleware('guest');
    Route::post('sessions',[SessionsController::class, 'store'])->middleware('guest');

    Route::post('logout',[SessionsController::class, 'destroy'])->middleware('auth');

    Route::middleware('admin')->group(function () {

        Route::get('admin/posts/create', [AdminPostController::class, 'create']);
        Route::post('admin/posts', [AdminPostController::class, 'store']);
        Route::get('admin/posts',[AdminPostController::class, 'index']);
        Route::get('admin/posts/{post}/edit',[AdminPostController::class, 'edit']);
        Route::patch('admin/posts/{post}',[AdminPostController::class, 'update']);
        Route::delete('admin/posts/{post}',[AdminPostController::class, 'destroy']);

        Route::get('admin/categories/create', [AdminCategoryController::class, 'create']);
        Route::post('admin/categories', [AdminCategoryController::class, 'store']);
        Route::get('admin/categories',[AdminCategoryController::class, 'index']);
        Route::get('admin/categories/{category}/edit',[AdminCategoryController::class, 'edit']);
        Route::patch('admin/categories/{category}',[AdminCategoryController::class, 'update']);
        Route::delete('admin/categories/{category}',[AdminCategoryController::class, 'destroy']);

        Route::get('admin/users',[AdminUserController::class, 'index']);
        Route::patch('admin/users/{user}',[AdminUserController::class, 'update']);
        Route::delete('admin/users/{user}',[AdminUserController::class, 'destroy']);

    });



