<html>
  <head>
    <title>Spotify</title>
  </head>
  <body>
    <h1>Spotify API Integration</h1>
    @if($type == 'artists')
      <h2>{{$itemDetail['name']}}</h2> 
      <p>Followers : {{$itemDetail['followers']['total']}}</p> 
      <p>External URLs : <a target="_blank" href="{{$itemDetail['external_urls']['spotify']}}">{{$itemDetail['external_urls']['spotify']}}</a></p> 
      @if(count($itemDetail['images']) > 0)
      <img style="height:{{$itemDetail['images'][1]['height']}},width:{{$itemDetail['images'][1]['width']}}" src="{{$itemDetail['images'][1]['url']}}" alt="image" />
      @else
      <p>NO PREVIEW IMAGE AVAILABLE</p>
      @endif
    @elseif($type == 'albums')
      <h2>{{$itemDetail['name']}}</h2> 
      <p>Popularity : {{$itemDetail['popularity']}}</p> 
      <p>External URLs : <a target="_blank" href="{{$itemDetail['external_urls']['spotify']}}">{{$itemDetail['external_urls']['spotify']}}</a></p> 
      @if(count($itemDetail['images']) > 0)
      <img style="height:{{$itemDetail['images'][1]['height']}},width:{{$itemDetail['images'][1]['width']}}" src="{{$itemDetail['images'][1]['url']}}" alt="image" />
      @else
      <p>NO PREVIEW IMAGE AVAILABLE</p>
      @endif
    @else
      <h2>{{$itemDetail['album']['name']}}</h2>
      <p>Release Date : {{$itemDetail['album']['release_date']}}</p>
      <p>External URLs : <a target="_blank" href="{{$itemDetail['album']['external_urls']['spotify']}}">{{$itemDetail['album']['external_urls']['spotify']}}</a></p> 
      @if(count($itemDetail['album']['images']) > 0)
      <img style="height:{{$itemDetail['album']['images'][1]['height']}},width:{{$itemDetail['album']['images'][1]['width']}}" src="{{$itemDetail['album']['images'][1]['url']}}" alt="image" />
      @else
      <p>NO PREVIEW IMAGE AVAILABLE</p>
      @endif
    @endif 
    
      
      
  </body>
</html>

