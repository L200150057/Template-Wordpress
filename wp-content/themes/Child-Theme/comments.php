<div class="comments">
  	<div class="card">
	  <div class="card-header">
	    <h1 class="judul-comment">Comment</h1>
	  </div>
	</div>
  <div class="card" id="comments">
  <?php $args = array(
	'walker'            => null,
	'max_depth'         => '',
	'style'             => 'ul',
	'callback'          => null,
	'end-callback'      => null,
	'type'              => 'all',
	'reply_text'        => 'Reply',
	'page'              => '',
	'per_page'          => '',
	'avatar_size'       => 35,
	'reverse_top_level' => null,
	'reverse_children'  => '',
	'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
	'short_ping'        => false,   // @since 3.6
        'echo'              => true     // boolean, default is true
); ?>


<?php
wp_list_comments($args, $comments);

$comments_args = array(
        'label_submit'=>'Send',
        'title_reply'=>'Write a Reply or Comment',
        'comment_notes_after' => '',
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
);

comment_form($comments_args);
?>
</div>
</div>
