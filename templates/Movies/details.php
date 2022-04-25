<?php $this->assign('title','Xem Phim '.($movie->m_name))?>
<style>
   div.mv-item-infor p:nth-child(3),
   .text-ellsip{
      display: -webkit-box;
      max-width: 450px;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
   }
</style>
<div class="hero mv-single-hero">
   <div class="container">
   </div>
</div>
<div class="page-single movie-single movie_single">
   <div class="container">
      <div class="row ipad-width2">
         <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="movie-img sticky-sb">
               <?php echo $this->Html->image(!empty($movie->thumb)? $url_s3."uploads/thumbs/".$movie->thumb:"default/movie-single.jpg",['style'=>'width:330px; height:506px'])?>
               <div class="movie-btn">
                  <div class="btn-transform transform-vertical red">
                     <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Xem phim</a></div>
                     <div><a href="<?= $this->Url->build(['_name'=>'watch_movie','slug'=>$movie->m_slug,"episode"=>1])?>" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
                  </div>
                  <div class="btn-transform transform-vertical">
                     <div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i> Mua phim</a></div>
                     <div><a href="#" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="movie-single-ct main-content">
               <h1 class="bd-hd"><?php echo $movie->m_name?> <span><?= @h($movie->movies_info->year)?></span></h1>
               <div class="social-btn">
                  <a href="#" class="parent-btn"><i class="ion-heart"></i> Phim yêu thích</a>
                  <div class="hover-bnt">
                     <a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>Chia sẻ</a>
                     <div class="hvr-item">
                        <a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
                        <a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
                        <a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
                        <a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a>
                     </div>
                  </div>
               </div>
               <div class="movie-rate">
                  <div class="rate">
                     <i class="ion-android-star"></i>
                     <p><span>8.1</span> /10<br>
                        <span class="rv">56 Reviews</span>
                     </p>
                  </div>
                  <div class="rate-star">
                     <p>Rate This Movie:  </p>
                     <i class="ion-ios-star"></i>
                     <i class="ion-ios-star"></i>
                     <i class="ion-ios-star"></i>
                     <i class="ion-ios-star"></i>
                     <i class="ion-ios-star"></i>
                     <i class="ion-ios-star"></i>
                     <i class="ion-ios-star"></i>
                     <i class="ion-ios-star"></i>
                     <i class="ion-ios-star-outline"></i>
                  </div>
               </div>
               <div class="movie-tabs">
                  <div class="tabs">
                     <ul class="tab-links tabs-mv">
                        <li class="active"><a href="#overview">Nội dung</a></li>
                        <li><a href="#reviews"> Bình luận</a></li>
                        <li><a href="#cast">  Thông tin thêm </a></li>
                        <li><a href="#moviesrelated"> Phim liên quan</a></li>
                     </ul>
                     <div class="tab-content">
                        <div id="overview" class="tab active">
                           <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                 <?php echo $movie->m_desc?>
                              </div>

                           </div>
                        </div>
                        <div id="reviews" class="tab review">
                           <div class="row">
                              <div class="rv-hd" style="margin-right: 15px;">
                                 <div class="div">
                                    <h3>Đánh giá phim</h3>
                                    <h2><?php echo $movie->m_name?></h2>
                                 </div>
                                 <!-- <a href="#" class="redbtn">Viết bình luận</a> -->
                              </div>
                                <?php foreach($comments as $i=>$comment):?>
                                    <div class="mv-user-review-item <?php echo $i == 4? 'last' : ''?>">
                                       <div class="user-infor">
                                          <?php echo $this->Html->image('default/user-img.png')?>
                                          <div>
                                             <h3>Đánh giá mới nhất</h3>
                                             <div class="no-star">
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star last"></i>
                                                <i class="ion-android-star last"></i>
                                             </div>
                                             <p class="time">
                                                <?= $comment->created->format('d/m/Y')?> bởi <a href="#"> johnnylee</a>
                                             </p>
                                          </div>
                                       </div>
                                        <p><?php echo $comment->content?></p>
                                    </div>
                                <?php endforeach;?>
                              <div class="topbar-filter">
                                 <label>Reviews per page:</label>
                                 <select>
                                    <option value="range">5 Reviews</option>
                                    <option value="saab">10 Reviews</option>
                                 </select>
                                 <div class="pagination2">
                                    <span>Page 1 of 6:</span>
                                    <a class="active" href="#">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">4</a>
                                    <a href="#">5</a>
                                    <a href="#">6</a>
                                    <a href="#"><i class="ion-arrow-right-b"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="cast" class="tab">
                           <div class="row">
                              <div class="col-md-12 col-xs-12 col-sm-12">
                                 <div class="sb-it">
                                    <h6>Nhà sản xuất: </h6>
                                    <p><a href="#">Joss Whedon</a></p>
                                 </div>
                                 <div class="sb-it">
                                    <h6>Biên kịch: </h6>
                                    <p><a href="#">Joss Whedon,</a> <a href="#">Stan Lee</a></p>
                                 </div>
                                 <div class="sb-it">
                                    <h6>Các ngôi sao: </h6>
                                    <p><a href="#">Robert Downey Jr,</a> <a href="#">Chris Evans,</a> <a href="#">Mark Ruffalo,</a><a href="#"> Scarlett Johansson</a></p>
                                 </div>
                                 <div class="sb-it">
                                    <h6>Thể loại:</h6>
                                    <p><a href="#">
                                       <?php 
                                          foreach($genres as $genre){
                                             if($genre->id == $movie->movies_info->genre_id){
                                                echo h($genre->title);
                                             }
                                          }
                                       ?>
                                    </a></p>
                                 </div>
                                 <div class="sb-it">
                                    <h6>Năm sản xuất:</h6>
                                    <p><?= @h($movie->movies_info->year)?></p>
                                 </div>
                                 <div class="sb-it">
                                    <h6>Thời lượng:</h6>
                                    <p><?= isset($movie->movies_info->session) ? @h($movie->movies_info->session. __(' phút')): '----'?></p>
                                 </div>
                                 <div class="sb-it">
                                    <h6>Tags:</h6>
                                    <p class="tags">
                                       <?php if(@h($movie->movies_info->tags)):?>
                                          <?php $hash_tag = array(); $hash_tag = explode(', ',@h($movie->movies_info->tags));?>
                                          <?php foreach($hash_tag as $key=>$tag):?>
                                             <span class="time"><a href="https://www.google.com/"><?= @h($tag)?></a></span>
                                          <?php endforeach;?>
                                       <?php else:?>
                                          ----
                                       <?php endif;?>
                                    </p>
                                 </div>
                                 <div class="ads">
                                    <img src="images/uploads/ads1.png" alt="">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="moviesrelated" class="tab">
                           <div class="row">
                              <h3>Đề xuất</h3>
                              <h2>Có thể bạn quan tâm</h2>
                              <?php foreach($movies as $movie_related):?>
                                 <?php if($movie_related->id != $movie->id):?>
                                    <div class="movie-item-style-2">
                                       <?php echo $this->Html->image(!empty($movie_related->thumb)?$url_s3."uploads/thumbs/".$movie_related->thumb:'default/mv-item1.jpg',['style'=>'width:185px; height:284px']);?>
                                       <div class="mv-item-infor">
                                          <h6><a href="<?php echo $this->Url->build(["_name"=>"movies_details","slug"=>$movie_related->m_slug,"id"=>$movie_related->id]);?>"><?= $movie_related->m_name?></a></h6>
                                          <p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
                                          <!-- <p class="describe"></p> -->
                                          <?= html_entity_decode($movie_related->m_desc)?>
                                          <p class="run-time"> Thời lượng: <?= isset($movie_related->movies_info->session) ? @h($movie_related->movies_info->session. __(' phút')): ''?>    .     <span>Chất lượng: <?= isset($movie_related->movies_info->resolution)?@h($movie_related->movies_info->resolution):''?> </span>    .     <span>Năm sản xuất: <?= isset($movie_related->movies_info->year)? @h($movie_related->movies_info->year):''?></span></p>
                                          <p>Đạo diễn: <a href="#">Joss Whedon</a></p>
                                          <p>Diễn viên: <a href="#">Robert Downey Jr.,</a> <a href="#">Chris Evans,</a> <a href="#">  Chris Hemsworth</a></p>
                                       </div>
                                    </div>
                                 <?php endif;?>
                              <?php endforeach;?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>