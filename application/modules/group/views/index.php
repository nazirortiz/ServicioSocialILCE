<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Pruebas de ParamQuery</title>
        <!-- jQuery dependencies -->
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/jquery-ui-1.12.1/css/jquery-ui.min.css" /> 
        <script src="<?php echo base_url() ?>resources/jquery-3.2.1/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>resources/jquery-ui-1.12.1/js/jquery-ui.min.js"></script>
        <!-- Bootstrap dependencies -->
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/bootstrap-3.3.7/css/bootstrap.min.css" /> 
        <script src="<?php echo base_url() ?>resources/bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <!-- PQ Grid files -->   
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/paramquery-2.2.0/css/pqgrid.min.css" >
        <script src="<?php echo base_url() ?>resources/paramquery-2.2.0/js/pqgrid.min.js"></script>
    </head>
    <body>
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
                        <li><a href="<?php echo base_url() ?>groups/index">Grupos</a></li>
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
    </body>
</html>