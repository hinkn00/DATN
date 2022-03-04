<?= $this->element('client/head')?>
<body>
<!--preloading-->
<div id="preloader">
    <?= $this->Html->image('default/logo1.png',['class'=>'logo','width'=>119,'height'=>'58'])?>>
    <div id="status">
        <span>1</span>
        <span>2</span>
    </div>
</div>
<!--end of preloading-->
<?= $this->element('login')?>
<?= $this->element('register')?>

<?= $this->element('client/header')?>

<?= $this->fetch('content')?>
<?= $this->element('client/footer')?>
</body>
</html>