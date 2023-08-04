<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XProject</title>
    <!--    CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>    <script src="../../assets/js/main.js"></script>
    <!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<div class="container">
    <main>
    <?php if(isset($_GET['success']) and isset($_GET['action'])=='delete')
        {echo "<h4 class='text-success text-center'>Bạn đã xóa thành công</h4>";}?>
    <div class="d-flex justify-content-between align-items-center">
  <h3 class="text-center text-success text-bold fs-3 text-uppercase mt-3 mb-3">LIST OF EMPLOYEES</h3>
  <button class="btn btn-success btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#createModal">
    <i class="fas fa-plus"></i> Add New Employee
  </button>
</div>
            <!-- create modal -->
            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- head -->
                        <div class="modal-header">
                            <div>
                                <h2 class="modal-title" id="exampleModalLabel">Sign Up</h2>
                                <span class="text-muted fs-7">It's quick and easy.</span>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- body -->
                        <div class="modal-body">
                            <form action="index.php?c=user&a=add" method="post">
                                <!-- names -->
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Username" name="txtUsername"/>
                                    </div>
<!--                                    <div class="col">-->
<!--                                        <input type="text" class="form-control" placeholder="Surname" />-->
<!--                                    </div>-->
                                </div>
                                <!-- email & pass -->
                                <input type="email" class="form-control my-3" placeholder="Email address" name="txtEmail"/>
                                <input type="password" class="form-control my-3" placeholder="New password" name="txtPassword"/>

                                <!-- disclaimer -->
                                <div>
                                    <span class="text-muted fs-7">By clicking Sign Up, you agree to our Terms, Data Policy....</span>
                                </div>
                                <!-- btn -->
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-success btn-lg" data-bs-dismiss="modal">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Salry</th>
                <th scope="col" colspan="3" class="text-center">Action</th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach($users as $user){
                ?>
                <tr>
                    <th scope="row" name="txtUserID"><?= $user->getUserId();?></th>
                    <td><?= $user->getName();?></td>
                    <td><?= $user->getAddress();?></td>
                    <td><?= $user->getSalary();?></td>
                    <td>
                        <a href="index.php?c=user&a=detail&id=<?= $user->getUserId(); ?>">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                    </td>
                    <td>
                        <a href="index.php?c=user&a=edit&id=<?= $user->getUserId(); ?>">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="index.php?c=user&a=delete&id=<?= $user->getUserId(); ?>">
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>

            </tbody>
        </table>
    </main>
</div>
</body>
</html>