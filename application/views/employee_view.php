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

        td.details-control1 {
            background: url('assets/img/Folder_Closed.png') no-repeat center center !important;
            cursor: pointer;
        }
        tr.details1 td.details-control1 {
            background: url('assets/img/Folder_Opened.png') no-repeat center center;
        }

        td.details-control2 {
            background: url('assets/img/Folder_Closed.png') no-repeat center center !important;
            cursor: pointer;
        }
        tr.details2 td.details-control2 {
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
            text-align: left;
            width: 100%;
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
                        <li><a href="employee">Employee</a></li>
                        <li><currentyear class="boldlabel" style="color:black;"><?php
                                                                    foreach($emp_leave_year as $row)
                                                                    {
                                                                        echo "[ Current Year : ";
                                                                        echo $row->year_type;
                                                                        echo " FROM : ";
                                                                        echo $row->date_start;
                                                                        echo " TO : ";
                                                                         echo $row->date_end;
                                                                    }
                                                                    ?> ]</currentyear></li>
                    </ol>

                    <div class="container-fluid">

                        <div id="div_product_list">
                            <div class="panel panel-default">
                                <!--
                                        <button class="btn"  id="btn_new" style="width:95px;height:80px;border:1px solid #2c3e50;font-family: Tahoma, Georgia, Serif;background-color:#27ae60;color:white;margin-top:10px;margin-left:17px;" title="Create New Employee" >
                                        <i class="fa fa-user-plus fa-2x"></i><h4 style="font-size:14px;margin:0px;color:white;">New<br>Employee</h4></button>
                                        <button class="btn"  id="edit_entitlement" style="width:95px;height:80px;border:1px solid #2c3e50;font-family: Tahoma, Georgia, Serif;background-color:#27ae60;color:white;margin-top:10px;margin-left:none;" title="Create New Employee" >
                                        <i class="fa fa-area-chart fa-2x"></i><h4 style="font-size:12px;margin:0px;color:white;">Leave<br>Entitlement</h4></button>
                                        <button class="btn"  id="apply_leave" style="width:95px;height:80px;border:1px solid #2c3e50;font-family: Tahoma, Georgia, Serif;background-color:#27ae60;color:white;margin-top:10px;margin-left:none;" title="Create New Employee" >
                                        <i class="fa fa-area-chart fa-2x"></i><h4 style="font-size:14px;margin:0px;color:white;">Apply<br>Leave</h4></button>
                                        <button class="btn"  id="edit_duties" style="width:95px;height:80px;border:1px solid #2c3e50;font-family: Tahoma, Georgia, Serif;background-color:#27ae60;color:white;margin-top:10px;margin-left:none;" title="Create New Employee" >
                                        <i class="fa fa-area-chart fa-2x"></i><h4 style="font-size:14px;margin:0px;color:white;">Rates &<br>Duties</h4></button>
                                        <button class="btn"  id="edit_memorandum" style="width:95px;height:80px;border:1px solid #2c3e50;font-family: Tahoma, Georgia, Serif;background-color:#27ae60;color:white;margin-top:10px;margin-left:none;" title="Create New Employee" >
                                        <i class="fa fa-area-chart fa-2x"></i><h4 style="font-size:11px;margin:0px;color:white;">Memorandum</h4></button>
                                        -->
                                        <div class="panel-heading" style="background-color:#2c3e50 !important;margin-top:5px;margin-left:17px;margin-right:17px;border-radius:5px;">
                                             <center><h2 style="color:white;font-weight:300;">Employee List</h2></center>
                                        </div>
                                    <div class="panel-body table-responsive" style="padding-top:8px;">
                                        <table id="tbl_employee_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                    <th></th>
                                                    <th>First Name</th>
                                                    <th>Middle Name</th>
                                                    <th>Last Name</th>
                                                    <th><center>Action</center></th>
                                                 </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                <div class="panel-footer"></div>
                            </div> <!--panel default -->

                        </div> <!--rates and duties list -->

                        <div id="div_product_fields" style="display: none;">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color:#2ecc71 !important;margin-top:5px;border-radius:5px;">
                                             <center><h2 style="color:white;font-weight:bold;">Personal Information</h2></center>
                                        </div>

                                    <div class="panel-body">
                                        <form id="frm_employee" role="form" class="form-horizontal row-border">
                                                <div class="container-fluid">
                                                    <div class="col-md-9">
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">*ID Number</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="id_number" class="form-control" value="" data-error-msg="ID Number is required!" required>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">*First Name</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="first_name" class="form-control" value="" data-error-msg="First Name is required!" required>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">*Middle Name</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="middle_name" class="form-control" value="" data-error-msg="Middle Name is required!" required>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">*Last Name</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="last_name" class="form-control" value="" data-error-msg="Last Name is required!" required>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Address 1:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="address_one" class="form-control" value="" data-error-msg="Address 1 is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Address 2:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="address_two" class="form-control" value="" data-error-msg="Address 2 is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Email Address:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="email_address" class="form-control" value="" data-error-msg="Email Address 1 is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Gender:</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                               <select class="form-control" name="gender" data-error-msg="Gender 1 is required!">
                                                                  <option>Male</option>
                                                                  <option>Female</option>
                                                                </select>
                                                                </div>
                                                          </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                             <label class="control-label boldlabel" style="text-align:left;">Cell No:</label>
                                                        </div>
                                                        <div class="col-md-3.5">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="cell_number" class="form-control" value="" data-error-msg="Cell No is required!">
                                                                </div>
                                                          </div>
                                                        </div>

                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Birthdate:</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="birthdate" class="date-picker form-control" value="" placeholder="Birthdate" data-error-msg="Birth Date is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                             <label class="control-label boldlabel" style="text-align:left;">Tel No:</label>
                                                        </div>
                                                        <div class="col-md-3.5">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="telphone_number" class="form-control" value="" data-error-msg="TelePhone Number is required!">
                                                                </div>
                                                          </div>
                                                        </div>

                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Religion:</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <select class="form-control" id="emp_religion" name="ref_religion_id" data-error-msg="Religion is required!" required>
                                                                      <option value="0">[Create Religion]</option>
                                                                      <?php
                                                                    foreach($ref_religion as $row)
                                                                    {
                                                                        echo '<option value="'.$row->ref_religion_id  .'">'.$row->religion.'</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                             <label class="control-label boldlabel" style="text-align:left;">Blood:</label>
                                                        </div>
                                                        <div class="col-md-3.5">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="blood_type" class="form-control" value="" data-error-msg="Blood Type is required!">
                                                                </div>
                                                          </div>
                                                        </div>

                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Civil Status:</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <select class="form-control" id="emp_civilstatus" name="civil_status" data-error-msg="Civil Status is required!" required>
                                                                  <option value="Single">Single</option>
                                                                  <option value="Married">Married</option>
                                                                  <option value="Divorced">Divorced</option>
                                                                  <option value="Widowed">Widowed</option>
                                                                  <option value="Separated">Separated</option>
                                                                </select>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                             <label class="control-label boldlabel" style="text-align:left;">Height:</label>
                                                        </div>
                                                        <div class="col-md-3.5">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="height" class="form-control" value="" data-error-msg="Height is required!">
                                                                </div>
                                                          </div>
                                                        </div>

                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             
                                                        </div>
                                                        <div class="col-md-4">
                                                          
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                             <label class="control-label boldlabel" style="text-align:left;">Weight:</label>
                                                        </div>
                                                        <div class="col-md-3.5">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="weight" class="form-control" value="" data-error-msg="Weight is required!">
                                                                </div>
                                                          </div>
                                                        </div>

                                                        </div>

                                                    </div><!--end of 1st date entry -->

                                                    <div class="col-md-3">
                                                        
                                                        <div class="col-md-12">
                                                              <label class="control-label boldlabel" style="text-align:left;"><i class="fa fa-user" aria-hidden="true"></i>Employee Image</label>
                                                                <hr style="margin-top:0px !important;height:1px;background-color:black;"></hr>
                                                        </div>
                                                        <div style="width:100%; height:300px;border:2px solid #34495e;border-radius:5px;">
                                                        <center><img src="assets/img/anonymous-icon.png"></img></center>
                                                        <hr style="margin-top:0px !important;height:1px;background-color:black;"></hr>
                                                        <center>
                                                             <button type="button" style="width:150px;margin-bottom:5px;" class="btn btn-primary">Browse Photo</button>
                                                             <button type="button" style="width:150px;" class="btn btn-danger">Remove</button>
                                                           
                                                    </div>
                                                      
                                                    </div> <!--end of 1st date entry -->

                                                        <div class="col-md-12">
                                                        
                                                              <label class="control-label boldlabel" ><i class="fa fa-calendar" aria-hidden="true"></i> Employment Date</label>
                                                        <hr style="margin-top:0px !important;height:1px;background-color:black;">
                                                        </hr>
                                                        

                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Date Employment:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                 <input type="text" name="employment_date" class="date-picker form-control" value="" placeholder="Employment Date" data-error-msg="Employment Date is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Date Regularization:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="date_regularization" class="date-picker form-control" value="" placeholder="Regularization Date" data-error-msg="Regularization Date is required!" disabled>
                                                                </div>
                                                          </div>
                                                        </div>

                                                        

                                                       <div class="col-md-12">
                                                        
                                                              <label class="control-label boldlabel" ><i class="fa fa-user" aria-hidden="true"></i> Other Information</label>
                                                        <hr style="margin-top:0px !important;height:1px;background-color:black;">
                                                        </hr>
                                                        

                                                        </div>
                                                        <!--input1-->
                                                        <div class="col-md-8">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">SSS Number:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="sss" class="form-control" value="" data-error-msg="SSS is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <!--input1-->


                                                        <div class="col-md-8">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Phil. Health:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="phil_health" class="form-control" value="" data-error-msg="Phil. Health is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Pag Ibig:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="pag_ibig" class="form-control" value="" data-error-msg="Pag Ibig is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">TIN:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="tin" class="form-control" value="" data-error-msg="Tin is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Bank Account No.:</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="bank_Account" class="form-control" value="" data-error-msg="Account Number is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                             <label class="control-label boldlabel" style="text-align:left;">Process?</label>
                                                        </div>
                                                        <div class="col-md-3.5">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <select class="form-control" id="emp_processaccount" name="bank_account_isprocess" data-error-msg="Process Account is required!">
                                                                  <option value="0">No</option>
                                                                  <option value="1">Yes</option>
                                                                </select>
                                                                </div>
                                                          </div>
                                                        </div>

                                                        </div>
                                                        <div class="col-md-8">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Tax Code</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <select class="form-control" id="emp_taxcode" name="tax_code" data-error-msg="Tax Code is required!">
                                                                  <option value="0">No</option>
                                                                  <option value="1">Yes</option>
                                                                </select>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                        
                                                              <label class="control-label boldlabel" ><i class="fa fa-user" aria-hidden="true"></i> Exemption</label>
                                                        <hr style="margin-top:0px !important;height:1px;background-color:black;">
                                                        </hr>
                                                        

                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="col-md-4">
                                                             <label class="control-label boldlabel" style="text-align:left;">SSS :</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <select class="form-control" id="emp_exemptss" name="exmpt_sss" data-error-msg="SSS exempt is required!">
                                                                  <option value="0">No</option>
                                                                  <option value="1">Yes</option>
                                                                </select>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="col-md-4">
                                                             <label class="control-label boldlabel" style="text-align:left;">Phil Health :</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <select class="form-control" id="emp_exemptpagibig" name="exmpt_philhealth" data-error-msg="Pag-Ibig is required!">
                                                                  <option value="0">No</option>
                                                                  <option value="1">Yes</option>
                                                                </select>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="col-md-4">
                                                             <label class="control-label boldlabel" style="text-align:left;">Pag-Ibig :</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <select class="form-control" id="emp_exemptphilhealth" name="exmpt_pagibig" data-error-msg="Phil health is required!">
                                                                  <option value="0">No</option>
                                                                  <option value="1">Yes</option>
                                                                </select>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                        
                                                              <label class="control-label boldlabel" ><i class="fa fa-user" aria-hidden="true"></i> Loan</label>
                                                        <hr style="margin-top:0px !important;height:1px;background-color:black;">
                                                        </hr>
                                                        

                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Loan Date:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                 <input type="text" name="loan_date" class="date-picker form-control" value="" placeholder="Loan Date" data-error-msg="Employment Date is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Amount :</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                 <input type="text" name="loan_amount" class="form-control" value="" placeholder="Loan Amount" data-error-msg="Loan Amount is required!">
                                                                </div>
                                                          </div>
                                                        </div>


                                                    <br/>
                                                </form>
                                    </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <button id="btn_save" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span></span>Save Changes</button>
                                            <button id="btn_cancelempfields" class="btn-default btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end of div employee fields -->
                    </div> 
                   
                            
                        <div id="div_rates_duties_list" style="display:none;">
                           
                            <div class="panel panel-default">
                                <button class="btn"  id="btn_cancelratesandduties" style="width:50px;font-family: Tahoma, Georgia, Serif;background-color:#e74c3c;color:white;margin-top:10px;margin-left:17px;" title="Create New Employee" >
                                    <span class="glyphicon glyphicon-arrow-left"></span>
                
                                <button class="btn"  id="btn_newratesandduties" style="width:120;font-family: Tahoma, Georgia, Serif;background-color:#2ecc71;color:white;margin-top:10px;margin-left:5px;" title="Create New Employee" >
                                    <i class="fa fa-file"></i> New </button>
                                <button class="btn"  id="" style="width:120;font-family: Tahoma, Georgia, Serif;background-color:#3498db;color:white;margin-top:10px;margin-left:0px;" title="Name" >
                                   <displayname id="display_name" class="display_name"></displayname> </button>
                                    
                                        <div class="panel-heading" style="background-color:#2c3e50 !important;margin-top:5px;margin-left:17px;margin-right:17px;border-radius:5px;">
                                             <center><h2 style="color:white;font-weight:300;">Rates and Duties</h2></center>
                                        </div>

                                    <div class="panel-body table-responsive" style="padding-top:5px;">
                                        <table id="tbl_rates_duties_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Employment Type</th>
                                                    <th>Date Start</th>
                                                    <th>Date End</th>
                                                    <th><center>Action</center></th>
                                                 </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                <div class="panel-footer"></div>
                            </div> <!--panel default -->

                        </div> <!--rates and duties list -->

                        <div id="div_entitlement_list" style="display:none;">
                           
                            <div class="panel panel-default">
                                <button class="btn"  id="btn_cancelentitlement" style="width:50px;font-family: Tahoma, Georgia, Serif;background-color:#e74c3c;color:white;margin-top:10px;margin-left:17px;" title="Create New Employee" >
                                    <span class="glyphicon glyphicon-arrow-left"></span>
                
                                <button class="btn btn_newentitlement"  id="btn_newentitlement" style="width:120;font-family: Tahoma, Georgia, Serif;background-color:#2ecc71;color:white;margin-top:10px;margin-left:5px;" title="Create New Employee" >
                                    <i class="fa fa-file"></i> new title </button>
                                <button class="btn"  id="" style="width:120;font-family: Tahoma, Georgia, Serif;background-color:#3498db;color:white;margin-top:10px;margin-left:0px;" title="Name" >
                                   <displayname id="display_name" class="display_name"></displayname> </button>
                                    
                                        <div class="panel-heading" style="background-color:#2c3e50 !important;margin-top:5px;margin-left:17px;margin-right:17px;border-radius:5px;">
                                             <center><h2 style="color:white;font-weight:300;">Leave Entitlement Module  </h2></center>
                                        </div>

                                    <div class="panel-body table-responsive" style="padding-top:5px;">
                                        <table id="tbl_entitlement" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Leave Type</th>
                                                    <th>Short name</th>
                                                    <th>Is Payable</th>
                                                    <th>Is Forwardable</th>
                                                    <th>Total Grant</th>
                                                    <th>Received Balance</th>
                                                    <th>Current Balance</th>
                                                    <th><center>Action</center></th>
                                                 </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                <div class="panel-footer"></div>
                            </div> <!--panel default -->

                        </div> <!--entitlement list -->

                        <div id="div_apply_leave" style="display:none;">
                           
                            <div class="panel panel-default">
                                <button class="btn"  id="btn_cancelapplyleave" style="width:50px;font-family: Tahoma, Georgia, Serif;background-color:#e74c3c;color:white;margin-top:10px;margin-left:17px;" title="Create New Employee" >
                                    <span class="glyphicon glyphicon-arrow-left"></span>
                
                                <button class="btn btn_newentitlement"  id="btn_newentitlement" style="width:120;font-family: Tahoma, Georgia, Serif;background-color:#2ecc71;color:white;margin-top:10px;margin-left:5px;" title="Create New Employee" >
                                    <i class="fa fa-file"></i> File a Leave  </button>
                                <button class="btn"  id="btn_apply_leave" style="width:120;font-family: Tahoma, Georgia, Serif;background-color:#3498db;color:white;margin-top:10px;margin-left:0px;" title="Name" >
                                   <displayname id="display_name" class="display_name"></displayname> </button>
                                    
                                        <div class="panel-heading" style="background-color:#2c3e50 !important;margin-top:5px;margin-left:17px;margin-right:17px;border-radius:5px;">
                                             <center><h2 style="color:white;font-weight:300;">Leave Application  </h2></center>
                                             <div class="pull-right"><strong>[ <a id="btn_open_leave" href="#" style="text-decoration: underline;color:white;">Show Available Leave</a> ]</strong></div>
                                        </div>

                                    <div class="panel-body table-responsive" style="padding-top:5px;">
                                        <table id="tbl_apply_leave" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Leave Type</th>
                                                    <th>Date Filed</th>
                                                    <th>Date Granted</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>Purpose</th>
                                                    <th>Total</th>
                                                    <th><center>Action</center></th>
                                                 </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                <div class="panel-footer"></div>
                            </div> <!--panel default -->

                        </div> <!--entitlement list -->

                    </div><!-- .container-fluid -->
                </div> <!-- #page-content -->
            </div><!--static content -->
            
        </div><!--content wrapper -->
    </div><!--static layout -->
</div> <!--wrapper -->

            <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
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
                    </div>
                </div>
                </div>

                <div id="modal_confirmation_rates" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title"><span id="modal_mode"> </span>Confirm Deletion</h4>
                        </div>

                        <div class="modal-body">
                            <p id="modal-body-message">Are you sure ?</p>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_yes_rates" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                            <button id="btn_close_rates" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
                </div>

                <div id="modal_confirmation_entitlement" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title"><span id="modal_mode"> </span>Confirm Deletion</h4>
                        </div>

                        <div class="modal-body">
                            <p id="modal-body-message">Are you sure ?</p>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_yes_entitlement" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                            <button id="btn_close_entitlement" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
                </div>

                <div id="modal_create_religion" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#27ae60;">
                            <button type="button" style="color:white;" class="close"  data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Create Religion</h4>
                        </div>

                        <div class="modal-body">
                            <form id="frm_religion">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Religion Name :</label>
                                    <input type="text" class="form-control" id="religion" name="religion" placeholder="Department name" data-error-msg="Department name is Required!" required>
                                </div>
                              </div>
                            </div><br>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Description :</label>
                                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Department Description"></textarea>
                                </div>
                              </div>
                            </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_new_religion" type="button" class="btn btn-success" data-dismiss="modal">Create</button>
                            <button id="btn_close_religion" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
                </div>

                <div id="modal_rates_details" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#34495e;">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true" style="color:#ecf0f1;">X</button>
                            <h4 class="modal-title" style="color:#ecf0f1;"><span id="modal_mode"> </span>Rates and Duties Details</h4>
                        </div>

                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-md-12">
                                <h3 class="boldlabel"><span class="fa fa-circle fa-lg"></span> <text id="employment_type"></text></h3>
                                <p class="boldlabel">[ Position : <text id="position"> </text>] [ Department : <text id="department"></text>]</p>
                                <hr style="height:1px;background-color:black;"></hr>
                                </div>
                                
                                <div class="col-md-12">

                                <div class="col-md-4"><p class="nomargin"><b>Date Start</b> : <text id="date_start"></p>
                                <p class="nomargin"><b>Date End</b> : <text id="date_end"></text></p>
                                <p class="nomargin"><b>Section</b> : <text id="section"></text></p>
                                <p class="nomargin"><b>Branch</b> : <text id="branch"></text></p>
                                <p class="nomargin"><b>Payment Type</b> : <text id="payment_type"></text></p>
                                <p class="nomargin"><b>Level</b> : <text id="level"></text></p>
                                </div>
                                <div class="col-md-4">
                                <p class="nomargin"><b>Salary Reg Rates :</b><text id="salary_reg_rates"></text></p>
                                <p class="nomargin"><b>Daily Rate :</b> :<text id="daily_rate"></text></p>
                                <p class="nomargin"><b>Rate Factor </b> :<text id="daily_rate_factor"></text> </p>
                                <p class="nomargin"><b>SSS PHIC Salary Credit</b> :<text id="sss_phic_salary_credit"></text></p>
                                <p class="nomargin"><b>Pagibig Salary Credit</b> :<text id="pagibig_salary_credit"></text></p>
                                <p class="nomargin"><b>Tax Shield</b> :<text id="tax_shield"></text></p>
                                </div>
                                <div class="col-md-4">
                                <p class="nomargin"><b>Remarks :</b><br><text id="remarks"></text><br></p>
                                </div>
                                </div>
                                </div>
                        </div>

                        <div class="modal-footer" style="padding:10px;">
                            <button id="btn_close_details" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
                </div>

                <div id="modal_entitlement_details" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#34495e;">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true" style="color:#ecf0f1;">X</button>
                            <h4 class="modal-title" style="color:#ecf0f1;"><span id="modal_mode"> </span>Leave Entitlement Details</h4>
                        </div>

                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-md-12">
                                <h3 class="boldlabel"><span class="fa fa-circle fa-lg"></span> <text id="leave_type"></text></h3>
                                <p class="boldlabel">[ Shortname : <text id="leave_type_short_name"> </text>]</p>
                                <hr style="height:1px;background-color:black;"></hr>
                                </div>
                                
                                <div class="col-md-12">

                                <div class="col-md-6">
                                <p class="nomargin"><b>Payable</b> : <text id="is_payable_detail"></text></p>
                                <p class="nomargin"><b>Forwardable</b> : <text id="is_forwardable_detail"></text></p>
                                <p class="nomargin"><b>Total Grant</b> : <text id="total_grant_detail"></text></p>
                                <p class="nomargin"><b>Received Balance</b> : <text id="received_balance_detail"></text></p>
                                <p class="nomargin"><b>Current Balance</b> : <text id="current_balance_detail"></text></p>
                                </div>  
                                <div class="col-md-4">
                                <p class="nomargin"><b>Remarks :</b><br><text id="remark"></text><br></p>
                                </div>
                                </div>
                                </div>
                        </div>

                        <div class="modal-footer" style="padding:10px;">
                            <button id="btn_close_details" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                </div>

                <div id="modal_leave_show" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#34495e;">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true" style="color:#ecf0f1;">X</button>
                            <h4 class="modal-title" style="color:#ecf0f1;"><span id="modal_mode"> </span>Available Leave</h4>
                        </div>

                        <div class="modal-body">
                            <div class="container-fluid" id="showavailableleave">
                                    
                            </div>
                        </div>

                        <div class="modal-footer" style="padding:10px;">
                            <button id="btn_close_details" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                </div>
			

            <div id="modal_create_ratesandduties" class="modal fade modal_create_ratesandduties" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#2ecc71;">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:#ecf0f1;"><span id="modal_mode"> </span>Rates and Duties : New</h4>
                            <p style="color:white;margin:0px;" id="dataname" class="dataname">aw</p>
                        </div>

                        <div class="modal-body">
                            <form id="frm_ratesandduties">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label class="boldlabel" style="margin-bottom:0px;">Employee Type:</label>
                                          <select class="form-control" id="ref_employment_type_id" name="ref_employment_type_id" id="sel1">
                                            <option value="0">[ Create Employment Type ]</option>
                                            <?php
                                                                foreach($ref_emptype as $row)
                                                                {
                                                                    echo '<option value="'.$row->ref_employment_type_id  .'">'.$row->employment_type.'</option>';
                                                                }
                                                                ?>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label class="boldlabel" style="margin-bottom:0px;">Pay Type:</label>
                                          <select class="form-control" id="ref_payment_type_id" name="ref_payment_type_id" id="sel1">
                                            <option value="0">[ Create Payment Type ]</option>
                                          <?php
                                                                foreach($ref_payment as $row)
                                                                {
                                                                    echo '<option value="'.$row->ref_payment_type_id  .'">'.$row->payment_type.'</option>';
                                                                }
                                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label class="boldlabel" style="margin-bottom:0px;">Department:</label>
                                          <select class="form-control" id="ref_department_id" name="ref_department_id" id="sel1">
                                            <option value="0">[ Create Employment Type ]</option>
                                           <?php
                                                                foreach($ref_department as $row)
                                                                {
                                                                    echo '<option value="'.$row->ref_department_id  .'">'.$row->department.'</option>';
                                                                }
                                                                ?>
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label class="boldlabel" style="margin-bottom:0px;">Position:</label>
                                          <select class="form-control" id="ref_position_id" name="ref_position_id" id="sel1">
                                            <option value="0">[ Create Employment Type ]</option>
                                            <?php
                                                                foreach($ref_position as $row)
                                                                {
                                                                    echo '<option value="'.$row->ref_position_id  .'">'.$row->position.'</option>';
                                                                }
                                                                ?>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label class="boldlabel" style="margin-bottom:0px;">Branch:</label>
                                          <select class="form-control"  id="ref_branch_id" name="ref_branch_id" id="sel1">
                                            <option value="0">[ Create Employment Type ]</option>
                                            <?php
                                                                foreach($ref_branch as $row)
                                                                {
                                                                    echo '<option value="'.$row->ref_branch_id  .'">'.$row->branch.'</option>';
                                                                }
                                                                ?>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label class="boldlabel" style="margin-bottom:0px;">Section:</label>
                                          <select class="form-control" id="ref_section_id"  name="ref_section_id" id="sel1">
                                            <option value="0">[ Create Employment Type ]</option>
                                            <?php
                                                                foreach($ref_section as $row)
                                                                {
                                                                    echo '<option value="'.$row->ref_section_id  .'">'.$row->section.'</option>';
                                                                }
                                                                ?>
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Date Start:</label>
                                          <input type="text" name="date_start" class="date-picker form-control" value="" placeholder="Date Start" data-error-msg="Date Start is required!">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Date End:</label>
                                          <input type="text" name="date_end" class="date-picker form-control" value="" placeholder="Date End" data-error-msg="Date End is required!" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Level:</label>
                                          <input type="text" name="level" class="form-control numeric" placeholder="level">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Salary Reg Rates:</label>
                                          <input type="text" name="salary_reg_rates" class="form-control numeric" placeholder="Salary Reg Rates">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Daily Rates</label>
                                          <input type="text" name="daily_rate"class="form-control numeric">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Factor:</label>
                                          <input type="text" name="daily_rate_factor" class="form-control numeric" placeholder="Factor">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">SSS PHIC Salary Credit:</label>
                                          <input type="text" name="sss_phic_salary_credit"class="form-control numeric" placeholder="SSS PHIC Salary Credit">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Pag-Ibig Salary Credit:</label>
                                          <input type="text" name="pagibig_salary_credit" class="form-control numeric" placeholder="Pag-Ibig Salary Credit">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Tax Shield:</label>
                                          <input type="text" name="tax_shield" class="form-control numeric" placeholder="Factor">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Remarks:</label>
                                          <textarea type="text" name="remarks" class="form-control" placeholder="Factor"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_createratesandduties" type="button" class="btn" style="background-color:#2ecc71;color:white;"data-dismiss="modal">Save</button>
                            <button id="btn_cancelcreateratesandduties" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div><!---content---->
                </div>
                </div>
            </div><!---modal-->

            <div id="modal_create_entitlement" class="modal fade modal_create_entitlement" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#2ecc71;">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:#ecf0f1;"><span id="modal_mode"> </span>Leave Entitletment : <texttitle id="entitlementtittle"></texttitle></h4>
                            <p style="color:white;margin:0px;" id="dataname" class="dataname">name</p>
                        </div>

                        <div class="modal-body">
                            <form id="frm_entitlement">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                                  <label class="boldlabel" style="margin-bottom:0px;">Leave Type:</label>
                                                  <select class="form-control" id="ref_leave_type_id" name="ref_leave_type_id" id="sel1" required>
                                                    <option value="0">[ Create Employment Type ]</option>
                                                    <?php
                                                                        foreach($ref_leave_type as $row)
                                                                        {
                                                                            echo '<option value="'.$row->ref_leave_type_id  .'">'.$row->leave_type.'</option>';
                                                                        }
                                                                        ?>
                                                  </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                                  <label class="boldlabel" style="margin-bottom:0px;">Short Name:</label>
                                                  <input type="text" class="form-control" placeholder="Short Name" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                            <div class="checkbox" style="margin-top:25px;">
                                                 <label><input id="payable" type="checkbox" value=""><b>Is Payable?</b></label>
                                                 <label style="margin-left:20px;"><input id="forwardable" type="checkbox" value=""><b>Is Forwardable?</b></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                            <label class="boldlabel">Total Grant :</label>
                                            <input type="text" class="form-control numeric" id="total_grant" name="total_grant" placeholder="Total Grant" data-error-msg="Total Grant is Required!">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                            <label class="boldlabel">Received Balance :</label>
                                            <input type="text" class="form-control numeric" id="received_balance" name="received_balance" placeholder="Total Grant" data-error-msg="Received Balance is Required!" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                            <label class="boldlabel">Current Balance :</label>
                                            <input type="text" class="form-control numeric" id="current_balance" name="current_balance" placeholder="Current Balance" data-error-msg="Current Balance is Required!" required readonly>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_createentitlement" type="button" class="btn btn_createentitlement" style="background-color:#2ecc71;color:white;">Save</button>
                            <button id="btn_cancelcreateentitlement" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div><!---content---->
                </div>
            </div><!---modal-->

                <div id="modal_references" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#27ae60;">
                            <button type="button" style="color:white;" class="close"  data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span><texttitle id="title_modal"></texttitle></h4>
                        </div>

                        <div class="modal-body">
                            <form id="frm_references">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel"><texttitle id="name_modal"></texttitle> :</label>
                                    <input type="text" class="form-control" id="postname" name="postname" placeholder="" data-error-msg="This Field is Required!" required>
                                </div>
                              </div>
                            </div><br>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel"><texttitle id="description_modal"></texttitle> :</label>
                                    <textarea type="text" class="form-control" id="postdescription" name="postdescription" placeholder="Department Description"></textarea>
                                </div>
                              </div>
                            </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_new_create_reference" type="button" class="btn btn-success">Save</button>
                            <button id="btn_close_reference" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
                </div>





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
    var dt; var _txnMode; var _txnModeRate; var _selectedID; var _selectedIDrates; var _selectedIDentitlement; var _selectRowObj; var _selectRowObjrates; var _selectRowObjentitlement; var _isChecked; var _ispayable=0; var _isforwardable=0; var _Leave_type_value;

    var initializeControls=function(){
        dt=$('#tbl_employee_list').DataTable({
            "dom": '<"toolbar">frtip',

            "bLengthChange":false,

            "ajax" : "Employee/transaction/list",
            "columns": [
                {
                    "targets": [0],
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { targets:[2],data: "first_name" },
                { targets:[3],data: "middle_name" },
                { targets:[4],data: "last_name" },
                {
                    targets:[5],
                    render: function (data, type, full, meta){
                        var btn_duties='<button class="btn btn-default btn-sm" name="edit_duties"  data-toggle="tooltip" data-placement="top" title="Rates And Duties"><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i> </button>';
                        var btn_edit='<button class="btn btn-default btn-sm" name="edit_info"   data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil fa-lg"></i> </button>';
                        var btn_trash='<button class="btn btn-default btn-sm" name="remove_info"  data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o fa-lg"></i> </button>';

                        return '<center>'+btn_edit+btn_trash+'</center>';
                    }
                }

            ],
            language: {
                         searchPlaceholder: "Search Employee"
                     },
            "rowCallback":function( row, data, index ){

                $(row).find('td').eq(5).attr({
                    "align": "right"
                });
            }
        });






        $('.numeric').autoNumeric('init');


    }();

    var getratesandduties=function(){
                    dt_rates=$('#tbl_rates_duties_list').DataTable({
            "fnInitComplete": function (oSettings, json) {
                $.unblockUI();
                },
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "ajax": {
            "url": "RatesDuties/transaction/testlist",
            "type": "POST",
            "bDestroy": true,
            "data": function ( d ) {
                return $.extend( {}, d, {
                    "employee_id": _selectedID //id of the user
                    } );
                }
            },
            "columns": [
                {
                    "targets": [0],
                    "class":          "details-control1",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": "",
                    "bDestroy": true,
                },
                { targets:[1],data: "employment_type" },
                { targets:[2],data: "date_start" },
                { targets:[3],data: "date_end" },
                {
                    targets:[4],
                    render: function (data, type, full, meta){
                        var btn_edit='<button class="btn btn-default btn-sm" name="rates_duties_edit"   data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                        var btn_trash='<button class="btn btn-default btn-sm" name="rates_duties_remove"  data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                        return '<center>'+btn_edit+btn_trash+'</center>';
                    }
                }
            ],
            language: {
                         searchPlaceholder: "Search Rates and Duties"
                     },
            "rowCallback":function( row, data, index ){

                $(row).find('td').eq(10).attr({
                    "align": "right"
                });
            }

        });

    }

    var getentitlement=function(){
                    dt_entitlement=$('#tbl_entitlement').DataTable({
            "fnInitComplete": function (oSettings, json) {
                $.unblockUI();
                },
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "ajax": {
            "url": "Entitlement/transaction/getresult",
            "type": "POST",
            "bDestroy": true,
            "data": function ( d ) {
                return $.extend( {}, d, {
                    "employee_id": _selectedID //id of the user
                    } );
                }
            },
            "columns": [
                {
                    "targets": [0],
                    "class":          "details-control2",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": "",
                    "bDestroy": true,
                },
                { targets:[1],data: "leave_type" },
                { targets:[2],data: "leave_type_short_name" },
                { targets:[3],data: "is_payable",
                    render: function (data, type, full, meta){
                        //alert(data);

                        if(data == 1){
                            return "<center><span style='color:#37d077' class='glyphicon glyphicon-ok'></span></center>";
                        } 

                        else{
                            return "<center><span style='color:#e74c3c' class='glyphicon glyphicon-remove'></span></center>";
                        }
                    }
                },
                { targets:[4],data: "is_forwardable",
                    render: function (data, type, full, meta){
                        //alert(data);

                        if(data == 1){
                            return "<center><span style='color:#37d077' class='glyphicon glyphicon-ok'></span></center>";
                        } 

                        else{
                            return "<center><span style='color:#e74c3c' class='glyphicon glyphicon-remove'></span></center>";
                        }
                    }
                },
                { targets:[5],data: "total_grant" },
                { targets:[6],data: "received_balance" },
                { targets:[7],data: "current_balance" },
                {
                    targets:[8],
                    render: function (data, type, full, meta){
                        var btn_edit='<button class="btn btn-default btn-sm" name="entitlement_edit"   data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                        var btn_trash='<button class="btn btn-default btn-sm" name="entitlement_remove"  data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                        return '<center>'+btn_edit+btn_trash+'</center>';
                    }
                }
            ],
            language: {
                         searchPlaceholder: "Search Entitlements"
                     },
            "rowCallback":function( row, data, index ){

                $(row).find('td').eq(10).attr({
                    "align": "right"
                });
            }

        });

    }

    var getFiledLeave=function(){
                    dt_apply_leave=$('#tbl_apply_leave').DataTable({
            "fnInitComplete": function (oSettings, json) {
                $.unblockUI();
                },
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "ajax": {
            "url": "Leavefiled/transaction/getfiledleave",
            "type": "POST",
            "bDestroy": true,
            "data": function ( d ) {
                return $.extend( {}, d, {
                    "employee_id": _selectedID //id of the user
                    } );
                }
            },
            "columns": [
                { targets:[0],data: "leave_type" },
                { targets:[1],data: "date_filed" },
                { targets:[2],data: "date_granted" },
                { targets:[3],data: "date_time_from" },
                { targets:[4],data: "date_time_to" },
                { targets:[5],data: "purpose" },
                { targets:[6],data: "total" },
                {
                    targets:[7],
                    render: function (data, type, full, meta){
                        var btn_edit='<button class="btn btn-default btn-sm" name="leavefiled_edit"   data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                        var btn_trash='<button class="btn btn-default btn-sm" name="entitlement_remove"  data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                        return '<center>'+btn_edit+'</center>';
                    }
                }
            ],
            language: {
                         searchPlaceholder: "Search Filed Leave"
                     },
            "rowCallback":function( row, data, index ){

                $(row).find('td').eq(10).attr({
                    "align": "right"
                });
            }

        });

    }

    var bindEventHandlers=(function(){
        var detailRows = [];
         var detailRows1 = [];

        $('#tbl_employee_list tbody').on( 'click', 'tr td.details-control', function () {
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

            //detailed modal view of rates and duties
     $('#tbl_rates_duties_list tbody').on( 'click', 'tr td.details-control1', function () {
            _selectRowObjrates=$(this).closest('tr');
            var data=dt_rates.row(_selectRowObjrates).data();
            _selectedIDrates=data.emp_rates_duties_id;

            $('#employment_type').text(data.employment_type);
            $('#position').text(data.position);
            $('#department').text(data.department);
            $('#date_start').text(data.date_start);
            $('#date_end').text(data.date_end);
            $('#section').text(data.section);
            $('#branch').text(data.branch);
            $('#payment_type').text(data.payment_type);
            $('#level').text(data.level);
            $('#salary_reg_rates').text(data.salary_reg_rates);
            $('#daily_rate').text(data.daily_rate);
            $('#daily_rate_factor').text(data.daily_rate_factor);
            $('#sss_phic_salary_credit').text(data.sss_phic_salary_credit);
            $('#pagibig_salary_credit').text(data.pagibig_salary_credit);
            $('#tax_shield').text(data.tax_shield);
            $('#remarks').text(data.remarks);
            
            $('#modal_rates_details').modal('show');

        } );
                //detailed modal view of entitlement
        $('#tbl_entitlement tbody').on( 'click', 'tr td.details-control2', function () {
            _selectRowObjentitlement=$(this).closest('tr');
            var data=dt_entitlement.row(_selectRowObjentitlement).data();
            _selectedIDentitlement=data.emp_leaves_entitlement_id
                if(data.is_payable==1){
                    var  payable_detail = "<span style='color:#37d077' class='glyphicon glyphicon-ok'></span>";
                }
                else{
                    var  payable_detail = "<span style='color:#e74c3c' class='glyphicon glyphicon-remove'></span>";
                }
                if(data.is_forwardable==1){
                    var forwardable_detail = "<span style='color:#37d077' class='glyphicon glyphicon-ok'></span>";
                }
                else{
                    var forwardable_detail = "<span style='color:#e74c3c' class='glyphicon glyphicon-remove'></span>";
                }
            $('#leave_type').text(data.leave_type);
            $('#leave_type_short_name').text(data.leave_type_short_name);
            $('#is_payable_detail').html(payable_detail);
            $('#is_forwardable_detail').html(forwardable_detail);
            $('#total_grant_detail').text(data.total_grant);
            var current_balance = parseInt(data.total_grant) + parseInt(data.received_balance);
            $('#received_balance_detail').text(accounting.formatNumber("0",2));
            $('#current_balance_detail').text(accounting.formatNumber(current_balance,2));
            $('#modal_entitlement_details').modal('show');

        } );

     /*   $('#tbl_rates_duties_list tbody').on( 'click', 'tr td.details-control1', function () {
            var tr = $(this).closest('tr');
            var row = dt_rates.row( tr );
            var idx1 = $.inArray( tr.attr('id'), detailRows1 );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details1' );
                row.child.hide();

                detailRows1.splice( idx1, 1 );
            }
            else {
                tr.addClass( 'details1' );

                row.child( format1( row.data() ) ).show();

                if ( idx1 === -1 ) {
                    detailRows1.push( tr.attr('id') );
                }
            }
        } );*/
            //checkbox value for payable
        $('#frm_entitlement').on('click','input[id="payable"]',function(){
            //$('.single-checkbox').attr('checked', false);
            if(_ispayable==0){
                this.checked = true;
                _ispayable = 1;
                //alert(_ispayable);
            }
            else{
                 this.checked = false;
                 _ispayable = 0;
                  //alert(_ispayable);
            }
            

        });
             //checkbox value for forwardable
        $('#frm_entitlement').on('click','input[id="forwardable"]',function(){
            //$('.single-checkbox').attr('checked', false);
            if(_isforwardable==0){
                this.checked = true;
                _isforwardable = 1;
                //alert(_isforwardable);
            }
            else{
                 this.checked = false;
                 _isforwardable = 0;
                  //alert(_isforwardable);
            }
            

        });

            //function for getting details of leave type//
            $('#ref_leave_type_id').change(function() {
            _Leave_type_value=$(this).val();
            if(_Leave_type_value==0){
                alert("create leave type");
                return;
            }
            getLeaveTypeDetails().done(function(response){
                        $('#total_grant').val(response.data[0].total_grant);
                        $('#ref_leave_type_short_name').val(response.data[0].ref_leave_type_short_name);
                        currentBalance();
                        if(response.data[0].is_payable==1){
                            $('#payable').prop('checked', true);
                            //alert(data.is_payable);
                            _ispayable = 1;
                        }
                        else{
                            $('#payable').prop('checked', false);
                            //alert(data.is_payable);
                            _ispayable = 0;
                        }
                        if(response.data[0].is_forwardable==1){
                            $('#forwardable').prop('checked', true);
                            //alert(data.is_forwardable);
                            _isforwardable = 1;
                        }
                        else{
                            $('#forwardable').prop('checked', false);
                            //alert(data.is_forwardable);
                            _isforwardable = 0;

                        }
                        //alert("done");
                        clearFields($('#'))
                    }).always(function(){
                        $.unblockUI();
                    });
            });


            $("#total_grant").keyup(function(){
                currentBalance();
            });

            var currentBalance=function(){
                var total_grant = $('#total_grant').val();
                var received_balance = $('#received_balance').val();
                var current_balance = parseInt(total_grant) + parseInt(received_balance);
                $('#current_balance').val(current_balance);
            };
            //synchronize total grant and current balance//

            //high light row EZ trick by jbpv
            $('#tbl_employee_list tbody').delegate('tr', 'click', function() {

            $('.odd').closest("tr").css('background-color','white');
            $('.even').closest("tr").css('background-color','white');


            $(this).closest("tr").css('background-color','#bdc3c7');
                _selectRowObj=$(this).closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID=data.employee_id;
                _selectedname= '[Name : ' + data.first_name +' ' + data.middle_name + ' ' + data.last_name + ']';
                _selectedname1= data.first_name +' ' + data.middle_name + ' ' + data.last_name;
                //alert(_selectedID);
                _isChecked = this.checked = true; //for checking if there is any highlighted field
             
            });
            //to remove higlight when going to the next page
        $('.pagination').click(function(){
            _selectRowObj="";
            _isChecked = this.checked = false; //setting ischecked to no
            $('.odd').closest("tr").css('background-color','white');
            $('.even').closest("tr").css('background-color','white');
        });
            //the following codes are for buttons at top navigations
        $('#edit_duties').click(function(){
            if(_isChecked == true){
               _txnMode="ratesduties";
                $('#dataname').text(_selectedname);
                $('.display_name').text(_selectedname1);
                //alert(_selectedID);
                hideemployeeList();
                hideemployeeFields();
                hideEntitlement();
                hideApplyLeave();
                showRatesduties();
                showSpinningProgressLoading();
                getratesandduties(); 
            }
            else{
                alert("nothing checked");
            }
            
        });

        $('#edit_entitlement').click(function(){
            if(_isChecked == true){
               _txnMode="entitlement";
                $('.dataname').text(_selectedname);
                $('.display_name').text(_selectedname1);
                //alert(_selectedname1);
                hideemployeeList();
                hideemployeeFields();
                hideRatesduties();
                hideApplyLeave();
                showEntitlement();
                showSpinningProgressLoading();
                getentitlement();
            }
            else{
                alert("nothing checked");
            }
            
        });

        $('#apply_leave').click(function(){
            if(_isChecked == true){
               _txnMode="applyleave";
                $('.dataname').text(_selectedname);
                $('.display_name').text(_selectedname1);
                //alert(_selectedname1);
                hideemployeeList();
                hideemployeeFields();
                hideRatesduties();
                hideEntitlement();
                showApplyLeave();
                getFiledLeave();
                
            }
            else{
                alert("nothing checked");
            }
            
        });
            //end of top navigation buttons

//SELECT CREATE OPTION WITH TXNMODE
        $('#emp_religion').change(function() {
            var a = $('#emp_religion').val();
            if(a=="0"){
                _txnMode="religion";
                $('#emp_religion').val(1);
                $('#modal_create_religion').modal('show');
                return;
            }
            else{

            }
        });

        $('#ref_employment_type_id').change(function() {
            var a = $('#ref_employment_type_id').val();
            if(a=="0"){
                _txnModeRate="employment";
                $('#ref_employment_type_id').val(1);
                $('#title_modal').text('Create Employment Type');
                $('#name_modal').text('Employment Name');
                $('#description_modal').text('Description');
                $('#modal_references').modal('show');
                return;
            }
            else{

            }
        });

        $('#ref_payment_type_id').change(function() {
            var a = $('#ref_payment_type_id').val();
            if(a=="0"){
                _txnModeRate="paymenttype";
                $('#ref_payment_type_id').val(1);
                $('#title_modal').text('Create Payment Type');
                $('#name_modal').text('Payment Name');
                $('#description_modal').text('Description');
                $('#modal_references').modal('show');
                return;
            }
            else{

            }
        });

        $('#ref_department_id').change(function() {
            var a = $('#ref_department_id').val();
            if(a=="0"){
                _txnModeRate="department";
                $('#ref_department_id').val(1);
                $('#title_modal').text('Create Department');
                $('#name_modal').text('Department Name');
                $('#description_modal').text('Description');
                $('#modal_references').modal('show');
                return;
            }
            else{

            }
        });

        $('#ref_position_id').change(function() {
            var a = $('#ref_position_id').val();
            if(a=="0"){
                _txnModeRate="position";
                $('#ref_position_id').val(1);
                $('#title_modal').text('Create Position');
                $('#name_modal').text('Position Name');
                $('#description_modal').text('Description');
                $('#modal_references').modal('show');
                return;
            }
            else{

            }
        });

        $('#ref_branch_id').change(function() {
            var a = $('#ref_branch_id').val();
            if(a=="0"){
                _txnModeRate="branch";
                $('#ref_branch_id').val(1);
                $('#title_modal').text('Create Branch');
                $('#name_modal').text('Branch Name');
                $('#description_modal').text('Description');
                $('#modal_references').modal('show');
                return;
            }
            else{

            }
        });

        $('#ref_section_id').change(function() {
            var a = $('#ref_section_id').val();
            if(a=="0"){
                _txnModeRate="section";
                $('#ref_section_id').val(1);
                $('#title_modal').text('Create Section');
                $('#name_modal').text('Section Name');
                $('#description_modal').text('Description');
                $('#modal_references').modal('show');
                return;
            }
            else{

            }
        });

        $('#btn_new').click(function(){
            clearFields($('#frm_employee'))
            _txnMode="new";
            $('#emp_religion').val(1);
            $('#emp_civilstatus').val("Single");
            $('#emp_processaccount').val(0);
            $('#emp_exemptss').val(0);
            $('#emp_exemptphilhealth').val(1);
            $('#emp_exemptpagibig').val(0);
            $('#emp_taxcode').val(0);
            hideemployeeList();
            hideRatesduties();
            showemployeeFields();
        });

        $('#btn_newentitlement').click(function(){
            $('#entitlementtittle').text("New");
            clearFields($('#frm_entitlement'));
            _txnMode="newentitlement";
            $('#ref_leave_type_id').val(0);
            $('#received_balance').val("0.00");

           // $('#ref_employment_type_id').val(1);//

            $('.modal_create_entitlement').modal('show');
            
        });

        $('#btn_open_leave').click(function(){
            getAvailLeave().done(function(response){
                        var show1="";
                        if(response.available_leave.length==0||response.available_leave.length==null){
                                //alert("no data");
                                $('#showavailableleave').html('<center><h1>No Available Leave</h1></center>');
                                return;
                            }
                        var jsoncount=response.available_leave.length-1;
                         for(var i=0;parseInt(jsoncount)>=i;i++){
                            //alert(response.available_leave[i].leave_type);
                            show1+='<div class="col-md-4"><div style="width:100%;height:120px;background-color:#2c3e50;border-radius:5px;" id="test">'+
                            '<h2 class="boldlabel" style="padding:10px;color:#ecf0f1;"><leavetypeshow id="leavetypeshow">'+response.available_leave[i].leave_type+
                            '</leavetypeshow></h2><p style="padding-left:10px;margin:0px;color:#ecf0f1;">Total Grant : <totalgrantshow id="totalgrantshow">'+response.available_leave[i].total_grant+
                            '</totalgrantshow></p><p style="padding-left:10px;margin:0px;color:#ecf0f1;">Balance : <balanceshow id="balanceshow">'+response.available_leave[i].received_balance+'</balanceshow></p></div></div>';
                         }
                         $('#showavailableleave').html(show1);
                        /*alert(data.religion);
                        var arr = [];
                        for (var prop in data) {
                            arr.push(data[prop]);
                        }*/
                        //console.
                    }).always(function(){
                        $.unblockUI();
                        $('#modal_leave_show').modal('show');
                    });
        })

        $('#btn_newratesandduties').click(function(){
            clearFields($('#frm_ratesandduties'));
            _txnMode="newrateandduties";

            $('#ref_employment_type_id').val(1);
            $('#ref_payment_type_id').val(1);
            $('#ref_department_id').val(1);
            $('#ref_position_id').val(1);
            $('#ref_branch_id').val(1);
            $('#ref_section_id').val(1);

            $('#modal_create_ratesandduties').modal('show');
            
        });

        $('#tbl_employee_list tbody').on('click','button[name="edit_duties"]',function(){

            _txnMode="ratesduties";
            _selectRowObjrates=$(this).closest('tr');
            var data=dt.row(_selectRowObjrates).data();
            _selectedID=data.employee_id;
            _selectedname= '[Name : ' + data.emp_fname +' ' + data.emp_mname + ' ' + data.emp_lname + ']';
            _selectedname1= data.emp_fname +' ' + data.emp_mname + ' ' + data.emp_lname;
            $('#dataname').text(_selectedname);
            $('.display_name').text(_selectedname1);
            //alert(_selectedID);
            hideemployeeList();
            hideemployeeFields();
            showRatesduties();
            getratesandduties();
        });

        $('#tbl_employee_list tbody').on('click','button[name="edit_info"]',function(){
            _txnMode="edit";
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.employee_id;

			$('#emp_civilstatus').val(data.civil_status);
            $('#emp_religion').val(data.ref_religion_id);
            $('#emp_processaccount').val(data.bank_account_isprocess);
            $('#emp_taxcode').val(data.tax_code);
            $('#emp_exemptss').val(data.exmpt_sss);
            $('#emp_exemptphilhealth').val(data.exmpt_philhealth);
            $('#emp_exemptpagibig').val(data.exmpt_pagibig);

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

        $('#tbl_employee_list tbody').on('click','button[name="remove_info"]',function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.employee_id;

            $('#modal_confirmation').modal('show');
        });

        $('#tbl_entitlement tbody').on('click','button[name="entitlement_edit"]',function(){
            _txnMode="editentitlement";
            $('#entitlementtittle').text("Edit");
            _selectRowObjentitlement=$(this).closest('tr');
            var data=dt_entitlement.row(_selectRowObjentitlement).data();
            _selectedIDentitlement=data.emp_leaves_entitlement_id;
            //alert(data.ref_leave_type_id);
            $('#ref_leave_type_id').val(data.ref_leave_type_id);

                         if(data.is_payable==1){
                            $('#payable').prop('checked', true);
                            //alert(data.is_payable);
                            _ispayable = 1;
                        }
                        else{
                            $('#payable').prop('checked', false);
                            //alert(data.is_payable);
                            _ispayable = 0;
                        }
                        if(data.is_forwardable==1){ 
                            $('#forwardable').prop('checked', true);
                            //alert(data.is_forwardable);
                            _isforwardable = 1;
                        }
                        else{
                            $('#forwardable').prop('checked', false);
                            //alert(data.is_forwardable);
                            _isforwardable = 0;

                        }
                        $('.modal_create_entitlement').modal('show');
            //console.log(_selectedID);
            //$('#ref_employment_type_id').val(data.ref_employment_type_id);//
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


        })

        $('#tbl_rates_duties_list tbody').on('click','button[name="rates_duties_edit"]',function(){
            _txnMode="editratesandduties";
            $('.modal_create_ratesandduties').modal('show');
            _selectRowObjrates=$(this).closest('tr');
            var data=dt_rates.row(_selectRowObjrates).data();
            _selectedIDrates=data.emp_rates_duties_id;
            //console.log(_selectedID);
            $('#ref_employment_type_id').val(data.ref_employment_type_id);
            $('#ref_payment_type_id').val(data.ref_payment_type_id);
            $('#ref_department_id').val(data.ref_department_id);
            $('#ref_position_id').val(data.ref_position_id);
            $('#ref_branch_id').val(data.ref_branch_id);
            $('#ref_section_id').val(data.ref_section_id);
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


        })

        $('#tbl_rates_duties_list tbody').on('click','button[name="rates_duties_remove"]',function(){
            _selectRowObjrates=$(this).closest('tr');
            var data=dt_rates.row(_selectRowObjrates).data();
            _selectedIDrates=data.emp_rates_duties_id;
            console.log(_selectedIDrates);

           $('#modal_confirmation_rates').modal('show');
        });

        $('#tbl_entitlement tbody').on('click','button[name="entitlement_remove"]',function(){
            _selectRowObjentitlement=$(this).closest('tr');
            var data=dt_entitlement.row(_selectRowObjentitlement).data();
            _selectedIDentitlement=data.emp_leaves_entitlement_id;

           $('#modal_confirmation_entitlement').modal('show');
        });

        $('#btn_yes').click(function(){
            removeEmployee().done(function(response){
                showNotification(response);
                dt.row(_selectRowObj).remove().draw();
                $.unblockUI();
            });
        });

        $('#btn_yes_rates').click(function(){
            removeRates().done(function(response){
                showNotification(response);
                dt_rates.row(_selectRowObjrates).remove().draw();
                $.unblockUI();
            });
        });

        $('#btn_yes_entitlement').click(function(){
            removeEntitlement().done(function(response){
                showNotification(response);
                dt_entitlement.row(_selectRowObjentitlement).remove().draw();
                $.unblockUI();
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
        // for back and cancel buttons to destroy datatables
        $('#btn_cancelempfields').click(function(){
            hideemployeeFields();
            hideRatesduties();
            showemployeeList();
        });

        $('#btn_cancelratesandduties').click(function(){
            hideRatesduties();
            hideemployeeFields();
            showemployeeList();
            $('#tbl_rates_duties_list').dataTable().fnDestroy();
            $('#tbl_rates_duties_list').fnClearTable();
        });

        $('#btn_cancelentitlement').click(function(){
            hideRatesduties();
            hideemployeeFields();
            hideEntitlement();
            showemployeeList();
            $('#tbl_entitlement').dataTable().fnDestroy();
            $('#tbl_entitlement').fnClearTable();
        });

        $('#btn_cancelapplyleave').click(function(){
            hideRatesduties();
            hideemployeeFields();
            hideEntitlement();
            hideApplyLeave();
            showemployeeList();
            $('#tbl_apply_leave').dataTable().fnDestroy();
            $('#tbl_apply_leave').fnClearTable();
        });

       /* $('#btn_save').click(function(){
            if(validateRequiredFields($('#frm_employee'))){
                if(_txnMode=="new"){
                    createEmployee().done(function(response){
                        showNotification(response);
                        dt.row.add(response.row_added[0]).draw();
                        clearFields($('#frm_employee'))

                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                    return;
                }
                if(_txnMode=="edit"){
                    updateEmployee().done(function(response){
                        showNotification(response);
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                        clearFields($('#frm_employee'))
                        showList(true);
                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                    return;
                }
            }
        }); */
                //CREATE NEW EMPLOYEEE
        $('#btn_save').click(function(){
            if(validateRequiredFields($('#frm_employee'))){
                if(_txnMode=="new"){
                    createEmployee().done(function(response){
                        showNotification(response);
                        dt.row.add(response.row_added[0]).draw();
                        clearFields($('#frm_employee'))
                    }).always(function(){
                        $.unblockUI();
                    });
                    return;
                }
                if(_txnMode=="edit"){
                    updateEmployee().done(function(response){
                        showNotification(response);
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                        clearFields($('#frm_employee'))
                        showList(true);
                    }).always(function(){
                        $.unblockUI();
                    });
                    return;
                }
            }
        });

            //CREATE ENTITLEMENT
        $('#btn_createentitlement').click(function(){
            if(validateRequiredFields($('#frm_entitlement'))){
                if(_txnMode=="newentitlement"){
                    createEntitlement().done(function(response){
                        showNotification(response);
                        dt_entitlement.row.add(response.row_added[0]).draw();
                        clearFields($('#frm_entitlement'))
                    }).always(function(){
                        $.unblockUI();
                        $('#modal_create_entitlement').modal('hide');
                    });
                    return;
                }
                if(_txnMode=="editentitlement"){
                    //alert(_selectedIDentitlement)
                    updateEntitlement().done(function(response){
                        showNotification(response);
                        dt_entitlement.row(_selectRowObjentitlement).data(response.row_updated[0]).draw();
                        clearFields($('#frm_entitlement'))
                    }).always(function(){
                        $('#modal_create_entitlement').modal('hide');
                        $.unblockUI();
                       
                    });
                    return;
                }
            }
        });

            //CREATE RATES AND DUTIES
        $('#btn_createratesandduties').click(function(){
            if(validateRequiredFields($('#frm_ratesandduties'))){
                if(_txnMode=="newrateandduties"){
                    createRatesandDuties().done(function(response){
                        showNotification(response);
                        dt_rates.row.add(response.row_added[0]).draw();
                        dt.row(_selectRowObj).data(response.row_update[0]).draw(); //for updating employee list 
                        clearFields($('#frm_ratesandduties'))
                    }).always(function(){
                        $('#modal_create_entitlement').modal('hide');
                        $.unblockUI();
                    });
                    return;
                }
                if(_txnMode=="editratesandduties"){
                    updateRatesandDuties().done(function(response){
                        showNotification(response);
                        dt_rates.row(_selectRowObjrates).data(response.row_updated[0]).draw();
                        dt.row(_selectRowObj).data(response.row_update[0]).draw(); //for updating employee list 
                        clearFields($('#frm_ratesandduties'))
                    }).always(function(){
                        $.unblockUI();
                    });
                    return;
                }
            }
        });
            //SELECT CREATE OPTION
        $('#btn_new_religion').click(function(){
            if(validateRequiredFields($('#frm_religion'))){
                if(_txnMode=="religion"){
                    createReligion().done(function(response){
                        showNotification(response);
                        data=response.row_added[0];
                        /*alert(data.religion);
                        var arr = [];
                        for (var prop in data) {
                            arr.push(data[prop]);
                        }*/
                        //console.log(data);
                        $('#emp_religion').append($('<option>', {value:data.ref_religion_id, text:data.religion}));
                        clearFields($('#frm_religion'))

                    }).always(function(){
                        $('#modal_create_religion').modal('hide');
                        $.unblockUI();
                    });
                    return;
                }
                else{
                    //do nothing :D
                }
            }
        });

        $('#btn_new_create_reference').click(function(){
            if(validateRequiredFields($('#frm_references'))){
                if(_txnModeRate=="employment"){
                    createEmploymentType().done(function(response){
                        showNotification(response);
                        data=response.row_added[0];
                       /* var arr = [];
                        for (var prop in data) {
                            arr.push(data[prop]);
                        }*/
                        //console.log(arr);
                        $('#ref_employment_type_id').append($('<option>', {value:data.ref_employment_type_id, text:data.employment_type}));
                        $('#postname').val('');
                        $('#postdescription').val('');
                        $('#ref_employment_type_id').val(data.ref_employment_type_id);

                    }).always(function(){
                        $('#modal_references').modal('hide');
                        $.unblockUI();
                    });
                    return;
                }
                if(_txnModeRate=="paymenttype"){
                    createPaymentType().done(function(response){
                        showNotification(response);
                        data=response.row_added[0];
                        /*var arr = [];
                        for (var prop in data) {
                            arr.push(data[prop]);
                        }*/
                        //console.log(arr);
                        $('#ref_payment_type_id').append($('<option>', {value:data.ref_payment_type_id, text:data.payment_type}));
                        $('#postname').val('');
                        $('#postdescription').val('');
                        $('#ref_payment_type_id').val(data.ref_payment_type_id);

                    }).always(function(){
                        $('#modal_references').modal('hide');
                        $.unblockUI();
                    });
                    return;
                }
                if(_txnModeRate=="department"){
                    createDepartment().done(function(response){
                        showNotification(response);
                        data=response.row_added[0];
                        /*var arr = [];
                        for (var prop in data) {
                            arr.push(data[prop]);
                        }*/
                        //console.log(arr);
                        $('#ref_department_id').append($('<option>', {value:data.ref_department_id, text:data.department}));
                        $('#postname').val('');
                        $('#postdescription').val('');
                        $('#ref_department_id').val(data.ref_department_id);

                    }).always(function(){
                        $('#modal_references').modal('hide');
                        $.unblockUI();
                    });
                    return;
                }
                if(_txnModeRate=="position"){
                    createPosition().done(function(response){
                        showNotification(response);
                        data=response.row_added[0];
                        /*var arr = [];
                        for (var prop in data) {
                            arr.push(data[prop]);
                        }*/
                        //console.log(arr);
                        $('#ref_position_id').append($('<option>', {value:data.ref_position_id, text:data.position}));
                        $('#postname').val('');
                        $('#postdescription').val('');
                        $('#ref_position_id').val(data.ref_position_id);

                    }).always(function(){
                        $('#modal_references').modal('hide');
                        $.unblockUI();
                    });
                    return;
                }
                if(_txnModeRate=="branch"){
                    createBranch().done(function(response){
                        showNotification(response);
                        data=response.row_added[0];
                        /*var arr = [];
                        for (var prop in data) {
                            arr.push(data[prop]);
                        }
                        console.log(arr);*/
                        $('#ref_branch_id').append($('<option>', {value:data.ref_branch_id, text:data.branch}));
                        $('#postname').val('');
                        $('#postdescription').val('');
                        $('#ref_branch_id').val(data.ref_branch_id);
                    }).always(function(){
                        $('#modal_references').modal('hide');
                        $.unblockUI();
                    });
                    return;
                }
                if(_txnModeRate=="section"){
                    createSection().done(function(response){
                        showNotification(response);
                        data=response.row_added[0];
                        /*var arr = [];
                        for (var prop in data) {
                            arr.push(data[prop]);
                        }
                        console.log(arr);*/
                        $('#ref_section_id').append($('<option>', {value:data.ref_section_id, text:data.section}));
                        $('#postname').val('');
                        $('#postdescription').val('');
                        $('#ref_section_id').val(data.ref_section_id);
                    }).always(function(){
                        $('#modal_references').modal('hide');
                        $.unblockUI();
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

                if($(this).is('select')){
                if($(this).val()==0){
                    showNotification({title:"Error!",stat:"error",msg:"Employment Type is Required"});
                    $(this).closest('div.form-group').addClass('has-error');
                    $(this).focus();
                    stat=false;
                    return false;
                }
            
                }else{
                if($(this).val()==""){
                    showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                    $(this).closest('div.form-group').addClass('has-error');
                    $(this).focus();
                    stat=false;
                    return false;
                }
            }
            



        });

        return stat;
    };

    var createEmployee=function(){
        var _data=$('#frm_employee').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Employee/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var updateEmployee=function(){
        var _data=$('#frm_employee').serializeArray();

        console.log(_data);
        _data.push({name : "employee_id" ,value : _selectedID});
        //_data.push({name:"is_inventory",value: $('input[name="is_inventory"]').val()});

        //alert($('input[name="is_inventory"]').val());
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Employee/transaction/update",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var removeEmployee=function(){
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Employee/transaction/delete",
            "data":{employee_id : _selectedID},
            "beforeSend": showSpinningProgress($('#'))
        });
    };

    var createRatesandDuties=function(){
        var _data=$('#frm_ratesandduties').serializeArray();
        _data.push({name : "employee_id" ,value : _selectedID});
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RatesDuties/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_createratesandduties'))
        });
    };

    var updateRatesandDuties=function(){
        var _data=$('#frm_ratesandduties').serializeArray();
        _data.push({name : "emp_rates_duties_id" ,value : _selectedIDrates});
        _data.push({name : "employee_id" ,value : _selectedID});
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RatesDuties/transaction/update",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_createratesandduties'))
        });
    };

    var removeRates=function(){
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RatesDuties/transaction/delete",
            "data":{emp_rates_duties_id : _selectedIDrates},
            "beforeSend": showSpinningProgress($('#'))
        });
    };

    var createEntitlement=function(){
        var _data=$('#frm_entitlement').serializeArray();
        _data.push({name : "employee_id" ,value : _selectedID});
        _data.push({name : "is_payable" ,value : _ispayable});
        _data.push({name : "is_forwardable" ,value : _isforwardable});
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Entitlement/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_createentitlement'))
        });
    };

    var updateEntitlement=function(){
        var _data=$('#frm_entitlement').serializeArray();
        _data.push({name : "emp_leaves_entitlement_id" ,value : _selectedIDentitlement});
        _data.push({name : "employee_id" ,value : _selectedID});
        _data.push({name : "is_payable" ,value : _ispayable});
        _data.push({name : "is_forwardable" ,value : _isforwardable});
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Entitlement/transaction/update",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_createentitlement'))
        });
    };

    var removeEntitlement=function(){
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Entitlement/transaction/delete",
            "data":{emp_leaves_entitlement_id : _selectedIDentitlement},
            "beforeSend": showSpinningProgress($('#'))
        });
    };

    var createReligion=function(){
        var _data=$('#frm_religion').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefReligion/transaction/createdirect",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_new_religion'))
        });
    };

    var createEmploymentType=function(){
        var _data=$('#frm_references').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefEmploymentType/transaction/createdirect",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_new_religion'))
        });
    };

    var createPaymentType=function(){
        var _data=$('#frm_references').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefPaymentType/transaction/createdirect",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_new_payment_type'))
        });
    };

    var createDepartment=function(){
        var _data=$('#frm_references').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefDepartment/transaction/createdirect",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_new_department'))
        });
    };

    var createPosition=function(){
        var _data=$('#frm_references').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefPosition/transaction/createdirect",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_new_position'))
        });
    };

    var createBranch=function(){
        var _data=$('#frm_references').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefBranch/transaction/createdirect",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_new_branch'))
        });
    };

    var createSection=function(){
        var _data=$('#frm_references').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefSection/transaction/createdirect",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_new_section'))
        });
    };

    var getLeaveTypeDetails=function(){
        var _data=$('#').serializeArray();
        _data.push({name : "ref_leave_type_id" ,value : _Leave_type_value});

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefLeave/transaction/filterlist",
            "data":_data,
            "beforeSend": showSpinningProgressLoading()
        });
    };

    var getAvailLeave=function(){
        var _data=$('#').serializeArray();
        _data.push({name : "employee_id" ,value : _selectedID});

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Entitlement/transaction/getavailableleave",
            "data":_data,
            "beforeSend": showSpinningProgressLoading()
        });
    };

    var showList=function(b){
        if(b){
            $('#div_product_list').show();
            $('#div_product_fields').hide();
        }else{
            $('#div_product_list').hide();
            $('#div_product_fields').show();
        }
    };

    var hideemployeeList=function(){
         $('#div_product_list').hide();
    };

    var showemployeeList=function(){
        $('#div_product_list').show();
        $('#icon_new_employee').show();
        $('#icon_entitlement').show();
        $('#icon_apply_leave').show();
        $('#icon_rates').show();
        $('#edit_memorandum').show();
        $('#edit_commendation').show();
        $('#edit_seminar').show();
    };

    var hideemployeeFields=function(){
        $('#div_product_fields').hide();
        $('#icon_new_employee').show();
        $('#icon_entitlement').show();
        $('#icon_apply_leave').show();
        $('#icon_rates').show();
        $('#edit_memorandum').show();
        $('#edit_commendation').show();
        $('#edit_seminar').show();
    };

    var showemployeeFields=function(){
        $('#div_product_fields').show();
        $('#icon_new_employee').hide();
        $('#icon_entitlement').hide();
        $('#icon_apply_leave').hide();
        $('#icon_rates').hide();
        $('#edit_memorandum').hide();
        $('#edit_commendation').hide();
        $('#edit_seminar').hide();
    };

    var hideRatesduties=function(){
        $('#div_rates_duties_list').hide();
        $('#icon_new_employee').show();
        $('#icon_entitlement').show();
        $('#icon_apply_leave').show();
        $('#icon_rates').show();
        $('#edit_memorandum').show();
        $('#edit_commendation').show();
        $('#edit_seminar').show();
    };

    var showRatesduties=function(){
        $('#div_rates_duties_list').show();
        $('#icon_new_employee').hide();
        $('#icon_entitlement').hide();
        $('#icon_apply_leave').hide();
        $('#icon_rates').hide();
        $('#edit_memorandum').hide();
        $('#edit_commendation').hide();
        $('#edit_seminar').hide();
    };

    var hideEntitlement=function(){
        $('#div_entitlement_list').hide();
        $('#icon_new_employee').show();
        $('#icon_entitlement').show();
        $('#icon_apply_leave').show();
        $('#icon_rates').show();
        $('#edit_memorandum').show();
        $('#edit_commendation').show();
        $('#edit_seminar').show();
    };

    var showEntitlement=function(){
        $('#div_entitlement_list').show();
        $('#icon_new_employee').hide();
        $('#icon_entitlement').hide();
        $('#icon_apply_leave').hide();
        $('#icon_rates').hide();
        $('#edit_memorandum').hide();
        $('#edit_commendation').hide();
        $('#edit_seminar').hide();
    };

    var hideApplyLeave=function(){
        $('#div_apply_leave').hide();
        $('#icon_new_employee').show();
        $('#icon_entitlement').show();
        $('#icon_apply_leave').show();
        $('#icon_rates').show();
        $('#edit_memorandum').show();
        $('#edit_commendation').show();
        $('#edit_seminar').show();
    };

    var showApplyLeave=function(){
        $('#div_apply_leave').show();
        $('#div_entitlement_list').hide();
        $('#icon_new_employee').hide();
        $('#icon_entitlement').hide();
        $('#icon_apply_leave').hide();
        $('#icon_rates').hide();
        $('#edit_memorandum').hide();
        $('#edit_commendation').hide();
        $('#edit_seminar').hide();
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
        $.blockUI({ message: '<img src="assets/img/gears.svg"/><br><h4 style="color:#ecf0f1;">Saving Changes...</h4>',
            css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: 'none', 
            opacity: 1,
            zIndex: 20000,
        } });
        $('.blockOverlay').attr('title','Click to unblock').click($.unblockUI);  
    };

    var showSpinningProgressLoading=function(e){
        $.blockUI({ message: '<img src="assets/img/gears.svg"/><br><h4 style="color:#ecf0f1;">Loading Data...</h4>',
            css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: 'none', 
            opacity: 1,
            zIndex: 20000,
        } });
        $('.blockOverlay').attr('title','Click to unblock').click($.unblockUI);  
    };

    var clearFields=function(f){
        $('input,textarea',f).val('');
        $(f).find('input:first').focus();
    };



    function format ( d ) {
        return '<div class="container-fluid">'+
        '<div class="col-md-12">'+ 
        '<h3 class="boldlabel"><span class="glyphicon glyphicon-user fa-lg"></span> ' + d.first_name +' ' + d.middle_name + ' ' +d.last_name + '</h3>'+
        '<p>[ ECODE : '+d.ecode+' ] [ ID : '+d.id_number+' ]</p>'+
        '<hr style="height:1px;background-color:black;"></hr>'+
        '</div>'+ //First Row//
        '<div class="row">'+
        '<div class="col-md-2">'+
        '<center><img style="margin-top:4px;" src="assets/img/anonymous-icon.png"></img></center>'+
        '</div>'+
        '<div class="col-md-4"><p class="nomargin"><b>Gender</b> : '+d.gender+'</p>'+
        '<p class="nomargin"><b>Birthdate</b> : '+d.birthdate+'</p>'+
        '<p class="nomargin"><b>Civil Status</b> : '+d.civil_status+'</p>'+
        '<p class="nomargin"><b>Blood Type</b> : '+d.blood_type+'</p>'+
        '<p class="nomargin"><b>Height</b> : '+d.height+'</p>'+
        '<p class="nomargin"><b>Weight</b> : '+d.weight+'</p>'+
        '<p class="nomargin"><b>Religion</b> : '+d.religion+'</p>'+
        '</div>'+
        '<div class="col-md-4">'+
        '<p class="nomargin"><b>SSS</b> : '+d.sss+'</p>'+
        '<p class="nomargin"><b>Phil Health</b> : '+d.phil_health+'</p>'+
        '<p class="nomargin"><b>Pag-Ibig :</b> : '+d.pag_ibig+'</p>'+
        '<p class="nomargin"><b>TIN :</b> : '+d.tin+'</p>'+
        '<p class="nomargin"><b>Account No.</b> : '+d.bank_account+'</p>'+
        '<p class="nomargin"><b>Tax Code</b> : '+d.tax_code+'</p>'+
        '</div>'+
        '</div>'+
        '<div class="col-md-12">'+ 
        '<h3 class="boldlabel"><h4 class="boldlabel"><span class="glyphicon glyphicon-info-sign fa-lg"></span> Employee Information</h4><hr style="height:1px;background-color:black;"></hr></div>'+
        '<div class="row">'+ //Second Row//
        '<div class="col-md-2">'+
        '<center></center>'+
        '</div>'+
        '<div class="col-md-4"><p class="nomargin"><b>Employee Type</b> : '+d.employment_type+'</p>'+
        '<p class="nomargin"><b>Remarks</b> : '+d.status+'</p>'+
        '<p class="nomargin"><b>Department</b> : '+d.department+'</p>'+
        '<p class="nomargin"><b>Position</b> : '+d.position+'</p>'+
        '<p class="nomargin"><b>Branch</b> : '+d.branch+'</p>'+
        '</div>'+
        '<div class="col-md-4">'+
        '<p class="nomargin"><b>Section</b> : '+d.section+'</p>'+
        '<p class="nomargin"><b>Pay Type</b> : '+d.payment_type+'</p>'+
        '<p class="nomargin"><b>Employment Date</b> : '+d.employment_date+'</p>'+
        '<p class="nomargin"><b>Date Regular</b> : '+d.emp_philhealth+'</p>'+
        '</div>'+
        '</div>'+
        '<div class="col-md-12">'+ 
        '<h3 class="boldlabel"><h4 class="boldlabel"><span class="glyphicon glyphicon-info-sign fa-lg"></span> Contact Information</h4><hr style="height:1px;background-color:black;"></hr></div>'+
        '<div class="row">'+ //Second Row//
        '<div class="col-md-2">'+
        '<center></center>'+
        '</div>'+
        '<div class="col-md-4"><p class="nomargin"><b>Address 1</b> : '+d.address_one+'</p>'+
        '<p class="nomargin"><b>Address 2</b> : '+d.address_two+'</p>'+
        '<p class="nomargin"><b>Email Address</b> : '+d.email_address+'</p>'+
        '</div>'+
        '<div class="col-md-4"><p class="nomargin"><b>Mobile No.</b> : '+d.cell_number+'</p>'+
        '<p class="nomargin"><b> Phone No.</b> : '+d.telphone_number+'</p>'+
        '</div>'+
        '</div>'+
        '</div>';
    };

;



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