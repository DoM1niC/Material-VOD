<section>
      <div id="stream" class="container scrollspy">
            <div class="row">
                    <div class="left-align">
                        <h2>Streaming</h2>
                    </div>
            <div  class="col s12 m6">
       <div class="card">
            <div class="card-image">
                    <?php include("streaming/stream_player.php"); ?>
		</div>     
            <div class="card-content">
            <span class="card-title"><i class="fa fa-video-camera"></i> Livestream <i class="fa fa-eye"></i> <span id="zuschauer">0</span>
</span>
              <p>Schau Live!</p>

            </div>            </div>
            </div>  
            <div  class="col s12 m6">
       <div class="card">
            <div class="card-image">
                    <?php include("streaming/stream_chat.php"); ?>
		</div>     
            <div class="card-content">
            <span class="card-title"><i class="fa fa-comment-o "></i> Chat</span>
              <p>Sei live dabei & chatte im Stream!</p>
            </div>            
		</div>
		</div>
		</div>
</section>

<script type="text/javascript">
$(document).ready(function() {
 videojs('video').videoJsResolutionSwitcher()
 setTimeout(refreshZuschauer, 1000);
});

function refreshZuschauer() {
 $.ajax({ url: "libs/count.php" }).done(function (data) {
  $("#zuschauer").html(data);
 }).always(function () {
  setTimeout(refreshZuschauer, 4 * 1000);
 });
}
</script>