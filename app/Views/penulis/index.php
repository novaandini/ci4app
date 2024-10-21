<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/penulis/create" class="btn btn-primary my-3" id="addAuthor">Tambah Data Author</a>
            <h1 class="mb-2">Daftar Author</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table table-striped table-primary table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($authors as $author) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $author["img"]; ?>" alt="" class="sampul"></td>
                            <td><?= $author["name"]; ?></td>
                            <td>
                                <a href="/penulis/<?= $author["slug"]; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const addAuthor = document.getElementById('addAuthor');
    addAuthor.addEventListener('click', function() {
        
    })
</script>
<?= $this->endSection('content'); ?>