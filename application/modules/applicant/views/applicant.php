   <div class="row ebdesk-breadcrumb">
   <div class="col-md-2">
      <h3 class="page-title" style="color: #fff;"><?php echo $title ?></h3>
   </div>
   <div class="col-md-10">
      <ul class="nav nav-pills justify-content-end ebdesk-nav-tab">
         <!-- <li class="nav-item ebdesk-tab"> 
            <a href="#navpills-1" class="nav-link ebdesk-tab-link" data-toggle="tab" aria-expanded="false">Informasi</a> 
         </li> -->
         <li class="nav-item ebdesk-tab"> 
            <a href="#navpills-2" class="nav-link active show ebdesk-tab-link" data-toggle="tab" aria-expanded="false">Identitas Diri</a> 
         </li>
         <li class="nav-item ebdesk-tab"> 
            <a href="#navpills-3" class="nav-link ebdesk-tab-link tab-family" data-toggle="tab" aria-expanded="true">Keluarga</a> 
         </li>
         <li class="nav-item ebdesk-tab"> 
            <a href="#navpills-4" class="nav-link ebdesk-tab-link tab-education" data-toggle="tab" aria-expanded="true">Pendidikan</a> 
         </li>
         <li class="nav-item ebdesk-tab"> 
            <a href="#navpills-5" class="nav-link ebdesk-tab-link tab-education-non" data-toggle="tab" aria-expanded="true">Pendidikan Non Formal</a> 
         </li>
         <li class="nav-item ebdesk-tab"> 
            <a href="#navpills-6" class="nav-link ebdesk-tab-link tab-skill-set" data-toggle="tab" aria-expanded="true">Kemampuan Khusus</a> 
         </li>
         <li class="nav-item ebdesk-tab"> 
            <a href="#navpills-7" class="nav-link ebdesk-tab-link tab-job-history" data-toggle="tab" aria-expanded="true">Riwayat Pekerjaan</a> 
         </li>
         <li class="nav-item ebdesk-tab"> 
            <a href="#navpills-9" class="nav-link ebdesk-tab-link tab-social-activity" data-toggle="tab" aria-expanded="true">Aktivitas Sosial</a> 
         </li>
         <li class="nav-item ebdesk-tab"> 
            <a href="#navpills-10" class="nav-link ebdesk-tab-link tab-accident-history" data-toggle="tab" aria-expanded="true">Riwayat Penyakit</a> 
         </li>
         <li class="nav-item ebdesk-tab"> 
            <a href="#navpills-8" class="nav-link ebdesk-tab-link tab-other" data-toggle="tab" aria-expanded="true">Lain-lain</a> 
         </li>
      </ul>
   </div>
