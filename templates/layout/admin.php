<?= $this->element('admin/head')?>
<body>
    <?php echo $this->element('admin/navbar'); ?>
    <nav class="navbar navbar-expand-lg" style="background-color: #2e2c2c;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <span class="navbar-text ml-auto">
                Đăng xuất
            </span>
        </div>
    </nav>
    <div class="content">
        <?php echo $this->fetch('content'); ?>
    </div>
    <?= $this->element('admin/footer')?>
</body>