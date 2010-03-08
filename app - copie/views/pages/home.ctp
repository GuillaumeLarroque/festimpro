<?php $this->layout = 'accueil'; ?>
<h1>Festival Impro14</h1>


<?php
    $this->addScript('flash', $swfobject->create('/img/impro14.swf', 'anim', array('width' => 700, 'height' => 500, 'express' => '/img/expressInstall.swf')));
?> 

 
<div id="anim">
	<p>Ici le texte alternatif qui sera affiché si le lecteur Flash n'est pas présent.</p>
</div>

