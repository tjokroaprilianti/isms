<style>
  #system-cover{
    width:100%;
    height:45em;
    object-fit:cover;
    object-position:center center;
  }
</style>
<h1 class="">Selamat Datang, <?php echo $_settings->userdata('firstname')." ".$_settings->userdata('lastname') ?>!</h1>
<hr>

<div class="container">
        <div class="row g-0">
            <div class="col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">All Contract</span>
        <span class="info-box-number text-right h5">
          <?php 
            $project_list = $conn->query("SELECT * FROM project_list where delete_flag = 0 and `status` = 1 ")->num_rows;
            echo format_num($project_list);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  
  <!-- Bates Categori -->


           <div class="col-12 col-sm-3">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Contract Active</span>
        <span class="info-box-number text-right h5">
          <?php 
            $project_list = $conn->query("SELECT * FROM project_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($project_list);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <!-- Status Contract-->

  <div class="col-12 col-sm-3">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Initiation</span>
        <span class="info-box-number text-right h5">
          <?php 
            $project_list = $conn->query("SELECT * FROM project_list where delete_flag = 0 and `status_progres_id`  <6 ")->num_rows;
            echo format_num($project_list);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <!-- Inisiatif-->


  <div class="col-12 col-sm-3">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">On Progress</span>
        <span class="info-box-number text-right h5">
          <?php 
            $project_list = $conn->query("SELECT * FROM project_list where status_progres_id > 5 and `status_progres_id`  <14")->num_rows;
            echo format_num($project_list);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <!-- On Progress-->

  <div class="col-12 col-sm-3">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Complete</span>
        <span class="info-box-number text-right h5">
          <?php 
            $project_list = $conn->query("SELECT * FROM project_list where delete_flag = 0 and `status_progres_id`  >13")->num_rows;
            echo format_num($project_list);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <!-- TTD-->

            <!-- <div class="col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Administrasi</span>
        <span class="info-box-number text-right h5">
          <?php 
            $category = $conn->query("SELECT * FROM category_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($category);
          ?>
          <?php ?>
        </span>
      </div> -->
      <!-- /.info-box-content -->
    <!-- </div> -->
    <!-- /.info-box -->
  <!-- </div> -->
  <!-- /.col -->
  <!-- Bates Administrasi-->

            <!-- <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-seedling"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Invoice</span>
        <span class="info-box-number text-right h5">
          <?php 
            $items = $conn->query("SELECT id FROM project_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($items);
          ?>
          <?php ?>
              </span>
            </div> -->
          <!-- /.info-box-content -->
       <!--  </div> -->
      <!-- /.info-box -->
    <!-- </div> -->
  <!-- /.col -->
<!-- </div> -->
      <!-- Batas Invoice -->
        <!-- </div>
    </div>
 -->

<!-- Dibawah ini adalah aslinya -->

<!-- <div class="row">
  <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Project</span>
        <span class="info-box-number text-right h5">
          <?php 
            $category = $conn->query("SELECT * FROM category_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($category);
          ?>
          <?php ?>
        </span>
      </div>
      /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  
  <!-- Bates Categori -->
  <!-- <div class="row">
  <div class="col-12 col-sm-3">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Status Contract</span>
        <span class="info-box-number text-right h5">
          <?php 
            $category = $conn->query("SELECT * FROM cost_unit_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($category);
          ?>
          <?php ?>
        </span>
      </div> -->
      <!-- /.info-box-content -->
    <!-- </div> -->
    <!-- /.info-box -->
  <!-- </div> -->
  <!-- /.col -->
  <!-- Status Contract-->

  <!-- <div class="row">
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Administrasi</span>
        <span class="info-box-number text-right h5">
          <?php 
            $category = $conn->query("SELECT * FROM category_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($category);
          ?>
          <?php ?>
        </span>
      </div> -->
      <!-- /.info-box-content -->
    <!-- </div> -->
    <!-- /.info-box -->
  <!-- </div> -->
  <!-- /.col -->
  <!-- Bates Administrasi-->

  <!-- <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-seedling"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Invoice</span>
        <span class="info-box-number text-right h5">
          <?php 
           /* $items = $conn->query("SELECT id FROM project_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($items);*/
          ?>
          <?php ?>
        </span>
      </div> -->
      <!-- /.info-box-content -->
    <!-- </div> -->
    <!-- /.info-box -->
  <!-- </div> -->
  <!-- /.col -->
</div>
<div class="container-fluid text-center">
  <img src="<?= validate_image($_settings->info('cover')) ?>" alt="system-cover" id="system-cover" class="img-fluid">
</div>
