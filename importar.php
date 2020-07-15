<?php
require './start.php';
use Controllers\Guia;
require './tpl/head_guia.php';

?>
<div class="container">
    <div class="row">
        <div class="col">
			<div class="text-center mb-5"><a href="http://seguimiento.tp3d.com.ar/ejemplo2.xlsx">Descargar Archivo de ejemplo</a> Luego de cambiar los datos, guardar como CSV para importar</div>
        <?php
            if(isset($_GET['msg'])) {
                if($_GET['msg'] === 'exito'){
                    echo '<div class="alert alert-success">Importado con exito</div>';
                }
                if($_GET['msg'] === 'error'){
                    echo '<div class="alert alert-danger">Ocurrio un error</div>';
                }
            }
        ?>
            <form action="functions/functions.php?action=importar_guia" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Subir archivo</label>
                    <input type="file" name="importar" id="importar" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="impo" class="btn btn-primary">Importar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require './tpl/footer.php';