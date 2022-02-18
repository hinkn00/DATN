<?= $this->element('admin/head')?>
<body>
    <?php 
        echo $this->element('admin/navbar');
        echo $this->fetch('content');
    ?>
    <?= $this->element('admin/footer')?>
</body>