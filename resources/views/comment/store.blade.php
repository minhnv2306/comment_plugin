<!-- Left-aligned media object -->
<div class="media">
	<div class="media-left">
		<img src="https://www.w3schools.com/w3images/nature.jpg" class="media-object" style="width:60px">
	</div>
	<div class="media-body">
		<h4 class="media-heading">{{ $comment->user->name }}</h4>
		<p>{{ $comment->content }}</p>
		<p style="font-size: 12px; font-weight: bold;"> {{ $comment->created_at->diffForHumans() }} </p>
	</div>
</div>