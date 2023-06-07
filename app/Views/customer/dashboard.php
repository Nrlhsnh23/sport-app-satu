<?= $this->extend('template/customerLayout') ?>

<?= $this->section('inner-content') ?>
<title>Dashboard Customer | Sport App</title>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <span class="navbar-brand mb-0 h1">Sport Equipment</span>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('logged_user')['name'] ?></span>
            </a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="container card p-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Stock</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Valid Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($products)) { ?>
                    <?php foreach($products as $p) { ?>
                        <tr>
                            <td>
                                <img src="<?= base_url('public/uploads/' . $p['image']) ?>" alt="Uploaded Image" style="max-width: 100px;">
                            </td>
                            <td><?= $p['name'] ?></td>
                            <td><?= $p['ammount'] ?></td>
                            <td><?= $p['price'] ?></td>
                            <td>
                                <?php 
                                    $date = new DateTime($p['valid_until']);
                                    echo $date->format('j M Y \a\t H:i:s');
                                ?>
                            </td>
                            <td>
                                <?= anchor('CustomerController/tambah_ke_keranjang/'.$p['product_id'], '<div class="btn btn-sm btn-primary">Tambah ke keranjang</div>') ?>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="6" class="text-center">No products found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
