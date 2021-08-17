<?php $this->load->view('admin/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Article</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Article</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <?php if ($this->session->flashdata('success') != "") { ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
          <?php } ?>
          <?php if ($this->session->flashdata('error') != "") { ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
          <?php } ?>
          <div class="card">
            <div class="card-header">
              <div class="card-title">
                <form action="" name="searchFrm" method="get" id="searchFrm">
                  <div class="input-group mb-0">
                    <input type="text" name="q" id="" placeholder="search" class="form-control" value="">
                    <div class="input-group-append">
                      <button class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-tools">
                <a href="<?php echo base_url().'admin/article/create' ?>" class="btn btn-primary"><i class="fas fa-plus"></i>
                  create
                </a>
              </div>
            </div>
            <div class="card-body">
              <table class="table">
                <tr>
                  <th width="50">#</th>
                  <th>Name</th>
                  <th width="100">Status</th>
                  <th width="160">Action</th>
                </tr>
               
              </table>
            </div>
          </div>


        </div>


      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('admin/footer'); ?>
<script>
  function deleteCategory($id){
    if(confirm('Are you sure you want to delete')){
      window.location.href = '<?php echo base_url()."admin/category/delete/" ?>'+$id;
    }
  }
</script>