<li id="li-comment-{{$data['id']}}" class="comment">
	<div id="comment-{{$data['id']}}" class="comment-container new_comment">
		<div class="comment-meta commentmetadata">
			<div class="intro">
				<div class="commentDate">
					только что добавлен                     
				</div>
			</div>
			<div class="comment-body">
				<p>{{ $data['text'] }}</p>
			</div>
		</div>
	</div>
	
</li>