<!DOCTYPE html>
<html lang="en">
@include('frontend.includes.header')
<body>
@include('frontend.includes.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard_title text-center">
                    <h2 class="pt-5">Activities for Cmt8940337 - 03</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
               <div class="assignment">
                    <div class="assignment-list">
                        <h4 class="text-center mt-3">Assignment Lists</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-light text-center">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Assignment Name</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Assignment-1</td>
                                    <td><button class="btn btn-info btn-sm"><i class="fa fa-download"></i> Download</button></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Assignment-2</td>
                                    <td><button class="btn btn-info btn-sm"><i class="fa fa-download"></i> Download</button></td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                        <h4 class="text-center">Assignment Upload or Done Lists</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-light text-center">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Assignment Name</th>
                                    <th scope="col">Assignment</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Assignment-1</td>
                                    <td>Assignment_1.pdf</td>
                                    <td>Done</td>
                                    <td>
                                        <form action="">
                                            <input type="file" name="upload" class="form-control">
                                            <button class="btn btn-info btn-sm mt-3"><i class="fa fa-upload"></i> Upload</button>
                                        </form>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Assignment-2</td>
                                    <td></td>
                                    <td>Panding</td>
                                    <td>
                                        <form action="">
                                            <input type="file" name="upload" class="form-control">
                                            <button class="btn btn-info btn-sm mt-2"><i class="fa fa-upload"></i> Upload</button>
                                        </form>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>
               </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="project-lists">
                    <h4 class="text-center mt-3">Project Proposal</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-light text-center">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Project Name</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Project-1</td>
                                <td><button class="btn btn-info btn-sm"><i class="fa fa-download"></i> Download</button></td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Project-2</td>
                                <td><button class="btn btn-info btn-sm"><i class="fa fa-download"></i> Download</button></td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                    <h4 class="text-center">Project Upload or Done Lists</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-light text-center">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Project-1</td>
                                    <td>Project_1.pdf</td>
                                    <td>Done</td>
                                    <td>
                                        <form action="">
                                            <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Write Here..."></textarea>
                                            <p class="text-center">Or</p>
                                            <input type="file" name="upload" class="form-control">
                                            <button class="btn btn-info btn-sm mt-3"><i class="fa fa-upload"></i> Upload</button>
                                        </form>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Project-2</td>
                                    <td></td>
                                    <td>Panding</td>
                                    <td>
                                        <form action="">
                                            <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Write Here..."></textarea>
                                            <p class="text-center">Or</p>
                                            <input type="file" name="upload" class="form-control">
                                            <button class="btn btn-info btn-sm mt-2"><i class="fa fa-upload"></i> Upload</button>
                                        </form>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                </div>
            </div>
        </div>
      </div>
    @include('frontend.includes.footer')
</body>
</html>