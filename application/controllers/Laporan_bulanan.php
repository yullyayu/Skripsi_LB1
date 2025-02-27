<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_bulanan extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('RekamMedis_model');
      $this->load->model('DataLB1_model');
      $this->load->model('Login_model');
      $this->load->helper(array('form', 'url'));
    }
    public function header()
    {
      $data['user'] = $this->Login_model->get()->result();
      $data['kp'] = $this->DataLB1_model->getKategoriPeny()->result();
      $pesan = $this->DataLB1_model->pesan();
      $data['pesan'] = count($pesan);
      $data['data_pesan'] = $pesan;
      $result = $this->DataLB1_model->notif();
      $data['notif'] = count($result);
      $data['data_notif'] = $result;
      $this->load->view('header/lb_header', $data);
    }
    public function pesanLB()
    {
      $this->header();
      $this->load->view('laporan_bulanan/dashboard_lb1');
      $this->load->view('footer/lb_footer');
    }  
    public function dataRegisterLB()
    {
      $data['rekam_medis'] = $this->RekamMedis_model->tampil_data()->result();
      $this->header();
      $this->load->view('laporan_bulanan/data_registerlb', $data); 
      $this->load->view('footer/lb_footer');
    }
    public function data_penyakit()
    {
      $data['penyakit'] = $this->DataLB1_model->get()->result();
      $this->header();
      $this->load->view('laporan_bulanan/data_penyakit', $data); 
      $this->load->view('footer/lb_footer');
    }
    public function tambahPenyakit()
    {
      $kode_icdx = $this->input->post('kode_icdx');
      $data = $this->DataLB1_model->getPeny($kode_icdx);
      if ($data->num_rows() > 0) {
        $this->session->set_flashdata('flash', 'Data tersedia pada database');
        redirect('laporan_bulanan/data_penyakit');
      }else{
        $kode_dx = $this->input->post('kode_dx');
        $kode_icdx = $this->input->post('kode_icdx');
        $nama_penyakit = $this->input->post('nama_penyakit');
        $data = array(
          'kode_dx' => $kode_dx,
          'kode_icdx' => $kode_icdx,
          'nama_penyakit' => $nama_penyakit,
        );
        $this->DataLB1_model->addPenyakit($data, 'data_penyakit');
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('laporan_bulanan/data_penyakit');
      }
    }
    public function dataLB1()
    {
        $data = $this->DataLB1_model->getJumlahLB();
        $penyakit = $data['dataPenyakit'];
        // $dataKategori = $data['dataKategori'];
        $rekamMedis = $data['rekamMedis'];
        $laporanlb1 = $data['laporanlb1'];
        $pen = [];
        foreach ($penyakit as $key => $peny) {
          // foreach ($dataKategori as $dk => $kat) {
          //   if ($peny->kode_dx == $kat->kode_dx) {
              $pen[$key] = (object)[];
              $pen[$key]->pasien = [];
              foreach ($rekamMedis as $ki => $rek) {
                foreach ($laporanlb1 as $lab => $lb) {
                  if ($peny->kode_icdx == $rek->kode_penyakit || $peny->kode_icdx == $lb->kode_icdx) {
                    for ($x = 0; $x < 12; $x++) {
                        $pen[$key]->pasien[$x] = (object)[];
                        $pen[$key]->pasien[$x]->Baru = (object)[];
                        $pen[$key]->pasien[$x]->Lama = (object)[];
                        $pen[$key]->pasien[$x]->KKL = (object)[];
                        $pen[$key]->pasien[$x]->Baru->Perempuan = 0;
                        $pen[$key]->pasien[$x]->Baru->Laki = 0;
                        $pen[$key]->pasien[$x]->Lama->Perempuan = 0;
                        $pen[$key]->pasien[$x]->Lama->Laki = 0;
                        $pen[$key]->pasien[$x]->KKL->Perempuan = 0;
                        $pen[$key]->pasien[$x]->KKL->Laki =0;
                        $pen[$key]->pasien[$x]->bulan = $rek->tanggal;
                        $pen[$key]->pasien[$x]->bulan1 = $lb->tanggal;
                    }
                  }
                }
              }
              // $pen[$key]->kd = $peny->kode_dx;
              // $pen[$key]->kategori_penyakit = $kat->kategori_penyakit; 
              // var_dump($pen[$key]->kd = $peny->kode_dx);
          //   }
          // }
            // $pen[$key]->kategori_penyakit = $peny->kategori_penyakit;
            $pen[$key]->kode_dx = $peny->kode_dx;
            $pen[$key]->kode_icdx = $peny->kode_icdx;
            $pen[$key]->nama_penyakit = $peny->nama_penyakit; 
        }
        foreach ($penyakit as $key => $peny) {
            foreach ($rekamMedis as $ki => $rek) {
                if (sizeof($pen[$key]->pasien) != 0) {
                  if ($peny->kode_icdx == $rek->kode_penyakit) {
                      if ($rek->dalam_wilayah == 'Lama' || $rek->luar_wilayah == 'Lama') {
                        if ($rek->jenis_kelamin == 'Laki-laki') {
                          $pen[$key]->pasien[$rek->id_umr - 1]->Lama->Laki += 1;
                        } else {
                          $pen[$key]->pasien[$rek->id_umr - 1]->Lama->Perempuan += 1;
                        }
                      }elseif ($rek->dalam_wilayah == 'KKL' || $rek->luar_wilayah == 'KKL') {
                        if ($rek->jenis_kelamin == 'Laki-laki') {
                          $pen[$key]->pasien[$rek->id_umr - 1]->KKL->Laki += 1;
                        } else {
                          $pen[$key]->pasien[$rek->id_umr - 1]->KKL->Perempuan += 1;
                        }
                      }else {
                          if ($rek->jenis_kelamin == 'Perempuan') {
                              $pen[$key]->pasien[$rek->id_umr - 1]->Baru->Perempuan += 1;
                          } else {
                              $pen[$key]->pasien[$rek->id_umr - 1]->Baru->Laki += 1;
                          }
                      }
                    unset($rekamMedis[$ki]);
                  }
                }
            }
        }foreach ($penyakit as $key => $peny) {
          foreach ($laporanlb1 as $lab => $lb) {
            if (sizeof($pen[$key]->pasien) != 0) {
              if ($peny->kode_icdx == $lb->kode_icdx) {
                if ($lb->kasus == 'Baru') {
                  if ($lb->jenis_kelamin == 'Laki-laki') {
                      $pen[$key]->pasien[$lb->id_umr - 1]->Baru->Laki += 1;
                  } else {
                      $pen[$key]->pasien[$lb->id_umr - 1]->Baru->Perempuan += 1;
                  }
                } elseif ($lb->kasus == 'KKL') {
                  if ($lb->jenis_kelamin == 'Perempuan') {
                      $pen[$key]->pasien[$lb->id_umr - 1]->KKL->Perempuan += 1;
                  } else {
                      $pen[$key]->pasien[$lb->id_umr - 1]->KKL->Laki += 1;
                  } 
                } else {
                  if ($lb->jenis_kelamin == 'Perempuan') {
                    $pen[$key]->pasien[$lb->id_umr - 1]->Lama->Perempuan += 1;
                  } else {
                    $pen[$key]->pasien[$lb->id_umr - 1]->Lama->Laki += 1;
                  }
                }
                unset($laporanlb1[$lab]);
              }
            }
          }
        }
        // json_encode($pen);
        // print_r($pen);
        $this->header();
        $this->load->view('laporan_bulanan/laporan_bulanan', ['data' => $pen]);
        $this->load->view('footer/lb_footer');
    }
    public function dataLB1_tribln(){
      $data = $this->DataLB1_model->getJumTribulan();
        $penyakit = $data['dataPenyakit'];
        $rekamMedis = $data['rekamMedis'];
        $laporanlb1 = $data['laporanlb1'];
        $pen = [];
        foreach ($penyakit as $key => $peny) {
            $pen[$key] = (object)[];
            $pen[$key]->pasien = [];
            foreach ($rekamMedis as $ki => $rek) {
              foreach ($laporanlb1 as $lab => $lb) {
                if ($peny->kode_icdx == $rek->kode_penyakit || $peny->kode_icdx == $lb->kode_icdx) {
                  for ($x = 0; $x < 12; $x++) {
                      $pen[$key]->pasien[$x] = (object)[];
                      $pen[$key]->pasien[$x]->Baru = (object)[];
                      $pen[$key]->pasien[$x]->Lama = (object)[];
                      $pen[$key]->pasien[$x]->KKL = (object)[];
                      $pen[$key]->pasien[$x]->Baru->Perempuan = 0;
                      $pen[$key]->pasien[$x]->Baru->Laki = 0;
                      $pen[$key]->pasien[$x]->Lama->Perempuan = 0;
                      $pen[$key]->pasien[$x]->Lama->Laki = 0;
                      $pen[$key]->pasien[$x]->KKL->Perempuan = 0;
                      $pen[$key]->pasien[$x]->KKL->Laki =0;
                      $pen[$key]->pasien[$x]->bulan = $rek->tanggal;
                      $pen[$key]->pasien[$x]->bulan1 = $lb->tanggal;
                  }
                }
              }
            }
            $pen[$key]->kode_dx = $peny->kode_dx;
            $pen[$key]->kode_icdx = $peny->kode_icdx;
            $pen[$key]->nama_penyakit = $peny->nama_penyakit;
        }
        foreach ($penyakit as $key => $peny) {
          foreach ($rekamMedis as $ki => $rek) {
              if (sizeof($pen[$key]->pasien) != 0) {
                if ($peny->kode_icdx == $rek->kode_penyakit) {
                    if ($rek->dalam_wilayah == 'Lama' || $rek->luar_wilayah == 'Lama') {
                      if ($rek->jenis_kelamin == 'Laki-laki') {
                        $pen[$key]->pasien[$rek->id_umr - 1]->Lama->Laki += 1;
                      } else {
                        $pen[$key]->pasien[$rek->id_umr - 1]->Lama->Perempuan += 1;
                      }
                    }elseif ($rek->dalam_wilayah == 'KKL' || $rek->luar_wilayah == 'KKL') {
                      if ($rek->jenis_kelamin == 'Laki-laki') {
                        $pen[$key]->pasien[$rek->id_umr - 1]->KKL->Laki += 1;
                      } else {
                        $pen[$key]->pasien[$rek->id_umr - 1]->KKL->Perempuan += 1;
                      }
                    }else {
                        if ($rek->jenis_kelamin == 'Perempuan') {
                            $pen[$key]->pasien[$rek->id_umr - 1]->Baru->Perempuan += 1;
                        } else {
                            $pen[$key]->pasien[$rek->id_umr - 1]->Baru->Laki += 1;
                        }
                    }
                  unset($rekamMedis[$ki]);
                }
              }
          }
      }foreach ($penyakit as $key => $peny) {
          foreach ($laporanlb1 as $lab => $lb) {
            if (sizeof($pen[$key]->pasien) != 0) {
              if ($peny->kode_icdx == $lb->kode_icdx) {
                if ($lb->kasus == 'Baru') {
                  if ($lb->jenis_kelamin == 'Laki-laki') {
                      $pen[$key]->pasien[$lb->id_umr - 1]->Baru->Laki += 1;
                  } else {
                      $pen[$key]->pasien[$lb->id_umr - 1]->Baru->Perempuan += 1;
                  }
                } elseif ($lb->kasus == 'KKL') {
                  if ($rek->jenis_kelamin == 'Laki-laki') {
                        $pen[$key]->pasien[$rek->id_umr - 1]->KKL->Laki += 1;
                      } else {
                        $pen[$key]->pasien[$rek->id_umr - 1]->KKL->Perempuan += 1;
                      } 
                } else {
                  if ($lb->jenis_kelamin == 'Perempuan') {
                    $pen[$key]->pasien[$lb->id_umr - 1]->Lama->Perempuan += 1;
                  } else {
                    $pen[$key]->pasien[$lb->id_umr - 1]->Lama->Laki += 1;
                  }
                }
                unset($laporanlb1[$lab]);
              }
            }
          }
        }
        // echo json_encode($pen);
        // print_r($pen);
        $this->header();
        $this->load->view('laporan_bulanan/laporan_tribulan', ['data' => $pen]);
        $this->load->view('footer/lb_footer');
    }
    public function rekapLB1()
    {
      $data = $this->DataLB1_model->getJumTahun();
        $penyakit = $data['dataPenyakit'];
        $rekamMedis = $data['rekamMedis'];
        $laporanlb1 = $data['laporanlb1'];
        $pen = [];
        foreach ($penyakit as $key => $peny) {
            $pen[$key] = (object)[];
            $pen[$key]->pasien = [];
            foreach ($rekamMedis as $ki => $rek) {
              foreach ($laporanlb1 as $lab => $lb) {
                if ($peny->kode_icdx == $rek->kode_penyakit || $peny->kode_icdx == $lb->kode_icdx) {
                  for ($x = 0; $x < 12; $x++) {
                      $pen[$key]->pasien[$x] = (object)[];
                      $pen[$key]->pasien[$x]->Baru = (object)[];
                      $pen[$key]->pasien[$x]->Lama = (object)[];
                      $pen[$key]->pasien[$x]->KKL = (object)[];
                      $pen[$key]->pasien[$x]->Baru->Perempuan = 0;
                      $pen[$key]->pasien[$x]->Baru->Laki = 0;
                      $pen[$key]->pasien[$x]->Lama->Perempuan = 0;
                      $pen[$key]->pasien[$x]->Lama->Laki = 0;
                      $pen[$key]->pasien[$x]->KKL->Perempuan = 0;
                      $pen[$key]->pasien[$x]->KKL->Laki =0;
                      $pen[$key]->pasien[$x]->bulan = $rek->tanggal;
                      $pen[$key]->pasien[$x]->bulan1 = $lb->tanggal;
                  }
                }
              }
            }
            // $pen[$key]->kategori_penyakit = $peny->kategori_penyakit;
            $pen[$key]->kode_dx = $peny->kode_dx;
            $pen[$key]->kode_icdx = $peny->kode_icdx;
            $pen[$key]->nama_penyakit = $peny->nama_penyakit;
        }
        foreach ($penyakit as $key => $peny) {
          foreach ($rekamMedis as $ki => $rek) {
              if (sizeof($pen[$key]->pasien) != 0) {
                if ($peny->kode_icdx == $rek->kode_penyakit) {
                    if ($rek->dalam_wilayah == 'Lama' || $rek->luar_wilayah == 'Lama') {
                      if ($rek->jenis_kelamin == 'Laki-laki') {
                        $pen[$key]->pasien[$rek->id_umr - 1]->Lama->Laki += 1;
                      } else {
                        $pen[$key]->pasien[$rek->id_umr - 1]->Lama->Perempuan += 1;
                      }
                    }elseif ($rek->dalam_wilayah == 'KKL' || $rek->luar_wilayah == 'KKL') {
                      if ($rek->jenis_kelamin == 'Laki-laki') {
                        $pen[$key]->pasien[$rek->id_umr - 1]->KKL->Laki += 1;
                      } else {
                        $pen[$key]->pasien[$rek->id_umr - 1]->KKL->Perempuan += 1;
                      }
                    }else {
                        if ($rek->jenis_kelamin == 'Perempuan') {
                            $pen[$key]->pasien[$rek->id_umr - 1]->Baru->Perempuan += 1;
                        } else {
                            $pen[$key]->pasien[$rek->id_umr - 1]->Baru->Laki += 1;
                        }
                    }
                  unset($rekamMedis[$ki]);
                }
              }
          }
      }foreach ($penyakit as $key => $peny) {
          foreach ($laporanlb1 as $lab => $lb) {
            if (sizeof($pen[$key]->pasien) != 0) {
              if ($peny->kode_icdx == $lb->kode_icdx) {
                if ($lb->kasus == 'Baru') {
                  if ($lb->jenis_kelamin == 'Laki-laki') {
                      $pen[$key]->pasien[$lb->id_umr - 1]->Baru->Laki += 1;
                  } else {
                      $pen[$key]->pasien[$lb->id_umr - 1]->Baru->Perempuan += 1;
                  }
                } elseif ($lb->kasus == 'KKL') {
                  if ($lb->jenis_kelamin == 'Perempuan') {
                      $pen[$key]->pasien[$lb->id_umr - 1]->KKL->Perempuan += 1;
                  } else {
                      $pen[$key]->pasien[$lb->id_umr - 1]->KKL->Laki += 1;
                  } 
                } else {
                  if ($lb->jenis_kelamin == 'Perempuan') {
                    $pen[$key]->pasien[$lb->id_umr - 1]->Lama->Perempuan += 1;
                  } else {
                    $pen[$key]->pasien[$lb->id_umr - 1]->Lama->Laki += 1;
                  }
                }
                unset($laporanlb1[$lab]);
              }
            }
          }
        }
        // echo json_encode($pen);
        // print_r($pen);
        $this->header();
        $this->load->view('laporan_bulanan/laporan_tahunan', ['data' => $pen]);
        $this->load->view('footer/lb_footer');
    }
    public function filterLB1()
    {
        $data['daftarBulan'] = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November", "Desember");
        $bulan =$this->input->post('bulan');
        $tahun =$this->input->post('tahun');
        $data = $this->DataLB1_model->filter($bulan, $tahun);
        $penyakit = $data['dataPenyakit'];
        $rekamMedis = $data['rekamMedis'];
        $laporanlb1 = $data['laporanlb1'];
        $pen = [];
        foreach ($penyakit as $key => $peny) {
            $pen[$key] = (object)[];
            $pen[$key]->pasien = [];
            foreach ($rekamMedis as $ki => $rek) {
              foreach ($laporanlb1 as $lab => $lb) {
                if ($peny->kode_icdx == $rek->kode_penyakit || $peny->kode_icdx == $lb->kode_icdx) {
                  for ($x = 0; $x < 12; $x++) {
                      $pen[$key]->pasien[$x] = (object)[];
                      $pen[$key]->pasien[$x]->Baru = (object)[];
                      $pen[$key]->pasien[$x]->Lama = (object)[];
                      $pen[$key]->pasien[$x]->KKL = (object)[];
                      $pen[$key]->pasien[$x]->Baru->Perempuan = 0;
                      $pen[$key]->pasien[$x]->Baru->Laki = 0;
                      $pen[$key]->pasien[$x]->Lama->Perempuan = 0;
                      $pen[$key]->pasien[$x]->Lama->Laki = 0;
                      $pen[$key]->pasien[$x]->KKL->Perempuan = 0;
                      $pen[$key]->pasien[$x]->KKL->Laki =0;
                      $pen[$key]->pasien[$x]->bulan = $rek->tanggal;
                      $pen[$key]->pasien[$x]->bulan1 = $lb->tanggal;
                  }
                }
              }
            }
            $pen[$key]->kode_dx = $peny->kode_dx;
            $pen[$key]->kode_icdx = $peny->kode_icdx;
            $pen[$key]->nama_penyakit = $peny->nama_penyakit; 
        }
        foreach ($penyakit as $key => $peny) {
          foreach ($rekamMedis as $ki => $rek) {
              if (sizeof($pen[$key]->pasien) != 0) {
                if ($peny->kode_icdx == $rek->kode_penyakit) {
                    if ($rek->dalam_wilayah == 'Lama' || $rek->luar_wilayah == 'Lama') { 
                      if ($rek->jenis_kelamin == 'Laki-laki') {
                        $pen[$key]->pasien[$rek->id_umr - 1]->Lama->Laki += 1;
                      } else {
                        $pen[$key]->pasien[$rek->id_umr - 1]->Lama->Perempuan += 1;
                      }
                    } elseif ($rek->dalam_wilayah == 'KKL' || $rek->luar_wilayah == 'KKL') {
                      if ($rek->jenis_kelamin == 'Laki-laki') {
                        $pen[$key]->pasien[$rek->id_umr - 1]->KKL->Laki += 1;
                      } else {
                        $pen[$key]->pasien[$rek->id_umr - 1]->KKL->Perempuan += 1;
                      }
                    }else {
                        if ($rek->jenis_kelamin == 'Perempuan') {
                            $pen[$key]->pasien[$rek->id_umr - 1]->Baru->Perempuan += 1;
                        } else {
                            $pen[$key]->pasien[$rek->id_umr - 1]->Baru->Laki += 1;
                        }
                    }
                  unset($rekamMedis[$ki]);
                }
              }
          }
      }foreach ($penyakit as $key => $peny) {
          foreach ($laporanlb1 as $lab => $lb) {
            if (sizeof($pen[$key]->pasien) != 0) {
              if ($peny->kode_icdx == $lb->kode_icdx) {
                if ($lb->kasus == 'Baru') {
                  if ($lb->jenis_kelamin == 'Laki-laki') {
                      $pen[$key]->pasien[$lb->id_umr - 1]->Baru->Laki += 1;
                  } else {
                      $pen[$key]->pasien[$lb->id_umr - 1]->Baru->Perempuan += 1;
                  }
                } elseif ($lb->kasus == 'KKL') {
                  if ($lb->jenis_kelamin == 'Perempuan') {
                      $pen[$key]->pasien[$lb->id_umr - 1]->KKL->Perempuan += 1;
                  } else {
                      $pen[$key]->pasien[$lb->id_umr - 1]->KKL->Laki += 1;
                  } 
                } else {
                  if ($lb->jenis_kelamin == 'Perempuan') {
                    $pen[$key]->pasien[$lb->id_umr - 1]->Lama->Perempuan += 1;
                  } else {
                    $pen[$key]->pasien[$lb->id_umr - 1]->Lama->Laki += 1;
                  }
                }
                unset($laporanlb1[$lab]);
              }
            }
          }
        }
        // json_encode($pen);
        // print_r($pen);
        $this->header();
        $this->load->view('laporan_bulanan/laporan_bulanan', ['data' => $pen]);
        $this->load->view('footer/lb_footer');
    }
    public function filterTribln()
    {
      $data['daftarTribulan'] = array("Tribulan 1","Tribulan 2","Tribulan 3","Tribulan 4");
      $tribulan =$this->input->post('tribulan');
      $tahun =$this->input->post('tahun');
      // die($tribulan);
      $data = $this->DataLB1_model->filter_Tribln($tribulan, $tahun);
      $penyakit = $data['dataPenyakit'];
      $rekamMedis = $data['rekamMedis'];
      $laporanlb1 = $data['laporanlb1'];
      $pen = [];
      foreach ($penyakit as $key => $peny) {
        $pen[$key] = (object)[];
        $pen[$key]->pasien = [];
        foreach ($rekamMedis as $ki => $rek) {
          foreach ($laporanlb1 as $lab => $lb) {
            if ($peny->kode_icdx == $rek->kode_penyakit || $peny->kode_icdx == $lb->kode_icdx) {
              for ($x = 0; $x < 12; $x++) {
                $pen[$key]->pasien[$x] = (object)[];
                $pen[$key]->pasien[$x]->Baru = (object)[];
                $pen[$key]->pasien[$x]->Lama = (object)[];
                $pen[$key]->pasien[$x]->KKL = (object)[];
                $pen[$key]->pasien[$x]->Baru->Perempuan = 0;
                $pen[$key]->pasien[$x]->Baru->Laki = 0;
                $pen[$key]->pasien[$x]->Lama->Perempuan = 0;
                $pen[$key]->pasien[$x]->Lama->Laki = 0;
                $pen[$key]->pasien[$x]->KKL->Perempuan = 0;
                $pen[$key]->pasien[$x]->KKL->Laki =0;
                $pen[$key]->pasien[$x]->bulan = $rek->tanggal;
                $pen[$key]->pasien[$x]->bulan1 = $lb->tanggal;
              }
            }
          }
        }
        $pen[$key]->kode_dx = $peny->kode_dx;
        $pen[$key]->kode_icdx = $peny->kode_icdx;
        $pen[$key]->nama_penyakit = $peny->nama_penyakit;
      }
      foreach ($penyakit as $key => $peny) {
        foreach ($rekamMedis as $ki => $rek) {
            if (sizeof($pen[$key]->pasien) != 0) {
              if ($peny->kode_icdx == $rek->kode_penyakit) {
                  if ($rek->dalam_wilayah == 'Lama' || $rek->luar_wilayah == 'Lama') {
                    if ($rek->jenis_kelamin == 'Laki-laki') {
                      $pen[$key]->pasien[$rek->id_umr - 1]->Lama->Laki += 1;
                    } else {
                      $pen[$key]->pasien[$rek->id_umr - 1]->Lama->Perempuan += 1;
                    }
                  }elseif ($rek->dalam_wilayah == 'KKL' || $rek->luar_wilayah == 'KKL') {
                    if ($rek->jenis_kelamin == 'Laki-laki') {
                      $pen[$key]->pasien[$rek->id_umr - 1]->KKL->Laki += 1;
                    } else {
                      $pen[$key]->pasien[$rek->id_umr - 1]->KKL->Perempuan += 1;
                    }
                  }else {
                      if ($rek->jenis_kelamin == 'Perempuan') {
                          $pen[$key]->pasien[$rek->id_umr - 1]->Baru->Perempuan += 1;
                      } else {
                          $pen[$key]->pasien[$rek->id_umr - 1]->Baru->Laki += 1;
                      }
                  }
                unset($rekamMedis[$ki]);
              }
            }
        }
    }foreach ($penyakit as $key => $peny) {
          foreach ($laporanlb1 as $lab => $lb) {
            if (sizeof($pen[$key]->pasien) != 0) {
              if ($peny->kode_icdx == $lb->kode_icdx) {
                if ($lb->kasus == 'Baru') {
                  if ($lb->jenis_kelamin == 'Laki-laki') {
                      $pen[$key]->pasien[$lb->id_umr - 1]->Baru->Laki += 1;
                  } else {
                      $pen[$key]->pasien[$lb->id_umr - 1]->Baru->Perempuan += 1;
                  }
                } elseif ($lb->kasus == 'KKL') {
                  if ($lb->jenis_kelamin == 'Perempuan') {
                      $pen[$key]->pasien[$lb->id_umr - 1]->KKL->Perempuan += 1;
                  } else {
                      $pen[$key]->pasien[$lb->id_umr - 1]->KKL->Laki += 1;
                  } 
                } else {
                  if ($lb->jenis_kelamin == 'Perempuan') {
                    $pen[$key]->pasien[$lb->id_umr - 1]->Lama->Perempuan += 1;
                  } else {
                    $pen[$key]->pasien[$lb->id_umr - 1]->Lama->Laki += 1;
                  }
                }
                unset($laporanlb1[$lab]);
              }
            }
          }
        }
        // echo json_encode($data);
        // print_r($pen);
        $this->header();
        $this->load->view('laporan_bulanan/laporan_tribulan', ['data' => $pen]);
        $this->load->view('footer/lb_footer');
    }
    public function filterTahun()
    {
        $tahun =$this->input->post('tahun');
        $data = $this->DataLB1_model->filter_Tahun($tahun);
        $penyakit = $data['dataPenyakit'];
        $rekamMedis = $data['rekamMedis'];
        $laporanlb1 = $data['laporanlb1'];
        $pen = [];
        foreach ($penyakit as $key => $peny) {
            $pen[$key] = (object)[];
            $pen[$key]->pasien = [];
            foreach ($rekamMedis as $ki => $rek) {
              foreach ($laporanlb1 as $lab => $lb) {
                if ($peny->kode_icdx == $rek->kode_penyakit || $peny->kode_icdx == $lb->kode_icdx) {
                  for ($x = 0; $x < 12; $x++) {
                      $pen[$key]->pasien[$x] = (object)[];
                      $pen[$key]->pasien[$x]->Baru = (object)[];
                      $pen[$key]->pasien[$x]->Lama = (object)[];
                      $pen[$key]->pasien[$x]->KKL = (object)[];
                      $pen[$key]->pasien[$x]->Baru->Perempuan = 0;
                      $pen[$key]->pasien[$x]->Baru->Laki = 0;
                      $pen[$key]->pasien[$x]->Lama->Perempuan = 0;
                      $pen[$key]->pasien[$x]->Lama->Laki = 0;
                      $pen[$key]->pasien[$x]->KKL->Perempuan = 0;
                      $pen[$key]->pasien[$x]->KKL->Laki =0;
                      $pen[$key]->pasien[$x]->bulan = $rek->tanggal;
                      $pen[$key]->pasien[$x]->bulan1 = $lb->tanggal;
                  }
                }
              }
            }
            $pen[$key]->kode_dx = $peny->kode_dx;
            $pen[$key]->kode_icdx = $peny->kode_icdx;
            $pen[$key]->nama_penyakit = $peny->nama_penyakit;
        }
        foreach ($penyakit as $key => $peny) {
          foreach ($rekamMedis as $ki => $rek) {
              if (sizeof($pen[$key]->pasien) != 0) {
                if ($peny->kode_icdx == $rek->kode_penyakit) {
                    if ($rek->dalam_wilayah == 'Lama' || $rek->luar_wilayah == 'Lama') {
                      if ($rek->jenis_kelamin == 'Laki-laki') {
                        $pen[$key]->pasien[$rek->id_umr - 1]->Lama->Laki += 1;
                      } else {
                        $pen[$key]->pasien[$rek->id_umr - 1]->Lama->Perempuan += 1;
                      }
                    }elseif ($rek->dalam_wilayah == 'KKL' || $rek->luar_wilayah == 'KKL') {
                      if ($rek->jenis_kelamin == 'Laki-laki') {
                        $pen[$key]->pasien[$rek->id_umr - 1]->KKL->Laki += 1;
                      } else {
                        $pen[$key]->pasien[$rek->id_umr - 1]->KKL->Perempuan += 1;
                      }
                    }else {
                        if ($rek->jenis_kelamin == 'Perempuan') {
                            $pen[$key]->pasien[$rek->id_umr - 1]->Baru->Perempuan += 1;
                        } else {
                            $pen[$key]->pasien[$rek->id_umr - 1]->Baru->Laki += 1;
                        }
                    }
                  unset($rekamMedis[$ki]);
                }
              }
          }
          }foreach ($penyakit as $key => $peny) {
            foreach ($laporanlb1 as $lab => $lb) {
              if (sizeof($pen[$key]->pasien) != 0) {
                if ($peny->kode_icdx == $lb->kode_icdx) {
                  if ($lb->kasus == 'Baru') {
                    if ($lb->jenis_kelamin == 'Laki-laki') {
                        $pen[$key]->pasien[$lb->id_umr - 1]->Baru->Laki += 1;
                    } else {
                        $pen[$key]->pasien[$lb->id_umr - 1]->Baru->Perempuan += 1;
                    }
                  } elseif ($lb->kasus == 'KKL') {
                    if ($lb->jenis_kelamin == 'Perempuan') {
                        $pen[$key]->pasien[$lb->id_umr - 1]->KKL->Perempuan += 1;
                    } else {
                        $pen[$key]->pasien[$lb->id_umr - 1]->KKL->Laki += 1;
                    } 
                  } else {
                    if ($lb->jenis_kelamin == 'Perempuan') {
                      $pen[$key]->pasien[$lb->id_umr - 1]->Lama->Perempuan += 1;
                    } else {
                      $pen[$key]->pasien[$lb->id_umr - 1]->Lama->Laki += 1;
                    }
                  }
                  unset($laporanlb1[$lab]);
                }
              }
            }
          }
        // echo json_encode($data);
        // print_r($pen);
        $this->header();
        $this->load->view('laporan_bulanan/laporan_tahunan', ['data' => $pen]);
        $this->load->view('footer/lb_footer');
    }
    public function addLB1()
    {
      $kode_icdx = $this->input->post('kode_icdx');
      $kategori_umur = $this->input->post('kategori_umur');
      $id_umr = ""; 
      if ($kategori_umur == '0-7 Hari') {
        $id_umr = 1;
      }elseif ($kategori_umur == '8-28 Hari') {
        $id_umr = 2;
      }elseif ($kategori_umur == '>29-1 Tahun') {
        $id_umr = 3;
      }elseif ($kategori_umur == '1-4 Tahun') {
        $id_umr = 4;
      }elseif ($kategori_umur == '5-9 Tahun') {
        $id_umr = 5;
      }elseif ($kategori_umur == '10-14 Tahun') {
        $id_umr = 6;
      }elseif ($kategori_umur == '15-19 Tahun') {
        $id_umr = 7;
      }elseif ($kategori_umur == '20-44 Tahun') {
        $id_umr = 8;
      }elseif ($kategori_umur == '45-54 Tahun') {
        $id_umr = 9;
      }elseif ($kategori_umur == '55-59 Tahun') {
        $id_umr = 10;
      }elseif ($kategori_umur == '60-69 Tahun') {
        $id_umr = 11;
      }elseif ($kategori_umur == '>70 Tahun') {
        $id_umr = 12;
      }
      $kasus = $this->input->post('kasus');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $tanggal = $this->input->post('tanggal');      

      $data = array(
        'kode_icdx' => $kode_icdx,
        'kategori_umur' => $kategori_umur,
        'id_umr' => $id_umr,
        'kasus' => $kasus,
        'jenis_kelamin' => $jenis_kelamin,
        'tanggal' => $tanggal,
      );
      $this->DataLB1_model->tambahLB1($data, 'laporan_lb1');
      $this->session->set_flashdata('flash', 'Data berhasil ditambahkan');
      redirect('laporan_bulanan/dataLB1');
    }
    public function viewCetak()
    {
      $this->header();
      $this->load->view('laporan_bulanan/cetak_LB1bulan');
      $this->load->view('footer/lb_footer');
    }
    public function viewCetakTribln()
    {
      $this->header();
      $this->load->view('laporan_bulanan/cetak_LB1tribulan');
      $this->load->view('footer/lb_footer');
    }
    public function viewCetakTahun()
    {
      $this->header();
      $this->load->view('laporan_bulanan/cetak_LB1tahun');
      $this->load->view('footer/lb_footer');
    } 
    public function sendKP()
    {
      $tanggal = $this->input->post('tanggal');
      $jenis_laporan = $this->input->post('jenis_laporan');
      if ($jenis_laporan == 'Laporan Bulanan') {
        $id_jp = 1;
      }else if($jenis_laporan == 'Laporan Tribulan') {
        $id_jp = 2;
      }else if($jenis_laporan == 'Laporan Tahunan') {
        $id_jp = 3;
      }
      $nama_puskesmas = $this->input->post('nama_puskesmas');
      $kd_puskesmas = $this->input->post('kd_puskesmas');
      $datalb1 = $this->input->post('datalb1');
      $status = 0;

      $data = array(
        'tanggal' => $tanggal,
        'jenis_laporan' => $jenis_laporan,
        'nama_puskesmas' => $nama_puskesmas,
        'kd_puskesmas' => $kd_puskesmas,
        'status' => $status,
        'id_jp' => $id_jp,
        'datalb1' => $datalb1,
      );
      $this->DataLB1_model->sendKP($data, 'detail_laporan');
      redirect('laporan_bulanan/dataLB1');
    }
    public function statusLB()
    {
      $data['status'] = $this->DataLB1_model->tampil_status()->result();
      $this->header();
      $this->load->view('laporan_bulanan/tabel_statusLB1', $data); 
      $this->load->view('footer/lb_footer');
    }
    public function detailLB($id)
    {
      $data['detail'] = $this->DataLB1_model->getData($id);
      $this->header();
      $this->load->view('laporan_bulanan/detail_laporanLB1', $data);
      $this->load->view('footer/lb_footer');
    }
    public function detailPBln($id)
    {
      $data['peny_bln'] = $this->DataLB1_model->getData($id);
      $this->header();
      $this->load->view('laporan_bulanan/detail_Penybulan', $data);
      // $this->load->view('footer/lb_footer');
    }
    public function detailPTri($id)
    {
      $tgl = $this->input->post('tanggal');
      $bln = date('m', strtotime($tgl));
      $year = date('Y', strtotime($tgl));
      if ($bln == 1 || $bln == 2 || $bln == 3) {
        $month = [1,2,3];
        $bulan = ['Januri','Februari','Maret'];
      }elseif ($bln == 4 || $bln == 5 || $bln == 6) {
        $month = [4,5,6];
        $bulan = ['April','Mei','Juni'];
      }elseif ($bln == 7 || $bln == 8 || $bln == 9) {
        $month = [7,8,9];
        $bulan = ['Juli','Agustus','September'];
      }elseif ($bln == 10 || $bln == 11 || $bln == 12) {
        $month = [10,11,12];
        $bulan = ['Oktober','November','Desember'];
      }
      $data['peny_tri'] = $this->DataLB1_model->getDataLB1($id, $month, $year);
      $data['nama_bulan'] = $bulan;
      $data['nama_tahun'] = $year;
      $this->header();
      $this->load->view('laporan_bulanan/detail_Penytri', $data);
      $this->load->view('footer/lb_footer');
    }
    public function detailPThn($id)
    {
      $data['peny_thn'] = $this->DataLB1_model->getData($id);
      $this->header();
      $this->load->view('laporan_bulanan/detail_Penythn', $data);
      $this->load->view('footer/lb_footer');
    }
    public function kirimLB1Dinkes($id)
    {
      if (isset($_POST['acc'])) {
        $status = array('status' => 2);
    }
      $where = array('id_laporan' => $id);
      $this->DataLB1_model->updateLB($status, $where);
      redirect('laporan_bulanan/statusLB');
    }
}