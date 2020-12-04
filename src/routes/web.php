<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\API\GamesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PhotoCommentController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ShowProfile;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\LazyCollection;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cache', function () {
    // $value = Cache::store('file')->get('foo');

    // Cache::store('redis')->put('bar', 'baz', 600); // 10 Minutes

    // $value = Cache::get('key');

    // $value = Cache::get('key', 'default');

    // $value = Cache::get('key', function () {
    //     return DB::table(...)->get();
    // })

    // if (Cache::has('key')) {
    //     //
    // }

    // $amount = 2;
    // Cache::increment('key');
    // Cache::increment('key', $amount);
    // Cache::decrement('key');
    // Cache::decrement('key', $amount);

    // $value = Cache::remember('users', $seconds, function () {
    //     return DB::table('users')->get();
    // });

    // $value = Cache::pull('key');

    // Cache::put('key', 'value', $seconds);
    // Cache::add('key', 'value', $seconds);
    // Cache::forever('key', 'value');

    // Cache::forget('key');
    // Cache::put('key', 'value', 0);
    // Cache::put('key', 'value', -5);
    // Cache::flush();

    // $value = cache('key');
    // cache(['key' => 'value'], $seconds);
    // cache(['key' => 'value'], now()->addMinutes(10));

    // cache()->remember('users', $seconds, function () {
    //   return DB::table('users')->get();
    // });

    // Cache::tags(['people', 'artists'])->put('John', $john, $seconds);
    // Cache::tags(['people', 'authors'])->put('Anne', $anne, $seconds);

    // $john = Cache::tags(['people', 'artists'])->get('John');
    // $anne = Cache::tags(['people', 'authors'])->get('Anne');

    // Cache::tags(['people', 'authors'])->flush();
    // Cache::tags('authors')->flush();

    // $lock = Cache::lock('foo', 10);

    // if ($lock->get()) {
    //     // Lock acquired for 10 seconds...

    //     $lock->release();
    // }

    // Cache::lock('foo')->get(function () {
    //   // Lock acquired indefinitely and automatically released...
    // });


    // $lock = Cache::lock('foo', 10);
    // try {
    //     $lock->block(5);

    //     // Lock acquired after waiting maximum of 5 seconds...
    // } catch (LockTimeoutException $e) {
    //     // Unable to acquire lock...
    // } finally {
    //     optional($lock)->release();
    // }

    // Cache::lock('foo', 10)->block(5, function () {
    //     // Lock acquired after waiting maximum of 5 seconds...
    // });

    // Within Controller...
    // $podcast = Podcast::find($id);

    // $lock = Cache::lock('foo', 120);

    // if ($result = $lock->get()) {
    //     ProcessPodcast::dispatch($podcast, $lock->owner());
    // }

    // // Within ProcessPodcast Job...
    // Cache::restoreLock('foo', $this->owner)->release();

    // Cache::lock('foo')->forceRelease();


    Cache::set('cache_key', 'cache_value');

    return Cache::get('cache_key');
});


// Route::get('/command', function () {
//     $exitCode = Artisan::call('email:send', [
//         'user' => 1, '--queue' => 'default'
//     ]);
// });

// Route::get('/command-queue', function () {
//     $exitCode = Artisan::queue('email:send', [
//         'user' => 1, '--queue' => 'default'
//     ]);
// });

// Route::get('/foo', function () {
//     $exitCode = Artisan::call('email:send', [
//         'user' => 1, '--id' => [5, 13]
//     ]);
// });

// $exitCode = Artisan::call('migrate:refresh', [
//     '--force' => true,
// ]);

// Route::get('controller', ShowProfile::class);
//Route::resource('photos', PhotoController::class);
// Route::resources([
//     'photos' => PhotoController::class,
//     'posts' => PostController::class,
// ]);

// Route::resource('photos', PhotoController::class)->only([
//     'index', 'show'
// ]);

// Route::resource('photos', PhotoController::class)->except([
//     'create', 'store', 'update', 'destroy'
// ]);

// Route::apiResource('photos', GamesController::class);

// Route::resource('photos.comments', PhotoCommentController::class); // /photos/{photo}/comments/{comment}

// Route::resource('photos.comments', CommentController::class)->shallow();

// Route::resource('photos.comments', PhotoCommentController::class)->scoped([
//     'comment' => 'slug',
// ]);

// Route::resource('users', AdminUserController::class)->parameters([
//     'users' => 'admin_user'
// ]); ///users/{admin_user}

// Route::resource('users.posts', PostsController::class)->scoped([
//     'post' => 'slug',
// ]);

Route::resource('posts', PostsController::class)->scoped([
    'post' => 'slug',
]);

