<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-2">Edit Data Buku</h1>
            <form action="/buku/perbarui/<?= $buku['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" id="slug" value="<?= $buku['slug']; ?>">
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Judul Buku :</label>
                    <div class="col-sm-5">
                        <input type="text" name="title" class="form-control <?php if (session('validation')) { 
                            if (session('validation')->getError('title')){ 
                                echo 'is-invalid';
                            }
                        } '' ?>" id="title" aria-describedby="titlecheck" value="<?= $buku['judul'] ?>">
                        <div id="titlecheck" class="invalid-feedback">
                            <?= (session('validation')) ? (session('validation')->getError('title')) : '' ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="writer" class="col-sm-2 col-form-label">Penulis :</label>
                    <div class="col-sm-5">
                        <input type="text" name="writer" class="form-control <?php if (session('validation')) { 
                            if (session('validation')->getError('writer')){ 
                                echo 'is-invalid';
                            }
                        } '' ?>" id="writer" value="<?= $buku['penulis'] ?>" aria-describedby="writercheck">
                        <div class="invalid-feedback" id="writercheck">
                            <?= (session('validation')) ? session('validation')->getError('writer') : ''; ?>
                        </div>

                    </div>
                </div>
                <div class="row mb-2">
                    <label for="cover" class="col-sm-2 col-form-label">Sampul :</label>
                    <div class="col-sm-5">
                        <input type="file" name="cover" class="form-control" id="cover" aria-describedby="inputGroupFileAddon04" aria-label="Upload" value="<?= $buku['sampul']; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>