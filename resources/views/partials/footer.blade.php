
<div class="row">
              <div class="panel panel-default " style="margin-bottom: -40px;">
  <div class="panel-body ">
   @if (Auth::check())
              <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="thumbnail" src="{{asset(Auth::user()->getUserProfileImage())}}" width="40" height="40" alt="{{Auth::user()->getUsername()}}" >
              </a>
            </div>
           
            <div class="media-body">
              <h5 class="media-heading"><strong>{{Auth::user()->getUsername()}}</strong></h5>
             
             <h4><small><a href="{{route('logout')}}">Logout</a></small></h4>
              
            </div>
           @endif
           </div>
          <div class="text-center pull-up ">
            

          <small>&nbsp; &copy Mycampus {{date('Y')}}. All Rights Reserved </small>
       
         <ul class="list-inline">
         <li><small><a href="{{route('disclaimer')}}">Disclaimer</a></small></li>
         <!--<li>&nbsp;</li> -->
         <li><small><a href="{{route('contact')}}">Contact</a></small></li>
        
           </ul>
    
          </div>
         
        
          </div>
            </div>
            </div>
            
            
           
       

          