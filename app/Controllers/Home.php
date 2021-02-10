<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Libraries\Ciqrcode;
use App\Models\Home_model;
use Kenjis\CI3Compatible\Core\CI_Input;

use function bin2hex;
use function file_exists;
use function mkdir;

/**
 * @property Home_model $home_model
 * @property Ciqrcode $ciqrcode
 * @property CI_Input $input
 */
class Home extends MY_Controller
{
    /*
    |-------------------------------------------------------------------
    | Construct
    |-------------------------------------------------------------------
    |
    */
    function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
    }

    /*
    |-------------------------------------------------------------------
    | Index
    |-------------------------------------------------------------------
    |
    */
    function index(): void
    {
        $data['title']   = 'Codeigniter 4 - QR Code';
        $data['qr_list'] = $this->home_model->fetch_datas();

        $this->load->view('frontend/header', $data);
        $this->load->view('frontend/content', $data);
        $this->load->view('frontend/footer', $data);
    }

    /*
    |-------------------------------------------------------------------
    | Generate QR Code
    |-------------------------------------------------------------------
    |
    | @param $data   QR Content
    |
    */
    function generate_qrcode($data)
    {
        /* Load QR Code Library */
        $this->load->library('ciqrcode');

        /* Data */
        $hex_data   = bin2hex($data);
        $save_name  = $hex_data . '.png';

        /* QR Code File Directory Initialize */
        $dir = 'assets/media/qrcode/';
        if (! file_exists($dir)) {
            mkdir($dir, 0775, true);
        }

        /* QR Configuration  */
        $config['cacheable']    = true;
        $config['imagedir']     = $dir;
        $config['quality']      = true;
        $config['size']         = '1024';
        $config['black']        = [255, 255, 255];
        $config['white']        = [255, 255, 255];
        $this->ciqrcode->initialize($config);

        /* QR Data  */
        $params['data']     = $data;
        $params['level']    = 'L';
        $params['size']     = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $save_name;

        $this->ciqrcode->generate($params);

        /* Return Data */
        return [
            'content' => $data,
            'file'    => $dir . $save_name,
        ];
    }

    /*
    |-------------------------------------------------------------------
    | Add Data
    |-------------------------------------------------------------------
    |
    */
    function add_data()
    {
        /* Generate QR Code */
        $data = $this->input->post('content');
        $qr   = $this->generate_qrcode($data);

        /* Add Data */
        if ($this->home_model->insert_data($qr)) {
            $this->modal_feedback('success', 'Success', 'Add Data Success', 'OK');
        } else {
            $this->modal_feedback('error', 'Error', 'Add Data Failed', 'Try again');
        }

        return redirect()->to(site_url('/'));
    }

    /*
    |-------------------------------------------------------------------
    | Edit Data
    |-------------------------------------------------------------------
    |
    | @param $id    ID Data
    |
    */
    function edit_data($id)
    {
        /* Old QR Data */
        $old_data = $this->home_model->fetch_data($id);
        $old_file = FCPATH . $old_data['file'];

        /* Generate New QR Code */
        $data = $this->input->post('content');
        $qr   = $this->generate_qrcode($data);

        /* Edit Data */
        if ($this->home_model->update_data($id, $old_file, $qr)) {
            $this->modal_feedback('success', 'Success', 'Edit Data Success', 'OK');
        } else {
            $this->modal_feedback('error', 'Error', 'Edit Data Failed', 'Try again');
        }

        return redirect()->to(site_url('/'));
    }

    /*
    |-------------------------------------------------------------------
    | Remove Data
    |-------------------------------------------------------------------
    |
    | @param $id    ID Data
    |
    */
    function remove_data($id)
    {
        /* Current QR Data */
        $qr_data = $this->home_model->fetch_data($id);
        $qr_file = $qr_data['file'];

        /* Delete Data */
        if ($this->home_model->delete_data($id, $qr_file)) {
            $this->modal_feedback('success', 'Success', 'Delete Data Success', 'OK');
        } else {
            $this->modal_feedback('error', 'Error', 'Delete Data Failed', 'Try again');
        }

        return redirect()->to(site_url('/'));
    }
}
