<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-2">Tambah Data Buku</h1>
            <form action="/buku/simpan" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Judul Buku :</label>
                    <div class="col-sm-5">
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="writer" class="col-sm-2 col-form-label">Penulis :</label>
                    <div class="col-sm-5">
                        <input type="text" name="writer" class="form-control" id="writer">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="cover" class="col-sm-2 col-form-label">Sampul :</label>
                    <div class="col-sm-5">
                        <input type="file" name="cover" class="form-control" id="cover" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>