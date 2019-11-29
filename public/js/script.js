//Empolyee Orders 
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

$(document).on('click','.addBackColor',function(){
  $('.addBackColor').removeClass('addedBackgroundColor');
  $(this).addClass('addedBackgroundColor');
});


//for assign order
var _orderId;
var _videoURL = "";
$(document).on('click', '.assignOrder', function () {
  var orderId = $(this).attr('id').split('_');
  var empId = $('#logdInEmpId').val();
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: webUrl + '/assidnedOrder',
    type: "POST",
    data: {emp_id: empId, order_id: orderId[1]},
    dataType: 'json',
    success: function (data)
    {
      if (data.message == 'success') {
        $('.assignBtn').find('#order_' + data.orderId).prop('disabled', true);
                //$('.orderrDesc').find('a#orderId_' + data.orderId).attr('href', 'javascript:void(0);').css({'textDecoration': 'none', 'color': 'black'}).html('Assigned ..!!');
                $('.assignBtn').find('#order_' + data.orderId).parent().hide();
                $('.rejectOrProBtn').find('#orderSuccesReject_' + data.orderId).parent().show();
              } else {
                alert('Order has been taken');
              }
            }
          });
});
//approved customer video
$(document).on('click', '.cancelrevise', function () {
  var orderId = $(this).attr('id');
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: webUrl + '/approvedVideo',
    type: "POST",
    data: {order_id: orderId},
    dataType: 'json',
    success: function (data)
    {
      if (data.message == 'success') {
                $('.ApprovedBtns').find('#dispute_' + data.orderId).parent().hide();
              } else {
                alert('Approved Your Video');
              }
            }
          });
});

//for reject order
$(document).on('click', '.rejectOrder', function () {
  var ordr_id = $(this).attr('id').split('_');
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: webUrl + '/rejectOrder',
    type: "POST",
    data: {order_id: ordr_id[1]},
    dataType: 'json',
    success: function (data)
    {
      if (data.message == 'success') {
        $('.assignBtn').find('#order_' + data.order_id).prop('disabled', false);
                //$('.orderrDesc').find('a#orderId_' + data.order_id).attr('href', 'http://video-editing.local/employee/viewOrderDetails/' + data.order_id).css({'textDecoration': 'underline', 'color': '#72afd2'}).html('Click to see the complete details of this order');
                $('.assignBtn').find('#order_' + data.order_id).parent().show();
                $('.rejectOrProBtn').find('#orderSuccesReject_' + data.order_id).parent().hide();
              } else {
                alert('Something went wrong!!');
              }
            }
          });
});


//proceed
$(document).on('click', '.proceedOrder', function () {
  var procedOrderId = $(this).attr('id').split('_');
  $(this).parent().parent().parent().hide();
    //$(this).parent().parent().parent().siblings("#countdownForOrder").show();
    //$(this).parent().parent().parent().siblings("#countdownForOrder").find('#proceed_' + procedOrderId[1]).show();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: webUrl + '/proceedOrder',
      type: "POST",
      data: {procedOrdrId: procedOrderId[1]},
      dataType: 'json',
      success: function (data) {
        if (data.message == 'success') {
          window.location.reload();
        } else {
          alert(data.error);
        }
      }
    });

  });
$(document).on('click','.comment',function(){
  $('#commentPopUp').modal('show');
});

