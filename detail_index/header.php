        <!-- Header-->
        <header id="header" class="header">  
            <div class="top-left">
                <div class="navbar-header"> 
                    <a class="navbar-brand" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="template/images/logo2.png" alt="Logo"></a> 
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a> 
                </div> 
            </div>
            <div class="top-right"> 
                <div class="header-menu"> 

                    <div class="user-area dropdown float-right">
                        <a href=""><i class=" fa fa-user-circle">&nbsp;<?php echo $_SESSION["username"]; ?>&nbsp;&nbsp;</i></a>
                        <a href="logout.php" onclick="return confirm('Ingin Keluar ?');" class="btn btn-danger mb-1"><i class="fa fa-power-off">&nbsp;Logout</i></a>
                    </div> 
                </div>  
            </div>
        </header><!-- /header -->
        <!-- Header-->