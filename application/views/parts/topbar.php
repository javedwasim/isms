
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
  <!-- User Account: style can be found in dropdown.less -->
            <ul class="navbar-nav ml-auto">
                <li class="dropdown user user-menu pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url(); ?>assets/dist/img/avatar5.png?>" class="user-image"
                             alt="User Image">
                        <span class="hidden-xs docName">Admin Isms</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo base_url(); ?>assets/dist/img/avatar5.png?>"
                                 class="img-circle" alt="User Image">
                            <p>
                                Welcome! Admin
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url('dashboard/profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url('dashboard/logout'); ?>" class="btn btn-default btn-flat">Sign
                                    out</a>
                            </div>
                        </li>
                    </ul>
                </li>
              </ul>
  </nav>
  <!-- /.navbar -->