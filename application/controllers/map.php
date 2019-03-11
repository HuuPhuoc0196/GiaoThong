<?php

class Map extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_map');
    }

    public function index()
    {
        $this->load->view('map/index_map');
    }
    

    public function insert()
    {

        if (!isset($_POST['lat']) 
            && !isset($_POST['lng'])
            && !isset($_POST['name'])
            && !isset($_POST['type'])) {
            echo json_encode(array(
                "status" => false,
                "data" => "Dữ liệu không hộp lệ"
            ));
            exit();
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $dataLatLng = array(
            "lat" => $_POST['lat'],
            "lng" => $_POST['lng'],
            "status" => 0
        );
        $dataName = array(
            "name" => $_POST['name']
        ); 
        $datafind = $this->m_map->findMap($dataLatLng,$dataName);
        if ($datafind != null) {
            echo json_encode(array(
                "status" => false,
                "sucess" => array(
                    "data" => "Điểm báo đã tồn tại"
                )
            ));
            die;
        }
        
        $data = array(
            'name' => $_POST['name'],
            'lat' => $_POST['lat'],
            'lng' => $_POST['lng'],
            'type' => $_POST['type'],
            'status' => '0',
            'pushdate' => date("y-m-d H:i:s")
        );
        $id = $this->m_map->insert($data);
        echo json_encode(array(
            "status" => true,
            "sucess" => array(
                "data" => "Thêm mới thành công",
                "id" => $id
            )
        ));
    }

    public function add()
    {}

    public function index_map($id = -1)
    {
        if (($id) > 0 && $this->m_map->getMapByID($id) != null) {
            $data['map'] = $this->m_map->getMapByID($id);
        } else {
            $data['map'] = array(
                'lat' => "10.837210",
                'lng' => "106.635468"
            );
        }
        $this->load->view('map/index_map', $data);
    }

    public function search()
    {
        if (! isset($_POST['search'])) {
            echo json_encode(array(
                "status" => false,
                "data" => "Dữ liệu không hộp lệ"
            ));
            exit();
        }
        $search = $_POST['search'];
        $data = $this->m_map->search($search);
        if ($data == null) {
            echo json_encode(array(
                "status" => false,
                "data" => "Điểm " . $search . " không tìm thấy"
            ));
            exit();
        }
        echo json_encode(array(
            "status" => true,
            "data" => $data
        ));
    }

    public function getMap()
    {
        if (! isset($_POST['id']) || ! is_numeric($_POST['id'])) {
            echo json_encode(array(
                "status" => false,
                "data" => "Dữ liệu không hộp lệ"
            ));
            exit();
        }
        $id = $_POST['id'];
        $data = $this->m_map->getMap($id);
        if ($data == null) {
            echo json_encode(array(
                "status" => false,
                "data" => "Điểm " . $id . " không tìm thấy"
            ));
            exit();
        }
        echo json_encode(array(
            "status" => true,
            "data" => $data[0]
        ));
    }
}