<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Dashboard_model;

class DashAdmin extends BaseController

{
	public function dash()
    {
        $model = new Dashboard_model();
        $data['makanan'] = $model->getMakanan();
        echo view('admin/dashboard_view',$data);
    }

	public function add_new()
    {
        echo view('admin/formtambah_view');
    }

    public function save()
    {
        $model = new Dashboard_model();
        $upload = $this->request->getFile('foto');
        $upload->move(WRITEPATH . '../public/assets/images/');
        $name = $upload->getName();
        $data = array(
            'nama'  => $this->request->getPost('nama'),
            'berat' => $this->request->getPost('berat'),
			'lemak' => $this->request->getPost('lemak'),
			'kalori' => $this->request->getPost('kalori'),
			'total_saran' => $this->request->getPost('total_saran'),
			'foto' => $name,
        );
        $model->saveMakanan($data);
        return redirect()->to('/dash');
    }

    public function edit($id)
    {
        $model = new Dashboard_model();
        $data['makanan'] = $model->getMakanan($id)->getRow();
        echo view('admin/editform', $data);
    }

    public function update( )
    {
        $model = new Dashboard_model();
        $id = $this->request->getPost('id');
        $data = array(
            'nama'  => $this->request->getPost('nama'),
            'berat' => $this->request->getPost('berat'),
			'lemak' => $this->request->getPost('lemak'),
			'kalori' => $this->request->getPost('kalori'),
			'total_saran' => $this->request->getPost('total_saran'),
			'foto' => $this->request->getPost('foto'),
        );
     
        $model->updateMakanan($data, $id);
        return redirect()->to('/dash');
    }

    public function delete($id)
    {
        $model = new Dashboard_model();
        $model->deleteMakanan($id);
        return redirect()->to('/dash');
    }

}
