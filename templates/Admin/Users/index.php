<h3>Quản lý người dùng</h3>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </thead>
        <tbody>
            <?php foreach($users as $user):?>
                <tr>
                    <td><?= $user->id?></td>
                    <td><?= $user->name?></td>
                    <td><?= $user->email?></td>
                    <td><?= $user->role?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php
        $paginator = $this->Paginator->setTemplates([
            'number' => '<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</li>',
            'current' => '<li class="page-item active"><a href="{{url}}" class="page-link">{{text}}</li>',
            'first' => '<li class="page-item"><a class="page-link" href="{{url}}">&laquo;</a></li>',
            'last' => '<li class="page-item"><a class="page-link" href="{{url}}">&raquo;</a></li>',
            'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">&lt;</a></li>',
            'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">&gt;</a></li>',
            'nextDisabled' => '<li class="page-item"></li>'
        ]);
    ?>
    <ul class="pagination" style="width:100%; display:flex; justify-content: flex-end;">
        <?php
            echo $paginator->first();
            if($paginator->hasPrev()){
                echo $paginator->prev();
            }
            echo $paginator->numbers();
            if(!empty($paginator->next())){
                echo $paginator->next();
            }
            echo $paginator->last();
            ?>
    </ul>
</div>
