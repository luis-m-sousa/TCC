@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black bg-white">
                        <div class="row g-0">
                            <div class="card-body p-md-5 mx-md-4 text-center">
                                <h3>Comparação de simulações</h3>
                                <div class="table-responsive">
                                    <table class="table table-striped table-border border-light">
                                        <thead class="border-light">
                                            <tr>
                                                <th scope="col">Título</th>
                                                <th scope="col"><strong>{{$simulacao1Id->titulo}}</strong></th>
                                                <th scope="col"><strong>{{$simulacao2Id->titulo}}</strong></th>
                                            </tr>   
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Valor</th>
                                                @if ($simulacao1Id->valor > $simulacao2Id->valor)
                                                <td id="valor1" style="color: red">{{$simulacao1Id->valor}}</td>
                                                <td id="valor2">{{$simulacao2Id->valor}}</td>
                                                @elseif($simulacao1Id->valor < $simulacao2Id->valor)
                                                <td id="valor1">{{$simulacao1Id->valor}}</td>
                                                <td id="valor2" style="color: red">{{$simulacao2Id->valor}}</td>    
                                                @else
                                                <td id="valor1">{{$simulacao1Id->valor}}</td>
                                                <td id="valor2">{{$simulacao2Id->valor}}</td>                                                
                                                @endif
                                            </tr>
                                            <tr>
                                                <th scope="row">Taxa</th>
                                                @if($simulacao1Id->taxa > $simulacao2Id->taxa)
                                                <td id="taxa1" style="color:red">{{$simulacao1Id->taxa}}</td>
                                                <td id="taxa2">{{$simulacao2Id->taxa}}</td>
                                                @elseif($simulacao1Id->taxa < $simulacao2Id->taxa)
                                                <td id="taxa1">{{$simulacao1Id->taxa}}</td>
                                                <td id="taxa2" style="color:red">{{$simulacao2Id->taxa}}</td>
                                                @else
                                                <td id="taxa1">{{$simulacao1Id->taxa}}</td>
                                                <td id="taxa2">{{$simulacao2Id->taxa}}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th scope="row">Tempo</th>
                                                @if ($simulacao1Id->tempo > $simulacao2Id->tempo)
                                                <td id="tempo1" style="color: red">{{$simulacao1Id->tempo}}</td>
                                                <td id="tempo2">{{$simulacao2Id->tempo}}</td>
                                                @elseif($simulacao1Id->tempo < $simulacao2Id->tempo)
                                                <td id="tempo1">{{$simulacao1Id->tempo}}</td>
                                                <td id="tempo2" style="color: red">{{$simulacao2Id->tempo}}</td>
                                                @else
                                                <td id="tempo1">{{$simulacao1Id->tempo}}</td>
                                                <td id="tempo2">{{$simulacao2Id->tempo}}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th scope="row">Parcela</th>
                                                @if ($simulacao1Id->parcela > $simulacao2Id->parcela)
                                                <td id="parcela1" style="color: red">{{$simulacao1Id->parcela}}</td>
                                                <td id="parcela2">{{$simulacao2Id->parcela}}</td>
                                                @elseif($simulacao1Id->parcela < $simulacao2Id->parcela)
                                                <td id="parcela1">{{$simulacao1Id->parcela}}</td>
                                                <td id="parcela2" style="color: red">{{$simulacao2Id->parcela}}</td>
                                                @else
                                                <td id="parcela1">{{$simulacao1Id->parcela}}</td>
                                                <td id="parcela2">{{$simulacao2Id->parcela}}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th scope="row">Valor de juros</th>
                                                <div hidden>{{$totalJuros1 = $simulacao1Id->parcela * $simulacao1Id->tempo - $simulacao1Id->valor}}</div>
                                                <div hidden>{{$totalJuros2 = $simulacao2Id->parcela * $simulacao2Id->tempo - $simulacao2Id->valor}}</div>
                                                @if($totalJuros1 > $totalJuros2)
                                                <td id="totalJuros1" style="color: red">{{$totalJuros1}}</td>
                                                <td id="totalJuros2">{{$totalJuros2}}</td>
                                                @elseif($totalJuros1 < $totalJuros2)
                                                <td id="totalJuros1">{{$totalJuros1}}</td>
                                                <td id="totalJuros2" style="color: red">{{$totalJuros2}}</td>
                                                @else
                                                <td id="totalJuros1">{{$totalJuros1}}</td>
                                                <td id="totalJuros2">{{$totalJuros2}}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th scope="row">Valor total</th>
                                                <div hidden>{{$total1 = $simulacao1Id->parcela * $simulacao1Id->tempo}}</div>
                                                <div hidden>{{$total2 = $simulacao2Id->parcela * $simulacao2Id->tempo}}</div>
                                                @if($total1 > $total2)
                                                <td id="total1" style="color: red">{{$total1}}</td>
                                                <td id="total2">{{$total2}}</td>
                                                @elseif($total1 < $total2)
                                                <td id="total1">{{$total1}}</td>
                                                <td id="total2" style="color: red">{{$total2}}</td>
                                                @else
                                                <td id="total1">{{$total1}}</td>
                                                <td id="total2">{{$total2}}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th scope="row">Tipo</th>
                                                <td>{{$simulacao1Id->tipo}}</td>
                                                <td>{{$simulacao2Id->tipo}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <canvas id="myStackedBarChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Obtenha os dados da view (você pode adicionar mais dados conforme necessário)
            var valor1 = parseFloat(document.getElementById('valor1').textContent);
            var valor2 = parseFloat(document.getElementById('valor2').textContent);
            var taxa1 = parseFloat(document.getElementById('taxa1').textContent);
            var taxa2 = parseFloat(document.getElementById('taxa2').textContent);
            var tempo1 = parseFloat(document.getElementById('tempo1').textContent);
            var tempo2 = parseFloat(document.getElementById('tempo2').textContent);
            var parcela1 = parseFloat(document.getElementById('parcela1').textContent);
            var parcela2 = parseFloat(document.getElementById('parcela2').textContent);
            var totalJuros1 = parseFloat(document.getElementById('totalJuros1').textContent);
            var totalJuros2 = parseFloat(document.getElementById('totalJuros2').textContent);
            var total1 = parseFloat(document.getElementById('total1').textContent);
            var total1 = parseFloat(document.getElementById('total1').textContent);            
        
            // Crie um objeto de configuração para o gráfico
            var ctx = document.getElementById('myStackedBarChart').getContext('2d');
            var config = {
                type: 'bar',    
                data: {
                    labels: ['Valor Total {{$simulacao1Id->titulo}}: {{$total1}}','Valor Total {{$simulacao2Id->titulo}}: {{$total2}}'],
                    datasets: [{
                        label: 'Valor',
                        data: [valor1, valor2],
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderWidth: 2,
                        borderColor: 'rgba(255, 99, 132, 1)'
                    }, {
                        label: 'Juros',
                        data: [totalJuros1, totalJuros2],
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderWidth: 2,
                        borderColor: 'rgba(54, 162, 235, 1)'
                    }]
                },
                options: {
                    scales: {
                        x: {
                            stacked: true
                        },
                        y: {
                            stacked: true
                        }
                    }
                }
            };
        
            // Crie o gráfico
            var myChart = new Chart(ctx, config);
        </script>

    @endsection