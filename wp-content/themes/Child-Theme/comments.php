<div class="comments">
  	<div class="card">
	  <div class="card-header">
	    <h1 class="judul-comment">Comment</h1>
	  </div>
	</div>
  <div class="card" id="comments">
	  <?php
			$args = array(
			   'post_id' => get_the_id()
			);

			// The Query
			$comments_query = new WP_Comment_Query;
			$comments = $comments_query->query( $args );

			// Comment Loop
			if ( $comments ) {
				foreach ( $comments as $comment ) {
					$d = 'd-m-Y';
					echo '
					<div class="comment-body">
						<div class="avatar_comment">
							'.get_avatar($default, 35).'
						</div>
						<ul>
							<li id="author"><a href="'.$comment->comment_author_url.'">'.$comment->comment_author.'</a></li>
							<li id="date"> W'.get_comment_date($d).'</li>
							<li><p>'.$comment->comment_content.'</p></li>
						</ul>
					</div>
					';
				}
			} else {
				echo '
				<div class="comment-body">
					No comments found.
				</div>
				';
			}
		?>

		<?php

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
