<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'top.php'; ?>
</head>

<body>
    <?php include 'nav.php'; ?>


    <div class="container-fluid px-4 my-4">
        <p class="display-2 mb-4">About Us</p>
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Yash Parekh</h5>
                        <h6 class="card-subtitle mb-2 text-muted">22BCP128 - G4</h6>
                        <h6 class="card-subtitle mb-2 text-muted">yash.pce22@sot.pdpdu.ac.in</h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Harsh Paija</h5>
                        <h6 class="card-subtitle mb-2 text-muted">22BCP134 - G4</h6>
                        <h6 class="card-subtitle mb-2 text-muted">harsh.pce22@sot.pdpdu.ac.in</h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Darsh Doshi</h5>
                        <h6 class="card-subtitle mb-2 text-muted">22BCP148 - G4</h6>
                        <h6 class="card-subtitle mb-2 text-muted">darsh.dce22@sot.pdpdu.ac.in</h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Tushar Talaviya</h5>
                        <h6 class="card-subtitle mb-2 text-muted">22BCP159 - G4</h6>
                        <h6 class="card-subtitle mb-2 text-muted">tushar.tce22@sot.pdpdu.ac.in</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid my-2 px-4">
        <p class="display-2">ER Diagram</p>
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <img src="ER.png" class="img-fluid w-100" alt="...">
            </div>
            <div class="col-lg-4 col-sm-12">
                <p class="display-6"><b><u>Project Title:</u></b> Foody Paradise </p>
                <p class="display-6"><b><u>Problem Statement:</u></b></p>
                <p>To Design a database management system of recipe
                    recommendation. The system should allow users to explore
                    various recipe with course and cuisine, view details about each
                    instruction and ingredients needed to make delicious food.
                    Additionally, the system should provide comment system to
                    user with addition feature to edit and delete .</p>
            </div>
            <div class="col"></div>
            <p class="display-6"><b><u>Project Objectives:</u></b></p>
            <ol class="list-group list-group-numbered">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">User Management:</div>
                        <ul>
                            <li>Allow users to register and login to the system securely.</li>
                            <li>Enable users to view their comment on recipe and change or delete</li>
                            <li>Admin has a right to delete all comment and add a comment for security purpose</li>
                        </ul>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"> recipe Management:</div>
                        <ul>
                            <li>- Display a list of recipe and their details, including cooking time, preparation time
                                and serving.</li>
                            <li>Provide information about ingredients within each course, including diet</li>
                        </ul>
                    </div>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">comment Management:</div>
                        <ul>
                            <li>-provides a user to comment and review a recipe</li>
                        </ul>
                    </div>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Admin rights:</div>
                        <ul>
                            <li>Right to manage comment section and secure it from negative comment.</li>
                        </ul>
                    </div>

                </li>
            </ol>
        </div>
    </div>
    </div>
</body>

</html>