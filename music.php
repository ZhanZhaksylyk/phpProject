<?php $url='images/zhan.jpg';$title='Music'; include 'init_src.php';?>


<div class="d-inline-flex mt-3 w-100"><!-- main content -->
	<div class="col-3 vl-right"><!-- left aside -->
		<audio id="audio" autoplay="TRUE" tabindex="0" controls="" >
			<source src="music/FisherOfMen.mp3">
		</audio> 
	</div>
	<div class="col-6 text-center vl-right"><!-- middle part -->
		<img src="images/music.gif" class="w-100">
	</div>
	<div class="col-3" ><!-- right aside -->
		<ul id="playlist">
			<li class="active">
				<a href="music/FisherOfMen.mp3">Fisher Of Men</a>
			</li>
			<li>
				<a href="music/Oogway'sAscends.mp3">Oogway's Ascends</a>
			</li>
			<li>
				<a href="music/TheArrivalOfKai.mp3">The arrival of Kai</a>
			</li>
			<li>
				<a href="music/ManOfSteel.mp3">Man of Steel</a>
			</li>
			<li>
				<a href="music/TheEnd.mp3">The End</a>
			</li>
		</ul>
	</div>
</div>



<?php include 'foot_src.html';?>




<script type="text/javascript">
	$(document).ready(function () {
		init();
		function init(){
			var current = 0;
			var audio = $('#audio');
			var playlist = $('#playlist');
			var tracks = playlist.find('li a');
			var len = tracks.length - 1;
			audio[0].volume = .10;
			audio[0].play();
			playlist.on('click','a', function(e){
				e.preventDefault();
				link = $(this);
				current = link.parent().index();
				run(link, audio[0]);
			});
			audio[0].addEventListener('ended',function(e){
				current++;
				if(current == len){
					current = 0;
					link = playlist.find('a')[0];
				}else{
					link = playlist.find('a')[current];    
				}
				run($(link),audio[0]);
			});
		}
		function run(link, player){
				player.src = link.attr('href');
				par = link.parent();
				par.addClass('active').siblings().removeClass('active');
				player.load();
				player.play();
		}
	});
</script>
