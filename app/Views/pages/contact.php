<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Contact Us!</h2>
            <?php foreach ($alamat as $a) : ?>
                <ul>
                    <li>Alamat <?= $a['tipe']; ?></li>
                    <li>Kecamatan : <?= $a['alamat']; ?></li>
                    <li>Kota : <?= $a['kota']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>