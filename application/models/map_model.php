<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Map_model extends CI_Model {


	/*
	 * get all the unit info
	*/
	function get_units() {

		$this->db->join('blocks', 'blocks.block_id = units.unit_type');
		$this->db->join('tenants', 'tenants.tenant_id = units.occupied', 'left');
		$query = $this->db->get('units');
		if ($query->num_rows > 0) {
	 	return $query->result();
	 }
	}
	function add_tenant() {

		
		
		$form_data = array(
				'tenant_name' =>  $this->input->post('tenant_name'),
				'website' => $this->input->post('website'),
				'visible' => $this->input->post('visible')
		);
		$insert = $this->db->insert('tenants', $form_data);
		return $insert;
		
		
	}
	
	function assign_tenant() {
		$unit_update = array(
				'occupied' => $this->input->post('tenants')
		);
		
		
		$unit_id = $this->input->post('unit_id');
		
		$this->db->where('unit_id', $unit_id);
		$update = $this->db->update('units', $unit_update);
		return $update;
		
	}
	
	
	function get_tenants() {

		$query = $this->db->get('tenants');
		if ($query->num_rows > 0) {
			return $query->result();
		}
	}

	function get_blocks() {

		$query = $this->db->get('blocks');
		if ($query->num_rows > 0) {

			return $query->result();

		}
	}

	function get_unit($id) {

		$this->db->join('blocks', 'blocks.block_id = units.unit_type');
		$this->db->join('tenants', 'tenants.tenant_id = units.occupied', 'left');
		$this->db->where('units.unit_id', $id);
		$query = $this->db->get('units');
		if ($query->num_rows == 1) {
			return $query->result();
		}
	}
}