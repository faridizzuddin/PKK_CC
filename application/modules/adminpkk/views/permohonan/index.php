<div class="row justify-content-end mb-3">
    <div class="col">

    </div>
    <div class="col-md-2">
        <select class="form-select">
            <option value="0">2024</option>
        </select>
    </div>
</div>



<div class="row">
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title fs-4 fw-normal mb-3">Permohonan</h4>
                <h2 class="mb-3 fs-12 fw-bold text-center"><?= count($data_permohonan) ?></h2>
                <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="fas fa-caret-down text-warning fs-5"></i>
                    <span class="text-muted fs-3 fw-bold">$45,987</span>
                </div>
                <div class="progress bg-warning-subtle" style="height: 4px">
                    <div class="progress-bar w-70 text-bg-warning" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title fs-4 fw-normal mb-3">Permohonan Belum Disahkan</h4>
                <h2 class="mb-3 fs-12 fw-bold text-center"><?= $prog_belum_sah ?></h2>
                <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="fas fa-caret-up text-indigo fs-5"></i>
                    <span class="text-muted fs-3 fw-bold">567 Kwh</span>
                </div>
                <div class="progress bg-indigo-subtle" style="height: 4px">
                    <div class="progress-bar w-70 text-bg-secondary" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title fs-4 fw-normal mb-3">Permohonan Telah Disahkan</h4>
                <h2 class="mb-3 fs-12 fw-bold text-center"><?= count($data_permohonan) - $prog_belum_sah ?></h2>
                <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="fas fa-caret-down text-danger fs-5"></i>
                    <span class="text-muted fs-3 fw-bold">467 Gb</span>
                </div>
                <div class="progress bg-danger-subtle" style="height: 4px">
                    <div class="progress-bar w-70 text-bg-danger" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title fs-4 fw-normal mb-3">Program telah dijalankan</h4>
                <h2 class="mb-3 fs-12 fw-bold text-center"><?= $prog_dijalankan ?></h2>
                <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="fas fa-caret-up text-success fs-5"></i>
                    <span class="text-muted fs-3 fw-bold">$45,987</span>
                </div>
                <div class="progress bg-success-subtle" style="height: 4px">
                    <div class="progress-bar w-70 text-bg-success" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>



