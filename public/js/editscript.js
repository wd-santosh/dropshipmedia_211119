$(document).on('click','.btnDelete',function(){
	var fileURL = $(this).attr('title');
	var cid = $(this).attr('id');
	var fd = new FormData();		
	fd.append('id', cid); 	
	fd.append('url', fileURL); 
	var OBJ = $(this);
	$.ajax({	
		url: webUrl + '/deleteFiles',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: "POST",
		data: fd,
		contentType: false, 
        processData: false, 
		dataType: 'json',
		success: function (data) {
			if (data.status == true) {
				$(OBJ).parent().parent('.vidlayers').remove();
				window.location.href=window.location.href;
			} else {
				//alert(data.error);
			}			
		},
		error:function(){			
		}
	});	
});
$(document).on('click','.btnFinal',function(){
	var fileURL = $(this).attr('title');
	var cid = $(this).attr('id');
	var fd = new FormData();		
	fd.append('id', cid); 	
	fd.append('url', fileURL); 
	var OBJ = $(this);
	$.ajax({	
		url: webUrl + '/finalOutput',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: "POST",
		data: fd,
		contentType: false, 
        processData: false, 
		dataType: 'json',
		success: function (data) {
			if (data.status == true) {
				window.location.href=window.location.href;
			} else {
				//alert(data.error);
			}			
		},
		error:function(){			
		}
	});	
});
$(document).on('click', '.MusicSeting', function(){
	var vidsettingId = $(this).attr('c_id');	
	var VideoID = document.location.pathname.split("/").slice(-1)[0];
	var fd = new FormData();
	var files = $('#music')[0].files; 
	if(files.length>0)
	{
		for(var i=0; i<files.length; i++)
		{
			fd.append('file' + i, files[i]); 
		}
	}	
	fd.append('id', vidsettingId); 	
	fd.append('vidid', VideoID); 	
	$(this).parent().find('img').show();
	var OBJ = $(this);
	
	$.ajax({	
		url: webUrl + '/changeMusic',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: "POST",
		data: fd,
		contentType: false, 
        processData: false, 
		dataType: 'json',
		success: function (data) {
			if (data.status == true) {
				window.location.href=window.location.href;
			} else {
				//alert(data.error);
			}
			$(OBJ).parent().find('img').hide();
		},
		error:function(){
			$(OBJ).parent().find('img').hide();
		}
	});	
});
$(document).on('click', '.LogoSeting', function(){
	var vidsettingId = $(this).attr('c_id');
	var sizelog = $(this).parent().siblings('.modal-body').find('#logosize').val();
	var settngLog = $(this).parent().siblings('.modal-body').find('#logoposition').val();
	var VideoID = document.location.pathname.split("/").slice(-1)[0];
	var fd = new FormData();
	var files = $('#logoimg')[0].files; 
	if(files.length>0)
	{
		for(var i=0; i<files.length; i++)
		{
			fd.append('file' + i, files[i]); 
		}
	}	
	fd.append('id', vidsettingId); 
	fd.append('logosize', sizelog); 
	fd.append('logoposition', settngLog); 
	fd.append('vidid', VideoID); 	
	$(this).parent().find('img').show();
	var OBJ = $(this);
	
	$.ajax({	
		url: webUrl + '/modelDetails',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: "POST",
		data: fd,
		contentType: false, 
        processData: false, 
		dataType: 'json',
		success: function (data) {
			if (data.status == true) {
				window.location.href=window.location.href;
			} else {
				//alert(data.error);
			}
			$(OBJ).parent().find('img').hide();
		},
		error:function(){
			$(OBJ).parent().find('img').hide();
		}
	});	
});

$(document).on('click', '.BGSeting', function(){		
	var VideoID = document.location.pathname.split("/").slice(-1)[0];
	var bg = $('#background_color').val();
	var fd = new FormData();	
	fd.append('background_color', bg); 
	fd.append('vidid', VideoID); 	
	$(this).parent().find('img').show();
	var OBJ = $(this);
	
	$.ajax({	
		url: webUrl + '/changeBG',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: "POST",
		data: fd,
		contentType: false, 
        processData: false, 
		dataType: 'json',
		success: function (data) {
			if (data.status == true) {
				window.location.href=window.location.href;
			} else {
				//alert(data.error);
			}
			$(OBJ).parent().find('img').hide();
		},
		error:function(){
			$(OBJ).parent().find('img').hide();
		}
	});	
});

$(document).on('click', '.SettingtTxtModal', function(){
	var textsettingId = $(this).attr('c_id');
	var fontsize = $('#txttsize').val();
	var textcolor = $('#txtclr').val();	
	var textopacity = $('#txtt').val();
	$(this).parent().find('img').show();
	var VideoID = document.location.pathname.split("/").slice(-1)[0];
	var OBJ = $(this);
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: webUrl + '/settingtexts',
		type: "POST",
		data: {id:textsettingId, logofontsize:fontsize, logotextcolor:textcolor, logotextopacity:textopacity,'vidid':VideoID},
		dataType: 'json',
		success: function (data) {
			if (data.status == true) {
			window.location.href=window.location.href;
			} else {
				alert(data.error);
			}
			$(OBJ).parent().find('img').hide();
		},
		error:function(){
			$(OBJ).parent().find('img').hide();
		}
	});
});


