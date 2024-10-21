<?php $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-2">Detail Buku</h1>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $buku['sampul']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $buku['judul']; ?></h5>
                            <p class="card-text">Penulis : <?= $buku['penulis']; ?></p>
                            <a href="/buku/edit/<?= $buku['slug']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/buku/<?= $buku['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field();?>
                                <input type="hidden" name="_method" id="" value="DELETE">
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                            </form>
                            <br><br>
                            <a href="/buku">Kembali ke Daftar Buku</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>