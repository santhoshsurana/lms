<?php session_start();?>

<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width' />
    <title>Lab Management system</title>
    <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='css/bootstrap-responsive.min.css'>
    <link rel="stylesheet" type="text/css" href="css/datepicker.css" />
    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <link rel='icon' href='img/favicon.png'>
</head>

<body>
<div class='container-fluid'>
<div class='row-fluid'>
    <div class='lms_logo'>
        <img src='img/footer_logo.png'></div>
    </div>

    <?php if(!isset($_SESSION['username'])) { ?>
   
        <div class='row-fluid'>
            <div class='login'>
                <div class='alert' style='display:none;' id='error'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <h4 id='error_title'></h4>
                    <p id='errorTxt'></p>
                </div>
                <img src='img/login.png' alt='login logo' class='logo' longdesc='img/login.png'>
                <form class='form-horizontal' action=>
                    <div class='control-group'>
                        <label class='control-label' for='username'>Username</label>
                        <div class='controls'>
                            <input type='text' id='username' required name='username' placeholder='enter username' />
                        </div>
                    </div>
                    <div class='control-group'>
                        <label class='control-label' for='password'>Password</label>
                        <div class='controls'>
                            <input type='password' id='password' required name='password' placeholder='********' />
                        </div>
                    </div>
                    <div class='control-group'>
                        <div class='controls'>
                            <input type='button' name='login' value='login' class='btn' onClick="logIn();" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php }else{?>
    <header>
        <div class='navbar'>
            <div class='navbar-inner'>
                <a class='brand' href='#'>
                    <img src='img/logo.png' alt='' />
                </a>
                <div class='container'>
                    <a class='btn btn-navbar' data-toggle='collapse' data-target='.navbar-responsive-collapse'>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                    </a>
                    <div class='nav-collapse collapse navbar-responsive-collapse'>
                        <ul class='nav'>
                            <li id='home'><a href='#'  onClick="display('home.php');"><i class='icon-home'></i> Home</a>
                            </li>
                            <li class='dropdown'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='icon-star'></i> Patients<b class='caret'></b></a>
                                <ul class='dropdown-menu'>
                                    <li><a href='#' onClick="display('createpatient.php');"><i class='icon-plus'></i> create patient</a>
                                    </li>
                                    <li class=''><a href='#' onClick="display('class/viewpatient.class.php');"><i class='icon-list'></i> view patient</a>
                                    </li>
                                </ul>
                            </li>
                            <li class='dropdown'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='icon-lock'></i> Tests<b class='caret'></b></a>
                                <ul class='dropdown-menu'>
                                    <li><a href='#' onClick="display('createtest.php');"><i class='icon-plus'></i> create test</a>
                                    </li>
                                    <li class=''><a href='#' onClick="display('class/viewtest.class.php');"><i class='icon-list'></i> view Test</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href='#' onClick="display('settings.php');"><i class='icon-cog'></i>Settings</a>
                            </li>
                            <li class='dropdown adminOnly'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='icon-user'></i> User <b class='caret'></b></a>
                                <ul class='dropdown-menu'>
                                    <li><a href='#' onClick="display('createuser.php');"><i class='icon-plus'></i> create user</a>
                                    </li>
                                    <li><a href='#' onClick="display('class/viewuser.class.php');"><i class='icon-list'></i> view user</a>
                                    </li>
                                </ul>
                            </li>
                            <li class='adminOnly'><a href='#' onClick="display('class/viewmedics.class.php');"><i class='icon-list'></i> Medcis</a>
                            </li>
                            <li><a href='logout.php'><i class='icon-off'></i> Logout</a>
                            </li>
                        </ul>
                        <form class='input-append navbar-search  pull-right'>
                            <input placeholder='Search' id='search' type='text'>
                            <button class='btn' type='button' onKeyPress="charChk(event,'alphanum');" onClick="searchEngine();"><i class='icon-search'></i>
                            </button>
                        </form>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
        </div>
        <!-- /navbar-inner -->
    </header>
    <div class='alert' style='display:none;' id='error'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <h4 id='error_title'></h4>
        <p id='errorTxt'></p>
    </div>
    <div class="row-fluid" id='data' >&nbsp;</div>


    <?php } ?>
    <div class='footer'>&copy; <?php echo date( 'Y');?>  Reserved to <a href='http://www.azul.in'>AzulTech</a></div>
    <script src='js/jquery-2.0.3.js'></script>   
    <script src='js/bootstrap.min.js'></script>
    <script src='js/custom.js'></script>
    <script src='js/update.js'></script>       
   	<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>   
   	<script>
	$('.date-picker').datepicker();
   </script> 
</body>

</html>