@extends('layouts.app')

@section('content')

    @include('layouts.searchbar.search')

    <div class="mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-success btn-sm float-end">Download Export</button>
                <h5>Exporteer / Importeer data</h5>
            </div>
            <div class="card-body">
                <p class="text-center mt-4 mb-4"> Export / Import zal hier worden geplaatst</p>
            </div>
        </div>
    </div>
@endsection
