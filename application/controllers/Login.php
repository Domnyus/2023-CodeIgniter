<?php
	class Login extends CI_Controller
	{

		public function index()
		{
			$this->load->helper("form");
			$data = array("id" => 1);
			$this->load->view("login", $data);
			$this->load->model("login");
		}

		public function sign_up()
		{
			$this->load->view("sign_up");
		}

		public function create()
		{
			$data = array("username" => html_escape($_POST["username"]), "password" => sha1(html_escape($_POST["password"])));
			$this->login->create($data);
		}
	}
