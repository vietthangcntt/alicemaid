<div id="comments">
	
	<h2> <?php echo 'THERE ARE '. wp_count_comments()->approved.' COMMENTS' ?> </h2>
	<?php wp_list_comments(); ?>
		
</div>

	<div id="respond" class="comment-respond">
		<h2>LEAVE A COMMENT</h2>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="POST" id="commentform" class="comment-form">
			<table>
				<tbody>	
					<tr>
						<td><label for="author">Name <span class="required">&#42</span></label> </td>
						<td><input id="author" name="author" type="text" value="" size="30" maxlength="245" required="required"></td>
					</tr>
					<tr>
						<td><label for="email">Email <span class="required">&#42</span></label> </td>
						<td><input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required="required"></td>
					</tr>
					<tr>
						<td><label for="url">Website</label></td>
						<td> <input id="url" name="url" type="text" value="" size="30" maxlength="200"></td>
					</tr>
						
				</tbody>
				
			</table>
			<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></td>
				<button name="submit" type="submit" id="submit" class="submit" >POST COMMENT</button>
				 <input type="hidden" name="comment_post_ID" value="24" id="comment_post_ID">
				<input type="hidden" name="comment_parent" id="comment_parent" value="0">
		</form>
	</div>