<div class="col-md-9 col-lg-10 main mt-3">
   <div class="row mb-3">
      <div class="col-lg-12 col-md-12">
        <h2 class="sub-header mb-3">Quản lý người dùng</h2>
       <div>
        <div class="dropdown pull-left mb-2">
                <button class="btn btn-sm btn-outline-primary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Danh sách hiển thị
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a href="<?= $this->Url->build(array('_name'=>'admin_user_index'))?>" class="dropdown-item <?= count($users) == 10 ? 'active': ''?>">10</a>
                    <a href="?limit=25" class="dropdown-item <?= count($users) == 25 ? 'active': ''?>">25</a>
                    <a href="?limit=50" class="dropdown-item <?= count($users) == 50 ? 'active': ''?>">50</a>
                    <a href="?limit=100" class="dropdown-item <?= count($users) == 100 ? 'active': ''?>">100</a>
                </div>
            </div>
            <div class="pull-right mb-2">
                <a href="<?= $this->Url->build(array('_name'=>'admin_user_add'))?>" class="btn btn-sm btn-outline-primary w-10 btn-add"><i class="fa-solid fa-user-plus"></i></a>
                <a class="btn btn-sm btn-outline-primary w-10 btn-down"><i class="fa-solid fa-download"></i></a>
            </div>
       </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Quyền</th>
                        <th>Active</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user):?>
                    <tr>
                        <td><?=$user->id?></td>
                        <td><?=$user->name?></td>
                        <td><?=$user->email?></td>
                        <td><?=$user->role?></td>
                        <td><?=$user->active?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <ul class="pagination">
            <?php
                echo $this->Paginator->first();
                if($this->Paginator->hasPrev()){
                    echo $this->Paginator->prev();
                }
                echo $this->Paginator->numbers();
                if(!empty($this->Paginator->next())){
                    echo $this->Paginator->next();
                }
                echo $this->Paginator->last();
                ?>
        </ul>
      </div>
   </div>
</div>