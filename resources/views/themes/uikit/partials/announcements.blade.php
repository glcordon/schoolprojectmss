@php $announcement = Wave\Announcement::orderBy('created_at', 'DESC')->first() @endphp
<div id="announcement" class="uk-animation-slide-bottom-medium" data-href="{{ route('wave.announcement', $announcement->id) }}">
	<div id="announcement_content">
		<span id="announcement_close">&times;</span>
		<h4>{{ $announcement->title }}</h4>
		<p>{{ $announcement->description }}</p>
		<div id="announcement_footer"><a href="{{ route('wave.announcement', $announcement->id) }}" class="uk-button uk-button-text">Learn More</a></div>
	</div>
</div>

<script>

	var announcementEl = document.getElementById('announcement');

	document.getElementById('announcement_close').addEventListener('click', function(){
		announcementEl.className = "";
		markNotificationsRead();
		setTimeout(function(){
			announcementEl.className = "uk-animation-slide-bottom-medium uk-animation-reverse";
			setTimeout(function(){
				announcementEl.remove();
			}, 200);
		}, 100);
	});

	announcementEl.addEventListener('click', function(e){
		if(e.target.parentElement.id != "announcement_close" && e.target.id != "announcement_close"){
			markNotificationsRead();
			window.location = announcementEl.dataset.href;
		}
	});

	function markNotificationsRead(endpoint, splitPopReadyState){
		var HttpRequest = new XMLHttpRequest();
		HttpRequest.open("POST", "{{ route('wave.announcements.read') }}", true);
		HttpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		HttpRequest.send("_token={{ csrf_token() }}");
	}
</script>