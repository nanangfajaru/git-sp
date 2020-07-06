{{-- {{dd($model)}} --}}
<style>
.jus {
  text-align: justify;
  text-justify: inter-word;
}
</style>
<table width="100%" border="0">
	<tr>
		<td colspan="3" align="left">
			Formulir Pemberitahuan Serikat Pekerja/Serikat Buruh/Federasi Serikat Pekerja/Serikat Buruh/Konfederasi Serikat Pekerja/Serikat Buruh.<hr>
			{{-- <br> --}}
		</td>
	</tr>
	<tr>
		<td width="20%"></td>
		<td width="80%" align="right" colspan="2">
			Lampiran I : Keputusan Menteri Tenaga Kerja Transmigrasi tentang
							<br>Tata Cara Pencatatan Serikat Pekerja/Serikat Buruh
							<br>Nomor : Kep.16/Men/2001 Tanggal : 15 Februari 2001
							<br> --------------------------------------------------------------------
							<br>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="right"><br>{{ ucwords(strtolower($model->nama_provinsi)) }}, {{ \Carbon\Carbon::now()->formatLocalized('%d %B %Y')}}</td>
	</tr>
	<tr>
		<td colspan="3">
			<br/>
			{{-- <br/> --}}
			<table border='0' width="100%">
				<tr>
					<td width="15%">
						Nomor
					</td>
					<td width="2%">
						:
					</td>
					<td width="40%">
						<b>{{ $model->serikat_pekerja_id }}</b>
					</td>
					<td>
						Kepada
					</td>
				</tr>
				<tr>
					<td >
						Lampiran
					</td>
					<td>
						:
					</td>
					<td>
						
					</td>
					<td>
						Yth. Kepada <b> 
							{{-- @if( $model->nama_jabatan == null )
							Belum di isi
							@else
							{{ $model->nama_jabatan }}                          
							@endif --}}
						
						
					</td>
				</tr>
				<tr>
					<td valign="top">
						Perihal
					</td>
					<td valign="top">
						:
					</td>

					<td>
						Pemberitahuan dan Permohonan <br/>
						Pencatatan Serikat Pekerja/Serikat <br/>
						Buruh
					</td>
					<td valign="top">
						 di <br/>
						 <b> {{ ucwords(strtolower($model->nama_provinsi)) }} </b>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3" class="jus" >
			<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan Pasal 2 Keputusan Menteri Tenaga Kerja dan Transmigrasi No. Kep.
			16/Men/2001 tanggal 15 Februari 2001 tentang Tata Cara Pencatatan Serikat
			Pekerja/Serikat Buruh, maka kami yang bertanda tangan di bawah ini:<br/>
			1. Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:   ......................................................................................................<br/>
			&nbsp;&nbsp;&nbsp;&nbsp;Jabatan &nbsp;&nbsp;&nbsp;:   .......................................................................................................<br/> 
			2. Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:   ......................................................................................................<br/>
			&nbsp;&nbsp;&nbsp;&nbsp;Jabatan &nbsp;&nbsp;&nbsp;:   .......................................................................................................<br/>
			
			<br/>
			dengan ini memberitahukan telah terbentuk Serikat Pekerja/Serikat Buruh Federasi, <br/>
 			Serikat Pekerja/Serikat Buruh/Konfederasi Serikat Pekerja/Serikat Buruh  *)  kami
		</td>
	</tr>

	<tr>
		<td colspan="3">
			<table width="100%" border="0">
					<tr>
						<td width="20%">Bernama</td>
						<td width="3%">:</td>
						<td><b>{{ $model->serikat_pekerja_desc }}</b></td>
					</tr>
					<tr>
						<td>Berkedudukan di</td>
						<td>:</td>
						<td><b>{{ ucwords(strtolower($model->nama_provinsi)) }}</b></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><b>{{ $model->alamat }}</b></td>
					</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3">
		dan mohon untuk dicatat guna memenuhi ketentuan Undang-Undang No 21 tahun 2000
		</td>
	</tr>
	<tr>
		<td colspan="3" class="jus" >
			<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sebagai kelengkapan pemberitahuan tersebut, maka bersama ini kami lampirkan: <br/>
 
a) daftar nama anggota pembentuk <br/>
b) anggaran dasar dan anggaran rumah tangga <br/> 
c) susunan dan nama pengurus <br/>
 
			<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian pemberitahuan ini kami ajukan untuk mendapatkan Nomor Bukti
Pencatatan dengan ucapan terima kasih. 

			<br>
		</td>
	</tr>
	{{-- <tr>
		<td align="right" colspan="3">
			<br>
			<br>
			{{ $model->nama_provinsi }},
			{{ \Carbon\Carbon::parse($model->change_status_date)->formatLocalized('%d %B %Y')}}
		</td>
	</tr> --}}
	<tr>
		<td align="right">
		</td>
		<td align="right">
		</td>
		<td align="center" width="35%">
			<br>
{{-- 			Kepala,<br>
			@if( $model->nama_jabatan == null )
			Belum di isi
            @else
             {{ $model->nama_jabatan }}                          
            @endif
			
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			@if( $model->nama_pejabat == null )
			Belum di isi
            @else
             {{ $model->nama_pejabat }}                          
			@endif --}}
			@php
			$validate = '/validate/' ;
			@endphp
			<img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(200)->generate( Request::root().$validate.$url )) }} ">
		</td>
	</tr>
</table>
{{-- <table>
	<tr>
		<td width="50%" class="text-wrap">
			{{Request::root().$validate.$url}}
		</td>
	</tr>
</table> --}}