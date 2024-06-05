<?php foreach ($record as $key => $value): ?>
<div class="post-preview">
    <a href="post.html">
        <h2 class="post-title">
            <?php echo $value['post_title']; ?>
        </h2>
        <?php if ($value['post_description']): ?>
        <h3 class="post-subtitle">
            <?php echo $value['post_description']; ?>
        </h3>
        <?php endif; ?>
        <p class="post-meta">
            Posted by
            <a href="#!"><?php echo post_penulis($value['username']); ?></a> on <?php echo tanggal_indonesia($value['post_time']); ?>
        </p>
    </a>
</div>
<!-- Divider-->
<hr class="my-4" />
<?php endforeach; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="<?= base_url('admin/css/welcome.css') ?>">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <span>
        <img src="<?= base_url('admin/assets/img/poto_profile.png') ?>" alt="">
        <?= session()->get('akun_nama_lengkap') ?> <br>
    </span>

    <div class="container_ul_navbar">
        <ul class="ul_navbar">
            <li>
                <a href="<?= site_url('admin/article') ?>">Dashboard</a>
            </li>
            <li>
                <?php
                $akun_nama_lengkap = session()->get('akun_nama_lengkap');

                if ($akun_nama_lengkap != null): ?>
                    <a href="<?= site_url('admin/articlesAllLogin') ?>">Article</a>
                <?php else: ?>
                    <a href="<?= site_url('admin/articlesAll') ?>">Article</a>
                <?php endif; ?>
            </li>
        </ul>
        <div class="user_option">
            <?php if ($akun_nama_lengkap != null): ?>
                <!-- Jika pengguna sudah login, tampilkan ini -->
                <a href="<?= site_url('admin/logout'); ?>">
                    <span>Logout</span>
                </a>
            <?php else: ?>
                <!-- Jika pengguna belum login, tampilkan ini -->
                <a href="<?= site_url('admin/login'); ?>">
                    <span>Login</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Close Navbar -->

<!-- Content -->
<div class="container_content">
    <div>
        <h1 class="hero_text_h1" style="color: #000;">
            Hi, <br>
            <?php if (session()->get('akun_nama_lengkap') != 'null'): ?>
                <!-- Jika pengguna sudah login, tampilkan ini -->
                <?= session()->get('akun_username') ?> Here
            <?php else: ?>
                <!-- Jika pengguna belum login, tampilkan ini -->
                everyone<br>
            <?php endif; ?>
        </h1>
        <p class="hero_p" style="color: #000;">What are you doing here</p>
        <p class="hero_p" style="color: #000;">What do you want to find???</p>

        <div class="container_email">
            <span>Contact me :</span>
            <?= session()->get('akun_email') ?>
        </div>
    </div>

    <div class="hero_img">
        <img src="<?= base_url('admin/assets/img/hero.png') ?>" alt="">
    </div>
</div>
<!-- Close Content -->

<!-- Footer -->
<footer>
    <span>&copy; Ghea Khairunnisa</span>
</footer>
<!-- Close Footer -->

</body>
</html>
