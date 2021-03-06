<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Crud_model extends CI_Model
{
    public function create($table, $data)
    {
        $this->db->insert($table,  $data);
    }

    public function read($table, $where = null, $order = null, $sort = null, $limit = null)
    {
        $this->db->from($table);
        if ($where != null) {
        $this->db->where($where);
        }
        if ($order != null) {
        $this->db->order_by($order, $sort);
        }
        if ($limit != null) {
        $this->db->limit($limit);
        }

        $query = $this->db->get();
        return $query;
    }

    public function update($table, $where, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete($table, $where)
    {
        $this->db->where($where)->delete($table);
    }

    public function readRata2($table, $where = null, $order = null, $sort = null, $limit = null)
    {
        $this->db->from($table);
        if ($where != null) {
        $this->db->where($where);
        }
        if ($order != null) {
        $this->db->order_by($order, $sort);
        }
        if ($limit != null) {
        $this->db->limit($limit);
        }
        $this->db->group_by('tanggal_jual');
        $query = $this->db->get();
        return $query;
    }

}