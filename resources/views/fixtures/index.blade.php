@extends('layouts.app')

@section('content')

    @include('layouts.searchbar.search')

    <div class="mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                <a href="{{route('fixtures.create')}}" type="button" class="btn btn-success btn-sm float-end">Maak wedstrijd aan</a>
                <h5>Overzicht van wedstrijden</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-light pb-0 mb-0">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <button type="button" class="btn btn-secondary btn-sm float-end">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm float-end me-2">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>
                            <button type="button" class="btn btn-secondary btn-sm float-end">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm float-end me-2">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>
                            <button type="button" class="btn btn-secondary btn-sm float-end">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm float-end me-2">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
