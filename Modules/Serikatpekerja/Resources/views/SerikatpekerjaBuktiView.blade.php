<style>
.jus {
  text-align: justify;
  text-justify: inter-word;
}
</style>
<table width="100%" border="0">
	<tr>
		<td colspan="3" align="left">
			Formulir Bukti Pencatatan Serikat Pekerja/Serikat Buruh/Federasi Serikat Pekerja/Serikat Buruh/Konfederasi Serikat Pekerja/Serikat Buruh.
			<hr>
			{{-- <br> --}}
		</td>
	</tr>
	<tr>
		<td width="20%"></td>
		<td width="80%" align="right" colspan="2">
			Lampiran II : Keputusan Menteri Tenaga Kerja Transmigrasi tentang
							<br>Tata Cara Pencatatan Serikat Pekerja/Serikat Buruh
							<br>Nomor : Kep.16/Men/2001 Tanggal : 15 Februari 2001
							<br> --------------------------------------------------------------------
							<br>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="center"><br><b><u>Tanda Bukti Pencatatan </u></b> <br></td>
	</tr>
	<tr>
		<td colspan="3" class="jus" >
			<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan Pasal 2 ayat (1) Keputusan Menteri Tenaga Kerja dan Transmigrasi
			No. Kep. 16/Men/2001 tanggal 15 Februari 2001 tentang Tata Cara Pencatatan Serikat
			pekerja / Serikat Buruh. Telah diterima pemberitahuan pembentukan/pencatatan kembali
			Serikat Pekerja/Serikat Buruh/Federasi Serikat Pekerja / Serikat Buruh/Konfederasi
			Serikat Pekerja/Serikat Buruh  yang

		</td>
	</tr>

	<tr>
		<td colspan="3">
			<table width="100%" border="0">
					<tr>
						<td width="20%">bernama</td>
						<td width="3%">:</td>
						<td><b>{{ $model->serikat_pekerja_desc }}</b></td>
					</tr>
					<tr>
						<td>alamat</td>
						<td>:</td>
						<td><b>{{ $model->alamat }}</b></td>
					</tr>
					<tr>
						<td>dengan suratnya No</td>
						<td>: </td>
						<td><b>{{ $model->serikat_pekerja_id }}</b> tanggal <b>
							{{-- {{ \Carbon\Carbon::create($model->kirim_date)->formmat('F Y') }} --}}
							{{ \Carbon\Carbon::parse($model->kirim_date)->formatLocalized('%d %B %Y')}}
						</td>
					</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3" class="jus" >
			<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kelengkapan persyaratan sesuai Pasal 2 ayat (2) Keputusan Menteri Tenaga
			Kerja dan Transmigrasi No. Kep. 16/Men/2001 telah dipenuhi, dan telah kami catat
			dengan <br>
			Nomor Bukti Pencatatan <b>{{ $model->no_catat }}</b> 
			tanggal
			<b>
				{{ \Carbon\Carbon::parse($model->change_status_date)->formatLocalized('%d %B %Y')}}
			</b>

			<br>
		</td>
	</tr>
	<tr>
		<td align="right" colspan="3">
			<br>
			<br>
			{{ $model->nama_provinsi }},
			{{ \Carbon\Carbon::parse($model->change_status_date)->formatLocalized('%d %B %Y')}}
		</td>
	</tr>
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

    		<img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(220)->generate( $model->no_catat )) }} ">
		</td>
	</tr>

</table>