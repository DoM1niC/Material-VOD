
  <video loop id="video" width="720" height="405" class="video-js vjs-16-9 vjs-default-skin vjs-big-play-centered vjs-res-button" preload="none" controls data-setup='{}'>
  <source class="active" src="<?= $streamHDURL ?>" type="application/x-mpegURL" label='HD' res='720'/>
  <source class="active" src="<?= $streamSDURL ?>" type="application/x-mpegURL" label='SD'  res='360' />
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
  </video>