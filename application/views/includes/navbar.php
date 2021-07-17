<nav class="fixed-top navigation-fixed-top">
  <div class="bg-basecolor">
    <section class="container">
        <div class="navbar-links py-4 d-flex align-items-center justify-content-between">
          <h4 class="text-white m-0 p-0"><span><a href="<?= base_url(); ?>"><i class="icofont-home"></i></a></span> <span class="sm-logo">Barcelona </span></h4>
          <ul class="d-flex align-items-center navbar-links-list">
            <li class="">
              <a href="<?= base_url(); ?>" class="text-white">Home</a>
            </li>
            <li class="ml-4">
              <a href="<?= base_url(); ?>about" class="text-white">About</a>
            </li>
            <li class="ml-4">
              <a href="<?= base_url(); ?>news" class="text-white">News</a>
            </li>
            <li class="ml-4">
              <a href="<?= base_url(); ?>contact" class="text-white">Contact</a>
            </li>
            <li class="ml-4">
              <a href="<?= base_url(); ?>chat" class="text-white">Fans Chat</a>
            </li>
            <li class="ml-4">
              <a href="<?= base_url(); ?>gift" class="text-white">Drag Gift</a>
            </li>
          </ul>
          <ul class="d-flex align-items-center">
            <?php if(isset($_SESSION['status'])): ?>
              <li class="">
                  <a href="<?= base_url(); ?>logout" class="btn btn-sm border-white text-white rounded-pill px-4">logout</a>
                </li>
              <?php else: ?>
              <li class="mr-4">
                  <a href="<?= base_url(); ?>signup" class="btn btn-sm border-white text-white rounded-pill px-4">Signup</a>
                </li>
                <li class="">
                  <a href="<?= base_url(); ?>login" class="btn btn-sm bg-primary text-white rounded-pill px-4">Login</a>
                </li>
            <?php endif; ?>
              <li>
                  <div class="hanburger-icon ml-3 position-relative p-md-0 justify-content-end align-items-center cursor-pointer">
                    <div class="icon-lines"></div>
                  </div>
              </li>
          </ul>
        </div>
    </section>
  </div>
</nav>
<nav class="navbar-menu shadow no-gutters bg-white position-fixed">
  <section class="menu-content min-vh-100 px-4 mb-4">
    <div class="mb-4">
      <a href="<?= base_url(); ?>" class="px-4 rounded bg-light text-pink py-3 m-0 d-block text-muted">Home</a>
    </div>
    <div class="mb-4">
      <a href="<?= base_url(); ?>about" class="px-4 rounded bg-light text-pink py-3  m-0 d-block text-muted">About</a>
    </div>
    <div class="mb-4">
      <a href="<?= base_url(); ?>news" class="px-4 rounded bg-light text-pink py-3  m-0 d-block text-muted">News</a>
    </div>
    <div class="mb-4">
      <a href="<?= base_url(); ?>contact" class="px-4 rounded bg-light text-pink py-3  m-0 d-block text-muted">Contact</a>
    </div>
    <div class="mb-4">
      <a href="<?= base_url(); ?>chat" class="px-4 rounded bg-light text-pink py-3  m-0 d-block text-muted">Fans Chat</a>
    </div>
    <div class="mb-4">
      <a href="<?= base_url(); ?>gift" class="px-4 rounded bg-light text-pink py-3  m-0 d-block text-muted">Drag Gift</a>
    </div>
    
  </section>
</nav>