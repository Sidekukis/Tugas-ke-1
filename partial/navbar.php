    <nav class="navbar">
        <div class="navbar-left">
            <a href="#" class="brand">
                <img src="../assets/img/icon.png" style="width:50px; margin-right:10px;">TaskTrack
            </a>
        </div>

        <div class="navbar-right">
            <form class="search-form" method="get" action="index.php">
                <input
                    type="text"
                    name="keyword"
                    placeholder="Cari judul tugas..."
                    value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>"
                >
                <button type="submit">Cari</button>
            </form>

            <a href="../pages/index.php" class="btn-reset">Reset</a>

            <a href="../pages/tambah.php" class="btn-add">
                + Tambah
            </a>
        </div>
    </nav>
