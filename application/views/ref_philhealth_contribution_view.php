<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title>JCORE - <?php echo $title; ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">

    <?php echo $_def_css_files; ?>

    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">



    <link type="text/css" href="assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck -->
    <link type="text/css" href="assets/plugins/iCheck/skins/minimal/_all.css" rel="stylesheet">                   <!-- Custom Checkboxes / iCheck -->
    
    <link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">


    <link href="assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <style>

        .toolbar{
            float: left;
        }

        td.details-control {
            background: url('assets/img/Folder_Closed.png') no-repeat center center;
            cursor: pointer;
        }
        tr.details td.details-control {
            background: url('assets/img/Folder_Opened.png') no-repeat center center;
        }

        .child_table{
            padding: 5px;
            border: 1px #ff0000 solid;
        }

        .glyphicon.spinning {
            animation: spin 1s infinite linear;
            -webkit-animation: spin2 1s infinite linear;
        }
        .select2-container{
            min-width: 100%;
        }
        @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
        }

        .numeric{
            text-align: right;
            width: 60%;
        }

        .dataTables_filter input {
        	width:215px !important;
        }

        .ph_logo {
        	width:40px;
        	height:40px;
        	padding-right:14px;
        	margin-bottom:5px;
        }

    </style>

</head>

<body class="animated-content" style="font-family: tahoma;">

<?php echo $_top_navigation; ?>

<div id="wrapper">
    <div id="layout-static">

        <?php echo $_side_bar_navigation;?>

        <div class="static-content-wrapper white-bg">
            <div class="static-content" >
                <div class="page-content">

                    <ol class="breadcrumb" style="margin-bottom:0px;">
                        <li><a href="dashboard">Dashboard</a></li>
                        <li><a href="RefPhilHealth_Contribution">PhilHealth Contribution</a></li>
                    </ol>

                    <div class="container-fluid">

                        <div id="div_product_list">
                            <div class="panel panel-default">
                                        <button class="btn"  id="btn_new" style="width:288px;font-family: Tahoma, Georgia, Serif;background-color:#2ecc71;color:white;margin-top:10px;margin-left:17px;" title="Create New PhilHealth Contribution" >
                                        <i class="fa fa-file"></i> New PhilHealth Contribution</button>
                                        <div class="panel-heading" style="background-color:#2c3e50 !important;margin-top:5px;margin-left:17px;margin-right:17px;border-radius:5px;">
                                             <center><h2 style="color:white;font-weight:300;"><img class="ph_logo" src="assets/img/Philhealth.png"><b>PHILHEALTH</b></h2></center>
                                        </div>
                                    <div class="panel-body table-responsive" style="padding-top:8px;">
                                        <table id="tbl_philhealth_contribution_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th style="background-color:#7c8618;color:#FFF;">Salary Range From</th>
                                                    <th style="background-color:#7c8618;color:#FFF;">Salary Range To</th>
                                                    <th style="background-color:#7c8618;color:#FFF;">Employee Share</th>
                                                    <th style="background-color:#7c8618;color:#FFF;">Employer Share</th>
                                                    <th style="background-color:#7c8618;color:#FFF;">Total Premium</th>
                                                    <th style="background-color:#7c8618;color:#FFF;"><center>Action</center></th>
                                                 </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                <div class="panel-footer"></div>
                            </div> <!--panel default -->

                        </div> <!--rates and duties list -->
                    </div><!-- .container-fluid -->
                </div> <!-- #page-content -->
            </div><!--static content -->
            
        </div><!--content wrapper -->
    </div><!--static layout -->
