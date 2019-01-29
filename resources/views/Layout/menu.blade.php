

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded-0">
  		<a class="navbar-brand" href="{{ url('/home') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>	  	
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">	  	
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item mx-3">
	        <a class="nav-link nav-fill" href="/home">Home</a>
	      </li>
	      <li class="nav-item nav-fill mx-3">
	        <a class="nav-link" href="/appointment">Appointment</a>
	      </li>
	      <li class="nav-item nav-fill mx-3">
	        <a class="nav-link" href="/visitor">Visitor</a>
	      </li>
	      <li class="nav-item nav-fill mx-3">
	        <a class="nav-link" href="/user">Staff</a>
	      </li>
	      <li class="nav-item dropdown nav-fill mx-3">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Report
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="/report/appointment">Report Appointment</a>
	          <a class="dropdown-item" href="/report/visitor">Report Visitor</a>          
	          <a class="dropdown-item" href="/report/vehicle">Report Vehicle</a>
	          <a class="dropdown-item" href="/report/staff">Report Staff</a>
	        </div>	
	      </li>	    
	      <form class="form-inline my-2 my-lg-0 ml-auto">
		      	<div class="input-group stylish-input-group">		      		
		            <input type="search" class="form-control mr-sm-2"  placeholder="Unique Code/Visitor/Staff" aria-label="Search">
		            <span class="input-group-addon">	            			            	
			                <button type="button">
			                    <span class="glyphicon glyphicon-search"></span>
			                </button>		                
		            </span>		         		        
		       	</div>		   
			</form>	  		    		    	
	    </ul>			    
	    <ul class="navbar-nav navbar-right" >	   	            
	      	@guest
                <li class="nav-item nav-fill mx-3">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item nav-fill mx-3">
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </li>
            @else
                <li class="nav-item dropdown nav-fill mx-3">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    	<a class="dropdown-item" href="/user/{{ Auth::user()->id }}/profile">
                            Profile
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
	    </ul>	    
	  </div>
	</nav>
