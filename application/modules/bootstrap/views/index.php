<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>ParamQuery - General</title>
		<!-- jQuery dependencies -->
		<link rel="stylesheet" href="<?php echo base_url() ?>resources/jquery-ui-1.12.1/css/jquery-ui.min.css" /> 
		<script src="<?php echo base_url() ?>resources/jquery-3.2.1/js/jquery.min.js"></script>
		<script src="<?php echo base_url() ?>resources/jquery-ui-1.12.1/js/jquery-ui.min.js"></script>
		<!-- PQ Grid files -->   
		<link rel="stylesheet" href="<?php echo base_url() ?>resources/paramquery-2.2.0/css/pqgrid.min.css" >
		<script src="<?php echo base_url() ?>resources/paramquery-2.2.0/js/pqgrid.min.js"></script>
		<!-- Bootstrap dependencies -->
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/bootstrap-3.3.7/css/bootstrap.min.css" /> 
        <script src="<?php echo base_url() ?>resources/bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <!-- FormValidation -->
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/formvalidations-0.6.2/css/formValidation.min.css" />
        <script src="<?php echo base_url() ?>resources/formvalidations-0.6.2/js/formValidation.min.js"></script>
        <script src="<?php echo base_url() ?>resources/formvalidations-0.6.2/js/bootstrap.js"></script>
        <!-- Fontawesome -->
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/font-awesome-4.7.0/css/font-awesome.min.css" />
        <style type="text/css">
            #loginForm .has-error .control-label,
            #loginForm .has-error .help-block,
            #loginForm .has-error .form-control-feedback {
                color: #f39c12;
            }

            #loginForm .has-success .control-label,
            #loginForm .has-success .help-block,
            #loginForm .has-success .form-control-feedback {
                color: #18bc9c;
            }
        </style>
	</head>
	<body style="margin: 100px">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url()?>">Pruebas ILCE</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ParamQuery<span class="caret"></span></a>
                            <ul class="dropdown-menu" style="width:100%;">
                                <li><a href="<?php echo base_url() ?>paramquery/general">General</a></li>
                                <li><a href="<?php echo base_url() ?>paramquery/filtros">Filtros</a></li>
                                <li><a href="<?php echo base_url() ?>paramquery/grupos">Grupos</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url() ?>clientes/registrar_cliente">Form Validations</a></li>
                        <li><a href="<?php echo base_url() ?>bootstrap/index">Bootstrap</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PDF<span class="caret"></span></a>
                            <ul class="dropdown-menu" style="width:100%;">
                                <li><a href="<?php echo base_url() ?>pdfreporter/fpdf">FPDF</a></li>
                                <li><a href="<?php echo base_url() ?>pdfreporter/mpdf">mPDF</a></li>
                                <li><a href="<?php echo base_url() ?>pdfreporter/dompdf">DomPDF</a></li>
                                <li><a href="<?php echo base_url() ?>pdfreporter/pdfjs">PDF.js</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Google Calendar<span class="caret"></span></a>
                            <ul class="dropdown-menu" style="width:100%;">
                                <li><a href="<?php echo base_url() ?>calendar/index">Listar eventos</a></li>
                                <li><a href="<?php echo base_url() ?>calendar/registrar">Registrar evento</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
		</nav>
		<div class="container">
            <h2>Botones</h2>    
            <button type="button" class="btn btn-primary">Primary</button>
            <button type="button" class="btn btn-secondary">Secondary</button>
            <button type="button" class="btn btn-success">Success</button>
            <button type="button" class="btn btn-info">Info</button>
            <button type="button" class="btn btn-warning">Warning</button>
            <button type="button" class="btn btn-danger">Danger</button>
            <button type="button" class="btn btn-link">Link</button>
            <h2>Tablas</h2>
            <table class="table table-striped table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                    <th>#</th>
                    <th>Column heading</th>
                    <th>Column heading</th>
                    <th>Column heading</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>1</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    </tr>
                    <tr>
                    <td>2</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    </tr>
                    <tr class="table-info">
                    <td>3</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    </tr>
                    <tr class="table-success">
                    <td>4</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    </tr>
                    <tr class="table-danger">
                    <td>5</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    </tr>
                    <tr class="table-warning">
                    <td>6</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    </tr>
                    <tr class="table-active">
                    <td>7</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                    </tr>
                </tbody>
                </table>
                <h2>Alertas</h2>
                <div class="alert alert-dismissible alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Cuidado!</h4>
                <p>Mensaje de alerta</p>
                </div>
                <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
                </div>
                <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
                </div>
                <div class="alert alert-dismissible alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Heads up!</strong> This <a href="#" class="alert-link">alert needs your attention</a>, but it's not super important.
                </div>
                <h2>Listas</h2>
                <div class="list-group">
                <a href="#" class="list-group-item  list-group-item-action active">
                    Cras justo odio
                </a>
                <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in
                </a>
                <a href="#" class="list-group-item list-group-item-action disabled">Morbi leo risus
                </a>
                </div>
            </div>
		</div>
		<script>
			$(function () {
                
            });
		</script>
	</body>
</html>