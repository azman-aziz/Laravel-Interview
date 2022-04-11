<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">

                    <h1>Nama: {{$blog->nama}}</h1>
                    <table class="table table-bordered text-center align-self-center">
                            <thead>
                              <tr>
                                <th rowspan="1" scope="col">Aspek</th>
                                <th rowspan="1" scope="col">1</th>
                                <th rowspan="1" scope="col">2</th>
                                <th rowspan="1" scope="col">3</th>
                                <th rowspan="1" scope="col">4</th>
                                <th rowspan="1" scope="col">5</th>
                                
                               
                              </tr>
                            </thead>
                            <tbody>
                              
                                <tr>
                                    <td class="text-center">
                                    Aspek Intelegensi
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                    Aspek Numerical Ability
                                    </td>
                                    <td>x</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            
                            </tbody>
                          </table>  
      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>