<?php $this->assign('title','Trang chủ')?>
<style>
    .mb-15{
        margin-bottom: 15px !important;
    }
    .slider{
        background: url(../../img/default/slider-bg.jpg) no-repeat;
    }
    .top--right{
        position: absolute;
        top:0;
        right:0;
    }
    .top--left{
        position: absolute;
        top:0;
        left:0;
    }
    .red{
        background-color: red;
    }
</style>
<div class="slider movie-items">
	<div class="container">
		<div class="row">
			<div class="social-link">
				<p>Follow us: </p>
				<a href="#"><i class="ion-social-facebook"></i></a>
				<a href="#"><i class="ion-social-twitter"></i></a>
				<a href="#"><i class="ion-social-googleplus"></i></a>
				<a href="#"><i class="ion-social-youtube"></i></a>
			</div>
	    	<div  class="slick-multiItemSlider">
				<?php foreach($categoryMovie as $i => $cate):?>
                    <div class="movie-item">
                        <div class="mv-img">
                            <a href="#">
                                <?= $this->Html->image(!empty($cate->thumb)?$cate->thumb:'default/slider'.($i < 4 ? $i+1 : 1).'.jpg',[
                                    'style'=>'width:274px;height:420px',
                                    // 'width'=>285, 'height'=>437
                                ])?>
                            </a>
                        </div>
                        <div class="title-in">
                            <div class="cate">
                                <span class="blue"><a href="#"><?= $cate->movies_info->resolution?></a></span>
                            </div>
                            <h6 class="text-left"><a  href="<?php echo $this->Url->build(["_name"=>"movies_details","slug"=>$cate->m_slug,"id"=>$cate->id]);?>"><?= $cate->m_name?></a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
				<?php endforeach;?>
	    	</div>
	    </div>
	</div>
</div>
<div class="movie-items">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-8">
				<?php foreach($categories as $cate):?>
                    <div class="title-hd">
                        <h2><?= $cate->title?></h2>
                        <a href="<?php echo $this->Url->build(['_name'=>'category_details','slug'=>$cate->slug])?>" class="viewall">tất cả <i class="ion-ios-arrow-right"></i></a>
                    </div>

                    <div class="cate-movie mb-15">
                        <div class="row">
                            <div class="slick-multiItemSlider">
                                <?php foreach($categoryMovie as $index=>$cate_movie):?>
                                    <?php if($cate->id == $cate_movie->movies_info->category_id):?>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <?= $this->Html->image(!empty($cate_movie->thumb)?$cate_movie->thumb:'default/mv-item'.($index < 4? 1 : 7).'.jpg',[
                                                        'style'=>'width:162px; height:249px',
                                                        // 'width'=>185,'height'=>284
                                                    ])?>
                                                </div> 
                                                <div class="cate top--right">
                                                    <span class="blue"><a href="#"><?= $cate_movie->movies_info->resolution?></a></span>
                                                </div>
                                                <div class="cate top--left">
                                                    <span class="red"><a href="#"><?= $cate_movie->movies_info->subtitle?></a></span>
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="<?php echo $this->Url->build(["_name"=>"movies_details","slug"=>$cate_movie->m_slug,"id"=>$cate_movie->id]);?>"> Chi tiết <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#"><?php echo $cate_movie->m_name?></a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="ads">
                        <?= $this->Html->image("default/ads1.png",['width'=>336,'height'=>296])?>
					</div>
					<div class="celebrities">
						<h4 class="sb-title">Spotlight Celebrities</h4>
						<?php for($i = 0; $i < 4; $i++):?>
                            <div class="celeb-item">
                                <a href="#">
                                    <?= $this->Html->image('default/ava1.jpg',['width'=>70, 'height'=>70])?>
                                </a>
                                <div class="celeb-author">
                                    <h6><a href="#">Samuel N. Jack</a></h6>
                                    <span>Actor</span>
                                </div>
                            </div>
                        <?php endfor;?>
						<a href="#" class="btn">See all celebrities<i class="ion-ios-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>