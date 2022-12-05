<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>alert produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    /* Custom style to set icon size */
    .alert i[class^="bi-"] {
      font-size: 1.5em;
      line-height: 1;
    }
  </style>
</head>

<body>
  <div class="m-4">
    <!-- Berhasil Alert -->
    <div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
      <i class="bi-check-circle-fill"></i>
      <strong class="mx-2">Berhasil!</strong> Produk Berhasil Ditambahkan.
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

    </div>
    <!-- Disimpan Alert -->
    <div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
      <i class="bi-check-circle-fill"></i>
      <strong class="mx-2">Berhasil!</strong> Produk Berhasil Disimpan.
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

    <!-- Dihapus Alert -->
    <div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
      <i class="bi-check-circle-fill"></i>
      <strong class="mx-2">Berhasil!</strong> Produk Berhasil Dihapus.
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

  </div>
</body>

</html>