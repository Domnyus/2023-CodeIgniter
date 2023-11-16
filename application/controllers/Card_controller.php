<?php
class Card_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model("card_model");
		$this->load->helper(array("form", "url"));
	}

	public function create()
	{
		$this->card_model->create(array("username" => html_escape($_REQUEST["username"])));
		$this->index();
	}

	public function index()
	{
		$data = $this->card_model->read();
		$this->load->view("card", array("h1" => "Cartão", "cards" => $data));
		#
	}

	public function update()
	{
		$data = html_escape($_REQUEST);
		$this->card_model->update($data);
		$this->load->view("card", "", true);
		$this->index();
	}

	public function delete($id)
	{
		$this->card_model->delete($id);
		$this->index();
	}
}
