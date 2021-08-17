<?php $this->load->view('admin/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Articles</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/article/index'; ?>">Articles</a></li>
            <li class="breadcrumb-item active">Create Articles </li>
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
          <div class="card card-primary">
            <div class="card-header">
              <div class="card-title">
                Create New Article
              </div>
              <div class="card-tools">
              
              </div>
            </div>
            <form action="" method="POST" name="categoryForm" id="categoryForm" enctype="multipart/form-data">
              <div class="card-body">

                <div class="form-group">
                  <label for="">Name </label>
                  <input type="text" class="form-control " name="name" id="name" value="">
                  
                </div>

                <div class="form-group">
                  <label for="">Image</label><br>
                  <input type="file" name="image" id="image" class="">
               
                </div>

                <div class="custom-control custom-radio float-left">
                  <input type="radio" class="custom-control-input" id="statusActive" name="status" value="1" checked="">
                  <label for="statusActive" class="custom-control-label">Active</label>
                </div>

                <div class="custom-control custom-radio float-left ml-3">
                  <input type="radio" class="custom-control-input" id="statusBlock" name="status" value="0">
                  <label for="statusBlock" class="custom-control-label">Block</label>
                </div>

              </div>
              <div class="card-footer">
                <button class="btn btn-primary" name="submit" type="submit">  Submit</button>
                <a href="<?php echo base_url() . 'admin/article/index'; ?>" class="btn btn-secondary">Back</a>
              </div>
            </form>
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