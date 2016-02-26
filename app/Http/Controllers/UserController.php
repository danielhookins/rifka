<?php namespace rifka\Http\Controllers;

use DB;
use rifka\User;
use rifka\KlienKasus;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Library\ResourceUtils;
use rifka\Library\InputUtils;
use rifka\Library\UserUtils;
use Illuminate\Http\Request;

class UserController extends Controller {

  /*
  |--------------------------------------------------------------------------
  | User Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles user (registered users) functionality.
  |
  */

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */	
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('active');
	}

	public function show($user_id)
	{
		if ($user = User::find($user_id))
		{
			$cases = UserUtils::getUserCases($user_id);
			return view('user.show', [
				'user' => $user,
				'cases' => $cases]);	
		}
		return redirect('404');
	}
	
	public function edit($user_id)
	{
		$user = User::findOrFail($user_id);
		return view('user.edit')
			->with('user', $user);
	}
	
	public function update(Request $request, $user_id)
	{
		$input = \Input::get();
		$buttonClicked = $this->getButtonClicked($input);
		
		switch ($buttonClicked) {
			case "updateBtn":
				$this->updateUserFromInput($request, $user_id, $input);
				break;
			case "changePasswordBtn":
				$this->changePasswordFromInput($request, $user_id, $input);
				break;
			case "deleteBtn":
				return redirect()->route('user.deleteConfirm', $user_id);
				break;
			case "activateBtn":
				$this->activateFromInput($request, $user_id, $input);
				break;
			default:
				break;
		}
		return redirect()->route('user.management');
	}
	
	public function changePassword($user_id) 
	{
		$user = User::findOrFail($user_id);
		return view('user.changePassword')
			->with('user', $user);
	}
	
	public function deleteConfirm($user_id) 
	{	
		$user = User::findOrFail($user_id);
		return view('user.delete')
			->with('user', $user);
	}
	
	public function deleteUser(Request $request)
	{		
		$user_id = \Input::get("user_id");
		$user = User::findOrFail($user_id);
		$name = $user->name;

		// TODO add some kind of checks
		// eg. Does this user have cases
		if($user->delete())
		{
			$request->session()->flash('success', 'User '.$name.' dihapus');
		} else {
			$request->session()->flash('error', 'Tidak bisa menghapus user');
		}
		return redirect()->route('user.management');
	}

	public function showUserManagement() 
	{
		$users = User::all();
		$inactive = User::where('active', 0)->get();

		return view('user.manage')
			->with('users', $users)
			->with('inactive', $inactive);
	}

	private function getButtonClicked($input)
	{
		if(isset($input["updateBtn"])) return "updateBtn";
		if(isset($input["changePasswordBtn"])) return "changePasswordBtn";
		if(isset($input["deleteBtn"])) return "deleteBtn";
		if(isset($input["activateBtn"])) return "activateBtn";
	}
	
	private function setActiveStatus($request, $user_id, $status)
	{
		$user =  User::findOrFail($user_id);

		try {
			$user->active = $status;
			$user->save();
			$request->session()->flash('success', 'User sudah diaktivasikan');
		} catch (Exception $e) {
			$request->session()->flash('error', 'Tidak bisa aktivasikan user');
		}	
		return;
	}

	private function setJenis($user_id, $jenis)
	{
		$user = User::findOrFail($user_id);		
		$user->jenis = $jenis;
		$this->createNewKonselorFromUser($user, $jenis);
		return $user->save();
	}

	private function createNewKonselorFromUser($user, $jenis)
	{
		if($jenis == "Konselor" || $jenis == "Manager")
		{
			if(\rifka\Konselor::where('user_id', $user->id)->count() == 0) 
			{
				$konselor = \rifka\Konselor::create([
				'nama_konselor' => $user->name,
				'user_id' 			=> $user->id
				]);
			}
		}
	}
	
	private function updateUserFromInput(Request $request, $user_id, $input)
	{
		$resource = User::findOrFail($user_id);
		$fields = ["name", "email", "jenis", "active"];
		$input = InputUtils::nullifyDefaults(\Input::get());
		
		try {
			ResourceUtils::updateResource($resource, $fields, $input);
			$request->session()->flash('success', 'Informasi user sudah diupdate');
		} catch (Exception $e) {
			$request->session()->flash('error', 'Tidak bisa update informasi user');
		}
		return redirect()->route('user.show', $user_id);
	}

	private function changePasswordFromInput(Request $request, $user_id, $input)
	{
		if (UserUtils::changePassword($user_id, $input["passwordNew"], $input["passwordAgain"]))
		{
			$request->session()->flash('success', 'Kata sandi sudah digantikan.');
		}	else {
			$request->session()->flash('error', 'Tidak bisa gantikan kata sandi');
		}
	}

	private function activateFromInput(Request $request, $user_id, $input)
	{
		// Activate User
		if($input["activate"] == "1")
			$this->setActiveStatus($request, $user_id, true);
		// Update Jenis
		if($input["jenis"] != null)
			$this->setJenis($user_id, $input["jenis"]);
	}

}