//Rewise Timer
$(document).on('click', '.Rewise', function () {
  var procedOrderId = $(this).attr('id');
  $(this).parent().parent().parent().hide();
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: webUrl + '/rewiseOrder',
    type: "POST",
    data: {procedOrdrId: procedOrderId},
    dataType: 'json',
    success: function (data) {
      if (data.message == 'success') {
        window.location.reload();
      } else {
        alert(data.error);
      }
    }
  });

});
// End REwise Timer
//Customer create videos
$(document).on('click', '.getImgPath', function () {
  var imgId = $(this).attr('id').split('_');
  $('.toGetImgId').find('img').removeClass('selectedImage').css({'border': ' 1px solid rgba(0,0,0,.1)', 'backgroundColor': 'transparent'});
  $(this).addClass('selectedImage').css({'border': '1px solid #377DFF', 'backgroundColor': '#9EDFFF'});

});
//select gender type
$(document).on('click', '.selectType', function () {
  var parentId = $(this).parent().attr('id').split('_');
  if (parentId[1] == 1) {
    $(this).parent().find('.gdr_' + parentId[1]).attr('id', 'male_' + parentId[1]);
    $(this).attr('for', 'male_' + parentId[1]);
  } else if (parentId[1] == 2) {
    $(this).parent().find('.gdr_' + parentId[1]).attr('id', 'female_' + parentId[1]);
    $(this).attr('for', 'female_' + parentId[1]);
  } else if (parentId[1] == 3) {
    $(this).parent().find('.gdr_' + parentId[1]).attr('id', 'both_' + parentId[1]);
    $(this).attr('for', 'both_' + parentId[1]);
  }
});

//select music type
$(document).on('click', '.selectMusicType', function () {
  var selectdType = [];
  var musicId = $(this).parent().attr('id').split('_');
  if (musicId[1] == 1) {
    $(this).parent().find('.music_' + musicId[1]).attr('id', 'chekboxRules_' + musicId[1]);
    $(this).attr('for', 'chekboxRules_' + musicId[1]);
  } else if (musicId[1] == 2) {
    $(this).parent().find('.music_' + musicId[1]).attr('id', 'safeTheInfo_' + musicId[1]);
    $(this).attr('for', 'safeTheInfo_' + musicId[1])
  }
});
$(document).on('click', '.selectDeliverDay', function () {
  var selectdType = [];
  var musicId = $(this).parent().attr('id').split('_');
  if (musicId[1] == 1) {
    $(this).parent().find('.music_' + musicId[1]).attr('id', 'chekboxRules_' + musicId[1]);
    $(this).attr('for', 'chekboxRules_' + musicId[1]);
  } else if (musicId[1] == 2) {
    $(this).parent().find('.music_' + musicId[1]).attr('id', 'safeTheInfo_' + musicId[1]);
    $(this).attr('for', 'safeTheInfo_' + musicId[1])
  }
});

// Validation Create Video Page
$('.selectedGender input[type=checkbox]').on('change',function(){
  $('.selectedGender input[type=checkbox]').prop('checked',false);
  $(this).prop('checked',true);
});
$('.selectedMusic input[type=checkbox]').on('change',function(){
  $('.selectedMusic input[type=checkbox]').prop('checked',false);
  $(this).prop('checked',true);
});
$('.selectedDeliver input[type=checkbox]').on('change',function(){
  $('.selectedDeliver input[type=checkbox]').prop('checked',false);
  $(this).prop('checked',true);
});
function _validateCreateVideo()
{
  var isImagevalidated = false; var isGenderChecked = false; var isMusicChecked = false;
  $('.getImgPath').each(function(){
    if($(this).hasClass('selectedImage'))
    {
      isImagevalidated = true;
    }
  }); 
  if($('.inputProductLink').val() == "")
  {
    toastr["error"]("Please enter website link.");
    return false; 
  }
  $('.selectedGender input[type=checkbox]').each(function(){
    if($(this).is(':checked') == true)
    {
      isGenderChecked = true;
    }
  }); 
  $('.selectedMusic input[type=checkbox]').each(function(){
    if($(this).is(':checked') == true)
    {
      isMusicChecked = true;
    }
  }); 
  return true;
}

$('input[name=thumbnail_select]').on('change',function(){
  if($(this).val() == "Yes" && isThumbname == false){
    isThumbname = true;
    $('.price').text(parseInt($('.price').text()) + 15);
  }
  else if($(this).val() == "No"){
    if(isThumbname == true){
      $('.price').text(parseInt($('.price').text()) - 15);  
    }
    isThumbname = false;
  }
});
$('input[name=delivery_select]').on('change',function(){
  if($(this).val() == "Yes" && isDeliver == false){
    isDeliver = true;
    $('.price').text(parseInt($('.price').text()) + 35);
  }
  else if($(this).val() == "No"){
    if(isDeliver == true){
      $('.price').text(parseInt($('.price').text()) - 35);  
    }
    isDeliver = false;
  }
});

