<?php

class Orders_model extends CI_Model
{
    function tampil()
    {
        return $this->db->query('
        SELECT o.id_order,o.tgl_order,o.customer,ifnull(sum(od.harga*od.qty),0)total 
        FROM orders o left join order_details od on o.id_order=od.id_order group by o.id_order,o.tgl_order,o.customer
        ');
    }
    function get_header($id)
    {
        return $this->db->query('SELECT * FROM orders Where id_order=' . $id);
        //SELECT * FROM arsip
    }

    function detail_tampil($id)
    {
        return $this->db->query(
            '
        SELECT *,a.harga harga_aktual FROM order_details a JOIN produk b ON a.id_produk=b.id_produk Where a.id_order=' . $id
        );
        //SELECT * FROM arsip
    }

    function simpan($data, $table)
    {
        return $this->db->insert($table, $data);
        //insert into arsip value('id_kategor','arsip');
    }

    function simpan_detail($data, $table)
    {
        //check if the data already exists
        $this->db->where('id_order', $data['id_order']);
        $this->db->where('id_produk', $data['id_produk']);
        $q = $this->db->get($table);
        if ($q->num_rows() > 0) {
            //if exists, update the data
            $this->db->where('id_order', $data['id_order']);
            $this->db->where('id_produk', $data['id_produk']);
            $this->db->update($table, $data);
        } else {
            //if not exists, insert the data
            $this->db->insert($table, $data);
        }
        return true;
        //insert into arsip value('id_kategor','arsip');
    }

    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function edit_simpan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}


/* End of file Ptk_model.php */
/* Location: ./application/models/Ptk_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-07-31 01:06:47 */
/* http://harviacode.com */