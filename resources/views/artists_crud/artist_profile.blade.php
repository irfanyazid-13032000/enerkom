<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Gallery</title>
</head>
<style>
  *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: sans-serif;
}


.container{
  width: 100%;
  text-align: center;
}

table{
  margin: auto;
  font-size: 16px;
  text-align: left;
  border-spacing: 0px;
}


th{
  background-color: rgb(206, 190, 206);
  color: black;
  padding: 7px 10px;
  width: 300px;
  border: solid #6b6b6b 1px;
}

td{
  padding: 7px 10px;
  width: 400px;
  border: solid #6b6b6b 1px;
}

.tabel{
  width: 90%;
  border: 1px black solid;
  margin: auto;
}

.photo-gallery{
  width: 90%;
  margin: auto;
  display: grid;
  grid-template-columns: repeat(4,1fr);
  grid-gap: 50px;
}

.pic{
  position: relative;
  height: 230px;
}

.pic img{
  height: 100%;
  width: 100%;
  border-radius: 20px;
  transition: .3s;
}

.selected {
  /* border:7px solid red; */
  /* background-image:url({{asset('storage/images/lalala.jpg')}}); */
  opacity:20%;
}


.K

p{
  font-size: 20px;
}

</style>
<body>

  
  <div class="container">
    <h2>Profile</h2>
    <div class="tabel">
      <table>
        <tbody>
          <tr>
            <th>Name</th>
            <td>{{$artis->name}}</td>
          </tr>
          <tr>
            <th>Name in Kanji</th>
            <td>涼森 れむ</td>
          </tr>
          <tr>
            <th>Name in Kana</th>
            <td>すずもり れむ</td>
          </tr>
          <tr>
            <th>Age / Birth date</th>
            <td><a href="/women/age-25/">25 years old</a> Born on 1997</td>
          </tr>
           <tr>
            <th>Height / BWH</th>
            <td>160cm - B87(D)  - W58 - H85</td>
          </tr>
          <tr>
            <td colspan="2"><input type="text" id="keyword" style="width: 100%;height:30px;font-size:20px;" autofocus></td>
          </tr>
      </tbody>
    </table>
  </div>
    
    <div class="photo-gallery">

    @foreach ($artis->films as $film)
        
    
    <div class="pic">
        <img src="{{asset('storage/images/'.$film->image)}}">
        <div class="overlay"></div>
        <p>{{$film->code}}</p>
    </div>
     
    
    
    
    
      @endforeach
      
    </div>



  </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
  
  $(document).ready(function() {
    $('#keyword').on('keyup', function() {
        var searchTerm = $(this).val();
        if (searchTerm !== '') {

          $.ajax({
            type: 'GET',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/gallery',
            data: { searchTerm: searchTerm},
            success: function(data) {
                $('.photo-gallery').html('');
                for (var i = 0; i < data.length; i++) {
                    let image = /*html */ 
                    `<div class="pic">
                    <img src="{{asset('storage/images/')}}/${data[i].image}">
                    <div class="overlay"></div>
                    <p>${data[i].code}</p>
                    </div>`
                    $('.photo-gallery').append(image)
                  }
                  $('.pic').on('click', function() {
                      this.classList.toggle('selected');
                   });
                }
              });

              
              
            }else{
              location.reload()
            }
          });
          
        });
        
        
var images = document.querySelectorAll('img');
var picture = document.querySelectorAll('.pic');
        
for (var i = 0; i < images.length; i++) {
images[i].addEventListener('click', function() {
this.classList.toggle('selected');
picture[i].classList.toggle('merubah-red');
  });
}
        
        
        
</script>

</html>