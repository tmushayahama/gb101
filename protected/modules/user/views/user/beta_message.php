<?php
$this->beginContent('//layouts/gb_main2');
?>

<div class='container'>
 <div class='alert alert-success'>
  Your request has been sent :). You will hear from us soon.
 </div>
 <a href="<?php echo Yii::app()->user->returnUrl; ?>">
  <h5>Guest Home Page</h5>
 </a>
</div>
<?php $this->endContent(); ?>
<script id="" type="text/javascript">
 $("#gb-navbar-nav").hide();
</script>