</div>
<div class="row">
   <div class="col-12">
      <div class="tab-content br-n pn">
         <div id="navpills-2" class="tab-pane active">
            <form id="form-basic-employee" class="needs-validation" novalidate>
            <div class="form-row">
               <div class="col-md-12 text-right">
                  <button type="submit" class="btn btn-info text-right">PERBAHARUI</button>
               </div>
            </div>
            <div class="form-row">
               <div class="col-md-6 mb-3">
                  <label>Nama Lengkap <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="temp_employee_fullname" requiring>
               </div>
               <div class="col-md-6 mb-3">
                  <label>Nama Panggilan</label>
                  <input type="text" class="form-control" name="temp_employee_nickname">
               </div>
            </div>
            <div class="form-row">
               <div class="col-md-4 mb-3">
                  <label>Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" name="temp_employee_email" placeholder="Email utama anda..." requiring>
               </div>
               <div class="col-md-4 mb-3">
                  <label>No Whatsapp <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" name="temp_employee_phone_number" requiring>
               </div>
               <div class="col-md-4 mb-3">
                  <label>Golongan Darah <span class="text-danger">*</span></label>
                  <select name="temp_employee_blood_group" class="form-control" requiring>
                     <option value="O">O</option>
                     <option value="AB">AB</option>
                     <option value="B">B</option>  
                     <option value="A">A</option>
                  </select>
               </div>
            </div>
            <div class="form-row">
               <div class="col-md-6 mb-3">
                  <label>Tempat Lahir <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="temp_employee_birth_place" requiring>
               </div>
               <div class="col-md-6 mb-3">
                  <label>Tgl Lahir <span class="text-danger">*</span></label>
                  <input type="hidden" class="form-control" name="temp_employee_birth_date">
                  <input type="text" class="form-control dp" data-source="temp_employee_birth_date" requiring>
               </div>
            </div> 
            <div class="form-row">
               <div class="col-md-4 mb-3">
                  <label>Jenis Kelamin <span class="text-danger">*</span></label>
                  <select class="form-control" name="temp_employee_gender" requiring>
                     <option value="1">Laki-Laki</option>
                     <option value="2">Perempuan</option>
                  </select>
               </div>
               <div class="col-md-4 mb-3">
                  <label>Agama <span class="text-danger">*</span></label>
                   <select class="form-control" name="temp_employee_religion" requiring>
                     <option value="1">Islam</option>
                     <option value="2">Protestan</option>
                     <option value="3">Katolik</option>
                     <option value="4">Hindu</option>
                     <option value="5">Budha</option>
                  </select>
               </div>
               <div class="col-md-4 mb-3">
                  <label>Status Pernikahan <span class="text-danger">*</span></label>
                  <select class="form-control" name="temp_employee_married_status" requiring>
                     <option value="1">Belum Menikah</option>
                     <option value="2">Menikah</option>
                     <option value="3">Cerai</option>
                     <option value="4">Cerai, Menikah Lagi</option>
                  </select>
               </div>
            </div>
            <div class="form-row">
               <div class="col-md-4 mb-3">
                  <label>Tinggi</label>
                  <input type="number" class="form-control" name="temp_employee_height">
               </div>
               <div class="col-md-4 mb-3">
                  <label>Berat</label>
                  <input type="number" class="form-control" name="temp_employee_weight">
               </div>
               <div class="col-md-4 mb-3">
                  <label>Kewarganegaraan <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="temp_employee_citizenship" requiring>
               </div>
            </div>
            <div class="form-row">
               <div class="col-md-6 mb-3">
                  <h5 class="font-weight-bold text-center">Alamat Asal/KTP</h5>
                  <div class="form-row">
                     <div class="col-md-12 mb-3">
                        <label>No KTP <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="temp_employee_card_number_ktp" requiring>
                     </div>
                     <div class="col-md-12 mb-3">
                        <label>Alamat Asal <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="temp_employee_card_alamat" requiring>
                     </div>
                     <div class="col-md-12 mb-3">
                        <label>Kota <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="temp_employee_card_kota" requiring>
                     </div>
                     <div class="col-md-12 mb-3">
                        <label>Provinsi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="temp_employee_card_provinsi" requiring>
                     </div>
                     <div class="col-md-12 mb-3">
                        <label>Kode Pos</label>
                        <input type="number" class="form-control" name="temp_employee_card_kode_pos">
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="col-md-6 mb-3">
                        <label>RT <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="temp_employee_card_rt" requiring>
                     </div>
                     <div class="col-md-6 mb-3">
                        <label>RW <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="temp_employee_card_rw" requiring>
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="col-md-6 mb-3">
                        <label>kecamatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="temp_employee_card_kecamatan" requiring>
                     </div>
                     <div class="col-md-6 mb-3">
                        <label>Kelurahan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="temp_employee_card_kelurahan" requiring>
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="col-md-12 mb-3">
                        <label>Rumah yang ditinggali <span class="text-danger">*</span></label>
                        <select class="form-control" name="temp_employee_card_residence" requiring>
                           <option value="1">Milik Orang Tua</option>
                           <option value="2">Milik Sendiri</option>
                           <option value="3">Kontrak/Sewa</option>
                           <option value="4">Indekost</option>
                           <option value="5">Lain-lain</option>
                        </select>
                     </div>   
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <h5 class="font-weight-bold text-center">Alamat Tinggal</h5>
                  <div class="form-row">
                     <div class="col-md-12 mb-3">
                        <label>Alamat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="temp_employee_place_alamat" requiring>
                     </div>
                     <div class="col-md-12 mb-3">
                        <label>Kota <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="temp_employee_place_kota" requiring>
                     </div>
                     <div class="col-md-12 mb-3">
                        <label>Provinsi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="temp_employee_place_provinsi" requiring>
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="col-md-4 mb-3">
                        <label>RT</label>
                        <input type="number" class="form-control" name="temp_employee_place_rt">
                     </div>
                     <div class="col-md-4 mb-3">
                        <label>RW</label>
                        <input type="number" class="form-control" name="temp_employee_place_rw">
                     </div>
                      <div class="col-md-4 mb-3">
                        <label>Kode Pos</label>
                        <input type="number" class="form-control" name="temp_employee_place_kode_pos">
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="col-md-6 mb-3">
                        <label>kecamatan</label>
                        <input type="text" class="form-control" name="temp_employee_place_kecamatan">
                     </div>
                     <div class="col-md-6 mb-3">
                        <label>Kelurahan</label>
                        <input type="text" class="form-control" name="temp_employee_place_kelurahan">
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="col-md-6 mb-3">
                        <label>SIM C</label>
                        <input type="number" class="form-control" name="temp_employee_card_number_sim_c">
                     </div>
                     <div class="col-md-6 mb-3">
                        <label>SIM A</label>
                        <input type="number" class="form-control" name="temp_employee_card_number_sim_a">
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="col-md-6 mb-3">
                        <label>SIM B1</label>
                        <input type="number" class="form-control" name="temp_employee_card_number_sim_b1">
                     </div>
                     <div class="col-md-6 mb-3">
                        <label>SIM B2</label>   
                        <input type="number" class="form-control" name="temp_employee_card_number_sim_b2">
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="col-md-12 mb-3">
                        <label>Kendaraan</label>
                        <select class="form-control" name="temp_employee_card_transport_status">
                           <option value=""></option>
                           <option value="1">Milik Orang Tua</option>
                           <option value="2">Milik Sendiri</option>
                           <option value="3">Milik Kantor</option>
                           <option value="4">Lain-lain</option>
                        </select>
                     </div>   
                  </div>
               </div>
            </div> 
            <div class="form-row">
               <div class="col-md-12 mb-3">
                  <label>Kegiatan pada waktu luang</label>   
                  <input type="text" class="form-control" name="temp_employee_hobby">
               </div>
            </div>
            </form>
         </div>
         <div id="navpills-3" class="tab-pane">
            <form id="form-family-employee" class="needs-validation" novalidate>
            <div class="form-row">
               <div class="col-md-10 mb-3">
                  <a href="#" class="add-more-family text-danger"><i class="fa fa-plus"></i> Tambah Data</a>
               </div>
               <div class="col-md-2 text-right">
                  <button type="submit" class="btn btn-info text-right">PERBAHARUI</button>
               </div>
            </div>
            <div class="form-row sect-family"></div>
            </form>
         </div>
         <div id="navpills-4" class="tab-pane">
            <form id="form-education-employee" class="needs-validation" novalidate>
            <div class="form-row">
               <div class="col-md-12 text-right">
                  <button type="submit" class="btn btn-info text-right">PERBAHARUI</button>
               </div>
            </div>
            <div class="form-row">
               <div class="col-md-4 mb-3">
                  <label>Judul Skripsi / Karya Tulis Terakhir <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="temp_employee_education_tesis_tesis_title" requiring>
               </div>
               <div class="col-md-4 mb-3">
                  <label>Nilai <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="temp_employee_education_tesis_tesis_result" requiring>
               </div>
               <div class="col-md-4 mb-3">
                  <label>Diterbitkan di</label>
                  <input type="text" class="form-control" name="temp_employee_education_tesis_tesis_publish">
               </div>
            </div>
            <div class="form-row">
               <div class="col-md-12 mb-3">
                  <a href="#" class="add-more-education text-danger"><i class="fa fa-plus"></i> Tambah Data</a>
               </div>
            </div>
            <div class="form-row sect-education"></div>
            </form>
         </div>
         <div id="navpills-5" class="tab-pane">
            <form id="form-education-non-employee" class="needs-validation" novalidate>
            <div class="form-row">
               <div class="col-md-10 mb-3">
                  <a href="#" class="add-more-education-non text-danger"><i class="fa fa-plus"></i> Tambah Data</a>
               </div>
               <div class="col-md-2 text-right">
                  <button type="submit" class="btn btn-info text-right">PERBAHARUI</button>
               </div>
            </div>
            <div class="form-row sect-education-non"></div>
            </form>
         </div>
         <div id="navpills-6" class="tab-pane">
            <form id="form-language-employee" class="needs-validation" novalidate>
            <div class="form-row">
               <div class="col-md-12 text-right">
                  <button type="submit" class="btn btn-info text-right">PERBAHARUI</button>
               </div>
            </div>
            <div class="form-row">
               <div class="col-md-3 mb-3">
                  <label>Pengolah Kata</label>
                  <input type="text" class="form-control" name="temp_employee_computer_skill_word_processing">
               </div>
               <div class="col-md-3 mb-3">
                  <label>Pengolah Angka</label>
                  <input type="text" class="form-control" name="temp_employee_computer_skill_number_processing">
               </div>
               <div class="col-md-3 mb-3">
                  <label>Pengolah Data (Database)</label>
                  <input type="text" class="form-control" name="temp_employee_computer_skill_database_processing">
               </div>
               <div class="col-md-3 mb-3">
                  <label>Lain-lain</label>
                  <input type="text" class="form-control" name="temp_employee_computer_skill_others">
               </div>
            </div>
            <div class="form-row">
               <div class="col-md-12 mb-3">
                  <a href="#" class="add-more-language text-danger"><i class="fa fa-plus"></i> Tambah Kemampuan Bahasa</a>
               </div>
            </div>
            <div class="form-row sect-language"></div>
            </form>
         </div>
         <div id="navpills-7" class="tab-pane">
            <form id="form-job-history-employee" class="needs-validation" novalidate>
            <div class="form-row">
               <div class="col-md-10 mb-3">
                  <a href="#" class="add-more-job-history text-danger"><i class="fa fa-plus"></i> Tambah Data</a>
               </div>
               <div class="col-md-2 text-right">
                  <button type="submit" class="btn btn-info text-right">PERBAHARUI</button>
               </div>
            </div>
            <div class="form-row sect-job-history"></div>
            </form>
         </div>
         <div id="navpills-9" class="tab-pane">
            <form id="form-social-activity-employee" class="needs-validation" novalidate>
            <div class="form-row">
               <div class="col-md-10 mb-3">
                  <a href="#" class="add-more-social-activity text-danger"><i class="fa fa-plus"></i> Tambah Data</a>
               </div>
               <div class="col-md-2 text-right">
                  <button type="submit" class="btn btn-info text-right">PERBAHARUI</button>
               </div>
            </div>
            <div class="form-row sect-social-activity"></div>
            </form>
         </div>
         <div id="navpills-10" class="tab-pane">
            <form id="form-accident-history-employee" class="needs-validation" novalidate>
            <div class="form-row">
               <div class="col-md-10 mb-3">
                  <a href="#" class="add-more-accident-history text-danger"><i class="fa fa-plus"></i> Tambah Data</a>
               </div>
               <div class="col-md-2 text-right">
                  <button type="submit" class="btn btn-info text-right">PERBAHARUI</button>
               </div>
            </div>
            <div class="form-row sect-accident-history"></div>
            </form>
         </div>
         <div id="navpills-8" class="tab-pane">
            <form id="form-faq-answers-employee">
               <div class="form-row">
                  <div class="col-md-10 mb-3">
                     <a href="#" class="add-more-other-contact text-danger"><i class="fa fa-plus"></i> Tambah Kontak</a>
                  </div>
                  <div class="col-md-2 text-right">
                     <button type="submit" class="btn btn-info text-right">PERBAHARUI</button>
                  </div>
               </div>
               <div class="form-row sect-other-contact">
               </div>
               <div class="form-row sect-faq-answers">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>