<?php

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
    // return view('welcome');
    return redirect()->route('login'); 
});
// Auth::routes();
// 
 Route::get('/', 'Frontend\homeController@index');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset'); 


// BACKEND
App::setLocale("es");

Route::resource('usuarios','Auth\RegisterController');

Route::namespace('Backend')->middleware(['middleware' => 'auth'])->group(function(){

  Route::resource('sliders','SliderController');
  Route::resource('noticias','NoticiasController');
  Route::resource('newsletter','NewsletterController');
  Route::resource('solicitud','SolicitudController');
  Route::resource('categorias','CategoriasController');
  Route::resource('preguntas','PreguntasController');
  Route::resource('registros','RegistroUsuariosController')->only('index');
  Route::resource('pagos','PagosController')->only('index');
  Route::resource('vehiculos','VehiculoController');
  // Galeria vehiculos
  Route::get('vehiculo/{id}/fotos', 'VehiculoController@indexFotos')
    ->name('vehiculos.fotos.index');
  Route::get('vehiculo/{id}/fotos/create', 'VehiculoController@createFotos')
    ->name('vehiculos.fotos.create');
  Route::post('vehiculo/{id}/fotos', 'VehiculoController@storeFotos')
    ->name('vehiculos.fotos.store');
  Route::delete('vehiculo/{id}/fotos', 'VehiculoController@destroyFoto')
    ->name('vehiculos.fotos.destroy');
  // Daños
  Route::get('vehiculo/{id}/daños', 'VehiculoController@indexDanos')
    ->name('vehiculos.daños.index');
  Route::post('vehiculo/{id}/daños', 'VehiculoController@storeDanos')
    ->name('vehiculos.daños.store');
  // Parametrizar
  Route::prefix('parametrizar')->namespace('Parametros')->group(function(){
    Route::resource('marcas','MarcaController')->except('create', 'show');
    Route::resource('modelos','ModeloController')->except('create', 'show');
    Route::resource('transmision','TransmisionController')->except('create', 'show');
    Route::resource('combustibles','CombustibleController')->except('create', 'show');
    Route::resource('tipo_subastas','SubastaController')->except('show');
  });

});


