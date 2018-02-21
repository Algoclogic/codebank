
@extends('layouts.general')

@section('content')
<div class="row" style="margin:200px;">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Search here</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          	<div class="title_right">
		        <div class="col-md-12 col-sm-12 col-xs-12 form-group top_search">
		          	<div class="input-group">
		            	<input type="text" class="form-control" placeholder="Search for..." id="search-box">
			            <span class="input-group-btn">
			                <button class="btn btn-default" type="button" id="search-btn">Go!</button>
			            </span>
		          	</div>
		        </div>
		    </div>
          </div>
        </div>
      </div>
    </div>
@endsection
