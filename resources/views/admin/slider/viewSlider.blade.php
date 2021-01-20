@extends('admin_layout')
@section('content')
    <div class="span10 " id="content" >
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">slider</a></li>
        </ul>
        <div class="row-fluid">
            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>View Product</h2>
                        <div class="box-icon">
                            <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                            <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                                <div class="control-group">
                                    <label class="control-label" for="typeahead">status </label>
                                    <div class="controls">
                                        <input type="text"  value="{{ $slider->status }}" required class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    </div>
                                </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">image </label>
                                <div class="controls">
                                    <img src="{{ URL::to($slider->image) }}" height="60px" width="60px" alt="">
                                </div>
                            </div>
                    </div>
                </div><!--/span-->

            </div><!--/row-->
        </div>
        </div>
    <div class="clearfix"></div>
@endsection
