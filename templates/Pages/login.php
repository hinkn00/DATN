<?= $this->Form->create()?>
<h1>Đăng nhập</h1>
<?php
    echo $this->Form->control('email',[
        'label' => 'Email',
    ]);
    echo $this->Form->control('password',[
        'label' => 'Mật khẩu',
        'type' => 'password',
    ]);
    echo $this->Form->button('Đăng nhập');
?>
<?= $this->Form->end();?>