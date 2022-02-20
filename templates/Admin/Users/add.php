<div class="col-md-9 col-lg-10 main mt-3">
    <div class="row mb-3">
        <div class="col-md-6 col-lg-6">
            <h2 class="sub-header">Thêm người dùng</h2>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="pull-right">
            <?= $this->Form->button('Thêm',['class'=>'btn btn-md btn-outline-success', 'style'=>'cursor: pointer','form'=>'frmAdd'])?>
            <?= $this->Html->link('Hủy bỏ',array('_name'=>'admin_user_index'),array('class'=>'btn btn-md btn-outline-primary'))?>
            </div>
        </div>
        <hr class="w-95">
        <?= $this->Form->create($user,['id'=>'frmAdd'])?>
            <div class="row ml-3 mr-3">
                <div class="form-group col-md-6">
                    <label for="name">Tên khách hàng</label>
                    <input type="text" name="name" id="name" class="form-control" autofocus>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="role">Phân quyền</label>
                        <select name="role" id="role" class="form-control form-select" aria-label="Chọn quyền">
                            <option>-------------- Phân quyền cho người dùng --------------</option>
                            <option value="admin">Admin</option>
                            <option value="member">Member</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group files">
                        <label class="my-auto">Chọn avatar </label> <input id="file" type="file" class="form-control" />
                    </div>
                </div>
                <div class="box-pre-img hidden ml-3"></div>
            </div>
        <?= $this->Form->end()?>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(".files").attr('data-before',"Kéo thả ảnh tại đây hoặc chọn ảnh bỏ vào");
        $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $(".files").attr('data-before',fileName);

        });
        $('#file').change(function(){
            var fileImg = $('input#file').val();
            if(fileImg != ''){
                $display = `
                    <div class="form-group">
                        <p><strong>Ảnh xem trước</strong></p>
                        <img src="${URL.createObjectURL(event.target.files[0])}" style="border-radius: 50%; border: 1px solid #ddd; height: 150px; margin-bottom:5px; margin-right:5px"/>
                    </div>
                `;
                $('.box-pre-img').removeClass('hidden');
                $('.box-pre-img').addClass('form-group');
                $('.box-pre-img').append($display)
            }
        })
    });
</script>