 <div id="upload_show" class="modal modal-small">
    <div class="modal-content">
      <h4>Video's Verwalten</h4>
    <div class="row">
                <div class="col m5">	
<div class="input-field">
<input type="text" id="search">
          <label for="search">Suche</label>
</div>
</div>

<script> $(function(){ $('#search-table').searchable({selector:'tr', childSelector:'label',searchField:'#search'}); });</script>
<table class="bordered striped" id="search-table">
	<form id="del" action="" method="post">

	<?php
		$dirs2 = [
			$convertedLocation,
			'content/'		];
		$videos2 = [];
		foreach ($dirs2 as $dir2) foreach (glob($dir2."*.*") as $video2) $videos2[] = $video2;
		foreach ($videos2 as $video2) {
	?>
		<tbody><tr><td><p><input type="checkbox" name="uploadcheck[]" value="<?= $video2 ?>" id="<?= $video2 ?>"</input> <label for="<?= $video2 ?>"><?= explode("/", $video2)[sizeof(explode("/", $video2))-1] ?></label></p></tr></td></tbody>
	<?php

		}

	?>

</table>
<div id="response"></div>
  </div>
	<button class="btn red" name="action" type="submit" value="delete">LÖSCHEN</button> 
</form>  
         <button class="btn modal-action indigo darken-2 modal-close">Schließen</button>
  </div>
  </div>