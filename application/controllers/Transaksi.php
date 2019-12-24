<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('petani_model', 'petani');
        $this->load->model('Home_model', 'home');
        $this->load->library('cart');
    }

    public function detailSayur($id)
    {
        $data['title'] = 'Belanja sayur hemat hanya disini';
        // $data['sayuran'] = $this->db->get('sayuran')->row_array();
        $data['sayuran'] = $this->home->getSayurById($id);
        $data['tampilSayur'] = $this->petani->getAllSayuran();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templatesHome/header', $data);
        $this->load->view('home/viewDetailSayur', $data);
        $this->load->view('templatesHome/footer');
    }

    public function addCart()
    {
        $data = array(
            'id'      => 'sku_123ABC',
            'qty'     => 1,
            'price'   => 39.95,
            'name'    => 'T-Shirt',
            'coupon'         => 'XMAS-50OFF'
        );

        $this->cart->insert($data);
    }

    public function beliSayur()
    {
        $data['title'] = 'Belanja sayur hemat hanya disini';
        // $data['sayuran'] = $this->db->get('sayuran')->row_array();
        // $data['sayuran'] = $this->home->getSayurById($id);
        $data['tampilSayur'] = $this->petani->getAllSayuran();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templatesHome/header', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templatesHome/footer');
     }

      public function find($id){

        $result = $this->db->where('id', $id)
                                    ->limit(1)
                                    ->get('sayuran');

            if ($result->num_rows() > 0 ) {
               
               return $result->row();

            }else{

                return array();
            }
    }

    public function tambah_keranjang($id){



        $sayuran      = $this->find($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $jumlah = $this->input->get('jumlah');;

        $data = array(

            'id'      => $sayuran->id,
            'qty'     => 1,
            'price'   => $sayuran->harga,
            'name'    => $sayuran->nama_sayur

            
        );

        $this->cart->insert($data);

        redirect();

        
    }

    public function tampil_keranjang(){

        $data['title'] = 'Keranjang Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templatesHome/header', $data);
        $this->load->view('home/viewKeranjang');
        $this->load->view('templatesHome/footer');
    }

    public function hapus_keranjang(){

        $this->cart->destroy();
        redirect('transaksi/tampil_keranjang');
    }


    public function isi_data_pesanan(){

        $data['title'] = 'isi data pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templatesHome/header', $data);
        $this->load->view('user/dataPesanan');
        $this->load->view('templatesHome/footer');
    }

    public function tambah_data_pesanan(){

                // $keranjang = $this->cart->get_item();

                // $data['user']       = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
                $user               = $this->input->post('email');
                $nama_pemesan       = $this->input->post('namaPemesan');
                $nomor_telp         = $this->input->post('NomorHp');
                $jenis_pengiriman   = $this->input->post('jenisPengiriman');
                $jenis_pembayaran   = $this->input->post('jenisPembayaran');
                $alamat             = $_REQUEST['alamat'];
                // $pesanan            = $keranjang['name'];
                // $total_pembayaran   = $keranjang['subtotal'];

                    
                        $data_pesanan = array(

                            'user'                  => $user,
                            'nama_pemesan'          => $nama_pemesan,
                            'nomor_telephone'       => $nomor_telp,
                            'jenis_pengiriman'      => $jenis_pengiriman,
                            'jenis_pembayaran'      => $jenis_pembayaran,
                            'alamat'                => $alamat
                            // 'pesanan'               => $pesanan,
                            // 'total_pembayaran'      => $total_pembayaran
                            // 'bukti_pembayaran'      => $bukti_pembayaran


                        );

                     $this->db->insert('data_pesanan', $data_pesanan);
                     redirect('transaksi/ringkasan_pesanan');
                  
                       

    }

     public function upload_bukti_pembayaran(){

            $gambar   = $_FILES['gambar']['name'];
           

             if ($gambar ='') {} else{

                            $config['upload_path'] = './bukti Pembayaran';
                            $config['allowed_types'] = 'jpg|jpeg|png';

                            $this->load->library('upload', $config);
                            
                                if (!$this->upload->do_upload('gambar')) {
                                    
                                   
                                   echo "Upload Gambar Gagal!";

                                }else{

                                    
                                      $gambar = $this->upload->data('file_name');
                                }
                    }

                     $data = array(


                           'bukti_pembayaran'  => $gambar

                        );
                
                $this->db->get_where("user", array('email'=> $this->session->userdata('email')));
                $this->db->update('data_pesanan', $data);
                redirect('transaksi/notifikasi_Pesanan');

    }


    public function ringkasan_pesanan(){


        $data['title'] = 'ringkasan data pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_pesanan'] = $this->db->get_where("data_pesanan", array('user'=> $this->session->userdata('email')))->result();
        $this->load->view('templatesHome/header', $data);
        $this->load->view('user/ringkasanPesanan');
        $this->load->view('templatesHome/footer');


    }


   
    
    public function notifikasi_pesanan(){

        $data['title'] = 'proses pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templatesHome/header', $data);
        $this->load->view('user/notifikasiPesanan');
        $this->load->view('templatesHome/footer');
    
    }


    public function pesanan_selesai(){

         $this->cart->destroy();  
         redirect('pembeli/index');

    }
} 