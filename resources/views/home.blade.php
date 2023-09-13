@extends('layouts.app')
@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
            <div class="card rounded-3 text-black bg-black text-white">
                <div class="row g-0">
                    <div class="card-body p-md-5 mx-md-4">
                        <div class="text-center">
                            <h3 class="mt-1 mb-5 pb-1">
                                St<img style="width: 20px" class="loginGoogle"
                                    src="{{ asset('build/assets/estrela.png') }}" alt />rVault
                            </h3>
                        </div>
                        <div class="text-center">
                                <div> 
                                    <button type="button" class="btn btn-primary mb-3 ">
                                        <a href="/emprestimo" style="text-decoration: none" class="text-black">Realizar Simulação</a>
                                    </button>
                                </div>
                                <div> 
                                    <button type="button" class="btn btn-primary mb-3 ">
                                        <a href="/comparar" style="text-decoration: none" class="text-black">Comparar Simulações</a>
                                    </button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary">
                                        <a href="/faq" style="text-decoration: none" class="text-black">Perguntas Frequentes</a>
                                    </button>
                                </div>
                        </div>
@endsection
