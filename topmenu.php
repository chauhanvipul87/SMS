		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.php"> <img alt="Charisma Logo" src="img/logo20.png" /> <span>SMS</span></a>
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
				
                                      <?php 
                                      if(isset($_SESSION['userDisplayName'])){ ?>
                                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="icon-user"></i><span class="hidden-phone"> Welcome <?php echo $_SESSION['userDisplayName'];?></span>                       
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="javascript:void(0);" onclick="displayProfile()">Profile</a></li>
						<li class="divider"></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
                                       <?php }else{ ?>
                                        <a class="btn dropdown-toggle" href="#">
                                            <i class="icon-user"></i><span class="hidden-phone"> Welcome  Guest;</span>
                                          
                                        </a>
                                    <?php }?>
				</div>
				<!-- user dropdown ends -->
				
				<!-- user dropdown starts -->
				<!--<div class="btn-group pull-right" >
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> Register</span>
						<span class="caret"></span>
					</a>
				</div> -->
				<!-- user dropdown ends -->
				
				<!-- <div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="#">Visit Site</a></li>
						<li>
							<form class="navbar-search pull-left">
								<input placeholder="Search" class="search-query span2" name="query" type="text">
							</form>
						</li>
					</ul>
				</div>--><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
        <!-- loading start -->
		<div id="ajax_loader" style="text-align: center;">
				<img style="vertical-align: middle;" alt="loading..." src="img/loading2.gif" height="35"
					/> &nbsp; Processing...Please wait...
		</div>
		<!-- loading end -->
		<!-- loading error message start -->
			<div id="errorDiv" style="display: none;"></div>
                        
	<!-- loading error message end -->