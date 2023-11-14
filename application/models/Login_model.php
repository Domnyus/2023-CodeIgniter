<?php
	class Login_model extends CI_Model
	{
		public $id, $username;
		private $password;

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function _login($params)
		{
			$this->db->from("users");
			$this->db->where(array("username" => $params->username, "password" => $params->password));
			$this->db->limit(1);

			$row = $this->db->get();

			return $row;
		}

		public function create($value)
		{
			$this->db->insert("users", $value);

			if($this->db->insert_id())
				return "Success";
			else
				return "Something went wrong!";
		}

		public function read()
		{
			return $this->db->get("users")->result();
		}

		public function update($new, $where)
		{
			$this->db->set($new);
			$this->db->where($where);
			$this->db->update("users", $new);
		}

		public function delete($where)
		{
			$this->db->delete("users", $where);
		}

		public function findById($id)
		{
			return $this->db->get("users")->where("id", $id)->row();
		}
	}
