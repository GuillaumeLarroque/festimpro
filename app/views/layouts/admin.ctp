<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Administration du site :'); ?>
	</title>
	<style type="text/css">
		
		#menu {
			padding:0;
			list-style-type:none;
			}
		#enu li {
			margin-left:2px;
			float:left; /*pour IE*/
			}
		#menu li a {
			display:block;
			float:left;   
			width:100px;
			background-color:#996633;
			color:black;
			text-decoration:none;
			text-align:center;
			padding:5px;
			border:2px solid;
			border-color:#DCDCDC #696969 #696969 #DCDCDC;
		}
		
		#menu li a:hover {
			background-color:#D3D3D3;
			border-color:#696969 #DCDCDC #DCDCDC #696969;
		} 

		#menu a{
			color:#fff;
			text-decoration:none;
		}
	</style>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link(__('ADMINISTRATION du festival Impro 14', true), Configure::read('site.URL').'admin' ); ?></h1>
		<ul id="menu">
			<li>
			<?php echo $this->Html->link(__('Liste des matchs', true), array('controller'=>'users', 'admin'=>'true', 'action' => 'home')); ?>
			</li>
			<li>
			<?php echo $this->Html->link(__('Liste des Salles', true), array('controller' => 'salles', 'admin'=>'true', 'action' => 'index')); ?>	
			</li>
			<li>
			<?php echo $this->Html->link('Gestion du livre d\'Or', array('controller'=>'messages', 'admin'=>'true', 'action'=>'index') ); ?>	
			</li>
		</ul>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php echo $this->Html->link('Afficher le site', Configure::read('site.URL'),
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>