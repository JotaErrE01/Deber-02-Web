<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="/styles/style.css">
    <title>EcuTravel</title>
</head>
<body>
    <!-- Header -->
    <?php 
        include './templates/header.php';
    ?>

    <!-- Formulario de Vuelos -->
    <section class="container mx-auto my-10">
        <h2 class="text-2xl sm:text-3xl sm:text-subtitle text-center">Llena el Formulario para Encontrar tu Vuelo Perfecto
        </h2>

        <form class="w-4/5 mx-auto flex flex-col mt-10" id="formulario_vuelos">
            <div class="md:w-1/2 flex flex-row gap-5 justify-evenly items-center mb-5">
                <div class="flex gap-2 items-center">
                    <label class="text-lg" for="idaVuelta">Ida y Vuelta</label>
                    <input type="radio" checked id="idaVuelta" name="tipoViaje" class="focus:ring-orange-400 focus:border-orange-400 focus-ring-1 shadow-md text-orange-500">
                </div>

                <div class="flex gap-2 items-center">
                    <label class="text-lg" for="soloIda">Solo Ida</label>
                    <input type="radio" id="soloIda" name="tipoViaje" class="focus:ring-orange-400 focus:border-orange-400 focus-ring-1 shadow-md text-orange-500">
                </div>
            </div>


            <div class="flex flex-col sm:flex-row gap-5">
                <div class="flex flex-col flex-1">
                    <label class="text-2xl">Origen</label>
                    <select class="my-3 rounded-lg focus:ring-orange-400 border-gray-300  focus:border-orange-400 focus-ring-1 shadow-md appearance-none" id="origen">
                        <option value="" disabled selected>--Seleccione--</option>
                        <option value="Guayaquil">Guayaquil</option>
                        <option value="Quito">Quito</option>
                        <option value="Loja">Loja</option>
                    </select>
                </div>

                <div class="flex flex-col flex-1">
                    <label class="text-2xl">Destino</label>
                    <select class="my-3 rounded-lg focus:ring-orange-400 border-gray-300  focus:border-orange-400 focus-ring-1 shadow-md" id="destino">
                        <option value="" disabled selected>--Seleccione--</option>
                        <option value="Guayaquil">Guayaquil</option>
                        <option value="Quito">Quito</option>
                        <option value="Loja">Loja</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-5">
                <div id="contenedorFechaIda" class="flex flex-col flex-1">
                    <label class="text-2xl">Fecha de Ida</label>
                    <input id="fechaIda" class="my-3 rounded-lg focus:ring-orange-400 border-gray-300  focus:border-orange-400 focus-ring-1 shadow-md" type="date">
                </div>

                <div id="contenedorFechaVuelta" class="flex flex-col flex-1">
                    <label class="text-2xl">Fecha de Vuelta</label>
                    <input id="fechaVuelta" class="my-3 rounded-lg focus:ring-orange-400 border-gray-300  focus:border-orange-400 focus-ring-1 shadow-md" type="date">
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-5">
                <div class="flex flex-col flex-1">
                    <label for="presupuesto" class="text-2xl">Presupuesto</label>
                    <input type="text" id="presupuesto" placeholder="USD 0.00" class="my-3 rounded-lg focus:ring-orange-400 border-gray-300  focus:border-orange-400 focus-ring-1 shadow-md">
                </div>

                <div class="flex flex-col flex-1">
                    <label class="text-2xl">Terminos y Condiciones</label>
                    <div class="flex h-full items-center">
                        <input type="checkbox" class="focus:ring-orange-400 focus:border-orange-400 focus-ring-1 shadow text-orange-500 rounded" id="terminosCondiciones">
                        <label class="ml-2">Estoy de acuerdo con los <a href="/" class="text-orange-500">Terminos</a> y <a href="/" class="text-orange-500">Condiciones de Uso</a></label>
                    </div>
                </div>
            </div>
            <button type="submit" class="bg-orange-400 hover:bg-orange-500 text-center px-3 py-2 rounded-md text-xl text-white w-80 mx-auto mt-5 leading-normal" id="buscar">Buscar</button>
        </form>
    </section>

    <!-- Formulario de opinion -->
    <article class="container mx-auto">
        <h3 class="text-2xl w-4/5 block mx-auto mt-2">Dejanos Conocer tu Opinion</h3>
        <form id="formulario-opinion" class="w-4/5 mx-auto">
            <textarea class="focus:border-orange-400 shadow-md rounded border-gray-300 focus:ring-orange-400 resize-none w-full mx-auto block my-4 h-40"></textarea>
            <button class="bg-orange-400 hover:bg-orange-500 text-center px-5 py-2 rounded-md text-lg text-white leading-normal mb-5 ml-auto block">Enviar</button>
        </form>
    </article>

    <!-- Footer -->
    <?php 
        include './templates/footer.php';
    ?>
    <script src="/js/RuizJonathanValidacion.js"></script>
</body>
</html>