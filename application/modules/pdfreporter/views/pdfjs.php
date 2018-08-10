<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
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
        <div class="container" style="padding-top: 150px">
            <div class="text-center">
                <h1>Sample PDF.js</h1>
                <a id="loadpdf" class="btn btn-primary btn-lg">
                    <i class="fa fa-file-pdf-o"></i> Generar PDF
                </a>
                <br>
                <canvas id="the-canvas"></canvas>
            </div>
        </div>
        <!-- <script src="<?php echo base_url() ?>resources/pdfjs-1.9.426/js/pdf.js"></script> -->
        <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
        <!-- <script src="<?php echo base_url() ?>resources/pdfjs-1.9.426/js/pdf.worker.js"></script> -->
        <script>
            $(function(){
                $("#loadpdf").click(function(){
                    var url = '<?php echo base_url() ?>' + 'resources/saes/content/fpdf.pdf';
                    //var worker = <?php echo base_url() ?> + 'resources/pdfjs-1.9.426/js/pdf.worker.js';

                    // If absolute URL from the remote server is provided, configure the CORS
                    // header on that server.
                    //var url = 'http://cdn.mozilla.net/pdfjs/helloworld.pdf';

                    // Disable workers to avoid yet another cross-origin issue (workers need
                    // the URL of the script to be loaded, and dynamically loading a cross-origin
                    // script does not work).
                    // PDFJS.disableWorker = true;

                    // The workerSrc property shall be specified.
                    PDFJS.workerSrc = 'http://mozilla.github.io/pdf.js/build/pdf.worker.js';

                    // Asynchronous download of PDF
                    var loadingTask = PDFJS.getDocument(url);
                    loadingTask.promise.then(function(pdf) {
                    console.log('PDF loaded');
                    
                    // Fetch the first page
                    var pageNumber = 1;
                    pdf.getPage(pageNumber).then(function(page) {
                        console.log('Page loaded');
                        
                        var scale = 1.5;
                        var viewport = page.getViewport(scale);

                        // Prepare canvas using PDF page dimensions
                        var canvas = document.getElementById('the-canvas');
                        var context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        // Render PDF page into canvas context
                        var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                        };
                        var renderTask = page.render(renderContext);
                        renderTask.then(function () {
                        console.log('Page rendered');
                        });
                    });
                    }, function (reason) {
                    // PDF loading error
                    console.error(reason);
                    });
                });
            });
        </script>
    </body>
</html>
