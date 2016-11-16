
<div class="row">
              <div class="panel panel-default ">
  <div class="panel-body ">
   @if (Auth::check())
              <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="thumbnail" src="{{asset(Auth::user()->getUserProfileImage())}}" width="40" height="40" alt="{{Auth::user()->getUsername()}}" style="max-width: unset;" >
              </a>
            </div>
           
            <div class="media-body">
              <h5 class="media-heading"><strong>{{Auth::user()->getUsername()}}</strong></h5>
             
             <h4><small><a href="{{route('logout')}}">Logout</a></small></h4>
              
            </div>
           @endif
           </div>
          <div class="text-center pull-up ">
            

          <small>&nbsp; &copy CampusCabal {{date('Y')}}. All Rights Reserved </small>
       
         <ul class="footer_set">
         <li><small><a href="{{route('disclaimer')}}">Disclaimer</a></small></li>
         <li>&nbsp;</li>
         <li><small><a href="{{route('rules')}}">Rules & Regulations</a></small></li>
         <li>&nbsp;</li>
         <li><small><a href="{{route('contact')}}">Contact</a></small></li>
        
           </ul>
    
          </div>
         
        
          </div>
            </div>
            </div>
            
            
           
       

          