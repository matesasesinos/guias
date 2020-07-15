<?php
require './start.php';
use App\Controllers\Guia;
require './tpl/head_guia.php';

?>
<div class="container">
    <div class="row">
        <div class="col">
        <?php
            if(isset($_GET['msg'])) {
                if($_GET['msg'] === 'exito_delete'){
                    echo '<div class="alert alert-success">La guia se elimino con exito</div>';
                }
                if($_GET['msg'] === 'error_delete'){
                    echo '<div class="alert alert-danger">Ocurrio un error al eliminar</div>';
                }
            }
        ?>
        <h1 class="text-center mb-3">Guias</h1>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Guia</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach(Guia::guias() as $g){
                    ?>
                    <tr>
                       <td><?php echo $g['id']?></td>
                       <td><?php echo $g['nombre']?></td>
                       <td><?php echo $g['guia']?></td>
                       <td><?php echo $g['fecha']?></td>
                       <td><a href="editar_guia.php?id=<?php echo $g['id']?>">Editar</a> <a href="functions/functions.php?action=delete_guia&id=<?php echo $g['id']?>">Borrar</a></td>
                    </tr>
                        <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require './tpl/footer.php';