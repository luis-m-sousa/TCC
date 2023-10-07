@extends('layouts.app')

@section('content')
<section class="h-100 gradient-form">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black bg-white">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
  
                  <div class="text-center">
                    <h3 class="mt-1 mb-5 pb-1">St<img class="loginGoogle" src="{{ asset('build/assets/estrela.png') }}" alt="">rVault</h3>
                  </div>
  
                  <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                      <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example11">{{ __('Usuário') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Nome inválido.</strong>
                                </span>
                            @enderror
                        </div>
                  
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example11">{{ __('Email') }}</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Email já cadastrado.</strong>
                                    </span>
                                @enderror
                    </div>
  
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example22">{{ __('Senha') }}</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>Senha inválida, por favor insira uma senha com no mínimo 8 caracteres.</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-outline mb-3">
                      <label class="form-label" for="form2Example22">{{ __('Confirme sua senha') }}</label>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
  
                    <div class="text-center pt-1 mb-3">
                      <input type="submit" class="btn btn-primary btn-block fa-lg mb-3" value="Registrar">
                  </div>
                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">Já possui uma conta?</p>
                     <a href="{{ route('login') }}"><input type="button" class="btn btn-outline-danger" value="Login"></a>
                    </div>
  
                  </form>
  
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <p class=" mb-0">Esta é uma aplicação web para simulações de crédito, 
                      como empréstimos e financiamentos que faz parte de um TCC. <br> <br>
                      Aluno: Luís Miguel de Sousa Silva <br>
                      Orientador: Everthon Valadão dos Santos</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
