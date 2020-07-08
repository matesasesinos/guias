<?php
require './tpl/head_guia.php';
?>
<div class="container">
    <div class="row">
        <div class="col">
        <?php
            if(isset($_GET['msg'])) {
                if($_GET['msg'] === 'exito'){
                    echo '<div class="alert alert-success">La guia se agrego con exito</div>';
                }
                if($_GET['msg'] === 'error'){
                    echo '<div class="alert alert-danger">Ocurrio un error</div>';
                }
            }
        ?>
            <h1 class="text-center mb-3">Cargar Guia</h1>
            <form action="functions/functions.php?action=add_guia" method="post" class="row">
                <div class="col-md-6 col-12 form-group">
                    <label for="">Nombre y Apellido *</label>
                    <input type="text" name="nombre" value="" class="form-control" placeholder="Nombre y Apellido" required>
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="">DNI</label>
                    <input type="number" name="dni" value="" class="form-control" placeholder="DNI">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="" class="form-control" placeholder="Email">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="">Transporte *</label>
                    <select name="transporte" id="" class="form-control" required>
                        <option value="" selected> -- seleccione -- </option>
                        <option value="Andreani">Andreani</option>
                        <option value="Expreso Cargo">Expreso Cargo</option>
                        <option value="Via Cargo">Via Cargo</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="">Fecha *</label>
                    <input type="date" name="fecha" value="" class="form-control" placeholder="Fecha" required>
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="">Guia *</label>
                    <input type="text" name="guia" value="" class="form-control" placeholder="Guia" required>
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="">Nº de operación</label>
                    <input type="number" name="operacion" value="" class="form-control" placeholder="Nº de Operación">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="">Código Postal</label>
                    <input type="number" name="cp" value="" class="form-control" placeholder="Código postal">
                </div>
                <div class="col-12 form-group">
                    <label for="">Observaciones</label>
                    <textarea name="observaciones" class="form-control"></textarea>
                </div>
                <div class="col-12 form-group">
                    <button type="submit" class="btn btn-lg btn-primary" name="agregar_guia">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require './tpl/footer.php';