
@extends('layouts.general')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="col-md-8 col-sm-8 col-xs-8 col-md-offset-2 form-group top_search">
                <form action="{{ route('search.question')}}" method= "post">
                  {{ csrf_field() }}
                  <div class="input-group">
                    <input type="text" class="form-control" name ="search" placeholder="Search for..." id="search-box">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" id="search-btn">Go!</button>
                    </span>
                  </div>
                </form>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          	@if(count($response))
              @foreach($response as $value)
                <div class="col-md-8 col-md-offset-2">
                  <div class="well well-lg">
                    <div class="row">
                        <span class="col-md-12 qst">{{ ucwords($value->question) }}</span>
                        <span class="col-md-11 show">
                          {{ substr($value->answer,0,200) }}  ...... 
                        </span>
                        <label class="pull-right show-more" onclick="showMore(this)">Show</label>
                    </div>
                    <div class="row hidden">
                      <div class="x_panel">
                        <div class="x_content ans"> 
                          <div class="col-md-12">
                            {{ $value->answer }}
                          </div>

                          <div class="col-md-12">
                            <br>
                            <pre>
                            <code>
                              @if($value->code == '' || $value->code == null)
                                  Code not available
                              @else
                                {{ trim($value->code) }}
                              @endif
                            </code>
                            </pre>
                          </div> 
                        </div>
                      </div>     
                    </div>  
                  </div>
                </div>  
              @endforeach
            @else
            <div class="col-md-8 col-md-offset-2">
              <div class="well well-lg">
                <div class="row text-center" style="font-size: 20px;">
                  Please try with different search key.
                </div>
              </div>
            </div>        
            @endif
		      </div>
          <div class="col-md-12 text-center">
            {{ $response->links()}}
          </div>
        </div>
    </div>

</div>
<style type="text/css">
  span.qst{
    color: #092679;
    font-size: 20px;
    font-family: sans-serif;
    text-decoration: underline;

  }
  .ans{
    font-size: 18px;
    font-family: monospace;
    color: black;
  }
  .show{

  }
  .hidden{
    display: none;
  }
  .show-more:hover{
    cursor: pointer;
    text-decoration: underline;
    color: blue;
  }
</style>
<script type="text/javascript">
  function showMore(ds){
    if($(ds).text() == 'Show'){
      $(ds).prev().addClass('hidden');
      $(ds).parent().next().removeClass('hidden');
      $(ds).text('Hide');
    }else{

      if($(ds).text() == 'Hide'){
        $(ds).prev().removeClass('hidden');
        $(ds).parent().next().addClass('hidden');
        $(ds).text('Show');
      }
    }
  }
</script>
@endsection
