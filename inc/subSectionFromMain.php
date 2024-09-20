<main>
    <section
        class="page-top d-flex justify-content-center align-items-center flex-column text-center">
        <div class="page-top__overlay"></div>
        <div class="position-relative">
            <div class="page-top__title mb-3">
                <h2><?= $sub_section; ?></h2>
            </div>
            <div class="page-top__breadcrumb">
                <a class="text-gray" href="<?= $config['base_url']; ?>index.php?page=home">الرئيسية</a> /
                <span class="text-gray"><?= $sub_section; ?></span>
            </div>
        </div>
    </section>