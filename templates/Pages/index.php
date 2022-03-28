<?php $this->assign('title','Trang chủ')?>
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
				<?php for($i = 1; $i <= 8; $i++):?>
	    		<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="#">
                            <?= $this->Html->image('default/slider'.($i <= 4 ? $i : 1).'.jpg',['width'=>285, 'height'=>437])?>
                        </a>
	    			</div>
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="blue"><a href="#">Sci-fi</a></span>
	    				</div>
	    				<h6><a href="#">Interstellar</a></h6>
	    				<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
	    			</div>
	    		</div>
				<?php endfor;?>
	    	</div>
	    </div>
	</div>
</div>
<div class="movie-items">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-8">
				<div class="title-hd">
					<h2>Đề cử cho bạn</h2>
				</div>
				<div class="tabs">
					<ul class="tab-links">
						<li class="active"><a href="#tab1">#Phổ biến</a></li>
						<li><a href="#tab2"> #Mới nhất</a></li>
						<li><a href="#tab3">  #Đánh giá tốt  </a></li>
						<li><a href="#tab4"> #Xem nhiều</a></li>                        
					</ul>
				    <div class="tab-content">
				        <div id="tab1" class="tab active">
				            <div class="row">
				            	<div class="slick-multiItem">
				            		<?php for($i = 0; $i < 8; $i++):?>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <?= $this->Html->image('default/mv-item7.jpg',['width'=>185,'height'=>284])?>
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"> Chi tiết <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor;?>
				            	</div>
				            </div>
				        </div>
				        <div id="tab2" class="tab">
				           <div class="row">
				            	<div class="slick-multiItem">
                                    <?php for($i = 0; $i < 8; $i++):?>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <?= $this->Html->image('default/mv-item1.jpg',['width'=>185,'height'=>284])?>
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"> Chi tiết <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor;?>
				            	</div>
				            </div>
				        </div>
				        <div id="tab3" class="tab">
				        	<div class="row">
                                <div class="slick-multiItem">
                                    <?php for($i = 0; $i < 8; $i++):?>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <?= $this->Html->image('default/mv-item7.jpg',['width'=>185,'height'=>284])?>
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"> Chi tiết <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor;?>
				            	</div>
				            </div>
			       	 	</div>
			       	 	<div id="tab4" class="tab">
				        	<div class="row">
                                <div class="slick-multiItem">
                                    <?php for($i = 0; $i < 8; $i++):?>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <?= $this->Html->image('default/mv-item1.jpg',['width'=>185,'height'=>284])?>
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"> Chi tiết <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">Interstellar</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor;?>
				            	</div>
				            </div>
			       	 	</div>
				    </div>
				</div>
				<div class="title-hd">
					<h2>Theo danh mục</h2>
					<a href="#" class="viewall">tất cả <i class="ion-ios-arrow-right"></i></a>
				</div>
				<div class="tabs">
					<ul class="tab-links-2" id="tab-links-cate">
						<?php foreach($categories as $index => $cate):?>                      
                            <?php if($index < 4):?>
                                <li class="<?= $index+1 == 2 ? 'active' : ''?>">
                                    <input type="hidden" class="cate_id" value="<?= $cate->id?>">
                                    <a href="#tab2<?= $index+1?>">#<?= $cate->title?></a>
                                </li> 
                            <?php endif;?>
                        <?php endforeach;?>
					</ul>
				    <div class="tab-content" id="tab-content-cate">
				        <div id="tab21" class="tab">
				            <div class="row">
                                <div class="slick-multiItem category">
                                    <!-- <?php //for($i = 0; $i < 9; $i++):?>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                <? //echo $this->Html->image('default/mv-item7.jpg',['width'=>185,'height'=>284])?>
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"> Chi tiết <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">hihi</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php //endfor;?> -->
				            	</div>
				            </div>
				        </div>
				        <div id="tab22" class="tab active">
				           <div class="row">
                                <div class="slick-multiItem category" id="ItemContent">
                                    <!-- <?php //for($i = 0; $i < 9; $i++):?>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <?php //echo $this->Html->image('default/mv-item1.jpg',['width'=>185,'height'=>284])?>
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"> Chi tiết <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">hihi</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php //endfor;?> -->
				            	</div>
				            </div>
				        </div>
				        <div id="tab23" class="tab">
				        	<div class="row">
                                <div class="slick-multiItem category">
                                    <!-- <?php //for($i = 0; $i < 9; $i++):?>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                <?php //echo $this->Html->image('default/mv-item7.jpg',['width'=>185,'height'=>284])?>
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"> Chi tiết <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">hihi</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php //endfor;?> -->
				            	</div>
				            </div>
			       	 	</div>
			       	 	 <div id="tab24" class="tab">
				        	<div class="row">
                                <div class="slick-multiItem category">
                                    <!-- <?php //for($i = 0; $i < 9; $i++):?>
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                <?php //echo $this->Html->image('default/mv-item7.jpg',['width'=>185,'height'=>284])?>
                                                </div> 
                                                <div class="hvr-inner">
                                                    <a  href="moviesingle.html"> Chi tiết <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="#">hihi</a></h6>
                                                    <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php //endfor;?> -->
				            	</div>
				            </div>
			       	 	</div>
				    </div>
				</div>
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

<script>
	this.ajax = '';
	var getValue= '';

	function categoryTitle(){
		if($('#tab-links-cate li').hasClass('active')){
			getValue = $('#tab-links-cate').children('li.active').find('a').text();
			getValue = getValue.substr(1);
		}

		return getValue;
	}
</script>

<script>
	$(document).ready(function(){
		let category = categoryTitle();
		this.ajax = ajaxMovieByCategory(category);
		this.ajax.done(function(data){
			doneFunc(data)
		})
	})

	$('#tab-links-cate').click(function(){
        $('.slick-multiItem.category').empty();
		let category = categoryTitle();
		this.ajax = ajaxMovieByCategory(category);
		this.ajax.done(function(data){
			doneFunc(data)
		})
	})

	var ajaxMovieByCategory = function(category){
        let idCate = '';
        if($('#tab-links-cate li').hasClass('active')){
			idCate = $('#tab-links-cate').children('li.active').find('input[type=hidden].cate_id').attr('value');
		}
        
		return $.ajax({
			url: "<?php echo $this->Url->build(['_name'=>'getMoviesByCategory'])?>",
			type: 'GET',
			data: {
				idCate: idCate,  
				categoryTitle: getValue
			},
		});
	}	

	var doneFunc = function(data){
		$('#ItemContent').append(data);
        let list_movies = data.movies['Category'];
		let category = categoryTitle();
        var html = '';
        $.each(list_movies, function(index, movie_list){
            if(list_movies['notification']){
                $('.slick-multiItem.category').append(`<p>${list_movies['notification']}</p>`)
            }
            html = `
                <div class="slide-it">
                    <div class="movie-item">
                        <div class="mv-img">
                            <img src="img/default/mv-item7.jpg" width="185" height="284"/>"
                        </div> 
                        <div class="hvr-inner">
                            <a  href="moviesingle.html"> Chi tiết <i class="ion-android-arrow-dropright"></i> </a>
                        </div>
                        <div class="title-in">
                            <h6><a href="#">hihi</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
                </div>
            `;
            if(category == movie_list['title']){
                $('.slick-multiItem.category').append(html)
            }
        })
	}
</script>