//Next
$(document).on('click', '.Next', function () { 
  if(_validateCreateVideo() == true)
  { 
    var main_product_link = $('#main_product_link').val();
    var main_website_link = $('#main_website_link').val();
    var how_many_orders = $('#how_many_orders').val();
    var isThumbnailSelected = $('input[name=thumbnail_select]:checked').val();
    var isDeliverSelected = $('input[name=delivery_select]:checked').val();
    var terms = $('#terms').is(':checked');
      var pro_link = [];
      $('.product_link_dynamic').each(function(showDiv){
        pro_link.push($(this).val());
      });
      var web_link = [];
      $('.website_link_dynamic').each(function(showDiv){
        web_link.push($(this).val());
      });      
      var _price = parseInt($('.price').text());
      var logo = $('.logo').val();      
      
    if(isLoggedInUser){
       var formData = new FormData();
       var _logo = document.getElementById("uploadedLogo");
       file = _logo.files[0];
       formData.append("logo", file);
       formData.append("main_product_link", main_product_link);
       formData.append("main_website_link", main_website_link);
       formData.append("how_many_orders", how_many_orders);
       formData.append("isThumbnailSelected", isThumbnailSelected);
       formData.append("isDeliverSelected", isDeliverSelected);
       formData.append("pro_link", pro_link);
       formData.append("web_link", web_link);
       formData.append("terms", terms);       
       formData.append("price", _price);
       $.ajax({
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         enctype: "multipart/form-data",
         url: APP_URL + '/storeCustomerData',
         type: "post",
         data: formData ,
         processData: false,
    	 contentType: false,
         dataType: 'json',
         success: function (data) {
             if (data.message == 'success') {  
               $('#frm_paypal').attr('action',APP_URL + "/checkout/payment/"+ data.transaction_id + "/paypal");     
               $('#frm_paypal').submit();
             }else{
               toastr["error"](errorResponse);
             }
         },
         error:function(errorResponse){
            toastr["error"](errorResponse);
         }
       });  
    }else{
      localStorage.setItem('pending_order',true);
      localStorage.setItem('main_product_link',main_product_link);
      localStorage.setItem('main_website_link', main_website_link);
      localStorage.setItem('how_many_orders', how_many_orders);
      localStorage.setItem('terms', terms);
      localStorage.setItem('isThumbnailSelected', isThumbnailSelected);
      localStorage.setItem('isDeliverSelected', isDeliverSelected);
      localStorage.setItem('pro_link', JSON.stringify(pro_link));
      localStorage.setItem('web_link', JSON.stringify(web_link));
      localStorage.setItem('price', _price);
      localStorage.setItem('logo', logo);     
      location.href = APP_URL + '/register';
    }
  }
});
// Check Pending Order
$(document).ready(function(){	
  if(localStorage.getItem('pending_order') !== null){
  	$('.badge-cart').attr('data-count',1);
  }
  if(window.location.pathname.includes('cart') == true){
  	 if(localStorage.getItem('pending_order') !== null){
  	 	var itemHTML = "";
  	 	itemHTML += "<div class='buttons'>";
		itemHTML += "<a href='javascript:void(0);' class='delete_cart'><i class='fa fa-trash '></i></a>";
		itemHTML += "</div>";		
		itemHTML += "<div class='description'>";
		itemHTML += "<span>Product Link: "+localStorage.getItem('main_product_link')+"</span>";  
		itemHTML += "<span>Website Link: "+localStorage.getItem('main_website_link')+"</span>";  
		itemHTML += "</div>";
		itemHTML += "<div class='quantity'> Qty <br/>";
		itemHTML += localStorage.getItem('how_many_orders');
		itemHTML += "</div>";
		itemHTML += "<div class='total-price'>Price <br/>$"+localStorage.getItem('price')+"</div>";
		itemHTML += "<div class='total-price'><a href='"+APP_URL + "/create-video" +"'>Process</div>";
		if($('.item').find('.empty_cart').length>0){
			$('.item').find('.empty_cart').remove();	
		}
		$('.item').html(itemHTML);
  	}
  }
  else if(window.location.pathname.includes('create-video') == true){
  	 if(localStorage.getItem('pending_order') !== null){
	    $('#main_product_link').val(localStorage.getItem('main_product_link'));
	    $('#main_website_link').val(localStorage.getItem('main_website_link'));
	    $('#how_many_orders').val(localStorage.getItem('how_many_orders'));
	    if(localStorage.getItem('isThumbnailSelected') == "Yes"){
	      $('#thumbnail_selectyes').prop('checked',true);
	      $('.price').text(parseInt($('.price').text()) + 15);
	    }
	    else if(localStorage.getItem('isThumbnailSelected') == "No"){
	      $('#thumbnail_selectno').prop('checked',true);
	    }
	    if(localStorage.getItem('isDeliverSelected') == "Yes"){
	      $('#delivery_selectyes').prop('checked',true);
	      $('.price').text(parseInt($('.price').text()) + 35);
	    }
	    else if(localStorage.getItem('isDeliverSelected') == "No"){
	      $('#delivery_selectno').prop('checked',true);
	    }
	    if(localStorage.getItem('terms') == true){
	      $('#terms').prop('checked',true);
	    }
	    showDiv($('#how_many_orders')); 
	    var _productLinks = JSON.parse(localStorage.getItem('pro_link')); 
	    var _webLinks = JSON.parse(localStorage.getItem('web_link')); 
	    var _counter = 0;
	    $('.dynamic_plink').each(function(){
	      $(this).find('input[type="text"]').val(_productLinks[_counter]);
	      _counter++;
	    });   
	    var _counter = 0;
	    $('.dynamic_wlink').each(function(){
	      $(this).find('input[type="text"]').val(_webLinks[_counter]);
	      _counter++;
	    });   
	  }	
  }
});
$(document).on('click','.delete_cart',function(){
	$('.shopping-cart .item').html("");
	$('.shopping-cart .item').html("<div class='empty_cart'>No Item in cart</div>");
	localStorage.clear();
});
/*  Counter Start */
$(document).ready(function(){
  $('.counter').each(function(){
    var countDownDate = $(this).attr("title");
    var uploadVideo = $(this).attr('uploadVideo');
    
    var obj = $(this);
    // Update the count down every 1 second
   clock(obj,countDownDate,uploadVideo);  

 });  
});