Route::get('/collection', function () {
    $collection = collect(['taylor', 'abigail', null])->map(function ($name) {
      return strtoupper($name);
    })
    ->reject(function ($name) {
      return empty($name);
    });

    $collection = collect([1, 2, 3]);

    Collection::macro('toUpper', function () {
     return $this->map(function ($value) {
        return Str::upper($value);
      });
    });

    $collection = collect(['first', 'second'])->toUpper();

    $collection = collect([1, 2, 3])->all();

    $collection = collect([['foo' => 10], ['foo' => 10], ['foo' => 20], ['foo' => 40]])->avg('foo');

    $collection = $average = collect([1, 1, 2, 4])->avg();

    $collection = collect([1, 2, 3, 4, 5, 6, 7])->chunk(2)->all();

    $collection = collect(str_split('AABBCCCD'))->chunkWhile(function ($current, $key, $chunk) {
      return $current === $chunk->last();
    })->all();

    $collection = collect([[1, 2, 3], [4, 5, 6], [7, 8, 9]])->collapse();

    $collection = collect(['name', 'age'])->combine(['George', 29]);

    $collection = LazyCollection::make(function () {
        yield 1;
        yield 2;
        yield 3;
    })->collect()->all();

    $collection = collect(['John Doe'])->concat(['Jane Doe'])->concat(['name' => 'Johnny Doe']);

    $collection = collect(['name' => 'Desk', 'price' => 100])->contains('Desk');

    $collection = collect([
      ['product' => 'Desk', 'price' => 200],
      ['product' => 'Chair', 'price' => 100],
    ])->contains('product', 'Chair');

    $collection = collect([1, 2, 3, 4, 5])->contains(function ($value, $key) {
      return $value > 2;
    });

    $collection = collect([1, 2, 2, 2, 3])->countBy();

    $collection = collect(['alice@gmail.com', 'bob@yahoo.com', 'carlos@gmail.com'])->countBy(function ($email) {
      return substr(strrchr($email, "@"), 1);
    });

    $collection = collect([1, 2])->crossJoin(['a', 'b']);

    //$collection = collect(['John Doe', 'Jane Doe'])->dd();

    $collection = collect([1, 2, 3, 4, 5])->diff([2, 4, 6, 8]);

    $collection = collect([
      'color' => 'orange',
      'type' => 'fruit',
      'remain' => 6,
    ])->diffAssoc([
      'color' => 'yellow',
      'type' => 'fruit',
      'remain' => 3,
      'used' => 6,
    ]);

    $collection = collect([
      'one' => 10,
      'two' => 20,
      'three' => 30,
      'four' => 40,
      'five' => 50,
    ])->diffKeys([
      'two' => 2,
      'four' => 4,
      'six' => 6,
      'eight' => 8,
    ]);

    $collection = collect(['a', 'b', 'a', 'c', 'b'])->duplicates();

    $collection = collect([
      ['email' => 'abigail@example.com', 'position' => 'Developer'],
      ['email' => 'james@example.com', 'position' => 'Designer'],
      ['email' => 'victoria@example.com', 'position' => 'Developer'],
    ])->duplicates('position');

    $collection = collect([
      ['email' => 'abigail@example.com', 'position' => 'Developer'],
      ['email' => 'james@example.com', 'position' => 'Designer'],
      ['email' => 'victoria@example.com', 'position' => 'Developer'],
    ])->duplicatesStrict('position');

    $collection->each(function ($item, $key) {
        // if (/* some condition */) {
        //     return false;
        // }
    });

    $collection = collect([['John Doe', 35], ['Jane Doe', 33]])
      ->eachSpread(function ($name, $age) {
        dump($name, $age);
    });

    collect([1, 2, 3, 4])->every(function ($value, $key) {
      return $value > 2;
    });

    $collection = collect(['product_id' => 1, 'price' => 100, 'discount' => false])->except(['price', 'discount']);

    $collection = collect([1, 2, 3, 4])->filter(function ($value, $key) {
      return $value > 2;
    });

    $collection = collect([
      ['name' => 'Regena', 'age' => null],
      ['name' => 'Linda', 'age' => 14],
      ['name' => 'Diego', 'age' => 23],
      ['name' => 'Linda', 'age' => 84],
    ])->firstWhere('name', 'Linda');

    $collection = collect([
      ['name' => 'Sally'],
      ['school' => 'Arkansas'],
      ['age' => 28]
    ])->flatMap(function ($values) {
      return array_map('strtoupper', $values);
    });

    $collection = collect(['name' => 'taylor', 'languages' => ['php', 'javascript']])->flatten();

    $collection = collect([
      'Apple' => [
          ['name' => 'iPhone 6S', 'brand' => 'Apple'],
      ],
      'Samsung' => [
          ['name' => 'Galaxy S7', 'brand' => 'Samsung'],
      ],
    ])->flatten(1);

    $collection->dump();
});