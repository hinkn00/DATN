<?php $this->assign('title', 'Hồ sơ cá nhân'); ?>
<style>
	.avatar{
		height:125px; 
		width:125px; 
		border-radius:50%
	}
</style>
<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Thông tin: <?= $member_info['name'] ?? ''?></h1>
					<?php 
						$this->Breadcrumbs->add([
							[
								'title' => 'Trang chủ', 
								'url' => ['controller' => 'Pages', 'action' => 'home'], 
								'options' => [
									'class' => 'active'
								]
							],
							[
								'title'=> $member_info['name'] ?? '',
								'options' => [
									'innerAttrs' => [
										'class' => "ion-ios-arrow-right"
									]
								]

							]
						]);
						echo $this->Breadcrumbs->render();
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="user-information">
					<div class="user-img">
					<!-- Để tạm sau xóa điều kiện -->
					<a href="#"><?= $this->Html->image('upload/users/'.($member_info['img_avatar'] ?? 'default.jpg'),['class'=>'avatar'])?><br></a>
						<a href="#" class="redbtn">Change avatar</a>
					</div>
					<div class="user-fav">
						<p>Account Details</p>
						<ul>
							<li  class="active"><a href="userprofile.html">Profile</a></li>
							<li><a href="userfavoritelist.html">Favorite movies</a></li>
							<li><a href="userrate.html">Rated movies</a></li>
						</ul>
					</div>
					<div class="user-fav">
						<p>Others</p>
						<ul>
							<li><a href="#">Thay đổi mật khẩu</a></li>
							<li><a href="<?= $this->Url->build(['_name'=>'users_logout'])?>">Đăng xuất</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="#">
					<?=$this->Form->create(null,[
						'class'=>'user',
						'action' => '/users/profile/'.($member_info['id']??1)
					])?>
						<h4>01. Thông tin cá nhân</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<?= $this->Form->control('name',[
									'label'=>'Tên người dùng', 
									'placeholder'=> $member_info['name'] ?? ''
									])
								?>
							</div>
							<div class="col-md-6 form-it">
								<?= $this->Form->control('email',[
									'label'=>'Địa chỉ Email', 
									'placeholder'=> $member_info['email'] ?? ''
									])
								?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<?= $this->Form->control('number_phone',[
									'label'=>'Số điện thoại', 
									'placeholder'=> '0123456789'
									])
								?>
							</div>
							<div class="col-md-6 form-it">
								<?= $this->Form->control('role',[
									'label'=>'Thành viên', 
									'placeholder'=> $member_info['role'] ?? '',
									'disabled' => true,
									'style' => 'background-color:#233A50; color: #abb7c4'
									])
								?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<?= $this->Form->control('country',[
									'label'=>'Đất nước', 
									'id'=>'country',
									'options'=> [],
									])
								?>
							</div>
							<div class="col-md-6 form-it">
								<?= $this->Form->control('city',[
									'label'=>'Thành phố', 
									'id' => 'city',
									'options'=> [],
									])
								?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<?= $this->Form->input('update_submit', ['value'=>'Cập nhật','type'=>'submit','class'=>'submit'])?>
							</div>
						</div>	
					<?= $this->Form->end()?>
					<?=$this->Form->create(null,[
						'class'=>'password',
						'action' => '/users/change-password/'.($member_info['id']??1)
					])?>
						<h4>02. Thay đổi mật khẩu</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<?= $this->Form->control('old_password',[
									'label'=>'Mật khẩu cũ',
									'type' =>'password',
									'placeholder'=> '**********'
									])
								?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<?= $this->Form->control('new_password',[
									'label'=>'Mật khẩu mới',
									'type' =>'password',
									'placeholder'=> "***************"
									])
								?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<?= $this->Form->control('cf_password',[
									'label'=>'Nhập lại mật khẩu mới',
									'type' =>'password',
									'placeholder'=> "***************"
									])
								?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<?= $this->Form->input('update_submit', ['value'=>'Thay đổi','type'=>'submit','class'=>'submit'])?>
							</div>
						</div>	
					<?= $this->Form->end()?>
				</div>
			</div>
		</div>
	</div>
</div>