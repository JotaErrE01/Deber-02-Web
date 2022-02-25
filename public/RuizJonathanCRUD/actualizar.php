<?php 
    require __DIR__ . '/Vuelo.php';
    $errores = [];
    $vuelo;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $vueloObj = new Vuelo($_POST);

        // Validar los datos
        $errores = $vueloObj->getErrores();
        if(sizeof($errores) == 0) {
            $vueloObj->update($_GET['id']);
            header('Location: adminVuelos.php');
        }
    }

    if(isset($_GET['id'])){
        $id = filter_var( $_GET['id'], FILTER_VALIDATE_INT );
        if(!$id){
            header('Location: adminVuelos.php');
        }

        $vueloObj = new Vuelo(['id' => $id]);
        $vuelo = $vueloObj->getOne();

        if(!$vuelo){
            header('Location: adminVuelos.php');
        }
    }else{
        header('Location: crearVuelo.php');
    }
?>

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
        <h2 class="text-3xl sm:text-subtitle text-center my-10">Editar Vuelo</h2>

        <form method="POST" class="w-4/5 mx-auto flex flex-col mt-10" id="formulario_vuelos">
            <?php 
                include './layout/formLayout.php';
            ?>
            <button type="submit" class="border-indigo-500 border-2 border-solid hover:bg-indigo-500 hover:text-white hover:font-bold text-center px-3 py-2 rounded-md text-xl text-indigo-600 w-80 mx-auto my-10 leading-normal" id="buscar">Actualizar Vuelo</button>
        </form>
    </section>

    <!-- Footer -->
    <?php
    include '../templates/footer.php';
    ?>
    <script src="/js/adminPanel.js"></script>
</body>

</html>