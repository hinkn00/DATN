<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Movie'), ['action' => 'edit', $movie->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Movie'), ['action' => 'delete', $movie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Movies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Movie'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="movies view content">
            <h3><?= h($movie->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('M Name') ?></th>
                    <td><?= h($movie->m_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('M Slug') ?></th>
                    <td><?= h($movie->m_slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($movie->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($movie->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($movie->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('M Desc') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($movie->m_desc)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Movies Info') ?></h4>
                <?php if (!empty($movie->movies_info)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Movie Id') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Country Id') ?></th>
                            <th><?= __('Genre Id') ?></th>
                            <th><?= __('M Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($movie->movies_info as $moviesInfo) : ?>
                        <tr>
                            <td><?= h($moviesInfo->id) ?></td>
                            <td><?= h($moviesInfo->movie_id) ?></td>
                            <td><?= h($moviesInfo->category_id) ?></td>
                            <td><?= h($moviesInfo->country_id) ?></td>
                            <td><?= h($moviesInfo->genre_id) ?></td>
                            <td><?= h($moviesInfo->m_status) ?></td>
                            <td><?= h($moviesInfo->created) ?></td>
                            <td><?= h($moviesInfo->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'MoviesInfo', 'action' => 'view', $moviesInfo->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'MoviesInfo', 'action' => 'edit', $moviesInfo->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'MoviesInfo', 'action' => 'delete', $moviesInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $moviesInfo->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
