<?php
$tab = $this->request->getParam('controller');
?>
<div class="col-md-3 slidebar">
    <ul class="list-group">
        <li class="list-group-item">
            <div class="media">
                <a class="pull-left">
                    <img src="" alt="Ảnh đại diện" class="media-object">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Admin</h4>
                    <!-- if else -->
                    <span class="label label-primary">Quản trị viên</span>
                </div>
            </div>
        </li>
        <a href="<?php echo $this->Url->build(array('_name'=>'admin_dashboard'))?>" class="list-group-item <?php echo $tab == 'Dashboard' ? 'active' : ''; ?>">
            <i class="fa-solid fa-gauge-high" id="dashboard"></i> Bảng điều khiển
        </a>

        <a href="#" class="list-group-item <?php echo $tab == 'Categories' ? 'active' : ''; ?> ">
            <i class="fa-solid fa-tags"></i> Danh mục phim
        </a>

        <a href="#" class="list-group-item <?php echo $tab == 'Genres' ? 'active' : ''; ?> ">
            <i class="fa-solid fa-tag"></i> Thể loại phim
        </a>

        <a href="#" class="list-group-item <?php echo $tab == 'Countries' ? 'active' : ''; ?> ">
            <i class="fa-solid fa-earth-asia"></i> Quốc gia
        </a>

        <a href="#" class="list-group-item <?php echo $tab == 'Movies' ? 'active' : ''; ?>">
            <i class="fa-solid fa-clapperboard"></i> Phim
        </a>

        <a href="#" class="list-group-item <?php echo $tab == 'Episodes' ? 'active' : ''; ?> ">
            <i class="fa-solid fa-video"></i> Tập phim
        </a>

        <a href="<?php echo $this->Url->build(['_name'=>'admin_user_index'])?>" class="list-group-item <?php echo $tab == 'Users' ? 'active' : ''; ?>">
            <i class="fa-solid fa-user"></i> Quản lý người dùng
        </a>
        
        <a href="#" class="list-group-item <?php echo $tab == 'Configes' ? 'active' : ''; ?> ">
            <i class="fa-solid fa-gear"></i> Cài đặt chung
        </a>
    </ul>
</div>