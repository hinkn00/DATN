<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Đăng nhập</h3>
        <?=$this->Form->create(null, ['id'=>'formLogin', 'onsubmit'=>'return false'])?>
        	<div class="row">
        		 <label for="email">
                    Email:
                    <?= $this->Form->input('email', array(
                        'type' => 'text',
                        'placeholder' => 'Nhập địa chỉ email',
                        'id' => 'email',
                    ))?>
                </label>
        	</div>
           
            <div class="row">
            	<label for="password">
                    Password:
                    <?= $this->Form->input('password', array(
                        'type'=>'password',
                        'id'=>'password',
                        'placeholder' => '**********',
                    ))?>
                </label>
            </div>
            <div class="row">
            	<div class="remember">
					<div>
						<input type="checkbox" name="remember" value="Remember me"><span>Remember me</span>
					</div>
            		<a href="#">Forget password ?</a>
            	</div>
            </div>
           <div class="row">
           	 <button type="submit">Login</button>
           </div>
        <?= $this->Form->end()?>
        <div class="row">
        	<p>Đăng nhập bằng tài khoản khác</p>
            <div class="social-btn-2">
            	<a class="fb" href="#"><i class="ion-social-facebook"></i>Facebook</a>
            	<a class="tw" href="#"><i class="ion-social-twitter"></i>twitter</a>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('client/user')?>