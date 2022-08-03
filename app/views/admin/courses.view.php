<?php $this->view('admin/admin-header', $data) ?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">My Courses <button class="btn btn-primary float-end"><i class="bi bi-camera-video-fill"></i> New Course</button></h5>

        <!-- Table with stripped rows -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Primary Subject</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Brandon Jacob</td>
                    <td>Designer</td>
                    <td>28</td>
                    <td>2016-05-25</td>
                    <td>2016-05-25</td>
                </tr>
            </tbody>
        </table>
        <!-- End Table with stripped rows -->

    </div>
</div>

<?php $this->view('admin/admin-footer', $data) ?>