<?php

if(!$inWidget instanceof \inWidget\Core) {
	throw new \Exception('inWidget object was not initialised.');
}

?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>inWidget - free Instagram widget for your site!</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="content-language" content="<?= $inWidget->langName ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<link rel="stylesheet" type="text/css" href="<?= $inWidget->skinPath.$inWidget->skinName ?>.css?r2" media="all" />
		<?php if($inWidget->adaptive === false): ?>
			<style type='text/css'>
				#template-content a.image{
					width: 30.333%;
					margin-left: 1.5%;
					margin-right: 1.5%;
					float: left;
				}
				#template-content a.image img{
					width: 100%
				}
				#template-content .icon{
					width: 40px;
					height: 40px;
					float: left;
				}
				#template-content .icon img{
					width: 100%;
					border-radius: 50%;
				}
				#template-content .username-top{
					float: left;
					line-height: 40px;
					margin-left: 10px;
					margin-bottom: 10px;
					color: #F69087;
					font-family: sans-serif;
				}
			</style>
		<?php
			else: require_once 'plugins/adaptive.php';
			endif;
		?>
	</head>
<body id="template-content">
	<div id="widget" class="widget">
		<a href="https://instagram.com/<?= $inWidget->data->username ?>" target="_blank" class="title">
			<div class="icon">
				<img src="<?php echo $inWidget->data->avatar;?>"/>
			</div>
			<div class="text username-top"><?= $inWidget->lang['title']; ?></div>
			<div class="clearfix" style="clear: both;"></div>
		</a>
		<?php if($inWidget->toolbar == true): ?>
			<?php endif;
			$i = 0;
			$count = $inWidget->countAvailableImages($inWidget->data->images);
			if($count>0) {
				echo '<div id="widgetData" class="data">';
					foreach ($inWidget->data->images as $key=>$item){
						if($inWidget->isBannedUserId($item->authorId) === true) continue;
						switch ($inWidget->preview){
							case 'large':
								$thumbnail = $item->large;
								break;
							case 'fullsize':
								$thumbnail = $item->fullsize;
								break;
							default:
								$thumbnail = $item->small;
						}
						echo
						'<a href="'.$item->link.'" class="image" target="_blank">
							<img src="'.$thumbnail.'"/>
						</a>';
						$i++;
						if($i >= $inWidget->view) break;
					}
					echo '<div class="clear">&nbsp;</div>';
				echo '</div>';
			}
			else {
				if(!empty($inWidget->config['HASHTAG'])) {
					$inWidget->lang['imgEmptyByHash'] = str_replace(
						'{$hashtag}',
						$inWidget->config['HASHTAG'],
						$inWidget->lang['imgEmptyByHash']
					);
					echo '<div class="empty">'.$inWidget->lang['imgEmptyByHash'].'</div>';
				}
				else echo '<div class="empty">'.$inWidget->lang['imgEmpty'].'</div>';
			}
		?>
	</div>

<?php if(isset($inWidget->data->isBackup)): ?>
	<div class='cacheError'>
		<?= $inWidget->lang['errorCache'].' '.date('Y-m-d H:i:s',$inWidget->data->lastupdate) .' <br /> '. $inWidget->lang['updateNeeded'] ?>
	</div>
<?php endif;?>
	<div class="clearfix" style="clear: both"></div>
</body>
</html>
