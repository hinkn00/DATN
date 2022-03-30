
<header class="ht-header">
	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
				    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
					    <div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
				    </div>
				    <a href="#"><?= $this->Html->image('default/logo1.png',['class'=>'logo','width'=>119,'height'=>'58'])?></a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown">
							Thể loại <i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">
								<?php foreach($genres as $genre):?>
									<li><a href="#"><?= $genre->title?></a></li>
								<?php endforeach;?>
							</ul>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown">
							Quốc gia <i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">
								<?php foreach($countries as $country):?>
									<li><a href="#"><?= $country->country_name?></a></li>
								<?php endforeach;?>
							</ul>
						</li>
						<?php foreach($categories as $category):?>
							<li><a href="#"><?= $category->title ?></a></li>
						<?php endforeach;?>
					</ul>
					<ul class="nav navbar-nav flex-child-menu menu-right">              
						<?php
						if(!empty($member_info)):?>
							<li><a href="<?= $this->Url->build(['_name'=>'member_profile','id'=> $member_info['id']])?>">Thông tin</a></li>
							<li class="logoutLink"><a href="<?= $this->Url->build(['_name'=>'users_logout'])?>">đăng xuất</a></li>
						<?php else:?>
							<li class="loginLink"><a href="#">đăng nhập</a></li>
							<li class="btn signupLink"><a href="#">đăng ký</a></li>
						<?php endif; ?>
					</ul>
				</div>
			<!-- /.navbar-collapse -->
	    </nav>
	    
	    <!-- top search form -->
	    <div class="top-search">
	    	<select>
				<option value="united">TV show</option>
				<option value="saab">Others</option>
			</select>
			<input type="text" placeholder="Search for a movie, TV Show or celebrity that you are looking for">
	    </div>
	</div>
</header>