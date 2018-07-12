<?php 
    session_start();
    if (isset($_SESSION['u_id'])) {
        echo "logged in";
    } else {
        header("Location: login.php");
        exit;
    }

 ?>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Blog CMS</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="../index-4.php">View Site</a></li>




                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Bilal Afridi <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts" class="collapse">
                            <li>
                                <a href="posts.php">All Posts</a>
                            </li>
                            <li>
                                <a href="posts.php?source=add_post">Add Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="basicinfo.php"><i class="fa fa-fw fa-bar-chart-o"></i> Basic Info </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-user"></i> About <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="about.php">About Us</a>
                            </li>
                            <li>
                                <a href="skills.php">Skills</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="services.php"><i class="fa fa-fw fa-hands-helping"></i> Services </a>
                    </li>
                    <li>
                        <a href="testimonials.php"><i class="fa fa-fw fa-dashboard"></i> Testimonails</a>
                    </li>
                    <li>
                        <a href="quotes.php"><i class="fa fa-fw fa-dashboard"></i> Quotes</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>