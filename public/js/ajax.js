function created_user(){
	var fullname   = $('#fullname').val();
	var password    = $('#password').val();
	var r_password    = $('#re-password').val();
	var email       = $('#email').val();
	var groups    = $('#groups').val();
	var check = true;
	if(fullname == ''){
		$('.lblErrFullname').modal('show');
		check = false;
	}else{
		$('.lblErrFullname').modal('hide');
	}
	if(email == ''){
		$('.lblErrEmail').modal('show');
		check = false;
	}else{
		$('.lblErrEmail').modal('hide');
	}
	if(password == ''){
		$('.lblErrPassword').modal('show');
		check = false;
	}else{
		$('.lblErrPassword').modal('hide');
	}
	if(password != r_password){
		$('.lblErrRpassword').modal('show');
		check = false;
	}else{
		$('.lblErrRpassword').modal('hide');
	}
	if(check){
		$.ajax({
			type: 'post',
			url: 'users/created',
			data:  {fullname: fullname,password: password,email:email,groups:groups},
			dataType:"json",
			success: function(data) {
				if(data.status == 'ok'){
					$('#created-user').modal('hide');
					$('#success').modal('show');
					$('#success').find('.modal-body h3').text(data.message);
				}
				else{
					$('#error').modal('show');
					$('#error').find('.modal-body h3').text(data.message);
				}
			}
		});
	}
}
function update_user(id){
	var fullname   = $('#fullname-'+id).val();
	var email       = $('#email-'+id).val();
	var groups    = $('#groups-'+id).val();
	// console.log(fullname);
	// console.log(email);
	// console.log(groups);return;
	var check = true;
	if(fullname == ''){
		$('.lblErrFullname-'+id).modal('show');
		check = false;
	}else{
		$('.lblErrFullname-'+id).modal('hide');
	}
	if(email == ''){
		$('.lblErrEmail-'+id).modal('show');
		check = false;
	}else{
		$('.lblErrEmail-'+id).modal('hide');
	}
	if(check){
		$.ajax({
			type: 'post',
			url: 'users/update',
			data:  {id: id,fullname: fullname,email:email,groups:groups},
			dataType:"json",
			success: function(data) {
				if(data.status == 'ok'){
					$('#created-user').modal('hide');
					$('#success').modal('show');
					$('#success').find('.modal-body h3').text(data.message);
				}
				else{
					$('#error').modal('show');
					$('#error').find('.modal-body h3').text(data.message);
				}
			}
		});
	}
}
function close_user(){
	$('#created-user').modal('hide');
	$('#success').modal('hide');
	window.location.reload();
}
function close_all(){
	$('#created-user').modal('hide');
	$('.modal-backdrop').remove();
}
function delete_user(id){
    $.ajax({
        url: 'users/delete',
        type: 'post',
        dataType: 'json',
        data:{id: id},
        success: function(data){
            if(data.status = 'ok'){
                $('#success').modal('show');
                $('#success').find('.modal-body h3').text(data.message);
                $('#delete_user_'+id).modal('hide');
                $('#users-'+id).remove();
            }
        }
    });
}
function delete_room(id){
    $.ajax({
        url: 'rooms/delete',
        type: 'post',
        dataType: 'json',
        data:{id: id},
        success: function(data){
            if(data.status = 'ok'){
            	$('#success').modal('show');
                $('#success').find('.modal-body h3').text(data.message);
                $('#delete_user_'+id).modal('hide');
                $('#users-'+id).remove();
            }
        }
    });
}
function delete_group(id){
    $.ajax({
        url: 'groups/delete',
        type: 'post',
        dataType: 'json',
        data:{id: id},
        success: function(data){
            if(data.status = 'ok'){
            	$('#success').modal('show');
                $('#success').find('.modal-body h3').text(data.message);
                $('#delete_group_'+id).modal('hide');
                $('#users-'+id).remove();
            }
        }
    });
}
function update_status(i_id){
	var i_status = $("#test-"+i_id).parent().attr('data');		
	$.ajax({
      type: 'post',
      url: 'users/test-ajax',
      data: {id: i_id,status: i_status},
      dataType:"json",
      success: function(data) {
      	//console.log(data);return;
    	  if(data.status == 'ok'){
    	  	//alert('ok');   	    	  	
    	  	if(i_status == 1){
    	  		$("#test-"+i_id).removeClass('fa-check');
    	  		$("#test-"+i_id).addClass('fa-lock');
    	  		$("#test-"+i_id).parent().attr('data',0);
    	  	}
    	  	else{
    	  		$("#test-"+i_id).removeClass('fa-lock');
    	  		$("#test-"+i_id).addClass('fa-check');
    	  		$("#test-"+i_id).parent().attr('data',1);
    	  	}
    	  }   	    	  
      }
    });	
}
function created_room(){
	var r_name   = $('#room-name').val();
	var check = true;
	if(r_name == ''){
		$('.lblErrRoomname').modal('show');
		check = false;
	}else{
		$('.lblErrRoomname').modal('hide');
		check = true;
	}
	if(check){
		$.ajax({
			type: 'post',
			url: 'rooms/created-room',
			data:  {r_name: r_name},
			dataType:"json",
			success: function(data) {
				if(data.status == 'ok'){
					$('#created-room').modal('hide');
					$('#success').modal('show');
					$('#success').find('.modal-body h3').text(data.message);
				}
				else{
					$('#error').modal('show');
					$('#error').find('.modal-body h3').text(data.message);
				}
			}
		});
	}
}
function created_group(){
	var g_name = $('#group-name').val();
	var check = true;
	if(g_name == ''){
		$('.lblErrGroupname').modal('show');
		check = false;
	}
	else{
		$('.lblErrGroupname').modal('hide');
		check = true;
	}
	if(check){
		$.ajax({
			url:'groups/created-group',
			type:'post',
			data:  {g_name: g_name},
			dataType:"json",

			success: function(data) {
				if(data.status == 'ok'){
					$('#created-group').modal('hide');
					$('#success').modal('show');
					$('#success').find('.modal-body h3').text(data.message);
				}
				else{
					$('#error').modal('show');
					$('#error').find('.modal-body h3').text(data.message);
				}
			}
		});
	}
}
function update_group(id){
	var id_hidden = $('#group_id-'+id).val();
	var g_name = $('#update_group-'+id).val();
	if(g_name == ''){
		$('.lblErrGroupname').modal('show');
	}
	else{
		$('.lblErrGroupname').modal('hide');
		$.ajax({
			url:'groups/update-group',
			type:'post',
			data:  {id: id_hidden, g_name: g_name},
			dataType:"json",
			success: function(data) {
				if(data.status == 'ok'){
					$('#update-group-'+id).modal('hide');
					$('#success').modal('show');
					$('#success').find('.modal-body h3').text(data.message);
				}
				else{
					$('#error').modal('show');
					$('#error').find('.modal-body h3').text(data.message);
				}
			}
		});
	}
}
function update_room(id){
	var r_name = $('#update_room-'+id).val();
	if(r_name == ''){
		$('.lblErrRoomname').modal('show');
	}
	else{
		$('.lblErrRoomname').modal('hide');
		$.ajax({
			url:'rooms/update-room',
			type:'post',
			data:  {id:id,r_name:r_name},
			dataType:"json",
			success: function(data) {
				if(data.status == 'ok'){
					$('#update-room-'+id).modal('hide');
					$('#success').modal('show');
					$('#success').find('.modal-body h3').text(data.message);
				}
				else{
					$('#error').modal('show');
					$('#error').find('.modal-body h3').text(data.message);
				}
			}
		});
	}
}
function created_event(){
	var id_user = $('#user_id').val();
	var title = $('#title').val();
	var email = $('#email').val();
	var group = $('#groups-event').val();
	var room = $('#room-event').val();
	var start = $('.start').val();
	var end = $('.end').val();
	var color = $('.pick-a-color').val();
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	//alert(title +' '+ email + ' '+ group + ' '+ room + ' '+ start + ' '+ end + ' '+ color);
	if(title == ''){
		$('.lblErrTitle').modal('show');
	}else{
		$('.lblErrTitle').modal('hide');
	}
	if(email == ''){
		$('.lblErrEmail').modal('show');
		$('.lblErrEmail').find('i').text('Email is required');
	}else{
		$('.lblErrEmail').modal('hide');
		if(!filter.test(email)){
			$('.lblErrEmail').modal('show');
			$('.lblErrEmail').find('i').text('email format error');
		}else{
			$('.lblErrEmail').modal('hide');
			$.ajax({
				url: 'home/created',
				type: 'post',
				dataType:'json',
				data: {
					id_user: id_user,
					title: title,
					email:email,
					group:group,
					room:room,
					start:start,
					end:end,
					color:color},
				success: function(data){
					if(data.status == 'ok'){
						$('#created_event').modal('hide');
						$('#success').modal('show');
						$('#success').find('.modal-body h3').text(data.message);
					}
					else{
						$('#error').modal('show');
						$('#error').find('.modal-body h3').text(data.message);
					}
				}
			});
		}
	}
}
function update_event(){
	var id_event = $('#update_id').val();
	alert('id event: '+id_user);
}
function popup_delete_event(){
	$('#delete_event').modal('show');
	$('#view-event').modal('hide');
}
function back_delete_event(){
	$('#view-event').modal('show');
	$('#delete_event').modal('hide');
}
function delete_event(){
	var id_event = $('#update_id').val();
	$('#delete_event').modal('hide');
		$.ajax({
        url: 'home/delete',
        type: 'post',
        dataType: 'json',
        data:{id: id_event},
        success: function(data){
            if(data.status == 'ok'){
            	$('#success').modal('show');
                $('#success').find('.modal-body h3').text(data.message);
            }
            else{
            	$('#delete_event').modal('hide');
            	$('#error').modal('show');
				$('#error').find('.modal-body h3').text(data.error);
            }
        }
    });
}