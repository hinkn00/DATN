<?php $this->assign('title', 'Tìm kiếm: ' . $this->request->getQuery('tag_key')) ?>
<div class="hero common-hero">
    <div class="container">
        <div class="row">
            <!-- <div class="col-md-12">
                <div class="hero-ct">
                    <h1><?php echo $category->title ?></h1>
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
                            'title' => $category->title,
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
            </div> -->
        </div>
    </div>
</div>
<div class="page-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="topbar-filter fw">
                    <p>Đã tìm thấy tổng cộng có: <span><?php echo "" ?> </span>phim</p>
                    <label>Sắp xếp:</label>
                    <select>
                        <option value="date_desc">Ngày gần nhất</option>
                        <option value="date_asc">Ngày tăng dần</option>
                    </select>
                </div>
                <div class="flex-wrap-movielist mv-grid-fw">
                    <?php foreach ($movie_searchs as $key => $movie) : ?>
                        <div class="movie-item-style-2 movie-item-style-1">
                            <?php echo $this->Html->image(!empty($movie->thumb) ? $url_s3 . "uploads/thumbs/" . $movie->thumb : 'default/mv-item1.jpg', ['style' => 'width:170px;height:261px']); ?>
                            <div class="hvr-inner">
                                <a href="<?php echo $this->Url->build(["_name" => "movies_details", "slug" => $movie->m_slug, "id" => $movie->id]); ?>"> Chi tiết <i class="ion-android-arrow-dropright"></i> </a>
                            </div>
                            <div class="mv-item-infor">
                                <h6><a href="<?php echo $this->Url->build(["_name" => "movies_details", "slug" => $movie->m_slug, "id" => $movie->id]); ?>"><?= $movie->m_name ?></a></h6>
                                <div class="cate mt-2">
                                    <span class="blue"><a href="#"><?= $movie->movies_info->resolution ?></a></span>
                                </div>
                                <p class="rate"><i class="ion-android-star"></i><span><?= !empty($rating[$key]) ? round($rating[$key], 2) : 5 ?></span> /5</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="topbar-filter">
                    <label>Phim mỗi trang:</label>
                    <select>
                        <option value="range">20 phim</option>
                        <option value="saab">10 phim</option>
                    </select>

                    <div class="pagination2">
                        <span>Page 1 of 2:</span>
                        <a class="active" href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">...</a>
                        <a href="#">78</a>
                        <a href="#">79</a>
                        <a href="#"><i class="ion-arrow-right-b"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>