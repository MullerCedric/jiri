@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Vos jurys en cours</div>

                    <div class="card-body">
                        Aucun jury en cours
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Vos jurys à venir</div>

                    <div class="card-body">
                        Aucun jury à venir
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Vos jurys terminés</div>

                    <div class="card-body">
                        Aucun jury terminé
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
