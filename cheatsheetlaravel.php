<?php
// Migration
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
    });
}

/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
    Schema::dropIfExists('users');
}



// Factory
// https://github.com/fzaninotto/Faker
use App\User;
$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

// Seeder
$users = factory(\App\User::class, 10)->create();

// Model
protected $fillable = [
    'name', 'email', 'password',
];
protected $table = 'userr';
protected $timestamps = false;

// COntroller
use Illuminate\Support\Facades\DB;
use App\userr;
$student = userr::all();
$users = DB::select('select * from userr');
return view('cobayield');
$this->middleware('auth');


// Middleware
public function handle($request, Closure $next)
{
    return $next($request);
}

// Route
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/userr', function (Request $request) {
    return $request->name."aaaaaaaaaa".$request->age;
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/student', 'StudentController@index');
Route::get('/mid', function (Request $request) {
    return $request->name.$request->color;
})->middleware('checkAge');
Route::get('/state/{id}', 'StateController@Index');
Route::get('/state/{id}/aa/{id2}', 'StateController@Index');
// Blade Parent
<h1>@yield('title')</h1>

<p align="center">
        <div id="app">
@section('isi')
    parent
@show
</div>
</p>
<script type="text/javascript" src={{ asset('js/app.js') }}></script>

// Blade Child
@extends('templateyield')

@section('title', 'aaaaaaaaaaaaaaaaaaa')

@section('isi')
@parent
izzzzy
<example-component></example-component>
@parent
@stop

// VueJS
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
// app.js
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// date format
$date = DateTime::createFromFormat('d/m/y', $model['date']);
                        $tgl = $date->format('Y-m-d');
