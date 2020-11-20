$(document).ready(function(){

	//Add Event
	$(document).on('click', '#event_add', function(){

		var event_id = $('#event_id').val();
		var event_name = $('#event_name').val();

		$.ajax({
		  url: 'event_config.php',
		  type: 'POST',
		  data: {
		    'event_add': 1,
		    'event_id': event_id,
		    'event_name': event_name,
		  },
		  success: function(response){
		    $('#event_id').val('');
		    $('#event_name').val('');

		    if (response == 1) {			    
		    	$('.alert_event').fadeIn(500);
			    $('.alert_event').html('<p class="alert alert-success">A new event has been added successfully</p>');
		        $('#new-event').modal('hide');
		        setTimeout(function () {
			        $('.alert_event').fadeOut(500);
			        
			    }, 2000);
		    }
		    else {
	    		$('.alert_event').fadeIn(500);
		    	$('.alert_event').html(response);

		    	setTimeout(function () {
			        $('.alert_event').fadeOut(500);
			    }, 2000);
		    }

		    $.ajax({
		      url: "event_up.php",
		      type: 'POST',
		      data: {
		          'event_up': 1,
		      }
		      }).done(function(data) {
		      $('#event').html(data);
		    });
		  }
		});
	});

	//Delete event
	$(document).on('click', '.event_del', function(){

		var el = this;
		var deleteid = $(this).data('id');

		bootbox.confirm("Do you really want to delete this event?", function(result) {
		if(result){
		     // AJAX Request
		     $.ajax({
		       url: 'event_config.php',
		       type: 'POST',
		       data: { 
		          'event_del': 1,
		          'event_sel': deleteid,
		       },
		       success: function(response){

		         // Removing row from HTML Table
		          if(response == 1){
		              $(el).closest('tr').css('background','#d9534f');
		              $(el).closest('tr').fadeOut(800,function(){
		                $(this).remove();
		              });

		              $.ajax({
	                    url: "event_up.php",
	                    type: 'POST',
	                    data: {
	                        'event_up': 1,
	                    }
	                    }).done(function(data) {
	                    $('#event').html(data);
	                  });
		          }
		          else{
		            $('.alert_event_del').fadeIn(500);
		            $('.alert_event_del').html(response);

		            setTimeout(function () {
		                $('.alert_event_del').fadeOut(500);
		            }, 2000);
		              bootbox.alert('Event not deleted.');
		          }
		       }
		     });
		   }
		});
	});

	// JavaScript Document