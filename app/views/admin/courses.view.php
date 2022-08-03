<?php $this->view('admin/admin-header', $data) ?>

<?php if ($action == 'add') : ?>

    <div class="card col-md-5 mx-auto">
        <div class="card-body">
            <h5 class="card-title">New Course</h5>

            <!-- No Labels Form -->
            <form class="row g-3">
                <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Course Title">
                </div>
                <div class="col-md-12">
                    <select id="inputState" class="form-select">
                        <option selected="">Choose Category</option>
                        <option>Development</option>
                        <option>Business</option>
                        <option>Finance & Accounting</option>
                        <option>IT & Software</option>
                        <option>Office Productivity</option>
                        <option>Personal Development</option>
                        <option>Design</option>
                        <option>Marketing</option>
                        <option>Lifestyle</option>
                        <option>Photography & Video</option>
                        <option>Health & Fitness</option>
                        <option>Music</option>
                        <option>Teaching & Academics</option>
                        <option>I don't know yet</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="<?= ROOT ?>/admin/courses">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                    </a>
                </div>
            </form><!-- End No Labels Form -->

        </div>
    </div>

<?php elseif ($action == 'edit') : ?>

<?php else : ?>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">My Courses
                <a href="<?= ROOT ?>/admin/courses/add">
                    <button class="btn btn-primary float-end"><i class="bi bi-camera-video-fill"></i> New Course</button>
                </a>
            </h5>

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
                        <th scope="col">Action</th>
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
                        <td>
                            <i class="bi bi-pencil-square"></i>
                            <i class="bi bi-trash"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
    </div>

<?php endif; ?>

<?php $this->view('admin/admin-footer', $data) ?>