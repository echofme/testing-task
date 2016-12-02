<?php

class Db_handler extends CI_Model {

    public function __construct() {
        
        $this->load->database();
        
    }
    
     
    public function getPlayList() {  
        $this->db->from('playlist');
        $this->db->order_by("created_at", "asc");
        $query = $this->db->get(); 

        $result = array();
        foreach ($query->result_array() as &$row) {
           
            $row['created_at'] = date("d.m.Y H:i:s", $row['created_at']);
            $result[] = $row;

        }
        unset($row);

        return $result;

     


        /*if (preg_match("/(club[0-9]+)/is", $this->post['text'], $matches)){
			return [
                'success' => false,
                'message' => "В тексте найдена ссылка на группу"
            ];
        }
        */

  
    }

    public function getVideo($id) {
        $query = $this->db->query("SELECT * FROM playlist WHERE id = {$id}");
        return $query->row_array();
    }

    public function delVideo($id) {
        $this->db->delete('playlist', array('id' => $id)); 
    }

    public function setVideo($id, $title, $url) {

        $vid = $this->checkUrl($url);
        if ($vid == 0) {
            return array(
                'message'   => "Некорректная ссылка",
                'success'   => false,
            );
        }
        if ($id == 0) {
            $data = array(
                'id' => null,
                'title' => $title,
                'url' => $url,
                'created_at' => time(),
                'order' => 0,
                'provider' => 'youtube'
            );

            $this->db->insert('playlist', $data); 
        } else {
            $data = array(
               'title' => $title,
               'url' => $url,
            );

            $this->db->where('id', $id);
            $this->db->update('playlist', $data);

        }
    }
    
    public function checkUrl($url) {

        if (preg_match("/https:\/\/www\.youtube\.com\/watch\?v=([\w]*)/i", $url, $m)) {
            return $m[1];
        }
        return 0;
    }
}