@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black bg-white">
                        <div class="row g-0">
                            <div class="card-body p-md-5 mx-md-4">

                                <form class="mx-auto" method="POST">
                                    @csrf
                                    <div class="justify-content-center align-items-center">
                                        <div class="text-center">
                                            <h4>Encontre possíveis valores</h4>
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            <input
                                                class="input-group btn-outline-danger rounded mb-3 form-control mt-3 text-black"
                                                type="number" id="valor" name="valor" placeholder="Valor"
                                                style="width: 40%">
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            @error('valor')
                                                <div class="w-50">
                                                    <div class="alert alert-danger alert-dismissible fade show session-alert text-black sm-2"
                                                        role="alert" style="border: none">
                                                        <div
                                                            class="alert-heading d-flex justify-content-between align-items-center">
                                                            <h4 class="alert-heading-text">Erro!</h4>
                                                            <button type="button" class="close btn btn-danger"
                                                                data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true"><b>&times;</b></span>
                                                            </button>
                                                        </div>
                                                        <hr>
                                                        <p class="mb-0">{{ $message }}</p>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            <input
                                                class="input-group btn-outline-danger rounded mb-3 form-control text-black"
                                                type="number" step="0.01" id="parcela" name="parcela"
                                                placeholder="Parcela" style="width: 40%">
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            @error('parcela')
                                                <div class="w-50">
                                                    <div class="alert alert-danger alert-dismissible fade show session-alert text-black"
                                                        role="alert" style="border: none">
                                                        <div
                                                            class="alert-heading d-flex justify-content-between align-items-center">
                                                            <h4 class="alert-heading-text">Erro!</h4>
                                                            <button type="button" class="close btn btn-danger"
                                                                data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true"><b>&times;</b></span>
                                                            </button>
                                                        </div>
                                                        <hr>
                                                        <p class="mb-0">{{ $message }}</p>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div
                                            class="row text-center justify-content-center align-items-center w-auto">
                                            <input class="btn btn-primary mb-3 w-auto" type="submit"
                                                value="Calcular">
                                        </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
