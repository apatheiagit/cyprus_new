<?php
/**
 * @file
 * Returns the HTML for a wrapping container around comments.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728230
 */

// Render the comments and form first to see if we need headings.
$comments = render($content['comments']);
$comment_form = render($content['comment_form']);
?>
<section id="comments" class="comments <?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print $comments; ?>

  <?php if ($comment_form): ?>
    <div class="comment-header">
      <div class="comment-title">
        <div class="title"><?php print t('Add new comment'); ?></div>
      </div>
    </div>
    <?php print $comment_form; ?>
  <?php endif; ?>
</section>
