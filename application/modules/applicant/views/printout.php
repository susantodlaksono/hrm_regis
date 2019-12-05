<html>
	<head>
		<style type="text/css">
			td{
				/*font-size: 12px;*/
				/*padding:px;*/
				/*border: 1px solid;*/
				font-size: 11px;
				border: 1px solid #eaeaea;
			}
			table{
				border:1px solid #eaeaea;
			}
			th{
				font-size: 11px;
			}
		</style>
	</head>

	<body>
		<table style="width: 100%;" border="0">
			<tr>
				<td style="padding: 5px;">
					<img src="<?php echo base_url() ?>logo.png" width="150" height="45">
				</td>
				<td style="text-align:center;padding: 5px;">
					<b>
						<span style="font-size: 25px;border-bottom: 1px solid black;">BIODATA PELAMAR</span><br>
						<span style="font-size: 12px;">PT. EBDESK TEKNOLOGI</span>
					</b>
				</td>
				<td style="font-size: 12px;padding: 5px;">
					<p>Nomor</p>
					<p>Revisian</p>
					<p>Halaman</p>
				</td>
				<td style="font-size: 12px;padding: 5px;">
					<p>:</p>
					<p>:</p>
					<p>:</p>
				</td>
				<td style="font-size: 12px;padding: 5px;">
					<p>FORM/HR/003</p>
					<p>...........</p>
					<p><i>Hal 1 dari 4</i></p>
				</td>
			</tr>
		</table>
		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td style="font-weight: bold;" width="250">Posisi / pekerjaan  yang dilamar</td>
				<td width="10">:</td>
				<td>Programmer</td>
			</tr>
			<tr>
				<td style="font-weight: bold;" width="10">Sumber Informasi</td>
				<td width="10">:</td>
				<td>Koran</td>
			</tr>
		</table>
		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td colspan="5" style="font-size: 15px;font-weight: bold;background-color: #eaeaea;">
					<span style="color: #336d28;">A.IDENTITAS DIRI</span>
				</td>
			</tr>
			<tr>
				<td style="font-weight: bold;" width="170">Nama Lengkap</td>
				<td width="10">:</td>
				<td colspan="2" width="330"><?php echo $temp_employee['fullname'] ? $temp_employee['fullname'] : '' ?></td>
				<td rowspan="8" align="right">
					<!-- <img src="<?php echo base_url() ?>1.jpg" width="190" height="230"> -->
					<?php if($temp_image){ ?>
						<img src="<?php echo base_url() ?>files/applicant/photos/<?php echo $temp_image['file_name'] ? $temp_image['file_name'] : '' ?>" width="190" height="230">
					<?php }else{ ?>
						<img src="<?php echo base_url() ?>noimage.jpg" width="190" height="230">
					<?php } ?>
				</td>

			</tr>
			<tr>
				<td style="font-weight: bold;">Nama Panggilan</td>
				<td width="10">:</td>
				<td colspan="2"><?php echo $temp_employee['nickname'] ? $temp_employee['nickname'] : '' ?></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Tempat, tanggal lahir</td>
				<td width="10">:</td>
				<td colspan="2">
				<?php echo $temp_employee['birth_place'] ? $temp_employee['birth_place'] : '' ?> , <?php echo $temp_employee['birth_date'] ? date('d/M/Y', strtotime($temp_employee['birth_date'])) : '' ?>
				</td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Jenis Kelamin</td>
				<td width="10">:</td>
				<td colspan="2">
					<?php echo $temp_employee['gender'] == 1 ? 'Laki-laki' : 'Perempuan' ?>
				</td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Agama</td>
				<td width="10">:</td>
				<td><?php echo $temp_employee['religion'] ? $this->master_employee->switchReligion($temp_employee['religion']) : '' ?></td>
				<td rowspan="4" valign="middle">
				 	<p style="font-weight: bold;">Status Perkawinan :</p>
					<p style="<?php echo $temp_employee['married_status'] == 1 ? 'background-color: #c4c9ca' : '' ?>">- Belum menikah</p>
					<p style="<?php echo $temp_employee['married_status'] == 2 ? 'background-color: #c4c9ca' : '' ?>">- Menikah</p>
					<p style="<?php echo $temp_employee['married_status'] == 3 ? 'background-color: #c4c9ca' : '' ?>">- Cerai</p> 
					<p style="<?php echo $temp_employee['married_status'] == 4 ? 'background-color: #c4c9ca' : '' ?>">- Cerai, menikah lagi</p>
				</td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Tinggi</td>
				<td width="10">:</td>
				<td><?php echo $temp_employee['height'] ? $temp_employee['height'] : '' ?> CM</td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Berat</td>
				<td width="10">:</td>
				<td><?php echo $temp_employee['weight'] ? $temp_employee['weight'] : '' ?> Kg</td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Warga negara</td>
				<td width="10">:</td>
				<td><?php echo $temp_employee['citizenship'] ? $temp_employee['citizenship'] : '' ?></td>
			</tr>
		</table>

		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td style="font-weight: bold;" width="110">Alamat Asal</td>
				<td width="10" colspan="5">:</td>
				<td style="font-weight: bold;">Alamat Tinggal</td>
				<td width="10" colspan="5">:</td>
			</tr>
			<tr>
				<td colspan="6"><?php echo $temp_employee_card['alamat'] ? $temp_employee_card['alamat'] : '' ?></td>
				<td colspan="6"><?php echo $temp_employee_place['alamat'] ? $temp_employee_place['alamat'] : '' ?></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Kota/Propinsi</td>
				<td width="10">:</td>
				<td colspan="4">
					<?php echo $temp_employee_card['kota'] ? $temp_employee_card['kota'] : '' ?> /	
					<?php echo $temp_employee_card['provinsi'] ? $temp_employee_card['provinsi'] : '' ?>	
				</td>
				<td style="font-weight: bold;">Kota/Propinsi</td>
				<td width="10">:</td>
				<td colspan="4">
					<?php echo $temp_employee_place['kota'] ? $temp_employee_place['kota'] : '' ?> /	
					<?php echo $temp_employee_place['provinsi'] ? $temp_employee_place['provinsi'] : '' ?>
				</td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Kodepos</td>
				<td width="10">:</td>
				<td><?php echo $temp_employee_card['kode_pos'] ? $temp_employee_card['kode_pos'] : '' ?></td>
				<td style="font-weight: bold;">Telp</td>
				<td width="10">:</td>
				<td><?php echo $temp_employee['phone_number'] ? $temp_employee['phone_number'] : '' ?></td>
				<td style="font-weight: bold;">Kodepos</td>
				<td width="10">:</td>
				<td><?php echo $temp_employee_place['kode_pos'] ? $temp_employee_place['kode_pos'] : '' ?></td>
				<td style="font-weight: bold;">Telp</td>
				<td width="10">:</td>
				<td></td>
			</tr>
		</table>
		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td style="font-weight: bold;" width="110">KTP, No.</td>
				<td width="10">:</td>
				<td><?php echo $temp_employee_card['number_ktp'] ? $temp_employee_card['number_ktp'] : '' ?></td>
				<td rowspan="5" valign="top" colspan="2">
				 	<p style="font-weight: bold;">Rumah yang ditinggali :</p>
					<p style="<?php echo $temp_employee_card['residence'] == 2 ? 'background-color: #c4c9ca' : '' ?>">- Milik sendiri</p>
					<p style="<?php echo $temp_employee_card['residence'] == 1 ? 'background-color: #c4c9ca' : '' ?>">- Milik orang tua</p>
					<p style="<?php echo $temp_employee_card['residence'] == 3 ? 'background-color: #c4c9ca' : '' ?>">- Kontrak/sewa</p> 
					<p style="<?php echo $temp_employee_card['residence'] == 4 ? 'background-color: #c4c9ca' : '' ?>">- Indekost</p>
					<p style="<?php echo $temp_employee_card['residence'] == 5 ? 'background-color: #c4c9ca' : '' ?>">- Lain-lain</p>
				</td>
				<td rowspan="5" valign="top" colspan="2">
				 	<p style="font-weight: bold;">Kendaraan Jenis :</p>
					<p style="<?php echo $temp_employee_card['transport_status'] == 2 ? 'background-color: #c4c9ca' : '' ?>">- Milik sendiri</p>
					<p style="<?php echo $temp_employee_card['transport_status'] == 1 ? 'background-color: #c4c9ca' : '' ?>">- Milik orang tua</p>
					<p style="<?php echo $temp_employee_card['transport_status'] == 3 ? 'background-color: #c4c9ca' : '' ?>">- Milik kantor</p> 
					<p style="<?php echo $temp_employee_card['transport_status'] == 4 ? 'background-color: #c4c9ca' : '' ?>">- Lain-lain</p>
				</td>
			</tr>
			<tr>
				<td style="font-weight: bold;" width="110">SIM-C, No.</td>
				<td width="10">:</td>
				<td width="200"><?php echo $temp_employee_card['number_sim_c'] ? $temp_employee_card['number_sim_c'] : '' ?></td>
			</tr>
			<tr>
				<td style="font-weight: bold;" width="110">SIM-A, No.</td>
				<td width="10">:</td>
				<td><?php echo $temp_employee_card['number_sim_a'] ? $temp_employee_card['number_sim_a'] : '' ?></td>
			</tr>
			<tr>
				<td style="font-weight: bold;" width="110">SIM-B1, No.</td>
				<td width="10">:</td>
				<td><?php echo $temp_employee_card['number_sim_b1'] ? $temp_employee_card['number_sim_b1'] : '' ?></td>
			</tr>
			<tr>
				<td style="font-weight: bold;" width="110">SIM-B2, No.</td>
				<td width="10">:</td>
				<td><?php echo $temp_employee_card['number_sim_b2'] ? $temp_employee_card['number_sim_b2'] : '' ?></td>
			</tr>
			<tr>
				<td colspan="7" style="font-weight: bold;" width="110">Kegiatan pd waktu luang / hobby :</td>
			</tr>
			<tr>
				<td colspan="7"><?php echo $temp_employee['hobby'] ? $temp_employee['hobby'] : '' ?></td>
			</tr>
		</table>
		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td colspan="8" style="font-size: 15px;font-weight: bold;background-color: #eaeaea;">
					<span style="color: #336d28;">B.DATA KELUARGA</span>
				</td>
			</tr>
			<tr>
				<th rowspan="2" style="border: 1px solid #eaeaea;">Hubungan Keluarga</tH>
				<th rowspan="2" style="border: 1px solid #eaeaea;">Nama</tH>
				<th rowspan="2" style="border: 1px solid #eaeaea;">L/P</tH>
				<th rowspan="2" style="border: 1px solid #eaeaea;">Usia</tH>
				<th rowspan="2" style="border: 1px solid #eaeaea;">Pendidikan Terakhir</tH>
				<th colspan="2" style="border: 1px solid #eaeaea;">Pekerjaan Terakhir</tH>
				<th rowspan="2" style="border: 1px solid #eaeaea;">Keterangan</th>
			</tr>
			<tr>
				<th style="border: 1px solid #eaeaea;">Jabatan</th>
				<th style="border: 1px solid #eaeaea;">Perusahaan</th>
			</tr>
			<?php
			if($temp_employee_family){
				foreach ($temp_employee_family as $v) {
					echo '<tr>';
						echo '<td style="border: 1px solid #eaeaea;">'.$this->master_employee->switchFamilyRelation($v['family_relation']).'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['name'] ? $v['name'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['gender'] == 1 ? 'Laki-laki' : 'Perempuan').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['age'] ? $v['age'].' Tahun' : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.$this->master_employee->switchDegree($v['degree']).'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['last_job_position'] ? $v['last_job_position'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['last_job_company'] ? $v['last_job_company'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['description'] ? $v['description'] : '').'</td>';
					echo '</tr>';
				}
			}
			?>
		</table>
		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td style="font-size: 13px;" align="center">
					<span><i>PT EBDESK TEKNOLOGI<i></span>
				</td>
			</tr>
		</table>
		<pagebreak/>

		<table style="width: 100%;" border="0">
			<tr>
				<td style="padding: 5px;">
					<img src="<?php echo base_url() ?>logo.png" width="150" height="45">
				</td>
				<td style="text-align:center;padding: 5px;">
					<b>
						<span style="font-size: 25px;border-bottom: 1px solid black;">BIODATA PELAMAR</span><br>
						<span style="font-size: 12px;">PT. EBDESK TEKNOLOGI</span>
					</b>
				</td>
				<td style="font-size: 12px;padding: 5px;">
					<p>Nomor</p>
					<p>Revisian</p>
					<p>Halaman</p>
				</td>
				<td style="font-size: 12px;padding: 5px;">
					<p>:</p>
					<p>:</p>
					<p>:</p>
				</td>
				<td style="font-size: 12px;padding: 5px;">
					<p>FORM/HR/003</p>
					<p>...........</p>
					<p><i>Hal 2 dari 4</i></p>
				</td>
			</tr>
		</table>

		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td colspan="8" style="font-size: 15px;font-weight: bold;background-color: #eaeaea;">
					<span style="color: #336d28;">C.RIWAYAT PENDIDIKAN</span>
				</td>
			</tr>
		</table>
		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td colspan="8" style="font-size: 13px;font-weight: bold;background-color: #eaeaea">
					<span>1.Pendidikan Formal</span>
				</td>
			</tr>
			<tr>
				<th rowspan="2" style="border: 1px solid #eaeaea;">Tingkat</th>
				<th rowspan="2" style="border: 1px solid #eaeaea;">Nama Sekolah</th>
				<th rowspan="2" style="border: 1px solid #eaeaea;">Kota</th>
				<th colspan="2" style="border: 1px solid #eaeaea;">Tahun</tH>
				<th rowspan="2" style="border: 1px solid #eaeaea;">Bidang/Jurusan</tH>
				<th rowspan="2" style="border: 1px solid #eaeaea;">Lulus/Tidak</th>
				<th rowspan="2" style="border: 1px solid #eaeaea;">Nilai Rata-2</th>
			</tr>
			<tr>
				<th style="border: 1px solid #eaeaea;">Dari</th>
				<th style="border: 1px solid #eaeaea;">Sampai</th>
			</tr>
			<?php
			if($temp_employee_education){
				foreach ($temp_employee_education as $v) {
					echo '<tr>';
						echo '<td style="border: 1px solid #eaeaea;">'.$this->master_employee->switchDegree($v['degree']).'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['school_name'] ? $v['school_name'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['city'] ? $v['city'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['start'] ? $v['start'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['end'] ? $v['end'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['major'] ? $v['major'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['status'] == 1 ? 'Lulus' : 'Tidak').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['average_result'] ? $v['average_result'] : '').'</td>';
					echo '</tr>';
				}
			}
			?>
		</table>
		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td style="font-weight: bold;" colspan="6">Judul skripsi / karya tulis terakhir:</td>
			</tr>
			<tr>
				<td colspan="6"><?php echo $temp_employee_education_tesis['tesis_title'] ? $temp_employee_education_tesis['tesis_title'] : '' ?></td>
			</tr>
			<tr>
				<td style="font-weight: bold;" width="50">Nilai</td>
				<td width="10">:</td>
				<td width="70"><?php echo $temp_employee_education_tesis['tesis_result'] ? $temp_employee_education_tesis['tesis_result'] : '' ?></td>
				<td style="font-weight: bold;" width="250">Tidak diterbitkan / diterbitkan di:</td>
				<td width="10">:</td>
				<td><?php echo $temp_employee_education_tesis['tesis_publish'] ? $temp_employee_education_tesis['tesis_publish'] : '' ?></td>
			</tr>
		</table>
		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td colspan="8" style="font-size: 13px;font-weight: bold;background-color: #eaeaea">
					<span>2.Pendidikan Non-Formal</span>
				</td>
			</tr>
			<tr>
				<th style="border: 1px solid #eaeaea;">Jenis (Kursus/Lokakarya/Seminar /Pelatihan,dll)</th>
				<th style="border: 1px solid #eaeaea;">Bidang/Judul/Topik</th>
				<th style="border: 1px solid #eaeaea;">Penyelenggara</th>
				<th style="border: 1px solid #eaeaea;">Kota</th>
				<th style="border: 1px solid #eaeaea;">Lama Pendidikan</th>
				<th style="border: 1px solid #eaeaea;">Tahun Ikut Serta</th>
				<th style="border: 1px solid #eaeaea;">Dibiayai oleh</th>
			</tr>
			<?php
			if($temp_employee_education_nonformal){
				foreach ($temp_employee_education_nonformal as $v) {
					echo '<tr>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['type'] ? $v['type'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['title_education'] ? $v['title_education'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['organizer'] ? $v['organizer'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['city'] ? $v['city'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['duration'] ? $v['duration'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['year_register'] ? $v['year_register'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['financed_by'] ? $v['financed_by'] : '').'</td>';
					echo '</tr>';
				}
			}
			?>
		</table>

		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td colspan="8" style="font-size: 15px;font-weight: bold;background-color: #eaeaea;">
					<span style="color: #336d28;">D.KEMAMPUAN KHUSUS</span>
				</td>
			</tr>
		</table>
		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td colspan="5" style="font-size: 13px;font-weight: bold;background-color: #eaeaea">
					<span>1.Penguasaan bahasa asing dan daerah</span>
				</td>
			</tr>
			<tr>
				<th style="border: 1px solid #eaeaea;">Jenis Bahasa</th>
				<th style="border: 1px solid #eaeaea;">Mendengar</th>
				<th style="border: 1px solid #eaeaea;">Berbicara</th>
				<th style="border: 1px solid #eaeaea;">Membaca</th>
				<th style="border: 1px solid #eaeaea;">Menulis</th>
			</tr>
			<?php
			if($temp_employee_language_skill){
				foreach ($temp_employee_language_skill as $v) {
					echo '<tr>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['language'] ? $v['language'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['listening'] ? $v['listening'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['speaking'] ? $v['speaking'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['reading'] ? $v['reading'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['writing'] ? $v['writing'] : '').'</td>';
					echo '</tr>';
				}
			}
			?>
		</table>
		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td colspan="3" style="font-size: 13px;font-weight: bold;background-color: #eaeaea">
					<span>2.Penguasaan Komputer</span>
				</td>
			</tr>
			<tr>
				<td style="font-weight: bold;" width="255">Program Aplikasi Pengolah Kata</td>
				<td width="10">:</td>
				<td><?php echo $temp_employee_computer_skill['word_processing'] ? $temp_employee_computer_skill['word_processing'] : '' ?></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Program Aplikasi Pengolah Angka</td>
				<td width="10">:</td>
				<td><?php echo $temp_employee_computer_skill['number_processing'] ? $temp_employee_computer_skill['number_processing'] : '' ?></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Program Aplikasi Pengolah Data (Data base)</td>
				<td width="10">:</td>
				<td><?php echo $temp_employee_computer_skill['database_processing'] ? $temp_employee_computer_skill['database_processing'] : '' ?></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Lain-lain</td>
				<td width="10">:</td>
				<td><?php echo $temp_employee_computer_skill['others'] ? $temp_employee_computer_skill['others'] : '' ?></td>
			</tr>
		</table>
		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td style="font-size: 13px;" align="center">
					<span><i>PT EBDESK TEKNOLOGI<i></span>
				</td>
			</tr>
		</table>
		
		<pagebreak/>

		<table style="width: 100%;" border="0">
			<tr>
				<td style="padding: 5px;">
					<img src="<?php echo base_url() ?>logo.png" width="150" height="45">
				</td>
				<td style="text-align:center;padding: 5px;">
					<b>
						<span style="font-size: 25px;border-bottom: 1px solid black;">BIODATA PELAMAR</span><br>
						<span style="font-size: 12px;">PT. EBDESK TEKNOLOGI</span>
					</b>
				</td>
				<td style="font-size: 12px;padding: 5px;">
					<p>Nomor</p>
					<p>Revisian</p>
					<p>Halaman</p>
				</td>
				<td style="font-size: 12px;padding: 5px;">
					<p>:</p>
					<p>:</p>
					<p>:</p>
				</td>
				<td style="font-size: 12px;padding: 5px;">
					<p>FORM/HR/003</p>
					<p>...........</p>
					<p><i>Hal 3 dari 4</i></p>
				</td>
			</tr>
		</table>

		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td colspan="4" style="font-size: 15px;font-weight: bold;background-color: #eaeaea;">
					<span style="color: #336d28;">E.RIWAYAT PEKERJAAN (mulai dari jabatan terbaru) </span>
				</td>
			</tr>
			<?php
			if($temp_employee_work_history){
				foreach ($temp_employee_work_history as $v) {
					echo '<tr>';
						echo '<td style="font-weight: bold;" width="300">Nama/Alamat/Telpon Perusahaan/Bidang usaha :</td>';
						echo '<td width="20"></td>';
						echo '<td style="font-weight: bold;" width="150">Bulan & Tahun</td>';
						echo '<td style="font-weight: bold;" width="150">Jabatan</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td rowspan="2">'.($v['company_detail'] ? $v['company_detail'] : '').'</td>';
						echo '<td style="font-weight: bold;" width="50">Masuk</td>';
						echo '<td width="150">'.($v['work_in'] ? $v['work_in'] : '').'</td>';
						echo '<td width="150">'.($v['work_in_position'] ? $v['work_in_position'] : '').'</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td style="font-weight: bold;" width="50">Keluar</td>';
						echo '<td width="150">'.($v['work_out'] ? $v['work_out'] : '').'</td>';
						echo '<td width="150">'.($v['work_out_position'] ? $v['work_out_position'] : '').'</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td colspan="2"><span style="font-weight: bold;">Div/Dept/Bagian/Area :</span> '.($v['division'] ? $v['division'] : '').'</td>';
						echo '<td colspan="2"><span style="font-weight: bold;">Uraian tugas pada jabatan terakhir:</span></td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td colspan="2"><span style="font-weight: bold;">Nama atasan terakhir :</span> '.($v['company_head'] ? $v['company_head'] : '').'</td>';
						echo '<td rowspan="5" colspan="2" valign="top">'.($v['work_description'] ? $v['work_description'] : '').'</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td colspan="2"><span style="font-weight: bold;">Gaji Terakhir :</span> '.($v['last_salary'] ? $v['last_salary'] : '').'</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td colspan="2"><span style="font-weight: bold;">Status tetap/kontrak :</span> '.($v['status_work'] ? $v['status_work'] : '').'</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td colspan="2"><span style="font-weight: bold;">Alasan Keluar :</span></td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td colspan="2">'.($v['out_reason'] ? $v['out_reason'] : '').'</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td colspan="4" style="background-color:#eaeaea;"></td>';
					echo '</tr>';
				}
			}
			?>
		</table>

		<pagebreak/>
		
		<table style="width: 100%;" border="0">
			<tr>
				<td style="padding: 5px;">
					<img src="<?php echo base_url() ?>logo.png" width="150" height="45">
				</td>
				<td style="text-align:center;padding: 5px;">
					<b>
						<span style="font-size: 25px;border-bottom: 1px solid black;">BIODATA PELAMAR</span><br>
						<span style="font-size: 12px;">PT. EBDESK TEKNOLOGI</span>
					</b>
				</td>
				<td style="font-size: 12px;padding: 5px;">
					<p>Nomor</p>
					<p>Revisian</p>
					<p>Halaman</p>
				</td>
				<td style="font-size: 12px;padding: 5px;">
					<p>:</p>
					<p>:</p>
					<p>:</p>
				</td>
				<td style="font-size: 12px;padding: 5px;">
					<p>FORM/HR/003</p>
					<p>...........</p>
					<p><i>Hal 4 dari 4</i></p>
				</td>
			</tr>
		</table>

		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td colspan="5" style="font-size: 15px;font-weight: bold;background-color: #eaeaea;">
					<span style="color: #336d28;">F.LAIN-LAIN</span>
				</td>
			</tr>
		</table>
		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td colspan="5" style="font-size: 13px;font-weight: bold;background-color: #eaeaea">
					<span>1.Aktivitas Sosial</span>
				</td>
			</tr>
			<tr>
				<th style="border: 1px solid #eaeaea;">Nama Organisasi</th>
				<th style="border: 1px solid #eaeaea;">Jenis Kegiatan</th>
				<th style="border: 1px solid #eaeaea;">Tahun Masuk</th>
				<th style="border: 1px solid #eaeaea;">Tahun Keluar</th>
				<th style="border: 1px solid #eaeaea;">Jabatan terakhir</th>
			</tr>
			<?php
			if($temp_employee_social_activity){
				foreach ($temp_employee_social_activity as $v) {
					echo '<tr>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['organization_name'] ? $v['organization_name'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['organization_type'] ? $v['organization_type'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['year_in'] ? $v['year_in'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['year_out'] ? $v['year_out'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['last_position'] ? $v['last_position'] : '').'</td>';
					echo '</tr>';
				}
			}
			?>
		</table>

		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td colspan="5" style="font-size: 13px;font-weight: bold;background-color: #eaeaea">
					<span>2.Sakit/Kecelakaan yang pernah dialami</span>
				</td>
			</tr>
			<tr>
				<th style="border: 1px solid #eaeaea;">Jenis</th>
				<th style="border: 1px solid #eaeaea;">Lama</th>
				<th style="border: 1px solid #eaeaea;">Tahun</th>
				<th style="border: 1px solid #eaeaea;">Opname</th>
				<th style="border: 1px solid #eaeaea;">Gangguan  yg. ada sampai sekarang</th>
			</tr>
			<?php
			if($temp_employee_accident_history){
				foreach ($temp_employee_accident_history as $v) {
					echo '<tr>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['accident_type'] ? $v['accident_type'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['accident_time'] ? $v['accident_time'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['year_accident'] ? $v['year_accident'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['opname_accident'] ? $v['opname_accident'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['interference_accident'] ? $v['interference_accident'] : '').'</td>';
					echo '</tr>';
				}
			}
			?>
		</table>

		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<th style="border: 1px solid #eaeaea;">Pertanyaan</th>
				<th style="border: 1px solid #eaeaea;">Ya/Tidak</th>
				<th style="border: 1px solid #eaeaea;">Penjelasan</th>
			</tr>
			<?php
			if($temp_empoyee_faq_question_answers){
				foreach ($temp_empoyee_faq_question_answers as $v) {
					if($v['option_type'] == '_option'){
						echo '<tr>';
							echo '<td style="border: 1px solid #eaeaea;font-weight:bold;">'.($v['question_faq'] ? $v['question_faq'] : '').'</td>';
							echo '<td style="border: 1px solid #eaeaea;">'.($v['faq_answers'] ? $v['faq_answers'] : '').'</td>';
							echo '<td style="border: 1px solid #eaeaea;">'.($v['faq_description'] ? $v['faq_description'] : '').'</td>';
						echo '</tr>';
					}
					if($v['option_type'] == '_text'){
						echo '<tr>';
							echo '<td colspan="4" style="border: 1px solid #eaeaea;">';
							echo '<span style="font-weight:bold">'.($v['question_faq'] ? $v['question_faq'] : '').'</span>&nbsp;';
							echo ''.($v['faq_description'] ? $v['faq_description'] : '').'';
							echo '</td>';
						echo '</tr>';
					}
				}
			}
			?>
		</table>
		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td style="border: 1px solid #eaeaea;font-weight: bold" colspan="4">Sebutkan minimal 2 (dua) orang yang bukan keluarga dan dapat dihubungi untuk dimintakan rekomendasi</th>
			</tr>
			<tr>
				<th style="border: 1px solid #eaeaea;">Nama</th>
				<th style="border: 1px solid #eaeaea;">Hubungan Dgn.Anda</th>
				<th style="border: 1px solid #eaeaea;">Alamat & No telepon</th>
				<th style="border: 1px solid #eaeaea;">Pekerjaan</th>
			</tr>
			<?php
			if($temp_employee_other_contact){
				foreach ($temp_employee_other_contact as $v) {
					echo '<tr>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['name'] ? $v['name'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['relation_status'] ? $v['relation_status'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['address_phone'] ? $v['address_phone'] : '').'</td>';
						echo '<td style="border: 1px solid #eaeaea;">'.($v['job'] ? $v['job'] : '').'</td>';
					echo '</tr>';
				}
			}
			?>
		</table>

		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td rowspan="6" style="font-size: 13px;font-weight: bold;">
					<span style="color:red">
						Semua keterangan di atas adalah benar adanya sampai dengan tanggal dibuatnya keterangan tersebut.  Apabila di kemudian hari ternyata terdapat atau ditemukan   hal-hal yang tidak benar mengenai keterangan saya di atas, maka saya bersedia diberhentikan tanpa syarat apapun. 
					</span>
				</td>
				<td style="font-size: 13px" align="center">
				 	Bandung,   ...................... 20...... 
				</td>
			</tr>
			<tr>
				<td style="font-size: 13px;font-weight: bold;" align="center">
				 	<span style="font-weight: bold">Yang bersangkutan, </span>
				</td>
			</tr>
			<tr>
				<td style="font-size: 13px;" valign="bottom" height="70">
				 	(..............................................................................)
				</td>
			</tr>
		</table>
		<table style="width: 100%;margin-top: 10px;" border="0">
			<tr>
				<td style="font-size: 13px;" align="center">
					<span><i>PT EBDESK TEKNOLOGI<i></span>
				</td>
			</tr>
		</table>
	</body>
</html>