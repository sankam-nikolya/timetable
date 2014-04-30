<div class="container">
	<?php foreach ($ads as $ad):?>
	<div class="bs-callout-info">
		<h4><?=$ad['title']?></h4>
		<p><?=$ad['text']?></p>		
	</div>
	<?php endforeach?>	
</div>