function clock(obje,countDownDate,uploadVideo)
{
  var x = setInterval(function() {
      // Get todays date and time
      var now = new Date().getTime();   
      // Find the distance between now an the count down date
      
      var distance = countDownDate - now;  

      if(distance < 0)   
      {
           // Take action if date overed
           if (uploadVideo != '' && uploadVideo != null) {
            var st = "<div class='tm'><label class='lbld' style='padding-left:8px'>D</label><b class='label-b'>:</b><label class='lblh' style='padding-left:8px'>O</label><b class='label-b'>:</b><label class='lblm' style='padding-left:8px'>N</label><b class='label-b'>:</b><label class='lbls' style='padding-left:8px'>E</label></div>";
            $(obje).html(st);
          } else {
            var st = "<div class='tm'><label class='lbld' style='padding-left:2px'>##</label><b class='label-b'>:</b><label class='lblh'>LA</label><b class='label-b'>:</b><label class='lblm'>TE</label><b class='label-b'>:</b><label class='lbls'>##</label></div>";
            $(obje).html(st);
          }
          clearInterval(x);
          // Take action if date overed
         }
         else
         {
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        var st = "<div class='tm'><label class='lbld'>"+ days +"</label><b class='label-b'>:</b><label class='lblh'>" + hours + "</label><b class='label-b'>:</b><label class='lblm'>"+ minutes + "</label><b class='label-b'>:</b><label class='lbls'>" + seconds + "</label></div>";
        $(obje).html(st);   
      }
    }, 1000);
}
/*  Counter End */
//customer select video
$(document).on('click','.selectdVideo',function(){
  $('.orderVideoByEmp').removeAttr('style');
  $('.orderVideoByEmp').each(function(){
    if($(this).hasClass('active') == true)
    {
      $(this).css({'border': '6px solid #6DE3FF', 'backgroundColor': '#6DE3FF'});
    }
  });
});
//next to video variation
$(document).on('click', '.orderVideoByEmp', function () {
  var videoId = $(this).attr('id').split('_');
  $('.orderVideoByEmp').find('.getVideoId').removeClass('selectedVideo').css({'border': ' 1px solid rgba(0,0,0,.1)', 'backgroundColor': 'transparent'});
  $('.orderVideoByEmp').find('.video-fluid').find('source#link_' + videoId[1]).addClass('selectedVideo');
  $('.orderVideoByEmp').removeAttr('style');
  $(this).css({'border': '6px solid #6DE3FF', 'backgroundColor': '#6DE3FF'});
});
var _thumVideoIds;
//select thumbnail video
$(document).on('click','.videoSelction',function(){
  $('.gallery div iframe').removeClass('selectedFrame');
  $('.gallery div .videoSelction').html('Select');  
  $(this).parent('div').find('iframe').addClass('selectedFrame');
  $(this).html('Selected')
  _videoURL = $(this).attr('title');
  var parentVideoId = $(this).parent().attr('id').split('_');
  _thumVideoIds = parentVideoId[1];

});
//validation for select video
function _validateSelectVideo()
{
  var videoValidate = false; var thumbVedioValidate = true; 
  $('.getVideoId').each(function () {
    if ($(this).hasClass('selectedVideo')) {
      videoValidate =  true;
    }
  });
  if(videoValidate == false)
  {
    toastr["error"]("Please select video");
    return false; 
  }
  if( $("#uploadedLogo").val() == "")
  {
    toastr["error"]("Please select a logo");
    return false;   
  }
  var file = document.querySelector("#uploadedLogo");
  if ( /\.(jpe?g|png|gif)$/i.test(file.files[0].name) === false ) {  
    toastr["error"]("Please select valid image");
    return false;
  }
  if( $("#uploadedMusic").val() == "")
  {
    toastr["error"]("Please select a music");
    return false; 
  }
  var file = document.querySelector("#uploadedMusic");
  if ( /\.(?:wav|mp3)$/i.test(file.files[0].name) === false ) {  
    toastr["error"]("Please select valid music");
    return false;
  }
}

