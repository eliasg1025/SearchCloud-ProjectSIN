<!-- RIGHT SECTION -->
<div class="right-section p-3">

    <!-- PROFILE RESUME -->
    <div id="profile-resume" class="card p-3">
        <div class="row align-items-center">
            <div class="col-5 p-0">
                <img src="../assets/img/user-default.png" alt="user-default" class="img-fuild rounded-circle">
            </div>
            <div class="col-7">
                <h4><?=$usuario->getNombre()?></h4>
                <h6><?=$usuario->getNombreUniversidad()?></h6>
                <a href="profile.php" role="button" class="btn btn-outline-info">Ver Perfil</a>
            </div>
        </div>
    </div>

    <!-- OPTIONS -->
    <div id="options" class="card">
        <div class="card-body p-3">
            <h5 class="card-title text-center"><i class="fas fa-bars"></i> Opciones</h5>
            <div class="btn-group-vertical btn-block">
                <a href="index.php" class="btn btn-outline-info"><i class="fas fa-home"></i> Pagina
                    Principal</a>
                <a href="question.php" class="btn btn-outline-info"><i class="fas fa-question"></i> Realizar una
                    pregunta</a>
                <a href="repository.php" class="btn btn-outline-info"><i class="fas fa-database"></i> Ver
                    repositorio de archivos</a>
                <button class="btn btn-outline-info" data-toggle="modal" data-target="#premium-user-modal"><i
                        class="fas fa-crown"></i> Cambiar a cuenta Premium</button>
                <a href="../logout.php" class="btn btn-outline-info"><i class="fas fa-sign-out-alt"></i> CERRAR SESION</a>
            </div>
        </div>
    </div>

    <!-- MODAL PREMIUM USER -->
    <div class="modal fade" id="premium-user-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">¿Quieres ser usuario Premium?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex doloremque rerum odit ut laboriosam
                        nam.</p>
                    <h6>Ingrese los datos de su tarjeta:</h6>
                    <form action="" method="POST">
                        <input type="text" class="form-control mt-1" placeholder="Numero de tarjeta " value=""
                            maxlength="12" required>
                        <div class="d-flex mt-2">
                            <select class="form-control" required>
                                <option class="hidden" selected disabled>MM</option>
                                <option>01</option>
                                <option>02</option>
                                <option>04</option>
                                <option>05</option>
                                <option>06</option>
                                <option>07</option>
                                <option>08</option>
                                <option>09</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                            </select>
                            <select class="form-control" required>
                                <option class="hidden" selected disabled>AAAA</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                                <option value="2031">2031</option>
                                <option value="2032">2032</option>
                                <option value="2033">2033</option>
                                <option value="2034">2034</option>
                                <option value="2035">2035</option>
                                <option value="2036">2036</option>
                                <option value="2037">2037</option>
                                <option value="2038">2038</option>
                                <option value="2039">2039</option>
                            </select>
                        </div>
                        <input type="text" class="form-control mt-2" placeholder="CVV" value="" maxlength="4" required>
                        <input type="text" class="form-control mt-2" placeholder="Nombre del titular" value="" required>
                        <input type="submit" class="btn btn-primary mt-3">
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->
</div>
