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

                            <h2 class="fw-bold mb-2 text-uppercase">Connexion</h2>
                            <p class="text-white-50 mb-5">Veuillez rentrer vos identifiants!</p>
                            <form method="post" action="validation_login">
                                <!--<input hidden name="FormType" value="login" /> -->
                                <input hidden name="token" value="erzer" />
                                <div class="form-outline form-white mb-4">
                                    <input name="mail" type="email" id="typeEmailX" class="form-control form-control-lg" required />
                                    <label class="form-label" for="typeEmailX">E-Mail</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input name="password" type="password" id="typePasswordX" class="form-control form-control-lg" required />
                                    <label class="form-label" for="typePasswordX">Mot de passe</label>
                                </div>

                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Mot de passe oublié?</a></p>

                                <button class="btn btn-primary" type="submit">Connection</button>

                            </form>

                        </div>

                        <div>
                            <p class="mb-0"> Vous n'avez pas de compte? <a href="<?= URL ?>register" class="text-white-50 fw-bold">Inscrivez vous</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>