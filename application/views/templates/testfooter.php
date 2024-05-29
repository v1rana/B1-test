<?php   defined('BASEPATH') OR exit('No direct script access allowed');   ?>
		
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" ></script>
		<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>


<script>
$.fn.shuffleChildren = function() {
 $.each(this.get(), function(index, el) {
   var $el = $(el);
   var $find = $el.children();

   $find.sort(function() {
     return 0.5 - Math.random();
   });

   $el.empty();
   $find.appendTo($el);
 });
};


</script>


	</body>
</html>