<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung Harga dengan Konsep PHP</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="liter">Masukan Jumlah Liter Pembelian : </label>
            <input type="number" name="liter" id="liter" required>
        </div>
        <div style="display: flex;">
            <label for="jenis">Pilih Jenis Bahan Bakar</label>
            <select name="jenis" required>
                <option value="SSuper">Shell Super</option>
                <option value="SVSuper">Shell V-Power</option>
                <option value="SVPowerDiesel">Shell V-Power Diesel</option>
                <option value="SVPowerNitro">Shell V-Power Nitro</option>
            </select>
        </div>
        <button type="submit" name="beli">Beli</button>
    </form>

    <?php
    //panggil filenya
    require 'logic.php';
    //baru dibuka, langsung set harganya 
    $logic = new Pembelian();
    $logic->setHarga(10000, 15000,18000, 20000);
    //kalau udah fiks beli, jalanin 
    if (isset($_POST['beli'])) {
        //isi attribut public pada class sesuai dengan isian formnya 
        $logic->jenisYangDipilih = $_POST['jenis'];
        $logic->totalLiter = $_POST['liter'];
        //abis kirim nilai formnya, proses harganya
        $logic->totalHarga();
        //cetak hasilnya
        $logic->cetakBukti();
    }


    ?>
</body>
</html>