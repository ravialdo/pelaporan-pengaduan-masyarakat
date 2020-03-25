<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4>Generate Laporan</h4>
			</div>
			<div class="card-body">
			
				<x-alert type="warning">
					Pilih tanggal yang ingin kamu buatkan laporannya, berdasarkan dari tanggal berapa dan sampai tanggal berapa
				</x-alert>
				
				<form method="post" action="{{ route('laporan.generate') }}">
					@csrf
					
					<div class="form-group">
						<label>Bulan</label>
						<select class="form-control" name="bulan">
							<option value="">Pilih Bulan</option>
							<option value="1">Januari</option>
							<option value="2">Februari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option vakue="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
					</div>
					
					<div class="form-group">
						<label>Tahun</label>
						<input type="years" class="form-control" name="tahun">
						<div class="text-small">
							Tahun minimal harus 4 digit
						</div>
					</div>
					
					<button type="submit" class="btn btn-primary float-right">
						<i class="fas fa-file-alt"></i> Generate
					</button>
				
				</form>
			</div>
		</div>
	</div>
</div>