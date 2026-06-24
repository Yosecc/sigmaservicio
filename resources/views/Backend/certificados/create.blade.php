@extends('Backend.layout.layout')

@section('styles')
  @include('Backend.certificados._styles')
@endsection

@section('content')
<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title">Registrar certificado</h4>
      <p class="card-category">El código QR se generará automáticamente al guardar.</p>
    </div>
    <div class="card-body">
      <input id="mostra_vista" value="certificados" hidden disabled>
      <form method="POST" action="{{ route('certificados.store') }}" autocomplete="off">
        {{ csrf_field() }}
        @include('Backend.certificados._form')
      </form>
    </div>
  </div>
</div>
@endsection
