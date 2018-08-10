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
        <div class="row">
            <div class="col-md-12">
            <form id="contactForm" class="form-horizontal">
                <div class="form-group">
                    <label class="col-xs-3 control-label">Nombre completo</label>
                    <div class="col-xs-4">
                        <input type="text" class="form-control" name="firstName" placeholder="Primer nombre" />
                    </div>
                    <div class="col-xs-4">
                        <input type="text" class="form-control" name="lastName" placeholder="Segundo nombre" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-3 control-label">Telefono</label>
                    <div class="col-xs-5">
                        <input type="text" class="form-control" name="phoneNumber" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-3 control-label">Email</label>
                    <div class="col-xs-5">
                        <input type="text" class="form-control" name="email" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-3 control-label">Mensaje</label>
                    <div class="col-xs-9">
                        <textarea class="form-control" name="message" rows="7"></textarea>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label class="col-xs-3 control-label" id="captchaOperation"></label>
                    <div class="col-xs-3">
                        <input type="text" class="form-control" name="captcha" />
                    </div>
                </div> -->

                <div class="form-group">
                    <div class="col-xs-9 col-xs-offset-3">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
            <script>
                $(function () {
                    // Generate a simple captcha
                    function randomNumber(min, max) {
                        return Math.floor(Math.random() * (max - min + 1) + min);
                    }

                    function generateCaptcha() {
                        $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
                    }

                    generateCaptcha();

                $('#contactForm')
                .formValidation({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'fa fa-ok',
                        invalid: 'fa fa-remove',
                        validating: 'fa fa-refresh'
                    },
                    fields: {
                        firstName: {
                            row: '.col-xs-4',
                            validators: {
                                notEmpty: {
                                    message: 'El primer nombre es requerido'
                                }
                            }
                        },
                        lastName: {
                            row: '.col-xs-4',
                            validators: {
                                notEmpty: {
                                    message: 'El segundo nombre es requerido'
                                }
                            }
                        },
                        phoneNumber: {
                            validators: {
                                notEmpty: {
                                    message: 'El teléfono es requerido'
                                },
                                regexp: {
                                    message: 'El número teléfonico solo puede contener digitos, espacios, -, (, ), + y .',
                                    regexp: /^[0-9\s\-()+\.]+$/
                                }
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'El email es requerido'
                                },
                                emailAddress: {
                                    message: 'El dato no es un email válido'
                                }
                            }
                        },
                        message: {
                            validators: {
                                notEmpty: {
                                    message: 'El mensage es requerido'
                                },
                                stringLength: {
                                    max: 700,
                                    message: 'El mensage solo puede tener como máximo 700 caracteres'
                                }
                            }
                        },
                        captcha: {
                            validators: {
                                callback: {
                                    message: 'Wrong answer',
                                    callback: function(value, validator, $field) {
                                        var items = $('#captchaOperation').html().split(' '),
                                            sum   = parseInt(items[0]) + parseInt(items[2]);
                                        return value == sum;
                                    }
                                }
                            }
                        }
                    }
                })
                .on('err.form.fv', function(e) {
                    // Regenerate the captcha
                    generateCaptcha();
                });
        });
        </script>
    </body>
</html>