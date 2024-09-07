<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Artist</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body>


    <div class="container mt-5">

        <div class="card mx-auto" style="width: 300px;">

            <div class="card-body">

                <form method="POST" action="/artists/create">
                    @csrf


                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">

                    <button type="submit" class="btn btn-primary mt-5" style="width:264px;">add</button>

                </form>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('.artists').select2({
            templateSelection: function(data, container) {
                // Add custom attributes to the <option> tag for the selected option
                data.customValue = ['Ono Rikka'];
                $(data.element).attr('data-custom-attribute', data.customValue);
                return data.text;
            }

        });

        $('.artists').find(':selected').data('custom-attribute');
    });
</script>

</html>