</div> <!--wrapper -->

            <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content"><!---content--->
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title"><span id="modal_mode"> </span>Confirm Deletion</h4>
                        </div>

                        <div class="modal-body">
                            <p id="modal-body-message">Are you sure ?</p>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                            <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                    </div><!---content---->
                </div>
                </div>
            </div><!---modal-->
            <div id="modal_create_philhealth_contribution" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#2ecc71;">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:#ecf0f1;"><span id="modal_mode"> </span>PhilHealth Contribution : New</h4>
                        </div>

                        <div class="modal-body">
                            <form id="frm_philhealth_contribution">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                	<hr style="border-bottom:1px solid;">

                                	<label class="boldlabel">RANGE OF COMPENSATION</label><br>
                                    <label class="boldlabel">Salary Range From :</label>
                                    <input class="form-control numeric" id="salary_range_from" name="salary_range_from" placeholder="Ex: 9,250.00" data-error-msg="This is Required!">
                                	<label class="boldlabel">Salary Range To :</label>
                                    <input class="form-control numeric" id="salary_range_to" name="salary_range_to" placeholder="Ex: 9,250.00" data-error-msg="This is Required!">

                                    <hr style="border-bottom:1px solid;">

                                    <label class="boldlabel">SHARE</label><br>
                                    <label class="boldlabel">Employee :</label>
                                    <input class="form-control numeric" id="employee" name="employee" placeholder="Ex: 9,250.00" data-error-msg="This is Required!" required>
                                	<label class="boldlabel">Employer :</label>
                                    <input class="form-control numeric" id="employer" name="employer" placeholder="Ex: 9,250.00" data-error-msg="This is Required!" required>
                                   	<!--<label class="boldlabel">Sub Total :</label>
                                    <input class="form-control numeric" id="sub_total" name="sub_total" placeholder="Ex: 9,250.00" data-error-msg="This is Required!" required><br>
                                    <label class="boldlabel">Total :</label>
                                    <input class="form-control numeric" id="total" name="total" placeholder="Ex: 9,250.00" data-error-msg="This is Required!" required>
									-->
                                    <hr style="border-bottom:1px solid;">

                                </div>
                              </div>
                            </div><br>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_create" type="button" class="btn" style="background-color:#2ecc71;color:white;">Save</button>
                            <button id="btn_cancel" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div><!---content---->
                </div>
            </div><!---modal-->



<?php echo $_switcher_settings; ?>
<?php echo $_def_js_files; ?>


<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>


<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Select2 -->
<script src="assets/plugins/select2/select2.full.min.js"></script>


<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/js/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- twitter typehead -->
<script src="assets/plugins/twittertypehead/handlebars.js"></script>
<script src="assets/plugins/twittertypehead/bloodhound.min.js"></script>
<script src="assets/plugins/twittertypehead/typeahead.bundle.min.js"></script>
<script src="assets/plugins/twittertypehead/typeahead.jquery.min.js"></script>

<!-- touchspin -->
<script type="text/javascript" src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>

<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>



<script>

