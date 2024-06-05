<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\AdminModels;

class Article extends BaseController 
{
    function __construct()
    {
        //$this->m_admin = new AdminModels();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
       $data = [];
       $data['templateJudul']= 'Halaman artikel';
       echo view('admin/v_template_header', $data);
       echo view('admin/v_article', $data);
       echo view('admin/v_template_footer', $data);
    }

    function tambah()
    {
        $data = [];
        if ($this->request->getMethod() == 'POST') {
            $data = $this->request->getVar(); #setiap yang di input akan dikembalikan ke View
            $rule = [
                'post_title' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Judul harus diisi'
                    ],
                ],
                'post_content' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Konten harus diisi'
                    ],
                ],
                'post_thumbnail' => [
                    'rules' => 'is_image[post_thumbnail]',
                    'errors' => [
                        'is_image' => 'Hanya gambar yang diperbolehkan untuk diupload'
                    ]
                ]
            ];
            $file = $this->request->getFile('post_thumbnail');
            if (!$this->validate($rule)) {
                session()->setFlashdata('warning', $this->validation->getErrors());
            } else {
                $post_thumbnail = '';
                if ($file->getName()) {
                    $post_thumbnail = $file->getRandomName();
                }
                $record = [
                    'username' => session()->get('akun_username'),
                    'post_title' => $this->request->getVar('post_title'),
                    'post_status' => $this->request->getVar('post_status'),
                    'post_thumbnail' => $post_thumbnail,
                    'post_description' => $this->request->getVar('post_description'),
                    'post_content' => $this->request->getVar('post_content')

                ];
                $aksi = $this->m_posts->insertPost($record, $post_type = 'article');
                if ($aksi != false) {
                    $page_id = $aksi;
                    if ($file->getName()) {
                        $lokasi_direktori = "upload";
                        $file->move($lokasi_direktori, $post_thumbnail);
                    }
                    session()->setFlashdata("success", 'Data Berhasil Dimasukkan');
                    return redirect()->to('admin/article/tambah');
                } else {
                    session()->setFlashdata("warning", ['Gagal memasukkan data']);
                    return redirect()->to('admin/article/tambah');
                }
            }
        }
        $data['templateJudul'] = "Halaman Article";
        /** Header */
        echo view('admin/v_template_header', $data);
        /** Body */
        echo view('admin/v_article_tambah', $data);
        /** Footer */
        echo view('admin/v_template_footer', $data);

    }
    
}