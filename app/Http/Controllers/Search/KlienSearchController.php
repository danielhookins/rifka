<?php namespace rifka\Http\Controllers\Search;

use rifka\Http\Controllers\Search\SearchController;
use rifka\Http\Requests;
use Illuminate\Http\Request;
use rifka\Klien;
use DB;

class KlienSearchController extends SearchController {

	public function getType()
	{
		return "klien";
	}

	public function search(Request $request)
	{
		$input = \Input::get();

		// Search by client id
		if ($input["klien_id"] != null) return $this->searchByID($input["klien_id"]);

		$query = $this->buildQuery($input);

		return view('search.klien-results')
			->with('results', $query->get());
	}

	private function searchByID($klien_id)
	{
		if ($klien = Klien::find($klien_id)) {
			return redirect()->route('klien.show', $klien->klien_id);
		} else {
			return redirect('404');
		}
	}

	private function buildQuery($input)
	{
		$query = DB::table('klien');

		if(isset($input["nama_klien"]) && $input["nama_klien"] != null) {
			$query->where('nama_klien', 'LIKE', $input["nama_klien"]);
		}
		if(isset($input["kelamin"]) && $input["kelamin"] != null) {
			$query->where('kelamin', $input["kelamin"]);
		}
		if(isset($input["email"]) && $input["email"] != null) {
			$query->where('email', 'LIKE', $input["email"]);
		}
		if(isset($input["kabupaten"]) && $input["kabupaten"] != " ") {
			$query->join('alamat_klien', 'klien.klien_id', '=', 'alamat_klien.klien_id')
          	->join('alamat', 'alamat_klien.alamat_id', '=', 'alamat.alamat_id');
			$query->where('alamat.kabupaten', $input["kabupaten"]);
		}

		return $query;
	}

}