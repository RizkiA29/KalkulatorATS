<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $operator = $_POST['operator'];
    $hasil = '';

    if (is_numeric($angka1) && is_numeric($angka2)) {
        switch ($operator) {
            case 'tambah':
                $hasil = $angka1 + $angka2;
                $symbol = '+';
                break;
            case 'kurang':
                $hasil = $angka1 - $angka2;
                $symbol = '-';
                break;
            case 'kali':
                $hasil = $angka1 * $angka2;
                $symbol = '×';
                break;
            case 'bagi':
                $hasil = ($angka2 != 0) ? $angka1 / $angka2 : 'Tidak dapat dibagi dengan nol';
                $symbol = '÷';
                break;
            default:
                $hasil = 'Pilih operator yang valid';
                $symbol = '';
        }
    } else {
        $hasil = 'Masukkan angka yang valid';
        $symbol = '';
    }
}
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center mt-5">
        <h2>Kalkulator</h2>
        <div class="card p-4 mx-auto" style="max-width: 400px;">
            <form method="POST">
            <div class="row">
    <div class="col">
        <label class="form-label">Angka Pertama *</label>
        <input type="text" name="angka1" class="form-control" placeholder="Silahkan masukkan angka" required>
    </div>
    <div class="col">
        <label class="form-label">Angka Kedua *</label>
        <input type="text" name="angka2" class="form-control" placeholder="Silahkan masukkan angka" required>
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Pilih Operator Aritmatika *</label>
    <select name="operator" class="form-select" required>
        <option value="">--Pilih Operator--</option>
        <option value="tambah">+</option>
        <option value="kurang">-</option>
        <option value="kali">×</option>
        <option value="bagi">÷</option>
    </select>
</div>
                <button type="submit" class="btn btn-success w-100">CEK HASIL</button>
            </form>
        </div>
        <?php if (isset($hasil) && is_numeric($hasil)) : ?>
    <h2 class="mt-4 text-center"><?php echo "$angka1 $symbol $angka2 = $hasil"; ?></h2>
<?php endif; ?>
    </div>
</body>
</html>