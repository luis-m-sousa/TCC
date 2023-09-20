<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simulação de emprésitmo StarVault</title>
</head>
<body>
        <h1>Empréstimo de título "{{$data->titulo}}"</h1>
        <ul>
            <li>
                Tipo de empréstimo: {{$data->tipo}}
            </li>
            <br>
            <li>
                Valor: {{$data->valor}} Reais
            </li>
            <br>
            <li>
                Taxa: {{$data->taxa}} %
            </li>
            <br>
            <li>
                Tempo de pagamento: {{$data->tempo}} Meses
            </li>
            <br>
            <li>
                Parcela: {{$data->parcela}} Reais
            </li>
        </ul>
</body>
</html>