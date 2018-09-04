//menu
$(document).ready(function(){
  

  $('li.mainlevel').hover(
		function() {
			$(this).find('ul').stop().slideDown();
		},
		function() {
			$(this).find('ul').stop().slideUp();
		}
		);
  
});

//����ͼ�� www.lanrentuku.com