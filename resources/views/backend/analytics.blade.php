@extends('backend.master')
@section('content')

<main class="Rightside">
                <section class="">
                    <div class="page-title">
                        <h1 class="f-32 c-dark f-w-5 freedoka">Analytics</h1>
                    </div>
                     <div class=" d-flex align-items-center justify-content-end">
                        <div class="select-wrapper b-orange br-5">
                            <select name="" id="">
                                <option value="">Last 7 Days</option>
                                <option value="">Last 10 Days</option>
                                <option value="">Last 15 Days</option>
                                <option value="">Last 30 Days</option>
                            </select>
                        </div>
                     </div>
                    <div class="row">
                        <div class="col-lg-4">
                             <div class="visitors">
                        <div class="card b-blue br-10">
                          <div class="top-content">  <p class="f-18 c-light f-w-5 freedoka">TOTAL VISITORS</p>
                            <h3 class="f-22 c-dark f-w-5 freedoka">12,345</h3></div>
                            <p class=" f-12 c-parrot-green f-w-4 freedoka">+12.5% from last period</p>
                        </div>
                     </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                           <div class="graph-container">
                             <h3 class="f-26 c-dark f-w-5 freedoka">Visitors Overview</h3>
                               <canvas id="myChart"
                                    style="width:100%;max-width:600px; background-color:#EEFCFF;"></canvas>
                           </div>
                        </div>
                        </div>
                    </div>
                </section>
               
              
              
            </main>

@endsection