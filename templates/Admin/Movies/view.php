<?php $this->assign("title","Quản lý phim") ?>
<div class="col-md-9 col-lg-10 main mt-3">
   <div class="row mb-3">
      <div class="col-lg-12 col-md-12">
        <strong>Tìm kiếm từ khóa:</strong><h2 class="sub-header mb-3" style="display:flex; color:red"><?= $this->request->getQuery('query')?></h2>
        <div class="box-tools" style=" width:100%; display:flex; justify-content: center">
            <form action="<?php echo $this->Url->build(['_name'=>'admin_movies_search'])?>" method="get">
                <div class="input-search input-group" style="width: 50vw;">
                    <input type="text" name="query" class="form-control pull-right" id="query" value="<?php echo $this->request->getQuery('query')?>">
                    <div class="button-search input-group-btn">
                        <button type="submit" class="btn btn-primary search-icon" style="
                            border-top-right-radius: 7px 7px;
                            border-bottom-right-radius: 7px 7px;
                        "><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
       <div>
        <div class="dropdown pull-left mb-2">
            <?= $this->Html->link('Trở về',array('_name'=>'admin_movies_home'),array('class'=>'btn btn-md btn-warning'))?>
            </div>
            <div class="pull-right mb-2">
                <a href="<?= $this->Url->build(array('_name'=>'admin_movies_add'))?>" class="btn btn-sm btn-outline-primary w-10 btn-add"><i class="fa-solid fa-plus"></i></a>
                <a class="btn btn-sm btn-outline-primary w-10 btn-down"><i class="fa-solid fa-download"></i></a>
            </div>
       </div>
        <div class="table-responsive" id="movie_respon">
            <table class="table table-striped table-bordered" id="movie_table">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Thumbnail</th>
                        <th>Tên phim</th>
                        <th>Tên không dấu</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th>Danh mục</th>
                        <th>Thể loại</th>
                        <th>Quốc gia</th>
                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th>Khác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($movies as $movie):?>
                        <tr>
                            <td><?= $movie->id ?></td>
                            <td></td>
                            <td>
                                <?= $this->Html->link(__($movie->m_name),["_name"=>'admin_movies_edit','slug' => $movie->m_slug])?>
                            </td>
                            <td>
                                <?= $movie->m_slug?>
                            </td>
                            <td>
                                <div id="desc_respon">
                                    <?php echo html_entity_decode($movie->m_desc) ?>
                                </div>
                            </td>
                            <td><?php echo h($movie->movies_info->m_status) == 0 ? "Ẩn" : "Hiện"; ?></td>
                            <td><?php echo h($movie->category_title) ?></td>
                            <td><?php echo h($movie->genre_title) ?></td>
                            <td><?php echo h($movie->country_title) ?></td>
                            <td><?= $movie->created->format('Y-m-d')?></td>
                            <td><?= $movie->modified->format('Y-m-d')?></td>
                            <td class="td-center">
                                <?= $this->Html->link(__('Sửa'),["_name"=>'admin_movies_edit','slug' => $movie->m_slug],['class'=>"btn btn-warning","id"=>"edit-btn"])?>
                                <?= $this->Form->postLink(__('Xóa'),
                                    ['_name'=>'admin_movies_delete', 'id'=>$movie->id],
                                    [
                                        'confirm'=>__('Bạn có chắc muốn xóa danh mục "{0}" không?',$movie->m_name),
                                        'class' => 'btn btn-danger',
                                    ]
                                    )?>
                            </td>
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

<?php $flash = $this->Flash->render();
    if($flash):
?>
    <script>
        $(document).ready(function(){
            Swal.fire({
                icon: `success`,
                title: `Xóa thành công`,
                timer: 5000
            })
        })
    </script>
<?php endif;?>  
<?php if(isset($error)):?>
    <script>
        $(document).ready(function(){
            Swal.fire({
                icon: `error`,
                title: `Vui lòng thử lại. Xóa không thành công!`,
                timer: 5000
            })
        })
    </script>
<?php endif;?> 
<?php echo $this->Html->script(['admin/country','sweetalert2'])?>
