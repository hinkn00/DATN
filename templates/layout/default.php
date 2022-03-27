<?= $this->element('client/head')?>
<body>
<!--preloading-->

<!--end of preloading-->
<?= $this->element('login')?>
<?= $this->element('register')?>

<?= $this->element('client/header')?>

<?= $this->fetch('content')?>
<?= $this->element('client/footer')?>
</body>
</html>