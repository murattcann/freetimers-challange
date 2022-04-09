
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challange</title>

    <link rel="stylesheet" href="./public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/assets/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="./public/assets/css/style.css">


</head>

<body>
    <section id="listingWrapper">
        <div class="container mt-2">
            <div class="row">
                <div class="col-sm-12">
                    <div class="accordion shadow" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Tops Oil Calculation Form
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form method="POST" id="calculationForm">
                                        <div class="row d-none" id="successMessage">
                                            <div class="col-sm-12">
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <strong>Success!</strong> Item added to basket successfully.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="measurementUnitSpan">Mesurement Unit</span>
                                                    </div>
                                                    <select class="form-control form-select" name="measurement_unit" id="measurementUnit">
                                                        <option value="meters">Metres</option>
                                                        <option value="feets">Feets</option>
                                                        <option value="yards">Yards</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="depthMeasurementUnitSpan">Depth Mesurement Unit</span>
                                                    </div>
                                                    <select class="form-control form-select" name="depth_measurement_unit" id="depthMeasurementUnit">
                                                        <option value="cantimeters">Cantimeters</option>
                                                        <option value="inches">Inches</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" name="width" id="width" placeholder="Width" min="0" required>
                                                    <label for="width">Width</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" name="length" id="length" placeholder="Length" min="0" required>
                                                    <label for="length">Length</label>
                                                </div>

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control"  name="depth" id="depth" placeholder="Depth" required>
                                                    <label for="depth">Depth</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <b>Bag Quantity: </b> <span id="quantityHolder">0</span>
                                            </div>
                                            <div class="col-sm-12">
                                                <b>Total Price: </b> <span id="totalPriceHolder">£0</span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <button type="button" id="calculateBtn" class="btn btn-outline-info">Calculate</button>
                                                <button type="button" id="addToCart" data-bag-count="0" class="btn btn-success">Add To Cart</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row  mt-3 justify-content-center">
                <div class="col-sm-12">
                    <span class="d-block"><b>Total Bag Count: </b> <span id="totalBagCounter">0</span></span>
                    <span class="d-block"><b>Total Amount (inc VAT): </b> <span id="totalCartPriceHolder">£0.00</span></span>
                </div>
                <div class="col-sm-12">
                    <table class="table mt-3 table-bordered table-striped" id="cartItemsTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mesurement</th>
                                <th>Depth Mesurement</th>
                                <th>Dimensions</th>
                                <th>Unit Price</th>
                                <th>Number Of Bags</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                         
                        <tr>
                            <td colspan="7" style="text-center">
                                <img src="./public/assets/images/loader.gif" class="loader">
                            </td>

                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </section>
    <script src="./public/assets/js/bootstrap.min.js"></script>
    <script src="./public/assets/js/jquery.min.js"></script>
    <script src="./public/assets/js/operation.js"></script>


</body>

</html>