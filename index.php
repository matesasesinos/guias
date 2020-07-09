<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once(__DIR__ . '/vendor/autoload.php');
require_once( __DIR__ . '/config.php');
require_once(__DIR__ .'/start.php');
use App\Controllers\Guia;?>
<?php require './tpl/head.php' ?>
<div class="container-fluid pl-5 pr-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mt-5 mb-1 text-center">Buscar un pedido</h1>
            <form action="" class="h-100" method="post">
                <div class="form-group">
                    <label for="">Ingrese su DNI</label>
                    <input type="number" class="form-control form-control-lg" name="dni">
                </div>
                <button class="btn btn-lg btn-primary">Buscar</button>
            </form>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div id="resultado">
                <h3>Guias</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Fecha</th>
                        <th>Nº de Guía</th>
                        <th>Transporte</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(isset($_POST['dni'])){
                    $guias = Guia::buscar($_POST['dni']);
                    foreach($guias as $g){
                    ?>
                    <tr>
                        <td><?php echo $g['id']?></td>
                        <td><?php echo $g['nombre']?></td>
                        <td><?php echo $g['dni']?></td>
                        <td><?php echo $g['fecha']?></td>
                        <?php if($g['transporte'] === 'Andreani'){?>
                        <td><a href="https://seguimiento.andreani.com/envio/<?php echo $g['guia']?>" target="_blank" title="Seguimiento"><?php echo $g['guia']?></a></td>
                        <?php } else {?>
                        <td><?php echo $g['guia']?></td>
                        <?php } ?>    
                        <td><?php echo $g['transporte']?></td>
                        <td><?php echo $g['observaciones']?></td>
                    </tr>
                <?php }
                 }
                ?>
                </tbody>
            </table>
          
            </div>
        </div>
    </div>
</div>
<?php require './tpl/footer.php';?>