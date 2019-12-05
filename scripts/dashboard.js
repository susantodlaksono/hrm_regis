$(function () {
   _vacancy_id = null;

	'use strict';

 	window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
     	var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
       	form.addEventListener('submit', function(event) {
           	if (form.checkValidity() === false) {
            	event.preventDefault();
                     event.stopPropagation();	
           	}
           	form.classList.add('was-validated');
       	}, false);
   	});
  	}, false);

  	$(this).on('submit', '#form-upload-cv', function(e){
      var form = $(this);
      $(this).ajaxSubmit({
         url  : site_url +'doc-upload',
         type : "POST",
         dataType : "JSON",
         data : {
         	"csrf_token_carrier2019" : _csrf_hash,
         	type : 1
         },
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown);
            loading_form(form, 'hide', 'UPLOAD');
         },
         beforeSend: function (xhr) {
            loading_form(form, 'show', spinnerbutton);
         },
         success: function(r) {
         	set_csrf(r._token_hash);
         	if(r.success){
         		form.resetForm();
         		$(this).get_doc({
						type : 1,
						panel : '#card-cv'
					});
         		toastr.success(r.msg);
         	}else{
         		toastr.error(r.msg);
         	}
         	loading_form(form, 'hide', 'UPLOAD');
         },
      });
      e.preventDefault();
   });

   $(this).on('submit', '#form-upload-photo', function(e){
      var form = $(this);
      $(this).ajaxSubmit({
         url  : site_url +'doc-upload',
         type : "POST",
         dataType : "JSON",
         data : {
         	"csrf_token_carrier2019" : _csrf_hash,
         	type : 2
         },
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown);
            loading_form(form, 'hide', 'UPLOAD');
         },
         beforeSend: function (xhr) {
            loading_form(form, 'show', spinnerbutton);
         },
         success: function(r) {
         	set_csrf(r._token_hash);
         	if(r.success){
         		form.resetForm();
         		$(this).get_doc({
						type : 2,
						panel : '#card-photo'
					});
         		toastr.success(r.msg);
         	}else{
         		toastr.error(r.msg);
         	}
         	loading_form(form, 'hide', 'UPLOAD');
         },
      });
      e.preventDefault();
   });

  	$.fn.get_doc = function(params){
  		var p = $.extend({
  			panel : null,
  			type : null,
		}, params);
  		var $panel = $(p.panel);

  		ajaxManager.addReq({
			type : "GET",
			url : site_url + 'get-doc',
			data : {
				type : p.type
			},
         dataType : "JSON",
       	beforeSend: function (xhr) {
            loading_card($panel, 'show');
         },
         error: function (jqXHR, status, errorThrown) {
         	error_handle(jqXHR, status, errorThrown); 
         },
       	success : function(r){
       		var t = '';
       		if(r.success){
               if(r.doc_type == 1){
           			t += '<a href="'+site_url+'doc-download-'+r.id+'">';
           			t += '<div class="box bg-info text-center" data-toggle="tooltip" data-original-title="'+r.original_file_name+'">';
   	               t += '<h3 class="text-white">'+r.file_extension+'</h3>';
   	               t += '<p class="text-white mb-0">File</p>';
   	        		t += '</div>';
   	        		t += '</a>';
               }else{
                  t += '<a data-fancybox="" href="'+base_url+'files/applicant/photos/'+r.file_name+'">';
                     t += '<img src="'+base_url+'files/applicant/photos/'+r.file_name+'" width="77" height="77">';
                  t += '</a>';
               }
       		}else{
					t += '<div class="box bg-theme-dark text-center">';
	               t += '<h3 class="text-white"><i class="fas fa-exclamation-triangle"></i></h3>';
	               t += '<p class="text-white mb-0">None</p>';
	        		t += '</div>';
       		}
       		$panel.find('.sect-data').html(t);
            $('[data-toggle="tooltip"]').tooltip();
       		loading_card($panel, 'hide');
    		}
 		});
	};

   $.fn.get_vacancy = function(){
      var $panel = $('#card-lowongan');
      ajaxManager.addReq({
         type : "GET",
         url : site_url + 'vacancy-data',
         dataType : "JSON",
         beforeSend: function (xhr) {
            loading_card($panel, 'show');
         },
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown); 
         },
         success : function(r){
            var t = '';
            if(r.success){
               $.each(r.result, function(k,v){
                  if(v.id == r.temp_employee.vacancy_id){
                     t += '<button class="btn btn-info m-2 btn-detail-vacancy" type="button" data-id="'+v.id+'">'+v.name+'</button>';
                  }else{
                     t += '<button class="btn btn-dark m-2 btn-detail-vacancy" type="button" data-id="'+v.id+'">'+v.name+'</button>';
                  }  
               });
            }else{
               t += 'No result';
            }
            $panel.find('.sect-data').html(t);
            loading_card($panel, 'hide');
         }
      });
   };

   $(this).on('click', '.btn-detail-vacancy', function(e){
      e.preventDefault();
      var id = $(this).data('id');
      ajaxManager.addReq({
         type : "GET",
         url : site_url + 'vacancy-detail',
         data : {
            id : id
         },
         dataType : "JSON",
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown); 
         },
         success : function(r){
            var t = '';
            if(r.vacancy){
               $('#cont-detail-vacancy').find('.vacancy-name').html(r.vacancy.name);
               if(r.vacancy.description){
                  $('#cont-detail-vacancy').find('.sect-data').html(r.vacancy.description);
               }else{
                  $('#cont-detail-vacancy').find('.sect-data').html('<span class="text-danger text-center">Deskripsi tidak ada</span>');
               }
            }            
            _vacancy_id = r.vacancy.id;
            $('#modal-detail-vacancy').modal('show');
         }
      });
   });
	
   $(this).on('click', '.btn-apply-vacancy', function(e){
      e.preventDefault();
      var id = _vacancy_id;
      ajaxManager.addReq({
         type : "POST",
         url : site_url + 'vacancy-register',
         data : {
            id : id,
            "csrf_token_carrier2019" : _csrf_hash
         },
         dataType : "JSON",
         beforeSend: function (xhr) {
            $('.btn-apply-vacancy').addClass('disabled');
            $('.btn-apply-vacancy').html(spinnerbutton);
         },
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown); 
            $('.btn-apply-vacancy').removeClass('disabled');
            $('.btn-apply-vacancy').html('APPLY');
         },
         success : function(r){
            set_csrf(r._token_hash);
            if(r.success){
               $(this).get_vacancy();
               toastr.success(r.msg);
               $('#modal-detail-vacancy').modal('hide');
            }else{
               toastr.error(r.msg);
            }
            $('.btn-apply-vacancy').removeClass('disabled');
            $('.btn-apply-vacancy').html('APPLY');
         }
      });
   });

   $(this).get_doc({
		type : 1,
		panel : '#card-cv'
	});

   $(this).get_vacancy();

	$(this).get_doc({
		type : 2,
		panel : '#card-photo'
	});

});