$(document).on('click', '.MarkModal', function(){
	var vidsettingId = $(this).attr('c_id');
	var sizelog = $(this).parent().siblings('.modal-body').find('#wsize').val();
	var settngLog = $(this).parent().siblings('.modal-body').find('#wposition').val();
	var VideoID = document.location.pathname.split("/").slice(-1)[0];
	var fd = new FormData();
	var files = $('#wimg')[0].files; 
	if(files.length>0)
	{
		for(var i=0; i<files.length; i++)
		{
			fd.append('file' + i, files[i]); 
		}
	}	
	fd.append('id', vidsettingId); 
	fd.append('logosize', sizelog); 
	fd.append('logoposition', settngLog); 
	fd.append('vidid', VideoID); 	
	$(this).parent().find('img').show();
	var OBJ = $(this);
	
	$.ajax({	
		url: webUrl + '/watermarks',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: "POST",
		data: fd,
		contentType: false, 
        processData: false, 
		dataType: 'json',
		success: function (data) {
			if (data.status == true) {
				window.location.href=window.location.href;
			} else {
				//alert(data.error);
			}
			$(OBJ).parent().find('img').hide();
		},
		error:function(){
			$(OBJ).parent().find('img').hide();
		}
	});
});

$(document).on('click', '.TransitionBtns', function(){
	var transId = $(this).attr('c_id');
	var transvar = $(this).parent().siblings('.modal-body').find('.FindTrans').val();
	$(this).parent().find('img').show();
	var VideoID = document.location.pathname.split("/").slice(-1)[0];
	var OBJ = $(this);
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: webUrl + '/transitionsPage',
		type: "POST",
		data: {id:transId, transitionslog:transvar},
		dataType: 'json',
		success: function (data) {
			if (data.message == 'success') {
				window.location.href=window.location.href;
			} else {
				alert(data.error);
			}
			$(OBJ).parent().find('img').hide();
		},
		error:function(){
			$(OBJ).parent().find('img').hide();
		}
		
	});
});

$(document).on('click', '.LanguageBtn', function(){
	var langId = $(this).attr('c_id');
	var langvar = $(this).parent().siblings('.modal-body').find('.FindLang').val();
	$(this).parent().find('img').show();
	var VideoID = document.location.pathname.split("/").slice(-1)[0];
	var OBJ = $(this);
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: webUrl + '/LanguagePage',
		type: "POST",
		data: {id:langId, Languagelog:langvar},
		dataType: 'json',
		success: function (data) {
			if (data.message == 'success') {
				window.location.href=window.location.href;
			} else {
				alert(data.error);
			}
			$(OBJ).parent().find('img').hide();
		},
		error:function(){
			$(OBJ).parent().find('img').hide();
		}
		
	});
});

$(document).on('click', '.CropBtn', function(){
	var cropId = $(this).attr('c_id');
	var cropvar = $(this).parent().siblings('.modal-body').find('.Findcrop').val();
	var cropxx = $('#cropxpos').val();
	var cropyy = $('#cropypos').val();
	var cropww = $('#cropwidth').val();
	var crophh = $('#cropheight').val();
	$(this).parent().find('img').show();
	var VideoID = document.location.pathname.split("/").slice(-1)[0];
	var OBJ = $(this);
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: webUrl + '/CropPage',
		type: "POST",
		data: {id:cropId, 'cropx':cropxx, 'cropy':cropyy, 'cropw':cropww, 'croph':crophh, 'vidid':VideoID},
		dataType: 'json',
		success: function (data) {
			if (data.status == true) {
				window.location.href=window.location.href;
			} else {
				alert(data.error);
			}
			$(OBJ).parent().find('img').hide();
		},
		error:function(){
			$(OBJ).parent().find('img').hide();
		}
	});
});

$(document).on('click', '.DeleteBtn', function(){
	var deleteId = $(this).attr('c_id');
	var deletevar = $(this).parent().siblings('.modal-body').find('.FindDelete').val();
	$(this).parent().find('img').show();	
	var OBJ = $(this);
	var VideoID = document.location.pathname.split("/").slice(-1)[0];
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: webUrl + '/DeletePage',
		type: "POST",
		data: {id:deleteId, deletelog:deletevar},
		dataType: 'json',
		success: function (data) {
			if (data.message == 'success') {
				window.location.href=window.location.href;
			} else {
				alert(data.error);
			}
			$(OBJ).parent().find('img').hide();
		},
		error:function(){
			$(OBJ).parent().find('img').hide();
		}
	});
});
