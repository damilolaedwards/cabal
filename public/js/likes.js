$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


function campuslike(id) {

    event.preventDefault();
    var topicId = id;
   
    var isLike = true;
    var baseUrl = window.location.origin;
  
    $.ajax({
        method: 'POST',
        url: baseUrl + '/forum/' + topicId + '/like',
        data: {isLike: isLike, topicId: topicId}
    })
        .done(function(data) {
        var likes = data.id;
      
    document.getElementById("campustopiclike" + topicId).innerHTML = likes;
        })
        .fail(function(data){
            console.log('Failed');
            console.log(data);
        });

        return false;
}


function eventlike(id) {

    event.preventDefault();
    var eventId = id;
   
    var isLike = true;
    var baseUrl = window.location.origin;
  
    $.ajax({
        method: 'POST',
        url: baseUrl + '/event/' + eventId + '/like',
        data: {isLike: isLike, eventId: eventId}
    })
        .done(function(data) {
        var likes = data.id;
      
    document.getElementById("eventlike" + eventId).innerHTML = likes;
        })
        .fail(function(data){
            console.log('Failed');
            console.log(data);
        });

        return false;
}

function eventgoing(id) {

    event.preventDefault();
    var eventId = id;
   
    var isLike = true;
    var baseUrl = window.location.origin;
  
    $.ajax({
        method: 'POST',
        url: baseUrl + '/event/' + eventId + '/like',
        data: {isLike: isLike, eventId: eventId}
    })
        .done(function(data) {
        var likes = data.id;
      
    document.getElementById("eventgoing" + eventId).innerHTML = likes;
        })
        .fail(function(data){
            console.log('Failed');
            console.log(data);
        });

        return false;
}

function advertlike(id) {

    event.preventDefault();
    var advertId = id;
   
    var isLike = true;
    var baseUrl = window.location.origin;
  
    $.ajax({
        method: 'POST',
        url: baseUrl + '/marketplace/' + advertId + '/like',
        data: {isLike: isLike, advertId: advertId}
    })
        .done(function(data) {
        var likes = data.id;
      
    document.getElementById("advertlike" + advertId).innerHTML = likes;
        })
        .fail(function(data){
            console.log('Failed');
            console.log(data);
        });

        return false;
}


function campuspostlike(id) {

    event.preventDefault();
    var postId = id;
   
    var isLike = true;
    var baseUrl = window.location.origin;
  
    $.ajax({
        method: 'POST',
        url: baseUrl + '/forum/' + postId + '/post/like',
        data: {isLike: isLike, postId: postId}
    })
        .done(function(data) {
        var likes = data.id;
      
    document.getElementById("campuspostlike" + postId).innerHTML = likes;
        })
        .fail(function(data){
            console.log('Failed');
            console.log(data);
        });

        return false;
}


function generalpostlike(id, category, postId) {

    event.preventDefault();
    var topicId = id;
    var cat = category;
    var post = postId
   
    var isLike = true;
    var baseUrl = window.location.origin;
  
    $.ajax({
        method: 'POST',
        url: baseUrl + '/' + cat + '/' + topicId + '/' + post + '/post'+ '/like',
        data: {isLike: isLike, postId: postId}
    })
        .done(function(data) {
        var likes = data.id;
      
    document.getElementById("generalpostlike" + post).innerHTML = likes;
        })
        .fail(function(data){
            console.log('Failed');
            console.log(data);
        });

        return false;
}







function generaltopiclike(id, category) {

    event.preventDefault();
    var topicId = id;
    var cat = category;
   
    var isLike = true;
    var baseUrl = window.location.origin;
  
    $.ajax({
        method: 'POST',
        url: baseUrl + '/' + cat + '/' + topicId + '/like',
        data: {isLike: isLike, topicId: topicId}
    })
        .done(function(data) {
        var likes = data.id;
      
    document.getElementById("generaltopiclike" + topicId).innerHTML = likes;
        })
        .fail(function(data){
            console.log('Failed');
            console.log(data);
        });

        return false;
}















