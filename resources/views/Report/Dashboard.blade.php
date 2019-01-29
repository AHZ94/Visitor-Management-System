@extends('Layout.master')

@section('body')

<div class="container-fluid text-center">
  <div class="row">   
    <div class="col-md-4 col-sm-12">      
      <div class="card card-body bg-history">
        <div class="display-4 text-white">
          <dt>HISTORY</dt>
        </div>
      </div>
      @if(count($yesterday))  
      <div class="table-responsive">
        <table class="table table-borderless">
          <thead>
            <th>Date</th>
            <th>Status</th> 
            <th>Time</th>
            <th>Visitor</th>
            <th>Employee</th>                       
          </thead>
          <tbody>          
            @foreach($yesterday as $yesterdays)
              <tr>
                <td>{{ $yesterdays->date }}</td>
                <td>
                  @if($yesterdays->status == 'Pending')
                    <a href="\appointment\{{ $yesterdays->id }}">
                      <span class="label-custom label-primary">
                        {{ $yesterdays->status }}
                      </span>
                    </a>
                  @elseif($yesterdays->status == 'Check In')
                    <a href="\appointment\{{ $yesterdays->id }}">
                      <span class="label-custom label-success">
                        {{ $yesterdays->status }}
                      </span>
                    </a>
                  @elseif($yesterdays->status == 'Check Out')
                    <a href="\appointment\{{ $yesterdays->id }}">
                      <span class="label-custom label-warning">
                        {{ $yesterdays->status }}
                      </span>
                    </a>
                  @elseif($yesterdays->status == 'Cancelled')
                    <a href="\appointment\{{ $yesterdays->id }}">
                      <span class="label-custom label-danger">
                        {{ $yesterdays->status }}
                      </span>
                    </a>
                  @endif
                </td>
                <td>{{ Carbon\Carbon::parse($yesterdays->times)->format('g:i A') }}</td>
                <td>{{ $yesterdays->visitor->firstname }}</td>
                <td>{{ $yesterdays->user->name }}</td>
              </tr>
            @endforeach          
          </tbody>
        </table>
      </div>
      @else
        <div class="top my-3">
          <div class="card card-body card-default">
            <p>No record found</p>     
          </div>      
        </div>
      @endif      
    </div>

    <div class="col-md-4 col-sm-12">      
      <div class="card card-body bg-today">
        <div class="display-4 text-white">
          <dt>TODAY</dt>
        </div>
      </div>
        @if(count($today))  
        <div class="table-responsive">
          <table class="table table-borderless">
            <thead class="text-center">
              <th>Date</th>
              <th>Status</th>            
              <th>Time</th>
              <th>Visitor</th>
              <th>Employee</th>
            </thead>
            <tbody>                    
              @foreach($today as $todays)
                <tr>
                  <td>{{ $todays->date }}</td>
                  <td>                    
                    @if($todays->status == 'Pending')
                      <a href="\appointment\{{ $todays->id }}">
                        <span class="label-custom label-primary">
                           {{ $todays->status }}
                        </span>
                      </a>
                    @elseif($todays->status == 'Check In')
                      <a href="\appointment\{{ $todays->id }}">
                        <span class="label-custom label-success">
                           {{ $todays->status }}
                        </span>
                      </a>
                    @elseif($todays->status == 'Check Out')
                      <a href="\appointment\{{ $todays->id }}">
                        <span class="label-custom label-warning">
                            {{ $todays->status }}
                        </span>
                      </a>
                    @elseif($todays->status == 'Cancelled')
                      <a href="\appointment\{{ $todays->id }}">
                        <span class="label-custom label-danger">
                            {{ $todays->status }}
                        </span>
                      </a>
                    @endif
                  </td>                   
                  <td>{{ Carbon\Carbon::parse($todays->times)->format('g:i A') }}</td>
                  <td>{{ $todays->visitor->firstname }}</td>
                  <td>{{ $todays->user->name }}</td>
                </tr>          
              @endforeach              
            </tbody>
          </table>
        </div>            
        @else  
           <div class="top my-3">
              <div class="card card-body card-default">
                <p>No Appointment for today</p>         
              </div>
          </div>
        @endif 
    </div>
                
    <div class="col-md-4 col-sm-12">      
      <div class="card card-body bg-upcoming">
        <div class="display-4 text-white">
          <dt>UPCOMING</dt>
        </div>
      </div>
        @if(count($tomorrow))
          <div class="table-responsive">
            <table class="table table-borderless">
              <thead>
                <th>Date</th>
                <th>Status</th>            
                <th>Time</th>
                <th>Visitor</th>
                <th>Employee</th>
              </thead>
              <tbody>           
                  @foreach($tomorrow as $tomorrows)
                    <tr>
                      <td>{{ $tomorrows->date }}</td>
                      <td>
                        @if($tomorrows->status == 'Pending')
                          <a href="\appointment\{{ $tomorrows->id }}">
                            <span class="label-custom label-primary">
                               {{ $tomorrows->status }}
                            </span>
                          </a>
                        @elseif($tomorrows->status == 'Check In')
                          <a href="\appointment\{{ $tomorrows->id }}">
                            <span class="label-custom label-success">
                              {{ $tomorrows->status }}
                            </span>
                          </a>
                        @elseif($tomorrows->status == 'Check Out')
                          <a href="\appointment\{{ $tomorrows->id }}">
                            <span class="label-custom label-warning">
                              {{ $tomorrows->status }}
                            </span>
                          </a>
                        @elseif($tomorrows->status == 'Cancelled')
                          <a href="\appointment\{{ $tomorrows->id }}">
                            <span class="label-custom label-danger">
                              {{ $tomorrows->status }}
                            </span>
                          </a>
                        @endif                       
                      </td>
                      <td>{{ Carbon\Carbon::parse($tomorrows->times)->format('g:i A') }}</td>
                      <td>{{ $tomorrows->visitor->firstname }}</td>
                      <td>{{ $tomorrows->user->name }}</td>
                    </tr>  
                  @endforeach          
              </tbody>
            </table>
          </div>
        @else          
            <div class="top my-3">
                <div class="card card-body card-default">
                  <p>No Appointment for tomorrow</p>         
                </div>
            </div>
        @endif
      </div>
  </div>        
</div>
@stop