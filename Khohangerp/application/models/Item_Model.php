<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item_Model extends CI_Model {

    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'mathang';

    /**
     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
     */
    const PRI_INDEX = 'id_mathang';

    /**
     * Retrieves record(s) from the database
     *
     * @param mixed $where Optional. Retrieves only the records matching given criteria, or all records if not given.
     *                      If associative array is given, it should fit field_name=>value pattern.
     *                      If string, value will be used to match against PRI_INDEX
     * @return mixed Single record if ID is given, or array of results
     */
    public function get() {
    	$this->db->select('*');
    	$this->db->join('nhacungcap', self::TABLE_NAME.'.id_nhacungcap = nhacungcap.id_nhacungcap', 'left');
    	$this->db->join('danhmuc', self::TABLE_NAME.'.id_danhmuc = danhmuc.id_danhmuc', 'left');
      return $this->db->get(self::TABLE_NAME)->result_array();
    }
    
    // chi lay dc cac trg trong table (join bang ko lay dc)
    public function getByInfo(Array $data)
    {
        $fields = $this->db->list_fields(self::TABLE_NAME);

        foreach ($fields as $field) {
            if (array_key_exists($field,$data)&&$data[$field]) {
                $this->db->where($field, $data[$field]);
            }
        }
        
        return $this->get();
    }

    public function getBySearchInfo(Array $data)
    {
        if (array_key_exists('id_nhacungcap',$data)&&$data['id_nhacungcap']) {
            $this->db->where('mathang.id_nhacungcap', $data['id_nhacungcap']);
        }
        if (array_key_exists('id_danhmuc',$data)&&$data['id_danhmuc']) {
            $this->db->where('mathang.id_danhmuc', $data['id_danhmuc']);
        }

        return $this->get();
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

    public function find($text)
    {
    	$this->db->like('ten_danhmuc', $text);
    	$this->db->or_like('loaihang', $text);
    	$this->db->or_like('donvitinh', $text);
    	$this->db->or_like('ten_mathang', $text);
    	$this->db->or_like('ten_nhacungcap', $text);
    	$this->db->or_like('loaihang', $text);

    	$this->db->select('*');
    	$this->db->from(self::TABLE_NAME);
    	$this->db->join('nhacungcap', self::TABLE_NAME.'.id_nhacungcap = nhacungcap.id_nhacungcap', 'left');
    	$this->db->join('danhmuc', self::TABLE_NAME.'.id_danhmuc = danhmuc.id_danhmuc', 'left');

    	return $this->db->get(self::TABLE_NAME)->result_array();
    }


    public function getbyDanhmuc($id_danhmuc)
    {
       $this->db->where('danhmuc.id_danhmuc', $id_danhmuc);
       $this->db->select('*');
       $this->db->join('nhacungcap', self::TABLE_NAME.'.id_nhacungcap = nhacungcap.id_nhacungcap', 'left');
       $this->db->join('danhmuc', self::TABLE_NAME.'.id_danhmuc = danhmuc.id_danhmuc', 'left');
       $data=$this->db->get(self::TABLE_NAME)->result_array();

       $content ='<thead>
       <tr>
       <th>Công cụ</th>
       <th>Số thứ tự</th>
       <th>Danh Mục</th>
       <th>Nhà Cung Cấp</th>
       <th>Mã mặt hàng</th>
       <th>Tên mặt hàng</th>
       <th>Số Lượng</th>
       <th>Đơn vị tính</th>
       <th>Đơn giá</th>
       <th>Ngày nhập mới nhất</th>
       </tr>
       </thead>';

       $content .='<tbody id="myTable">';
       $i = 1;
       foreach ($data as $row) {
        $content.='<tr>';
        $content.='<td>';
        $content.='<button data-toggle="modal" ';
        $content.='data-target="#editmodels'.$row['id_mathang'].'">';
        $content.='<i class="zmdi zmdi-edit"></i>';
        $content.='</button> | ';
        $content.='<button data-toggle="modal"';
        $content.='data-target="#deletemodels'.$row['id_mathang'].'">';
        $content.='<i class="zmdi zmdi-delete"></i>';
        $content.='</button>';
        $content.='</td>';
        $content.=' <td>'.$i.'</td>';
        $content.=' <td>'.$row['ten_danhmuc'].'</td>';
        $content.=' <td>'.$row['ten_nhacungcap'].'</td>';
        $content.=' <td>'.$row['ma_mathang'].'</td>';
        $content.=' <td>'.$row['ten_mathang'].'</td>';
        $content.=' <td>'.$row['soluonght'].'</td>';
        $content.=' <td>'.$row['donvitinh'].'</td>';
        $content.=' <td>'.$row['gia'].'</td>';
        $content.=' <td>'.$row['ngaynhapkhomoinhat'].'</td>';
        $content.='</tr>';

        $i++;
    }

    $content .='</tbody>';

    return $content;
}


public function getbyNhacungcap($id_nhacungcap)
{
   $this->db->where('nhacungcap.id_nhacungcap', $id_nhacungcap);
   $this->db->select('*');
   $this->db->join('nhacungcap', self::TABLE_NAME.'.id_nhacungcap = nhacungcap.id_nhacungcap', 'left');
   $this->db->join('danhmuc', self::TABLE_NAME.'.id_danhmuc = danhmuc.id_danhmuc', 'left');
   $data=$this->db->get(self::TABLE_NAME)->result_array();

   $content ='<thead>
   <tr>
   <th>Công cụ</th>
   <th>Số thứ tự</th>
   <th>Danh Mục</th>
   <th>Nhà Cung Cấp</th>
   <th>Mã mặt hàng</th>
   <th>Tên mặt hàng</th>
   <th>Số Lượng</th>
   <th>Đơn vị tính</th>
   <th>Đơn giá</th>
   <th>Ngày nhập mới nhất</th>
   </tr>
   </thead>';

   $content .='<tbody id="myTable">';
   $i = 1;
   foreach ($data as $row) {
    $content.='<tr>';
    $content.='<td>';
    $content.='<button data-toggle="modal" ';
    $content.='data-target="#editmodels'.$row['id_mathang'].'">';
    $content.='<i class="zmdi zmdi-edit"></i>';
    $content.='</button> | ';
    $content.='<button data-toggle="modal"';
    $content.='data-target="#deletemodels'.$row['id_mathang'].'">';
    $content.='<i class="zmdi zmdi-delete"></i>';
    $content.='</button>';
    $content.='</td>';
    $content.=' <td>'.$i.'</td>';
    $content.=' <td>'.$row['ten_danhmuc'].'</td>';
    $content.=' <td>'.$row['ten_nhacungcap'].'</td>';
    $content.=' <td>'.$row['ma_mathang'].'</td>';
    $content.=' <td>'.$row['ten_mathang'].'</td>';
    $content.=' <td>'.$row['soluonght'].'</td>';
    $content.=' <td>'.$row['donvitinh'].'</td>';
    $content.=' <td>'.$row['gia'].'</td>';
    $content.=' <td>'.$row['ngaynhapkhomoinhat'].'</td>';
    $content.='</tr>';

    $i++;
}

$content .='</tbody>';

return $content;
}

public function getbyNhacungcapvDanhmuc($id_nhacungcap,$id_danhmuc)
{
   $this->db->where('nhacungcap.id_nhacungcap', $id_nhacungcap);
   $this->db->where('danhmuc.id_danhmuc', $id_danhmuc);
   $this->db->select('*');
   $this->db->join('nhacungcap', self::TABLE_NAME.'.id_nhacungcap = nhacungcap.id_nhacungcap', 'left');
   $this->db->join('danhmuc', self::TABLE_NAME.'.id_danhmuc = danhmuc.id_danhmuc', 'left');
   $data=$this->db->get(self::TABLE_NAME)->result_array();

   $content ='<thead>
   <tr>
   <th>Công cụ</th>
   <th>Số thứ tự</th>
   <th>Danh Mục</th>
   <th>Nhà Cung Cấp</th>
   <th>Mã mặt hàng</th>
   <th>Tên mặt hàng</th>
   <th>Số Lượng</th>
   <th>Đơn vị tính</th>
   <th>Đơn giá</th>
   <th>Ngày nhập mới nhất</th>
   </tr>
   </thead>';

   $content .='<tbody id="myTable">';
   $i = 1;
   foreach ($data as $row) {
    $content.='<tr>';
    $content.='<td>';
    $content.='<button data-toggle="modal" ';
    $content.='data-target="#editmodels'.$row['id_mathang'].'">';
    $content.='<i class="zmdi zmdi-edit"></i>';
    $content.='</button> | ';
    $content.='<button data-toggle="modal"';
    $content.='data-target="#deletemodels'.$row['id_mathang'].'">';
    $content.='<i class="zmdi zmdi-delete"></i>';
    $content.='</button>';
    $content.='</td>';
    $content.=' <td>'.$i.'</td>';
    $content.=' <td>'.$row['ten_danhmuc'].'</td>';
    $content.=' <td>'.$row['ten_nhacungcap'].'</td>';
    $content.=' <td>'.$row['ma_mathang'].'</td>';
    $content.=' <td>'.$row['ten_mathang'].'</td>';
    $content.=' <td>'.$row['soluonght'].'</td>';
    $content.=' <td>'.$row['donvitinh'].'</td>';
    $content.=' <td>'.$row['gia'].'</td>';
    $content.=' <td>'.$row['ngaynhapkhomoinhat'].'</td>';
    $content.='</tr>';

    $i++;
}

$content .='</tbody>';

return $content;
}
}
?>