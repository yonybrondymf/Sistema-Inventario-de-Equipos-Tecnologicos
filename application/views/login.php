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
    </style>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Iniciar Sesión</h4>
                    </div>
                    <div class="panel-body">    
                        <form action="<?php echo base_url(); ?>auth/verificar" method="POST">
                            <?php if ($this->session->flashdata("error")): ?>
                                <div class="alert alert-danger text-center">
                                    <strong>Error!</strong> <?php echo $this->session->flashdata("error"); ?>
                                </div>
                            <?php endif ?>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                
                                <input type="submit" name="login" value="Iniciar Sesión" class="btn btn-primary">
                                <a href="<?php echo base_url(); ?>auth/registro" class="btn btn-success">Registrase</a>
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