<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Nhapkho_Model extends CI_Model {

    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'nhaphang';

    /**
     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
     */
    const PRI_INDEX = 'id_nhaphang';

    /**
     * Retrieves record(s) from the database
     *
     * @param mixed $where Optional. Retrieves only the records matching given criteria, or all records if not given.
     *                      If associative array is given, it should fit field_name=>value pattern.
     *                      If string, value will be used to match against PRI_INDEX
     * @return mixed Single record if ID is given, or array of results
     */
    public function get($where = NULL) {
    	$this->db->select('*');
        $this->db->join('nhacungcap', 'nhaphang.id_nhacungcap = nhacungcap.id_nhacungcap', 'left');
    	$this->db->from(self::TABLE_NAME);
    	if ($where !== NULL) {
    		if (is_array($where)) {
    			foreach ($where as $field=>$value) {
    				$this->db->where($field, $value);
    			}
    		} else {
    			$this->db->where(self::PRI_INDEX, $where);
    		}
    	}

    	$result = $this->db->get()->result_array();
    	if ($result) {
    		if ($where !== NULL) {
    			return array_shift($result);
    		} else {
    			return $result;
    		}
    	} else {
    		return  $result;
    	}
    }

    public function getLimit($lim,$off)
    {
        $this->db->limit($lim,$off);
        return $this->get();
    }

    public function getCt(Array $where = NULL) {
        if($where != NULL){
              foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
           }
        $this->db->select('chitiet_nhap.*,mathang.*,nhacungcap.ten_nhacungcap as ten_nhacungcap,
            danhmuc.ten_danhmuc as ten_danhmuc, nhaphang.ngaynhap as ngaynhap');
        $this->db->join('mathang', 'chitiet_nhap.id_mathang = mathang.id_mathang', 'left');
        $this->db->join('danhmuc', 'mathang.id_danhmuc = danhmuc.id_danhmuc', 'left');
        $this->db->join('nhaphang', 'chitiet_nhap.id_nhap = nhaphang.id_nhap', 'left');
        $this->db->join('nhacungcap', 'nhaphang.id_nhacungcap = nhacungcap.id_nhacungcap', 'left');
        return $this->db->get('chitiet_nhap')->result_array();
    }



    /**
     * Inserts new data into database
     *
     * @param Array $data Associative array with field_name=>value pattern to be inserted into database
     * @return mixed Inserted row ID, or false if error occured
     */
    public function insert(Array $data) {
    	if ($this->db->insert(self::TABLE_NAME, $data)) {
    		return $this->db->insert_id();
    	} else {
    		return false;
    	}
    }

    public function insertDetail(Array $data) {
        if ($this->db->insert('chitiet_nhap', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    /**
     * Updates selected record in the database
     *
     * @param Array $data Associative array field_name=>value to be updated
     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
     * @return int Number of affected rows by the update query
     */
    public function update(Array $data, $where = array()) {
    	if (!is_array($where)) {
    		$where = array(self::PRI_INDEX => $where);
    	}
    	$this->db->update(self::TABLE_NAME, $data, $where);
    	return $this->db->affected_rows();
    }

    public function updateDetail(Array $data, $where = array()) {
        if (!is_array($where)) {
            $where = array('id_ctnhap' => $where);
        }
        $this->db->update('chitiet_nhap', $data, $where);
        return $this->db->affected_rows();
    }

    /**
     * Deletes specified record from the database
     *
     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
     * @return int Number of rows affected by the delete query
     */
    public function delete($where = array()) {
    	if (!is_array($where)) {
    		$where = array(self::PRI_INDEX => $where);
    	}
    	$this->db->delete(self::TABLE_NAME, $where);
    	return $this->db->affected_rows();
    }
}
?>