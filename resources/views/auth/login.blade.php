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

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-outline mb-4">
                                            <label class="form-label"
                                                for="form2Example11">{{ __('Endereço de Email') }}</label>

                                            <div class="col-md-12">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>Email e/ou senha não encontrado(s).</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label"
                                                for="form2Example22">{{ __('Senha') }}</label>
                                            <div class="col-md-12">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>Email e/ou senha não encontrado(s).</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Lembrar-me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 offset-md-5">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center pb-4 pt-4">
                                            <p class="mb-0 me-2">Não é registrado ainda?</p>
                                           <a href="{{ route('register') }}"><input type="button" class="btn btn-outline-danger" value="Registre-se"></a>
                                          </div>
                                          
                                    </form>
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
