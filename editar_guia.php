<?php
require './start.php';
use App\Controllers\Guia;
require './tpl/head_guia.php';
$guia = Guia::get_guia($_GET['id']);
?>
<div class="container">
    <div class="row">
        <div class="col">
        <?php
            if(isset($_GET['msg'])) {
                if($_GET['msg'] === 'exito'){
                    echo '<div class="alert alert-success">La guia se edito con exito</div>';
                }
                if($_GET['msg'] === 'error'){
                    echo '<div class="alert alert-danger">Ocurrio un error</div>';
                }
            }
        ?>
            <h1 class="text-center mb-3">Editar Guia</h1>
            <form action="functions/functions.php?action=edit_guia" method="post" class="row">
                <div class="col-md-6 col-12 form-group">
                    <label for="">Nombre y Apellido *</label>
                    <input type="text" name="nombre" value="<?php echo $guia->nombre?>" class="form-control" placeholder="Nombre y Apellido" required>
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="">DNI</label>
                    <input type="number" name="dni" value="<?php echo $guia->dni?>" class="form-control" placeholder="DNI">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?php echo $guia->email?>" class="form-control" placeholder="Email">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="">Transporte *</label>
                    <select name="transporte" id="" class="form-control" required>
                        <option value=""> -- seleccione -- </option>
                        <option value="Andreani" <?php echo $guia->transporte === 'Andreani' ? 'selected' : '' ;?>>Andreani</option>
                        <option value="Expreso Cargo" <?php echo $guia->transporte === 'Expreso Cargo' ? 'selected' : '' ;?>>Expreso Cargo</option>
                        <option value="Via Cargo" <?php echo $guia->transporte === 'Via Cargo' ? 'selected' : '' ;?>>Via Cargo</option>
                        <option value="Otros" <?php echo $guia->transporte === 'Otros' ? 'selected' : '' ;?>>Otros</option>
                    </select>
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="">Fecha *</label>
                    <input type="date" name="fecha" value="<?php echo $guia->fecha?>" class="form-control" placeholder="Fecha" required>
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="">Guia *</label>
                    <input type="text" name="guia" value="<?php echo $guia->guia?>" class="form-control" placeholder="Guia" required>
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="">Nº de operación</label>
                    <input type="number" name="operacion" value="<?php echo $guia->operacion?>" class="form-control" placeholder="Nº de Operación">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="">Código Postal</label>
                    <input type="number" name="cp" value="<?php echo $guia->cp?>" class="form-control" placeholder="Código postal">
                </div>
                <div class="col-12 form-group">
                    <label for="">Observaciones</label>
                    <textarea name="observaciones" class="form-control"><?php echo $guia->observaciones?></textarea>
                </div>
                <input type="hidden" name="id" value="<?php echo $guia->id?>">
                <div class="col-12 form-group">
                    <button type="submit" class="btn btn-lg btn-primary" name="agregar_guia">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require './tpl/footer.php';