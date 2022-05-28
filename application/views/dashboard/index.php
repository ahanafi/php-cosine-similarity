<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="wizard-steps">
                    <div class="wizard-step wizard-step-active">
                        <div class="wizard-step-icon">
                            <span class="bigger-text"><?php echo $total_pelanggan; ?></span>
                        </div>
                        <div class="wizard-step-label">Pelanggan</div>
                    </div>
                    <div class="wizard-step wizard-step-active bg-danger">
                        <div class="wizard-step-icon">
                            <span class="bigger-text"><?php echo $total_supplier; ?></span>
                        </div>
                        <div class="wizard-step-label">Supplier</div>
                    </div>
                    <div class="wizard-step wizard-step-active bg-info">
                        <div class="wizard-step-icon">
                            <span class="bigger-text"><?php echo $total_nota_penjualan; ?></span>
                        </div>
                        <div class="wizard-step-label">Nota Penjualan</div>
                    </div>
                    <div class="wizard-step wizard-step-success">
                        <div class="wizard-step-icon">
                            <span class="bigger-text"><?php echo $total_nota_supplier; ?></span>
                        </div>
                        <div class="wizard-step-label">Nota Supplier</div>
                    </div>
                    <div class="wizard-step wizard-step-active bg-warning">
                        <div class="wizard-step-icon">
                            <span class="bigger-text"><?php echo $total_retur_penjualan; ?></span>
                        </div>
                        <div class="wizard-step-label">Retur Penjualan</div>
                    </div>
                    <div class="wizard-step wizard-step-active bg-dark">
                        <div class="wizard-step-icon">
                            <span class="bigger-text"><?php echo $total_retur_penjualan; ?></span>
                        </div>
                        <div class="wizard-step-label">Retur Supplier</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Latest Posts</h4>
                        <div class="card-header-action">
                            <a href="#" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        Introduction Laravel 5
                                        <div class="table-links">
                                            in <a href="#">Web Development</a>
                                            <div class="bullet"></div>
                                            <a href="#">View</a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-600"><img
                                                    src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png"
                                                    alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                           data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                           data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Laravel 5 Tutorial - Installation
                                        <div class="table-links">
                                            in <a href="#">Web Development</a>
                                            <div class="bullet"></div>
                                            <a href="#">View</a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-600"><img
                                                    src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png"
                                                    alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                           data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                           data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Laravel 5 Tutorial - MVC
                                        <div class="table-links">
                                            in <a href="#">Web Development</a>
                                            <div class="bullet"></div>
                                            <a href="#">View</a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-600"><img
                                                    src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png"
                                                    alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                           data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                           data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Laravel 5 Tutorial - Migration
                                        <div class="table-links">
                                            in <a href="#">Web Development</a>
                                            <div class="bullet"></div>
                                            <a href="#">View</a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-600"><img
                                                    src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png"
                                                    alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                           data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                           data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Laravel 5 Tutorial - Deploy
                                        <div class="table-links">
                                            in <a href="#">Web Development</a>
                                            <div class="bullet"></div>
                                            <a href="#">View</a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-600"><img
                                                    src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png"
                                                    alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                           data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                           data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Laravel 5 Tutorial - Closing
                                        <div class="table-links">
                                            in <a href="#">Web Development</a>
                                            <div class="bullet"></div>
                                            <a href="#">View</a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-600"><img
                                                    src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png"
                                                    alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                           data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                           data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
