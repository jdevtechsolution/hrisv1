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
                        <li><a href="Payroll">Payroll</a></li>
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

                        <div id="div_employee_list">
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
                                                    <th style="background-color:#f55246;color:white;"></th>
                                                    <th style="background-color:#f55246;color:white;">First Name</th>
                                                    <th style="background-color:#f55246;color:white;">Middle Name</th>
                                                    <th style="background-color:#f55246;color:white;">Last Name</th>
                                                    <th style="background-color:#f55246;color:white;"><center>Action</center></th>
                                                 </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                <div class="panel-footer"></div>
                            </div> <!--panel default -->

                        </div> <!--rates and duties list -->

                        <div id="div_employee_fields" style="display: none;">
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
                                                        <center><img name="img_user" src="assets/img/anonymous-icon.png" height="130px;"width="130px;"></img></center>
                                                        <hr style="margin-top:0px !important;height:1px;background-color:black;"></hr>
                                                        <center>
                                                             <button type="button" id="btn_browse" style="width:150px;margin-bottom:5px;" class="btn btn-primary">Browse Photo</button>
                                                             <button type="button" id="btn_remove_photo" style="width:150px;" class="btn btn-danger">Remove</button>
                                                             <input type="file" name="file_upload[]" class="hidden">
                                                           
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

                    <div id="div_dtr_entry" style="display:none;">
                           
                            <div class="panel panel-default">
                                <button class="btn"  id="btn_canceldtr" style="width:50px;font-family: Tahoma, Georgia, Serif;background-color:#e74c3c;color:white;margin-top:10px;margin-left:17px;" title="Create New Employee" >
                                    <span class="glyphicon glyphicon-arrow-left"></span>
                
                                <button class="btn btn_newseminartraining"  id="btn_newdtr" style="width:120;font-family: Tahoma, Georgia, Serif;background-color:#2ecc71;color:white;margin-top:10px;margin-left:5px;" title="Create New Employee" >
                                    <i class="fa fa-file"></i> New DTR  </button>
                                    
                                        <div class="panel-heading" style="background-color:#2c3e50 !important;margin-top:5px;margin-left:17px;margin-right:17px;border-radius:5px;">
                                             <center><h2 style="color:white;font-weight:300;">Employee with DTR  </h2></center>
                                             <div class="pull-right"><strong>[ <a id="" href="#" style="text-decoration: underline;color:white;"><displayname id="" class="periodcoveredtext"></displayname></a> ]</strong></div>
                                              </div>

                                    <div class="panel-body table-responsive" style="padding-top:5px;">
                                        <table id="tbl_employee_dtr" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>E-CODE</th>
                                                    <th>Fullname</th>
                                                    <th>Department</th>
                                                    <th><center>Action</center></th>
                                                 </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                <div class="panel-footer"></div>
                            </div> <!--panel default -->

                        </div> <!--Seminars and training list -->

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

                <div id="modal_dtr" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#27ae60;">
                            <button type="button" style="color:white;" class="close"  data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;"><span id="modal_mode"> Daily Time Record </h4>
                        </div>

                        <div class="modal-body">
                            <form id="frm_dtr">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Year : </label>
                                    <select class="form-control" id="year" data-error-msg="This Field is Required!" required>
                                        <option value="0">[ Select Year ]</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        <option value="2031">2031</option>
                                        <option value="2032">2032</option>
                                        <option value="2033">2033</option>
                                        <option value="2034">2034</option>
                                        <option value="2035">2035</option>
                                        <option value="2036">2036</option>
                                        <option value="2037">2037</option>
                                        <option value="2038">2038</option>
                                    </select>
                                </div>
                              </div>
                              <div class="col-md-8">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Pay Period : </label>
                                    <select id='pay_period' class='form-control' name='emp_leaves_entitlement_id'>
                                    
                                </select>
                                </div>
                              </div>
                            </div><br>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Period Start:</label>
                                    <input type="text" class="form-control" id="period_start" name="pay_period_start" placeholder="" data-error-msg="This Field is Required!" disabled required>
                                </div>
                              </div>    
                              <div class="col-md-6">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Period End:</label>
                                    <input type="text" class="form-control" id="period_end" name="pay_period_end" placeholder="" data-error-msg="This Field is Required!" disabled required>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Department:</label>
                                    <input type="text" class="form-control" id="department" name="department" placeholder="" data-error-msg="This Field is Required!" required>
                                </div>
                              </div>    
                              <div class="col-md-6">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Group:</label>
                                    <input type="text" class="form-control" id="group_desc" name="group_desc" placeholder="" data-error-msg="This Field is Required!" required>
                                </div>
                              </div>
                            </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_select_dtr" type="button" class="btn btn-success">Select</button>
                            <button id="btn_close_dtr" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
                </div>

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
    var dt; var _txnMode; var _txnModeRate; var _selectedID;
    var _selectedDateCovered; var _selectedYear; var _periodstart; var _periodend;

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

    var getDtr=function(){
                    dt_dtr=$('#tbl_employee_dtr').DataTable({
            "fnInitComplete": function (oSettings, json) {
                $.unblockUI();
                },
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "ajax": {
            "url": "DailyTimeRecord/transaction/getdtrlist",
            "type": "POST",
            "bDestroy": true,
            "data": function ( d ) {
                return $.extend( {}, d, {
                    "pay_period_id": _selectedYear //id of the user
                    } );
                }
            },
            "columns": [
                { targets:[0],data: "ecode" },
                { targets:[1],data: "first_name" },
                { targets:[2],data: "last_name" },
                {
                    targets:[3],
                    render: function (data, type, full, meta){
                        var btn_edit='<button class="btn btn-default btn-sm" name="dtr_edit"   data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                        var btn_trash='<button class="btn btn-default btn-sm" name="dtr_remove"  data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                        return '<center>'+btn_edit+btn_trash+'</center>';
                    }
                }
            ],
            language: {
                         searchPlaceholder: "Search Employee Dtr"
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

        $('#year').change(function() {
            _selectedYear=$(this).val();
            //alert(_selectedYear);
            getpayperiod().done(function(response){
                        var show2select="";
                        if(response.data.length==0){
                            $('#pay_period').html("<option>No Result</option>");
                            $('#period_start').val("");
                            $('#period_end').val("");
                            return;
                        }
                        var jsoncount=response.data.length-1;
                         for(var i=0;parseInt(jsoncount)>=i;i++){
                            //alert(response.available_leave[i].leave_type);
                            show2select+='<option value='+response.data[i].pay_period_start+'~'+response.data[i].pay_period_end+'~'+response.data[i].pay_period_id+'>'+response.data[i].pay_period_start+' - '+response.data[i].pay_period_end+'</option>';
                         }
                         $('#pay_period').html(show2select);
                         var temppayperiod = $('#pay_period').val();
                        var payperiod = temppayperiod.split(/~/)
                        $('#period_start').val(payperiod[0]);
                        $('#period_end').val(payperiod[1]);
                        _selectedYear=payperiod[2];

                        /*alert(data.religion);
                        var arr = [];
                        for (var prop in data) {
                            arr.push(data[prop]);
                        }*/
                        //console.
                    }).always(function(){
                        $.unblockUI();
                        $('.modal_file_leave').modal('show');
                    });

            
            });

        $('#pay_period').change(function() {
            _payperiod=$(this).val();
            //alert(_yearperiod);
            var payperiod = _payperiod.split(/~/)
            $('#period_start').val(payperiod[0]);
            $('#period_end').val(payperiod[1]);
            _selectedYear=payperiod[2];
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
            $(".date-picker").val('<?php echo date("m/d/Y"); ?>');
            hideemployeeList();
            showemployeeFields();
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
            if(data.image_name==""){
                 $('img[name="img_user"]').attr('src','assets/img/anonymous-icon.png');
            }
            else{
                $('img[name="img_user"]').attr('src',data.image_name);
            }

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

            hideemployeeList();
            showemployeeFields();

        });

        $('#tbl_employee_list tbody').on('click','button[name="remove_info"]',function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.employee_id;

            $('#modal_confirmation').modal('show');
        });

        // for back and cancel buttons to destroy datatables
        $('#btn_cancelempfields').click(function(){
            hideemployeeFields();
            showemployeeList();
        });

        $('#btn_yes').click(function(){
            removeEmployee().done(function(response){
                showNotification(response);
                dt.row(_selectRowObj).remove().draw();
                $.unblockUI();
            });
        });

        $('#btn_remove_photo').click(function(event){
                event.preventDefault();
                $('img[name="img_user"]').attr('src','assets/img/anonymous-icon.png');
            });

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

        $('#btn_dtr').click(function(){
            $('#modal_dtr').modal('toggle');
            $('#payperiodhere').html("<option>aw</option>"); //noresult for option
        });

        $('#btn_select_dtr').click(function(){
            if(validateRequiredFields($('#frm_dtr'))){
            $('#modal_dtr').modal('toggle');
            _selectedDateCovered = 'Period Covered: Oct 15, 2016 - Oct 30,2016';
            $('.periodcoveredtext').text(_selectedDateCovered);
            showdtr();
            getDtr();
        }
        });

        $('#btn_canceldtr').click(function(){
            hidedtr();
        });

        $('input[name="file_upload[]"]').change(function(event){
            var _files=event.target.files;

            //$('#div_img_product').hide();
           // $('#div_img_loader').show();
           showSpinningProgressUpload();

            var data=new FormData();
            $.each(_files,function(key,value){
                data.append(key,value);
            });

            console.log(_files);

            $.ajax({
                url : 'Employee/transaction/upload',
                type : "POST",
                data : data,
                cache : false,
                dataType : 'json',
                processData : false,
                contentType : false,
                success : function(response){
                            //console.log(response);
                            //alert(response.path);
                           // $('#div_img_loader').hide();
                           // $('#div_img_user').show();
                            $.unblockUI();
                            $('img[name="img_user"]').attr('src',response.path);

                        }
            });
        });


    })();


    $('#btn_browse').click(function(event){
                    event.preventDefault();
                    $('input[name="file_upload[]"]').click();
             });

    var createEmployee=function(){
        var _data=$('#frm_employee').serializeArray();
        _data.push({name : "image_name" ,value : $('img[name="img_user"]').attr('src')});
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
        _data.push({name : "image_name" ,value : $('img[name="img_user"]').attr('src')});

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

    var getpayperiod=function(){
        var _data=$('#').serializeArray();
        _data.push({name : "year" ,value : _selectedYear});

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefPayPeriodSetup/transaction/getpayperiod",
            "data":_data,
            "beforeSend": showSpinningProgressLoading()
        });
    };

    var showList=function(b){
        if(b){
            $('#div_employee_list').show();
            $('#div_employee_fields').hide();
        }else{
            $('#div_employee_list').hide();
            $('#div_employee_fields').show();
        }
    };

    var hideemployeeList=function(){
         $('#div_employee_list').hide();
    };

    var showemployeeList=function(){
        $('#div_employee_list').show();
        $('#icon_new_employee').show();
    };

    var hideemployeeFields=function(){
        $('#div_employee_fields').hide();
        $('#icon_new_employee').show();
    };

    var showemployeeFields=function(){
        $('#div_employee_fields').show();
        $('#icon_new_employee').hide();
    };

    var showdtr=function(){
        $('#div_dtr_entry').show();
        $('#div_employee_list').hide();
        $('#icon_new_employee').hide();
        $('#btn_dtr').hide();
    };

    var hidedtr=function(){
        $('#div_dtr_entry').hide();
        $('#btn_dtr').show();
        $('#icon_new_employee').show();
        $('#div_employee_list').show();
    };

    var validateRequiredFields=function(f){
        var stat=true;

        $('div.form-group').removeClass('has-error');
        $('input[required],textarea[required],select[required]',f).each(function(){

                if($(this).is('select')){
                if($(this).val()==0){
                    showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
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

    var showSpinningProgressUpload=function(e){
        $.blockUI({ message: '<img src="assets/img/gears.svg"/><br><h4 style="color:#ecf0f1;">Uploading Image...</h4>',
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
        '<center><img style="margin-top:4px;width:150px;height:150px;" src="'+d.image_name+'"></img></center>'+
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