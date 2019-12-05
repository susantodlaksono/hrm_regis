$(function () {
	
	key_family = 0;
   key_education = 0;
   key_education_non = 0;
   key_language = 0;
   key_job_history = 0;
   key_social_activity = 0;
   key_accident_history = 0;
   key_other_contact = 0;

	count_key_family = 0;
   count_key_education = 0;
   count_key_education_non = 0;
   count_key_language = 0;
   count_key_job_history = 0;
   count_key_social_activity = 0;
   count_key_accident_history = 0;
   count_key_other_contact = 0;

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

	var key_basic_form = {
		id : null,
		temp_employee_fullname_before : null,
		temp_employee_email_before : null,
		temp_employee_phone_number_before : null,
	}

	$.fn.get_basic = function(){
		var form = $('#form-basic-employee');
		ajaxManager.addReq({
			type : "GET",
			url : site_url + 'get-basic',
         dataType : "JSON",
         error: function (jqXHR, status, errorThrown) {
         	error_handle(jqXHR, status, errorThrown); 
         },
       	success : function(r){
       		set_csrf(r._token_hash);

       		if(r.temp_employee){
    				$.extend(key_basic_form, {
    					id : r.temp_employee.id,
    					temp_employee_fullname_before : r.temp_employee.fullname,
    					temp_employee_email_before : r.temp_employee.email,
    					temp_employee_phone_number_before : r.temp_employee.phone_number,
    				});

    				form.find('input[name="temp_employee_fullname"]').val(r.temp_employee.fullname);
    				form.find('input[name="temp_employee_email"]').val(r.temp_employee.email);
    				form.find('input[name="temp_employee_phone_number"]').val(r.temp_employee.phone_number);
    				form.find('input[name="temp_employee_nickname"]').val(r.temp_employee.nickname);
    				form.find('select[name="temp_employee_blood_group"]').val(r.temp_employee.blood_group);
    				form.find('input[name="temp_employee_birth_place"]').val(r.temp_employee.birth_place);
               if(r.temp_employee.birth_date){
                  form.find('input[name="temp_employee_birth_date"]').val(r.temp_employee.birth_date);
			         form.find('.dp[data-source="temp_employee_birth_date"]').val(moment(r.temp_employee.birth_date).format('DD/MMM/YYYY'));
               }
    				form.find('select[name="temp_employee_gender"]').val(r.temp_employee.gender);
    				form.find('select[name="temp_employee_religion"]').val(r.temp_employee.religion);
    				form.find('select[name="temp_employee_married_status"]').val(r.temp_employee.married_status);
    				form.find('input[name="temp_employee_weight"]').val(r.temp_employee.weight);
    				form.find('input[name="temp_employee_height"]').val(r.temp_employee.height);
    				form.find('input[name="temp_employee_citizenship"]').val(r.temp_employee.citizenship);
    				form.find('input[name="temp_employee_hobby"]').val(r.temp_employee.hobby);
       		}

       		if(r.temp_employee_card){
    				form.find('input[name="temp_employee_card_number_ktp"]').val(r.temp_employee_card.number_ktp);
    				form.find('input[name="temp_employee_card_number_sim_a"]').val(r.temp_employee_card.number_sim_a);
    				form.find('input[name="temp_employee_card_number_sim_c"]').val(r.temp_employee_card.number_sim_c);
    				form.find('input[name="temp_employee_card_number_sim_b1"]').val(r.temp_employee_card.number_sim_b1);
    				form.find('input[name="temp_employee_card_number_sim_b2"]').val(r.temp_employee_card.number_sim_b2);
    				form.find('input[name="temp_employee_card_alamat"]').val(r.temp_employee_card.alamat);
    				form.find('input[name="temp_employee_card_kota"]').val(r.temp_employee_card.kota);
    				form.find('input[name="temp_employee_card_provinsi"]').val(r.temp_employee_card.provinsi);
    				form.find('input[name="temp_employee_card_kode_pos"]').val(r.temp_employee_card.kode_pos);
    				form.find('input[name="temp_employee_card_rt"]').val(r.temp_employee_card.rt);
    				form.find('input[name="temp_employee_card_rw"]').val(r.temp_employee_card.rw);
    				form.find('input[name="temp_employee_card_kecamatan"]').val(r.temp_employee_card.kecamatan);
    				form.find('input[name="temp_employee_card_kelurahan"]').val(r.temp_employee_card.kelurahan);
    				form.find('select[name="temp_employee_card_residence"]').val(r.temp_employee_card.residence);
    				form.find('select[name="temp_employee_card_transport_status"]').val(r.temp_employee_card.transport_status);
    			}

    			if(r.temp_employee_place){
    				form.find('input[name="temp_employee_place_alamat"]').val(r.temp_employee_place.alamat);
    				form.find('input[name="temp_employee_place_kota"]').val(r.temp_employee_place.kota);
    				form.find('input[name="temp_employee_place_provinsi"]').val(r.temp_employee_place.provinsi);
    				form.find('input[name="temp_employee_place_rt"]').val(r.temp_employee_place.rt);
    				form.find('input[name="temp_employee_place_rw"]').val(r.temp_employee_place.rw);
    				form.find('input[name="temp_employee_place_kode_pos"]').val(r.temp_employee_place.kode_pos);
    				form.find('input[name="temp_employee_place_kecamatan"]').val(r.temp_employee_place.kecamatan);
    				form.find('input[name="temp_employee_place_kelurahan"]').val(r.temp_employee_place.kelurahan);
 				}

     		  $('.dp').daterangepicker({
			      autoUpdateInput: false,
			      locale: {
			         format: 'DD/MMM/YYYY'
			      },
			      singleDatePicker: true,
			      showDropdowns: true
			   });

			   $('.dp').on('apply.daterangepicker', function(ev, picker) {
			      var source = $(this).data('source');
			      $(this).val(picker.startDate.format('DD/MMM/YYYY'));
			      $('input[name="'+source+'"]').val(picker.startDate.format('YYYY-MM-DD'));
			   });
    		}
		});
	}

	$(this).get_basic();

	$(this).on('submit', '#form-basic-employee', function(e){
      var form = $(this);
      $(this).ajaxSubmit({
         url  : site_url +'basic',
         type : "POST",
         dataType : "JSON",
         data : {
         	"csrf_token_carrier2019" : _csrf_hash,
         	key_basic_form : key_basic_form 
         },
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown);
            loading_form(form, 'hide', 'PERBAHARUI');
         },
         beforeSend: function (xhr) {
            loading_form(form, 'show', spinnerbutton);
         },
         success: function(r) {
         	set_csrf(r._token_hash);
         	if(r.success){
         		toastr.success(r.msg);
         		$(this).get_basic();
         	}else{
         		toastr.error(r.msg);
         	}
         	loading_form(form, 'hide', 'PERBAHARUI');
         },
      });
      e.preventDefault();
   });

   $(this).on('submit', '#form-family-employee', function(e){
      var form = $(this);
      $(this).ajaxSubmit({
         url  : site_url +'family',
         type : "POST",
         dataType : "JSON",
         data : {
         	"csrf_token_carrier2019" : _csrf_hash,
         	employee_id : key_basic_form.id
         },
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown);
            loading_form(form, 'hide', 'PERBAHARUI');
         },
         beforeSend: function (xhr) {
            loading_form(form, 'show', spinnerbutton);
         },
         success: function(r) {
         	set_csrf(r._token_hash);
         	if(r.success){
         		toastr.success(r.msg);
         	}else{
         		toastr.error(r.msg);
         	}
         	loading_form(form, 'hide', 'PERBAHARUI');
         },
      });
      e.preventDefault();
   });

   $(this).on('submit', '#form-education-employee', function(e){
      var form = $(this);
      $(this).ajaxSubmit({
         url  : site_url +'education',
         type : "POST",
         dataType : "JSON",
         data : {
            "csrf_token_carrier2019" : _csrf_hash,
            employee_id : key_basic_form.id
         },
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown);
            loading_form(form, 'hide', 'PERBAHARUI');
         },
         beforeSend: function (xhr) {
            loading_form(form, 'show', spinnerbutton);
         },
         success: function(r) {
            set_csrf(r._token_hash);
            if(r.success){
               toastr.success(r.msg);
            }else{
               toastr.error(r.msg);
            }
            loading_form(form, 'hide', 'PERBAHARUI');
         },
      });
      e.preventDefault();
   });

   $(this).on('submit', '#form-education-non-employee', function(e){
      var form = $(this);
      $(this).ajaxSubmit({
         url  : site_url +'education-non',
         type : "POST",
         dataType : "JSON",
         data : {
            "csrf_token_carrier2019" : _csrf_hash,
            employee_id : key_basic_form.id
         },
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown);
            loading_form(form, 'hide', 'PERBAHARUI');
         },
         beforeSend: function (xhr) {
            loading_form(form, 'show', spinnerbutton);
         },
         success: function(r) {
            set_csrf(r._token_hash);
            if(r.success){
               toastr.success(r.msg);
            }else{
               toastr.error(r.msg);
            }
            loading_form(form, 'hide', 'PERBAHARUI');
         },
      });
      e.preventDefault();
   });

   $(this).on('submit', '#form-language-employee', function(e){
      var form = $(this);
      $(this).ajaxSubmit({
         url  : site_url +'language',
         type : "POST",
         dataType : "JSON",
         data : {
            "csrf_token_carrier2019" : _csrf_hash,
            employee_id : key_basic_form.id
         },
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown);
            loading_form(form, 'hide', 'PERBAHARUI');
         },
         beforeSend: function (xhr) {
            loading_form(form, 'show', spinnerbutton);
         },
         success: function(r) {
            set_csrf(r._token_hash);
            if(r.success){
               toastr.success(r.msg);
            }else{
               toastr.error(r.msg);
            }
            loading_form(form, 'hide', 'PERBAHARUI');
         },
      });
      e.preventDefault();
   });

   $(this).on('submit', '#form-job-history-employee', function(e){
      var form = $(this);
      $(this).ajaxSubmit({
         url  : site_url +'job-history',
         type : "POST",
         dataType : "JSON",
         data : {
            "csrf_token_carrier2019" : _csrf_hash,
            employee_id : key_basic_form.id
         },
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown);
            loading_form(form, 'hide', 'PERBAHARUI');
         },
         beforeSend: function (xhr) {
            loading_form(form, 'show', spinnerbutton);
         },
         success: function(r) {
            set_csrf(r._token_hash);
            if(r.success){
               toastr.success(r.msg);
            }else{
               toastr.error(r.msg);
            }
            loading_form(form, 'hide', 'PERBAHARUI');
         },
      });
      e.preventDefault();
   });

   $(this).on('submit', '#form-social-activity-employee', function(e){
      var form = $(this);
      $(this).ajaxSubmit({
         url  : site_url +'social-activity',
         type : "POST",
         dataType : "JSON",
         data : {
            "csrf_token_carrier2019" : _csrf_hash,
            employee_id : key_basic_form.id
         },
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown);
            loading_form(form, 'hide', 'PERBAHARUI');
         },
         beforeSend: function (xhr) {
            loading_form(form, 'show', spinnerbutton);
         },
         success: function(r) {
            set_csrf(r._token_hash);
            if(r.success){
               toastr.success(r.msg);
            }else{
               toastr.error(r.msg);
            }
            loading_form(form, 'hide', 'PERBAHARUI');
         },
      });
      e.preventDefault();
   });

   $(this).on('submit', '#form-accident-history-employee', function(e){
      var form = $(this);
      $(this).ajaxSubmit({
         url  : site_url +'accident-history',
         type : "POST",
         dataType : "JSON",
         data : {
            "csrf_token_carrier2019" : _csrf_hash,
            employee_id : key_basic_form.id
         },
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown);
            loading_form(form, 'hide', 'PERBAHARUI');
         },
         beforeSend: function (xhr) {
            loading_form(form, 'show', spinnerbutton);
         },
         success: function(r) {
            set_csrf(r._token_hash);
            if(r.success){
               toastr.success(r.msg);
            }else{
               toastr.error(r.msg);
            }
            loading_form(form, 'hide', 'PERBAHARUI');
         },
      });
      e.preventDefault();
   });

   $(this).on('submit', '#form-faq-answers-employee', function(e){
      var form = $(this);
      $(this).ajaxSubmit({
         url  : site_url +'faq-answers',
         type : "POST",
         dataType : "JSON",
         data : {
            "csrf_token_carrier2019" : _csrf_hash,
            employee_id : key_basic_form.id
         },
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown);
            loading_form(form, 'hide', 'PERBAHARUI');
         },
         beforeSend: function (xhr) {
            loading_form(form, 'show', spinnerbutton);
         },
         success: function(r) {
            set_csrf(r._token_hash);
            if(r.success){
               toastr.success(r.msg);
            }else{
               toastr.error(r.msg);
            }
            loading_form(form, 'hide', 'PERBAHARUI');
         },
      });
      e.preventDefault();
   });

	$('.tab-family').on('click', function (e) {
		e.preventDefault();
		var form = $('#form-family-employee');

		ajaxManager.addReq({
			type : "GET",
			url : site_url + 'get-family',
         dataType : "JSON",
         error: function (jqXHR, status, errorThrown) {
         	error_handle(jqXHR, status, errorThrown); 
         },
       	success : function(r){
       		set_csrf(r._token_hash);
       		if(r.temp_employee_family){
       			count_key_family = r.temp_employee_family.length;
               t = '';
               i = 0;
               $.each(r.temp_employee_family, function(k,v){
               	i++;
               	t += '<div class="col-md-6 mb-3 form-group-attached" style="border: 1px solid #3b5169;">';
				         t += '<div class="form-row">';
				            t += '<div class="col-md-6 mb-3">';
				               t += '<label>Hubungan <span class="text-danger">*</span></label>';
				               t += '<select class="form-control" name="temp_employee_family['+i+'][family_relation]" required>';
				                  t += '<option value="1" '+(v.family_relation == 1 ? 'selected=""' : '')+'>Ayah</option>';	
				                  t += '<option value="2" '+(v.family_relation == 2 ? 'selected=""' : '')+'>Ibu</option>';	
				                  t += '<option value="4" '+(v.family_relation == 4 ? 'selected=""' : '')+'>Istri</option>';
				                  t += '<option value="5" '+(v.family_relation == 5 ? 'selected=""' : '')+'>Suami</option>';
				                  t += '<option value="3" '+(v.family_relation == 3 ? 'selected=""' : '')+'>Saudara</option>';
				                  t += '<option value="6" '+(v.family_relation == 6 ? 'selected=""' : '')+'>Anak</option>';
				               t += '</select>';
				            t += '</div>';
				            t += '<div class="col-md-6 mb-3">';
				               t += '<label>Nama <span class="text-danger">*</span></label>';
				               t += '<input type="text" class="form-control" name="temp_employee_family['+i+'][name]" value="'+(v.name ? v.name : '')+'" required>';
				            t += '</div>';
				         t += '</div>';
				         t += '<div class="form-row">';
				            t += '<div class="col-md-4 mb-3">';
				               t += '<label>Jenis Kelamin <span class="text-danger">*</span></label>';
				               t += '<select class="form-control" name="temp_employee_family['+i+'][gender]" required>';
				                 	t += '<option value="1" '+(v.gender == 1 ? 'selected=""' : '')+'>Laki-Laki</option>';
				               	t += '<option value="2" '+(v.gender == 2 ? 'selected=""' : '')+'>Perempuan</option>';
				               t += '</select>';
				            t += '</div>';
				            t += '<div class="col-md-4 mb-3">';
				               t += '<label>Umur</label>';
				               t += '<input type="number" class="form-control" name="temp_employee_family['+i+'][age]" value="'+(v.age ? v.age : '')+'">';
				            t += '</div>';
				            t += '<div class="col-md-4 mb-3">';
				               t += '<label>Pendidikan Terakhir</label>';
				               t += '<select class="form-control" name="temp_employee_family['+i+'][degree]">';
				                  t += '<option value=""></option>';
				                  t += '<option value="1" '+(v.degree == 1 ? 'selected=""' : '')+'>SMK</option>';
				                  t += '<option value="2" '+(v.degree == 2 ? 'selected=""' : '')+'>SMA</option>';
				                  t += '<option value="3" '+(v.degree == 3 ? 'selected=""' : '')+'>SLTA/SEDERAJAT</option>';
				                  t += '<option value="4" '+(v.degree == 4 ? 'selected=""' : '')+'>D1</option>';
				                  t += '<option value="5" '+(v.degree == 5 ? 'selected=""' : '')+'>D2</option>';
				                  t += '<option value="6" '+(v.degree == 6 ? 'selected=""' : '')+'>D3</option>';
				                  t += '<option value="7" '+(v.degree == 7 ? 'selected=""' : '')+'>D4</option>';
				                  t += '<option value="8" '+(v.degree == 8 ? 'selected=""' : '')+'>S1</option>';
				                  t += '<option value="9" '+(v.degree == 9 ? 'selected=""' : '')+'>S2</option>';
				                  t += '<option value="10" '+(v.degree == 10 ? 'selected=""' : '')+'>S3</option>';
				               t += '</select>';
				            t += '</div>';
				         t += '</div>';
				         t += '<div class="form-row">';
				            t += '<div class="col-md-4 mb-3">';
				               t += '<label>Jabatan</label>';   
				               t += '<input type="text" class="form-control" name="temp_employee_family['+i+'][last_job_position]" value="'+(v.last_job_position ? v.last_job_position : '')+'">';
				            t += '</div>  ';
				            t += '<div class="col-md-4 mb-3">';
				               t += '<label>Perusahaan</label>';
				               t += '<input type="text" class="form-control" name="temp_employee_family['+i+'][last_job_company]" value="'+(v.last_job_company ? v.last_job_company : '')+'">';
				            t += '</div> ';
				            t += '<div class="col-md-4 mb-3">';
				               t += '<label>Keterangan</label>';
				               t += '<input type="text" class="form-control" name="temp_employee_family['+i+'][description]" value="'+(v.description ? v.description : '')+'">';
				            t += '</div> ';
				         t += '</div>';
				         t += '<div class="form-group text-center">';
				            t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
				               t += '<i class="fa fa-trash"></i>';
				            t += '</button>';
				         t += '</div>';
				      t += '</div>';
            	});
       		}else{
       			key_family = 0;
       		}

       		form.find('.sect-family').html(t);
		      $('#form-family-employee .btn-remove').on('click', function (e) {
		         $(this).parents('.form-group-attached').remove();
		         e.preventDefault();
		      });
    		}
 		});
	});

   $('.tab-education').on('click', function (e) {
      e.preventDefault();
      var form = $('#form-education-employee');

      ajaxManager.addReq({
         type : "GET",
         url : site_url + 'get-education',
         dataType : "JSON",
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown); 
         },
         success : function(r){
            if(r.temp_employee_education_tesis){
               form.find('input[name="temp_employee_education_tesis_tesis_title"]').val(r.temp_employee_education_tesis.tesis_title);
               form.find('input[name="temp_employee_education_tesis_tesis_result"]').val(r.temp_employee_education_tesis.tesis_result);
               form.find('input[name="temp_employee_education_tesis_tesis_publish"]').val(r.temp_employee_education_tesis.tesis_publish);
            }
            if(r.temp_employee_education){
               count_key_education = r.temp_employee_education.length;
               t = '';
               i = 0;
               $.each(r.temp_employee_education, function(k,v){
                  i++;
                  t += '<div class="col-md-6 mb-3 form-group-attached" style="border: 1px solid #3b5169;">';
                     t += '<div class="form-row">';
                        t += '<div class="col-md-3 mb-3">';
                           t += '<label>Tingkat</label>';
                           t += '<select class="form-control" name="temp_employee_education['+i+'][degree]">';
                              t += '<option value="11" '+(v.degree == 11 ? 'selected=""' : '')+'>SD</option>';
                              t += '<option value="12" '+(v.degree == 12 ? 'selected=""' : '')+'>SMP</option>';
                              t += '<option value="1" '+(v.degree == 1 ? 'selected=""' : '')+'>SMK</option>';
                              t += '<option value="2" '+(v.degree == 2 ? 'selected=""' : '')+'>SMA</option>';
                              t += '<option value="3" '+(v.degree == 3 ? 'selected=""' : '')+'>SLTA/SEDERAJAT</option>';
                              t += '<option value="4" '+(v.degree == 4 ? 'selected=""' : '')+'>D1</option>';
                              t += '<option value="5" '+(v.degree == 5 ? 'selected=""' : '')+'>D2</option>';
                              t += '<option value="6" '+(v.degree == 6 ? 'selected=""' : '')+'>D3</option>';
                              t += '<option value="7" '+(v.degree == 7 ? 'selected=""' : '')+'>D4</option>';
                              t += '<option value="8" '+(v.degree == 8 ? 'selected=""' : '')+'>S1</option>';
                              t += '<option value="9" '+(v.degree == 9 ? 'selected=""' : '')+'>S2</option>';
                              t += '<option value="10" '+(v.degree == 10 ? 'selected=""' : '')+'>S3</option>';
                           t += '</select>';
                        t += '</div>';
                        t += '<div class="col-md-5 mb-3">'; 
                           t += '<label>Nama Sekolah <span class="text-danger">*</span></label>';
                           t += '<input type="text" class="form-control" name="temp_employee_education['+i+'][school_name]" value="'+(v.school_name ? v.school_name : '')+'" required>';
                        t += '</div>';
                        t += '<div class="col-md-2 mb-3">'; 
                           t += '<label>Dari</label>';
                           t += '<input type="number" class="form-control" name="temp_employee_education['+i+'][start]" value="'+(v.start ? v.start : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-2 mb-3">'; 
                           t += '<label>Hingga</label>';
                           t += '<input type="number" class="form-control" name="temp_employee_education['+i+'][end]" value="'+(v.end ? v.end : '')+'">';
                        t += '</div>';
                     t += '</div>';
                     t += '<div class="form-row">';
                        t += '<div class="col-md-3 mb-3">'; 
                           t += '<label>Kota</label>';
                           t += '<input type="text" class="form-control" name="temp_employee_education['+i+'][city]" value="'+(v.city ? v.city : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-3 mb-3">'; 
                           t += '<label>Bidang/Jurusan</label>';
                           t += '<input type="text" class="form-control" name="temp_employee_education['+i+'][major]" value="'+(v.major ? v.major : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-3 mb-3">';
                           t += '<label>Lulus/Tidak</label>';
                           t += '<select class="form-control" name="temp_employee_education['+i+'][status]">';
                              t += '<option value="1" '+(v.status == 10 ? 'selected=""' : '')+'>Lulus</option>';
                              t += '<option value="2" '+(v.status == 10 ? 'selected=""' : '')+'>Tidak</option>';
                           t += '</select>';
                        t += '</div>';
                        t += '<div class="col-md-3 mb-3">'; 
                           t += '<label>Nilai Rata-rata</label>';
                           t += '<input type="number" class="form-control" name="temp_employee_education['+i+'][average_result]" value="'+(v.average_result ? v.average_result : '')+'">';
                        t += '</div>';
                     t += '</div>';
                     t += '<div class="form-group text-center">';
                        t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
                           t += '<i class="fa fa-trash"></i>';
                        t += '</button>';
                     t += '</div>';
                  t += '</div>';
               });
            }else{
               key_education = 0;
            }

            form.find('.sect-education').html(t);
            $('#form-family-employee .btn-remove').on('click', function (e) {
               $(this).parents('.form-group-attached').remove();
               e.preventDefault();
            });
         }
      });
   });

   $('.tab-education-non').on('click', function (e) {
      e.preventDefault();
      var form = $('#form-education-non-employee');

      ajaxManager.addReq({
         type : "GET",
         url : site_url + 'get-education-non',
         dataType : "JSON",
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown); 
         },
         success : function(r){
            if(r.temp_employee_education_nonformal){
               count_key_education_non = r.temp_employee_education_nonformal.length;
               t = '';
               i = 0;
               $.each(r.temp_employee_education_nonformal, function(k,v){
                  i++;
                  t += '<div class="col-md-6 mb-3 form-group-attached" style="border: 1px solid #3b5169;">';
                     t += '<div class="form-row">';
                        t += '<div class="col-md-6 mb-3">';
                           t += '<label>Jenis (Kursus/Loka-karya/Seminar/Pelatihan,dll)</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+i+'][type]" value="'+(v.type ? v.type : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-6 mb-3">';
                           t += '<label>Bidang/Judul/Topik <span class="text-danger">*</span></label>';
                          t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+i+'][title_education]" value="'+(v.title_education ? v.title_education : '')+'" required>';
                        t += '</div>';
                     t += '</div>';
                     t += '<div class="form-row">';
                        t += '<div class="col-md-6 mb-3">';
                           t += '<label>Penyelenggara</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+i+'][organizer]" value="'+(v.organizer ? v.organizer : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-6 mb-3">';
                           t += '<label>Kota</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+i+'][city]" value="'+(v.city ? v.city : '')+'">';
                        t += '</div>';
                     t += '</div>';
                     t += '<div class="form-row">';
                        t += '<div class="col-md-4 mb-3">';
                           t += '<label>Lama Pendidikan</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+i+'][duration]" value="'+(v.duration ? v.duration : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-4 mb-3">';
                           t += '<label>Tahun Ikut Serta</label>';
                          t += '<input type="number" class="form-control" name="temp_employee_education_nonformal['+i+'][year_register]" value="'+(v.year_register ? v.year_register : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-4 mb-3">';
                           t += '<label>Dibiayai Oleh</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+i+'][financed_by]" value="'+(v.financed_by ? v.financed_by : '')+'">';
                        t += '</div>';
                     t += '</div>';
                     t += '<div class="form-group text-center">';
                        t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
                           t += '<i class="fa fa-trash"></i>';
                        t += '</button>';
                     t += '</div>';
                  t += '</div>';
               });
            }else{
               key_education_non = 0;
            }

            form.find('.sect-education-non').html(t);
            $('#form-family-employee .btn-remove').on('click', function (e) {
               $(this).parents('.form-group-attached').remove();
               e.preventDefault();
            });
         }
      });
   });

   $('.tab-skill-set').on('click', function (e) {
      e.preventDefault();
      var form = $('#form-language-employee');

      ajaxManager.addReq({
         type : "GET",
         url : site_url + 'get-language',
         dataType : "JSON",
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown); 
         },
         success : function(r){
            if(r.temp_employee_computer_skill){
               form.find('input[name="temp_employee_computer_skill_word_processing"]').val(r.temp_employee_computer_skill.word_processing);
               form.find('input[name="temp_employee_computer_skill_number_processing"]').val(r.temp_employee_computer_skill.number_processing);
               form.find('input[name="temp_employee_computer_skill_database_processing"]').val(r.temp_employee_computer_skill.database_processing);
               form.find('input[name="temp_employee_computer_skill_others"]').val(r.temp_employee_computer_skill.others);
            }
            if(r.temp_employee_language_skill){
               count_key_language = r.temp_employee_language_skill.length;
               t = '';
               i = 0;
               $.each(r.temp_employee_language_skill, function(k,v){
                  i++;
                  t += '<div class="col-md-12 mb-3 form-group-attached" style="border: 1px solid #3b5169;">';
                     t += '<div class="form-row">';
                        t += '<div class="col-md-4 mb-3">';
                           t += '<label>Jenis Bahasa</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_language_skill['+i+'][language]" value="'+(v.language ? v.language : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-2 mb-3">';
                           t += '<label>Mendengar</label>';
                          t += '<input type="number" class="form-control" name="temp_employee_language_skill['+i+'][listening]" value="'+(v.listening ? v.listening : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-2 mb-3">';
                           t += '<label>Berbicara</label>';
                          t += '<input type="number" class="form-control" name="temp_employee_language_skill['+i+'][speaking]" value="'+(v.speaking ? v.speaking : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-2 mb-3">';
                           t += '<label>Membaca</label>';
                          t += '<input type="number" class="form-control" name="temp_employee_language_skill['+i+'][reading]" value="'+(v.reading ? v.reading : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-2 mb-3">';
                           t += '<label>Menulis </label>';
                          t += '<input type="number" class="form-control" name="temp_employee_language_skill['+i+'][writing]" value="'+(v.writing ? v.writing : '')+'">';
                        t += '</div>';
                     t += '</div>';
                     t += '<div class="form-group text-center">';
                        t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
                           t += '<i class="fa fa-trash"></i>';
                        t += '</button>';
                     t += '</div>';
                  t += '</div>';
               });
            }else{
               key_language = 0;
            }

            form.find('.sect-language').html(t);
            $('#form-language-employee .btn-remove').on('click', function (e) {
               $(this).parents('.form-group-attached').remove();
               e.preventDefault();
            });
         }
      });
   });
	
   $('.tab-job-history').on('click', function (e) {
      e.preventDefault();
      var form = $('#form-job-history-employee');

      ajaxManager.addReq({
         type : "GET",
         url : site_url + 'get-job-history',
         dataType : "JSON",
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown); 
         },
         success : function(r){
            if(r.temp_employee_work_history){
               count_key_job_history = r.temp_employee_work_history.length;
               t = '';
               i = 0;
               $.each(r.temp_employee_work_history, function(k,v){
                  i++;
                  t += '<div class="col-md-12 mb-3 form-group-attached" style="border: 1px solid #3b5169;">';
                     t += '<div class="form-row">';
                        t += '<div class="col-md-12 mb-3">';
                           t += '<label>Nama/Alamat/Telpon Perusahaan/Bidang usaha <span class="text-danger">*</span></label>';
                          t += '<input type="text" class="form-control" name="temp_employee_work_history['+i+'][company_detail]" value="'+(v.company_detail ? v.company_detail : '')+'" required>';
                        t += '</div>';
                     t += '</div>';
                     t += '<div class="form-row">';
                        t += '<div class="col-md-6 mb-3">';
                           t += '<label>Masuk</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_work_history['+i+'][work_in]" value="'+(v.work_in ? v.work_in : '')+'">';
                        t += '</div>';
                         t += '<div class="col-md-6 mb-3">';
                           t += '<label>Jabatan Sebagai</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_work_history['+i+'][work_in_position]" value="'+(v.work_in_position ? v.work_in_position : '')+'">';
                        t += '</div>';
                     t += '</div>';
                     t += '<div class="form-row">';
                        t += '<div class="col-md-6 mb-3">';
                           t += '<label>Keluar</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_work_history['+i+'][work_out]" value="'+(v.work_out ? v.work_out : '')+'">';
                        t += '</div>';
                         t += '<div class="col-md-6 mb-3">';
                           t += '<label>Jabatan Sebagai</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_work_history['+i+'][work_out_position]" value="'+(v.work_out_position ? v.work_out_position : '')+'">';
                        t += '</div>';
                     t += '</div>';
                     t += '<div class="form-row">';
                        t += '<div class="col-md-3 mb-3">';
                           t += '<label>DIV/DEPT/BAGIAN/AREA</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_work_history['+i+'][division]" value="'+(v.division ? v.division : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-3 mb-3">';
                           t += '<label>Nama Atasan Terakhir</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_work_history['+i+'][company_head]" value="'+(v.company_head ? v.company_head : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-3 mb-3">';
                           t += '<label>Gaji Terakhir</label>';
                          t += '<input type="number" class="form-control" name="temp_employee_work_history['+i+'][last_salary]" value="'+(v.last_salary ? v.last_salary : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-3 mb-3">';
                           t += '<label>Status Tetap/Kontrak</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_work_history['+i+'][status_work]" value="'+(v.status_work ? v.status_work : '')+'">';
                        t += '</div>';
                     t += '</div>';
                     t += '<div class="form-row">';
                        t += '<div class="col-md-6 mb-3">';
                           t += '<label>Alasan Keluar</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_work_history['+i+'][out_reason]" value="'+(v.out_reason ? v.out_reason : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-6 mb-3">';
                           t += '<label>Uraian tugas pada jabatan terakhir</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_work_history['+i+'][work_description]" value="'+(v.work_description ? v.work_description : '')+'">';
                        t += '</div>';
                     t += '</div>';
                     t += '<div class="form-group text-center">';
                        t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
                           t += '<i class="fa fa-trash"></i>';
                        t += '</button>';
                     t += '</div>';
                  t += '</div>';
               });
            }else{
               key_job_history = 0;
            }

            form.find('.sect-job-history').html(t);
            $('#form-job-history-employee .btn-remove').on('click', function (e) {
               $(this).parents('.form-group-attached').remove();
               e.preventDefault();
            });
         }
      });
   });

   $('.tab-social-activity').on('click', function (e) {
      e.preventDefault();
      var form = $('#form-social-activity-employee');

      ajaxManager.addReq({
         type : "GET",
         url : site_url + 'get-social-activity',
         dataType : "JSON",
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown); 
         },
         success : function(r){
            if(r.temp_employee_social_activity){
               count_key_social_activity = r.temp_employee_social_activity.length;
               t = '';
               i = 0;
               $.each(r.temp_employee_social_activity, function(k,v){
                  i++;
                  t += '<div class="col-md-6 mb-3 form-group-attached" style="border: 1px solid #3b5169;">';
                     t += '<div class="form-row">';
                        t += '<div class="col-md-6 mb-3">';
                           t += '<label>Nama Organisasi <span class="text-danger">*</span></label>';
                          t += '<input type="text" class="form-control" name="temp_employee_social_activity['+i+'][organization_name]" value="'+(v.organization_name ? v.organization_name : '')+'" required>';
                        t += '</div>';
                        t += '<div class="col-md-6 mb-3">';
                           t += '<label>Jenis Kegiatan Organisasi</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_social_activity['+i+'][organization_type]" value="'+(v.organization_type ? v.organization_type : '')+'">';
                        t += '</div>';
                     t += '</div>';
                     t += '<div class="form-row">';
                        t += '<div class="col-md-3 mb-3">';
                           t += '<label>Tahun Masuk</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_social_activity['+i+'][year_in]" value="'+(v.year_in ? v.year_in : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-3 mb-3">';
                           t += '<label>Tahun Keluar</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_social_activity['+i+'][year_out]" value="'+(v.year_out ? v.year_out : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-6 mb-3">';
                           t += '<label>Jabatan Terakhir</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_social_activity['+i+'][last_position]" value="'+(v.last_position ? v.last_position : '')+'">';
                        t += '</div>';
                     t += '</div>';
                     t += '<div class="form-group text-center">';
                        t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
                           t += '<i class="fa fa-trash"></i>';
                        t += '</button>';
                     t += '</div>';
                  t += '</div>';
               });
            }else{
               key_social_activity = 0;
            }

            form.find('.sect-social-activity').html(t);
            $('#form-social-activity-employee .btn-remove').on('click', function (e) {
               $(this).parents('.form-group-attached').remove();
               e.preventDefault();
            });
         }
      });
   });

   $('.tab-accident-history').on('click', function (e) {
      e.preventDefault();
      var form = $('#form-accident-history-employee');

      ajaxManager.addReq({
         type : "GET",
         url : site_url + 'get-accident-history',
         dataType : "JSON",
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown); 
         },
         success : function(r){
            if(r.temp_employee_accident_history){
               count_key_accident_history = r.temp_employee_accident_history.length;
               t = '';
               i = 0;
               $.each(r.temp_employee_accident_history, function(k,v){
                  i++;
                  t += '<div class="col-md-6 mb-3 form-group-attached" style="border: 1px solid #3b5169;">';
                     t += '<div class="form-row">';
                        t += '<div class="col-md-6 mb-3">';
                           t += '<label>Jenis <span class="text-danger">*</span></label>';
                          t += '<input type="text" class="form-control" name="temp_employee_accident_history['+i+'][accident_type]" value="'+(v.accident_type ? v.accident_type : '')+'" required>';
                        t += '</div>';
                        t += '<div class="col-md-6 mb-3">';
                           t += '<label>Opname</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_accident_history['+i+'][opname_accident]" value="'+(v.opname_accident ? v.opname_accident : '')+'">';
                        t += '</div>';
                     t += '</div>';
                     t += '<div class="form-row">';
                        t += '<div class="col-md-3 mb-3">';
                           t += '<label>Lama</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_accident_history['+i+'][accident_time]" value="'+(v.accident_time ? v.accident_time : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-3 mb-3">';
                           t += '<label>Tahun</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_accident_history['+i+'][year_accident]" value="'+(v.year_accident ? v.year_accident : '')+'">';
                        t += '</div>';
                        t += '<div class="col-md-6 mb-3">';
                           t += '<label>Gangguan  yg. ada sampai sekarang</label>';
                          t += '<input type="text" class="form-control" name="temp_employee_accident_history['+i+'][interference_accident]" value="'+(v.interference_accident ? v.interference_accident : '')+'">';
                        t += '</div>';
                     t += '</div>';
                     t += '<div class="form-group text-center">';
                        t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
                           t += '<i class="fa fa-trash"></i>';
                        t += '</button>';
                     t += '</div>';
                  t += '</div>';
               });
            }else{
               key_accident_history = 0;
            }

            form.find('.sect-accident-history').html(t);
            $('#form-accident-history-employee .btn-remove').on('click', function (e) {
               $(this).parents('.form-group-attached').remove();
               e.preventDefault();
            });
         }
      });
   });

   $('.tab-other').on('click', function (e) {
      e.preventDefault();
      var form = $('#form-faq-answers-employee');

      ajaxManager.addReq({
         type : "GET",
         url : site_url + 'get-faq-answers',
         dataType : "JSON",
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown); 
         },
         success : function(r){
            if(r.temp_employee_other_contact){
               count_key_other_contact = r.temp_employee_other_contact.length;
               o = '';
               i = 0;
               $.each(r.temp_employee_other_contact, function(k,v){
                  i++;
                  o += '<div class="col-md-6 mb-3 form-group-attached" style="border: 1px solid #3b5169;">';
                     o += '<div class="form-row">';
                        o += '<div class="col-md-6 mb-3">';
                           o += '<label>Nama <span class="text-danger">*</span></label>';
                          o += '<input type="text" class="form-control" name="temp_employee_other_contact['+i+'][temp_employee_other_contact_name]" value="'+(v.name ? v.name : '')+'" required>';
                        o += '</div>';
                        o += '<div class="col-md-6 mb-3">';
                           o += '<label>Hubungan dengan anda</label>';
                          o += '<input type="text" class="form-control" name="temp_employee_other_contact['+i+'][temp_employee_other_contact_relation_status]" value="'+(v.relation_status ? v.relation_status : '')+'">';
                        o += '</div>';
                     o += '</div>';
                     o += '<div class="form-row">';
                        o += '<div class="col-md-6 mb-3">';
                           o += '<label>Alamat & No. Telpon </label>';
                          o += '<input type="text" class="form-control" name="temp_employee_other_contact['+i+'][temp_employee_other_contact_address_phone]" value="'+(v.address_phone ? v.address_phone : '')+'">';
                        o += '</div>';
                        o += '<div class="col-md-6 mb-3">';
                           o += '<label>Pekerjaan</label>';
                          o += '<input type="text" class="form-control" name="temp_employee_other_contact['+i+'][temp_employee_other_contact_job]" value="'+(v.job ? v.job : '')+'">';
                        o += '</div>';
                     o += '</div>';
                     o += '<div class="form-group text-center">';
                        o += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
                           o += '<i class="fa fa-trash"></i>';
                        o += '</button>';
                     o += '</div>';
                  o += '</div>';
               });
               form.find('.sect-other-contact').html(o);
               $('#form-faq-answers-employee .btn-remove').on('click', function (e) {
                  $(this).parents('.form-group-attached').remove();
                  e.preventDefault();
               });
            }else{
               key_other_contact = 0;
            }
            if(r.faq_question_answers){
               t = '';
               i = 0;
               t += '<div class="table-responsive">';
                  t += '<table class="table table-condensed">';
                     t += '<thead>';
                        t += '<tr>';
                           t += '<th scope="col">Pertanyaan</th>';
                           t += '<th scope="col">Ya/Tidak</th>';
                           t += '<th scope="col">Penjelasan</th>';
                        t += '</tr>';
                     t += '</thead>';
                     t += '<tbody>';
                     $.each(r.faq_question_answers, function(k,v){
                        if(v.option_type == '_option'){
                           t += '<tr>';
                           t += '<td>'+v.question_faq+'</td>';
                           t += '<td>';
                           t += '<select name="faq['+v.faq_id+'][faq_answers]" class="form-control">';
                              t += '<option value="Tidak" '+(v.faq_answers == 'Tidak' ? 'selected' : '')+'>Tidak</option>';
                              t += '<option value="Ya" '+(v.faq_answers == 'Ya' ? 'selected' : '')+'>Ya</option>';
                           t += '</select>';
                           t += '</td>';
                           t += '<td>';
                           t += '<textarea class="form-control" name="faq['+v.faq_id+'][faq_description]">'+(v.faq_description ? v.faq_description : '')+'</textarea>';
                           t += '</td>';
                           t += '</tr>';
                        }
                        if(v.option_type == '_text'){
                           t += '<tr>';
                           t += '<td>'+v.question_faq+'</td>';
                           t += '<td colspan="2">';
                           t += '<textarea class="form-control" name="faq['+v.faq_id+'][faq_description]">'+(v.faq_description ? v.faq_description : '')+'</textarea>';
                           t += '</td>';
                           t += '</tr>';
                        }
                     });
                     t += '</tbody>';
                  t += '</table>';
               t += '</div>';
               form.find('.sect-faq-answers').html(t);
            }
         }
      });
   });

	$('.add-more-family').on('click', function (e) {
    	key_family = count_key_family;
      key_family += 1;

    	t = '';
    	t += '<div class="col-md-6 mb-3 form-group-attached" style="border: 1px solid #3b5169;">';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Hubungan <span class="text-danger">*</span></label>';
               t += '<select class="form-control" name="temp_employee_family['+key_family+'][family_relation]" required>';
                  t += '<option value="1">Ayah</option>';
                  t += '<option value="2">Ibu</option>';
                  t += '<option value="4">Istri</option>';
                  t += '<option value="5">Suami</option>';
                  t += '<option value="3">Saudara</option>';
                  t += '<option value="6">Anak</option>';
               t += '</select>';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Nama <span class="text-danger">*</span></label>';
               t += '<input type="text" class="form-control" name="temp_employee_family['+key_family+'][name]" required>';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-4 mb-3">';
               t += '<label>Jenis Kelamin <span class="text-danger">*</span></label>';
               t += '<select class="form-control" name="temp_employee_family['+key_family+'][gender]" required>';
                 	t += '<option value="1">Laki-Laki</option>';
               	t += '<option value="2">Perempuan</option>';
               t += '</select>';
            t += '</div>';
            t += '<div class="col-md-4 mb-3">';
               t += '<label>Umur</label>';
               t += '<input type="number" class="form-control" name="temp_employee_family['+key_family+'][age]">';
            t += '</div>';
            t += '<div class="col-md-4 mb-3">';
               t += '<label>Pendidikan Terakhir</label>';
               t += '<select class="form-control" name="temp_employee_family['+key_family+'][degree]">';
                  t += '<option value=""></option>';
                  t += '<option value="1">SMK</option>';
                  t += '<option value="2">SMA</option>';
                  t += '<option value="3">SLTA/SEDERAJAT</option>';
                  t += '<option value="4">D1</option>';
                  t += '<option value="5">D2</option>';
                  t += '<option value="6">D3</option>';
                  t += '<option value="7">D4</option>';
                  t += '<option value="8">S1</option>';
                  t += '<option value="9">S2</option>';
                  t += '<option value="10">S3</option>';
               t += '</select>';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-4 mb-3">';
               t += '<label>Jabatan</label>';   
               t += '<input type="text" class="form-control" name="temp_employee_family['+key_family+'][last_job_position]">';
            t += '</div>  ';
            t += '<div class="col-md-4 mb-3">';
               t += '<label>Perusahaan</label>';
               t += '<input type="text" class="form-control" name="temp_employee_family['+key_family+'][last_job_company]">';
            t += '</div> ';
            t += '<div class="col-md-4 mb-3">';
               t += '<label>Keterangan</label>';
               t += '<input type="text" class="form-control" name="temp_employee_family['+key_family+'][description]">';
            t += '</div> ';
         t += '</div>';
         t += '<div class="form-group text-center">';
            t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
               t += '<i class="fa fa-trash"></i>';
            t += '</button>';
         t += '</div>';
      t += '</div>';

      $('#form-family-employee').find('.sect-family').prepend(t);

      $('#form-family-employee .btn-remove').on('click', function (e) {
         $(this).parents('.form-group-attached').remove();
         e.preventDefault();
      });

      count_key_family += 1;
   });

   $('.add-more-education').on('click', function (e) {
      key_education = count_key_education;
      key_education += 1;
      t = '';
      t += '<div class="col-md-6 mb-3 form-group-attached" style="border: 1px solid #3b5169;">';
         t += '<div class="form-row">';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Tingkat</label>';
               t += '<select class="form-control" name="temp_employee_education['+key_education+'][degree]">';
                  t += '<option value="11">SD</option>';
                  t += '<option value="12">SMP</option>';
                  t += '<option value="1">SMK</option>';
                  t += '<option value="2">SMA</option>';
                  t += '<option value="3">SLTA/SEDERAJAT</option>';
                  t += '<option value="4">D1</option>';
                  t += '<option value="5">D2</option>';
                  t += '<option value="6">D3</option>';
                  t += '<option value="7">D4</option>';
                  t += '<option value="8">S1</option>';
                  t += '<option value="9">S2</option>';
                  t += '<option value="10">S3</option>';
               t += '</select>';
            t += '</div>';
            t += '<div class="col-md-5 mb-3">'; 
               t += '<label>Nama Sekolah <span class="text-danger">*</span></label>';
               t += '<input type="text" class="form-control" name="temp_employee_education['+key_education+'][school_name]" required>';
            t += '</div>';
            t += '<div class="col-md-2 mb-3">'; 
               t += '<label>Dari</label>';
               t += '<input type="number" class="form-control" name="temp_employee_education['+key_education+'][start]">';
            t += '</div>';
            t += '<div class="col-md-2 mb-3">'; 
               t += '<label>Hingga</label>';
               t += '<input type="number" class="form-control" name="temp_employee_education['+key_education+'][end]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-3 mb-3">'; 
               t += '<label>Kota</label>';
               t += '<input type="text" class="form-control" name="temp_employee_education['+key_education+'][city]">';
            t += '</div>';
            t += '<div class="col-md-3 mb-3">'; 
               t += '<label>Bidang/Jurusan</label>';
               t += '<input type="text" class="form-control" name="temp_employee_education['+key_education+'][major]">';
            t += '</div>';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Lulus/Tidak</label>';
               t += '<select class="form-control" name="temp_employee_education['+key_education+'][status]">';
                  t += '<option value="1">Lulus</option>';
                  t += '<option value="2">Tidak</option>';
               t += '</select>';
            t += '</div>';
            t += '<div class="col-md-3 mb-3">'; 
               t += '<label>Nilai Rata-rata</label>';
               t += '<input type="number" class="form-control" name="temp_employee_education['+key_education+'][average_result]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-group text-center">';
            t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
               t += '<i class="fa fa-trash"></i>';
            t += '</button>';
         t += '</div>';
      t += '</div>';

      $('#form-education-employee').find('.sect-education').prepend(t);

      $('#form-education-employee .btn-remove').on('click', function (e) {
         $(this).parents('.form-group-attached').remove();
         e.preventDefault();
      });
      count_key_education += 1;
   });

   $('.add-more-education-non').on('click', function (e) {
      key_education_non = count_key_education_non;
      key_education_non += 1;
      t = '';
       t += '<div class="col-md-6 mb-3 form-group-attached" style="border: 1px solid #3b5169;">';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Jenis (Kursus/Loka-karya/Seminar/Pelatihan,dll)</label>';
              t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+key_education_non+'][type]">';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Bidang/Judul/Topik <span class="text-danger">*</span></label>';
              t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+key_education_non+'][title_education]" required>';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Penyelenggara</label>';
              t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+key_education_non+'][organizer]">';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Kota</label>';
              t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+key_education_non+'][city]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-4 mb-3">';
               t += '<label>Lama Pendidikan</label>';
              t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+key_education_non+'][duration]">';
            t += '</div>';
            t += '<div class="col-md-4 mb-3">';
               t += '<label>Tahun Ikut Serta</label>';
              t += '<input type="number" class="form-control" name="temp_employee_education_nonformal['+key_education_non+'][year_register]">';
            t += '</div>';
            t += '<div class="col-md-4 mb-3">';
               t += '<label>Dibiayai Oleh</label>';
              t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+key_education_non+'][financed_by]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-group text-center">';
            t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
               t += '<i class="fa fa-trash"></i>';
            t += '</button>';
         t += '</div>';
      t += '</div>';

      $('#form-education-non-employee').find('.sect-education-non').prepend(t);

      $('#form-education-non-employee .btn-remove').on('click', function (e) {
         $(this).parents('.form-group-attached').remove();
         e.preventDefault();
      });
      count_key_education_non += 1;
   });

   $('.add-more-language').on('click', function (e) {
      key_language = count_key_language;
      key_language += 1;
      t = '';
       t += '<div class="col-md-12 mb-3 form-group-attached" style="border: 1px solid #3b5169;">';
         t += '<div class="form-row">';
            t += '<div class="col-md-4 mb-3">';
               t += '<label>Jenis Bahasa</label>';
              t += '<input type="text" class="form-control" name="temp_employee_language_skill['+key_language+'][language]">';
            t += '</div>';
            t += '<div class="col-md-2 mb-3">';
               t += '<label>Mendengar</label>';
              t += '<input type="number" class="form-control" name="temp_employee_language_skill['+key_language+'][listening]" placeholder="Skala (10-100)">';
            t += '</div>';
            t += '<div class="col-md-2 mb-3">';
               t += '<label>Berbicara</label>';
              t += '<input type="number" class="form-control" name="temp_employee_language_skill['+key_language+'][speaking]" placeholder="Skala (10-100)">';
            t += '</div>';
            t += '<div class="col-md-2 mb-3">';
               t += '<label>Membaca</label>';
              t += '<input type="number" class="form-control" name="temp_employee_language_skill['+key_language+'][reading]" placeholder="Skala (10-100)">';
            t += '</div>';
            t += '<div class="col-md-2 mb-3">';
               t += '<label>Menulis </label>';
              t += '<input type="number" class="form-control" name="temp_employee_language_skill['+key_language+'][writing]" placeholder="Skala (10-100)">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-group text-center">';
            t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
               t += '<i class="fa fa-trash"></i>';
            t += '</button>';
         t += '</div>';
      t += '</div>';

      $('#form-language-employee').find('.sect-language').prepend(t);

      $('#form-language-employee .btn-remove').on('click', function (e) {
         $(this).parents('.form-group-attached').remove();
         e.preventDefault();
      });
      count_key_language += 1;
   });

   $('.add-more-job-history').on('click', function (e) {
      key_job_history = count_key_job_history;
      key_job_history += 1;
      t = '';
      t += '<div class="col-md-12 mb-3 form-group-attached" style="border: 1px solid #3b5169;">';
         t += '<div class="form-row">';
            t += '<div class="col-md-12 mb-3">';
               t += '<label>Nama/Alamat/Telpon Perusahaan/Bidang usaha <span class="text-danger">*</span></label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][company_detail]" required>';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Masuk</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][work_in]" placeholder="Bulan & Tahun...">';
            t += '</div>';
             t += '<div class="col-md-6 mb-3">';
               t += '<label>Jabatan Sebagai</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][work_in_position]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Keluar</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][work_out]" placeholder="Bulan & Tahun...">';
            t += '</div>';
             t += '<div class="col-md-6 mb-3">';
               t += '<label>Jabatan Sebagai</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][work_out_position]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>DIV/DEPT/BAGIAN/AREA</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][division]">';
            t += '</div>';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Nama Atasan Terakhir</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][company_head]">';
            t += '</div>';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Gaji Terakhir</label>';
              t += '<input type="number" class="form-control" name="temp_employee_work_history['+key_job_history+'][last_salary]">';
            t += '</div>';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Status Tetap/Kontrak</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][status_work]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Alasan Keluar</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][out_reason]">';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Uraian tugas pada jabatan terakhir</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][work_description]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-group text-center">';
            t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
               t += '<i class="fa fa-trash"></i>';
            t += '</button>';
         t += '</div>';
      t += '</div>';

      $('#form-job-history-employee').find('.sect-job-history').prepend(t);

      $('#form-job-history-employee .btn-remove').on('click', function (e) {
         $(this).parents('.form-group-attached').remove();
         e.preventDefault();
      });
      count_key_job_history += 1;
   });

   $('.add-more-social-activity').on('click', function (e) {
      key_social_activity = count_key_social_activity;
      key_social_activity += 1;
      t = '';
      t += '<div class="col-md-6 mb-3 form-group-attached" style="border: 1px solid #3b5169;">';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Nama Organisasi <span class="text-danger">*</span></label>';
              t += '<input type="text" class="form-control" name="temp_employee_social_activity['+key_social_activity+'][organization_name]" required>';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Jenis Kegiatan Organisasi</label>';
              t += '<input type="text" class="form-control" name="temp_employee_social_activity['+key_social_activity+'][organization_type]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Tahun Masuk</label>';
              t += '<input type="text" class="form-control" name="temp_employee_social_activity['+key_social_activity+'][year_in]">';
            t += '</div>';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Tahun Keluar</label>';
              t += '<input type="text" class="form-control" name="temp_employee_social_activity['+key_social_activity+'][year_out]">';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Jabatan Terakhir</label>';
              t += '<input type="text" class="form-control" name="temp_employee_social_activity['+key_social_activity+'][last_position]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-group text-center">';
            t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
               t += '<i class="fa fa-trash"></i>';
            t += '</button>';
         t += '</div>';
      t += '</div>';

      $('#form-social-activity-employee').find('.sect-social-activity').prepend(t);

      $('#form-social-activity-employee .btn-remove').on('click', function (e) {
         $(this).parents('.form-group-attached').remove();
         e.preventDefault();
      });
      count_key_social_activity += 1;
   });

   $('.add-more-accident-history').on('click', function (e) {
      key_accident_history = count_key_accident_history;
      key_accident_history += 1;
      t = '';
      t += '<div class="col-md-6 mb-3 form-group-attached" style="border: 1px solid #3b5169;">';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Jenis <span class="text-danger">*</span></label>';
              t += '<input type="text" class="form-control" name="temp_employee_accident_history['+key_accident_history+'][accident_type]" required>';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Opname</label>';
              t += '<input type="text" class="form-control" name="temp_employee_accident_history['+key_accident_history+'][opname_accident]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Lama</label>';
              t += '<input type="text" class="form-control" name="temp_employee_accident_history['+key_accident_history+'][accident_time]">';
            t += '</div>';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Tahun</label>';
              t += '<input type="text" class="form-control" name="temp_employee_accident_history['+key_accident_history+'][year_accident]">';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Gangguan  yg. ada sampai sekarang</label>';
              t += '<input type="text" class="form-control" name="temp_employee_accident_history['+key_accident_history+'][interference_accident]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-group text-center">';
            t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
               t += '<i class="fa fa-trash"></i>';
            t += '</button>';
         t += '</div>';
      t += '</div>';

      $('#form-accident-history-employee').find('.sect-accident-history').prepend(t);

      $('#form-accident-history-employee .btn-remove').on('click', function (e) {
         $(this).parents('.form-group-attached').remove();
         e.preventDefault();
      });
      count_key_accident_history += 1;
   });

   $('.add-more-other-contact').on('click', function (e) {
      key_other_contact = count_key_other_contact;
      key_other_contact += 1;
      t = '';
      t += '<div class="col-md-6 mb-3 form-group-attached" style="border: 1px solid #3b5169;">';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Nama <span class="text-danger">*</span></label>';
              t += '<input type="text" class="form-control" name="temp_employee_other_contact['+key_other_contact+'][temp_employee_other_contact_name]" required>';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Hubungan dengan anda</label>';
              t += '<input type="text" class="form-control" name="temp_employee_other_contact['+key_other_contact+'][temp_employee_other_contact_relation_status]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Alamat & No. Telpon </label>';
              t += '<input type="text" class="form-control" name="temp_employee_other_contact['+key_other_contact+'][temp_employee_other_contact_address_phone]">';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Pekerjaan</label>';
              t += '<input type="text" class="form-control" name="temp_employee_other_contact['+key_other_contact+'][temp_employee_other_contact_job]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-group text-center">';
            t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
               t += '<i class="fa fa-trash"></i>';
            t += '</button>';
         t += '</div>';
      t += '</div>';

      $('#form-faq-answers-employee').find('.sect-other-contact').prepend(t);

      $('#form-faq-answers-employee .btn-remove').on('click', function (e) {
         $(this).parents('.form-group-attached').remove();
         e.preventDefault();
      });

      count_key_other_contact += 1;
   });

});