<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Libraries\ExampleLibrary;

class Home extends BaseController
{
	
	public function __construct()
	{
		// LOAD MODEL
		$this->UserModel 	= new UserModel();
		
		// LOAD HELPER
		helper(['form', 'url']);
	}

	public function index()
	{
		// GET USERS DATA
		$resp['info_users'] = $this->UserModel->findAll();
		echo view('template/header');
		
		// LOAD DATA VIEW
		echo view('auth/users', $resp);
		echo view('template/footer');
	}

	public function add_user()
	{
		if ($this->request->getMethod() === 'post' && $this->validate([
			'name' 		=> 'required|min_length[3]|max_length[40]|alpha',
			'last_name'	=> 'required|min_length[3]|max_length[40]|alpha',
			'mail'	=> 'required|valid_email',
		])) {
			$resp = $this->UserModel->save([
				'name' 		=> $this->request->getPost('name'),
				'last_name'	=> $this->request->getPost('last_name'),
				'mail'  	=> $this->request->getPost('mail'),
			]);


			if (!$resp) {
				return redirect()->to('/home')->with('item', 'Try again');
			} else {
				return redirect()->to('/home')->with('item', 'Successful procedure.');
			}

			
		} else {
			echo view('template/header', ['title' => 'Create a news item']);
			echo view('auth/add_user');
			echo view('template/footer');
		}
	}

	public function update_user($id = NULL)
	{
		if ($this->request->getMethod() === 'post' && $this->validate([
			'name' 		=> 'required|min_length[3]|max_length[40]',
			'last_name'	=> 'required|min_length[3]|max_length[40]',
			'mail'	=> 'required',
		])) {
			$resp = $this->UserModel->update($id, [
				'name' 		=> $this->request->getPost('name'),
				'last_name'	=> $this->request->getPost('last_name'),
				'mail'  	=> $this->request->getPost('mail'),
			]);


			if (!$resp) {
				return redirect()->to('/home')->with('item', 'Try again');
			} else {
				return redirect()->to('/home')->with('item', 'Successful procedure.');
			}

			
		} else {
			$data['user_obj'] = $this->UserModel->where('id_users', $id)->first();

			echo view('template/header', ['title' => 'Edit User']);
			echo view('auth/edit_user', $data);
			echo view('template/footer');
		}
	}

	public function remove_user($id = NULL){
		$data['user'] = $this->UserModel->where('id_users', $id)->delete();
		return redirect()->to('/home')->with('item', 'The record was successfully deleted.');
	}
}
