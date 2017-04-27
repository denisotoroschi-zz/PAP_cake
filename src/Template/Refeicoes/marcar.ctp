<?=$this->Html->css('frontend/calendar/fullcalendar.min.css')?>
<?=$this->Html->css('frontend/calendar/fullcalendar.print.min.css',['media'=>'print'])?>
<?=$this->Html->script('frontend/jquery.min.js')?>
<?=$this->Html->script('frontend/calendar/moment.min.js')?>
<?=$this->Html->script('frontend/calendar/fullcalendar.js')?>
<?=$this->Html->script('frontend/calendar/lang/pt.js')?>
<div class="inner">
	<!-- Header -->
	<header id="header">
		<a href="#" align="center" class="logo"><strong>Marcar</strong> Refeições</a>
	</header>
</div>
<div id='calendar'>
	
</div>
<script type="text/javascript">
	$(document).ready(function() {
		var aspect;
		if ($(window).width() <= 768) {
			aspect=1.2;       	
	    }
	    else
	    {
	    	aspect=2.4;
	    }
	    $('#calendar').fullCalendar({
	        // put your options and callbacks here
	        aspectRatio: aspect,
	        header: {
				left: 'prev,next today',
				center: 'title',
				right: 'list,month'
			},
			events:[{
					title: 'Feijoada de porco',
					start: '2017-04-03'
				}] 
	        
	    }) 
	});
</script>

