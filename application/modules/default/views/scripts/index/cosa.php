<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
JPlugin::loadLanguage( 'tpl_SG1' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
    
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />
<link rel="stylesheet" href="templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
<!--[if lte IE 6]>
<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/ie6.css" type="text/css" />
<![endif]-->

<!-- Agrego css a utilizar -->
<link rel="stylesheet" href="templates/<?php echo $this->template?>/css/itste.css" type="text/css" />

<!-- Agregamos el javascript a utilizar-->
<script language="Javascript" type="text/javascript" src="templates/<?= $this->template ?>/js/jquery.js"></script>
<script language="Javascript" type="text/javascript" src="templates/<?= $this->template ?>/js/jquery.innerfade.js"></script>
<script language="Javascript" type="text/javascript">
	$(document).ready(
				function(){
					$('ul#admin').innerfade({
						speed: 1000,
						timeout: 10000,
						type: 'sequence',
						containerheight: '270px'
					});
			});
</script>
<!-- Fin del código agregado -->

</head>
<body id="page_bg">
	<div id="wrapper">
		<div id="holder">
			<div id="header">
				<div id="search"><jdoc:include type="modules" name="user4" /></div>
				<div class="logo">
					<table cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<h1><a href="index.php"><?php echo $mainframe->getCfg('') ;?></a></h1>
							</td>
						</tr>
					</table>
				</div>
				<div id="pillmenu"><jdoc:include type="modules" name="user3" /></div>
				<div class="cpathway"><jdoc:include type="module" name="breadcrumbs" /></div>
				<div class="clr"></div>
			</div>

			<div id="content">

				<?php if($this->countModules('left') and JRequest::getCmd('layout') != 'form') : ?>
				<div id="leftcolumn">
					<jdoc:include type="modules" name="left" style="rounded" />
					<br />
					<?php $sg = 'banner'; include "templates.php"; ?>
					<br />
				</div>
				<?php endif; ?>

				<?php if($this->countModules('left') and $this->countModules('right') and JRequest::getCmd('layout') != 'form') : ?>
				<div id="maincolumn">
				<?php elseif($this->countModules('left') and !$this->countModules('right') and JRequest::getCmd('layout') != 'form') : ?>
				<div id="maincolumn_left">
				<?php elseif(!$this->countModules('left') and $this->countModules('right') and JRequest::getCmd('layout') != 'form') : ?>
				<div id="maincolumn_right">
				<?php else: ?>
				<div id="maincolumn_full">
				<?php endif; ?>
					<div class="nopad">
						<jdoc:include type="message" />
						<?php if($this->params->get('showComponent')) : ?>
							<jdoc:include type="component" />
						<?php endif; ?>
					</div>
				</div>

				<?php if($this->countModules('right') and JRequest::getCmd('layout') != 'form') : ?>
				<div id="rightcolumn">
					<jdoc:include type="modules" name="right" style="rounded" />
				</div>
				<?php endif; ?>
				<div class="clr"></div>

			</div>
		</div>
	</div>
	<div id="footer">
		<div id="footer_holder">
			<jdoc:include type="modules" name="debug" />
			<?php $sg = ''; include "templates.php"; ?>

		</div>
	</div>
</body>
</html>