@extends ('Backend.layout.layout')

@section('content')

<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">NewsLetter</h4>
                  {{-- <a href="{{ route('excelnewsletter')}}" class="card-category">
                    <button  type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Exportar">
                      <i class="material-icons">import_export</i>
                    </button>
                     Exportar Excel</a> --}}
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <input id="mostra_vista" value="newsletter" hidden disabled>
                    <table class="table">
                      <thead class=" text-primary">
                        <tr><th>
                          Correo Electrónico
                        </th>
                        <th>
                          Fecha Suscripción
                        </th>
                      </tr></thead>
                      <tbody>

                        @foreach($newsletter as $nl)
                        <tr>
                          <td>
                              {{ $nl->mail }}
                          </td>
                          <td>
                            {{ $nl->updated_at }}
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>



@endsection

@push('scripts')
@endpush