//save select video data
$(document).on('click', '.saveForm2Data', function () {
  if(_validateSelectVideo() == true)
  {
    var selectdVideo;
    var music_data = $("#uploadedMusic").prop("files")[0];
    var logo_data = $("#uploadedLogo").prop("files")[0];
    var custOrderIdForMusic = $('#cusOrderId').val();
    var selectVideoByCust = $('.orderVideoByEmp').each(function () {
      if ($(this).find('.getVideoId').hasClass('selectedVideo')) {
        var selectdVideoId = $(this).attr('id').split('_');
        selectdVideo = selectdVideoId[1];
      }
    });
    var form_data = new FormData();
    form_data.append("music", music_data);
    form_data.append("logo", logo_data);
    form_data.append("_orderIdForMusic", custOrderIdForMusic);
    form_data.append("selectedVdeo", selectdVideo);
    form_data.append("_thumbVideoId", _thumVideoIds);
  
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      enctype: "multipart/form-data",
      url: webUrl + '/storeSelectVideoData',
      type: "post",
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
      data: form_data,
      success: function (data) {
        if (data.message == 'success') {
          window.location.href = webUrl + '/video-variations/' + data.cus_id;
        } else {
          alert(data.error);
        }
      }
    });
  }
});

//back to create video
$(document).on('click', '#backToCreateVideoPage', function () {
  var cusOrderId = $(this).parent().parent().parent().parent().parent().parent().find("#cusOrderId").val();
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    enctype: 'multipart/form-data',
    url: webUrl + '/bakToCreateVideo',
    type: "post",
    data: {cusOrderId: cusOrderId},
    dataType: 'json',
    success: function (data) {
      if (data.message == 'success') {
        window.location.href = webUrl + '/create-video/' + data.cusSelectdOrder.id;
      } else {
        alert(data.error);
      }
    }
  });
});

