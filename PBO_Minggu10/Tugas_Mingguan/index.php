<?php
require_once 'Product.php';

$product = new Product();
$message = '';
$editData = null;

// Proses form (Create & Update)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $price = (float) ($_POST['price'] ?? 0);
    $stock = (int) ($_POST['stock'] ?? 0);
    $id    = (int) ($_POST['id'] ?? 0);

    if ($name === '') {
        $message = 'Nama produk wajib diisi.';
    } elseif ($id > 0) {
        $product->update($id, $name, $price, $stock);
        header('Location: index.php?msg=updated'); exit;
    } else {
        $product->save($name, $price, $stock);
        header('Location: index.php?msg=saved'); exit;
    }
}

// Proses hapus
if (isset($_GET['delete'])) {
    $product->delete((int) $_GET['delete']);
    header('Location: index.php?msg=deleted'); exit;
}

// Mode edit: ambil satu data
if (isset($_GET['edit'])) {
    $editData = $product->findById((int) $_GET['edit']);
}

$notes = ['saved' => 'Data berhasil ditambahkan.', 'updated' => 'Data berhasil diupdate.', 'deleted' => 'Data berhasil dihapus.'];
if (isset($_GET['msg'], $notes[$_GET['msg']])) $message = $notes[$_GET['msg']];

$products = $product->findAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Manajemen Produk</title>
<style>
  body { font-family: Arial, sans-serif; max-width: 800px; margin: 30px auto; padding: 0 15px; }
  form { background: #f4f4f4; padding: 15px; border-radius: 6px; margin-bottom: 20px; }
  input { padding: 8px; margin: 4px 4px 4px 0; }
  button, .btn { padding: 8px 14px; border: 0; border-radius: 4px; background: #2e7d32; color: #fff; text-decoration: none; cursor: pointer; font-size: 14px; }
  .btn-edit { background: #f9a825; } .btn-del { background: #c62828; }
  table { width: 100%; border-collapse: collapse; }
  th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
  th { background: #e0e0e0; }
  .msg { color: #1565c0; margin-bottom: 10px; }
</style>
</head>
<body>
<h2>Manajemen Produk</h2>

<?php if ($message): ?><p class="msg"><?= htmlspecialchars($message) ?></p><?php endif; ?>

<form method="post">
  <h3><?= $editData ? 'Edit Produk' : 'Tambah Produk' ?></h3>
  <input type="hidden" name="id" value="<?= $editData['id'] ?? '' ?>">
  <input type="text" name="name" placeholder="Nama produk" required value="<?= htmlspecialchars($editData['name'] ?? '') ?>">
  <input type="number" name="price" placeholder="Harga" min="0" step="0.01" required value="<?= $editData['price'] ?? '' ?>">
  <input type="number" name="stock" placeholder="Stok" min="0" required value="<?= $editData['stock'] ?? '' ?>">
  <button type="submit"><?= $editData ? 'Update' : 'Simpan' ?></button>
  <?php if ($editData): ?><a class="btn" style="background:#757575" href="index.php">Batal</a><?php endif; ?>
</form>

<table>
  <tr><th>ID</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr>
  <?php foreach ($products as $p): ?>
  <tr>
    <td><?= $p['id'] ?></td>
    <td><?= htmlspecialchars($p['name']) ?></td>
    <td>Rp <?= number_format($p['price'], 0, ',', '.') ?></td>
    <td><?= $p['stock'] ?></td>
    <td>
      <a class="btn btn-edit" href="?edit=<?= $p['id'] ?>">Edit</a>
      <a class="btn btn-del" href="?delete=<?= $p['id'] ?>" onclick="return confirm('Hapus produk ini?')">Hapus</a>
    </td>
  </tr>
  <?php endforeach; ?>
  <?php if (!$products): ?><tr><td colspan="5">Belum ada data.</td></tr><?php endif; ?>
</table>
</body>
</html>
