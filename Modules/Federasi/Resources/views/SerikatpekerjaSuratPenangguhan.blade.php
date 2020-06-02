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
							<br>

		</td>
	</tr>
	<tr>
		<td colspan="2">
			<table border="0">
				<tr>
					<td>Nomor </td>
					<td>:</td>
					<td></td>
				</tr>
				<tr>
					<td>Lampiran</td>
					<td>:</td>
					<td></td>
				</tr>
				<tr>
					<td>Perihal</td>
					<td>:</td>
					<td>Penangguhan Pencatatan Serikat Pekerja/Serikat Buruh </td>
				</tr>
			</table>
		</td>
		<td align="center">
			{{ $model->nama_provinsi }}, {{ \Carbon\Carbon::now()->formatLocalized('%d %B %Y')}}
			<br>
			<br>
			Kepada <br>
			Yth. Sdr <b> {{ $model->serikat_pekerja_desc}} </b><br>
			di {{ $model->nama_provinsi }},

		</td>
	</tr>
	<tr>
		<td colspan="3" class="jus">
			<br>
			<br>
			<br>

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan surat pemberitahuan Saudara
				No <b> {{ $model->serikat_pekerja_id }} </b> tanggal <b> {{ \Carbon\Carbon::parse($model->kirim_date)->formatLocalized('%d %B %Y')}} </b> dengan ini di beritahukan bahwa
				permohonan Saudara belum memenuhi persyaratan Pasal 2 ayat (2)
				Keputusan Menteri Tenaga Kerja dan Transmigrasi No. Kep 16 Men 2001.
				<br>
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan dengan hal tersebut,dalam waktu 14 (empat belas)
				hari kerja, diminta agar Saudara melengkapi persyaratan sebagai berikut
				<br>
				1 ..........................................................................................................................................................
				<br>
				2 ..........................................................................................................................................................
				<br>
				Demikian pemberitahuan ini di sampaikan untuk dapat dipenuhi
				kelengkapan persyaratan.
		</td>
	</tr>
	<tr>
		<td colspan="2"></td>
		<td align="center">
			<br>
			<br>
			<br>
			Kepala,<br>
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
            @endif

		</td>
	</tr>
</table>