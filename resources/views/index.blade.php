@extends('layouts.app')
@section('content')
<section class="h-100 gradient-form">
    <div class="container py-5 h-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black bg-white">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <h3 class="mt-1 mb-5 pb-1">
                                            St<img style="width: 20px" class="loginGoogle"
                                                src="{{ asset('build/assets/estrela.png') }}" alt />rVault
                                        </h3>
                                    </div>
                                    <h5 class="text-justify mb-5">Seja bem-vindo ao projeto StarVault, somos uma aplicação web financeira para simulações de crédito, 
                                        aqui é possível simular empréstimos com as taxas dos principais bancos do mercado.</h5>
                              
                                    <div><h5>Já possui uma conta?</h5></div>
                                    <div class="d-flex align-items-center justify-content-center pb-4 pt-4">
                                        <p class="mb-0 me-2">Faça seu login aqui -></p>
                                       <a href="{{ route('login') }}"><input type="button" class="btn btn-outline-danger" value="Login"></a>
                                      </div>
                                      <div><h5>Não é registrado ainda?</h5></div>
                                    <div class="d-flex align-items-center justify-content-center pb-4 pt-4">
                                        <p class="mb-0 me-2">Faça seu cadastro aqui -></p>
                                       <a href="{{ route('register') }}"><input type="button" class="btn btn-outline-danger" value="Registre-se"></a>
                                      </div>
                                      
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <p class=" mb-0">
                                        Esta é uma aplicação web para
                                        simulações de crédito, como
                                        empréstimos e financiamentos que faz
                                        parte de um TCC.
                                        <br />
                                        <br />
                                        Aluno: Luís Miguel de Sousa Silva
                                        <br />
                                        Orientador: Everthon Valadão dos
                                        Santos
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection