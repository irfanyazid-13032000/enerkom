<style>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        /* background: linear-gradient(#62b6b7, #453c67); */
        /* height: 100vh; */
        /* user-select: none; */
      }

      .center,
      .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }

      #click {
        display: none;
      }
      .click-me {
        display: block;
        width: 160px;
        height: 50px;
        background: #10a19d;
        border: 1px solid black;
        color: white;
        text-align: center;
        font-size: 22px;
        line-height: 50px;
        border-radius: 3px;
        cursor: pointer;
        transition: 0.4s;
      }
      .click-me:hover {
        background: #fcf9be;
        color: black;
      }

      .data {
        /* width: 100%; */
        height: 30%;
        /* overflow: scroll; */
        display: none;
      }

      .content {
        /* opacity: 0; */
        /* visibility: hidden; */
        display: block;
        width: 400px;
        height: 750px;
        background: white;
        border-radius: 3px;
        box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.4);
      }
      #click:checked ~ .content {
        /* opacity: 1; */
        /* visibility: visible; */
        display: none;
        /* overflow: scroll; */
        /* width: 100%; */
        /* overflow: scroll; */
      }

      .content .data {
        /* opacity: 1; */
        background-color:#2C2828;
        visibility: visible;
        display: block;
        /* overflow: scroll; */
        height: 100%;
        overflow: auto;
      }

      .header {
        height: 70px;
        background: #395144;
        overflow: hidden;
        border-radius: 3px 3px 0 0;
        box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.2);
      }

      .header h2 {
        color: #AA8B56;
        padding-left: 32px;
        font-weight: bold;
      }

      h2{
        padding-top:20px
      }

      .fa-times {
        position: absolute;
        right: 20px;
        top: 20px;
        color: #e1ffee;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
      }
      .fa-check {
        font-size: 50px;
        color: #fed049;
        font-weight: bold;
        height: 80px;
        width: 80px;
        border: 2px solid #ab4343;
        text-align: center;
        padding-top: 15px;
        border-radius: 50%;
        box-sizing: border-box;
        margin: 30px 0 0 160px;
      }

      p {
        padding-top: 10px;
        font-size: 19px;
        color: #9c254d;
        text-align: center;
      }
      .line {
        position: absolute;
        bottom: 60px;
        width: 100%;
        height: 1px;
        background: #cff5e7;
      }
    .close-btn {
        display:block;
        width:50px;
        height:50px;
        position: relative;
        /* bottom: 12px; */
        left: 300px;
        border: 1px solid #3f3b6c;
        border-radius: 3px;
        color: #4fa095;
        padding: 10px;
        font-size: 18px;
        cursor: pointer;
        text-align:center;
        margin-top:10px;
      }

      .close-btn:hover {
        background: #3f3b6c;
        color: wheat;
        transition: 0.3s;
      }
</style>


<body>


<div style="z-index:2;" class="center">
      <input type="checkbox" id="click" />
      <div class="content">
        <div class="header">
          <h2>Ubah item</h2>
          <label for="click" class="fas fa-times"></label>
        </div>
        <div class="data">
        <div class="container mt-5">

        <div class="card mx-auto" style="width: 300px; height:80%">

            <div class="card-body">

                <form method="POST" action="/item/update/{{$item->id}}">
                    @csrf


                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$item->name}}">


                    <label for="">Description</label>
                    <textarea id="" cols="30" rows="9" class="form-control" name="description">{{$item->description}}</textarea>


                    <label for="">Stock</label>
                    <input type="number" class="form-control" name="stock" value="{{$item->stock}}">
                    
                   <label for="">Category</label>
                   <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $category)
                    @if ($category->id == $item->category_id)
                    <option value="{{ $category->id }}" selected>{{$category->name}}</option>
                    @else
                    <option value="{{ $category->id }}">{{$category->name}}</option>
                    @endif
                    @endforeach
                   </select>

                    <button type="submit" class="btn btn-primary mt-5" style="width:264px;">change</button>

                </form>
            </div>
        </div>
    </div>
    <label for="click" class="close-btn"><span>X</span></label>
        </div>
      </div>
    </div>

</body>
