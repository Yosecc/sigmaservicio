@extends ('Backend.layout.layout')

@section('content')

<input id="mostra_vista" value="usuarios" hidden disabled>
<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Crear Usuario</h4>
                  <p class="card-category">Complete todos los datos</p>
                </div>
                <div class="card-body">
                  {!! Form::open(['route' => 'ingresarusuario', 'method' => 'post', 'novalidate']) !!}
                    <!-- {{ csrf_field() }} -->
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group bmd-form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                          {!! Form::label('full_name', 'Usuario') !!}
                          {!! Form::text('name', null, ['class' => 'form-control' , 'required' => 'required', 'autofocus'=> 'autofocus']) !!}

                          @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group {{ $errors->has('email') ? ' has-error' : '' }}">

                          {!! Form::label('email', 'Correo Electrónico') !!}
                          {!! Form::email('email',  null, ['class' => 'form-control',  'required' => 'required']) !!}
                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group bmd-form-group {{ $errors->has('role_id') ? ' has-error' : '' }}">

                          {!! Form::label('role_id', 'Perfil') !!}
                          {!! Form::select('role_id', $perfiles, null, ['class' => 'form-control','required'=>'required']) !!}

                          @if ($errors->has('role_id'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('role_id') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                          {!! Form::label('password', 'Contraseña') !!}
                          {!! Form::password('password',  ['class' => 'form-control',  'required' => 'required']) !!}
                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group ">
                          {!! Form::label('confpassword', 'Confirmar Contraseña') !!}
                          {!! Form::password('confpassword',  ['class' => 'form-control',  'required' => 'required']) !!}
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-primary pull-right" type="submit">Crear Usuario</button>
                    <div class="clearfix"></div>
                 {!! Form::close() !!}
                </div>
              </div>
            </div>

@endsection
