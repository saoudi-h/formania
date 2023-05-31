<main>
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">
        <style>
            .background-radial-gradient {
                background: url('/images/background_blue_register.jpg');
                background-size: cover;
            }


            .bg-glass {
                background-color: hsla(0, 0%, 100%, 0.9) !important;
                backdrop-filter: saturate(200%) blur(25px);
            }
        </style>

        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: #fffbed">
                        Rejoignez nous<br />
                        <span style="color: #32196d">Et enrichissez vos connaissances !</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: #fffbed">
                        Découvrez un monde d'apprentissage passionnant et développez vos compétences avec notre plateforme d'e-learning. Inscrivez-vous dès maintenant pour accéder à une vaste bibliothèque de cours de qualité, dispensés par des experts du domaine.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form method="post">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="firstname" name="firstname" class="form-control" />
                                            <label class="form-label" for="firstname">Prenom</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="lastname" name="lastname" class="form-control" />
                                            <label class="form-label" for="lastname">Nom</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="email" name="email" class="form-control" />
                                    <label class="form-label" for="email">Email</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="password" name="password" class="form-control" />
                                    <label class="form-label" for="passwored">Mot de passe</label>
                                </div>

                                <!-- Phone input -->
                                <div class="form-outline mb-4">
                                    <input type="phone" id="phone" name="phone" class="form-control" />
                                    <label class="form-label" for="phone">Téléphone</label>
                                </div>

                                <!-- Date de Naissance input -->
                                <div class="form-outline mb-4">
                                    <input type="date" id="birthdate" name="birthdate" class="form-control" />
                                    <label class="form-label" for="birthdate">Date de Naissance</label>
                                </div>

                                <!-- Genre input -->
                                <div class="form-outline mb-4">
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="male">Homme</option>
                                        <option value="female">Femme</option>
                                    </select>
                                </div>



                                <!-- Checkbox Abonnez-vous-->
                                <div class="form-check d-flex justify-content-center mb-4">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                                    <label class="form-check-label" for="form2Example33">
                                        Abonnez-vous à notre newsletter
                                    </label>
                                </div>



                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    S'inscrire
                                </button>

                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>ou inscrivez-vous avec :</p>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-google"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-github"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
</main>