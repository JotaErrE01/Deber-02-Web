<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/styles/style.css">
    <title>EcuTravel</title>
</head>

<body>
    <!-- Header -->
    <?php
    include '../templates/header.php';
    ?>

    <!-- Contenido principal -->
    <section class="container mx-auto">
        <h2 class="text-3xl sm:text-subtitle text-center my-10">Panel de Administracion de Vuelos</h2>
        <!-- <img class="mx-auto rounded-lg" src="https://cdn.pixabay.com/photo/2017/06/05/11/01/airport-2373727_960_720.jpg" alt="vuelos"> -->

        <div class="w-4/5 flex justify-center mx-auto md:justify-start my-5">
            <a href="crearVuelo.php" class="block w-fit p-2 border-emerald-600 border-solid border-2 text-emerald-700 hover:text-white hover:bg-emerald-600 rounded-lg">Crear un Nuevo Vuelo</a>
        </div>

        <div class="md:grid-cols-2 md:w-4/5 mx-auto grid grid-cols-1 lg:grid-cols-3 text-center gap-5 my-10">

            <?php
            require __DIR__ . '/Vuelo.php';
            $vuelo = new Vuelo;
            $vuelos = $vuelo->getAll();
            foreach ($vuelos as $vuelo) :
                $origen = ucfirst($vuelo['origen']);
                $destino = ucfirst($vuelo['destino']);
                $fechaSalida = $vuelo['fecha_salida'];
                $fechaRegreso = $vuelo['fecha_regreso'];
                $duracion = $vuelo['duracion'] == 1 ? $vuelo['duracion'] . ' hora' : $vuelo['duracion'] . ' horas';
                $precio = $vuelo['precio'];
            ?>
                <div class="rounded-lg p-2">
                    <div class="vuelos-info">
                        <h3 class="text-3xl font-medium my-2"><?php echo "{$origen} a {$destino}" ?></h3>
                        <p class="my-5 text-left text-lg">Salida: <?php echo $fechaSalida ?></p>
                        <p class="my-5 text-left text-lg">Regreso: <?php echo isset($fechaRegreso) ?  $fechaRegreso : 'N/A' ?> </p>
                        <p class="my-5 text-left text-lg">Duración: <?php echo $duracion ?> </p>
                        <p class="my-5 text-right text-xl"><span class="font-bold text-2xl">USD <?php echo $precio ?></span> <?php echo isset($fechaRegreso) ?  'ida y vuelta' : 'solo ida' ?></p>
                    </div>

                    <div class="flex gap-5 justify-evenly w-full">
                        <a href="actualizar.php?id=<?php echo $vuelo['id']; ?>" class="text-indigo-500 font-medium rounded-md border-2 border-indigo-400 brder-solid px-4 py-2 block w hover:bg-indigo-500 hover:text-white transition-colors hover:cursor-pointer" type="button">Editar</a>

                        <form action="eliminar.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $vuelo['id'] ?>">

                            <button type="submit" class="text-rose-500 font-medium rounded-md border-2 border-rose-400 brder-solid px-4 py-2 block hover:bg-rose-500 hover:text-white transition-colors" type="button">Eliminar</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Footer -->
    <?php
    include '../templates/footer.php';
    ?>
</body>

</html>