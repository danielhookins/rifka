<?php namespace rifka\Http\Controllers\Search;

use rifka\Http\Controllers\Search\SearchController;
use rifka\Http\Requests;
use Illuminate\Http\Request;
use rifka\Kasus;
use DB;

class KasusSearchController extends SearchController {

	public function getType()
	{
		return "kasus";
	}

	public function search(Request $request)
	{
		$input = \Input::get();

		// Search by case id
		if ($input["kasus_id"] != null) return $this->searchByID($input["kasus_id"]);

		$query = $this->buildQuery($input);

		return view('search.kasus-results')
			->with('results', $query->get());
	}

	private function searchByID($kasus_id)
	{
		if ($kasus = Kasus::find($kasus_id)) {
			return redirect()->route('kasus.show', $kasus->kasus_id);
		} else {
			return redirect('404');
		}
	}

	private function buildQuery($input)
	{
		$query = DB::table('kasus');
		$select = array('kasus.kasus_id', 
										'kasus.jenis_kasus',
										DB::raw('YEAR(kasus.created_at) AS tahun'),
										'klien.klien_id',
										'klien.nama_klien',
										'klien_kasus.jenis_klien',
										'kasus.created_at');

		// Case
		if(isset($input["jenis_kasus"]) && $input["jenis_kasus"] != null) {
			$query->where('jenis_kasus', $input["jenis_kasus"]);
		}
		if(isset($input["tahun"]) && $input["tahun"] != null) {
			$query->where(DB::raw('YEAR(kasus.created_at)'), '=', $input["tahun"]);
		}

		// Arsip
		if(isset($input["no_reg"]) || isset($input["media"])) 
		{
			$query->join('arsip', 'kasus.kasus_id', '=', 'arsip.kasus_id');
			array_push($select, 'no_reg');
			array_push($select, 'media');

			if(isset($input["no_reg"]) && $input["no_reg"] != null) {
				$query->where('arsip.no_reg', $input["no_reg"]);
			}
			if(isset($input["media"]) && $input["media"] != null) {
				$query->where('arsip.media', $input["media"]);
			}
		}

		// Client
		$query->join('klien_kasus', 'kasus.kasus_id', '=', 'klien_kasus.kasus_id')
						->join('klien', 'klien_kasus.klien_id', '=', 'klien.klien_id');
		if(isset($input["jenis_klien"]) && $input["jenis_klien"] != null) {
			$query->where('jenis_klien', '=', $input["jenis_klien"]);
		}
		if(isset($input["nama_klien"]) && $input["nama_klien"] != null) {
			$query->where('nama_klien', 'LIKE', $input["nama_klien"]);
		}

		$query->select($select);

		return $query;
	}

}