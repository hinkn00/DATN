<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1> <?= $movie->m_name?></h1>
					<?php 
						$this->Breadcrumbs->add([
							[
								'title' => 'Trang chủ', 
								'url' => ['controller' => 'Pages', 'action' => 'home'], 
								'options' => [
									'class' => 'active'
								]
							],
							[
								'title'=> $movie->m_name,
								'options' => [
									'innerAttrs' => [
										'class' => "ion-ios-arrow-right"
									]
								]

							]
						]);
						echo $this->Breadcrumbs->render();
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- blog detail section-->
<div class="page-single">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="blog-detail-ct">
					<h1><?= $movie->m_name?></h1>
					<!-- <video width="100%" height="400" controls>
                        <source src="https://www.youtube.com/embed/4EYDik5IhAc" type="video/mp4">
                        <source src="" type="video/ogg">
                    </video> -->
                    <iframe type="text/html" width="100%" height="500px" src="https://streamable.com/e/hat6st" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <h1>
                        Nội dung phim
                    </h1>
                    <?= $movie->m_desc?>
					<!-- share link -->
					<div class="flex-it share-tag">
						<div class="social-link">
							<h4>Share it</h4>
							<a href="#"><i class="ion-social-facebook"></i></a>
							<a href="#"><i class="ion-social-twitter"></i></a>
							<a href="#"><i class="ion-social-googleplus"></i></a>
							<a href="#"><i class="ion-social-pinterest"></i></a>
							<a href="#"><i class="ion-social-linkedin"></i></a>
						</div>
					</div>
					<!-- comment items -->
					<div class="comments">
						<h4>04 Comments</h4>
						<div class="cmt-item flex-it">
							<img src="images/uploads/author.png" alt="">
							<div class="author-infor">
								<div class="flex-it2">
									<h6><a href="#">Steve Perry</a></h6> <span class="time"> - 27 Mar 2017</span>
								</div>
								<p>Even though Journey's classic vocalist Steve Perry didn’t reunite with the band during their Rock Hall performance (to the dismay of hopeful fans), he did offer up a touching speech.</p>
								<p><a class="rep-btn" href="#">+ Reply</a></p>
							</div>
						</div>
						<div class="cmt-item flex-it reply">
							<img src="images/uploads/author2.png" alt="">
							<div class="author-infor">
								<div class="flex-it2">
									<h6><a href="#">Joss Whedon</a></h6> <span class="time"> - 27 Mar 2017</span>
								</div>
								<p>Prince died not long after the 2016 Rock Hall ceremony, so this year's edition featured Lenny Kravitz and a full gospel choir performing a swamp-funk take on When Doves Cry.</p>
							</div>
						</div>
						<div class="cmt-item flex-it reply">
							<img src="images/uploads/author3.png" alt="">
							<div class="author-infor">
								<div class="flex-it2">
									<h6><a href="#">Dave McNary</a></h6> <span class="time"> - 27 Mar 2017</span>
								</div>
								<p>Blue Sky Studios is one of the world’s leading digital animation movie studios and we are proud of their commitment to stay and grow in Connecticut.</p>
							</div>
						</div>
						<div class="cmt-item flex-it">
							<img src="images/uploads/author4.png" alt="">
							<div class="author-infor">
								<div class="flex-it2">
									<h6><a href="#">Margot Robbie</a></h6> <span class="time"> - 27 Mar 2017</span>
								</div>
								<p>Joan Baez was the sharpest of the Rock Hall inductees, singing about deportees and talking social activism as well as joking about her age and the likelihood that a good portion of the Barclays. </p>
								<p><a class="rep-btn" href="#">+ Reply</a></p>
							</div>
						</div>
					</div>
					<div class="comment-form">
						<h4>Leave a comment</h4>
						<form action="#">
							<div class="row">
								<div class="col-md-4">
									<input type="text" placeholder="Your name">
								</div>
								<div class="col-md-4">
									<input type="text" placeholder="Your email">
								</div>
								<div class="col-md-4">
									<input type="text" placeholder="Website">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<textarea name="message" id="" placeholder="Message"></textarea>
								</div>
							</div>
							<input class="submit" type="submit" placeholder="submit">
						</form>
					</div>
					<!-- comment form -->
				</div>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="sidebar">
					<div class="sb-recentpost sb-it">
						<h4 class="sb-title">Phim theo danh mục</h4>
						<?php foreach ($category_movies as $key => $value):?>
                            <?php if($value->id != $movie->id):?>
                                <div class="recent-item">
                                    <?php echo $this->Html->image('default/mv-item1.jpg',['width'=>'80','height'=>'80']);?>
                                    <h6 style="margin-left: 15px;"><a href="#"><?= $value->m_name?></a></h6>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
					</div>
					<div class="sb-recentpost sb-it">
						<h4 class="sb-title">Phim theo thể loại</h4>
						<?php foreach ($genre_movies as $key => $value):?>
                            <?php if($value->id != $movie->id):?>
                                <div class="recent-item">
                                    <?php echo $this->Html->image('default/mv-item1.jpg',['width'=>'80','height'=>'80']);?>
                                    <h6 style="margin-left: 15px;"><a href="#"><?= $value->m_name?></a></h6>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
					</div>
					<div class="sb-tags sb-it">
						<h4 class="sb-title">tags</h4>
						<ul class="tag-items">
							<?php if($movie->movies_info->tags):?>
                                <?php $hash_tag= array(); $tags = explode(', ',@h($movie->movies_info->tags));?>
                                <?php foreach($tags as $tag):?>
                                    <li><a href="https://www.google.com/"><?= @h($tag)?></a></li>
                                <?php endforeach;?>
                            <?php else:?>
                                <?php echo "";?>
                            <?php endif;?>
						</ul>
					</div>
					<div class="ads">
						<img src="images/uploads/ads1.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end of  blog detail section-->