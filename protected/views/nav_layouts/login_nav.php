<?php $this->beginContent('//layouts/gb_main'); ?>
<div id="rm-header">
	<div class="navbar navbar-top">
		<div class="navbar-inner gb-login-nav">
			<div class="container-fluid">
				<div class="row-fluid span12">
					<a>
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_transparent.png" class="gb-img-logo-login" alt="">
					</a>
						<?php echo CHtml::link('<i class="icon-pencil icon-white"></i> Sign Up', Yii::app()->getModule('user')->registrationUrl, array('class' => 'pull-right span2 gb-login-btn gb-light-blue-btn')); ?>			
			
					<ul class="nav nav-pills inline pull-right">
						<li><?php echo CHtml::link('<i class="icon-search icon-white"></i> Explore', Yii::app()->getModule('user')->registrationUrl, array('class' => '')); ?></li>
						<li><?php echo CHtml::link('<i class="icon-th icon-white"></i> Features', Yii::app()->getModule('user')->registrationUrl, array('class' => '')); ?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="gb-container-fluid container">
	<div class="row"> 
		<div class="span12 gb-login-row">
			<div class="span5 gb-product-info-box">
				<div class="page-header">
					<h3>Motivate and be motivated. <small>Share your goal commitments and encourage one another.</small></h3>
				</div>
				<dl class="dl-horizontal">
					<li>
					<dt><a>Goal List</a></dt>
					<dd>Make a rough list of your goals.</dd>
					</li>
					<li>
					<dt><a>Goal Commitment</a></dt>
					<dd>Select a goal and make a commitment</dd>
					</li>
					<li>
					<dt><a>Goal Sharing</a></dt>
					<dd>Share your commitment with friend(s)</dd>
					</li>
					<li>
					<dt><a>Support</a></dt>
					<dd>Reward friend(s) or get rewarded by friend(s)</dd>
					</li>
				</dl>
			</div>
			<div class="span4 pull-right gb-login-container"> 
				<?php echo $content ?>
			</div>
		</div>
	</div>
</div>
<?php $this->endContent(); ?>
