<?php $this->assign('title','Xem Phim '.($movie->m_name))?>
<div class="hero mv-single-hero">
   <div class="container">
   </div>
</div>
<div class="page-single movie-single movie_single">
   <div class="container">
      <div class="row ipad-width2">
         <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="movie-img sticky-sb">
               <?php echo $this->Html->image("default/movie-single.jpg")?>
               <div class="movie-btn">
                  <div class="btn-transform transform-vertical red">
                     <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Xem phim</a></div>
                     <div><a href="https://www.youtube.com/embed/o-0hcF97wy0" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
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
               <h1 class="bd-hd"><?php echo $movie->m_name?> <span>2015</span></h1>
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
                                 <p><?php echo $movie->m_desc?></p>
                              </div>

                           </div>
                        </div>
                        <div id="reviews" class="tab review">
                           <div class="row">
                              <div class="rv-hd" style="margin-right: 15px;">
                                 <div class="div">
                                    <h3>Related Movies To</h3>
                                    <h2>Skyfall: Quantum of Spectre</h2>
                                 </div>
                                 <a href="#" class="redbtn">Write Review</a>
                              </div>
                                <?php for($i =0; $i<5; $i++):?>
                                    <div class="mv-user-review-item <?php echo $i == 4? 'last' : ''?>">
                                 <div class="user-infor">
                                    <?php echo $this->Html->image('default/user-img.png')?>
                                    <div>
                                       <h3>Impressive Special Effects and Cast</h3>
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
                                            26 March 2017 by <a href="#"> johnnylee</a>
                                        </p>
                                        </div>
                                    </div>
                                        <p>The Avengers raid a Hydra base in Sokovia commanded by Strucker and they retrieve Loki's scepter. They also discover that Strucker had been conducting experiments with the orphan twins Pietro Maximoff (Aaron Taylor-Johnson), who has super speed, and Wanda Maximoff (Elizabeth Olsen), who can control minds and project energy. Tony Stark (Robert Downey Jr.) discovers an Artificial Intelligence in the scepter and convinces Bruce Banner (Mark Ruffalo) to secretly help him to transfer the A.I. to his Ultron defense system. However, the Ultron understands that is necessary to annihilate mankind to save the planet, attacks the Avengers and flees to Sokovia with the scepter. He builds an armature for self-protection and robots for his army and teams up with the twins. The Avengers go to Clinton Barton's house to recover, but out of the blue, Nick Fury (Samuel L. Jackson) arrives and convinces them to fight against Ultron. Will they succeed? </p>
                                        <p>"Avengers: Age of Ultron" is an entertaining adventure with impressive special effects and cast. The storyline might be better, since most of the characters do not show any chemistry. However, it is worthwhile watching this film since the amazing special effects are not possible to be described in words. Why Pietro has to die is also not possible to be explained. My vote is eight.</p>
                                    </div>
                                <?php endfor;?>
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
                                    <h6>Ngày sản xuất:</h6>
                                    <p>May 1, 2015 (U.S.A)</p>
                                 </div>
                                 <div class="sb-it">
                                    <h6>Thời lượng:</h6>
                                    <p>141 min</p>
                                 </div>
                                 <div class="sb-it">
                                    <h6>Tags:</h6>
                                    <p class="tags">
                                        <?php for($i =0; $i < 5; $i++):?>
                                            <span class="time"><a href="#">superhero</a></span>
                                        <?php endfor;?>
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
                              <h3>Related Movies To</h3>
                              <h2>Skyfall: Quantum of Spectre</h2>
                              <div class="topbar-filter">
                                 <p>Found <span>12 movies</span> in total</p>
                                 <label>Sort by:</label>
                                 <select>
                                    <option value="popularity">Popularity Descending</option>
                                    <option value="popularity">Popularity Ascending</option>
                                    <option value="rating">Rating Descending</option>
                                    <option value="rating">Rating Ascending</option>
                                    <option value="date">Release date Descending</option>
                                    <option value="date">Release date Ascending</option>
                                 </select>
                              </div>
                              <?php for($i = 0; $i < 5; $i++):?>
                                 <div class="movie-item-style-2">
                                    <?php echo $this->Html->image('default/mv-item1.jpg');?>
                                    <div class="mv-item-infor">
                                       <h6><a href="#">oblivion <span>(2012)</span></a></h6>
                                       <p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
                                       <p class="describe">Earth's mightiest heroes must come together and learn to fight as a team if they are to stop the mischievous Loki and his alien army from enslaving humanity...</p>
                                       <p class="run-time"> Thời lượng: 2h21’    .     <span>Chất lượng: HD </span>    .     <span>Năm sản xuất: 2015</span></p>
                                       <p>Đạo diễn: <a href="#">Joss Whedon</a></p>
                                       <p>Diễn viên: <a href="#">Robert Downey Jr.,</a> <a href="#">Chris Evans,</a> <a href="#">  Chris Hemsworth</a></p>
                                    </div>
                                 </div>
                              <?php endfor;?>
                              <div class="topbar-filter">
                                 <label>Movies per page:</label>
                                 <select>
                                    <option value="range">5 Movies</option>
                                    <option value="saab">10 Movies</option>
                                 </select>
                                 <div class="pagination2">
                                    <span>Page 1 of 2:</span>
                                    <a class="active" href="#">1</a>
                                    <a href="#">2</a>
                                    <a href="#"><i class="ion-arrow-right-b"></i></a>
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
   </div>
</div>