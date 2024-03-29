<style type="text/css">
    .body_container {
        min-height: 100vh;
        display: flex;
        flex-flow: column wrap;
        justify-content: space-around;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<section class="login-container">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Inscription</h2>
                            <p class="text-white-50 mb-5">Veuillez completer vos information!</p>
                            <form method="post" action="validation_register">
                                <input hidden name="token" value="ezr" />

                                <div class="form-row">
                                    <div class="form-outline form-white mb-4 col">
                                        <input name="pseudo" type="text" id="pseudo" class="form-control form-control-lg" />
                                        <label class="form-label" for="pseudo">Pseudo</label>
                                    </div>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input name="mail" type="email" id="typeEmailX" class="form-control form-control-lg" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />
                                    <label class="form-label" for="typeEmailX">E-Mail</label>
                                </div>

                                <div class="form-outline form-white mb-4 form-group">
                                    <input name="password" type="password" id="typePasswordX" class="form-control form-control-lg" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit faire au moins 8 caractère avec au moins 1 chiffre et une majuscule et une minuscule" />
                                    <label class="form-label" for="typePasswordX">Mot de passe</label>
                                    <small> (8 caractère au moins, un chiffre, une majuscule et une minuscule)</small>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input name="confirmpassword" type="password" id="confirmpassword" class="form-control form-control-lg" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit faire au moins 8 caractère avec au moins 1 chiffre et une majuscule et une minuscule" />
                                    <label class="form-label" for="confirmpassword">confirmer votre mot de passe</label>
                                </div>

                                <button class="btn btn-primary" type="submit">Inscription</button>

                            </form>
                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                            </div>

                        </div>

                        <div>
                            <p class="mb-0"> Vous avez déjas un compte? <a href="<?= URL ?>login" class="text-white-50 fw-bold">connectez vous</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>