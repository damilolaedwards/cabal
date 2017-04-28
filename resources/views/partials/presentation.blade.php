<div class="row">
          <ul class="nav nav-tabs ">
            <li role="presentation" class="active warning margin garamond-bare"><a href="#">General Discussion Forums</a></li>
          </ul>
          <div class="panel panel-default">
            <div class="topics" >
              <ul>
              @foreach($categories as $category)
              <li role="presentation" class="playfair3"><a href="{{route('category', ['category' => $category->name])}}">{{str_replace("&", " & " ,$category->name)}}</a></li>
              
              @endforeach
              </ul>
            </div>
          </div>
        </div>