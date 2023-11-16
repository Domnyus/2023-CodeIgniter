<?php
class Card_model extends CI_Model {
	public $uuid;
	public $username;

	public function create($values)
	{
		$this->db->insert("card", $values);
	}

	public function read()
	{
		return $this->db->where("deleted !=", 1)->get("card")->result();
	}

	public function update($data)
	{
		$this->db->where("id", $data["id"]);
		$this->db->set(array("username" => $data["username"]));
		$this->db->update("card");
	}

	public function delete($id)
	{
		$this->db->where("id", $id);
		$this->db->set("deleted", true);
		$this->db->update("card");
		redirect("/");
	}
}
