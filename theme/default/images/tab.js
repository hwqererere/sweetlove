 

 $(document).on('click','#tab li',function(){
 	var $this=$(this);
 	var index=$this.index();
 	$('#tab').find('li').each(function(){
 		$(this).removeClass('active');
 	});
 	$('#tab-list').find('li').each(function(){
 		$(this).hide();
 	});

 	$('#tab').find('li').eq(index).addClass('active');
 	$('#tab-list').find('li').eq(index).css('display','block');
 });

 $(document).ready(function(){
 	$('#mother').find('li:last').css('border-right','0').css('margin-right','0');
 });