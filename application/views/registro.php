<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Despachos | Login</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            padding-top: 30px;
        }
        .errorValidation{
            color:red;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Registrarse</h4>
                    </div>
                    <div class="panel-body">    
                        <form action="<?php echo base_url(); ?>auth/store" method="POST">
                            <?php if ($this->session->flashdata("success")): ?>
                                <div class="alert alert-success text-center">
                                    <strong>Bien!</strong> <?php echo $this->session->flashdata("success"); ?>
                                </div>
                            <?php endif ?>
                            <?php if ($this->session->flashdata("error")): ?>
                                <div class="alert alert-danger text-center">
                                    <strong>Error!</strong> <?php echo $this->session->flashdata("success"); ?>
                                </div>
                            <?php endif ?>
                            <div class="form-group">
                                <label for="cedula">Cedula:</label>
                                <input type="text" name="cedula" id="cedula" class="form-control" required="required" value="<?php echo set_value('cedula'); ?>">
                                <?php echo form_error('cedula', '<span class="help-block errorValidation">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nombres">Nombres Completo:</label>
                                <input type="text" name="nombres" id="nombres" class="form-control" required="required" value="<?php echo set_value('nombres'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email'); ?>" required="required">
                                <?php echo form_error('email', '<span class="help-block errorValidation">', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" name="password" id="password" class="form-control" required="required" value="<?php echo set_value('password'); ?>">
                                
                            </div>
                            <div class="form-group">
                                <label for="confirmarpassword">Repita Contraseña:</label>
                                <input type="password" name="confirmarpassword" id="confirmarpassword" class="form-control" required="required" value="<?php echo set_value('confirmarpassword'); ?>">
                                <?php echo form_error('confirmarpassword', '<span class="help-block errorValidation">', '</span>'); ?>
                                
                            </div>

                            <div class="form-group">
                                <label for="">Sexo:</label>
                               <label class="radio-inline">
                                    <input type="radio" name="sexo" value="M" checked="checked">Masculino
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sexo" value="F">Femenino
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="registrar" value="Registrase" class="btn btn-primary">
                                <a href="<?php echo base_url(); ?>auth/login" class="btn btn-success">Iniciar Sesión</a>
                            </div>
                        </form>
                    </div>  
                </div>
                
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>