// back 
//subscribePlanPrice
$(document).on('click', '.subscribePlanPrice', function () {
  var planPrice = $(this).text();
  var price = planPrice.substring(8, 15).trim();
  var cusOrderId = $(this).attr('orderId');
  var transactionId = $('#transactionId').val();
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: webUrl + '/storeSubscribePlan',
    type: "post",
    data: {sub_planPrice: price, cus_orderId: cusOrderId, transaction_id: transactionId},
    datatype: 'json',
    success: function (data)
    {
      if (data.message == 'success')
      {
        $('#frm_paypal').submit();
      } else
      {
        console.log(data.error);
      }
    }
  });
});
//end subscribePlanPrice
//unsubscribePlanPrice
$(document).on('click', '.unsubscribePlanPrice', function () {
  var planPrice = $(this).text();
  var price = planPrice.substring(8, 15).trim();
  var cusOrderId = $(this).attr('orderId');
  var transactionId = $('#transactionId').val();
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: webUrl + '/storeUnSubscribePlan',
    type: "post",
    data: {unsub_planPrice: price, cus_orderId: cusOrderId, _transId: transactionId},
    datatype: 'json',
    success: function (data)
    {
      if (data.message == 'success')
      {
        $('#frm_paypal_recurring').submit();

      } else
      {
        console.log(data.error);
      }
    }
  });
});
//customer dashboard start
$(document).on('click', '.approveEdit', function()
{
 var approveEditId = $(this).attr('id').split('_');
 $(this).hide();   
 $(this).siblings('#approveShow_'+approveEditId[1]).show();
});

//dispute Modal
$(document).on('click','.openDisputeModal',function(){
  //alert('ffffff');
 $('#addComments').modal('show');
 var order_id = $(this).attr('id').split('_');
 $('#orderIdForCommentVideo').val(order_id[1]);

});
$(document).on('click','#addCommentsForVideo',function(){
  var change_scroll = $(this).parents('form').find('#change_scroll').val();
  var change_thumb = $(this).parents('form').find('#change_thumb').val();
  var orderIdForComent = $(this).parents('form').find('input[type="hidden"]').val();
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: webUrl + '/addCusComm',
    type: "post",
    data: { change_scroll : change_scroll , change_thumb : change_thumb, orderIdCom : orderIdForComent },
    datatype: 'json',
    success: function (data)
    {
      if (data.message == 'success')
      {
       $('#txtAreaValue').val('');
       $('#addComments').modal('hide');
       $('.approveEdit').show();
       $('#approveShow_'+ data.orderIdForComment).hide();
       alert('Rewise Succesfully Send');

     } else {               
      console.log(data.error);
    }
  }
});
});
$(function () {
  var selectedClass = "";
  $(".filter").click(function () {
    selectedClass = $(this).attr("data-rel");
    $("#gallery").fadeTo(100, 0.1);
    $("#gallery div").not("." + selectedClass).fadeOut().removeClass('animation');
    setTimeout(function () {
      $("." + selectedClass).fadeIn().addClass('animation');
      $("#gallery").fadeTo(300, 1);
    }, 300);
  }); 
});
// Validation Of Admin Add Image Layout 
$(document).on('click', '.ErrorMessg', function(){  
    var ImgSize = $(this).parent().siblings('.modal-body').find('.ImgSizs').val();
    var ImgDescription = $(this).parent().siblings('.modal-body').find('.ImgDescs').val();
    var ImageUploaded = $(this).parent().siblings('.modal-body').find('.ImageShowErr').val();
    if(ImgSize == ""){
      $('#ShowImageSizeErrorMsg').css('color','red').html('Please Enter Image Size!');
      return false;
    }
    if(ImgDescription == ""){
      $('#DescriptionforErrorMsg').css('color','red').html('Please Enter Description!');
      return false;
    }
    if(ImageUploaded == ""){
      $('#ImageErrorMessage').css('color','red').html('Please Select Image!');
      return false;
    }
  });
