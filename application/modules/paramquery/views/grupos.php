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
            <br><br><br><br>
            <div id="grid_group" style="margin:auto;"></div>
            <br><br><br><br>
		</div>
		<script>
			$(function () {

                //columns in data array : Sr No, Company Name, Revenues(domestic), Revenues(export), expenditure
                var data = [[1, 'Exxon Mobil', 'Ex', '339,938.0', '36,130.0', '23,333.0'],
                    [2, 'Wal-Mart Stores', 'WS', '315,654.0', '11,231.0', '24,342.0'],
                    [3, 'Royal Dutch Shell', 'RDS', '306,731.0', '25,311.0', '56,231.2'],
                    [4, 'BP', 'B', '267,600.0', '22,341.0', '71,923.4'],
                    [5, 'General Motors', 'GM', '192,604.0', '-10,567.0', '52,934.0'],
                    [6, 'Chevron', 'C', '189,481.0', '14,099.0', '12,023.5'],
                    [7, 'DaimlerChrysler', 'DC', '186,106.3', '3,536.3', '42,734.0'],
                    [8, 'Toyota Motor', 'TM', '185,805.0', '12,119.6', '57,023.4'],
                    [9, 'Ford Motor', 'FM', '177,210.0', '2,024.0', '22,896.0'],
                    [10, 'ConocoPhillips', 'CP', '166,683.0', '13,529.0', '72,456.0'],
                    [11, 'General Electric', 'GE', '157,153.0', '16,353.0', '16,912.5'],
                    [12, 'Total', 'T', '152,360.7', '15,250.0', '74,236.5'],
                    [13, 'ING Group', 'IG', '138,235.3', '8,958.9', '52,012.9'],
                    [14, 'Citigroup', 'CG', '131,045.0', '24,589.0', '90,342.0'],
                    [15, 'AXA', 'A', '129,839.2', '5,186.5', '13,043.8'],
                    [16, 'Allianz', 'AZ', '121,406.0', '5,442.4', '19,529.5'],
                    [17, 'Volkswagen', 'VW', '118,376.6', '1,391.7', '84,472.7'],
                    [18, 'Fortis', 'F', '112,351.4', '4,896.3', '83,473.0'],
                    [19, 'Crédit Agricole', 'CA', '110,764.6', '7,434.3', '14,567.4'],
                    [20, 'American Intl. Group', 'AIG', '108,905.0', '10,477.0', '10,533.0']];

                for (var i = 0; i < data.length; i++) {
                    //rev(total)
                    var revDom = parseFloat(data[i][3].replace(",", ""));
                    var revExp = parseFloat(data[i][4].replace(",", ""));
                    var expenditure = parseFloat(data[i][5].replace(",", ""));
                    data[i][6] = revTotal = revDom + revExp;
                    //profits
                    data[i][7] = revTotal - expenditure;
                }
                //calculate Rank based on profits
                data = data.sort(function (obj1, obj2) {
                    var val1 = obj1[7];
                    var val2 = obj2[7];
                    val1 = val1 ? parseInt(val1) : 0;
                    val2 = val2 ? parseInt(val2) : 0;

                    return (val2 - val1);
                });
                for (var i = 0; i < data.length; i++) {
                    var rdata = data[i];
                    //Rank
                    rdata[8] = (i + 1);
                    rdata[9] = Math.random();
                    rdata[10] = Math.random();
                    rdata[11] = Math.random();
                    rdata[12] = Math.random();
                    rdata[13] = Math.random();
                    rdata[14] = Math.random();
                    rdata[15] = Math.random();
                    rdata[16] = Math.random();
                }

                var obj = { width: 1100,
                    height: 500,            
                    showTop:false,
                    title: "Grid with header grouping",
                    showBottom: false,
                    hoverMode: 'cell',
                    selectionModel: { type: 'cell' },            
                    freezeCols: 1,
                    minWidth: 90,            
                    numberCell: { show: true },
                    editable: true,
                    resizable: true
                };
                obj.columnTemplate = {width:100, align:'right'};
                obj.colModel = 
                    [{ title: "Some No", colModel: [] },
                    { title: "Company", width: 140, align: "center", colModel: [{ title: "Company A" }, { title: "Company B"}] },
                    { title: "Balance Sheet", align: "center", colModel: [
                        { title: "Revenues ($ millions)", dataType: "float", align: "center", colModel: [
                            { title: "Domestic", dataIndx: 3, align: "right", dataType: "float" },
                            { title: "Exports", dataIndx: 4, align: 'right', dataType: "float" },
                            { title: "Total", width: 120, editable: false, dataIndx: 6, align: "right", dataType: "float", render: function (ui) {
                                return $.paramquery.formatCurrency(ui.rowData[ui.dataIndx]);
                            }
                            }
                        ]
                        },
                        { title: "Expenditure <br /> ($ millions)", dataType: "float", align: "right", dataIndx: 5 },
                        { title: "Profits ($ millions)<br/>Revenues - Expenditure", width: 140, dataType: "float", align: "right", editable: false, dataIndx: 7, render: function (ui) {
                            return $.paramquery.formatCurrency(ui.rowData[ui.dataIndx]);
                        }
                        }
                        ]
                    },
                //{ title: "Rank", editable: false, width: 140, align: 'center', dataIndx: 7}];
                {title: "Rank", align: 'center', colModel: [{ dataIndx: 8, title: "Rank1" }, { title: "Rank2", colModel:
                    [{ title: "Rank21" }, { title: "Rank 22", colModel: [{ title: "Rank 221" }, { title: "Rank 222", colModel: [{ title: "Rank 2221" }, { title: "Rank 2222" }, { title: "Rank 2223"}]}]
                    }, { title: "Rank 3"}]
                }
                ]
            }, { title: "Column", align: "center", colModel: [{ title: "Column1" }, { title: "Column2"}]}];
            
            obj.dataModel = {
                data: data,
                sortIndx: 1
            };
            var $grid = $("#grid_group").pqGrid(obj);

            });
		</script>
	</body>
</html>