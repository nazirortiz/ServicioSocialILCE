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
		<div class="container">
			<div id="grid_json" style="margin:100px;"></div>
		</div>
		<script>
			$(function () {

				var data = [
					{ rank: 1, company: 'Exxon Mobil', revenues: '339938.0', profits: '36130.0' },
					{ rank: 2, company: 'Wal-Mart Stores', revenues: '315654.0', profits: '11231.0' },
					{ rank: 3, company: 'Royal Dutch Shell', revenues: '306731.0', profits: '25311.0' },
					{ rank: 4, company: 'BP', revenues: '267600.0', profits: '22341.0' },
					{ rank: 5, company: 'General Motors', revenues: '192604.0', profits: '-10567.0' },
					{ rank: 6, company: 'Chevron', revenues: '189481.0', profits: '14099.0' },
					{ rank: 7, company: 'DaimlerChrysler', revenues: '186106.3', profits: '3536.3' },
					{ rank: 8, company: 'Toyota Motor', revenues: '185805.0', profits: '12119.6' },
					{ rank: 9, company: 'Ford Motor', revenues: '177210.0', profits: '2024.0' },
					{ rank: 10, company: 'ConocoPhillips', revenues: '166683.0', profits: '13529.0' },
					{ rank: 11, company: 'General Electric', revenues: '157153.0', profits: '16353.0' },
					{ rank: 12, company: 'Total', revenues: '152360.7', profits: '15250.0' },
					{ rank: 13, company: 'ING Group', revenues: '138235.3', profits: '8958.9' },
					{ rank: 14, company: 'Citigroup', revenues: '131045.0', profits: '24589.0' },
					{ rank: 15, company: 'AXA', revenues: '129839.2', profits: '5186.5' },
					{ rank: 16, company: 'Allianz', revenues: '121406.0', profits: '5442.4' },
					{ rank: 17, company: 'Volkswagen', revenues: '118376.6', profits: '1391.7' },
					{ rank: 18, company: 'Fortis', revenues: '112351.4', profits: '4896.3' },
					{ rank: 19, company: 'Crédit Agricole', revenues: '110764.6', profits: '7434.3' },
					{ rank: 20, company: 'American Intl. Group', revenues: '108905.0', profits: '10477.0' }
				];

				var obj = { 
					numberCell:{resizable:true,title:"#",width:30,minWidth:30},
					editor: {type: 'textbox'},
					title: "ParamQuery Grid with JSON Data",
					resizable:true,
					scrollModel:{autoFit:true, theme:true}
				};

				obj.colModel = [
					{ title: "Rank", width: 100, dataType: "integer", dataIndx: "rank" },
					{ title: "Company", width: 200, dataType: "string", dataIndx: "company" },
					{ title: "Revenues ($ millions)", width: 150, dataType: "float", align: "right", dataIndx: "revenues" },
					{ title: "Profits ($ millions)", width: 150, dataType: "float", align: "right", dataIndx: "profits" }
				];

				obj.dataModel = { data: data };

				$("#grid_json").pqGrid(obj);
			});
		</script>
	</body>
</html>