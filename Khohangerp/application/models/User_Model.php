<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {

      /**
       * @name string TABLE_NAME Holds the name of the table in use by this model
       */
      const TABLE_NAME = 'user';

      /**
       * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
       */
      const PRI_INDEX = 'id';

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
    return $result;
  }
}

public function getLimit($lim,$off)
{
  $this->db->limit($lim,$off);
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
      
      public function delete($id) {
        $this->db->where(self::PRI_INDEX, $id);
        return $this->db->delete(self::TABLE_NAME);
      }

      public function check_username($username)
      {
        $where = ['username'=>$username];
        $user = $this->get($where);

        if (is_array($user)) {
          if (count($user)!=0) {
            return true;
          }
          else {
            return false;
          }
        }
        return false;

      }

      public function userlogin($username,$password)
      {
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $user = $this->db->get(self::TABLE_NAME)->result_array();

        if (is_array($user)) {

          if (count($user)!=0) {
            return true;
          }
          else {
            return false;
          }
        }
        return false;
      }

      public function check_pass($password)
      {
        $where=['password'=>$password];
        $user=$this->get($where);

        if (is_array($user)) {
          if (count($user)!=0) {
            return true;
          }
          else {
            return false;
          }
        }
        return false;

      }

      public function check_mail($email)
      {
        $where=['email'=>$email];
        $user=$this->get($where);

        if (is_array($user)) {
          if (count($user)!=0) {
            return true;
          }
          else {
            return false;
          }
        }
        return false;
      }

      public function check_phone($phone)
      {
        $where=['sdt'=>$phone];
        $user=$this->get($where);

        if (is_array($user)) {
          if (count($user)!=0) {
            return true;
          }
          else {
            return false;
          }
        }
        return false;
      }

      public function getcurrent_user($username)
      {
        $this->db->where('username', $username);
        $this->db->select('*');
        $user=$this->db->get(self::TABLE_NAME);

        return $user->result_array();
      }
      
      public function updatePass($email,$newpass)
      {
        $pass=md5($newpass);
        $this->db->where('email', $email);
        
        $ob=['password'=> $pass];
        return  $this->db->update(self::TABLE_NAME, $ob);
      }

      public function getbyId($id)
      {
       $this->db->where('id', $id);
       $this->db->select('*');
       $user=$this->db->get(self::TABLE_NAME);

       return $user->result_array();
     }

     public function getUserbyMailvPhone($mail,$phone)
     {
       $this->db->where('email', $mail);
       $this->db->where('sdt', $phone);
       
       return  $this->get();
     }

   }
   ?></div>