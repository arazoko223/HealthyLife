<?php namespace App\Models;
use CodeIgniter\Model;

class Dashboard_model extends Model
{
    protected $table = 'makanan';
    
    public function getMakanan($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['id_makanan' => $id]);
        }   
    }
    public function saveMakanan($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateMakanan($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_makanan' => $id));
        return $query;
    }

    public function deleteMakanan($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_makanan' => $id));
        return $query;
    } 
}