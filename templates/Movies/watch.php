<?php $this->assign('title', "Xem Phim ".$movie->m_name)?>
<style>
	#comment_content{
		resize:none;
	}
</style>
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
                    <?= html_entity_decode($movie->m_desc)?>
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
						<h4><?= count($comments->toArray()) < 10 ? '0'.count($comments->toArray()) : count($comments->toArray())?> Comments</h4>
						<?php foreach($comments as $comment):?>
							<div class="cmt-item flex-it">
								<img src="images/uploads/author4.png" alt="">
								<div class="author-infor">
									<div class="flex-it2">
										<h6><a href="#">Margot Robbie</a></h6> <span class="time"> - <?= h($comment->created->format('d/m/Y'))?></span>
									</div>
									<p style="width:100%"><?= $comment->content?></p>
									<!-- <p><a class="rep-btn" href="#">+ Reply</a></p> -->
								</div>
							</div>
						<?php endforeach;?>
					</div>
					<div class="comment-form">
						<h4>Viết bình luận</h4>
						<?= $this->Form->create(null,['onsubmit'=>'return false','id'=>'CommentForm'])?>
						<input type="hidden" name="id_user" value="<?= $member_info? $member_info->id: ''?>">
						<input type="hidden" name="id_movie" value="<?= $movie? $movie->id: ''?>">
							<div class="row">
								<div class="col-md-12">
									<textarea name="message" id="comment_content" placeholder="Bình luận..."></textarea>
								</div>
							</div>
							<p class="notifications" style="color:white"></p>
							<?php if($member_info || !empty($member_info)):?>
								<input class="submit" type="submit" value="Bình luận">
							<?php else:?>
								<a href="#"><input type="button" class="submit loginLink" value="Đăng nhập để bình luận"></a>
							<?php endif;?>
						<?= $this->Form->end()?>
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
                                    <h6 style="margin-left: 15px;"><a href="<?php echo $this->Url->build(["_name"=>"movies_details","slug"=>$value->m_slug,"id"=>$value->id]);?>"><?= $value->m_name?></a></h6>
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
                                    <h6 style="margin-left: 15px;"><a href="<?php echo $this->Url->build(["_name"=>"movies_details","slug"=>$value->m_slug,"id"=>$value->id]);?>"><?= $value->m_name?></a></h6>
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
                                    <li><a href="https://www.google.com/"><?= html_entity_decode($tag)?></a></li>
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
<?= $this->Html->script(['client/movies'])?>