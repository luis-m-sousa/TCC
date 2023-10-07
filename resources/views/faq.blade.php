@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black bg-white">
                    <div class="row g-0">
                        <div class="card-body p-md-5 mx-md-4">

                            <ul>
                                <li>
                                    <b>O que é um sistema de simulações de crédito?</b> <br>
                                    R: Um sistema de simulações de crédito é uma 
                                    plataforma que permite aos usuários simular diferentes tipos de empréstimos e financiamentos. 
                                    Nesse sistema, os usuários podem inserir informações relevantes, como valor desejado, prazo, taxa de juros, 
                                    e o sistema calcula automaticamente os detalhes da simulação, como parcelas e valor total.
                                </li>
                                <hr>
                                <li>
                                    <b>Como posso usar o sistema de simulações de crédito?</b> <br>
                                    R: Você pode usar o sistema de simulações de crédito acessando o menu e clicando no botão "Simulação", depois disso, basta preencher 
                                    3 dos 4 campos obrigatórios. O sistema fornecerá automaticamente os detalhes da simulação 
                                    com base nas informações inseridas.
                                </li>
                                <hr>
                                <li>
                                    <b>Quais tipos de empréstimos ou financiamentos posso simular neste sistema?</b> <br>
                                    R: Nosso sistema permite a simulação de diversos tipos de empréstimos, incluindo empréstimos pessoais, empréstimos consignados,
                                     e outros tipos comuns de empréstimos.
                                </li>
                                <hr>
                                <li>
                                    <b>Quais informações são necessárias para realizar uma simulação de crédito?</b> <br>
                                    R: Para realizar uma simulação de crédito, você precisa fornecer pelo menos três dos quatro dados necessários: valor desejado,
                                     prazo, taxa de juros e parcela. O quarto campo, referente ao banco, é opcional.
                                </li>
                                <hr>
                                <li>
                                    <b>As simulações são realmente precisas?</b> <br>
                                    R: As nossas simulações não consideram taxas administrativas, seguros de vida e outros pormenores incluídos em empréstimos. Isso ocorre porque
                                    cada banco utiliza valores diferentes, e tais valores não ficam disponíveis facilmente na internet. Sendo assim, nossas simulações servem mais para fins 
                                    didáticos, no sentido de entender como funciona o cálculo.
                                </li>
                                <hr>
                                <li>
                                    <b>Como o sistema calcula as taxas de juros?</b> <br>
                                    R: O sistema utiliza como base a fórmula de empréstimos com prestações fixas disponibilizada pelo Banco Central e, a partir dos
                                    valores inseridos pelo usuário, realiza o cálculo. Vale lembrar que, caso o usuário tenha interesse, é possível inspecionar o Javascript
                                    que utiliza os dados para realizar o cálculo.
                                </li>
                                <hr>
                                <li>
                                    <b>Posso salvar minhas simulações para consultá-las posteriormente?</b> <br>
                                    R: Sim, você pode salvar suas simulações clicando no botão "Salvar" logo abaixo dos gráficos gerados na simulação.
                                </li>
                                <hr>
                                <li>
                                    <b>Como posso acessar minhas simulações salvas?</b> <br>
                                    R: Após fazer login na sua conta, você pode acessar suas simulações salvas clicando no menu do canto superior direito da tela e clicando
                                     na seção "Minhas Simulações" 
                                    onde todas as suas simulações serão listadas.
                                </li>
                                <hr>
                                <li>
                                    <b>É possível compartilhar minhas simulações com outras pessoas?</b> <br>
                                    R: Sim, Na seção "Minhas Simulações" ao clicar no botão "Exportar" na aba "Ações" da simulação desejada.
                                    Após isso, você será redirecionado para uma página com um PDF com os dados da simulação escolhida, sendo possível baixá-lo e compartilhá-lo.
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection