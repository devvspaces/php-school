<!-- Side bar -->
<nav>
    <!-- image -->
    <div class="logo">
        <img src="../assets/images/techu_logo.png" alt="logo" class="img-fluid">
    </div>

    <!-- nav box -->
    <div class="nav-box">

        <!-- nav list -->
        <ul class="nav-list">

            <?php foreach ($nav_items as $item) { ?>
                <li class="nav-item">

                    <?php if (isset($item['dropdown'])) { ?>
                        <a data-bs-toggle="dropdown" aria-expanded="false" href="<?= $item['link'] ?>">
                            <span class="icon"><i data-feather="<?= $item['icon'] ?>"></i></span>
                            <span class="d-flex align-items-center">
                                <?= $item['name'] ?>
                            </span>

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#" type="button" data-bs-toggle="modal" data-bs-target=".fade bs-example-modal-smds">Action</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Another action</a>
                                </li>
                            </ul>
                        </a>
                    <?php } else { ?>
                        <a href="<?= $item['link'] ?>"
                            class="nav-link <?= $item['name'] == $title || $item['name'] == $nav ? 'active' : '' ?>">
                            <span class="icon"><i data-feather="<?= $item['icon'] ?>"></i></span>
                            <span class="d-flex align-items-center">
                                <?= $item['name'] ?>
                            </span>
                        </a>
                    <?php } ?>

                </li>
            <?php } ?>

        </ul>
    </div>
</nav>