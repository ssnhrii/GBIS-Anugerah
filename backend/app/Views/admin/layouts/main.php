<?= $this->include('admin/layouts/header') ?>

<?= $this->include('admin/layouts/sidebar') ?>

        <!-- Content Start -->
        <div class="content">
<?= $this->include('admin/layouts/navbar') ?>

            <!-- Main Content -->
            <?= $this->renderSection('content') ?>
            <!-- Main Content End -->

<?= $this->include('admin/layouts/footer') ?>