/*Rutas privadas solo para usuarios autenticados*/
Route::prefix('admin')->middleware(['middleware' => 'auth'])->group(function()
{
  //*************** NEWSLETTER**************************************************************
  //Listar registros de newsletter
  Route::get('newsletter', ['as' => 'vernewsletter', 'uses'=>'Backend\NewsLetterController@store']);
  Route::get('newsletters', ['as' => 'excelnewsletter', 'uses'=>'Backend\NewsLetterController@excel']); 
  //********************************** FIN NEWSLETTER*************************************************


  //*************** SLIDERSSSSSSS**************************************************************
  //Listar registros de sliders
  Route::get('slider', ['as' => 'versliders', 'uses'=>'Backend\SliderController@list']);
  //Agregar registros de Sliders
  Route::post('nuevoslider', ['as' => 'ingresarslider', 'uses'=>'Backend\SliderController@create']);
  //Buscar Slider ya registrado
  Route::get('slider/u{id}', ['as' => 'buscarslider', 'uses'=>'Backend\SliderController@onesearch']);
  //Actualizar Slider ya registrado
  Route::post('slider/u{id}', ['as' => 'actualizarslider', 'uses'=>'Backend\SliderController@update']);
  //Mostrar formulario de Sliders
  Route::get('nuevoslider', ['as' => 'formslider', 'uses'=>'Backend\SliderController@form']);
  //Eliminar registros de Sliders
  Route::get('slider/r{id}', ['as' => 'eliminarslider', 'uses'=>'Backend\SliderController@delete']);
  //********************************** FIN SLIDERSS*************************************************

  //*************************NOTIICIASSSS***********************************
  //Listar registros de Noticias
  Route::get('noticias', ['as' => 'vernoticias', 'uses'=>'Backend\NoticiasController@list']);
  //Agregar registros de Noticias
  Route::post('nuevanoticia', ['as' => 'ingresarnoticia', 'uses'=>'Backend\NoticiasController@create']);
  //Buscar Noticia ya registrado
  Route::get('noticias/u{id}', ['as' => 'buscarnoticia', 'uses'=>'Backend\NoticiasController@onesearch']);
  //Actualizar Noticia ya registrado
  Route::post('noticias/u{id}', ['as' => 'actualizarnoticia', 'uses'=>'Backend\NoticiasController@update']);
  //Mostrar formulario de Noticias
  Route::get('nuevanoticia', ['as' => 'formnoticia', 'uses'=>'Backend\NoticiasController@form']);
  //Eliminar registros de Noticias
  Route::get('noticias/r{id}', ['as' => 'eliminarnoticia', 'uses'=>'Backend\NoticiasController@delete']);
  //************************* FIN NOTIICIASSSS***********************************

//*********************** SERVICIOSSSSSSSSSS****************************************

  Route::get('servicios/indexx', 'Backend\ServiciosController@index')->name('servicios.index');
  Route::get('servicios/create', 'Backend\ServiciosController@create')->name('servicios.create');
  Route::post('servicios/store', 'Backend\ServiciosController@store')->name('servicios.store');
   Route::get('servicios/edit/{id}', [
              'as' => 'servicios.edit', 
              'uses'=>'Backend\ServiciosController@edit'
            ]);
   Route::get('servicios/destroy/{id}', [
              'as' => 'servicios.destroy', 
              'uses'=>'Backend\ServiciosController@destroy'
            ]);
  Route::post('servicios/update', 'Backend\ServiciosController@update')->name('servicios.update');

  //Listar registros de Servicios
  //Route::get('servicios', ['as' => 'verservicios', 'uses'=>'Backend\ServiciosController@index']);
  //Listar registros de Servicios
  //Route::get('servicios{id}', ['as' => 'verserviciosuno', 'uses'=>'Backend\ServiciosController@listuno']);

  // Route::get('verserviciosuno', 'Backend\ServiciosController@listuno')->name('verserviciosuno');
  // //Agregar registros de Servicio
  // Route::post('servicios', ['as' => 'ingresarservicio', 'uses'=>'Backend\ServiciosController@create']);
  // //Buscar Servicio ya registrado
  // Route::get('servicios/u{id}', ['as' => 'buscarservicio', 'uses'=>'Backend\ServiciosController@onesearch']);
  // //Actualizar Servicio ya registrado
  // Route::post('servicios/u{id}', ['as' => 'actualizarservicio', 'uses'=>'Backend\ServiciosController@update']);
  // //Mostrar formulario de Servicios
  // Route::get('nuevoservicio', ['as' => 'formservicio', 'uses'=>'Backend\ServiciosController@form']);
  // //Eliminar registros de Servicios
  // Route::get('servicios/r{id}', ['as' => 'eliminarservicio', 'uses'=>'Backend\ServiciosController@delete']);
  //*********************** FIN SERVICIOSSSSSSSSSS****************************************

  //********************** CAMPOS ****************************************
  //Agregar registro de Campos
  Route::post('campos', ['as' => 'ingresarcampo', 'uses'=>'Backend\CamposController@create']);
  //Buscar Campo ya registrado
  Route::get('campos/u{id}', ['as' => 'buscarcampo', 'uses'=>'Backend\CamposController@onesearch']);
  //Actualizar Campo ya registrado
  Route::post('campos/u{id}', ['as' => 'actualizarcampo', 'uses'=>'Backend\CamposController@update']);
  //Mostrar formulario de Campos
  Route::get('nuevocampo', ['as' => 'formcampo', 'uses'=>'Backend\CamposController@form']);
  //Eliminar registros de Campos
  Route::get('campos/r{id}', ['as' => 'eliminarcampo', 'uses'=>'Backend\CamposController@delete']);

  //********************** FIN CAMPOS ****************************************

  //********************** CATEGORIAS ****************************************
  //Agregar registro de Categorias
  Route::post('categorias', ['as' => 'ingresarcategoria', 'uses'=>'Backend\CategoriasController@store']);
  //Buscar Campo ya registrado
  Route::get('categorias/u{categorias}', ['as' => 'buscarcategoria', 'uses'=>'Backend\CategoriasController@edit']);
  //Actualizar Campo ya registrado
  Route::post('categorias/u{categorias}', ['as' => 'actualizarcategoria', 'uses'=>'Backend\CategoriasController@update']);
  //Mostrar formulario de Campos
  Route::get('nuevacategoria', ['as' => 'formcategoria', 'uses'=>'Backend\CategoriasController@create']);
  //Eliminar registros de Campos
  Route::get('categorias/r{categorias}', ['as' => 'eliminarcategoria', 'uses'=>'Backend\CategoriasController@destroy']);

  //********************** FIN CATEGORIAS ****************************************

  //********************** SECCIONES ****************************************
  //Agregar registro de Secciones
  Route::post('secciones', ['as' => 'ingresarseccion', 'uses'=>'Backend\SeccionesController@create']);
  //Buscar Seccion ya registrado
  Route::get('secciones/u{id}', ['as' => 'buscarseccion', 'uses'=>'Backend\SeccionesController@onesearch']);
  //Actualizar Campo ya registrado
  Route::post('secciones/u{id}', ['as' => 'actualizarseccion', 'uses'=>'Backend\SeccionesController@update']);
  //Mostrar formulario de Secciones
  Route::get('nuevaseccion', ['as' => 'formseccion', 'uses'=>'Backend\SeccionesController@form']);
  //Eliminar registros de Secciones
  Route::get('secciones/r{id}', ['as' => 'eliminarseccion', 'uses'=>'Backend\SeccionesController@delete']);
  //********************** FIN SECCIONES ****************************************

  //********************** comentarios ****************************************
  //Listar registros de Comentarios
  Route::get('comentarios', ['as' => 'vercomentarios', 'uses'=>'Backend\ComentariosController@list']);
  //Agregar registro de comentarios
  Route::post('comentarios', ['as' => 'ingresarcomentario', 'uses'=>'Backend\ComentariosController@create']);
  //Buscar comentario ya registrado
  Route::get('comentarios/u{id}', ['as' => 'buscarcomentario', 'uses'=>'Backend\ComentariosController@onesearch']);
  //Actualizar Comentario ya registrado
  Route::post('comentarios/u{id}', ['as' => 'actualizarcomentario', 'uses'=>'Backend\ComentariosController@update']);
  //Mostrar formulario de comentarios
  Route::get('nuevacomentario', ['as' => 'formcomentario', 'uses'=>'Backend\ComentariosController@form']);
  //Eliminar registros de comentarios
  Route::get('comentarios/r{id}', ['as' => 'eliminarcomentario', 'uses'=>'Backend\ComentariosController@delete']);
  //********************** FIN comentarios ****************************************

   //********************** preguntas ****************************************
  //Listar registros de Preguntas
  Route::get('preguntas', ['as' => 'verpreguntas', 'uses'=>'Backend\PreguntasController@index']);
  //Agregar registro de preguntas
  Route::post('preguntas', ['as' => 'ingresarpregunta', 'uses'=>'Backend\PreguntasController@store']);
  //Buscar pregunta ya registrado
  Route::get('preguntas/u{preguntas}', ['as' => 'buscarpregunta', 'uses'=>'Backend\PreguntasController@edit']);
  //Actualizar Pregunta ya registrado
  Route::post('preguntas/u{preguntas}', ['as' => 'actualizarpregunta', 'uses'=>'Backend\PreguntasController@update']);
  //Mostrar formulario de preguntas
  Route::get('nuevapregunta', ['as' => 'formpregunta', 'uses'=>'Backend\PreguntasController@create']);
  //Eliminar registros de preguntas
  Route::get('preguntas/r{preguntas}', ['as' => 'eliminarpregunta', 'uses'=>'Backend\PreguntasController@destroy']);
  //********************** FIN preguntas ****************************************

  //********************** TRAMITES ****************************************
  //Listar registros de Tramites
  Route::get('solicitudes/index', 'Backend\SolicitudController@index')->name('solicitudes.index');
  Route::get('tramites', ['as' => 'vertramites', 'uses'=>'Backend\SolicitudController@store']);  
  //Buscar Tramite ya registrado
  Route::get('tramites/{id_servicio}/{id_solicitante}', ['as' => 'buscartramite', 'uses'=>'Backend\SolicitudController@edit']);
  //Actualizar estatus de Tramite ya registrado
  Route::post('tramites/{id_servicio}/{id_solicitante}', ['as' => 'actualizartramite', 'uses'=>'Backend\SolicitudController@update']);  
  //********************** FIN TRAMITES ****************************************


  //Llamar el Login de Usuario
  // Route::get('admin', ['as' => 'login', 'uses'=>'Auth\RegisterController@login']);
  //Llamar el olvido contraseña del Usuario
  // Route::post('admin', ['as' => 'request', 'uses'=>'Auth\ForgotPasswordController@remember']);
  //Cerrar la Sesión de Usuario
  // Route::post('admin', ['as' => 'cerrarsesion', 'uses'=>'Auth\RegisterController@logout']);
  //Listar registros de Usuarios

  //********************** USUARIOS ****************************************
  Route::get('usuarios', ['as' => 'verusuarios', 'uses'=>'Auth\RegisterController@list']);
  //Agregar registros de Usuarios
  Route::post('nuevousuario', ['as' => 'ingresarusuario', 'uses'=>'Auth\RegisterController@create']);
  //Buscar Usuario ya registrado
  Route::get('usuarios/u{id}', ['as' => 'buscarusuario', 'uses'=>'Auth\RegisterController@onesearch']);
  //Actualizar Usuario ya registrado
  Route::post('usuarios/u{id}', ['as' => 'actualizarusuario', 'uses'=>'Auth\RegisterController@update']);
  //Mostrar formulario de Usuario
  Route::get('nuevousuario', ['as' => 'formusuario', 'uses'=>'Auth\RegisterController@form']);
  //Eliminar registros de Usuarios
  Route::get('usuarios/r{id}', ['as' => 'eliminarusuario', 'uses'=>'Auth\RegisterController@delete']);
  // Inicio del Sistema, con login o despues del login el administrador
  Route::get('/', 'HomeController@index')->name('index');
  //********************** FIN USUARIOS ****************************************

  Route::get('modulo/{modulo}',['as' => 'ingresarmodulo', 'uses' => 'Backend\homeController@modulos']);


  // CONFIGURACION
  Route::resource('configuracion', 'Backend\Configuracion\ConfigurarController')
    ->only('index', 'store');

});





// Route::get('admin', 'HomeController@redireccion')->name('login');
