<?= $this->include('\App\Views\template\auth\html_auth') ?>

<body>
    <?= $this->include('\App\Views\template\auth\header_auth') ?>

    <section class="ftco-section">
        <div class="container">
            <!-- <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login Page</h2>
                </div>
            </div> -->

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">

                        <!-- notif alert -->
                        <?php if (session('error') !== null) : ?>
                            <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                        <?php elseif (session('errors') !== null) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php if (is_array(session('errors'))) : ?>
                                    <?php foreach (session('errors') as $error) : ?>
                                        <?= $error ?>
                                        <br>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <?= session('errors') ?>
                                <?php endif ?>
                            </div>
                        <?php endif ?>

                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Sign in</h3>
                        <form action="<?= url_to('login') ?>" class="login-form" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control rounded-left" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required />
                                <!-- <label for="floatingEmailInput"><?= lang('Auth.email') ?></label> -->
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" class="form-control rounded-left" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="current-password" placeholder="<?= lang('Auth.password') ?>" required />
                                <!-- <label for="floatingPasswordInput"><?= lang('Auth.password') ?></label> -->
                            </div>

                            <!-- Remember me -->
                            <?php if (setting('Auth.sessionConfig')['allowRemembering']) : ?>
                                <div class="form-group d-md-flex form-check">
                                    <label class="checkbox-primary form-check-label">
                                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked<?php endif ?>>
                                        <?= lang('Auth.rememberMe') ?>
                                    </label>
                                </div>
                                <!-- <div class="w-50 text-md-right">
                                        <a href="<?= url_to('magic-link') ?>">Forgot Password</a>
                                    </div> -->
                            <?php endif; ?>

                            <p class="w-100 text-center" style="color:purple;">&mdash; Or Sign In With &mdash;</p>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-center">
                                    <a href="<?= base_url('oauth/google') ?>" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-google"></span></a>
                                </p>
                            </div>

                            <?php if (setting('Auth.allowRegistration')) : ?>
                                <p class="text-center" style="color:purple;"><?= lang('Auth.needAccount') ?> <a href="<?= url_to('register') ?>"><?= lang('Auth.register') ?></a></p>
                            <?php endif ?>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>