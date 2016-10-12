<!--Header-->
<header id="topnav" class="navbar navbar-default navbar-fixed-top" role="banner">

    <div class="logo-area">
                <span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
                    <a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
                        <span class="icon-bg">
                            <i class="ti ti-menu"></i>
                        </span>
                    </a>
                </span>
                

        <a class="navbar-brand" href="#">HRIS</a>



    </div><!-- logo-area -->

    <ul class="nav navbar-nav toolbar pull-right">

        <li class="toolbar-icon-bg" style="display:" id="icon_new_employee">
            <a href="#" id="btn_new"  title="New Employee"><span class="icon-bg"><i class="fa fa-user-plus"></i></span></i></a>
        </li>
        <li class="toolbar-icon-bg" style="display:" id="icon_new_employee">
            <a href="#" id="btn_dtr"  title="New Employee"><span class="icon-bg"><i class="fa fa-calendar-o"></i></span></i></a>
        </li>
        

        <li class="dropdown toolbar-icon-bg">
            <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
                <img class="img-circle" src="<?php echo $this->session->user_photo; ?>" alt="" />
            </a>
            <ul class="dropdown-menu userinfo arrow">
                <li><a href="#"><i class="ti ti-user"></i><span>Profile</span></a></li>
                <li><a href="login/transaction/logout"><i class="ti ti-shift-right"></i><span>Sign Out</span></a></li>
            </ul>
        </li>

    </ul>

</header><!--Header-->


