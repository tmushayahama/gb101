<?php $this->beginContent('//layouts/gb_main'); ?>
<div id="rm-header">
	<div class="navbar  navbar-top login-nav">
		<div class="navbar-inner ">
			<div class="container-fluid">
				<div class="row-fluid span12">
					<ul class="span9 inline">
						<li><a>
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_transparent.png" class="gb-img-logo" alt="">
							</a>
						</li>
						<li class="dropdown ">
							<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
								<h3>| Getting Started with Goalbook <i class=" icon-chevron-down gb-icon-center icon-white"></i></h3>
							</a>
							<ul class="dropdown-menu gb-dark-background gb-font-medium" role="menu" aria-labelledby="dLabel">
								<li><a>Organizing your goals</a></li>
								<li><a>Organizing your goals</a></li>
								<li class="divider"></li>
								<li><a>Organizing your goals</a></li>
								<li><a>Organizing your goals</a></li>
							</ul>
						</li>
						<br>
						<span ><?php echo CHtml::link('<i class="icon-search icon-white"></i> Explore', Yii::app()->getModule('user')->registrationUrl, array('class' => 'pull-left gb-blue-btn gb-font-small')); ?></span>
						<span><?php echo CHtml::link('<i class="icon-th icon-white"></i> Features', Yii::app()->getModule('user')->registrationUrl, array('class' => 'pull-left gb-redish-btn')); ?></span>
					</ul>
					<div class="span3">
						<?php echo CHtml::link('<i class="icon-pencil icon-white"></i> Sign Up', Yii::app()->getModule('user')->registrationUrl, array('class' => 'gb-green-btn span12 login-btn')); ?>			
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="gb-container-fluid container">
	<div class="row"> 
		<div class="span12">
			<div class="span5 rm-product-info-box">
				<div class="page-header">
					<h3>How to be closer to your friends and family <small>Share your goal commitments and ecourage one another.</small></h3>
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
			<div class="span4 pull-right rm-login-container"> 
				<?php echo $content ?>
			</div>
		</div>
	</div>
</div>
<?php $this->endContent(); ?>
