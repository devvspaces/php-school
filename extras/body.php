<body>
    <main id="super-box">

        <?php include("navbar.php") ?>

        <!-- Main content -->
        <section class="viewbox">

            <div class="viewbox-nav">
                <h1>
                    <?= $title ?>
                </h1>

                <div id="droppy" class="dropdown">
                    <div class="profile-bar dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="image">
                            <img src="<?= $img2 ?>" alt="">
                        </div>
                        <div class="content">
                            <p>
                                <?= $name1 ?>
                            </p>
                            <span class="badge bg-secondary"><?= $role ?></span>
                        </div>
                    </div>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="top: 20px;">

                        <?php foreach ($mini_nave_items as $item) { ?>
                            <li>
                                <a href="<?= $item['link'] ?>" class="dropdown-item">
                                    <span class="icon"><i data-feather="<?= $item['icon'] ?>"></i></span>
                                    <span>
                                        <?= $item['name'] ?>
                                    </span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

                <button id="sidebarBtn">
                    <i data-feather="menu"></i>
                </button>
            </div>