<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>JavaScript cloneNode() Demo</title>
</head>
<body>
    @php $arrayValues = ["rido", "janu"]; @endphp
    @if(!empty($_COOKIE['myJavascriptVar']))
        {{  $arrayValues = $_COOKIE['myJavascriptVar']; }}
    @endif
    <h1>hel</h1>
    <div id="menu">
       
        @foreach ($arrayValues as $arrayValue)
        <p>{{ $arrayValue }}</p>
        @endforeach
        
        <br><br>
    </div>
    <script>

setInterval(function(){ 
                
        
    let myJavascriptVar = ["zahid", "khan"];
            <?php $arrayValues='myJavascriptVar';?>
      

        let menu = document.querySelector('#menu');
        let clonedMenu = menu.cloneNode(true);
        clonedMenu.id = 'menu-mobile';
        document.body.appendChild(clonedMenu);
                   
               


            }, 5000);
       
    </script>
</body>
</html>