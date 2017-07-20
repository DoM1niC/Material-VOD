 <div id="download_show" class="modal modal-small">
    <div class="modal-content">
      <h4>Video's konvertieren</h4>
    <div class="row">
                <div class="col m6">	
<div class="input-field">
<input type="text" id="search2">
          <label for="search2">Suche</label>
</div>
</div>

<script> $(function(){ $('#search-table2').searchable({selector:'tr', childSelector:'label',searchField:'#search2'}); });</script>
<table class="bordered striped" id="search-table2">	
<form id="del" action="" method="post">

	<?php
		$dirs = [
			$downloadLocation,
			'content/'		];
		$videos = [];
		foreach ($dirs as $dir) foreach (glob($dir."*.*") as $video) $videos[] = $video;
		foreach ($videos as $video) {
	?>
		<tbody><tr><td><p><input type="checkbox" name="convertcheck[]" value="<?= $video ?>" id="<?= $video ?>"</input> <label for="<?= $video ?>"><?= explode("/", $video)[sizeof(explode("/", $video))-1] ?></label></p></tr></td></tbody>
	<?php

		}

	?>

</table>
<div id="response"></div>
  </div>
	<button class="btn orange" name="action" type="submit" value="convert">Konvertieren</button>  
	<button class="btn red hide" name="action" type="submit" value="delete">LÖSCHEN</button> 
</form>  
         <button class="btn modal-action indigo darken-2 modal-close">Schließen</button>
  </div>
  </div>

