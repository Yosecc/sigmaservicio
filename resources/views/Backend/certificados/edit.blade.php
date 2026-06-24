@extends('Backend.layout.layout')

@section('styles')
  @include('Backend.certificados._styles')
@endsection

@section('content')
<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title">Editar certificado</h4>
      <p class="card-category">{{ $certificado->numero_certificado }}</p>
    </div>
    <div class="card-body">
      <input id="mostra_vista" value="certificados" hidden disabled>
      <form method="POST" action="{{ route('certificados.update', $certificado->id) }}" autocomplete="off">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        @include('Backend.certificados._form')
      </form>
    </div>
  </div>
</div>
@endsection
