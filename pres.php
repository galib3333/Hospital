<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <title>Prescription</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Prescription</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="doctor-name" class="form-label">Doctor's Name:</label>
                            <input type="text" class="form-control" id="doctor-name" value="Dr. John Doe" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="patient-name" class="form-label">Patient's Name:</label>
                            <input type="text" class="form-control" id="patient-name" value="John Smith" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="medicine" class="form-label">Medicine:</label>
                            <textarea class="form-control" id="medicine" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="instructions" class="form-label">Instructions:</label>
                            <textarea class="form-control" id="instructions" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="signature" class="form-label">Signature:</label>
                            <input type="text" class="form-control" id="signature">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
