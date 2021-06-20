<?php
class MY_Model extends CI_Model
{
	function __construct(){
		parent::__construct();

	}
	public function get($table){
		return $this->db->get($table)->result_array();
	}
	public function get_row($table){
		return $this->db->get($table)->row_array();
	}
	public function get_where_select($_table_name,$_primary_key,$_id,$truongcanlay) 
	{
		$this->db->select($truongcanlay);
		$this->db->where($_primary_key,$_id);
		$res = $this->db->get($_table_name)->row_array()[$truongcanlay];
		return $res;
	}
	public function get_where_in($_table_name,$_primary_key,$_array_id) 
	{
		$this->db->where_in($_primary_key, $_array_id);
		return $this->db->get($_table_name)->result_array();
	}
	public function count_id($_table_name,$_array_id) 
	{
		$this->db->where($_array_id);
		return $this->db->count_all_results($_table_name);
	} 
	public function get_where($table,$column,$key){
		$this->db->where($column,$key);
		$data = $this->db->get($table)->result_array();
		return $data;
	}
	public function get_where_row($table,$column,$key){
		$this->db->where($column,$key);
		return $this->db->get($table)->row_array();
	}
	public function get_where_like11($table,$column,$key){
		$this->db->where($column,$key);
		return $this->db->get($table)->result_array();
	}

	public function get_where_limit($table,$column,$key,$lm){
		$this->db->where($column,$key);
		$this->db->limit($lm);
		return $this->db->get($table)->result_array();
	}
	/**
		 * @link lấy dữ liệu theo nhiều điều kiện
		 * @param $_table_name: tên bảng, $_array_id mảng chứa các điều kiện cần AND
		 */
	public function get_many_where($_table_name,$_array_id) 
	{
		$this->db->where($_array_id);
		return $this->db->get($_table_name)->result_array();
	} 
	public function get_where1($table,$column,$key){
		$this->db->where($column,$key);
		return $this->db->get($table)->row_array();
	}
	public function get_where_like($table,$column,$key){
		$this->db->like($column,$key);
		return $this->db->get($table)->row_array();
	}

	public function select_where($table,$select_column,$where_column,$key){
		$this->db->select($select_column);
		if(!empty($where_column)){
			$this->db->where($where_column,$key);
		}
		return $this->db->get($table)->result_array();
	}
	public function get_where_order($table,$column,$key,$order_col,$type){
		$this->db->where($column,$key);
		$this->db->order_by($order_col,$type);
		return $this->db->get($table)->result_array();
	}
	public function get_order($table,$column,$order){
		$this->db->order_by($column,$order);
		return $this->db->get($table)->result_array();
	}
	public function select_max_min_avg($_table_name,$_field,$_max_min_avg_sum) 
	{
		if($_max_min_avg_sum == "MAX")
			$this->db->select_max($_field);
		else if($_max_min_avg_sum == "MIN")
			$this->db->select_min($_field);
		else if($_max_min_avg_sum == "AVG")
			$this->db->select_avg($_field);
		else
			$this->db->select_sum($_field);

		$query = $this->db->get($_table_name);
		return $query->result_array();
	}
	public function get_limit($_table_name,$_from,$_to)
	{
		return $this->db->get($_table_name,$_from,$_to)->result_array();
	}
	public function select($table)
	{
		return $this->db->get($table)->result_array();
	}
	//insert
	public function insert($table,$data){
		$this->db->insert($table,$data);
		return $this->db->affected_rows();

	}
	public function insert_id($table,$data){
		$this->db->insert($table,$data);
		return $this->db->insert_id();

	}
	public function insert_batch($_table_name,$_data) 
	{
		$this->db->insert_batch($_table_name, $_data);
		return $this->db->affected_rows();
	} 

	public function update($table,$column,$key,$data)
	{
		$this->db->where($column,$key);
		$this->db->update($table,$data);
		return $this->db->affected_rows();
	}
	// Van Lam FC update set
	public function update_set($table,$column,$key,$data)
	{
		$this->db->where($column, $key);
		$this->db->set($data);
		$this->db->update($table);
		return $this->db->affected_rows();
	}

	 /**
		 * @link cập nhật nhiều dữ liệu, nếu cập nhật thành công trạng thái sẽ là TRUE
		 * @param $_table_name: tên bảng, $_data: mảng dữ liệu cần đưa vào insert, $_primary_key: khóa của bảng
		 */
	 public function update_batch($_table_name, $_data, $_primary_key) 
	 {
	 	$this->db->trans_start();
	 	$this->db->update_batch($_table_name, $_data, $_primary_key);
	 	$this->db->trans_complete();
	 	if ($this->db->trans_status() === FALSE)
	 		return 0;
	 	else
	 		return 1;
	} // End update_batch
	public function update_many_where($_table_name,$_data,$_array_id) 
	{
		$this->db->where($_array_id);
		$this->db->update($_table_name,$_data);
		return $this->db->affected_rows();
	}
	public function update1($table,$column,$data)
	{
		$this->db->set($column,$data);
		$this->db->update($table);
		return $this->db->affected_rows();
	}
	public function delete($tbl,$col,$id)
	{
		$this->db->where($col,$id);
		$this->db->delete($tbl);
		return $this->db->affected_rows();
	}
	public function delete1($tbl)
	{
		$this->db->empty_table($tbl);
		return $this->db->affected_rows();
	}
	public function insert1($tbl,$mang)
	{
		$this->db->insert($tbl,$mang);
		return $this->db->insert_id();
	}
	public function delete_many_where($_table_name,$_array_id) 
	{
		$this->db->where($_array_id);
		$this->db->delete($_table_name);
		return $this->db->affected_rows();
	}
	public function delete_in($_table_name,$_primary_key,$_data) 
	{
		$this->db->where_in($_primary_key,$_data);
		$this->db->delete($_table_name);
		return $this->db->affected_rows();	
	}
}
?>