<?php
/**
 * @file
 * Returns the HTML for comments.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728216
 */
?>
<div class="comment-item<?php print $classes; ?> clearfix" <?php print $attributes; ?>>
  <div class="comment-ava">
    <?php if (!empty($picture)):?>
      <?php print $picture; ?>
    <?php else:?>
      <img src="/sites/all/themes/cyprus/img/comment-man.png" class="img-responsive" alt="">
    <?php endif;?>
  </div>
  <div class="comment-text">
    <div class="comment-name">
      <?php if ($title): ?> <?php print $title; ?>
        <?php if ($new): ?>
          <mark class="new"><?php print $new; ?></mark>
        <?php endif; ?>
      <?php endif; ?>
    </div>
    <div class="comment-discr">
      <?php hide($content['links']); print render($content); ?>
      <?php  if (!isset($content['links']['comment']['#links']['comment_forbidden'])) print render($content['links']); ?>
    </div>
    <div class="comment-date"><?php print $submitted; ?></div>
  </div>
</div>
