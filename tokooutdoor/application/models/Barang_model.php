<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Barang_model extends CI_Model
{
	private $_table = "barang";

	private $KD_Barang;
	private $Nama_Barang;
	private $Status;
	private $Tanggal_Beli;
	private $harga;
	private $gambar = "default.jpg";

	public function rules()
	{
		return [
			['field' => 'Nama_Barang',
			'label' => 'Nama',
			'rules' => 'required'],

			['field' => 'Status',
			'label' => 'Status',
			'rules' => 'required'],

			['field' => 'Tanggal_Beli',
			'label' => 'Tanggal beli',
			'rules' => 'required'],

			['field' => 'Harga',
			'label' => 'Harga',
			'rules' => 'numeric']			
		];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["KD_Barang" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->KD_Barang = uniqid();
		$this->Nama_Barang = $post["Nama_Barang"];
		$this->Status = $post["Status"];
		$this->Tanggal_Beli = $post["Tanggal_Beli"];
		$this->Harga = $post["Harga"];
		$this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->KD_Barang = $post["id"];
		$this->Nama_Barang = $post["Nama_Barang"];
		$this->Status = $post["Status"];
		$this->Tanggal_Beli = $post["Tanggal_Beli"];
		$this->Harga = $post["Harga"];
		$this->db->update($this->_table, $this, array('KD_Barang' => $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("KD_Barang" => $id));
	}
}