<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-7">Maklumat Maklum Balas</h4>
                <!-- ============================================================== -->
                <!-- Comment widgets -->
                <!-- ============================================================== -->
                <div class="comment-widgets position-relative mb-2 simplebar-scrollable-y" data-simplebar="init"
                    style="height: 450px">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                    aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <!-- Comment Row -->
                                        <div class="d-flex gap-9 comment-row mb-5">
                                            <span class="flex-shrink-0"><img src="../assets/images/profile/user-2.jpg"
                                                    alt="user" width="56" height="56" class="rounded-circle"></span>
                                            <div class="comment-text">
                                                <div class="hstack justify-content-between gap-6 mb-6">
                                                    <div class="hstack gap-6">
                                                        <h5 class="mb-0">Michael Jorden</h5>
                                                        <p class="mb-0 fs-3 text-muted">April 14, 2023</p>
                                                    </div>
                                                    <span
                                                        class="badge bg-success-subtle text-success rounded-pill">Approved</span>
                                                </div>
                                                <p class="comment-details mb-6">
                                                    Lorem Ipsum is simply dummy text of the printing and type setting
                                                    industry.
                                                    Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing
                                                    and type setting industry.
                                                </p>
                                                <ul class="list-unstyled mb-0 hstack gap-3 lh-1">
                                                    <li><a class="fs-6 text-muted" href="javascript:void(0)"><i
                                                                class="ti ti-edit"></i></a></li>
                                                    <li><a class="fs-6 text-muted" href="javascript:void(0)"><i
                                                                class="ti ti-square-check"></i></a></li>
                                                    <li><a class="fs-6 text-muted" href="javascript:void(0)"><i
                                                                class="ti ti-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Comment Row -->
                                        <div class="d-flex gap-9 comment-row mb-5">
                                            <span class="flex-shrink-0"><img src="../assets/images/profile/user-3.jpg"
                                                    alt="user" width="56" height="56" class="rounded-circle"></span>
                                            <div class="comment-text">
                                                <div class="hstack justify-content-between gap-6 mb-6">
                                                    <div class="hstack gap-6">
                                                        <h5 class="mb-0">Johnathan Doeting</h5>
                                                        <p class="mb-0 fs-3 text-muted">April 14, 2023</p>
                                                    </div>
                                                    <span
                                                        class="badge bg-danger-subtle text-danger rounded-pill">Rejected</span>
                                                </div>
                                                <p class="comment-details mb-6">
                                                    Lorem Ipsum is simply dummy text of the printing and type setting
                                                    industry.
                                                    Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing
                                                    and type setting industry.
                                                </p>
                                                <ul class="list-unstyled mb-0 hstack gap-3 lh-1">
                                                    <li><a class="fs-6 text-muted" href="javascript:void(0)"><i
                                                                class="ti ti-edit"></i></a></li>
                                                    <li><a class="fs-6 text-muted" href="javascript:void(0)"><i
                                                                class="ti ti-square-check"></i></a></li>
                                                    <li><a class="fs-6 text-muted" href="javascript:void(0)"><i
                                                                class="ti ti-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Comment Row -->
                                        <div class="d-flex gap-9 comment-row mb-5">
                                            <span class="flex-shrink-0"><img src="../assets/images/profile/user-4.jpg"
                                                    alt="user" width="56" height="56" class="rounded-circle"></span>
                                            <div class="comment-text">
                                                <div class="hstack justify-content-between gap-6 mb-6">
                                                    <div class="hstack gap-6">
                                                        <h5 class="mb-0">James Anderson</h5>
                                                        <p class="mb-0 fs-3 text-muted">April 14, 2023</p>
                                                    </div>
                                                    <span
                                                        class="badge bg-info-subtle text-info rounded-pill">Pending</span>
                                                </div>
                                                <p class="comment-details mb-6">
                                                    Lorem Ipsum is simply dummy text of the printing and type setting
                                                    industry.
                                                    Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing
                                                    and type setting industry.
                                                </p>
                                                <ul class="list-unstyled mb-0 hstack gap-3 lh-1">
                                                    <li><a class="fs-6 text-muted" href="javascript:void(0)"><i
                                                                class="ti ti-edit"></i></a></li>
                                                    <li><a class="fs-6 text-muted" href="javascript:void(0)"><i
                                                                class="ti ti-square-check"></i></a></li>
                                                    <li><a class="fs-6 text-muted" href="javascript:void(0)"><i
                                                                class="ti ti-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Comment Row -->
                                        <div class="d-flex gap-9 comment-row mb-5">
                                            <span class="flex-shrink-0"><img src="../assets/images/profile/user-5.jpg"
                                                    alt="user" width="56" height="56" class="rounded-circle"></span>
                                            <div class="comment-text">
                                                <div class="hstack justify-content-between gap-6 mb-6">
                                                    <div class="hstack gap-6">
                                                        <h5 class="mb-0">Daniel Kristeen</h5>
                                                        <p class="mb-0 fs-3 text-muted">April 14, 2023</p>
                                                    </div>
                                                    <span
                                                        class="badge bg-success-subtle text-success rounded-pill">Approved</span>
                                                </div>
                                                <p class="comment-details mb-6">
                                                    Lorem Ipsum is simply dummy text of the printing and type setting
                                                    industry.
                                                    Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing
                                                    and type setting industry.
                                                </p>
                                                <ul class="list-unstyled mb-0 hstack gap-3 lh-1">
                                                    <li><a class="fs-6 text-muted" href="javascript:void(0)"><i
                                                                class="ti ti-edit"></i></a></li>
                                                    <li><a class="fs-6 text-muted" href="javascript:void(0)"><i
                                                                class="ti ti-square-check"></i></a></li>
                                                    <li><a class="fs-6 text-muted" href="javascript:void(0)"><i
                                                                class="ti ti-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: 537px; height: 654px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar"
                            style="height: 309px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-7">
                    <h4 class="card-title mb-0">To Do list</h4>
                    <div class="ms-auto">
                        <button class="btn btn-rounded btn-success hstack gap-1" data-bs-toggle="modal"
                            data-bs-target="#myModal">
                            <i class="ti ti-plus fs-6"></i>
                            Add Task
                        </button>
                    </div>
                </div>
                <!-- .modal for add task -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title">Add Task</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Your Name">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" placeholder="Enter email">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">
                                    Submit
                                </button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- ============================================================== -->
                <!-- To do list widgets -->
                <!-- ============================================================== -->
                <div class="to-do-widget mt-3 simplebar-scrollable-y" data-simplebar="init" style="height: 450px">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                    aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <ul class="list-task todo-list mb-0" data-role="tasklist">
                                            <li class="border-0 p-0 mb-4" data-role="task">
                                                <div class="form-check border-start border-3 border-info ps-9">
                                                    <input type="checkbox" class="form-check-input ms-0"
                                                        id="inputSchedule" name="inputCheckboxesSchedule">
                                                    <label for="inputSchedule"
                                                        class="form-check-label ps-3 gap-3 hstack">
                                                        <h5 class="mb-0 fw-bold">Schedule meeting with</h5>
                                                    </label>
                                                </div>
                                                <ul class="assignedto list-inline m-0 ps-5 ms-2 mt-1">
                                                    <li class="list-inline-item">
                                                        <img class="rounded-circle"
                                                            src="../assets/images/profile/user-3.jpg" alt="user"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                            data-original-title="Steave">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img class="rounded-circle"
                                                            src="../assets/images/profile/user-4.jpg" alt="user"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                            data-original-title="Jessica">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img class="rounded-circle"
                                                            src="../assets/images/profile/user-6.jpg" alt="user"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                            data-original-title="Priyanka">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img class="rounded-circle"
                                                            src="../assets/images/profile/user-2.jpg" alt="user"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                            data-original-title="Selina">
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="border-0 p-0 mb-4" data-role="task">
                                                <div class="form-check border-start border-3 border-danger ps-9 d-flex">
                                                    <input type="checkbox" class="form-check-input ms-0" id="inputCall"
                                                        name="inputCheckboxesCall">
                                                    <label for="inputCall" class="form-check-label ps-3 gap-3 hstack">
                                                        <h5
                                                            class="mb-0 fw-bold opacity-50 text-decoration-line-through">
                                                            Give Purchase report to
                                                        </h5>
                                                        <span
                                                            class="badge bg-danger-subtle text-danger rounded-pill">Today</span>
                                                    </label>
                                                </div>
                                                <ul class="assignedto list-inline m-0 ps-5 ms-2 mt-1 opacity-50">
                                                    <li class="list-inline-item">
                                                        <img class="rounded-circle"
                                                            src="../assets/images/profile/user-8.jpg" alt="user"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                            data-original-title="Priyanka">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img class="rounded-circle"
                                                            src="../assets/images/profile/user-7.jpg" alt="user"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                            data-original-title="Selina">
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="border-0 p-0 mb-4" data-role="task">
                                                <div class="form-check border-start border-3 border-secondary ps-9">
                                                    <input type="checkbox" class="form-check-input ms-0" id="inputBook"
                                                        name="inputCheckboxesBook">
                                                    <label for="inputBook" class="form-check-label ps-3 gap-3 hstack">
                                                        <h5
                                                            class="mb-0 fw-bold opacity-50 text-decoration-line-through">
                                                            Book flight for holiday
                                                        </h5>
                                                    </label>
                                                </div>
                                                <div
                                                    class="item-date fs-2 ps-5 ms-2 mt-1 opacity-50 text-muted d-inline-block">
                                                    26 jun 2023
                                                </div>
                                            </li>
                                            <li class="border-0 p-0 mb-4" data-role="task">
                                                <div class="form-check border-start border-3 border-warning ps-9">
                                                    <input type="checkbox" class="form-check-input ms-0"
                                                        id="inputForward" name="inputCheckboxesForward">
                                                    <label for="inputForward"
                                                        class="form-check-label ps-3 gap-3 hstack">
                                                        <h5 class="mb-0 fw-bold">Forward all tasks</h5>
                                                        <span
                                                            class="badge bg-warning-subtle text-warning rounded-pill">2
                                                            weeks</span>
                                                    </label>
                                                </div>
                                                <div class="item-date fs-2 ps-5 ms-2 mt-1 text-muted d-inline-block">
                                                    26 jun 2023
                                                </div>
                                            </li>
                                            <li class="border-0 p-0 mb-4" data-role="task">
                                                <div class="form-check border-start border-3 border-secondary ps-9">
                                                    <input type="checkbox" class="form-check-input ms-0"
                                                        id="inputRecieve" name="inputCheckboxesRecieve">
                                                    <label for="inputRecieve"
                                                        class="form-check-label ps-3 gap-3 hstack">
                                                        <h5 class="mb-0 fw-bold">Recieve shipment</h5>
                                                    </label>
                                                </div>
                                                <div class="item-date fs-2 ps-5 ms-2 mt-1 text-muted d-inline-block">
                                                    26 jun 2023
                                                </div>
                                            </li>
                                            <li class="border-0 p-0 mb-4" data-role="task">
                                                <div class="form-check border-start border-3 border-success ps-9">
                                                    <input type="checkbox" class="form-check-input ms-0"
                                                        id="inputForward2" name="inputCheckboxesd">
                                                    <label for="inputForward2"
                                                        class="form-check-label ps-3 gap-3 hstack">
                                                        <h5 class="mb-0 fw-bold">Send payment today</h5>
                                                        <span
                                                            class="badge bg-success-subtle text-success rounded-pill">3
                                                            weeks</span>
                                                    </label>
                                                </div>
                                                <ul class="assignedto list-inline m-0 ps-5 ms-2 mt-1">
                                                    <li class="list-inline-item">
                                                        <img class="rounded-circle"
                                                            src="../assets/images/profile/user-3.jpg" alt="user"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                            data-original-title="Assign to Steave">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img class="rounded-circle"
                                                            src="../assets/images/profile/user-6.jpg" alt="user"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                            data-original-title="Assign to Jessica">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <img class="rounded-circle"
                                                            src="../assets/images/profile/user-7.jpg" alt="user"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                            data-original-title="Assign to Selina">
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="border-0 p-0 mb-4" data-role="task">
                                                <div class="form-check border-start border-3 border-primary ps-9">
                                                    <input type="checkbox" class="form-check-input ms-0"
                                                        id="inputRecieve2" name="inputCheckboxesRecieve">
                                                    <label for="inputRecieve2"
                                                        class="form-check-label ps-3 gap-3 hstack">
                                                        <h5 class="mb-0 fw-bold">Recieve shipment</h5>
                                                    </label>
                                                </div>
                                                <div class="item-date fs-2 ps-5 ms-2 mt-1 text-muted d-inline-block">
                                                    26 jun 2023
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: 537px; height: 546px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar"
                            style="height: 370px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>