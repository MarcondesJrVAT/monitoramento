<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoramento CEMEAM</title>
    <script>
        let inactivityTimer;

        // Função para esconder os botões
        function hideButtons() {
            document.getElementById('buttons').style.display = 'none';
        }

        // Função para mostrar os botões
        function showButtons() {
            document.getElementById('buttons').style.display = 'block';
        }

        // Função para resetar o timer de inatividade
        function resetInactivityTimer() {
            clearTimeout(inactivityTimer);
            showButtons(); // Mostrar os botões ao movimentar o mouse
            inactivityTimer = setTimeout(hideButtons, 60000); // 60 segundos de inatividade
        }

        function showTab(tab) {
            document.getElementById('fundamental').style.display = tab === 'fundamental' ? 'grid' : 'none';
            document.getElementById('medio').style.display = tab === 'medio' ? 'grid' : 'none';
        }

        window.onload = function() {
            inactivityTimer = setTimeout(hideButtons, 60000); // Esconde após 60 segundos
            document.onmousemove = resetInactivityTimer; // Resetar ao mover o mouse
        };
    </script>
    @vite('resources/css/app.css')
</head>
<body class="h-fit">

    <!-- Título -->
    <div class="text-center text-lg font-bold py-2">Monitoramento CEMEAM</div>

    <!-- Abas -->
    <div id="buttons" class="text-center mb-4">
        <button class="px-4 py-1 bg-blue-500 text-white rounded" onclick="showTab('fundamental')">Ensino Fundamental</button>
        <button class="px-4 py-1 bg-blue-500 text-white rounded ml-2" onclick="showTab('medio')">Ensino Médio</button>
    </div>

    <!-- Conteúdo Ensino Fundamental -->
    <div id="fundamental" class="px-6 py-2 grid grid-cols-1 sm:grid-cols-2 gap-4 h-full">
        @foreach($videosFundamental as $video)
            <div class="rounded p-2 bg-gray-300 flex flex-col">
                <h2 class="text-center font-semibold mb-2">{{ $video['title'] }}</h2>
                <div class="flex-grow">
                    <iframe class="w-full h-96 sm:h-96" src="{{ $video['link'] }}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Conteúdo Ensino Médio -->
    <div id="medio" class="hidden px-6 py-2 grid grid-cols-1 sm:grid-cols-8 gap-4 h-full">
        <!-- 3 principais à esquerda ocupando 5/8 da tela -->
        <div class="sm:col-span-5 grid grid-cols-1 gap-4">
            @foreach($videosMedio as $index => $video)
                @if($index < 3)
                <div class="rounded p-2 bg-gray-300 flex flex-col">
                    <h2 class="text-center font-semibold mb-2">{{ $video['title'] }}</h2>
                    <div class="flex-grow">
                        <iframe class="w-full h-96 sm:h-96" src="{{ $video['link'] }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                @endif
            @endforeach
        </div>

        <!-- Canais restantes à direita ocupando 3/8 da tela -->
        <div class="sm:col-span-3 grid grid-cols-1 gap-4">
            @foreach($videosMedio as $index => $video)
                @if($index >= 3)
                <div class="rounded p-2 bg-gray-300 flex flex-col">
                    <h2 class="text-center font-semibold mb-2">{{ $video['title'] }}</h2>
                    <div class="flex-grow">
                        <iframe class="w-full h-60 sm:h-full" src="{{ $video['link'] }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>

    <script>
        // Inicialmente, mostrar a aba Ensino Fundamental
        showTab('fundamental');
    </script>
</body>
</html>
