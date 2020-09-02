@include('admin.public.head')
    <div class="row row-eq-height my-3 mt-3">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="card no-b mb-3 bg-danger text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="icon-package s-18"></i></div>
                                <div><span class="text-success">40+35</span></div>
                            </div>
                            <div class="text-center">
                                <div class="s-48 my-3 font-weight-lighter"><i class="icon-chrome"></i></div>
                                Chrome
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="card no-b mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="icon-timer s-18"></i></div>
                                <div><span class="badge badge-pill badge-primary">4:30</span></div>
                            </div>
                            <div class="text-center">
                                <div class="s-48 my-3 font-weight-lighter">68</div>
                                New Orders
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="card no-b mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="icon-user-circle-o s-18"></i></div>
                                <div><span class="badge badge-pill badge-danger">4:30</span></div>
                            </div>
                            <div class="text-center">
                                <div class="s-48 my-3 font-weight-lighter">170</div>
                                New Users
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="card no-b mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="icon-user-times s-18"></i></div>
                                <div><span class="text-danger">50</span></div>
                            </div>
                            <div class="text-center">
                                <div class="s-48 my-3 font-weight-lighter">95</div>
                                Returning Users
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card no-b p-2">
                <div class="card-body">
                    <div class="card-body">
                        <div class="height-300">
                            <canvas
                                    data-chart="chartJs"
                                    data-chart-type="doughnut"
                                    data-dataset="[
                                                        [75, 25,25],

                                                    ]"
                                    data-labels="[['Disk'],['Database'],['Disk2'],['Database2']]"
                                    data-dataset-options="[
                                                    {
                                                        label: 'Disk',
                                                        backgroundColor: [
                                                            '#03a9f4',
                                                            '#8f5caf',
                                                            '#3f51b5'
                                                        ],

                                                    },


                                                    ]"
                                    data-options="{legend: {display: !0,position: 'bottom',labels: {fontColor: '#7F8FA4',usePointStyle: !0}},
                                }"
                            >
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--@include('admin.public.footer')--}}
<script src="{{asset(__ADMIN__)}}/js/app.js"></script>