$(document).on('click', '.create-accountes', function(){
  var ErrwRegMsgs = document.getElementById("ErrRegMsgs").value;
  if(ErrwRegMsgs == null || ErrwRegMsgs == ""){
    document.getElementById("SpnErrId").innerHTML="Enter Your Email";return false;
  }
});

$("#ErrRegMsgs").click(function(){
  $(".EmailErrsMsg").hide();
});
$("#ErrPassMsg").click(function(){
  $(".PassErrMsgs").hide();
});
$(document).on('click','.comment',function(){
    $('#commentPopUp').modal('show');
  });
//Rewise Timer
$(document).on('click', '.Rewise', function () {
  var procedOrderId = $(this).attr('id');
  $(this).parent().parent().parent().hide();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: webUrl + '/rewiseOrder',
      type: "POST",
      data: {procedOrdrId: procedOrderId},
      dataType: 'json',
      success: function (data) {
        if (data.message == 'success') {
          window.location.reload();
        } else {
          alert(data.error);
        }
      }
    });

  });

function showDiv(select){
  if($(select).val() > 0){
    var hTML = "";
    var _additionalCharges = parseInt($(select).val()) * 15;
    if(additionalCharges == 0){
      additionalCharges = _additionalCharges;
     $('.price').text(parseInt($('.price').text()) + _additionalCharges);
  }
  else{
    $('.price').text(parseInt($('.price').text()) - additionalCharges);
    additionalCharges = _additionalCharges;
    $('.price').text(parseInt($('.price').text()) + _additionalCharges);
  }
    if($('.dynamic_plink').length > 0){
    $('.dynamic_plink').remove(); 
    $('.dynamic_hr').remove();      
  }
  if($('.dynamic_wlink').length > 0){
    $('.dynamic_wlink').remove(); 
  }
    for(var i=0; i<$(select).val(); i++){
      hTML +="<section class='dynamic_plink'>";
      hTML +="<div class='container m-50'>";
      hTML +="<div class='row'>";
      hTML +="<div class='col-lg-12 col-md-1 mb-md-0 create-pro'>";
      hTML +="<h4 class='text-left' style='display:-webkit-inline-box;'><b>Product Link :</b></h4>";       
      hTML +="<input type='text' placeholder='http://' class='form-check-input filled-in inputProductLink product_link_dynamic' id='product_link"+ i +"' name='product_link"+ i +"' style='position: relative;margin-left: 0.5rem;width:40%;'>";
      hTML +="<label class='form-check-label'></label>";
      hTML +="</div> ";
      hTML +="</div>";
      hTML +="</div>";  
      hTML +="</section>";
      hTML +="<section class='dynamic_wlink'>";
      hTML +="<div class='container m-50' id='websiteLink'>";
      hTML +="<div class='row'>";
      hTML +="<div class='col-lg-12 col-md-1 mb-md-0 create-pro'>";
      hTML +="<h4 class='text-left' style='display:-webkit-inline-box;'><b>Website Link :</b></h4>";    
      hTML +="<input type='text' name='"+ i +"' placeholder='http://'  class='form-check-input filled-in website_link_dynamic' id='website_link"+ i +"' style='position: relative;margin-left: 0.5rem;width:40%;'>";
      hTML +="<label class='form-check-label'></label>";
      hTML +="</div>"; 
      hTML +="</div>";
      hTML +="</div>";
      hTML +="</section><hr class='dynamic_hr' style='width:83%;border:1px solid #cecece;'>";
    }
    $(hTML).insertAfter('.termsandconditions');
  }
} 



// End REwise Timer