$(document).ready(function(){
    var dt; var _txnMode; var _selectedID; var _selectRowObj;

    var initializeControls=function(){
        dt=$('#tbl_philhealth_contribution_list').DataTable({
            "dom": '<"toolbar">frtip',

            "bLengthChange":false,
            "ajax" : "RefPhilHealth_Contribution/transaction/list",
            "columns": [
                
                { targets:[1],data: "salary_range_from" },
                { targets:[2],data: "salary_range_to" },
                { targets:[4],data: "employee" },
                { targets:[5],data: "employer" },
                { targets:[6],data: "total" },
                {
                    targets:[7],
                    render: function (data, type, full, meta){
                        var btn_edit='<button class="btn btn-default btn-sm" name="edit_info"   data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                        var btn_trash='<button class="btn btn-default btn-sm" name="remove_info"  data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                        return '<center>'+btn_edit+btn_trash+'</center>';
                    }
                }

            ],
            language: {
                         searchPlaceholder: "Search PhilHealth Contribution"
                     },
            "rowCallback":function( row, data, index ){

                $(row).find('td').eq(5).attr({
                    "align": "left"
                });
            }
        });






        $('.numeric').autoNumeric('init');


    }();

    
    var bindEventHandlers=(function(){
        var detailRows = [];

        $('#tbl_philhealth_contribution_list tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );

                row.child( format( row.data() ) ).show();

                if ( idx === -1 ) {
                    detailRows.push( tr.attr('id') );
                }
            }
        } );


        $('#tbl_philhealth_contribution_list tbody').on('click','button[name="edit_info"]',function(){
            _txnMode="edit";
            $('#modal_create_philhealth_contribution').modal('show');
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.ref_philhealth_contribution_id;

            //$('#emp_exemptpagibig').val(data.emp_exemptphilhealth);

           // alert($('input[name="tax_exempt"]').length);
            //$('input[name="tax_exempt"]').val(0);
            //$('input[name="inventory"]').val(data.is_inventory);

            $('input,textarea').each(function(){
                var _elem=$(this);
                $.each(data,function(name,value){
                    if(_elem.attr('name')==name){
                        _elem.val(value);
                    }
                });
            });

            hideRatesduties();
            hideemployeeList();
            showemployeeFields();

        });

        $('#tbl_philhealth_contribution_list tbody').on('click','button[name="remove_info"]',function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.ref_philhealth_contribution_id;

            $('#modal_confirmation').modal('show');
        });

        $('#btn_yes').click(function(){
            remove_PhilHealth_Contribution().done(function(response){
                showNotification(response);
                dt.row(_selectRowObj).remove().draw();
            });
        });

        $('input[name="file_upload[]"]').change(function(event){
            var _files=event.target.files;

            $('#div_img_product').hide();
            $('#div_img_loader').show();

            var data=new FormData();
            $.each(_files,function(key,value){
                data.append(key,value);
            });

            console.log(_files);

            $.ajax({
                url : 'Products/transaction/upload',
                type : "POST",
                data : data,
                cache : false,
                dataType : 'json',
                processData : false,
                contentType : false,
                success : function(response){
                    $('#div_img_loader').hide();
                    $('#div_img_product').show();
                }
            });
        });

        $('#btn_new').click(function(){
            _txnMode="new";
            $('#modal_create_philhealth_contribution').modal('show');
            clearFields($('#frm_philhealth_contribution'));
        });

        $('#btn_create').click(function(){
            if(validateRequiredFields($('#frm_philhealth_contribution'))){
                if(_txnMode==="new"){
                    //alert("aw");
                    create_PhilHealth_Contribution().done(function(response){
                        showNotification(response);
                        dt.row.add(response.row_added[0]).draw();
                        clearFields($('#frm_philhealth_contribution'))

                    }).always(function(){
                        showSpinningProgress($('#btn_create'));
                    });
                    return;
                }
                if(_txnMode==="edit"){
                    //alert("update");
                    update_PhilHealth_Contribution().done(function(response){
                        showNotification(response);
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                       //clearFields($('#frm_philhealth_contribution'))

                    }).always(function(){
                        showSpinningProgress($('#btn_create'));
                    });
                    return;
                }
            }
            else{}
        });


        $('#btn_saveratesandduties').click(function(){
            if(validateRequiredFields($('#frm_philhealth_contribution'))){
                if(_txnMode=="ratesduties"){
                    createRatesandDuties().done(function(response){
                        showNotification(response);
                        dt.row.add(response.row_added[0]).draw();
                        clearFields($('#frm_philhealth_contribution'))

                    }).always(function(){
                       
                    });
                    return;
                }
                else{
                    //do nothing :D
                }
            }
        });

    })();


    var validateRequiredFields=function(f){
        var stat=true;

        $('div.form-group').removeClass('has-error');
        $('input[required],textarea[required],select[required]',f).each(function(){


                if($(this).val()==""){
                    showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                    $(this).closest('div.form-group').addClass('has-error');
                    $(this).focus();
                    stat=false;
                    return false;
                }
            



        });

        return stat;
    };

    var create_PhilHealth_Contribution=function(){
        var _data=$('#frm_philhealth_contribution').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefPhilHealth_Contribution/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };


    var update_PhilHealth_Contribution=function(){
        var _data=$('#frm_philhealth_contribution').serializeArray();

        console.log(_data);
        _data.push({name : "ref_philhealth_contribution_id" ,value : _selectedID});
        //_data.push({name:"is_inventory",value: $('input[name="is_inventory"]').val()});

        //alert($('input[name="is_inventory"]').val());
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefPhilHealth_Contribution/transaction/update",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var remove_PhilHealth_Contribution=function(){
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefPhilHealth_Contribution/transaction/delete",
            "data":{ref_philhealth_contribution_id : _selectedID}
        });
    };

    var showNotification=function(obj){
        PNotify.removeAll();
        new PNotify({
            title:  obj.title,
            text:  obj.msg,
            type:  obj.stat
        });
    };

        $('.date-picker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true

        });
    
    var showSpinningProgress=function(e){
        $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
    };

    var clearFields=function(f){
        $('input,textarea',f).val('');
        $(f).find('input:first').focus();
    };

    function format ( d ) {
        return '<div class="container-fluid">'+
        '<div class="col-md-12">'+ 
        '<h3 class="boldlabel"><span class="glyphicon glyphicon-user fa-lg"></span> ' + d.emp_fname +' ' + d.emp_mname + ' ' +d.emp_lname + '</h3>'+
        '<p>[ ECODE : '+d.ecode+' ] [ ID : '+d.emp_idnumber+' ]</p>'+
        '<hr style="height:1px;background-color:black;"></hr>'+
        '</div>'+ //First Row//
        '<div class="row">'+
        '<div class="col-md-2">'+
        '<center><img style="margin-top:4px;" src="assets/img/anonymous-icon.png"></img></center>'+
        '</div>'+
        '<div class="col-md-4"><p class="nomargin"><b>Gender</b> : '+d.emp_gender+'</p>'+
        '<p class="nomargin"><b>Birthdate</b> : '+d.emp_birthdate+'</p>'+
        '<p class="nomargin"><b>Civil Status</b> : '+d.emp_civilstatus+'</p>'+
        '<p class="nomargin"><b>Blood Type</b> : '+d.emp_bloodtype+'</p>'+
        '<p class="nomargin"><b>Height</b> : '+d.emp_height+'</p>'+
        '<p class="nomargin"><b>Weight</b> : '+d.emp_weight+'</p>'+
        '<p class="nomargin"><b>Religion</b> : '+d.emp_religion+'</p>'+
        '</div>'+
        '<div class="col-md-4">'+
        '<p class="nomargin"><b>SSS</b> : '+d.emp_sss+'</p>'+
        '<p class="nomargin"><b>Phil Health</b> : '+d.emp_philhealth+'</p>'+
        '<p class="nomargin"><b>Pag-Ibig :</b> : '+d.emp_pagibig+'</p>'+
        '<p class="nomargin"><b>TIN :</b> : '+d.emp_tin+'</p>'+
        '<p class="nomargin"><b>Account No.</b> : '+d.emp_accountno+'</p>'+
        '<p class="nomargin"><b>Tax Code</b> : '+d.emp_taxcode+'</p>'+
        '</div>'+
        '</div>'+
        '<div class="col-md-12">'+ 
        '<h3 class="boldlabel"><h4 class="boldlabel"><span class="glyphicon glyphicon-info-sign fa-lg"></span> Employee Information</h4><hr style="height:1px;background-color:black;"></hr></div>'+
        '<div class="row">'+ //Second Row//
        '<div class="col-md-2">'+
        '<center></center>'+
        '</div>'+
        '<div class="col-md-4"><p class="nomargin"><b>Employee Type</b> : '+d.emp_gender+'</p>'+
        '<p class="nomargin"><b>Remarks</b> : '+d.emp_birthdate+'</p>'+
        '<p class="nomargin"><b>Department</b> : '+d.emp_civilstatus+'</p>'+
        '<p class="nomargin"><b>Position</b> : '+d.emp_bloodtype+'</p>'+
        '<p class="nomargin"><b>Branch</b> : '+d.emp_height+'</p>'+
        '</div>'+
        '<div class="col-md-4">'+
        '<p class="nomargin"><b>Section</b> : '+d.emp_weight+'</p>'+
        '<p class="nomargin"><b>Pay Type</b> : '+d.emp_religion+'</p>'+
        '<p class="nomargin"><b>Employment Date</b> : '+d.emp_employmentdate+'</p>'+
        '<p class="nomargin"><b>Date Regular</b> : '+d.emp_philhealth+'</p>'+
        '</div>'+
        '</div>'+
        '<div class="col-md-12">'+ 
        '<h3 class="boldlabel"><h4 class="boldlabel"><span class="glyphicon glyphicon-info-sign fa-lg"></span> Contact Information</h4><hr style="height:1px;background-color:black;"></hr></div>'+
        '<div class="row">'+ //Second Row//
        '<div class="col-md-2">'+
        '<center></center>'+
        '</div>'+
        '<div class="col-md-4"><p class="nomargin"><b>Address 1</b> : '+d.emp_address1+'</p>'+
        '<p class="nomargin"><b>Address 2</b> : '+d.emp_address2+'</p>'+
        '<p class="nomargin"><b>Email Address</b> : '+d.emp_email+'</p>'+
        '</div>'+
        '<div class="col-md-4"><p class="nomargin"><b>Mobile No.</b> : '+d.emp_cell+'</p>'+
        '<p class="nomargin"><b> Phone No.</b> : '+d.emp_phone+'</p>'+
        '</div>'+
        '</div>'+
        '</div>';
    };



   /* $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });*/


    // apply input changes, which were done outside the plugin
    //$('input:radio').iCheck('update');

});

</script>

</body>

</html>