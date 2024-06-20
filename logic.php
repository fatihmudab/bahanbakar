<?php
    //sediakan kotak pembungkus yg akan digunakan (sesuai dengan fitur)
    class DataBahanBakar{
        private $HargaSSuper;
        private $HargaSVPower;
        private $HargaSVPowerDiesel;
        private $HargaSVPowerNitro;

        //attr harga2 dibuat private karena sudah ada getter yng akan menampilkan datanya
        public $jenisYangDipilih;
        public $totalLiter;

        //attr diatas diset publik karena nilainya akan diisi dari luar
        protected $totalPembayaran;
        //set protected karena hanya digunakan oleh class dia dan turunan untuk diproses data

        public function setHarga ($valSSuper, $valSVPower, $valSVPowerDiesel, $valSVPowerNitro){
            //mengisi nilai ke attribute, nilai nantinya diisi dari luar class melalui function 
            //nilai dari luar diambil kedalam class melalui parameter (variable yang ada didalam)
            //penamaan parameter bebas asal urutan pengisian dr luarnya sesuai
            $this->HargaSSuper = $valSSuper;
            $this->HargaSVPower = $valSVPower;
            $this->HargaSVPowerDiesel = $valSVPowerDiesel;
            $this->HargaSVPowerNitro = $valSVPowerNitro;
        }

        public function getHarga(){
            //setelah nilai dr atribute disimpan, fungsi getter yang akan mengambilanya / menam
            //karena data yang akan dikirim / dikeluarkan lebih dari satu maka data2 tersebut
            $semuaDataSolar["SSuper"] = $this->HargaSSuper;
            $semuaDataSolar["SVPower"] = $this->HargaSVPower;
            $semuaDataSolar["SVPowerDiesel"] = $this->HargaSVPowerDiesel;
            $semuaDataSolar["SVPowerNitro"] = $this->HargaSVPowerNitro;
            //tujuan utama dari getter : return
            return $semuaDataSolar;
        }
}

    class Pembelian extends DataBahanBakar {
        //data sudah disediakan, tinggal proses perhitungan jumlah pembelian 
        public function totalHarga(){
            $this->totalPembayaran = $this->getHarga()[$this->jenisYangDipilih] *
            $this->totalLiter;
        }

        public function cetakBukti(){
            echo "------------------------------------------------ . <br>";
            echo "Jenis Bahan Bakar : " . $this->jenisYangDipilih . '<br>' ;
            echo "Total Liter : " . $this->totalLiter . '<br>';
            echo "Harga Bayar : Rp. ".  number_format($this->totalPembayaran, 0, ',',' .') . "<br>";
            echo "------------------------------------------------ . <br>";
        }
    }
?>