$(function () {
	key_family = 0;
   key_education = 0;
   key_education_non = 0;
   key_language = 0;
   key_job_history = 0;
   key_social_activity = 0;
   key_accident_history = 0;
   key_other_contact = 0;

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

 	$(this).on('submit', '#form-registration', function(e){
      var form = $(this);
      $(this).ajaxSubmit({
         url  : site_url +'registration',
         type : "POST",
         dataType : "JSON",
         data : {
         	"csrf_token_carrier2019" : _csrf_hash
         },
         error: function (jqXHR, status, errorThrown) {
            error_handle(jqXHR, status, errorThrown);
            loading_form(form, 'hide', 'REGISTRASI');
         },
         beforeSend: function (xhr) {
            loading_form(form, 'show', spinnerbutton);
         },
         success: function(r) {
         	set_csrf(r._token_hash);
         	if(r.success){
               window.location.href = site_url+'applicant';
         	}else{
         		toastr.error(r.msg);
         	}
         	loading_form(form, 'hide', 'REGISTRASI');
         },
      });
      e.preventDefault();
   });


 	$('.add-more-family').on('click', function (e) {
      key_family += 1;
    	t = '';
    	t += '<div class="col-md-6 mb-3 form-group-attached animated bounceIn" style="border: 1px solid #3b5169;">';
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

      $('#form-registration').find('.sect-family').prepend(t);

      $('#form-registration .btn-remove').on('click', function (e) {
         $(this).parents('.form-group-attached').remove();
         e.preventDefault();
      });

   });

   $('.add-more-education').on('click', function (e) {
      key_education += 1;
      t = '';
      t += '<div class="col-md-6 mb-3 form-group-attached animated bounceIn" style="border: 1px solid #3b5169;">';
         t += '<div class="form-row">';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Tingkat</label>';
               t += '<select class="form-control" name="temp_employee_education['+key_education+'][temp_employee_education_degree]">';
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
               t += '<input type="text" class="form-control" name="temp_employee_education['+key_education+'][temp_employee_education_school_name]" required>';
            t += '</div>';
            t += '<div class="col-md-2 mb-3">'; 
               t += '<label>Dari</label>';
               t += '<input type="number" class="form-control" name="temp_employee_education['+key_education+'][temp_employee_education_start]">';
            t += '</div>';
            t += '<div class="col-md-2 mb-3">'; 
               t += '<label>Hingga</label>';
               t += '<input type="number" class="form-control" name="temp_employee_education['+key_education+'][temp_employee_education_end]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-3 mb-3">'; 
               t += '<label>Kota</label>';
               t += '<input type="text" class="form-control" name="temp_employee_education['+key_education+'][temp_employee_education_city]">';
            t += '</div>';
            t += '<div class="col-md-3 mb-3">'; 
               t += '<label>Bidang/Jurusan</label>';
               t += '<input type="text" class="form-control" name="temp_employee_education['+key_education+'][temp_employee_education_major]">';
            t += '</div>';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Lulus/Tidak</label>';
               t += '<select class="form-control" name="temp_employee_education['+key_education+'][temp_employee_education_status]">';
                  t += '<option value="1">Lulus</option>';
                  t += '<option value="2">Tidak</option>';
               t += '</select>';
            t += '</div>';
            t += '<div class="col-md-3 mb-3">'; 
               t += '<label>Nilai Rata-rata</label>';
               t += '<input type="number" class="form-control" name="temp_employee_education['+key_education+'][temp_employee_education_average_result]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-group text-center">';
            t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
               t += '<i class="fa fa-trash"></i>';
            t += '</button>';
         t += '</div>';
      t += '</div>';

      $('#form-registration').find('.sect-education').prepend(t);

      $('#form-registration .btn-remove').on('click', function (e) {
         $(this).parents('.form-group-attached').remove();
         e.preventDefault();
      });

   });

   $('.add-more-education-non').on('click', function (e) {
      key_education_non += 1;
      t = '';
      t += '<div class="col-md-6 mb-3 form-group-attached animated bounceIn" style="border: 1px solid #3b5169;">';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Jenis (Kursus/Loka-karya/Seminar/Pelatihan,dll)</label>';
              t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+key_education_non+'][temp_employee_education_nonformal_type]">';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Bidang/Judul/Topik <span class="text-danger">*</span></label>';
              t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+key_education_non+'][temp_employee_education_nonformal_title_education]" required>';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Penyelenggara</label>';
              t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+key_education_non+'][temp_employee_education_nonformal_organizer]">';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Kota</label>';
              t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+key_education_non+'][temp_employee_education_nonformal_city]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-4 mb-3">';
               t += '<label>Lama Pendidikan</label>';
              t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+key_education_non+'][temp_employee_education_nonformal_duration]">';
            t += '</div>';
            t += '<div class="col-md-4 mb-3">';
               t += '<label>Tahun Ikut Serta</label>';
              t += '<input type="number" class="form-control" name="temp_employee_education_nonformal['+key_education_non+'][temp_employee_education_nonformal_year_register]">';
            t += '</div>';
            t += '<div class="col-md-4 mb-3">';
               t += '<label>Dibiayai Oleh</label>';
              t += '<input type="text" class="form-control" name="temp_employee_education_nonformal['+key_education_non+'][temp_employee_education_nonformal_financed_by]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-group text-center">';
            t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
               t += '<i class="fa fa-trash"></i>';
            t += '</button>';
         t += '</div>';
      t += '</div>';

      $('#form-registration').find('.sect-education-non').prepend(t);

      $('#form-registration .btn-remove').on('click', function (e) {
         $(this).parents('.form-group-attached').remove();
         e.preventDefault();
      });

   });

   $('.add-more-language').on('click', function (e) {
      key_language += 1;
      t = '';
      t += '<div class="col-md-12 mb-3 form-group-attached animated bounceIn" style="border: 1px solid #3b5169;">';
         t += '<div class="form-row">';
            t += '<div class="col-md-4 mb-3">';
               t += '<label>Jenis Bahasa</label>';
              t += '<input type="text" class="form-control" name="temp_employee_language_skill['+key_language+'][temp_employee_language_skill_language]">';
            t += '</div>';
            t += '<div class="col-md-2 mb-3">';
               t += '<label>Mendengar</label>';
              t += '<input type="number" class="form-control" name="temp_employee_language_skill['+key_language+'][temp_employee_language_skill_listening]" placeholder="Skala (10-100)">';
            t += '</div>';
            t += '<div class="col-md-2 mb-3">';
               t += '<label>Berbicara</label>';
              t += '<input type="number" class="form-control" name="temp_employee_language_skill['+key_language+'][temp_employee_language_skill_speaking]" placeholder="Skala (10-100)">';
            t += '</div>';
            t += '<div class="col-md-2 mb-3">';
               t += '<label>Membaca</label>';
              t += '<input type="number" class="form-control" name="temp_employee_language_skill['+key_language+'][temp_employee_language_skill_reading]" placeholder="Skala (10-100)">';
            t += '</div>';
            t += '<div class="col-md-2 mb-3">';
               t += '<label>Menulis </label>';
              t += '<input type="number" class="form-control" name="temp_employee_language_skill['+key_language+'][temp_employee_language_skill_writing]" placeholder="Skala (10-100)">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-group text-center">';
            t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
               t += '<i class="fa fa-trash"></i>';
            t += '</button>';
         t += '</div>';
      t += '</div>';

      $('#form-registration').find('.sect-language').prepend(t);

      $('#form-registration .btn-remove').on('click', function (e) {
         $(this).parents('.form-group-attached').remove();
         e.preventDefault();
      });

   });

   $('.add-more-job-history').on('click', function (e) {
      key_job_history += 1;
      t = '';
      t += '<div class="col-md-12 mb-3 form-group-attached animated bounceIn" style="border: 1px solid #3b5169;">';
         t += '<div class="form-row">';
            t += '<div class="col-md-12 mb-3">';
               t += '<label>Nama/Alamat/Telpon Perusahaan/Bidang usaha <span class="text-danger">*</span></label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][temp_employee_work_history_company_detail]" required>';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Masuk</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][temp_employee_work_history_work_in]" placeholder="Bulan & Tahun...">';
            t += '</div>';
             t += '<div class="col-md-6 mb-3">';
               t += '<label>Jabatan Sebagai</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][temp_employee_work_history_work_in_position]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Keluar</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][temp_employee_work_history_work_out]" placeholder="Bulan & Tahun...">';
            t += '</div>';
             t += '<div class="col-md-6 mb-3">';
               t += '<label>Jabatan Sebagai</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][temp_employee_work_history_work_out_position]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>DIV/DEPT/BAGIAN/AREA</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][temp_employee_work_history_division]">';
            t += '</div>';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Nama Atasan Terakhir</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][temp_employee_work_history_company_head]">';
            t += '</div>';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Gaji Terakhir</label>';
              t += '<input type="number" class="form-control" name="temp_employee_work_history['+key_job_history+'][temp_employee_work_history_last_salary]">';
            t += '</div>';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Status Tetap/Kontrak</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][temp_employee_work_history_status_work]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Alasan Keluar</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][temp_employee_work_history_out_reason]">';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Uraian tugas pada jabatan terakhir</label>';
              t += '<input type="text" class="form-control" name="temp_employee_work_history['+key_job_history+'][temp_employee_work_history_work_description]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-group text-center">';
            t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
               t += '<i class="fa fa-trash"></i>';
            t += '</button>';
         t += '</div>';
      t += '</div>';

      $('#form-registration').find('.sect-job-history').prepend(t);

      $('#form-registration .btn-remove').on('click', function (e) {
         $(this).parents('.form-group-attached').remove();
         e.preventDefault();
      });

   });

   $('.add-more-social-activity').on('click', function (e) {
      key_social_activity += 1;
      t = '';
      t += '<div class="col-md-6 mb-3 form-group-attached animated bounceIn" style="border: 1px solid #3b5169;">';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Nama Organisasi <span class="text-danger">*</span></label>';
              t += '<input type="text" class="form-control" name="temp_employee_social_activity['+key_social_activity+'][temp_employee_social_activity_organization_name]" required>';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Jenis Kegiatan Organisasi</label>';
              t += '<input type="text" class="form-control" name="temp_employee_social_activity['+key_social_activity+'][temp_employee_social_activity_organization_type]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Tahun Masuk</label>';
              t += '<input type="text" class="form-control" name="temp_employee_social_activity['+key_social_activity+'][temp_employee_social_activity_year_in]">';
            t += '</div>';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Tahun Keluar</label>';
              t += '<input type="text" class="form-control" name="temp_employee_social_activity['+key_social_activity+'][temp_employee_social_activity_year_out]">';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Jabatan Terakhir</label>';
              t += '<input type="text" class="form-control" name="temp_employee_social_activity['+key_social_activity+'][temp_employee_social_activity_last_position]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-group text-center">';
            t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
               t += '<i class="fa fa-trash"></i>';
            t += '</button>';
         t += '</div>';
      t += '</div>';

      $('#form-registration').find('.sect-social-activity').prepend(t);

      $('#form-registration .btn-remove').on('click', function (e) {
         $(this).parents('.form-group-attached').remove();
         e.preventDefault();
      });
   });

   $('.add-more-accident-history').on('click', function (e) {
      key_accident_history += 1;
      t = '';
      t += '<div class="col-md-6 mb-3 form-group-attached animated bounceIn" style="border: 1px solid #3b5169;">';
         t += '<div class="form-row">';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Jenis <span class="text-danger">*</span></label>';
              t += '<input type="text" class="form-control" name="temp_employee_accident_history['+key_accident_history+'][temp_employee_accident_history_accident_type]" required>';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Opname</label>';
              t += '<input type="text" class="form-control" name="temp_employee_accident_history['+key_accident_history+'][temp_employee_accident_history_opname_accident]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-row">';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Lama</label>';
              t += '<input type="text" class="form-control" name="temp_employee_accident_history['+key_accident_history+'][temp_employee_accident_history_accident_time]">';
            t += '</div>';
            t += '<div class="col-md-3 mb-3">';
               t += '<label>Tahun</label>';
              t += '<input type="text" class="form-control" name="temp_employee_accident_history['+key_accident_history+'][temp_employee_accident_history_year_accident]">';
            t += '</div>';
            t += '<div class="col-md-6 mb-3">';
               t += '<label>Gangguan  yg. ada sampai sekarang</label>';
              t += '<input type="text" class="form-control" name="temp_employee_accident_history['+key_accident_history+'][temp_employee_accident_history_interference_accident]">';
            t += '</div>';
         t += '</div>';
         t += '<div class="form-group text-center">';
            t += '<button type="button" class="btn waves-effect waves-light btn-danger btn-remove btn-sm align-items-center">';
               t += '<i class="fa fa-trash"></i>';
            t += '</button>';
         t += '</div>';
      t += '</div>';

      $('#form-registration').find('.sect-accident-history').prepend(t);

      $('#form-registration .btn-remove').on('click', function (e) {
         $(this).parents('.form-group-attached').remove();
         e.preventDefault();
      });
   });

   $('.add-more-other-contact').on('click', function (e) {
      key_other_contact += 1;
      t = '';
      t += '<div class="col-md-6 mb-3 form-group-attached animated bounceIn" style="border: 1px solid #3b5169;">';
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

      $('#form-registration').find('.sect-other-contact').prepend(t);

      $('#form-registration .btn-remove').on('click', function (e) {
         $(this).parents('.form-group-attached').remove();
         e.preventDefault();
      });
   });


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

 });