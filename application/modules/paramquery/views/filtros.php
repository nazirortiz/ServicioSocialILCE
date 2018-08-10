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
            <div style="margin:auto;text-align:center;">
                <input id="range_chkbox" type="checkbox"> Use range condition in Shipping Region (Range condition allows multiple values)
            </div>
            <div id="grid_filter" style="margin:5px auto;"></div>    
            <br><br><br><br>
		</div>
		<script>
			$(function () {

                function pqDatePicker(ui) {
                    
                    var $this = $(this);
                    
                    $this
                        .css({ zIndex: 3, position: "relative" })
                        .datepicker({
                            yearRange: "-20:+0", //20 years prior to present.
                            changeYear: true,
                            changeMonth: true,
                            //showButtonPanel: true,
                            onClose: function (evt, ui) {
                                $(this).focus();
                            }
                        });

                    //default From date
                    $this.filter(".pq-from").datepicker("option", "defaultDate", new Date("01/01/1996"));
                    
                    //default To date
                    $this.filter(".pq-to").datepicker("option", "defaultDate", new Date("12/31/1998"));
                }
                //define colModel
                var colM = [
                { 
                    title: "ShipCountry", 
                    width: 100, 
                    dataIndx: "ShipCountry",
                    filter: { 
                        type: 'textbox', 
                        condition: 'contain', 
                        listeners: ['keyup'] 
                    }
                },
                { title: "Nombre cliente", width: 120, dataIndx: "ContactName",
                    filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] }
                },
                { title: "Orden ID", minWidth: 130, dataIndx: "OrderID", dataType: "integer",
                    filter: { type: 'textbox', condition: "between", listeners: ['keyup'] }
                },
                { title: "Orden Fecha", minWidth: "190", dataIndx: "OrderDate", dataType: "date",
                    filter: { type: 'textbox', condition: "between", init: pqDatePicker, listeners: ['change'] }
                },
                { title: "Region", width: 130, dataIndx: "ShipRegion",
                    filter: { 
                        type: 'select',
                        condition: 'equal',
                        valueIndx: "ShipRegion",
                        labelIndx: "ShipRegion",
                        groupIndx: "ShipCountry",
                        prepend: { '': '--Selecciona--' },
                        listeners: ['change']
                    }
                },
                { title: "Pagada", width: 100, dataIndx: "paid", dataType: "bool", align: "center",
                    filter: { type: "checkbox", subtype: 'triple', condition: "equal", listeners: ['click'] }
                },
                { title: "Vía de envío", width: 130, dataIndx: "ShipVia",
                    filter: { type: "select",
                        condition: 'equal',
                        prepend: { '': '--Select--' },
                        valueIndx: "ShipVia",
                        labelIndx: "ShipVia",
                        listeners: ['change']
                    }
                },
                { title: "Required Date", width: 100, dataIndx: "RequiredDate", dataType: "date" },
                { title: "Shipped Date", width: 100, dataIndx: "ShippedDate", dataType: "date" },
                { title: "Freight", width: 100, align: "right", dataIndx: "Freight", dataType: "float" },
                { title: "Shipping Name", width: 150, dataIndx: "ShipName" },
                { title: "Shipping Address", width: 270, dataIndx: "ShipAddress" },
                { title: "Shipping City", width: 100, dataIndx: "ShipCity" },
                { title: "Shipping Postal Code", width: 150, dataIndx: "ShipPostalCode" }
                ];

                //define dataModel
                var dataModel = {
                    location: "local",
                    sorting: "local",
                    sortIndx: "OrderID",
                    sortDir: "up"
                }

                var obj = { 
                    width: 1100, 
                    height: 600,
                    dataModel: dataModel,
                    colModel: colM,
                    hwrap: false,
                    pageModel: { type: "local", rPP: 50 },
                    editable: false,
                    selectionModel: { type: 'cell' },
                    filterModel: { on: true, mode: "AND", header: true },
                    title: "Shipping Orders",
                    resizable: true,
                    numberCell: { show: false },
                    columnBorders: true
                    // freezeCols: 2        
                };

                var $grid = $("#grid_filter").pqGrid(obj);

                //load all data at once
                $grid.pqGrid("showLoading");

                $.ajax({ 
                    url:"<?php echo base_url() ?>resources/saes/content/orders.json",
                    //url: "/pro/orders/get",//for ASP.NET
                    //url: "/orders.php", //for PHP
                    cache: false,
                    async: true,
                    dataType: "JSON",
                    success: function (response) {
                        $grid.pqGrid("option", "dataModel.data", response.data);

                        //load shipregion and shipvia dropdowns.
                        var column = $grid.pqGrid("getColumn", { dataIndx: "ShipRegion" });
                        var filter = column.filter;
                        filter.cache = null;
                        filter.options = $grid.pqGrid("getData", { dataIndx: ["ShipCountry", "ShipRegion"] });

                        var column = $grid.pqGrid("getColumn", { dataIndx: "ShipVia" });
                        var filter = column.filter;
                        filter.cache = null;
                        filter.options = $grid.pqGrid("getData", { dataIndx: ["ShipVia"] });

                        $grid.pqGrid("refreshDataAndView");
                        $grid.pqGrid("hideLoading");
                    }
                });

                //change shipping region filter based upon checkbox.
                $("#range_chkbox").click(function (evt) {
                    
                    var filter = $grid.pqGrid("getColumn", { dataIndx: "ShipRegion" }).filter;

                    if ($(this).is(":checked")) {
                        $.extend(filter, {
                            attr: "multiple",
                            condition: "range",
                            prepend: { '': '[ Empty ]' },
                            value: [],
                            cache: null,
                            style: "height:120px;"
                        });
                    }
                    else {
                        $.extend(filter, {
                            attr: "",
                            condition: "equal",
                            prepend: { '': '--Select--' },
                            value: null,
                            cache: null,
                            style: ""
                        });
                    }

                    //refresh the filter and view.
                    $grid.pqGrid("filter", { oper: 'add', data: [] }).pqGrid("refresh");
                });

            });
		</script>
	</body>
</html>