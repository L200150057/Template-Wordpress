<div class="comments">
  	<div class="card">
	  <div class="card-header">
	    <h1 class="judul-comment">Comment</h1>
	  </div>
	</div>
  <div class="card" id="comments">
	  	<div class="commentlist">
			<?php
				//Gather comments for a specific page/post 
				$comments = get_comments(array(
					'post_id' => get_the_ID(),
					'status' => 'approve' //Change this to the type of comments to be displayed
				));

				//Display the list of comments
				wp_list_comments(array(
					'avatar_size' => '45',
					'style' => 'ul',
					'per_page' => 10, //Allow comment pagination
					'reverse_top_level' => false //Show the oldest comments at the top of the list
				), $comments);
			?>
		</div>
		<div class="page-numerik">
			<center>
				<?php paginate_comments_links() ?>
			</center>
  		</div>
		<?php

		$comments_args = array(
		        'label_submit'=>'Send',
		        'title_reply'=>'Write a Reply or Comment',
		        'comment_notes_after' => '',
		        'comment_field' => '<p class="comment-form-comment"><label for="comment"></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>'
		);
		comment_form($comments_args);
		?>
		

	</div>
</div>
