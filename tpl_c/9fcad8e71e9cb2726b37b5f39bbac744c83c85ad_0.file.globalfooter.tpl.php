<?php
/* Smarty version 3.1.30, created on 2020-11-06 00:50:42
  from "/var/www/html/booking/tpl/globalfooter.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fa43b72b6d515_88652209',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fcad8e71e9cb2726b37b5f39bbac744c83c85ad' => 
    array (
      0 => '/var/www/html/booking/tpl/globalfooter.tpl',
      1 => 1604495966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa43b72b6d515_88652209 (Smarty_Internal_Template $_smarty_tpl) {
?>


	</div><!-- close main-->

	<footer class="footer navbar">
		&copy; 2017 Vistec Thailand <br/><a href="http://www.vistec.ac.th">Vistec Page</a>
	</footer>

	<?php echo '<script'; ?>
 type="text/javascript">
		init();
		$.blockUI.defaults.css.border = 'none';
		$.blockUI.defaults.css.top = '25%';
	<?php echo '</script'; ?>
>

	<?php if (!empty($_smarty_tpl->tpl_vars['GoogleAnalyticsTrackingId']->value)) {?>
		
			<?php echo '<script'; ?>
>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  
			  ga('create', '<?php echo $_smarty_tpl->tpl_vars['GoogleAnalyticsTrackingId']->value;?>
', 'auto');
			  ga('send', 'pageview');
			<?php echo '</script'; ?>
>
	<?php }?>
	</body>
</html>
<?php }
}
